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
    protected $fillable = ['ckt_id_cocktail','ckt_st_name', 'ckt_st_recipe', 'ckt_st_serve', 'ckt_id_user', 'ckt_id_category'];

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
    /**
     * Get the user for the cocktail.
     */
    public function user()
    {
        $this->hasOne('App\User', 'ckt_id_user', 'ckt_id_cocktail');
    }
}
