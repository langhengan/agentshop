<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderAdress extends Model
{
    //
    protected $table='order_adress';
    protected $primaryKey= 'adress_id';
    public $timestamps = false;
}
