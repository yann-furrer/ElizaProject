<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecipeIng extends Model
{
    protected $primaryKey = 'id_recipe';
    protected $fillable = [
        'id_recipe',
        'id_ingredient',
        
    ];
    
   
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/recipe-ings/'.$this->getKey());
    }
}