<template>
    <div class="list">
        <div class="item" v-for="item in list">
            <a class="media" :href="shopUrl(item.id)">
                <div class="media-left">
                    <img class="media-object" :src="item.img" alt="" width="112" height="70">
                </div>
                <div class="media-body">
                    <h4 class="media-heading"><span
                            class="title">{{item.name}}</span><span>{{Number(item.distance).toFixed(2)}}KM</span>
                    </h4>
                    <p class="tags">
                        <template v-for="tag in item.tags">{{tag}}&nbsp;</template>&nbsp;
                    </p>
                    <p class="msg">已有会员卡{{item.cards_count}}种<span>{{item.users_count}}人成为本店会员</span></p>
                </div>
            </a>
            <div class="cards">
                <template v-if="item.cards.price && item.cards.title">
                    <span class="price">￥{{item.cards.price}}</span>
                    <span class="title">{{item.cards.title}}</span>
                    <span class="more"><a href="###">更多>></a></span>
                </template>
                <template v-else>
                    <p class="text-center">没有添加会员卡！</p>
                </template>
            </div>
        </div>
        <p class="text-center" v-if="end">已经到底啦！</p>
    </div>
</template>

<script>
    import bus from './../../eventBus';
    export default {
        props: ['link_shops'],
        data(){
            return {
                tag_id: '',
                end: false,
                pages: 1,
                search: '',
                list: [],
                lng: '',
                lat: ''
            };
        },
        created(){
            this.onscroll();
        },
        mounted() {
            let self = this;
            // 百度地图API功能
            let geolocation = new BMap.Geolocation();
            geolocation.getCurrentPosition(function (r) {
                if (this.getStatus() === BMAP_STATUS_SUCCESS) {
                    self.lng = r.point.lng;//经度
                    self.lat = r.point.lat;//纬度
                    self.getList();
                }
                else {
                    alert('定位失败，请刷新页面重试！');
                }
            }, {enableHighAccuracy: true});
            bus.$on('search', msg => {
                self.list = [];
                self.search = msg.search ? msg.search : '';
                self.tag_id = msg.tag_id ? msg.tag_id : '';
                self.pages = 1;
                self.end = false;
                this.getList();
            });
        },
        computed: {},
        methods: {
            shopUrl(id){
                return '/shop/' + id + '?lng=' + this.lng + '&lat=' + this.lat;
            },
            getList(){
                let self = this;
                axios.get(api.shop.list, {
                    params: {
                        link_shops: self.link_shops,
                        tag_id: self.tag_id,
                        search: self.search,
                        page: self.pages,
                        lng: self.lng,
                        lat: self.lat
                    }
                }).then(r => {
                    if (self.pages === r.data.last_page + 1) {
                        self.end = true;
                    } else {
                        self.pages = self.pages + 1;
                        self.list.push.apply(self.list, r.data.data);
                    }
                });
            },
            onscroll(){
                let self = this;
                window.onscroll = function () {
                    if (self.getScrollTop() + self.getClientHeight() === self.getScrollHeight()) {
                        self.getList();
                    }
                }
            },
            getScrollTop(){
                let scrollTop = 0;
                if (document.documentElement && document.documentElement.scrollTop) {
                    scrollTop = document.documentElement.scrollTop;
                }
                else if (document.body) {
                    scrollTop = document.body.scrollTop;
                }
                return scrollTop;
            },
            getClientHeight() {
                let clientHeight = 0;
                if (document.body.clientHeight && document.documentElement.clientHeight) {
                    clientHeight = Math.min(document.body.clientHeight, document.documentElement.clientHeight);
                }
                else {
                    clientHeight = Math.max(document.body.clientHeight, document.documentElement.clientHeight);
                }
                return clientHeight;
            },
            getScrollHeight() {
                return Math.max(document.body.scrollHeight, document.documentElement.scrollHeight);
            }
        }
    }
</script>
