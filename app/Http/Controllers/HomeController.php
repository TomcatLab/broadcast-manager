<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;
use App\Models\Providers;
use App\Models\ProviderCategories;
use App\Models\Posts;

use Carbon\Carbon;
use DB;

class HomeController extends Controller
{
    public $data;
    public $tasks;
    public $providers;
    public $posts;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->tasks = new Tasks;
        $this->providers = new Providers;
        $this->providerCategories = new ProviderCategories;
        $this->posts = new Posts;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->getStatus();
        
        return view('pages.dashboard',$this->data);
    }

    public function status()
    {
        $this->data['tasks'] = $this->tasks->get();
        $this->getStatus();

        return view('pages.cron.status',$this->data);
    }

    private function getStatus()
    {
        $this->data['runTask'] = $this->tasks->get()->count();
        $this->data['totalTasks'] = $this->tasks->withTrashed()->count();
        $this->data['totalPosts'] = $this->posts->get()->count();
        $this->data['todayPosts'] = $this->posts->whereDate('created_at', Carbon::today())->get()->count();
        $this->data['taskChart'] = $this->tasks->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))->groupBy('date')->withTrashed()->get();
        $this->data['postsChart'] = $this->posts->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))->groupBy('date')->withTrashed()->get();

        $taskChart = [];
        foreach ($this->data['taskChart'] as $value) {
            $taskChart[] = $value->count;
        }
        $this->data['taskChart'] = json_encode($taskChart);

        $postsChart = [];
        foreach ($this->data['postsChart'] as $value) {
            $postsChart[] = $value->count;
        }
        $this->data['postsChart'] = json_encode($postsChart);
    }
}
