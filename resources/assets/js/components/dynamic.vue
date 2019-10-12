<template>
    <div>
        <div style="margin: 30px 0">
            <i-select v-model="condition" style="width:100px">
                <i-option value="title" label="标题"></i-option>
                <i-option value="tag" label="标签"></i-option>
            </i-select>
            <i-input v-model="search" placeholder="请输入关键词" style="width:50%;"
                     autofocus clearable @on-enter="searchDynamic"/>
            <Button type="ghost" shape="circle" icon="search" @click="searchDynamic"></Button>
            <Button type="ghost" icon="android-list" shape="circle" v-if="all" @click="showAll">显示全部</Button>
            <button-group style="float: right;">
                <i-button type="success" icon="android-add-circle" @click="addDynamicItem">添加资源</i-button>
                <!-- <i-button type="info" icon="ios-download" @click="exportTv">导出资源</i-button> -->
            </button-group>
        </div>
        <div style="margin: 20px 0">
            <Button @click="handleSelectAll(true)">全选</Button>
            <Button @click="handleSelectAll(false)" v-if="actionButton">取消</Button>
            <poptip confirm v-if="actionButton" title="确认要删除选中项目吗？删除后不可恢复" @on-ok="deleteSelection" ok-text="删除">
                <Button type="error" >删除选中</Button>
            </poptip>
        </div>
        <div>
            <i-table ref="dynamic" border :columns="col" :data="dynamic" stripe :highlight-row=false @on-selection-change="selectedChange"
                     :loading="loading"></i-table>
        </div>
        <div style="margin: 20px 0">
            <Button @click="handleSelectAll(true)">全选</Button>
            <Button @click="handleSelectAll(false)" v-if="actionButton">取消</Button>
            <poptip confirm v-if="actionButton" title="确认要删除选中项目吗？删除后不可恢复" @on-ok="deleteSelection" ok-text="删除">
                <Button type="error" >删除选中</Button>
            </poptip>
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
                all: false,
                pageClass: 'page',
                condition: 'title',
                search: '',
                isImport: false,
                col: [
                    {
                        type: 'selection',
                        width: 60,
                        align: 'center'
                    },
                    {
                        type: 'index',
                        title: '序号',
                        width: 80,
                        align: 'center'
                    },
                    {
                        'title': '标题',
                        'key': 'title',
                    },
                    {
                        'title': '标签',
                        'key': 'tag',
                        'width': 300
                    },
                    {
                        'title': '操作',
                        'key': 'action',
                        'width': 200,
                        'align': 'center',
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
                                            this.show(params.row, params.index)
                                        }
                                    }
                                }, '查看详情'),
                                h('poptip', {
                                    props: {
                                        confirm: true,
                                        title: '确认删除这条资源吗？',
                                        transfer: true
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
                dynamic: [],
                selectedList: [],
                actionButton: false
            }
        },
        created() {
            this.$ajax.get('https://iview-laravel.test/api/dynamic').then((response) => {
                console.log('拉取资源列表', response);
                this.total = response.data.meta.pagination.total

                //参数不存在当前页码，或者当前页码为1时
                if (this.$route.params.currentPage == undefined || this.$route.params.currentPage == 1) {
                    this.dynamic = response.data.data
                    this.loading = false
                } else if (this.total < this.$route.params.currentPage) {//当页面参数存在， 切值大于总页数时
                    // alert('currentPage大于总页数')
                    let uri
                    if (this.condition && this.search) {
                        uri = 'https://iview-laravel.test/api/dynamic/' + this.condition + '/' + this.search + '?page=' + this.total
                    } else {
                        uri = 'https://iview-laravel.test/api/dynamic?page=' + this.total
                    }
                    this.$ajax.get(uri).then((response) => {
                        this.dynamic = response.data.data
                        this.loading = false
                        this.currentPage = this.total
                    }).catch((error) => {
                        console.log('换页出错', error);
                    })
                } else {//页面参数正常
                    // alert('currentPage值正常')
                    let uri
                    if (this.condition && this.search) {
                        uri = 'https://iview-laravel.test/api/dynamic/' + this.condition + '/' + this.search + '?page=' + this.$route.params.currentPage
                    } else {
                        uri = 'https://iview-laravel.test/api/dynamic?page=' + this.$route.params.currentPage
                    }
                    this.$ajax.get(uri).then((response) => {
                        this.dynamic = response.data.data
                        this.loading = false
                        this.currentPage = this.$route.params.currentPage
                    }).catch((error) => {
                        console.log('换页出错', error);
                    })
                }

            }).catch((error) => {
                this.$Message.error('资源列表加载出错，请稍后重试');
                console.log('资源列表加载出错:', error);
            })
        },
        methods: {
            addDynamicItem() {
                this.$router.push('dynamic_item')
            },
            show(row, index) {
                this.$router.push({'name': 'dynamic_item', params: {id: row.id, currentPage: this.currentPage}})
            },
            remove(row, index) {
                this.$ajax.delete('https://iview-laravel.test/api/dynamic/' + row.id).then((response) => {
                    this.$Message.info('删除资源成功')
                    this.dynamic.splice(index, 1)
                    this.total = response.data.meta.pagination.total
                    if (response.data.meta.pagination.total_pages == 1) {
                        this.cansee = true
                    }
                }).catch((error) => {
                    this.$Message.error('删除资源出错')
                    console.log('删除资源出错', error)
                })
            },
            changePage(index) {
                this.currentPage = index
                let uri
                if (this.condition && this.search) {
                    uri = 'https://iview-laravel.test/api/dynamic/' + this.condition + '/' + this.search + '?page=' + index
                } else {
                    uri = 'https://iview-laravel.test/api/dynamic?page=' + index
                }
                this.$ajax.get(uri).then((response) => {
                    console.log('换页', response);
                    this.dynamic = response.data.data
                    this.loading = false
                }).catch((error) => {
                    console.log('换页出错', error);
                })
            },
            searchDynamic() {
                if (this.search == '') {
                    this.$Message.error('请输入查询条件')
                    return false
                }
                this.$ajax.get('https://iview-laravel.test/api/dynamic/' + this.condition + '/' + this.search).then((response) => {
                    this.dynamic = response.data.data
                    this.total = response.data.meta.pagination.total
                    this.all = true
                    console.log('搜索', response)
                }).catch((error) => {
                    console.log('搜索出错', error);
                })
            },
            showAll() {
                this.all = false
                this.search = ''
                this.currentPage = 1
                this.$ajax.get('https://iview-laravel.test/api/dynamic').then((response) => {
                    console.log('拉取资源列表', response);
                    this.dynamic = response.data.data
                    this.loading = false
                    this.total = response.data.meta.pagination.total
                }).catch((error) => {
                    this.$Message.error('资源列表加载出错，请稍后重试');
                    console.log('资源列表加载出错:', error);
                })
            },
            selectedChange ( selection ) {
                if ( selection.length != 0 ) {
                    this.actionButton = true
                } else {
                    this.actionButton = false
                }

                let tmp = []
                for ( let i = 0; i < selection.length; i ++) {
                    tmp.push( selection[i].id )
                }
                this.selectedList = tmp
            },
            handleSelectAll ( status ) {
                this.$refs.dynamic.selectAll(status)
            },
            deleteSelection() {
                this.$Loading.start()
                this.$ajax.delete(window.location.href.substring(0, window.location.href.indexOf(window.location.pathname)) +
                    '/api/deleteSelectionDynamic/' + this.selectedList.join('-') )
                    .then( (response) => {
                        this.dynamic = response.data.data
                        this.total = response.data.meta.pagination.total
                        this.$Message.success('批量删除完成')
                        this.$Loading.finish()
                    })
                    .catch( (error) => {
                        console.log('批量删除案例出错：', error)
                        this.$Message.error('批量删除异常')
                        this.$Loading.error()
                    })
            }
        }
    }
</script>

<style scoped>
    .page {
        margin: 10px 0;
    }
</style>
