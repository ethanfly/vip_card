<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $guarded = [];

    public function ShopCertification()
    {
        return $this->hasOne('App\ShopCertification');
    }

    public function ShopPayInformation()
    {
        return $this->hasOne('App\ShopPayInformation');
    }
}
