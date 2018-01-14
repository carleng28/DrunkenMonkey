<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $primaryKey = 'igr_id_ingredient';
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'igr';

    /**
     * The cocktail that belong to the ingredient.
     */
    public function cocktails()
    {
        return $this->belongsToMany('App\Cocktail', 'cki', 'cki_id_ingredient', 'cki_id_cocktail');
    }
}
