<?php
/**
 * Created by PhpStorm.
 * User: Erika Pepe
 * Date: 2018-01-20
 * Time: 11:37 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    protected $table = 'wsl';
    protected $fillable = ['wsl_id_user','wsl_id_drink'];
}