<template>
    <div class="menu">
        <a class="box" v-for="tag in tags" @click="change(tag.id)">
            <dl>
                <dd>
                    <img :src="tag.icon" :alt="tag.tag" width="30" height="28">
                </dd>
                <dt>{{tag.tag}}</dt>
            </dl>
        </a>
    </div>
</template>

<script>
    import bus from './../../eventBus';
    export default {
        data(){
            return {
                tags: []
            };
        },
        mounted() {
            axios.get('tags').then(r => {
                this.tags = r.data;
            });
        },
        computed: {},
        methods: {
            change(id){
                bus.$emit('search', {tag_id: id});
            }
        }
    }
</script>
