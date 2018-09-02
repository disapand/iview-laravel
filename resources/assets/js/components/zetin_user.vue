<style scoped>
    .page {
        margin: 10px 0;
    }
</style>

<template>
    <div>
        <Card style="margin-bottom: 20px;">
            <p slot="title">新增用户</p>
            <i-form ref="user" :model="user" :rules="userRules" inline :label-width="100">
                <form-item label="用户名" prop="name">
                    <i-input v-model="user.name" clearable :disabled="edit"></i-input>
                </form-item>
                <form-item label="密码" prop="password" v-if="!edit">
                    <i-input v-model="user.password" clearable type="password"></i-input>
                </form-item>
                <form-item label="新密码" prop="password_new" v-if="edit">
                    <i-input v-model="user.password_new" clearable type="password"></i-input>
                </form-item>
                <form-item label="确认密码" prop="password_confirm">
                    <i-input v-model="user.password_confirm" clearable type="password"></i-input>
                </form-item>
                <form-item label="备注信息" prop="note">
                    <i-input v-model="user.note" clearable></i-input>
                </form-item>
                <form-item label="用户角色" prop="role">
                    <RadioGroup v-model="user.role" type="button">
                        <Radio label="超级管理员"></Radio>
                        <Radio label="管理员"></Radio>
                    </RadioGroup>
                </form-item>
                <form-item>
                    <i-button type="warning" @click="reset">清空</i-button>
                    <i-button type="success" @click="updateUser(user.id)">提交</i-button>
                </form-item>
            </i-form>
            <!--<div>
                <i-input placeholer="请输入查询条件" v-model="query" style="width:20%; margin-left: 40px;">
                    <i-select v-model="condition" slot="prepend" style="width: 80px">
                        <i-option label="用户名" value="name"></i-option>
                        <i-option label="角色" value="role"></i-option>
                    </i-select>
                    <i-button slot="append" icon="ios-search" @click="searchUser"></i-button>
                </i-input>
            </div>-->
        </Card>
        <div>
            <i-table border :columns="col" :data="users" stripe :highlight-row=false
                     :loading="loading"></i-table>
        </div>
        <page :total="total" show-total @on-change="changePage" :current="currentPage" :page-size="pageSize"
              :class-name="pageClass" show-elevator></page>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                loading: true,
                total: 0,
                currentPage: 1,
                pageSize: 15,
                pageClass: 'page',
                query: '',
                all: false,
                edit: false,
                condition: '用户名',
                col: [
                    {
                        'title': '编号',
                        'key': 'id',
                        'width': 80,
                        'sortable': true,
                        'align': 'center'
                    },
                    {
                        'title': '用户名',
                        'key': 'name',
                    },
                    {
                        'title': '角色',
                        'key': 'role'
                    },
                    {
                        'title': '备注',
                        'key': 'note'
                    },
                    {
                        'title': '创建时间',
                        'key': 'created_at'
                    },
                    {
                        'title': '操作',
                        'key': 'action',
                        render: (h, params) => {
                            let isuse
                            if (params.row.isuse) {
                                isuse = '正常'
                            } else {
                                isuse = '禁用'
                            }
                            return h('div', [
                                h('i-button', {
                                    props: {
                                        type: 'primary',
                                        size: 'small',
                                    },
                                    style: {
                                        marginRight: '8px'
                                    },
                                    on: {
                                        click: () => {
                                            event.stopPropagation()
                                            this.user = params.row
                                            this.edit = true
                                            // this.show(params.row, params.index)
                                        }
                                    }
                                }, '编辑用户信息'),
                                h('poptip', {
                                    props: {
                                        confirm: true,
                                        title: '确认删除该用户吗？此操作不可逆，删除后数据不可恢复',
                                    },
                                    on: {
                                        'on-ok': () => {
                                            event.stopPropagation()
                                            this.remove(params.row, params.index)
                                        }
                                    }
                                }, [
                                    h('i-button', {
                                        props: {
                                            type: 'error',
                                            size: 'small'
                                        },
                                        style: {
                                            marginRight: '8px'
                                        }
                                    }, '删除用户')
                                ]),
                                h('i-button', {
                                    props: {
                                        type: 'info',
                                        size: 'small',
                                    },
                                    on: {
                                        click: () => {
                                            this.isuseUser(params.row)
                                        }
                                    }
                                }, isuse)
                            ])
                        },
                    },
                ],
                userRules: {
                    name: [
                        {required: true, message: '请输入用户名', trigger: 'blur'},
                    ],
                    password: [
                        {required: true, message: '请输入密码', trigger: 'blur'},
                        {min: 6, message: '密码过短，请输入6位以上的密码', trigger: 'blur'}
                    ],
                    password_new: [
                        {required: true, message: '请输入密码', trigger: 'blur'},
                        {min: 6, message: '密码过短，请输入6位以上的密码', trigger: 'blur'}
                    ],
                    password_confirm: [
                        {required: true, message: '请输入密码', trigger: 'blur'},
                        {min: 6, message: '密码过短，请输入6位以上的密码', trigger: 'blur'}
                    ],
                    role: [
                        {required: true, message: '请选择角色', trigger: 'change'}
                    ],
                },
                users: [],
                user: {
                    name: '',
                    password: '',
                    password_new: '',
                    password_confirm: '',
                    note: '',
                    isuse: true,
                    role: '管理员'
                },
            }
        },
        created() {
            this.$ajax.get('http://www.zetin.cn/api/users').then((response) => {
                console.log('拉取用户列表', response);
                this.users = response.data.data
                this.loading = false
                this.total = response.data.meta.pagination.total
            }).catch((error) => {
                this.$Message.error('用户列表加载出错，请稍后重试');
                console.log('用户列表加载出错:', error);
            })
        },
        mounted() {
        },
        methods: {
            reset() {
                this.$refs['user'].resetFields()
                this.edit = false
            },
            remove(row, index) {
                this.$ajax.delete('http://www.zetin.cn/api/user/' + row.id).then((response) => {
                    this.$Message.info('删除成功')
                    this.users = response.data.data
                    this.total = response.data.meta.pagination.total
                }).catch((error) => {
                    this.$Message.error('删除出错')
                    console.log('删除出错', error)
                })
            },
            isuseUser(user) {
                console.log('isuseUser', user)
            },
            changePage(index) {
                this.currentPage = index
                let uri
                if (this.condition && this.search) {
                    uri = 'http://www.zetin.cn/api/users/' + this.condition + '/' + this.search + '?page=' + index
                } else {
                    uri = 'http://www.zetin.cn/api/users?page=' + index
                }
                this.$ajax.get(uri).then((response) => {
                    console.log('换页', response);
                    this.users = response.data.data
                    this.loading = false
                }).catch((error) => {
                    console.log('换页出错', error);
                })
            },
            showAll() {
                this.all = false
                this.search = ''
                this.currentPage = 1
                this.$ajax.get('http://www.zetin.cn/api/users').then((response) => {
                    console.log('拉取资源列表', response);
                    this.transform = response.data.data
                    this.loading = false
                    this.total = response.data.meta.pagination.total
                }).catch((error) => {
                    this.$Message.error('资源列表加载出错，请稍后重试');
                    console.log('资源列表加载出错:', error);
                })
            },
            searchUser() {
                if (this.query == '') {
                    this.$Message.error('请输入查询条件')
                    return false
                }
                this.$ajax.get('http://www.zetin.cn/api/user/' + this.condition + '/' + this.query).then((response) => {
                    this.transform = response.data.data
                    this.total = response.data.meta.pagination.total
                    this.all = true
                    console.log('搜索', response)
                }).catch((error) => {
                    console.log('搜索出错', error);
                })
            },
            /*
            *   创建用户或者更新用户
            *   @params user id
            * */
            updateUser(id) {
                this.$refs['user'].validate( (valid) => {
                    if (valid) {
                        if (this.user.password === this.user.password_confirm || this.user.password_new === this.user.password_confirm) {
                            this.$ajax.post('http://www.zetin.cn/api/user', this.user)
                                .then( (res) => {
                                    console.log('用户信息修改成功', res)
                                    this.$Modal.success({
                                        content: '用户信息修改成功：<br />用户名：' + this.user.name + '<br />密码：' + this.user.password_confirm + '<br />角色：' + this.user.role,
                                        duration: 0,
                                        closable: true
                                    })
                                    this.edit = false
                                    this.$refs['user'].resetFields()
                                })
                                .catch( (err) => {
                                    console.log('添加用户信息出错', err)
                                    this.$Message.error('用户信息添加出错')
                                })
                        } else {
                            this.$Message.info('两次输入的密码不一致，请确认后重新输入')
                            this.user.password_confirm = ''
                            this.user.password = ''
                            this.user.password_new = ''
                        }
                    } else {
                        this.$Message.info('请根据提示填写相关信息')
                    }
                })
            }
        }
    }
</script>