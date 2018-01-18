<?php
/**
 * Created by PhpStorm.
 * User: Sada Rao
 * Date: 1/17/2018
 * Time: 7:53 PM
 */

namespace App;
use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    protected $table = 'drk';

    protected $primaryKey ='drk_id_drink';

    protected $fillable = ['drk_id_drink','drk_dc_rate'];
}