<template>
    <div class="footer-menu">
        <div class="borrow">
            <button type="button" @click="borrow()">
                <div><i class="glyphicon glyphicon-credit-card"></i></div>
                <div>我要借卡</div>
            </button>
        </div>
        <div class="share">
            <button type="button">
                <div><i class="glyphicon glyphicon-share"></i></div>
                <div>转发借卡</div>
            </button>
        </div>
        <button type="button" class="buy" @click="buyCard()">立即购买</button>
    </div>
</template>

<script>
    export default {
        props: ['card_id'],
        data(){
            return {
                card: {}
            };
        },
        mounted() {
        },
        computed: {},
        methods: {
            buyCard(){
                let self = this;
                axios.get(api.card.show, {
                    params: {
                        card_id: self.card_id
                    }
                }).then(r => {
                    self.card = r.data;
                });
            },
            share(){
                let self = this;
                wx.onMenuShareAppMessage({
                    title: self.card.name, // 分享标题
                    desc: self.card.introduce, // 分享描述
                    link: '', // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
                    imgUrl: self.card.shop.img, // 分享图标
                    type: 'link', // 分享类型,music、video或link，不填默认为link
                    dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
                    success: function () {
                        // 用户确认分享后执行的回调函数
                    },
                    cancel: function () {
                        // 用户取消分享后执行的回调函数
                    }
                });
                wx.onMenuShareTimeline({
                    title: self.card.name, // 分享标题
                    link: '', // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
                    imgUrl: self.card.shop.img, // 分享图标
                    success: function () {
                        // 用户确认分享后执行的回调函数
                    },
                    cancel: function () {
                        // 用户取消分享后执行的回调函数
                    }
                });
            },
            borrow(){
                window.location = api.borrow.show;
            }
        }
    }
</script>
