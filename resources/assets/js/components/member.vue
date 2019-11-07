<template>
    <div>
        <div class="card">
            <p slot="title">会员管理</p>
        </div>

        <div>
            <i-table border :columns="col" :data="members" stripe :highlight-row=false
                     :loading="loading"></i-table>
        </div>

        <page :total="pagination.total" show-total @on-change="changePage" :current="pagination.currentPage" :page-size="pagination.per_page"
              :class-name="pageClass" show-elevator v-if="pagination.total_pages != 1"></page>
    </div>
</template>

<script>
    export default {
        name: "member",
        data () {
            return {
                loading: true,
                col: [
                    {
                        type: 'index',
                        title: '序号',
                        width: 60
                    },
                    {
                        title: '姓名',
                        key: 'name',
                        width: 100
                    },
                    {
                        title: '公司',
                        key: 'company',
                    },
                    {
                        title: '电话号码',
                        key: 'phone',
                        width: 150
                    },
                    {
                        title: '电子邮箱',
                        key: 'email'
                    },
                    {
                        title: '联系地址',
                        key: 'address'
                    },
                    {
                        title: '账号状态',
                        key: 'isuse',
                        width: 100,
                        render: (h, params) => {
                            return h('span', {
                                style: {
                                    color: params.row.isuse ? 'green' : 'red'
                                }
                            }, params.row.isuse ? '启用' : '禁用')
                        }
                    },
                    {
                        title: '是否验证',
                        key: 'verified',
                        width: 100,
                        render: (h, params) => {
                            return h('span', {
                                style: {
                                    color: params.row.verified ? 'green' : 'red'
                                }
                            }, params.row.verified ? '已验证' : '未验证')
                        }
                    },
                    {
                        title: '账号创建时间',
                        key: 'created_at'
                    },
                    {
                        title: '操作',
                        key: 'action',
                        width: 180,
                        render: (h, params) => {
                            return h('div', [
                                h('i-button', {
                                    props: {
                                        type: params.row.isuse ? 'warning' : 'success',
                                        size: 'small'
                                    },
                                    style: {
                                        marginRight: '10px'
                                    },
                                    on: {
                                        click: () => {
                                            event.stopPropagation()
                                            this.useMember(params.row, params.index)
                                        }
                                    }
                                }, params.row.isuse ? '禁用账号' : '启用账号'),
                                h('poptip', {
                                    props: {
                                        confirm: true,
                                        title: '确认删除该用户吗？',
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
                                    }, '删除用户')
                                ])
                            ])
                        }
                    }
                ],
                members: [],
                pagination: {
                    total: 0,
                    total_pages: 1,
                    currentPage: 1
                },
                pageClass: 'page'
            }
        },
        mounted() {
            this.$ajax.get('https://www.zetin.cn/api/members')
                .then(res => {
                    this.loading = false
                    this.members = res.data.data
                    this.pagination = res.data.meta.pagination
                })
                .catch(err => {
                    console.log(err)
                })
        },
        methods: {
            useMember(row, index) {
                this.loading = true
                this.$ajax.get(`https://www.zetin.cn/api/useMember/${row.id}`)
                    .then(res => {
                        this.members[index].isuse = !row.isuse
                        this.loading = false
                    })
                    .catch(err => {

                    })
            },
            changePage(index) {
                this.loading = true
                this.$ajax.get(`https://www.zetin.cn/api/members?page=${index}`)
                    .then(res => {
                        this.loading = false
                        this.members = res.data.data
                        this.pagination = res.data.meta.pagination
                    })
                    .catch(err => {

                    })
            }
        }
    }
</script>

<style scoped>
    .card {
        border: solid 1px #dddeee;
        padding: 12px;
        font-weight: bold;
        font-size: 1.2em;
        color: #1c2438;
        border-radius: 3px;
        margin-bottom: 20px;
    }

    .page {
        margin: 20px 0;
    }
</style>