<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table='customers';
    protected $fillable=['username','birthday','address','tel'];
    public function order(){
        return $this->hasMany('App\Order');
    }
}
