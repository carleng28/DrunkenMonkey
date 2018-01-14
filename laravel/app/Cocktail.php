<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cocktail extends Model
{

    protected $primaryKey = 'ckt_id_cocktail';
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ckt';

    /**
     * The ingredients that belong to the Cocktail.
     */
    public function ingredients()
    {
        return $this->belongsToMany('App\Ingredient', 'cki', 'cki_id_cocktail', 'cki_id_ingredient')
            ->withPivot('cki_st_measure');
    }

    /**
     * Get the categories for the cocktail.
     */
    public function category()
    {
        $this->hasOne('App\Category', 'ckt_id_category', 'ckt_id_cocktail');
    }
}
