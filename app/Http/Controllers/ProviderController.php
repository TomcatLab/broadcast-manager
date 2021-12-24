<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Providers;
use App\Models\ProviderCategories;
use App\Models\Categories;
use App\Models\Countries;
use Session;

class ProviderController extends Controller
{
    public $data;
    public $providers;
    public $ProviderCategories;
    public $categories;
    public $request;
    public $countries;

    public function __construct()
    {
        $this->middleware('auth');
        
        $this->data['breadcrumb'] = [
            ['Providers','providers'],
            ['New']
        ];
        $this->providers = new Providers;
        $this->ProviderCategories = new ProviderCategories;
        $this->categories = new Categories;
        $this->request = new Request;
        $this->countries = new Countries;
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['providers'] = $this->providers->get();
        foreach( $this->data['providers'] as $provider){
            $this->data['providerCategories'][$provider->id] = $this->ProviderCategories->getByProvider($provider->id);
        }
        return view('pages.providers.providers',$this->data);
    }

    public function new($id = null)
    {
        if($id){
            $this->data['form'] = $this->providers->find($id);
        }
        $this->data['countries'] = $this->countries->get();
        return view('pages.providers.new', $this->data);
    }

    public function save($id = null,Request $request)
    {
        if($request->input('logo')){
            $request->validate([
                'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $logo = time().'.'.$request->logo->extension();
            $request->logo->move(public_path('assets/images/providers/'), $logo);    
        }else{
            $logo = null;
        }

        if($id){
            $providers = Providers::where('id',$id)->first();
        }else{
            $providers = new Providers;
        }
        $providers->title = $request->input('title');
        $providers->domain = $request->input('domain');
        $providers->facade = $request->input('facade');
        $providers->feedurl = $request->input('feedurl');
        $providers->favicon = $request->input('favicon');
        $providers->country = $request->input('country');
        $providers->logo = $logo ? 'assets/images/providers/'.$logo : null;
        $providers->keywords = $request->input('keywords');
        $providers->description = $request->input('description');
       
        $providers->save();

        Session::flash('status', true);
        Session::flash('message', "Provider saved successful!");

        return redirect('providers');
    }

    public function publish($id = null, $publish = 1, Request $request)
    {
        $providers = Providers::where('id',$id)->first();
        $providers->status = $publish;
        $providers->save();

        if($publish){
            $message = "Published";
        }else{
            $message = "Un-Published";
        }
        Session::flash('status', true);
        Session::flash('message', "[".$id."] - Provider ".$message." successfully!");

        return redirect('providers');
    }

    public function addCategory($providerId = null, $ProviderCategoryId = null)
    {
        $this->data['breadcrumb'] = [
            ['Providers','providers'],
            ['Add Category']
        ];
        $this->data['categories'] = $this->categories->get();
        $this->data['providers'] = $this->providers->get();
        $this->data['countries'] = $this->countries->get();
        $this->data['providerId'] = $providerId;
        if($ProviderCategoryId){
            $this->data['providerCategory'] = $this->ProviderCategories->find($ProviderCategoryId);
        }
        return view('pages.providers.add-category', $this->data);
    }
    
    public function saveCategory($providerId = null, $ProviderCategoryId = null, Request $request)
    {
        if($request->input('image')){
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $image = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/images/providers/category/'), $image);    
        }else{
            $image = null;
        }
        if($ProviderCategoryId){
            $categories = ProviderCategories::where('id',$ProviderCategoryId)->first();
        }else{
            $categories = new ProviderCategories;
        }
        $categories->provider = $request->input('provider');
        $categories->category = $request->input('category');
        $categories->feedurl = $request->input('feedurl');
        $categories->country = $request->input('country');
        $categories->image = $image ? 'assets/images/providers/category/'.$image : null;
        $categories->keywords = $request->input('keywords');
        $categories->description = $request->input('description');
        $categories->save();

        Session::flash('status', true);
        Session::flash('message', "Category saved successful!");
        return redirect('providers');
    }

    public function delete($id = null)
    {
        if($id){
            Providers::where('id',$id)->delete();

            Session::flash('status', true);
            Session::flash('message', "Provider Deleted successful!");

            return redirect('providers');
        }
    }

    public function deleteProviderCategory($id = null)
    {
        if($id){
            ProviderCategories::where('id',$id)->delete();
            
            Session::flash('status', true);
            Session::flash('message', "Provider Category Deleted successful!");

            return redirect('providers');
        }
    }
}
