<template>
    <div class="spin-container">

        <i-form :model="transform" ref="transform" :rules="transformRules">
            <!--
            -
            -   基本信息编辑部分
            -
            --->
            <Card style="width: 33%; display: inline-block; margin-right: 1.5%;">
                <p slot="title">
                    <Icon type="clipboard"></Icon>
                    基本信息
                </p>

                <form-item label="城市" prop="city">
                    <i-input v-model="transform.city" placeholder="" clearable autofocus/>
                </form-item>

                <form-item label="形式" prop="form">
                    <radio-group v-model="transform.form" type="button">
                        <radio label="静态"></radio>
                        <radio label="灯箱"></radio>
                        <radio label="数码"></radio>
                    </radio-group>
                </form-item>

                <form-item label="媒体具体位置" prop="position">
                    <i-input v-model="transform.position" placeholder="" clearable autofocus/>
                </form-item>

                <form-item label="类别" prop="category">
                    <radio-group v-model="transform.category" type="button">
                        <radio label="飞机"></radio>
                        <radio label="地铁"></radio>
                        <radio label="轻轨"></radio>
                        <radio label="巴士"></radio>
                        <radio label="出租车"></radio>
                        <radio label="船舶"></radio>
                        <radio label="其他"></radio>
                    </radio-group>
                </form-item>

                <form-item label="覆盖区域" prop="area">
                    <i-input v-model="transform.area" placeholder="" clearable/>
                </form-item>

                <form-item label="SOV" prop="SOV">
                    <i-input v-model="transform.SOV" placeholder="" clearable/>
                </form-item>

                <form-item label="规格尺寸" prop="format">
                    <i-input v-model="transform.format" placeholder="" clearable/>
                </form-item>

                <form-item label="广告载体面数" prop="number">
                    <i-input v-model="transform.number" placeholder="" clearable/>
                </form-item>

                <form-item label="国家或地区" prop="country">
                    <i-input v-model="transform.country" placeholder="" clearable/>
                </form-item>

                <form-item label="名称" prop="name">
                    <i-input v-model="transform.name" placeholder="" clearable/>
                </form-item>

                <form-item label="媒体的总数量">
                    <i-input v-model="transform.total_num" placeholder="" clearable/>
                </form-item>

                <form-item label="媒体细节">
                    <i-input type="textarea" v-model="transform.detail" placeholder="" :autosize="{minRows: 5}"/>
                </form-item>

                <form-item label="是否发布">
                    <i-switch v-model="transform.isuse" size="large">
                        <span slot="open">是</span>
                        <span slot="close">否</span>
                    </i-switch>
                </form-item>

            </Card>

            <!--
            -
            -   扩展信息编辑部分
            -
            --->
            <Card style="width: 33%; display: inline-block; vertical-align: top; margin-right: 1.5%;">
                <p slot="title">
                    <Icon type="compose"></Icon>
                    附加信息
                </p>

                <form-item label="单位数量">
                    <i-input v-model="transform.unit_num" placeholder="" clearable/>
                </form-item>

                <form-item label="语言">
                    <i-input v-model="transform.language" placeholder="" clearable/>
                </form-item>

                <form-item label="人流量">
                    <i-input v-model="transform.visitor" placeholder="" clearable/>
                </form-item>

                <form-item label="车流量">
                    <i-input v-model="transform.traffic" placeholder="" clearable/>
                </form-item>

                <form-item label="最小采购周期或单位">
                    <i-input v-model="transform.minimum_buy" placeholder="" clearable/>
                </form-item>

                <form-item label="广告刊出时间">
                    <i-input v-model="transform.time" placeholder="" clearable/>
                </form-item>

                <form-item label="媒体报价（美元）">
                    <i-input v-model="transform.media_price" placeholder="">
                        <span slot="append">
                            <Icon type="social-usd"></Icon>
                        </span>
                    </i-input>
                </form-item>

                <form-item label="执行价（美元）">
                    <i-input v-model="transform.price" placeholder="">
                        <span slot="append">
                            <Icon type="social-usd"></Icon>
                        </span>
                    </i-input>
                </form-item>

                <form-item label="媒体所属公司或集团">
                    <i-input v-model="transform.company" placeholder="" clearable/>
                </form-item>

                <form-item label="媒介开发者">
                    <i-input v-model="transform.contributor" placeholder="" clearable/>
                </form-item>

                <form-item label="上刊要求">
                    <i-input type="textarea" v-model="transform.requirements" placeholder="" :autosize="{minRows: 5}"/>
                </form-item>

            </Card>

            <!--
            -
            -   图片编辑部分
            -
            --->
            <Card style="width: 30%; display: inline-block; vertical-align: top;">
                <p slot="title">
                    <Icon type="image"></Icon>
                    图片信息
                </p>

                <form-item>
                    <upload multiple type="drag"
                            name="img"
                            action="https://www.zetin.cn/api/transformImg"
                            :on-success="imgSuccess"
                            :on-error="imgError"
                            :data="transform"
                            :show-upload-list=false>
                        <div style="width: 100%; height: 120px">
                            <Icon type="ios-cloud-upload" size="52" style="color: #3399ff;margin-top: 20px"></Icon>
                            <p>点击或者拖拽图片到此上传</p>
                        </div>
                    </upload>
                </form-item>

                <template v-for="img in transform.transformResourceImgs.data">
                    <div class="img-list">
                        <img :src="img.url" alt="">
                        <div class="img-list-cover">
                            <Icon type="ios-trash" @click.native="deleteImg(img.id)"></Icon>
                            <Icon type="upload" @click.native="updateImg(img)"></Icon>
                        </div>
                    </div>
                </template>

            </Card>

            <div class="btn-group-custom">
                <i-button icon="ios-arrow-back" @click="back">返回资源列表</i-button>
                <i-button icon="ios-checkmark-empty" type="success" @click="updateTransform">{{ edit }}</i-button>
                <poptip confirm v-if="canDel" transfer title="您确定要删除该资源吗？删除后不可恢复" @on-ok="deleteTransform(transform.id)">
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
                transform: {
                    id: '',
                    city: '',
                    form: '',
                    category: '',
                    position: '',
                    area: '',
                    SOV: '',
                    format: '',
                    number: '',
                    country: '',
                    name: '',
                    unit_num: '',
                    language: '',
                    visitor: '',
                    traffic: '',
                    minimum_buy: '',
                    time: '',
                    media_price: '',
                    price: '',
                    total_num: '',
                    company: '',
                    contributor: '',
                    detail: '',
                    requirements: '',
                    transformResourceImgs: {
                        data: []
                    },
                    isuse: false,
                },
                transformRules: {
                    city: [
                        {required: true, message: '城市信息不能为空', trigger: 'blur'}
                    ],
                    form: [
                        {required: true, message: '展现形式不能为空', trigger: 'blur'}
                    ],
                    category: [
                        {required: true, message: '类别不能为空', trigger: 'blur'}
                    ],
                    position: [
                        {required: true, message: '媒体具体位置信息不能为空', trigger: 'blur'}
                    ],
                    area: [
                        {required: true, message: '覆盖区域信息不能为空', trigger: 'blur'}
                    ],
                    SOV: [
                        {required: true, message: 'SOV信息不能为空', trigger: 'blur'}
                    ],
                    format: [
                        {required: true, message: '规格尺寸不能为空', trigger: 'blur'}
                    ],
                    number: [
                        {required: true, message: '广告载体面数不能为空', trigger: 'blur'}
                    ],
                    name: [
                        {required: true, message: '名称不能为空', trigger: 'blur'}
                    ],
                    country: [
                        {required: true, message: '国家和地区不能为空', trigger: 'blur'}
                    ],
                },
                spinShow: true,
                edit: '创建资源',
                canDel: true,
                img: '',
                currentPage: 1
            }
        },
        methods: {
            /*
            *   返回上一页的方法
            * */
            back() {
                this.$router.push({'name': 'transform', params: {currentPage: this.currentPage}})
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
                        this.$ajax.delete('https://www.zetin.cn/api/transformImg/' + id).then((response) => {
                            this.$Message.info('图片删除完成')
                            if (response.data.data) {
                                this.transform.transformResourceImgs.data = response.data.data
                            } else {
                                this.transform.transformResourceImgs.data = []
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
                                    action: 'https://www.zetin.cn/api/transformImgUpdate',
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
                        ],)
                    },
                });
            },
            /*
            *   根据当前电视的id删除电视资源，删除完成后返回上一页
            * */
            deleteTransform(id) {
                this.$ajax.delete('https://www.zetin.cn/api/transform/' + id).then((response) => {
                    this.$Message.info('删除交通资源成功')
                    this.$router.go(-1)
                }).catch((error) => {
                    this.$Message.info('删除交通资源出错')
                    console.log('删除交通资源出错', error)
                })
            },
            /*
            *   更新或者新建电视资源
            * */
            updateTransform() {
                this.$refs['transform'].validate((valid) => {
                    if (valid) {
                        this.transform.userid = this.$store.state.user.id
                        this.$ajax.post('https://www.zetin.cn/api/transform', this.transform).then((response) => {
                            console.log(response.data)
                            this.$Message.info('交通资源编辑成功')
                        }).catch((error) => {
                            this.$Message.error('交通资源编辑失败')
                            console.log('交通资源编辑失败：', error)
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
                this.transform.transformResourceImgs.data.push(response)
                console.log(response)
            },
            /*
            *   图片更新成功的方法
            * */
            imgUpdateSuccess(response, file, fileList) {
                this.$Message.info('图片上传成功');
                this.transform.transformResourceImgs.data.forEach(function (item) {
                    if (item.id == response.id) {
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
                this.$ajax.get('https://www.zetin.cn/api/transform/' + this.$route.params.id + '?include=transformResourceImgs').then((response) => {
                    if (this.$route.params.currentPage != undefined) {
                        this.currentPage = this.$route.params.currentPage
                    }
                    this.transform = response.data
                    this.spinShow = false
                    this.edit = '提交修改'
                    console.log('编辑交通资源', response)
                }).catch((error) => {
                    this.$Message.error('交通资源未找到')
                    console.log('交通资源资源出错', error)
                })
            } else {
                this.spinShow = false
                this.canDel = false
                console.log('创建交通资源')
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
        height: 100%;
        vertical-align: middle;
        border-radius: 5px;
        border: 1px rgba(0, 0, 0, .1) dashed;
        overflow: hidden;
        margin-top: 5px;

        img {
            max-width: 100%;
        }
    }

    .img-list-cover {
        display: none;
        position: absolute;
        background: rgba(0, 0, 0, .6);
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
    }

    .img-list:hover .img-list-cover {
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .img-list-cover .ivu-icon {
        font-size: 3em;
        margin: 0 25px;
        color: #fff;
        cursor: pointer;
    }

    .ivu-radio-group-button .ivu-radio-wrapper {
        margin: 3px 0;
    }

    .btn-group-custom {
        position: fixed;
        bottom: 5%;
        left: 50%;
        transform: translateX(-50%);
        padding: 15px;
        background: #ccc;
        border-radius: 5px;
        z-index: 9;
    }


    .customPop {
        text-align: left;
    }

</style>
