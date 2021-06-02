<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IngredientCocktail extends Model
{
    protected $fillable = [
        'name_drink',
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/ingredient-cocktails/'.$this->getKey());
    }
}
