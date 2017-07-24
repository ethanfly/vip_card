<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopPayInformation extends Model
{
    protected $guarded = [];

    public function Shop()
    {
        return $this->belongsTo('App\Shop');
    }
}
