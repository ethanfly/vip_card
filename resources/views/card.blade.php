@extends('layouts.app')

@section('content')
    <div class="container" style="color:#000">
        <div class="row">
            <div class="col-sm-12">
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
                                                    <img src="{{$card->img}}" alt="{{$card->name}}" width="60"
                                                         height="60" class="icon">
                                                    <div class="content">
                                                        <div class="left">
                                                            <h4>{{$card->shop->name}}</h4>
                                                            @if($card->type=='打折卡')
                                                                <h3>{{$card->discount}}折</h3>
                                                            @elseif($card->type=='充值打折卡')
                                                                <h3>{{$card->discount}}折
                                                                    <small>加送{{$card->send_price}}元</small>
                                                                </h3>
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
                                                <div class="col-sm-12 bottom">售价：
                                                    <span class="red"><strong>￥{{$card->buy_price}}元</strong></span>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="col-sm-12 white-box">
                                        <div class="card-introduce">
                                            <h4>权限说明</h4>
                                            <hr>
                                            <div class="introduce">
                                                {{$card->introduce}}
                                            </div>
                                        </div>
                                    </div>
                            </div>
                    </div>
                    <footer-menu card_id="{{$card->id}}"></footer-menu>
@endsection
