<template>
    <div class="spin-container">

        <i-form :model="internet" ref="internet" :rules="internetRules">
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

                <form-item label="KOL名称" prop="name">
                    <i-input v-model="internet.name" placeholder="" clearable autofocus/>
                </form-item>

                <form-item label="平台" prop="platform">
                    <radio-group v-model="internet.platform" type="button">
                        <radio label="Fackbook"></radio>
                        <radio label="Youtube"></radio>
                        <radio label="Instagram"></radio>
                        <radio label="Twitter"></radio>
                        <radio label="Vk"></radio>
                        <radio label="Pinterest"></radio>
                        <radio label="Blog"></radio>
                    </radio-group>
                </form-item>

                <form-item label="覆盖地区" prop="area">
                    <i-input v-model="internet.area" placeholder="" clearable autofocus/>
                </form-item>

                <form-item label="语言" prop="language">
                    <i-input v-model="internet.language" placeholder="" clearable autofocus/>
                </form-item>

                <form-item label="类别" prop="category">
                    <checkbox-group v-model="internet.category">
                        <checkbox label="财经"></checkbox>
                        <checkbox label="体育"></checkbox>
                        <checkbox label="时尚"></checkbox>
                        <checkbox label="科技"></checkbox>
                        <checkbox label="生活"></checkbox>
                        <checkbox label="旅游"></checkbox>
                        <checkbox label="八卦"></checkbox>
                        <checkbox label="音乐"></checkbox>
                        <checkbox label="影视"></checkbox>
                        <checkbox label="艺术"></checkbox>
                        <checkbox label="汽车"></checkbox>
                        <checkbox label="健康"></checkbox>
                        <checkbox label="漫画"></checkbox>
                        <checkbox label="搞笑"></checkbox>
                        <checkbox label="美食"></checkbox>
                        <checkbox label="游戏"></checkbox>
                        <checkbox label="亲子"></checkbox>
                        <checkbox label="宠物"></checkbox>
                        <checkbox label="其他"></checkbox>
                    </checkbox-group>
                </form-item>

                <form-item label="粉丝量" prop="fans">
                    <i-input v-model.number="internet.fans" placeholder="" clearable/>
                </form-item>

                <form-item label="国家或地区" prop="country">
                    <i-input v-model="internet.country" placeholder="" clearable/>
                </form-item>

                <form-item label="合作品牌" prop="cooperation">
                    <i-input v-model="internet.cooperation" placeholder="" clearable/>
                </form-item>

                <form-item label="KOL特点">
                    <i-input type="textarea" v-model="internet.detail" placeholder="" :autosize="{minRows: 5}"/>
                </form-item>


                <form-item label="是否有效">
                    <i-switch v-model="internet.isuse" size="large">
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
            <Card style="width: 33%; display: inline-block; vertical-align: top; margin-right: 1.5%">
                <p slot="title">
                    <Icon type="compose"></Icon>
                    附加信息
                </p>

                <form-item label="广告形式">
                    <i-input v-model="internet.ad_form" placeholder="" clearable/>
                </form-item>

                <form-item label="媒体报价（美元）">
                    <i-input v-model="internet.media_price" placeholder="">
                        <span slot="append">
                            <Icon type="social-usd"></Icon>
                        </span>
                    </i-input>
                </form-item>

                <form-item label="执行价（美元）">
                    <i-input v-model="internet.price" placeholder="">
                        <span slot="append">
                            <Icon type="social-usd"></Icon>
                        </span>
                    </i-input>
                </form-item>

                <form-item label="KOL所属公司或集团">
                    <i-input v-model="internet.company" placeholder="" clearable/>
                </form-item>

                <form-item label="媒介开发者">
                    <i-input v-model="internet.contributor" placeholder="" clearable/>
                </form-item>

                <form-item label="擅长的推广方式">
                    <i-input type="textarea" v-model="internet.advantage" placeholder="" :autosize="{minRows: 5}"/>
                </form-item>

                <form-item label="上刊要求">
                    <i-input type="textarea" v-model="internet.requirements" placeholder="" :autosize="{minRows: 5}"/>
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
                            action="https://www.zetin.cn/api/internetImg"
                            :on-success="imgSuccess"
                            :on-error="imgError"
                            :data="internet"
                            :show-upload-list=false>
                        <div style="width: 100%; height: 120px">
                            <Icon type="ios-cloud-upload" size="52" style="color: #3399ff;margin-top: 20px"></Icon>
                            <p>点击或者拖拽图片到此上传</p>
                        </div>
                    </upload>
                </form-item>

                <template v-for="img in internet.Imgs.data">
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
                <i-button icon="ios-checkmark-empty" type="success" @click="updateInternet">{{ edit }}</i-button>
                <poptip confirm v-if="canDel" transfer title="您确定要删除该资源吗？删除后不可恢复" @on-ok="deleteInternet(internet.id)">
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
                internet: {
                    id: '',
                    name: '',
                    platform: '',
                    area: '',
                    language: '',
                    category: [],
                    fans: '',
                    country: '',
                    cooperation: '',
                    ad_form: '',
                    detail: '',
                    media_price: '',
                    price: '',
                    company: '',
                    contributor: '',
                    advantage: '',
                    requirements: '',
                    Imgs: {
                        data: []
                    },
                    isuse: true,
                },
                internetRules: {
                    name: [
                        {required: true, message: '媒体名称不能为空', trigger: 'blur'}
                    ],
                    platform: [
                        {required: true, message: '平台不能为空', trigger: 'blur'}
                    ],
                    area: [
                        {required: true, message: '覆盖区域信息不能为空', trigger: 'blur'}
                    ],
                    language: [
                        {required: true, message: '语言信息不能为空', trigger: 'blur'}
                    ],
                    category: [
                        {required: true, type: 'array', message: '类别不能为空', trigger: 'change'}
                    ],
                    fans: [
                        {required: true, type: 'number', message: '粉丝数量不能为空', trigger: 'blur'}
                    ],
                    cooperation: [
                        {required: true, message: '合作品牌信息不能为空', trigger: 'blur'}
                    ],
                    country: [
                        {required: true, message: '国家和地区不能为空', trigger: 'blur'}
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
                        this.$ajax.delete('https://www.zetin.cn/api/internetImg/' + id).then((response) => {
                            this.$Message.info('图片删除完成')
                            if (response.data.data) {
                                this.internet.Imgs.data = response.data.data
                            } else {
                                this.internet.Imgs.data = []
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
                                    action: 'https://www.zetin.cn/api/internetImgUpdate',
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
            deleteInternet(id) {
                this.$ajax.delete('https://www.zetin.cn/api/internet/' + id).then((response) => {
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
            updateInternet() {
                this.$refs['internet'].validate((valid) => {
                    if (valid) {
                        this.$ajax.post('https://www.zetin.cn/api/internet', this.internet).then((response) => {
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
                this.internet.Imgs.data.push(response)
                console.log(response)
            },
            /*
            *   图片更新成功的方法
            * */
            imgUpdateSuccess(response, file, fileList) {
                this.$Message.info('图片上传成功');
                this.internet.Imgs.data.forEach(function (item) {
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
                this.$ajax.get('https://www.zetin.cn/api/internet/' + this.$route.params.id + '?include=Imgs').then((response) => {
                    console.log('获取资源', response)
                    this.internet = response.data
                    this.spinShow = false
                    this.edit = '提交修改'
                }).catch((error) => {
                    this.$Message.error('资源未找到')
                    console.log('编辑资源出错', error)
                })
            } else {
                this.spinShow = false
                this.canDel = false
                console.log('创建资源')
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