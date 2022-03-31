<?php
$breadcrumbs = [
    "Dashboard"=>route('staff.dashboard'),
    "Organization | Create"=>"#"
];
?>
@section('css_plugins')
    <link href="{{ asset("organization/assets/themes/$person->theme/plugins/file-upload/file-upload-with-preview.min.css") }}" rel="stylesheet" type="text/css" />
@endsection
@extends('organization.layouts.app')

@section('content')

    <div class="layout-px-spacing">
        <div class="">
            @if($person->organization->count() < 1 )
                <h4 class="text-center mt-3">Organization Creation</h4>
                <p class="text-center">Lets setup your new Organization!</p>
            @else
                <h4 class="text-center mt-3">Create a new Organization</h4>
                <p class="text-center">Create a new organization to your Account</p>
            @endif

        </div>
        <form action="{{ route('store.organization') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row layout-top-spacing">
                <div class="col-6">
                    <div class="card card-body">
                        <div class="form-row mb-4">
                            <div class="form-group col">
                                <label for="inputEmail4">Organization Name *</label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="Organization Name" name="name" value="{{ old('name') }}" autofocus required="required">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email *</label>
                                <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" value="{{ old('email') }}" required="required">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Phone *</label>
                                <input type="text" class="form-control" id="inputPassword4" placeholder="Phone" name="phone" value="{{ old('phone') }}" required="required">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="inputAddress">Address *</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address" value="{{ old('address') }}" required="required">
                        </div>
                        <div class="form-group mb-4">
                            <label for="inputAddress">Public Access *</label>
                            <select name="public" id="" class="form-control" required="required">
                                <option value="private" {{ old('private')==='private'?'selected':'' }}>Public cannot view without membership</option>
                                <option value="public" {{ old('public')==='public'?'selected':'' }}>Public can view without membership</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Create Organization</button>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card card-body">
                        <div class="custom-file-container" data-upload-id="myFirstImage">
                            <label>Upload Organization Logo <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                            <label class="custom-file-container__custom-file" >
                                <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*" name="image">
                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                            </label>
                            <div class="custom-file-container__image-preview"></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('custom_js')
    <script src="{{ asset("organization/assets/themes/$person->theme/plugins/file-upload/file-upload-with-preview.min.js") }}"></script>
    <script>
        var firstUpload = new FileUploadWithPreview('myFirstImage')
    </script>

@endsection

