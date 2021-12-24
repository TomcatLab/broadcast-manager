@extends('layout')

@section('content')

    @include('particles/common/header')

    <div class="page-wrapper">
        <div class="page-content">
            @include('particles/breadcrumb')
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Category Information</h6>
                            <form class="forms-sample" method="POST" enctype="multipart/form-data">
                                 @csrf
                                <div class="form-group">
                                    <label for="title">Category Name</label>
                                    <input type="text" class="form-control" id="title" autocomplete="off" placeholder="Category Name" name="title" value="{{!empty($category->title) ? $category->title : ''}}">
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="image" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image" value="{{!empty($category->image) ? $category->image : ''}}">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary" type="button">Upload Image</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="keywords">Keywords</label>
                                    <textarea class="form-control" id="keywords" rows="5" name="keywords">{{!empty($category->keywords) ? $category->keywords : ''}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" rows="5" name="description">{{!empty($category->description) ? $category->description : ''}}</textarea>
                                </div>                               
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('particles/common/footer')

    </div>
@endsection