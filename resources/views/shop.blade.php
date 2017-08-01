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
                <div class="shop-cards type1">
                    <div class="bg">
                        <img src="/img/card1.png" alt="" width="60" height="60" class="icon">
                        <div class="content">
                            <div class="left">
                                <h4>{{$shop->name}}</h4>
                                <h3>8.5折</h3>
                            </div>
                            <div class="right">
                                <div class="money">￥200.00</div>
                                <div class="type">打折卡</div>
                            </div>
                        </div>
                    </div>
                    <a href="" class="look">查看权限</a>
                    <a href="" class="buy">立即购买</a>
                </div>
                <div class="shop-cards type2">
                    <div class="bg">
                        <img src="/img/card2.png" alt="" width="60" height="60" class="icon">
                        <div class="content">
                            <div class="left">
                                <h4>{{$shop->name}}</h4>
                                <h3>8.5折</h3>
                            </div>
                            <div class="right">
                                <div class="money">￥200.00</div>
                                <div class="type">打折卡</div>
                            </div>
                        </div>
                    </div>
                    <a href="" class="look">查看权限</a>
                    <a href="" class="buy">立即购买</a>
                </div>
                <div class="shop-cards type3">
                    <div class="bg">
                        <img src="/img/card3.png" alt="" width="60" height="60" class="icon">
                        <div class="content">
                            <div class="left">
                                <h4>{{$shop->name}}</h4>
                                <h3>8.5折</h3>
                            </div>
                            <div class="right">
                                <div class="money">￥200.00</div>
                                <div class="type">打折卡</div>
                            </div>
                        </div>
                    </div>
                    <a href="" class="look">查看权限</a>
                    <a href="" class="buy">立即购买</a>
                </div>
                <div class="shop-cards type4">
                    <div class="bg">
                        <img src="/img/card4.png" alt="" width="60" height="60" class="icon">
                        <div class="content">
                            <div class="left">
                                <h4>{{$shop->name}}</h4>
                                <h3>8.5折</h3>
                            </div>
                            <div class="right">
                                <div class="money">￥200.00</div>
                                <div class="type">打折卡</div>
                            </div>
                        </div>
                    </div>
                    <a href="" class="look">查看权限</a>
                    <a href="" class="buy">立即购买</a>
                </div>
            </div>
            <div class="white-box shop-link">
                <h4>关联店铺（4）<span>会员卡也可以在以下店铺消费哦</span></h4>
            </div>
            <div class="list">
                <div class="item">
                    <a class="media">
                        <div class="media-left">
                            <img class="media-object" src="{{$shop->img}}" alt="" width="112" height="70">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">
                                <span class="title"></span>
                                <span>KM</span>
                            </h4>
                            <p class="tags">
                                tags
                            </p>
                            <p class="msg">已有会员卡6种<span>222人成为本店会员</span></p>
                        </div>
                    </a>
                    <div class="cards">
                        <span class="price">￥22</span>
                        <span class="title">打折卡</span>
                        <span class="more"><a href="###">更多>></a></span>
                    </div>
                </div>
                <p class="text-center" v-if="end">已经到底啦！</p>
            </div>
        </div>
    </div>
@endsection
