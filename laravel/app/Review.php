<?php
/**
 * Created by PhpStorm.
 * User: Sada Rao
 * Date: 1/17/2018
 * Time: 5:20 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
class Review extends Model
{
    protected $table = 'rvw';

    protected $fillable = ['rvw_id_review','rvw_st_review','rvw_dc_rate','rvw_id_user','rvw_id_drink'];

}