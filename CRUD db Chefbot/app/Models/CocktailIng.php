<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CocktailIng extends Model
{
    protected $primaryKey = 'id_cocktail';
    protected $fillable = [
        'id_cocktail',
        'id_ingredient',
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/cocktail-ings/'.$this->getKey());
    }



}
