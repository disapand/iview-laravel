<style scoped>
    .layout {
        border: 1px solid #d7dde4;
        background: #f5f7f9;
        position: relative;
        border-radius: 4px;
        overflow: hidden;
        height: 100%;
    }

    .layout-logo {
        width: 100px;
        height: 30px;
        background: #5b6270;
        border-radius: 3px;
        float: left;
        position: relative;
        top: 15px;
        left: 20px;
    }

    .ivu-layout {
        height: 100%;
    }

    .layout-nav {
        width: 420px;
        margin: 0 auto;
        margin-right: 20px;
    }
</style>
<template>
    <div class="layout">
        <Layout>
            <!--
            ---- 顶部导航，用户信息
            -->
            <Header>
                <Menu mode="horizontal" theme="dark">
                    <div class="layout-logo"></div>
                    <div class="layout-nav">
                        <MenuItem name="4" style="float:right">
                            <Dropdown>
                                <avatar icon="person" src=""></avatar>
                                <span>{{ this.user.name }}</span>
                                <DropdownMenu slot="list">
                                    <DropdownItem>
                                        <router-link to="/b">用户信息</router-link>
                                    </DropdownItem>
                                    <DropdownItem divided>
                                        <span @click="logout">退出登录</span>
                                    </DropdownItem>
                                </DropdownMenu>
                            </Dropdown>
                        </MenuItem>
                    </div>
                </Menu>
            </Header>

            <Layout>
                <!--
                ---- 左侧菜单栏
                -->
                <Sider :style="{background: '#fff'}" ref="ss" hide-trigger collapsible>
                    <Menu theme="light" width="auto" :open-names="['1']" @on-select="changeMenu">
                        <Submenu name="1">
                            <template slot="title">
                                <Icon type="easel"></Icon>
                                资源管理
                            </template>
                            <MenuItem name="1-1">电视资源</MenuItem>
                            <MenuItem name="1-2">户外资源</MenuItem>
                            <MenuItem name="1-3">交通资源</MenuItem>
                            <MenuItem name="1-4">网红资源</MenuItem>
                            <MenuItem name="1-5">线上资源</MenuItem>
                            <MenuItem name="1-6">纸媒资源</MenuItem>
                        </Submenu>
                        <MenuItem name="2">
                            <Icon type="podium"></Icon>
                            案例管理
                        </MenuItem>
                        <MenuItem name="3">
                            <Icon type="planet"></Icon>
                            洞察管理
                        </MenuItem>
                        <MenuItem name="4">
                            <Icon type="ios-pie"></Icon>
                            动态管理
                        </MenuItem>
                    </Menu>
                </Sider>
                <!--
                ---- 内容部分
                -->
                <Layout :style="{padding: '24px'}">
                    <Content :style="{padding: '24px', background: '#fff'}">
                        <router-view></router-view>
                    </Content>
                </Layout>
            </Layout>
        </Layout>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                user: '',
            };
        },
        created() {
            this.$store.commit('updateAccessToken')
            this.$store.commit('updateTokenType')
            this.$store.commit('updateExpiresIn')
            this.$ajax.get('http://iview-laravel.test/api/user', {headers: {Authorization: this.$store.state.token_type + ' ' + this.$store.state.access_token}})
                .then((res) => {
                    console.log(res)
                    this.user = res.data
                })
                .catch((error) => {
                    console.log(error)
                    this.$Modal.confirm({
                        title: '请登录',
                        content: '该操作需要先登录账号',
                        okText: '登录',
                        cancelText: ' ',
                        onOk: () => {
                            this.$router.push('login')
                        }
                    })
                    return false
                })
        },
        methods: {
            changeMenu(name) {
                switch (name) {
                    case '1-1':
                        this.$router.push('/television');
                        break;
                    case '1-2':
                        this.$router.push('/outdoor');
                        break;
                    case '1-3':
                        this.$router.push('/transform');
                        break;
                    case '1-4':
                        this.$router.push('/internet');
                        break;
                    case '1-5':
                        this.$router.push('/online');
                        break;
                    case '1-6':
                        this.$router.push('/newspaper');
                        break;
                    case '2':
                        this.$router.push('/case');
                        break;
                    case '3':
                        this.$router.push('/insight');
                        break;
                    case '4':
                        this.$router.push('/dynamic');
                        break;
                }
            },
            logout() {
                this.$ajax.delete('http://iview-laravel.test/api/authorizations/current', {headers: {Authorization: this.$store.state.token_type + ' ' + this.$store.state.access_token}})
                    .then((res) => {
                        localStorage.clear()
                        this.$router.push('login')
                    }).catch((error) => {
                        console.log(error)
                        this.$Message.error({
                            content: '用户认证失败',
                            duration: 5,
                            closable: true
                        })
                })
            }
        }
    }
</script>
