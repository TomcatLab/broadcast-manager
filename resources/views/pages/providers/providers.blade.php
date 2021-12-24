@extends('layout')

@section('content')

    @include('particles/common/header')

    <div class="page-wrapper">
        <div class="page-content">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <div>
                    <h4 class="mb-3 mb-md-0">Providers</h4>
                </div>
                <div class="d-flex align-items-center flex-wrap text-nowrap">                    
                    <a href="{{ url('providers/new-provider') }}" type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                        <i class="btn-icon-prepend" data-feather="file-plus"></i>
                        New
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    @include('particles/alert')
                </div>
            </div>
            <div class="row">
                <div class="col-12 stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-2">
                            <h6 class="card-title mb-0">Providers</h6>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="action" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="action">
                                    <a class="dropdown-item d-flex align-items-center" href="{{url('providers/publish-provider/PROVIDER_ID')}}"><i data-feather="plus-circle" class="icon-sm mr-2"></i> <span class="">Publish</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="{{url('providers/publish-provider/PROVIDER_ID/0')}}"><i data-feather="minus-circle" class="icon-sm mr-2"></i> <span class="">Un-Publish</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="{{url('providers/new-provider/PROVIDER_ID')}}"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="{{url('providers/delete-provider/PROVIDER_ID')}}"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th class="pt-0">#</th>
                                <th class="pt-0">Provider Name</th>
                                <th class="pt-0">Domain</th>
                                <th class="pt-0">Facade</th>
                                <th class="pt-0">Status</th>
                                <th class="pt-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($providers as $provider)
                            <tr>
                                <td>
                                    <div class="form-check m-0">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="provider" id="{{$provider->id}}" value="{{$provider->id}}">
                                            {{ $provider->id }}
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    {{ $provider->title }}
                                </td>
                                <td><a href="">{{ $provider->domain }}</a></td>
                                <td>{{ $provider->facade }}</td>
                                <td>
                                    @if($provider->status == 0)
                                        <span class="badge badge-danger">Coming Soon</span>
                                    @else
                                        <span class="badge badge-success">Published</span>
                                    @endif
                                </td>
                                <td width="200">
                                    <!-- <a class="btn btn-primary btn-sm" href="">Edit</a>
                                    @if($provider->status == 0)
                                        <a class="btn btn-primary btn-sm" href="">Publish</a>
                                    @else
                                        <a class="btn btn-warning btn-sm" href="{{url('providers/publish-provider/'.$provider->id.'/0')}}">Un-Publish</a>
                                    @endif
                                    <a class="btn btn-danger btn-sm" href="">Del</a> -->
                                    <button type="button" class="btn btn-warning btn-sm"  data-toggle="collapse" data-target="#categories-{{ $provider->id }}" aria-expanded="false" aria-controls="categories-{{ $provider->id }}">Show Categories</button>
                                    <a type="button" class="btn btn-warning btn-sm" href="{{url('providers/add-category/'.$provider->id)}}"> + Category</a>
                                </td>
                            </tr>
                            <tr class="collapse" id="categories-{{ $provider->id }}">
                                <td colspan="6" class="pr-0 pl-0">
                                    @if($providerCategories[$provider->id]->count())
                                    <table class="table table-primary mb-0">
                                        <thead>
                                            <tr>
                                                <th width="10">#</th>
                                                <th>Categories</th>
                                                <th width="100">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($providerCategories[$provider->id] as $providerCategory)
                                            <tr>
                                                <td>{{$providerCategory->providerCategoryId}}</td>
                                                <td>{{$providerCategory->title}}</td>
                                                <td>
                                                    <a type="button" class="btn btn-primary btn-sm" href="{{url('providers/edit-provider-category/'.$provider->id.'/'.$providerCategory->providerCategoryId)}}">Edit</a>
                                                    <a class="btn btn-danger btn-sm" href="{{url('providers/delete-provider-category/'.$providerCategory->providerCategoryId)}}">Del</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @else
                                        <div class="alert alert-danger" role="alert">Nothing Found</div>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div> 
                    </div>
                </div>
            </div> <!-- row -->
        </div>

        @include('particles/common/footer')

    </div>
@endsection