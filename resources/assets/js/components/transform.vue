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
                     autofocus clearable @on-enter="searchTransform"/>
            <Button type="ghost" shape="circle" icon="search" @click="searchTransform"></Button>
            <Button type="ghost" icon="android-list" shape="circle" v-if="all" @click="showAll">显示全部</Button>
            <button-group style="float: right;">
                <i-button type="success" icon="android-add-circle" @click="addTransformItem">添加资源</i-button>
                <i-button type="info" icon="eye" @click="previewListPage">预览列表页</i-button>
                <!-- <i-button type="info" icon="ios-download" @click="exportTv">导出资源</i-button> -->
                <i-button type="warning" icon="ios-upload" @click="isImport = true">批量导入资源</i-button>
                <Modal v-model="isImport" title="选择上传的excel文件" okText="完成">
                    <Upload
                            type="drag"
                            action="https://www.zetin.cn/api/importTransform"
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
        <div style="margin: 20px 0">
            <Button @click="handleSelectAll(true)">全选</Button>
            <Button @click="handleSelectAll(false)" v-if="actionButton">取消</Button>
            <Button @click="cancelSelection()" type="warning" v-if="actionButton">取消发布选中</Button>
            <Button @click="publishSelection()" type="success" v-if="actionButton">发布选中</Button>
            <poptip confirm v-if="actionButton" title="确认要删除选中项目吗？删除后不可恢复" @on-ok="deleteSelection" ok-text="删除">
                <Button type="error" >删除选中</Button>
            </poptip>
        </div>
        <div>
            <i-table ref="transforms" border :columns="col" :data="transform" stripe :highlight-row=false @on-selection-change="selected"
                     :loading="loading"></i-table>
        </div>
        <div style="margin: 20px 0">
            <Button @click="handleSelectAll(true)">全选</Button>
            <Button @click="handleSelectAll(false)" v-if="actionButton">取消</Button>
            <Button @click="cancelSelection()" type="warning" v-if="actionButton">取消发布选中</Button>
            <Button @click="publishSelection()" type="success" v-if="actionButton">发布选中</Button>
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
                pageClass: 'page',
                condition: 'form',
                search: '',
                isImport: false,
                all: false,
                col: [
                    {
                        type: 'selection',
                        width: 60,
                        align: 'center'
                    },
                    {
                        type: 'index',
                        width: 80,
                        align: 'center',
                        title: '序号'
                    },
                    {
                        'title': '城市',
                        'key': 'city',
                    },
                    {
                        'title': '形式',
                        'key': 'form'
                    },
                    {
                        'title': '媒体具体位置',
                        'key': 'position'
                    },
                    {
                        'title': '类别',
                        'key': 'category',
                        width: 80
                    },
                    {
                        'title': '覆盖区域',
                        'key': 'area'
                    },
                    {
                        'title': 'SOV',
                        'key': 'SOV'
                    },
                    {
                        'title': '规格尺寸',
                        'key': 'format',
                    },
                    {
                        'title': '广告载体面数',
                        'key': 'number'
                    },
                    {
                        'title': '国家和地区',
                        'key': 'country'
                    },
                    {
                        'title': '名称',
                        'key': 'name'
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
                                h('i-button', {
                                    props: {
                                        type: 'info',
                                        size: 'small'
                                    },
                                    style: {
                                        marginRight: '8px'
                                    },
                                    on: {
                                        click: () => {
                                            this.previewItem(params.row.id)
                                        }
                                    }
                                }, '预览页面'),
                                h('i-button', {
                                    props: {
                                        type: params.row.isuse ? 'warning' : 'success',
                                        size: 'small'
                                    },
                                    style: {
                                        marginRight: '8px'
                                    },
                                    disabled: true,
                                    long: true,
                                    on: {
                                        click: () => {
                                            this.publishOrCancel( params )
                                        }
                                    }
                                }, params.row.isuse ? '取消发布' : '发布页面'),
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
                        minWidth: 250
                    },
                ],
                transform: [],
                selectedList: '',
                actionButton: false
            }
        },
        created() {
            this.$ajax.get('https://www.zetin.cn/api/transform').then((response) => {
                console.log('拉取交通资源列表', response);
                this.total = response.data.meta.pagination.total

                //参数不存在当前页码，或者当前页码为1时
                if (this.$route.params.currentPage == undefined || this.$route.params.currentPage == 1) {
                    this.transform = response.data.data
                    this.loading = false
                } else if (this.total < this.$route.params.currentPage) {//当页面参数存在， 切值大于总页数时
                    // alert('currentPage大于总页数')
                    let uri
                    if (this.condition && this.search) {
                        uri = 'https://www.zetin.cn/api/transform/' + this.condition + '/' + this.search + '?page=' + this.total
                    } else {
                        uri = 'https://www.zetin.cn/api/transform?page=' + this.total
                    }
                    this.$ajax.get(uri).then((response) => {
                        this.transform = response.data.data
                        this.loading = false
                        this.currentPage = this.total
                    }).catch((error) => {
                        console.log('换页出错', error);
                    })
                } else {//页面参数正常
                    // alert('currentPage值正常')
                    let uri
                    if (this.condition && this.search) {
                        uri = 'https://www.zetin.cn/api/transform/' + this.condition + '/' + this.search + '?page=' + this.$route.params.currentPage
                    } else {
                        uri = 'https://www.zetin.cn/api/transform?page=' + this.$route.params.currentPage
                    }
                    this.$ajax.get(uri).then((response) => {
                        this.transform = response.data.data
                        this.loading = false
                        this.currentPage = this.$route.params.currentPage
                    }).catch((error) => {
                        console.log('换页出错', error);
                    })
                }

            }).catch((error) => {
                this.$Message.error('交通资源列表加载出错，请稍后重试');
                console.log('交通资源列表加载出错:', error);
            })
        },
        mounted() {
        },
        methods: {
            addTransformItem() {
                this.$router.push('transform_item')
            },
            show(row, index) {
                this.$router.push({'name': 'transform_item', params: {id: row.id, currentPage: this.currentPage}})
            },
            remove(row, index) {
                this.$ajax.delete('https://www.zetin.cn/api/transform/' + row.id).then((response) => {
                    this.$Message.info('删除资源成功')
                    this.transform.splice(index, 1)
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
                    uri = 'https://www.zetin.cn/api/transform/' + this.condition + '/' + this.search + '?page=' + index
                } else {
                    uri = 'https://www.zetin.cn/api/transform?page=' + index
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
                this.$ajax.get('https://www.zetin.cn/api/transform').then((response) => {
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
                this.$ajax.get('https://www.zetin.cn/api/transform/' + this.condition + '/' + this.search).then((response) => {
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
            },
            selected ( selection ) {
                if ( selection.length != 0 ) {
                    this.actionButton = true
                } else {
                    this.actionButton = false
                }

                let tmp = []
                for ( let i = 0; i < selection.length; i ++ ) {
                    tmp.push( selection[i].id )
                }
                this.selectedList = tmp
            },
            handleSelectAll(status) {
                this.$refs.transforms.selectAll( status )
            },
            deleteSelection() {
                this.$Loading.start()
                this.$ajax.delete(window.location.href.substring(0, window.location.href.indexOf(window.location.pathname)) +
                    '/api/deleteSelectionTransform/' + this.selectedList.join('-') )
                    .then( (response) => {
                        this.transform = response.data.data
                        this.total = response.data.meta.pagination.total
                        this.$Message.success('批量删除完成')
                        this.$Loading.finish()
                    })
                    .catch( (error) => {
                        console.log('批量删除交通资源出错：', error)
                        this.$Message.error('批量删除交通资源异常')
                        this.$Loading.error()
                    })
            },
            previewItem ( id ) {
                window.open(window.location.href.substring(0, window.location.href.indexOf(window.location.pathname)) +
                    '/transformPreview/' + id, '_blank')
            },
            publishOrCancel ( params ) {
                this.$Loading.start()
                this.$ajax.get(window.location.href.substring(0, window.location.href.indexOf(window.location.pathname)) +
                    '/api/publishedTransform/' + params.row.id )
                    .then( (response) => {
                        params.row.isuse = ! params.row.isuse
                        this.$Message.success('发布/取消发布资源成功')
                        this.$Loading.finish()
                    })
                    .catch( (error) => {
                        console.log('发布/取消发布资源出错：', error)
                        this.$Message.error('发布/取消发布资源异常')
                        this.$Loading.error()
                    })
            },
            cancelSelection () {
                this.$Loading.start()
                this.$ajax.get(window.location.href.substring(0, window.location.href.indexOf(window.location.pathname)) +
                    '/api/cancelSelectionTransform/' + this.selectedList.join('-') )
                    .then( (response) => {
                        for( let i = 0; i < this.selectedList.length; i ++) {
                            for ( let j = 0; j < this.transform.length; j ++) {
                                if (this.transform[j].id == this.selectedList[i]) {
                                    this.transform[j].isuse = false
                                    break
                                }
                            }
                        }
                        this.$Message.success('批量取消发布成功')
                        this.$Loading.finish()
                    })
                    .catch( (error) => {
                        console.log('批量取消发布交通资源出错：', error)
                        this.$Message.error('批量取消发布异常')
                        this.$Loading.error()
                    })
            },
            publishSelection () {
                this.$Loading.start()
                this.$ajax.get(window.location.href.substring(0, window.location.href.indexOf(window.location.pathname)) +
                    '/api/publishedSelectionTransform/' + this.selectedList.join('-') )
                    .then( (response) => {
                        for( let i = 0; i < this.selectedList.length; i ++) {
                            for ( let j = 0; j < this.transform.length; j ++) {
                                if (this.transform[j].id == this.selectedList[i]) {
                                    this.transform[j].isuse = true
                                    break
                                }
                            }
                        }
                        this.$Message.success('批量发布成功')
                        this.$Loading.finish()
                    })
                    .catch( (error) => {
                        console.log('批量发布交通资源出错：', error)
                        this.$Message.error('批量发布异常')
                        this.$Loading.error()
                    })
            },
            previewListPage () {
                window.open(window.location.href.substring(0, window.location.href.indexOf(window.location.pathname)) + '/transformPreview')
            }
        }
    }
</script>
