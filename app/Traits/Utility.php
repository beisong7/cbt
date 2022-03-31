<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait Utility{

    public function generateId($prefix=null){
        $uuid = (string)Str::uuid();
        return !empty($prefix)?$prefix.$uuid:$uuid;
    }

    /**
     * @param null $int
     * @return string
     * Generates a random string
     */
    public function genetateToken($int=null){
        return Str::random(empty($int)?36:$int);
    }

    public function uploadImage($image, $storePath=null, $maxSize=null) // Taking input image as parameter
    {
        $image_name = Str::random(20);
        $extension = strtolower($image->getClientOriginalExtension()); // You can use also getClientOriginalName()

        $allowedfileExtension = ['jpg', 'png', 'bmp', 'jpeg', 'gif'];

        $check = in_array(strtolower($extension), $allowedfileExtension);
        if(!$check){
            return [false, 'Image format not supported'];
        }

        if(!empty($maxSize)){
            $size = $image->getSize();
            if ($size > $maxSize) {
                return [false, 'This passport is too large. Compress and try again'];
            }
        }

        $image_full_name = $image_name.'.'.$extension;
        $upload_path = 'uploads/images';
        if(!empty($storePath)){
            $upload_path = 'uploads/'.$storePath;    //Creating Sub directory in Public folder to put image
        }


        $image->move(public_path($upload_path) ,$image_full_name);
//        $image->storeAs($upload_path, $image_full_name, 'public'); //alternative code

        $image_url = $upload_path."/".$image_full_name;


        return [true, $image_url]; //
    }

    public function ImageAttribute($image){
        if(file_exists($image)){
            return url($image);
        }else{
            return url('assets/images/user.png');
        }
    }

    public function secToTime($seconds){
        $timeinfo = "";

        if($seconds < 60){

            $timeinfo = "$seconds Seconds ";

        }elseif ($seconds===60){

            $timeinfo = "1 Minute ";

        }else {

            $mins = intval($seconds / 60); //minutes;
            $sec = $seconds % 60; //seconds
            $hour = intval($seconds / (60*60)); //hour

            if($hour > 0){

                if($hour > 1){
                    $timeinfo .= "$hour Hours ";
                }else{
                    $timeinfo .= "$hour Hour ";
                }
            }

            if($mins >= 1){
                $timeinfo .= "$mins Minutes ";
            }

            if ($sec > 0 ){
                $timeinfo .= "$sec Seconds ";
            }
        }
        return $timeinfo;
    }



}