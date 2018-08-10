<template>
    <div>
        <div style="margin: 30px 0">
            <i-select v-model="condition" style="width:100px">
                <i-option value="form" label="形式"></i-option>
                <i-option value="category" label="类别"></i-option>
                <i-option value="country" label="国家或地区"></i-option>
            </i-select>
            <i-input v-model="search" placeholder="请输入关键词" style="width:50%;"
                     autofocus clearable @on-enter="searchDynamic"/>
            <Button type="ghost" shape="circle" icon="search" @click="searchDynamic"></Button>
            <button-group style="float: right;">
                <i-button type="success" icon="android-add-circle" @click="addDynamicItem">添加资源</i-button>
                <!-- <i-button type="info" icon="ios-download" @click="exportTv">导出资源</i-button> -->
                <i-button type="warning" icon="ios-upload" @click="isImport = true">批量导入资源</i-button>
            </button-group>
        </div>
        <div>
            <i-table border :columns="col" :data="dynamic" stripe :highlight-row=false
                     :loading="loading"></i-table>
        </div>
        <page :total="total" show-total @on-change="changePage" :current="currentPage" :page-size="pageSize"
              :class-name="pageClass" show-elevator v-if="cansee"></page>
        <span v-if="! cansee" style="margin-top: 15px;display: block">共找到{{ total }}条记录</span>
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
                condition: 'form',
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
                        'title': '标签',
                        'key': 'tag'
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
            }
        },
        created() {
            this.$ajax.get('http://iview-laravel.test/api/dynamic').then((response) => {
                console.log('拉取资源列表', response);
                this.dynamic = response.data.data
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
            addDynamicItem() {
                this.$router.push('dynamic_item')
            },
            show(row, index) {
                this.$router.push({'name': 'dynamic_item', params: {id: row.id}})
            },
            remove(row, index) {
                this.$ajax.delete('http://iview-laravel.test/api/dynamic/' + row.id).then((response) => {
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
                this.$ajax.get('http://iview-laravel.test/api/dynamic?page=' + index).then((response) => {
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
                this.$ajax.get('http://iview-laravel.test/api/newspaper/' + this.condition + '/' + this.search).then((response) => {
                    this.dynamic = response.data.data
                    this.total = response.data.data.length
                    this.cansee = false
                    console.log('搜索', response)
                }).catch((error) => {
                    console.log('搜索出错', error);
                })
            },
            importSuccess(response, file, fileList) {
                console.log('批量导入', response)
                this.dynamic = response.data
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