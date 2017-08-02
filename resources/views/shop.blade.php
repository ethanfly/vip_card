@extends('layouts.app')

@section('content')
    <div class="container" style="color:#000">
        <div class="row">
            <div class="banner">
                <img src="{{$shop->img}}" alt="{{$shop->name}}" width="100%">
            </div>
            <div class="white-box shop-top">
                <h4 class="title">{{$shop->name}}</h4>
                <div class="tag">
                    @foreach($shop->tags as $tag)
                        {{$tag->tag.' '}}
                    @endforeach
                </div>
                <p class="content">{{$shop->introduce}}</p>
            </div>
            <div class="white-box shop-address">
                <div class="left">
                    <p>{{$shop->province.$shop->city.$shop->address}}</p>
                    <p class="icon"><i class="glyphicon glyphicon-map-marker"></i>{{$shop->distance}}KM</p>
                </div>
                <div class="call">
                    <a href="tel:{{$shop->phone}}" class="phone"><i class="glyphicon glyphicon-earphone"></i></a>
                </div>
            </div>
            <div class="white-box shop-card">
                <p>本店会员卡（{{$shop->cards?$shop->cards->count():0}}）</p>
            </div>
            <div class="col-sm-12">
                @foreach($shop->cards as $card)
                    @if($card->type=='打折卡')
                        <div class="shop-cards type1">
                    @elseif($card->type=='充值打折卡')
                        <div class="shop-cards type2">
                    @elseif($card->type=='充送卡')
                        <div class="shop-cards type3">
                    @elseif($card->type=='次数卡')
                        <div class="shop-cards type4">
                    @endif
                            <div class="bg">
                                <img src="{{$card->img}}" alt="{{$card->name}}" width="60" height="60" class="icon">
                                <div class="content">
                                    <div class="left">
                                        <h4>{{$shop->name}}</h4>
                                        @if($card->type=='打折卡')
                                            <h3>{{$card->discount}}折</h3>
                                        @elseif($card->type=='充值打折卡')
                                            <h3>{{$card->discount}}折<small>加送{{$card->send_price}}元</small></h3>
                                        @elseif($card->type=='充送卡')
                                            <h3>充{{$card->buy_price}}送{{$card->send_price}}元</h3>
                                        @elseif($card->type=='次数卡')
                                            <h3>免费{{$card->frequency}}次</h3>
                                        @endif
                                    </div>
                                    <div class="right">
                                        <div class="money">￥{{$card->buy_price}}</div>
                                        <div class="type">{{$card->type}}</div>
                                    </div>
                                </div>
                            </div>
                            <a href="/card/{{$card->id}}" class="look">查看权限</a>
                            <a href="javascript:void(0)" class="buy">立即购买</a>
                        </div>
                @endforeach
            </div>
            <div class="white-box shop-link">
                <h4>关联店铺（4）<span>会员卡也可以在以下店铺消费哦</span></h4>
            </div>
            <index-list link_shops="{{$shop->id}}"></index-list>
        </div>
    </div>
@endsection
