<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cgr';
    protected $fillable = ['cgr_id_category', 'cgr_st_name'];
}
