<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $primaryKey = 'pic_id_picture';
    protected $table = 'pic';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pic_id_picture','pic_st_picname', 'pic_st_type','pic_st_picture', 'pic_id_user','pic_id_cocktail', 'pic_bo_profilepic'
    ];

    /**
     * The picture belongs to a user.
     */
    public function user() {
        return $this->belongsTo('App\User');
    }

    /**
     * The picture belongs to a cocktail.
     */
    public function cocktail() {
        return $this->belongsTo('App\Cocktail');
    }




}
