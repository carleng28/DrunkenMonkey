<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CocktailIngredient extends Model
{
    //
    protected $fillable = ['cki_id_cocktail', 'cki_id_ingredient', 'cki_st_measure'];
    protected $table = 'cki';

}
