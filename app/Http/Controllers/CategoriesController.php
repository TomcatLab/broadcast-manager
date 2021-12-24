<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Providers;
use App\Models\Categories;
use Session;

class CategoriesController extends Controller
{
    public $data;
    public $categories;

    public function __construct()
    {
        $this->middleware('auth');
        # code...
        $this->data['breadcrumb'] = [
            ['Categories','categories'],
            ['New']
        ];
        $this->categories = new Categories; 
        $this->providers = new Providers;
    }

    public function index(Request $request)
    {
        $this->data['categories'] = $this->categories->get();
        return view('pages.categories.categories',$this->data);
    }

    public function new($id = null, Request $request)
    {
        $this->data['providers'] = $this->providers->get();

        if($id){
            $this->data['category'] = $this->categories->find($id);
        }
        return view('pages.categories.new',$this->data);
    }
    public function save($id = null, Request $request)
    {
        if($request->input('image')){
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $image = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/images/categories/'), $image);    
        }else{
            $image = null;
        }
        if($id){
            $categories = Categories::where('id',$id)->first();
        }else{
            $categories = new Categories;
        }
        $categories->title = $request->input('title');
        $categories->keywords = $request->input('keywords');
        $categories->description = $request->input('description');
        $categories->image = $request->input('image');
        $categories->save();

        Session::flash('status', true);
        Session::flash('message', "Category saved successful!");

        return redirect('categories');
    }
    public function delete($id = null)
    {
        if($id){
            Categories::where('id',$id)->delete();

            Session::flash('status', true);
            Session::flash('message', "Category Deleted successful!");

            return redirect('categories');
        }
    }
}
