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
                                    <label>Image
                                        @if(!empty($category->image))
                                        <a type="button" class="" data-toggle="modal" data-target=".bd-example-modal-xl">{{!empty($category->image) ? "Show Logo" : '' }}</a>
                                        @endif
                                    </label>
                                    <input type="file" name="image" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image" value="">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary" type="button">Upload Image</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ogTitle">OG Title</label>
                                    <input type="text" class="form-control" id="ogTitle" autocomplete="off" placeholder="OG Title" name="ogTitle" value="{{!empty($category->og_title) ? $category->og_title : ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="ogKeywords">OG Keywords</label>
                                    <textarea class="form-control" id="ogKeywords" rows="5" name="ogKeywords">{{!empty($category->og_keywords) ? $category->og_keywords : ''}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="ogDescription">OG Description</label>
                                    <textarea class="form-control" id="ogDescription" rows="5" name="ogDescription">{{!empty($category->og_description) ? $category->og_description : ''}}</textarea>
                                </div>                               
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <img src="{{!empty($category->image) ? url($category->image) : '' }}" alt="" width="100%">
                </div>
            </div>
        </div>

        @include('particles/common/footer')

    </div>
@endsection