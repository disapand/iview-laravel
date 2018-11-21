<style scoped>
    .page {
        margin: 10px 0;
    }
</style>

<template>
    <div>
        <div style="margin: 30px 0">
            <i-select v-model="condition" style="width:100px">
                <i-option value="form" label="形式"></i-option>
                <i-option value="category" label="类别"></i-option>
                <i-option value="country" label="国家或地区"></i-option>
            </i-select>
            <i-input v-model="search" placeholder="请输入关键词" style="width:50%;"
                     autofocus clearable @on-enter="searchTv"/>
            <Button type="ghost" shape="circle" icon="search" @click="searchTv"></Button>
            <Button type="ghost" icon="android-list" shape="circle" v-if="all" @click="showAll">显示全部</Button>
            <button-group style="float: right;">
                <i-button type="success" icon="android-add-circle" @click="addTVItem">添加资源</i-button>
                <!-- <i-button type="info" icon="ios-download" @click="exportTv">导出资源</i-button> -->
                <i-button type="warning" icon="ios-upload" @click="isImport = true">批量导入资源</i-button>
                <Modal v-model="isImport" title="选择上传的excel文件" okText="完成">
                    <Upload
                            type="drag"
                            action="https://www.zetin.cn/api/importTv"
                            :on-success="importSuccess"
                            name="excel">
                        <div style="padding: 20px 0">
                            <Icon type="ios-cloud-upload" size="52" style="color: #3399ff"></Icon>
                            <p>拖拽文件到此或者点击文件上传</p>
                        </div>
                    </Upload>
                </Modal>
            </button-group>
        </div>
        <div>
            <i-table border :columns="col" :data="tvs" stripe :highlight-row=false
                     :loading="loading"></i-table>
        </div>
        <page :total="total" show-total @on-change="changePage" :current="currentPage" :page-size="pageSize"
              :class-name="pageClass" show-elevator>
        </page>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                loading: true,
                total: 0,
                all: false,
                currentPage: 1,
                pageSize: 15,
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
                        width: 100
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
            this.$ajax.get('https://www.zetin.cn/api/tv').then((response) => {
                console.log('拉取电视资源列表', response);
                this.total = response.data.meta.pagination.total

                //参数不存在当前页码，或者当前页码为1时
                if (this.$route.params.currentPage == undefined || this.$route.params.currentPage == 1) {
                    this.tvs = response.data.data
                    this.loading = false
                } else if (this.total < this.$route.params.currentPage) {//当页面参数存在， 切值大于总页数时
                    // alert('currentPage大于总页数')
                    let uri
                    if (this.condition && this.search) {
                        uri = 'https://www.zetin.cn/api/tv/' + this.condition + '/' + this.search + '?page=' + this.total
                    } else {
                        uri = 'https://www.zetin.cn/api/tv?page=' + this.total
                    }
                    this.$ajax.get(uri).then((response) => {
                        this.tvs = response.data.data
                        this.loading = false
                        this.currentPage = this.total
                    }).catch((error) => {
                        console.log('换页出错', error);
                    })
                } else {//页面参数正常
                    // alert('currentPage值正常')
                    let uri
                    if (this.condition && this.search) {
                        uri = 'https://www.zetin.cn/api/tv/' + this.condition + '/' + this.search + '?page=' + this.$route.params.currentPage
                    } else {
                        uri = 'https://www.zetin.cn/api/tv?page=' + this.$route.params.currentPage
                    }
                    this.$ajax.get(uri).then((response) => {
                        this.tvs = response.data.data
                        this.loading = false
                        this.currentPage = this.$route.params.currentPage
                    }).catch((error) => {
                        console.log('换页出错', error);
                    })
                }

            }).catch((error) => {
                this.$Message.error('电视资源列表加载出错，请稍后重试');
                console.log('电视资源列表加载出错:', error);
            })

        },
        mounted() {
        },
        methods: {
            addTVItem() {
                this.$router.push('tv_item')
            },
            show(row, index) {
                this.$router.push({'name': 'tv_item', params: {id: row.id, currentPage: this.currentPage}})
            },
            remove(row, index) {
                this.$ajax.delete('https://www.zetin.cn/api/tv/' + row.id).then((response) => {
                    this.$Message.info('删除资源成功')
                    this.tvs.splice(index, 1)
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
                    uri = 'https://www.zetin.cn/api/tv/' + this.condition + '/' + this.search + '?page=' + index
                } else {
                    uri = 'https://www.zetin.cn/api/tv?page=' + index
                }
                this.$ajax.get(uri).then((response) => {
                    this.tvs = response.data.data
                    this.loading = false
                }).catch((error) => {
                    console.log('换页出错', error);
                })
            },
            searchTv() {
                if (this.search == '') {
                    this.$Message.error('请输入查询条件')
                    return false
                }
                this.$ajax.get('https://www.zetin.cn/api/tv/' + this.condition + '/' + this.search).then((response) => {
                    this.tvs = response.data.data
                    this.total = response.data.meta.pagination.total
                    this.all = true
                }).catch((error) => {
                    console.log('搜索出错', error);
                })
            },
            showAll() {
                this.all = false
                this.search = ''
                this.currentPage = 1
                this.$ajax.get('https://www.zetin.cn/api/tv').then((response) => {
                    console.log('拉取电视资源列表', response);
                    this.tvs = response.data.data
                    this.total = response.data.meta.pagination.total
                }).catch((error) => {
                    this.$Message.error('电视资源列表加载出错，请稍后重试');
                    console.log('电视资源列表加载出错:', error);
                })
            },
            importSuccess(response, file, fileList) {
                console.log('批量导入', response)
                this.tvs = response.data
                this.isImport = false;
                this.$Message.success('批量导入完成');
                this.total = response.meta.pagination.total
            }
        }
    }
</script>
