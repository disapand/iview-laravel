<template>
    <div class="spin-container">

        <i-form :model="tv" ref="tv" :rules="tvRules">
            <!--
            -
            -   基本信息编辑部分
            -
            --->
            <Card style="width: 600px; display: inline-block; margin-right: 20px;">
                <p slot="title">
                    <Icon type="clipboard"></Icon>
                    基本信息
                </p>

                <form-item label="电视频道" prop="channel">
                    <i-input v-model="tv.channel" placeholder="" clearable/>
                </form-item>

                <form-item label="展现形式" prop="form">
                    <i-input v-model="tv.form" placeholder="" clearable/>
                </form-item>

                <form-item label="覆盖地区" prop="area">
                    <i-input v-model="tv.area" placeholder="" clearable/>
                </form-item>

                <form-item label="语言" prop="language">
                    <i-input v-model="tv.language" placeholder="" clearable/>
                </form-item>

                <form-item label="类别" prop="category">
                    <radio-group v-model="tv.category" type="button">
                        <radio label="综合"></radio>
                        <radio label="新闻"></radio>
                        <radio label="财经"></radio>
                        <radio label="体育"></radio>
                        <radio label="娱乐"></radio>
                        <radio label="时尚"></radio>
                        <radio label="科技"></radio>
                        <radio label="生活"></radio>
                        <radio label="文史"></radio>
                        <radio label="军事"></radio>
                        <radio label="旅游"></radio>
                        <radio label="八卦"></radio>
                        <radio label="音乐"></radio>
                        <radio label="电影"></radio>
                        <radio label="少儿"></radio>
                        <radio label="艺术"></radio>
                        <radio label="汽车"></radio>
                        <radio label="健康"></radio>
                        <radio label="其他"></radio>
                    </radio-group>
                </form-item>

                <form-item label="所属电视台" prop="station">
                    <i-input v-model="tv.station" placeholder="" clearable/>
                </form-item>

                <form-item label="广告时长(s)" prop="time">
                    <radio-group v-model="tv.time" type="button">
                        <radio label="5"></radio>
                        <radio label="10"></radio>
                        <radio label="15"></radio>
                        <radio label="20"></radio>
                        <radio label="25"></radio>
                        <radio label="30"></radio>
                        <radio label="45"></radio>
                        <radio label="60"></radio>
                        <radio label="120"></radio>
                    </radio-group>
                </form-item>

                <form-item label="国家或地区" prop="country">
                    <i-input v-model="tv.country" placeholder="" clearable/>
                </form-item>

                <form-item label="热门节目" prop="program">
                    <i-input type="textarea" v-model="tv.program" placeholder="" :autosize="{minRows: 5}"/>
                </form-item>

                <form-item label="是否有效">
                    <i-switch v-model="tv.isuse" size="large">
                        <span slot="open">有效</span>
                        <span slot="close">无效</span>
                    </i-switch>
                </form-item>

            </Card>

            <!--
            -
            -   扩展信息编辑部分
            -
            --->
            <Card style="width: 550px; display: inline-block; position: absolute; top: 0;">
                <p slot="title">
                    <Icon type="compose"></Icon>
                    附加信息
                </p>

                <form-item label="最小采购金额或周期">
                    <i-input v-model="tv.minimum_buy" placeholder="" clearable style="width: 100px;"/>
                </form-item>

                <form-item label="媒体所属公司或集团">
                    <i-input v-model="tv.company" placeholder="" clearable/>
                </form-item>

                <form-item label="媒介开发者">
                    <i-input v-model="tv.contributor" placeholder="" clearable/>
                </form-item>

                <form-item label="价格区间(美金)">
                    <i-input v-model="tv.price" placeholder="" style="width: 100px;">
                    <span slot="append">
                        <Icon type="social-usd"></Icon>
                    </span>
                    </i-input>
                </form-item>

                <form-item label="频道介绍" prop="detail">
                    <i-input type="textarea" v-model="tv.detail" placeholder="" :autosize="{minRows: 5}"/>
                </form-item>

                <form-item label="上刊要求">
                    <i-input type="textarea" v-model="tv.requirements" placeholder="" :autosize="{minRows: 5}"/>
                </form-item>

            </Card>

            <!--
            -
            -   图片编辑部分
            -
            --->
            <Card style="width: 400px; display: inline-block; position: absolute; top: 0; left: 1190px">
                <p slot="title">
                    <Icon type="image"></Icon>
                    图片信息
                </p>

                <form-item>
                    <upload multiple type="drag"
                            name="img"
                            action="http://iview-laravel.test/api/img"
                            :on-success="imgSuccess"
                            :on-error="imgError"
                            :data="tv"
                            :show-upload-list=false>
                        <div style="width: 360px; height: 120px">
                            <Icon type="ios-cloud-upload" size="52" style="color: #3399ff;margin-top: 20px"></Icon>
                            <p>点击或者拖拽图片到此上传</p>
                        </div>
                    </upload>
                </form-item>

                <template v-for="img in tv.televisionResourcesImgs.data">
                    <div class="img-list">
                        <img :src="img.url" alt="">
                        <div class="img-list-cover">
                            <Icon type="ios-trash" @click.native="deleteImg(img.id)"></Icon>
                            <Icon type="upload" @click.native="updateImg(img)"></Icon>
                        </div>
                    </div>
                </template>

            </Card>

            <div style="margin: 30px;text-align: center">
                <i-button icon="ios-arrow-back" @click="back">返回资源列表</i-button>
                <i-button icon="ios-checkmark-empty" type="success" @click="updateTv">{{ edit }}</i-button>
                <poptip confirm v-if="canDel" transfer title="您确定要删除该资源吗？删除后不可恢复" @on-ok="deleteTv(tv.id)">
                    <i-button icon="ios-trash" type="error">删除资源</i-button>
                </poptip>
            </div>

        </i-form>
        <Spin size="large" fix v-if="spinShow"></Spin>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                tv: {
                    id: '',
                    channel: '',
                    form: '',
                    detail: '',
                    area: '',
                    language: '',
                    category: '',
                    station: '',
                    minimum_buy: '',
                    time: '',
                    company: '',
                    contributor: '',
                    price: '',
                    country: '',
                    program: '',
                    requirements: '',
                    televisionResourcesImgs: {
                        data: []
                    },
                    isuse: true,
                },
                tvRules: {
                    channel: [
                        {required: true, message: '频道信息不能为空', trigger: 'blur'}
                    ],
                    form: [
                        {required: true, message: '展现形式不能为空', trigger: 'blur'}
                    ],
                    detail: [
                        {required: true, message: '频道介绍不能为空', trigger: 'blur'}
                    ],
                    area: [
                        {required: true, message: '覆盖地区不能为空', trigger: 'blur'}
                    ],
                    language: [
                        {required: true, message: '语言不能为空', trigger: 'blur'}
                    ],
                    category: [
                        {required: true, message: '类别不能为空', trigger: 'blur'}
                    ],
                    station: [
                        {required: true, message: '所属电视台不能为空', trigger: 'blur'}
                    ],
                    time: [
                        {required: true, message: '广告时长不能为空', trigger: 'blur'}
                    ],
                    country: [
                        {required: true, message: '国家和地区不能为空', trigger: 'blur'}
                    ],
                    program: [
                        {required: true, message: '热门节目不能为空', trigger: 'blur'}
                    ],
                    detail: [
                        {required: true, message: '频道介绍不能为空', trigger: 'blur'}
                    ],
                },
                spinShow: true,
                edit: '创建资源',
                canDel: true,
                img: '',
            }
        },
        methods: {
            /*
            *   返回上一页的方法
            * */
            back() {
                this.$router.go(-1)
            },
            /*
            *   删除图片的方法，需要传入删除图的id，同时从后台返回数据更新imgList
            * */
            deleteImg(id) {
                this.$Modal.confirm({
                    title: '删除图片',
                    content: '确定要删除这张图片吗？',
                    /*
                    *   确定删除的后从服务器删除对应的图片，并返回删除后的图片列表
                    * */
                    onOk: () => {
                        this.$ajax.delete('http://iview-laravel.test/api/img/' + id).then((response) => {
                            console.log(response)
                            this.$Message.info('图片删除完成')
                            if (response.data.data) {
                                this.tv.televisionResourcesImgs.data = response.data.data
                            } else {
                                this.tv.televisionResourcesImgs.data = []
                            }
                        }).catch((error) => {
                            console.log('删除图片出错：', error)
                            this.$Message.error('图片删除失败')
                        })
                    }
                })
            },
            /*
            *   更新图片或者上传图片的方法
            * */
            updateImg(img) {
                this.img = img
                this.$Modal.info({
                    title: '修改图片',
                    okText: '取消',
                    render: (h) => {
                        return h('div', [
                            h('upload', {
                                props: {
                                    action: 'http://iview-laravel.test/api/img',
                                    type: 'drag',
                                    name: 'img',
                                    data: this.img,
                                    'show-upload-list': false,
                                    'on-success': this.imgUpdateSuccess,
                                    'on-error': this.imgUpdateError,
                                },
                                style: {
                                    paddingTop: '50px',
                                },
                            }, [
                                h('div', [
                                    h('icon', {
                                        props: {
                                            type: 'ios-cloud-upload',
                                            size: 52
                                        },
                                        style: {
                                            paddingTop: '20px'
                                        }
                                    }),
                                    h('p', {
                                        style: {
                                            paddingBottom: '20px'
                                        }
                                    }, '点击或者拖拽图片到此上传')
                                ])
                            ]),
                        ], )
                    },
                });
            },
            /*
            *   根据当前电视的id删除电视资源，删除完成后返回上一页
            * */
            deleteTv(id) {
                this.$ajax.delete('http://iview-laravel.test/api/tv/' + id).then((response) => {
                    this.$Message.info('删除资源成功')
                    this.$router.go(-1)
                }).catch((error) => {
                    this.$Message.info('删除资源出错')
                    console.log('删除资源出错', error)
                })
            },
            /*
            *   更新或者新建电视资源
            * */
            updateTv() {
                this.$refs['tv'].validate((valid) => {
                    if (valid) {
                        console.log('submit', this.tv)
                        this.$ajax.post('http://iview-laravel.test/api/tv', this.tv).then((response) => {
                            console.log(response.data)
                            this.$Message.info('资源编辑成功')
                        }).catch((error) => {
                            this.$Message.error('资源编辑失败')
                            console.log('资源编辑失败：', error)
                        })
                    } else {
                        this.$Message.warning('请填写必须信息')
                    }
                })
            },
            /*
            *   图片上传成功的方法
            * */
            imgSuccess(response, file, fileList) {
                this.$Message.info('图片上传成功');
                this.tv.televisionResourcesImgs.data.push(response)
                console.log(response)
            },
            /*
            *   图片更新成功的方法
            * */
            imgUpdateSuccess(response, file, fileList) {
                this.$Message.info('图片上传成功');
                this.tv.televisionResourcesImgs.data.forEach(function (item) {
                    if( item.id == response.id) {
                        item.url = response.url
                    }
                })
                this.$Modal.remove()
            },
            /*
            *   图片上传失败的方法
            * */
            imgError(response, file, fileList) {
                this.$Message.error('图片上传失败')
                console.log(response)
            },
            /*
            *   图片更新失败的方法
            * */
            imgUpdateError(response, file, fileList) {
                this.imgError(response, file, fileList)
                this.$Modal.remove();
            },
        },
        created() {
            /*
            *   根据传过来的id获取对应的televisionResources
            * */
            if (this.$route.params.id) {
                this.$ajax.get('http://iview-laravel.test/api/tv/' + this.$route.params.id + '?include=televisionResourcesImgs').then((response) => {
                    this.tv = response.data
                    this.spinShow = false
                    this.edit = '提交修改'
                }).catch((error) => {
                    this.$Message.error('电视资源未找到')
                })
            } else {
                this.spinShow = false
                this.canDel = false
            }
        },
        mounted() {
        },
    }
</script>

<style scoped lang="scss">
    .spin-container {
        position: relative;
    }

    .img-list {
        position: relative;
        display: inline-block;
        text-align: center;
        width: 360px;
        height: 240px;
        line-height: 240px;
        vertical-align: middle;
        border-radius: 5px;
        border: 1px rgba(0, 0, 0, .1) dashed;
        overflow: hidden;

        img {
            max-width: 100%;
        }
    }

    .img-list-cover {
        display: none;
        position: absolute;
        height: 240px;
        line-height: 240px;
        vertical-align: middle;
        background: rgba(0, 0, 0, .6);
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
    }

    .img-list:hover .img-list-cover {
        display: inline-block;
    }

    .img-list-cover .ivu-icon {
        font-size: 3em;
        margin-left: 25px;
        color: #fff;
        margin-top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
    }

    .ivu-radio-group-button .ivu-radio-wrapper {
        margin: 3px 0;
    }

    .customPop {
        text-align: left;
    }

</style>