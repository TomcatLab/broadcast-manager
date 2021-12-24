<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;


class ProviderCategories extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = "provider_categories";

    public function getByProvider($id)
    {
        $providerCategories = DB::table($this->table)
                                ->select('categories.title as title',$this->table.'.id as providerCategoryId')
                                ->join('categories', $this->table.'.category', '=', 'categories.id')
                                ->where($this->table.'.'.$this->dates[0], null)
                                ->where($this->table.'.provider', $id)->get();
        return $providerCategories;
    }
}
