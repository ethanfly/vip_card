<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopCertification extends Model
{
    protected $guarded = [];

    public function Shop()
    {
        return $this->belongsTo('App\Shop');
    }
}
