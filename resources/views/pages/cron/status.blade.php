@extends('layout')

@section('content')

    @include('particles/common/header')

    <div class="page-wrapper">
        <div class="page-content">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <div>
                    <h4 class="mb-3 mb-md-0">Cron Jobs</h4>    
                </div>
            </div>

            @include('particles/status')
            
            @if(count($tasks))
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Crone Jobs</h6>
                                <ul class="list-group list-group-flush">
                                    @foreach($tasks as $task)
                                    <li class="list-group-item">
                                        {{ $task->id }} - {{  $task->description }}
                                    </li>
                                    @endforeach
                                </ul>
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

        @include('particles/common/footer')
        
    </div>
@endsection