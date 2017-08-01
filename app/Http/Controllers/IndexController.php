<?php

namespace App\Http\Controllers;

use App\Shop;
use App\Tag;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function shopList(Request $request)
    {
        $search = $request->search;
        $lng = $request->lng;
        $lat = $request->lat;
        if ($request->has('tag_id') && $request->tag_id) {
            $shops = Shop::where('name', 'like', "%$search%")
                ->whereHas('tags', function ($query) use ($request) {
                    $query->where('tags.id', $request->tag_id);
                })
                ->get();
        } else {
            $shops = Shop::where('name', 'like', "%$search%")
                ->get();
        }
        foreach ($shops as $shop) {
            $shop->distance = GetDistance($lat, $lng, $shop->latitude, $shop->longitude);
        }
        $shops = $shops->sortBy('distance');
        $shops = $shops->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'img' => $item->img,
                'distance' => $item->distance,
                'tags' => $item->tags->map->tag,
                'cards_count' => '6',//会员卡数量
                'users_count' => '3245',//会员数量
                'cards' => [
                    'price' => '156',
                    'title' => '9.8折打折卡',
                ],//最热门的会员卡
            ];
        });
        $shops = paginate($request, $shops->toArray(), 5);
        return response()->json($shops);
    }

    public function shopDetails($id, Request $request)
    {
        $shop = Shop::find($id);
        $shop->distance = GetDistance($request->lat, $request->lng, $shop->latitude, $shop->longitude);
        return view('shop', [
            'shop' => $shop
        ]);
    }

    public function tagsList()
    {
        $tags = Tag::all();
        return response()->json($tags);
    }
}
