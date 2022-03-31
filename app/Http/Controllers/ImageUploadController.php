<?php

namespace App\Http\Controllers;

use App\Models\ImageUpload;
use App\Models\Thumb;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as TImage;


class ImageUploadController extends MyController
{
    public function uploadImages(Request $request, $model_id) {
        $exist = ImageUpload::where('model_id', $model_id)->select(['id'])->get();

        if($exist->count() < 4){

            $image = $request->file('file');
            $imageName = $image->getClientOriginalName();
            $dir = "data/product";
            $image->move(public_path($dir),$imageName);
            $image = new ImageUpload();
            $image->url = $dir."/".$imageName;
            $image->unid = $this->generateId("ImG", 25);
            $image->model_id = $model_id;
            $image->time = time();
            $image->name = $imageName;
            $image->valid = false;
            try{
                //make thumb
                $this->Thumb($image);
                //SAVE IMAGE
                $image->save();
                return response()->json(["status" => "success", "data" => $image]);
            }catch (\Exception $e){
                return response()->json(["status" => "failed", "data" => $e->getMessage()]);
            }

        }

        return response()->json(["status" => "failed", "data" => null]);
    }

// --------------------- [ Delete image ] -----------------------------

    public function deleteImage(Request $request, $model_id) {
        $name = $request->input('filename');
        $imageUploaded = ImageUpload::where('name', $name)->where('model_id', $model_id)->first();
        if(!empty($imageUploaded)){
            $path = $imageUploaded->url;
            if (file_exists($path)) {
                unlink($path);
            }
            $filename = $imageUploaded->name;

            //delete thumb
            $thumb = $imageUploaded->thumb;
            if(!empty($thumb)){
                if (file_exists($thumb->url)) {
                    unlink($thumb->url);
                }
                $thumb->delete();
            }

            $imageUploaded->delete();
            return $filename;
        }

        return [false, $name];

    }

    public function Thumb($image, $waterMark = null){
        //new instance
        $thumb = TImage::make($image->url);

        $width = 120;
        $height = (120/$thumb->width())*$thumb->height();

        //open image file
        $thumb->resize($width, $height);

        // and insert a watermark for example
        if(!empty($waterMark)){
            $thumb->insert($waterMark);
        }

        //new thumb model

        $dbThumb = new Thumb();
        $dir = "data/thumb/".$image->name;
        $dbThumb->url = $dir;
        $dbThumb->unid = $image->unid;
        $path = public_path("data/thumb")."/".$image->name;
        // finally we save the image as a new file
        try{
            $thumb->save($path);
            $dbThumb->save();
        }catch (\Exception $e){

        }

    }
}
