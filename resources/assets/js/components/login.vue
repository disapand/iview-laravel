<template>
    <div class="bg">
        <Card class="md-form">
            <p slot="title">登录</p>
            <i-form :model="user" ref="user" :rules="userRules">
                <form-item label="用户名" prop="name">
                    <i-input v-model="user.name" clearable autofocus></i-input>
                </form-item>
                <form-item label="密码" prop="password">
                    <i-input type="password" v-model="user.password" clearable @on-enter="authorization"></i-input>
                </form-item>
                <form-item>
                    <i-button type="success" long @click="authorization">登录</i-button>
                </form-item>
            </i-form>
        </Card>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                user: {
                    name: '',
                    password: '',
                },
                userRules: {
                    name: [
                        {required: true, message: '请输入用户名', trigger: 'blur'}
                    ],
                    password: [
                        {required: true, message: '请输入密码', trigger: 'blur'}
                    ]
                },
            }
        },
        methods: {
            authorization() {
                this.$refs['user'].validate((valid) => {
                    if (valid) {
                        this.$ajax.post('http://iview-laravel.test/api/authorizations', this.user).then( (res) => {
                            this.$store.commit('updateAccessToken', res.data.access_token)
                            this.$store.commit('updateTokenType', res.data.token_type)
                            this.$router.push('/')
                        }).catch((error) => {
                            console.log(error)
                            this.$refs['user'].resetFields()
                            this.$Message.error({
                                content:'账号或密码错误',
                                duration: 5,
                                closable: true
                            })
                        })
                    } else {
                        this.$Message.warning({
                            content:'请填写用户名和密码信息',
                            duration: 5,
                            closable: true
                        })
                    }
                })
            },
        }
    }
</script>

<style scoped>
    .bg {
        width: 100%;
        height: 100%;
        background: url("imgs/logn_bg.jpg") center no-repeat;
    }

    .md-form {
        width: 25%;
        margin: auto;
        top: 50%;
        transform: translateY(-50%);
    }

    .ivu-card {
        background: rgba(255, 255, 255, 0.7)
    }
</style>