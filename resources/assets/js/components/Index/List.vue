<template>
    <div class="list">
        <div class="item">
            <a class="media">
                <div class="media-left">
                    <img class="media-object" src="/img/list1.png" alt="" width="112" height="70">
                </div>
                <div class="media-body">
                    <h4 class="media-heading">外婆家餐饮1号店<span>0.23KM</span></h4>
                    <p class="tags">美食、餐饮</p>
                    <p class="msg">已有会员卡6种<span>5265人成为本店会员</span></p>
                </div>
            </a>
            <div class="cards">
                <span class="price">￥156.00</span>
                <span class="title">9.8折打折卡</span>
                <span class="more"><a href="###">更多>></a></span>
            </div>
        </div>
        <div class="item">
            <a class="media">
                <div class="media-left">
                    <img class="media-object" src="/img/list1.png" alt="" width="112" height="70">
                </div>
                <div class="media-body">
                    <!--<h4 class="media-heading">外婆家餐饮1号店<span>0.23KM</span></h4>-->
                    <h4 class="media-heading">{{search}}<span>0.23KM</span></h4>
                    <p class="tags">美食、餐饮</p>
                    <p class="msg">已有会员卡6种<span>5265人成为本店会员</span></p>
                </div>
            </a>
            <div class="cards">
                <span class="price">￥156.00</span>
                <span class="title">9.8折打折卡</span>
                <span class="more"><a href="###">更多>></a></span>
            </div>
        </div>
    </div>
</template>

<script>
    import bus from './../../eventBus';
    export default {
        data(){
            return {
                pages: 1,
                search: ''
            };
        },
        mounted() {
            let self = this;
            bus.$on('search', msg => {
                self.search = msg;
            });
            // 百度地图API功能
            let geolocation = new BMap.Geolocation();
            geolocation.getCurrentPosition(function (r) {
                if (this.getStatus() == BMAP_STATUS_SUCCESS) {
                    let lng = r.point.lng;//经度
                    let lat = r.point.lat;//纬度
//                    axios.get(api.shop.list, {
//                        params: {
//                            search: this.search,
//                            pages: this.pages
//                        }
//                    });
                }
                else {
                    alert('定位失败，请刷新页面重试！');
                }
            }, {enableHighAccuracy: true})
        },
        computed: {},
        methods: {}
    }
</script>
