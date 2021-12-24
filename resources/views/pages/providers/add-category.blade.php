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
									<label>Providers</label>
									<select class="form-control mb-3" name="provider" >
										<option selected>Select provider</option>
                                        @foreach($providers as $provider)
										<option value="{{ $provider->id }}" {{ $provider->id == $providerId ? "Selected" : "" }} >{{ $provider->title }}</option>
                                        @endforeach
									</select>
								</div>
                                <div class="form-group">
                                    <label for="title">Category Name</label>
                                    <select class="form-control mb-3" name="category" >
										<option selected>Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ !empty($providerCategory->id) && $providerCategory->category == $category->id  ? "selected" : "" }}>{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="feedurl">Feed URL</label>
                                    <input type="text" class="form-control" id="feedurl" autocomplete="off" placeholder="Feed URL" name="feedurl" value="{{ !empty($providerCategory->feedurl) ? $providerCategory->feedurl : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="feedUrl">Country</label>
                                    <select class="form-control" id="countries" name="country">
                                        <option value="0" selected>Select Country</option>
                                        @foreach($countries as $country)
                                        <option value="{{ $country->id }}" {{!empty($providerCategory->country) && $providerCategory->country == $country->id ? "selected" : '' }}>{{ $country->code }}-{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Image
                                        @if(!empty($providerCategory->image))
                                        <a type="button" class="" data-toggle="modal" data-target=".bd-example-modal-xl">{{!empty($providerCategory->image) ? "Show Logo" : '' }}</a>
                                        @endif
                                    </label>
                                    <input type="file" name="image" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary" type="button">Upload Image</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="keywords">Keywords</label>
                                    <textarea class="form-control" id="keywords" rows="5" name="keywords">{{ !empty($providerCategory->keywords) ? $providerCategory->keywords : '' }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" rows="5" name="description">{{ !empty($providerCategory->description) ? $providerCategory->description : '' }}</textarea>
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
                    <img src="{{!empty($providerCategory->image) ? url($providerCategory->image) : '' }}" alt="" width="100%">
                </div>
            </div>
        </div>

        @include('particles/common/footer')

    </div>
@endsection