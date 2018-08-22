<template>
    <div>
        <div style="margin: 30px 0">
            <i-select v-model="condition" style="width:100px">
                <i-option value="title" label="标题"></i-option>
                <i-option value="category" label="类别"></i-option>
            </i-select>
            <i-input v-model="search" placeholder="请输入关键词" style="width:50%;"
                     autofocus clearable @on-enter="searchInsight"/>
            <Button type="ghost" shape="circle" icon="search" @click="searchInsight"></Button>
            <Button type="ghost" icon="android-list" shape="circle" v-if="all" @click="showAll">显示全部</Button>
            <button-group style="float: right;">
                <i-button type="success" icon="android-add-circle" @click="addInsightItem">添加资源</i-button>
                <!-- <i-button type="info" icon="ios-download" @click="exportTv">导出资源</i-button> -->
            </button-group>
        </div>
        <div>
            <i-table border :columns="col" :data="insight" stripe :highlight-row=false
                     :loading="loading"></i-table>
        </div>
        <page :total="total" show-total @on-change="changePage" :current="currentPage" :page-size="pageSize"
              :class-name="pageClass" show-elevator ></page>
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
                        'title': '编号',
                        'key': 'id',
                        'width': 80,
                        'sortable': true,
                        'align': 'center'
                    },
                    {
                        'title': '标题',
                        'key': 'title',
                        'width': 800
                    },
                    {
                        'title': '分类',
                        'key': 'category'
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
                insight: [],
            }
        },
        created() {
            this.$ajax.get('http://www.zetin.cn/api/insight').then((response) => {
                console.log('拉取资源列表', response);
                this.insight = response.data.data
                this.loading = false
                this.total = response.data.meta.pagination.total
                if ( response.data.meta.pagination.total_pages > 1) {
                    this.cansee = true
                }
            }).catch((error) => {
                this.$Message.error('资源列表加载出错，请稍后重试');
                console.log('资源列表加载出错:', error);
            })
        },
        methods: {
            addInsightItem() {
                this.$router.push('insight_item')
            },
            show(row, index) {
                this.$router.push({'name': 'insight_item', params: {id: row.id}})
            },
            remove(row, index) {
                this.$ajax.delete('http://www.zetin.cn/api/insight/' + row.id).then((response) => {
                    this.$Message.info('删除资源成功')
                    this.insight.splice(index, 1)
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
                    uri = 'http://www.zetin.cn/api/insight/' + this.condition + '/' + this.search + '?page=' + index
                } else {
                    uri = 'http://www.zetin.cn/api/insight?page=' + index
                }
                this.$ajax.get('http://www.zetin.cn/api/insight?page=' + index).then((response) => {
                    console.log('换页', response);
                    this.insight = response.data.data
                    this.loading = false
                }).catch((error) => {
                    console.log('换页出错', error);
                })
            },
            searchInsight() {
                if (this.search == '') {
                    this.$Message.error('请输入查询条件')
                    return false
                }
                this.$ajax.get('http://www.zetin.cn/api/insight/' + this.condition + '/' + this.search).then((response) => {
                    this.insight = response.data.data
                    this.total = response.data.meta.pagination.total
                    this.all = true
                    console.log('搜索', response)
                }).catch((error) => {
                    console.log('搜索出错', error);
                })
            },showAll() {
                this.all = false
                this.search = ''
                this.currentPage = 1
                this.$ajax.get('http://www.zetin.cn/api/insight').then((response) => {
                    console.log('拉取资源列表', response);
                    this.insight= response.data.data
                    this.loading = false
                    this.total = response.data.meta.pagination.total
                }).catch((error) => {
                    this.$Message.error('资源列表加载出错，请稍后重试');
                    console.log('资源列表加载出错:', error);
                })
            },
            importSuccess(response, file, fileList) {
                console.log('批量导入', response)
                this.insight = response.data
                this.isImport = false
                this.$Message.info('导入完成');
                this.total = response.meta.pagination.total
                if (this.total / this.pageSize > 1) {
                    this.cansee = true
                }
            }
        }
    }
</script>

<style scoped>
    .page {
        margin: 10px 0;
    }
</style>