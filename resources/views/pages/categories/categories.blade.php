@extends('layout')

@section('content')

    @include('particles/common/header')

    <div class="page-wrapper">
        <div class="page-content">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <div>
                    <h4 class="mb-3 mb-md-0">Categories</h4>    
                </div>
                <div class="d-flex align-items-center flex-wrap text-nowrap">                    
                    <a href="{{ url('categories/new-category') }}" type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
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
                            <h6 class="card-title mb-0">Categories</h6>
                        </div>
                        <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                            <tr>
                                <th class="pt-0"  width="10">#</th>
                                <th class="pt-0">Name</th>
                                <th class="pt-0"  width="100">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->title}}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{url('categories/new-category/'.$category->id)}}">Edit</a>
                                    <a class="btn btn-danger btn-sm" href="{{url('categories/delete-category/'.$category->id)}}">Delete</a>
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