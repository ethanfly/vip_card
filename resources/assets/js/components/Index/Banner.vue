<template>
    <div class="banner">
        <div class="slider">
            <ul class="slides">
                <li class="slide">
                    <a href="javascript:void(0)" class="box"
                       style="background:url('/img/banner1.png') no-repeat center center; background-size: cover">
                    </a>
                </li>
                <li class="slide">
                    <a href="javascript:void(0)" class="box"
                       style="background:url('/img/banner1.png') no-repeat center center; background-size: cover">
                    </a>
                </li>
                <li class="slide">
                    <a href="javascript:void(0)" class="box"
                       style="background:url('/img/banner1.png') no-repeat center center; background-size: cover">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    require('./../../jquery.glide');
    export default {
        data(){
            return {};
        },
        mounted() {
            $('.slider').glide({
                animationTime: 500, //动画过度效果，只有当浏览器支持CSS3的时候生效
                arrows: false, //是否显示左右导航器
                nav: true, //主导航器也就是本例中显示的小方块
                navCenter: true, //主导航器位置是否居中
                navClass: "slider-nav",//主导航器外部div类名
                navItemClass: "slider-nav__item", //本例中小方块的样式
                navCurrentItemClass: "slider-nav__item--current" //被选中后的样式
            });
        },
        computed: {},
        methods: {}
    }
</script>
<style>
    .slide .box {
        display: block;
        width: 100%;
        height: 100%;
        line-height: 140px;
        text-align: center;
        font-size: 5em;
        color: #fff;
        text-transform: capitalize;
        vertical-align: middle;
    }

    .slide .box img {
        display: block;
    }

    /*
 | ------------------------------------------
 | Glide styles
 | ------------------------------------------
 | Here are slider styles
 |
*/

    .slider {
        position: relative;
        width: 100%;
        height: 140px;
        overflow: hidden;
    }

    .slides {
        height: 100%;
        list-style: none;
        padding-left: 0;
        /* Simple clear fix */
        overflow: hidden;

        /**
         * Prevent blinking issue
         * Not tested. Experimental.
         */
        -webkit-backface-visibility: hidden;
        -webkit-transform-style: preserve-3d;

        /**
         * Here is CSS transitions
         * responsible for slider animation in modern broswers
         */
        -webkit-transition: all 500ms cubic-bezier(0.165, 0.840, 0.440, 1.000);
        -moz-transition: all 500ms cubic-bezier(0.165, 0.840, 0.440, 1.000);
        -ms-transition: all 500ms cubic-bezier(0.165, 0.840, 0.440, 1.000);
        -o-transition: all 500ms cubic-bezier(0.165, 0.840, 0.440, 1.000);
        transition: all 500ms cubic-bezier(0.165, 0.840, 0.440, 1.000);
    }

    .slide {
        height: 100%;
        float: left;
        clear: none;
    }

    .slider-nav {
        position: absolute;
        bottom: 7px;
    }

    .slider-nav__item {
        opacity: 0.8;
        width: 15px;
        height: 5px;
        float: left;
        clear: none;
        display: block;
        margin: 0 5px;
        background: #fff;
    }

    .slider-nav__item:hover {
        opacity: 0.8;
        background: #222;
    }

    .slider-nav__item--current {
        opacity: 0.8;
        background: #222;
    }
</style>