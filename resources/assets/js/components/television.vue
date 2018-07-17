<style scoped>
    .page {
        margin: 10px 0;
    }
</style>

<template>
    <div>
        <div style="margin: 30px 0">
            <i-input v-model="search" placeholder="请输入关键词" style="width:50%;"/>
            <Button type="ghost" shape="circle" icon="search"></Button>
            <button-group style="float: right;">
                <i-button type="success" icon="android-add-circle" @click="addTVItem">添加资源</i-button>
                <i-button type="info" icon="ios-download" @click="exportTv">导出资源</i-button>
                <i-button type="warning" icon="ios-upload" @click="importTv">批量导入资源</i-button>
            </button-group>
        </div>
        <div>
            <i-table border :columns="col" :data="tvs" stripe :highlight-row=false
                     :loading="loading"></i-table>
        </div>
        <page :total="total" show-total @on-change="changePage" :current="currentPage" :page-size="pageSize" :class-name="pageClass" show-elevator v-if="cansee"></page>
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
                cansee: false,
                pageClass: 'page',
                search: '',
                col: [
                    {
                        'title': '编号',
                        'key': 'id',
                        'width': 60,
                        'align': 'center'
                    },
                    {
                        'title': '电视频道',
                        'key': 'channel',
                    },
                    {
                        'title': '形式',
                        'key': 'form'
                    },
                    {
                        'title': '覆盖地区',
                        'key': 'area'
                    },
                    {
                        'title': '类别',
                        'key': 'category',
                        width: 80
                    },
                    {
                        'title': '所属电视台',
                        'key': 'station'
                    },
                    {
                        'title': '广告时长(s)',
                        'key': 'time',
                        width: 100
                    },
                    {
                        'title': '国家或地区',
                        'key': 'country'
                    },
                    {
                        'title': '是否有效',
                        'key': 'isuse',
                        width: 100
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
                                            this.show(params.row, params.index)
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
                tvs: [],
            }
        },
        created() {
            this.$ajax.get('http://iview-laravel.test/api/tv').then((response) => {
                console.log(response.data);
                this.tvs = response.data.data
                this.loading = false
                this.total = response.data.meta.pagination.total
                if( this.total / this.pageSize > 1 ) {
                    this.cansee = true
                }
            }).catch((error) => {
                this.$Message.error('电视资源列表加载出错，请稍后重试');
                console.log('电视资源列表加载出错:', error);
            })
        },
        mounted() {
        },
        methods: {
            /*
            *   点击当前行，跳转到对应行的详情，绑定于@on-row-click
            * */
            /*tv_item(row, index) {
                this.$router.push({'name': 'tv_item', params: {id: row.id}})
            },*/
            addTVItem() {
              this.$router.push('tv_item')
            },
            info(row, index) {
                console.log(index)
                this.$Message.info(row.id.toString())
            },
            show(row, index) {
                this.$router.push({'name': 'tv_item', params: {id: row.id}})
            },
            remove(row, index) {
                this.$ajax.delete('http://iview-laravel.test/api/tv/' + row.id).then( (response) => {
                    this.$Message.info('删除资源成功')
                    this.tvs.splice(index, 1)
                }).catch( (error) => {
                    this.$Message.info('删除资源出错')
                    console.log('删除资源出错', error)
                })
            },
            changePage(index) {
                this.currentPage = index
                this.$ajax.get('http://iview-laravel.test/api/tv?page=' + index).then((response) => {
                    console.log(response.data);
                    this.tvs = response.data.data
                    this.loading = false
                }).catch((error) => {
                    console.log('some errors has happend:', error);
                })
            },
            exportTv() {

            },
            importTv() {

            }
        }
    }
</script>