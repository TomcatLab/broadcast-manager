@extends('layout')

@section('content')

    @include('particles/common/header')

    <div class="page-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-12">
                    @include('particles/alert')
                </div>
            </div>
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">General Settings</h6>
                            <form class="forms-sample" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{!empty($settings->id) ? $settings->id : '' }}">
                                <div class="form-group">
                                    <label for="title">Domain</label>
                                    <input type="text" class="form-control" id="title" autocomplete="off" placeholder="Domain" name="domain" value="{{!empty($settings->domain) ? $settings->domain : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="title">Site Name</label>
                                    <input type="text" class="form-control" id="title" autocomplete="off" placeholder="Site Name" name="sitename" value="{{!empty($settings->sitename) ? $settings->sitename : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" autocomplete="off" placeholder="Title" name="title" value="{{!empty($settings->title) ? $settings->title : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" rows="5" name="description">{{!empty($settings->description) ? $settings->description : '' }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="keywords">Keywords</label>
                                    <textarea class="form-control" id="keywords" rows="5" name="keywords">{{!empty($settings->keywords) ? $settings->keywords : '' }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Image 
                                        @if(!empty($settings->image))
                                        <a type="button" class="" data-toggle="modal" data-target=".bd-example-modal-xl">{{!empty($settings->image) ? "Show Logo" : '' }}</a>
                                        @endif
                                    </label>
                                    <input type="file" name="logo" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary" type="button">Upload Image</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tagline">Tagline</label>
                                    <input type="text" class="form-control" id="tagline" autocomplete="off" placeholder="Tagline" name="tagline" value="{{!empty($settings->tagline) ? $settings->tagline : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="canonical">Canonical</label>
                                    <input type="text" class="form-control" id="canonical" autocomplete="off" placeholder="Canonical" name="canonical" value="{{!empty($settings->canonical) ? $settings->canonical : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="timezone">Timezone</label>
                                    <select class="form-control" id="timezone">
                                        <option selected="" disabled="">Select Timezone</option>
                                        @foreach($tzlist as $key => $item)
                                        <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="timeformat">Time Format</label>
                                    <input type="text" class="form-control" id="timeformat" autocomplete="off" placeholder="Time Format" name="timeformat" value="{{!empty($settings->timeformat) ? $settings->timeformat : '' }}">
                                </div>
                                <!-- <div class="form-group">
                                    <label for="canonical">og:title</label>
                                    <input type="text" class="form-control" id="canonical" autocomplete="off" placeholder="Canonical" name="canonical" value="{{!empty($form->canonical) ? $form->canonical : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="canonical">og:url </label>
                                    <input type="text" class="form-control" id="canonical" autocomplete="off" placeholder="Canonical" name="canonical" value="{{!empty($form->canonical) ? $form->canonical : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="canonical">og:description</label>
                                    <input type="text" class="form-control" id="canonical" autocomplete="off" placeholder="Canonical" name="canonical" value="{{!empty($form->canonical) ? $form->canonical : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="canonical">og:image</label>
                                    <input type="text" class="form-control" id="canonical" autocomplete="off" placeholder="Canonical" name="canonical" value="{{!empty($form->canonical) ? $form->canonical : '' }}">
                                </div> -->
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
                <img src="{{!empty($settings->image) ? url($settings->image) : '' }}" alt="" width="100%">
            </div>
        </div>
        </div>

        @include('particles/common/footer')

    </div>
@endsection