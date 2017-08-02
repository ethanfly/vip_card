<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use stdClass;

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

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function parent()
    {
        return $this->belongsTo('App\Shop', 'parent_id');
    }

    public function sons()
    {
        return $this->hasMany('App\Shop', 'parent_id');
    }

    public function cards()
    {
        return $this->hasMany('App\Card');
    }

    public function links()
    {
        if ($this->parent) {
            $shops = $this->parent->sons()->where('id', '!=', $this->id)->get()->push($this->parent);
        } else if ($this->sons) {
            $shops = $this->sons;
        } else {
            $shops = collect([]);
        }
        return $shops;
    }
}
