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
                <form-item label="用户角色" prop="role">
                    <RadioGroup v-model="user.role" type="button">
                        <Radio label="管理员"></Radio>
                        <Radio label="运营者"></Radio>
                    </RadioGroup>
                </form-item>
                <form-item>
                    <i-button type="warning" @click="reset">清空</i-button>
                    <i-button type="success">提交</i-button>
                </form-item>
            </i-form>
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
                condition: 'form',
                search: '',
                isImport: false,
                all: false,
                edit: false,
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
                        'title': '创建时间',
                        'key': 'created_at'
                    },
                    {
                        'title': '操作',
                        'key': 'action',
                        render: (h, params) => {
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
                                            this.edit = ! this.edit
                                            // this.show(params.row, params.index)
                                        }
                                    }
                                }, '查看详情'),
                                h('poptip', {
                                    props: {
                                        confirm: true,
                                        title: '确认删除这条资源吗？',
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
                                        }
                                    }, '删除资源')
                                ])
                            ])
                        },
                    },
                ],
                userRules: {
                    name: [
                        {required: true, message: '请输入用户名', trigger: 'blur'}
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
                    role: '运营者'
                },
            }
        },
        created() {
            this.$ajax.get('http://iview-laravel.test/api/users').then((response) => {
                console.log('拉取用户列表', response);
                this.users = response.data.data
                this.loading = false
                this.total = response.data.meta.pagination.total
                if (response.data.meta.pagination.total_pages > 1) {
                    this.cansee = true
                }
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
            },
            remove(row, index) {
                this.$ajax.delete('http://iview-laravel.test/api/user/' + row.id).then((response) => {
                    this.$Message.info('删除资源成功')
                    this.users = response.data.data
                    this.total = response.data.meta.pagination.total
                }).catch((error) => {
                    this.$Message.error('删除资源出错')
                    console.log('删除资源出错', error)
                })
            },
            changePage(index) {
                this.currentPage = index
                let uri
                if (this.condition && this.search) {
                    uri = 'http://www.zetin.cn/api/transform/' + this.condition + '/' + this.search + '?page=' + index
                } else {
                    uri = 'http://www.zetin.cn/api/transform?page=' + index
                }
                this.$ajax.get(uri).then((response) => {
                    console.log('换页', response);
                    this.transform = response.data.data
                    this.loading = false
                }).catch((error) => {
                    console.log('换页出错', error);
                })
            },
            showAll() {
                this.all = false
                this.search = ''
                this.currentPage = 1
                this.$ajax.get('http://www.zetin.cn/api/transform').then((response) => {
                    console.log('拉取资源列表', response);
                    this.transform = response.data.data
                    this.loading = false
                    this.total = response.data.meta.pagination.total
                }).catch((error) => {
                    this.$Message.error('资源列表加载出错，请稍后重试');
                    console.log('资源列表加载出错:', error);
                })
            },
            searchTransform() {
                if (this.search == '') {
                    this.$Message.error('请输入查询条件')
                    return false
                }
                this.$ajax.get('http://www.zetin.cn/api/transform/' + this.condition + '/' + this.search).then((response) => {
                    this.transform = response.data.data
                    this.total = response.data.meta.pagination.total
                    this.all = true
                    console.log('搜索', response)
                }).catch((error) => {
                    console.log('搜索出错', error);
                })
            },
            importSuccess(response, file, fileList) {
                console.log('批量导入', response)
                this.transform = response.data
                this.isImport = false
                this.$Message.info('导入成功')
                this.total = response.meta.pagination.total
                if (this.total / this.pageSize > 1) {
                    this.cansee = true
                }
            }
        }
    }
</script>