<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $table = 'pic';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pic_id_picture','pic_st_picname', 'pic_st_type','pic_st_picture', 'pic_id_user','pic_id_cocktail'
    ];

}
