<template>
    <div class="form-input">
        <div class="panels" :class="display2">
            我们已经将验证码短信发送到您手机<br/>
            {{phone.substr(0, 3) + '****' + phone.substr(7)}}
        </div>
        <input type="number" placeholder="请输入您的手机号" v-model="phone" :class="display">
        <input type="number" placeholder="请输入验证码" v-model="code" :class="display2" class="codeinput">
        <button :class="display2" class="sendcode" @click="sendCode">{{chance}}</button>
        <div class="clear"></div>
        <button class="submit" @click="nextStep" :class="display">下一步</button>
        <button class="submit" @click="submit" :class="display2">提交</button>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                phone: '',
                code: '',
                display: '',
                display2: 'hidden',
                times: 60
            };
        },
        mounted() {
        },
        computed: {
            chance() {
                if (this.times > 0) {
                    return this.times + '秒';
                } else {
                    return '重新发送'
                }
            }
        },
        methods: {
            nextStep(){
                if (this.checkPhone()) {
                    this.display = 'hidden';
                    this.display2 = 'show';
                    if (Number(this.times) > 0) {
                        $('.sendcode').attr("disabled", true);
                        this.sendCode();
                        this.changeNumber();
                    } else {
                        $('.sendcode').attr("disabled", false);
                    }
                } else {
                    alert("手机号码有误，请重填");
                }
            },
            checkPhone(){
                return (/^1[34578]\d{9}$/.test(this.phone));
            },
            changeNumber(){
                let that = this;
                setTimeout(function () {
                    that.changeNumber();
                    that.times--;
                }, 1000);
            },
            submit(){
                axios.put(api.user + user.id, {
                    phone: this.phone,
                    code: this.code
                }).then(res => {
                    if (res.data.code) {
                        window.location = api.index;
                    } else {
                        alert(res.data.msg);
                    }
                });
            },
            sendCode(){
                axios.post(api.tools.sendCode, {
                    phone: this.phone
                });
            }
        }
    }
</script>
