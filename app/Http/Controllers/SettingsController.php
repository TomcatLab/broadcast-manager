<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;
use App\Models\Menus;
use App\Models\ProviderCategories;
use App\Models\Categories;

use Session;
use DateTimeZone;
//use Image;

class SettingsController extends Controller
{
    public $data = [];
    public $Settings = [];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->settings = new Settings;
        $this->request = new Request;
        $this->menus = new Menus;
        $this->categories = new Categories;
        $this->providercategories = new ProviderCategories;
    }
    //
    public function general()
    {
        $this->data['tzlist'] = DateTimeZone::listIdentifiers(DateTimeZone::ALL);
        $this->data['settings'] = $this->settings->first();
        return view('pages.settings.general',$this->data);
    }
    public function generalSave(Request $request)
    {
        if($request->logo){
            $logoName = strtolower(str_replace(" ","_",$request->input('title')));
            $logoFullPath = 'assets/images/site/'.$logoName.".".$request->logo->extension();
            $logoNewName = $logoName.".".$request->logo->extension();
            $request->logo->move(public_path('assets/images/site/'), $logoNewName);
        }else{
            $logoFullPath = null;
        }

        $id = $request->input('id');
        if($id){
            $settings = Settings::where('id',$id)->first();
        }else{
            $settings = new Settings;
        }
        $settings->domain = $request->input('domain');
        $settings->sitename = $request->input('sitename');
        $settings->title = $request->input('title');
        $settings->description = $request->input('description');
        $settings->keywords = $request->input('keywords');
        $settings->canonical = $request->input('canonical');
        $settings->tagline = $request->input('tagline');
        $settings->timeformat = $request->input('timeformat');
        if($logoFullPath) $settings->image = $logoFullPath;
        $settings->save();

        Session::flash('status', true);
        Session::flash('message', "Settings saved successful!");
        
        return redirect('settings/general');
    }

    public function menu()
    {
        $this->data['menus'] = $this->menus->get();
        $this->data['locations'] = [
            "1" => "Primary",
            "2" => "Secondary"
        ];
        $this->data['categories'] = $this->providercategories
                                        ->select('categories.title as categoryTitle','providers.title as providersTitle','provider_categories.id as providerCategoryId')
                                        ->leftJoin('categories', 'categories.id', '=', 'provider_categories.category')
                                        ->leftJoin('providers', 'providers.id', '=', 'provider_categories.provider')->get();
        return view('pages.settings.menu',$this->data);
    }
    public function saveMenu(Request $request)
    {
        $limit = 20;
        $id = $request->input('id');
        if($id){
            $menus = Menus::where('id',$id)->first();
            $menus->title = $request->input('title');
            $menus->key =  strtolower(str_replace(" ","_",$request->input('title')));
            $menus->parent = $request->input('parent');
            $menus->location = $request->input('location');
            $menus->og_title = $request->input('ogTitle');
            $menus->og_description = $request->input('ogDescription');
            $menus->og_keywords = $request->input('ogKeywords');
            $categories = $request->input('selectedCategories');

            for ($i=0; $i <= $limit; $i++) { 
                $item_name = "item_".$i;
                $menus->$item_name = isset($categories[$i])? $categories[$i] : null;
            }
        }else{
            $menus = new Menus;
            $menus->title = $request->input('title');
            $menus->key =  strtolower(str_replace(" ","_",$request->input('title')));
            $menus->parent = $request->input('parent');
            $menus->location = $request->input('location');
            $menus->og_title = $request->input('ogTitle');
            $menus->og_description = $request->input('ogDescription');
            $menus->og_keywords = $request->input('ogKeywords');
        }
        $menus->save();

        Session::flash('status', true);
        Session::flash('message', "Menus saved successful!");
        
        return redirect('settings/menu');
    }

    public function delete($id = null)
    {
        if($id){
            Menus::where('id',$id)->delete();

            Session::flash('status', true);
            Session::flash('message', "Menu deleted successful!");
            
            return redirect('settings/menu');
        }
    }
}
