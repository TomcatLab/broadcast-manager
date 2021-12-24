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
                            <h6 class="card-title">Provider Information</h6>
                            <form class="forms-sample" method="POST" enctype="multipart/form-data">
                                 @csrf
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" autocomplete="off" placeholder="Title" name="title" value="{{!empty($form->title) ? $form->title : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="domain">Domain</label>
                                    <input type="text" class="form-control" id="domain" autocomplete="off" placeholder="Domain" name="domain" value="{{!empty($form->domain) ? $form->domain : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="facade">Facade</label>
                                    <input type="text" class="form-control" id="facade" autocomplete="off" placeholder="Facade" name="facade" value="{{!empty($form->facade) ? $form->facade : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="feedUrl">Feed URL</label>
                                    <input type="text" class="form-control" id="feedUrl" autocomplete="off" placeholder="Feed URL" name="feedurl" value="{{!empty($form->feedurl) ? $form->feedurl : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="favicon">Favicon</label>
                                    <input type="text" class="form-control" id="favicon" autocomplete="off" placeholder="Favicon" name="favicon" value="{{!empty($form->favicon) ? $form->favicon : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="feedUrl">Country</label>
                                    <select class="form-control" id="countries" name="country">
                                        <option value="0" selected>Select Country</option>
                                        @foreach($countries as $country)
                                        <option value="{{ $country->id }}" {{!empty($form->country) && $form->country == $country->id ? "selected" : '' }}>{{ $country->code }}-{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Logo

                                        @if(!empty($form->logo))
                                        <a type="button" class="" data-toggle="modal" data-target=".bd-example-modal-xl">{{!empty($form->logo) ? "Show Logo" : '' }}</a>
                                        @endif

                                    </label>
                                    <input type="file" name="logo" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Logo">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary" type="button">Upload Logo</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="keywords">Keywords</label>
                                    <textarea class="form-control" id="keywords" rows="5" name="keywords">{{!empty($form->keywords) ? $form->keywords : '' }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" rows="5" name="description">{{!empty($form->description) ? $form->description : '' }}</textarea>
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
                    <img src="{{!empty($form->logo) ? url($form->logo) : '' }}" alt="" width="100%">
                </div>
            </div>
        </div>

        @include('particles/common/footer')

    </div>
@endsection