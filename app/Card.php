<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $guarded = [];

    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }

    public function getBuyPriceAttribute($value)
    {
        $last = substr($value, -2);
        if ($last == '00') return (int)$value;
        else return $value;
    }

    public function getSendPriceAttribute($value)
    {
        $last = substr($value, -2);
        if ($last == '00') return (int)$value;
        else return $value;
    }
}
