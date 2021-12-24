<div class="row">
    <div class="col-12 col-xl-12 stretch-card">
        <div class="row flex-grow">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                    <h6 class="card-title mb-0">Tasks</h6>
                    <!-- <div class="dropdown mb-2">
                        <button class="btn p-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a>
                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="printer" class="icon-sm mr-2"></i> <span class="">Print</span></a>
                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="download" class="icon-sm mr-2"></i> <span class="">Download</span></a>
                        </div>
                    </div> -->
                    </div>
                    <div class="row">
                    <div class="col-6 col-md-12 col-xl-5">
                        <h3 class="mb-2">{{$totalTasks}}</h3>
                        <div class="d-flex align-items-baseline">
                        <p class="text-success">
                            <span>+{{$runTask}}</span>
                            <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                        </p>
                        </div>
                    </div>
                    <div class="col-6 col-md-12 col-xl-7">
                        <script>var taskChart = {{$taskChart}}; </script>
                        <div id="taskChart" class="mt-md-3 mt-xl-0"></div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                    <h6 class="card-title mb-0">Posts</h6>
                    <!-- <div class="dropdown mb-2">
                        <button class="btn p-0" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton1">
                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a>
                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="printer" class="icon-sm mr-2"></i> <span class="">Print</span></a>
                        <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="download" class="icon-sm mr-2"></i> <span class="">Download</span></a>
                        </div>
                    </div> -->
                    </div>
                    <div class="row">
                    <div class="col-6 col-md-12 col-xl-5">
                        <h3 class="mb-2">{{ $totalPosts }}</h3>
                        <div class="d-flex align-items-baseline">
                        <p class="text-success">
                            <span>+{{$todayPosts}}</span>
                            <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                        </p>
                        </div>
                    </div>
                    <div class="col-6 col-md-12 col-xl-7">
                        <script>
                            var postsChart = {{$postsChart}}; 
                            var postsLabel = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11];
                        </script>
                        <div id="postsChart" class="mt-md-3 mt-xl-0"></div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- row -->