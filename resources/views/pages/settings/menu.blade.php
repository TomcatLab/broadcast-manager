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
                            <h6 class="card-title">Menus</h6>
                            <form class="forms-sample" method="POST" enctype="multipart/form-data">
                                 @csrf
                                <div class="form-group">
                                    <label for="menuname">Menu Name</label>
                                    <input type="text" class="form-control" id="title" autocomplete="off" placeholder="Menu Name" name="title" value="{{!empty($form->title) ? $form->title : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="tagline">Menu Location</label>
                                    <select class="form-control" name="location">
                                        <option selected value="0">Select menu location</option>
                                        @foreach($locations as $key => $location)
                                        <option value="{{ $key }}">{{ $location }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tagline">Menu Parent</label>
                                    <select class="form-control" name="parent">
                                        <option selected value="0">Select parent menu</option>
                                        @foreach($menus as $menu)
                                        <option value="{{ $menu->id }}">{{ $menu->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button type="reset" class="btn btn-light">Cancel</button>
                            </form>
                            @foreach($menus as $key=>$menu)
                            <form class="forms-sample pt-4 pb-3" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $menu->id }}">
                                <input type="hidden" name="title" value="{{ $menu->title }}">
                                <input type="hidden" name="parent" value="{{ $menu->parent }}">
                                <input type="hidden" name="location" value="{{ $menu->location }}">

                                <h6 class="card-title mb-0">
                                    <a class="text-mute" data-toggle="collapse" href="#collapse{{$key}}" role="button" aria-expanded="false" aria-controls="collapse{{$key}}">
                                    {{ $menu->title }}
                                    </a>
                                </h6>
                                <!-- <div class="form-group">
                                    <input type="text" class="form-control" id="title" autocomplete="off" placeholder="Menu Name" name="Menu Name" value="{{!empty($form->menuname) ? $form->menuname : '' }}">
                                </div> -->
                                <div class="collapse mt-3" id="collapse{{$key}}">
                                    <div class="card card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="tagline">All Categories</label>
                                                    <select class="form-control allCategories" id="allCategories-{{$key}}" data-id="{{$key}}" multiple>
                                                        <option disabled data-id="{{$key}}">All Categories</option>
                                                        @foreach($categories as $category)
                                                        <option value="{{ $category->providerCategoryId }}" data-id="{{$key}}">{{ $category->providersTitle }}-{{ $category->categoryTitle }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="tagline">Added Categories</label>
                                                    <select class="form-control selectedCategories" id="selectedCategories-{{$key}}" data-id="{{$key}}" name="selectedCategories[]" multiple>
                                                        <option disabled>Selected Categories</option>
                                                        @foreach($categories as $category)
                                                        @if($category->providerCategoryId == $menu->item_0 ||
                                                            $category->providerCategoryId == $menu->item_1 ||
                                                            $category->providerCategoryId == $menu->item_2 ||
                                                            $category->providerCategoryId == $menu->item_3 ||
                                                            $category->providerCategoryId == $menu->item_4 ||
                                                            $category->providerCategoryId == $menu->item_5 ||
                                                            $category->providerCategoryId == $menu->item_6 ||
                                                            $category->providerCategoryId == $menu->item_7 ||
                                                            $category->providerCategoryId == $menu->item_8 ||
                                                            $category->providerCategoryId == $menu->item_9 ||
                                                            $category->providerCategoryId == $menu->item_10 ||
                                                            $category->providerCategoryId == $menu->item_11 ||
                                                            $category->providerCategoryId == $menu->item_12 ||
                                                            $category->providerCategoryId == $menu->item_13 ||
                                                            $category->providerCategoryId == $menu->item_14 ||
                                                            $category->providerCategoryId == $menu->item_15 ||
                                                            $category->providerCategoryId == $menu->item_16 ||
                                                            $category->providerCategoryId == $menu->item_17 ||
                                                            $category->providerCategoryId == $menu->item_18 ||
                                                            $category->providerCategoryId == $menu->item_19 ||
                                                            $category->providerCategoryId == $menu->item_20)
                                                            <option value="{{ $category->providerCategoryId }}" data-id="{{$key}}" selected>{{ $category->providersTitle }}-{{ $category->categoryTitle }}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <a href="{{ url('settings/menu/delete',$menu->id) }}" class="btn btn-danger mr-2">Delete</a>
                                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                                <button type="reset" class="btn btn-light">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>                               
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('particles/common/footer')

    </div>
@endsection