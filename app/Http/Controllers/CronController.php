<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;
use App\Models\Providers;
use App\Models\ProviderCategories;
use App\Models\Categories;
use App\Models\Posts;
use App\Models\Medias;
use Carbon\Carbon;

use Bbc;

class CronController extends Controller
{
    public $data;
    public $tasks;
    public $providers;
    public $providerCategories;
    public $posts;

    //
    public function __construct()
    {
        $this->data['breadcrumb'] = [
            ['Providers','providers'],
            ['New']
        ];
        $this->data['refresh'] = 0;
        $this->tasks = new Tasks;
        $this->providers = new Providers;
        $this->providerCategories = new ProviderCategories;
        $this->posts = new Posts;
    }

    public function index()
    {
        $this->data['count'] = $this->tasks->get()->count();
        $this->data['tasks'] = [];
        
        set_time_limit(8000);

        if(!$this->data['count']){
            $this->data['providers'] =  $this->providers->where('status',1)->get();
            if($this->data['providers']->count()){
                foreach ($this->data['providers'] as $key => $provider) {
                    $this->data['providerCategories'][$provider->id] = $this->providerCategories->where('provider',$provider->id)->get();
                    foreach ( $this->data['providerCategories'][$provider->id] as $providerCategories) {
                        $description = "Fetch Feeds from ".$provider->title;
                        $action = "fetch_feeds";
                        // Provider Category ID
                        $param_1 = $providerCategories->id;
                        // Provider ID
                        $param_2 = $providerCategories->provider;
                        // Category ID
                        $param_3 = $providerCategories->category;
                        // Feed URL
                        $param_4 = $providerCategories->feedurl;
                        // Facade
                        $facade = $provider->facade;

                        $this->setTask($description, $action, $facade, null, $param_1, $param_2, $param_3, $param_4);
                        // $this->data['refresh'] = 1;
                    }
                }
                if(!$this->tasks->where('action','og')->get()->count()){
                    $this->setTaskOg();
                }
            }
            $this->doTask();
        }else{
           $this->doTask();
        }
        //return $this->data;
        $this->data['crone'] = true;
        $this->data['tasks'] =  $this->tasks->orderBy('id', 'asc')->get();
        return view('pages.cron.tasks', $this->data);
    }
    private function doTask()
    {
        $this->data['tasks'] =  $this->tasks->orderBy('id', 'asc')->get();
        foreach ($this->data['tasks'] as $task) {
            switch ($task->action) {
                case 'fetch_feeds':
                    $this->data[$task->facade] = $task->facade::fetch($task->param_1, $task->param_2, $task->param_3, $task->param_4);
                    if(count($this->data[$task->facade]['posts'])){
                        $this->setPosts($this->data[$task->facade]['posts']);
                        Tasks::where('id',$task->id)->delete();
                    }
                    //$this->data[$task->facade]['medias'] = $this->data[$task->facade]['medias'];
                    break;
                case 'og':
                    $this->data['post'] = $this->posts->where('og',0)->get();
                    foreach ($this->data['post'] as $post) {
                        $this->data['og'] = $task->facade::fetch($post->ext_link);
                        //break;
                        sleep(1);
                    }
                    Tasks::where('id',$task->id)->delete();
                    if(!count($this->data['post'])){
                        Tasks::where('id',$task->id)->delete();
                    }
                    break;
                default:
                    
                    break;
            }
            //break;
            sleep(1);
        }
        if($this->tasks->get()->count() > 0) $this->data['refresh'] = 1;
    }
    private function setTaskOg()
    {   
        $description = "Open Graph";
        $action = "og";
        $facade = "OpenGraph";
        $this->setTask($description, $action, $facade);
    }

    private function setTask(
        $description = null,
        $action = null,
        $facade = null,
        $key = null,
        $param_1 = null,
        $param_2 = null,
        $param_3 = null,
        $param_4 = null,
        $param_5 = null,
        $param_6 = null,
        $param_7 = null,
        $param_8 = null,
        $param_9 = null)
    {
        $tasks = new Tasks;
        $tasks->description = $description;
        $tasks->action = $action;
        $tasks->facade = $facade;
        $tasks->param_1 = $param_1;
        $tasks->param_2 = $param_2;
        $tasks->param_3 = $param_3;
        $tasks->param_4 = $param_4;
        $tasks->param_5 = $param_5;
        $tasks->param_6 = $param_6;
        $tasks->param_7 = $param_7;
        $tasks->param_8 = $param_8;
        $tasks->param_9 = $param_9;
        $tasks->save();
    }
    private function setPosts($posts)
    {
        $this->posts->insertOrIgnore($posts);
    }
}
