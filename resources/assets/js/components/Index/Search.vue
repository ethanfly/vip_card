<template>
    <div class="search">
        <div class="left">
            <i class="glyphicon glyphicon-map-marker"></i>
            <a href="javascript:void(0)">{{address}}</a>
        </div>
        <div class="center">
            <div class="search-box">
                <div class="icon">
                    <i class="glyphicon glyphicon-search"></i>
                </div>
                <div class="input">
                    <input type="search" @change="change" v-model="search" placeholder="请输入你想要搜索的商家">
                </div>
            </div>
        </div>
        <div class="right">
            <a href="javascript:void(0)">商家入驻</a>
        </div>
    </div>
</template>

<script>
    import bus from './../../eventBus';
    export default {
        data(){
            return {
                search: '',
                address: '杭州'
            };
        },
        mounted() {
        },
        computed: {},
        methods: {
            change(){
                bus.$emit('search', this.search);
            }
        }
    }
</script>
