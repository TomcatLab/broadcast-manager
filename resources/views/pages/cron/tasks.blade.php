@extends('layout')

@section('content')

    <div class="page-wrapper">
        <div class="page-content">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <div>
                    <h4 class="mb-3 mb-md-0">Running Jobs</h4>
                </div>
            </div>
            @if(count($tasks))
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Crone Jobs</h6>
                            <!-- <p class="card-description">Add class <code>.table-bordered</code></p> -->
                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="10">
                                                #
                                            </th>
                                            <th>
                                                Name
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($tasks as $task)
                                        <tr>
                                            <td>
                                                {{ $task->id }}
                                            </td>
                                            <td>
                                                {{  $task->description }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
                <div class="alert alert-danger" role="alert">
                    No Crone Jobs available
                </div>
            @endif
        </div>
    </div>
@endsection