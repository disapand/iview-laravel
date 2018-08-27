<template>
    <div class="spin-container">

        <i-form :model="Case" ref="Case" :rules="CaseRules">
            <!--
            -
            -   基本信息编辑部分
            -
            --->
            <Card style="width: 67.5%; display: inline-block; margin-right: 1.5%;">
                <p slot="title">
                    <Icon type="clipboard"></Icon>
                    基本信息
                </p>

                <form-item label="标题" prop="title">
                    <i-input v-model="Case.title" placeholder="" clearable autofocus/>
                </form-item>

                <form-item label="分类" prop="category">
                    <radio-group v-model="Case.category" type="button">
                        <radio label="全部"></radio>
                        <radio label="游戏"></radio>
                        <radio label="应用"></radio>
                        <radio label="电商"></radio>
                        <radio label="旅游"></radio>
                        <radio label="汽车"></radio>
                        <radio label="3C电子产品"></radio>
                        <radio label="快消品"></radio>
                        <radio label="其他"></radio>
                    </radio-group>
                </form-item>

                <form-item label="客户需求" prop="needs">
                    <i-input v-model="Case.needs" placeholder="" type="textarea" :autosize="{minRows: 5}"/>
                </form-item>

                <form-item label="推广策略" prop="strategy">
                    <i-input v-model="Case.strategy" placeholder="" type="textarea" :autosize="{minRows: 5}"/>
                </form-item>

                <form-item label="方案执行" prop="execute">
                    <i-input v-model="Case.execute" placeholder="" type="textarea" :autosize="{minRows: 5}"/>
                </form-item>

                <form-item label="推广效果" prop="effect">
                    <i-input v-model="Case.effect" placeholder="" type="textarea" :autosize="{minRows: 5}"/>
                </form-item>

                <form-item label="是否在首页展示">
                    <i-switch v-model="Case.show" size="large">
                        <span slot="open">是</span>
                        <span slot="close">否</span>
                    </i-switch>
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
                            action="http://www.zetin.cn/api/caseImg"
                            :on-success="imgSuccess"
                            :on-error="imgError"
                            :data="Case"
                            :show-upload-list=false>
                        <div style="width: 100%; height: 120px">
                            <Icon type="ios-cloud-upload" size="52" style="color: #3399ff;margin-top: 20px"></Icon>
                            <p>点击或者拖拽图片到此上传</p>
                        </div>
                    </upload>
                </form-item>

                <template v-for="img in Case.Imgs.data">
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
                <i-button icon="ios-checkmark-empty" type="success" @click="updateCase">{{ edit }}</i-button>
                <poptip confirm v-if="canDel" transfer title="您确定要删除该资源吗？删除后不可恢复" @on-ok="deleteCase(Case.id)">
                    <i-button icon="ios-trash" type="error">删除资源</i-button>
                </poptip>
            </div>

        </i-form>
        <Spin size="large" fix v-if="spinShow"></Spin>
    </div>
</template>

<script>
    import Editor from "./editor";

    export default {
        components: {Editor},
        data() {
            return{
                edit: '编辑资源',
                canDel: true,
                spinShow: true,
                content: '',
                Case: {
                    id: '',
                    title:'',
                    category: '',
                    effect: '',
                    execute: '',
                    strategy: '',
                    needs: '',
                    show: false,
                    Imgs: {
                        data: [],
                    }
                },
                CaseRules: {
                    title:[
                        {required: true, message: '请输入标题', trigger: 'blur'}
                    ],
                    category:[
                        {required: true, message: '请选择分类', trigger: 'change'}
                    ],
                    needs:[
                        {required: true, message: '请输入需求分析', trigger: 'blur'}
                    ],
                    strategy:[
                        {required: true, message: '请输入推广策略', trigger: 'blur'}
                    ],
                    execute:[
                        {required: true, message: '请输入方案执行', trigger: 'blur'}
                    ],
                    effect:[
                        {required: true, message: '请输入推广效果', trigger: 'blur'}
                    ],
                },
                img: '',
            }
        },
        created() {
            if (this.$route.params.id) {
                this.$ajax.get('http://www.zetin.cn/api/case/' + this.$route.params.id + '?include=Imgs').then((response) => {
                    console.log('获取资源', response)
                    this.Case = response.data
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
        methods: {
            /*
            *   返回上一页的方法
            * */
            back() {
                this.$router.go(-1)
            },
            deleteImg(id) {
                this.$Modal.confirm({
                    title: '删除图片',
                    content: '确定要删除这张图片吗？',
                    /*
                    *   确定删除的后从服务器删除对应的图片，并返回删除后的图片列表
                    * */
                    onOk: () => {
                        this.$ajax.delete('http://www.zetin.cn/api/caseImg/' + id).then((response) => {
                            this.$Message.info('图片删除完成')
                            if (response.data.data) {
                                this.Case.Imgs.data = response.data.data
                            } else {
                                this.Case.Imgs.data = []
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
                                    action: 'http://www.zetin.cn/api/caseImgUpdate',
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
            *   图片上传成功的方法
            * */
            imgSuccess(response, file, fileList) {
                this.$Message.info('图片上传成功');
                this.Case.Imgs.data.push(response)
                console.log(response)
            },
            /*
            *   图片更新成功的方法
            * */
            imgUpdateSuccess(response, file, fileList) {
                this.$Message.info('图片上传成功');
                this.Case.Imgs.data.forEach(function (item) {
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
            updateCase() {
                this.$refs['Case'].validate((valid) => {
                    if (valid) {
                        this.$ajax.post('http://www.zetin.cn/api/case', this.Case).then((response) => {
                            console.log(response.data)
                            this.$Message.info('资源编辑成功')
                        }).catch((error) => {
                            this.$Message.error('资源编辑失败')
                            console.log('资源编辑失败', error)
                        })
                    }else {
                        this.$Message.warning('请填写必须信息')
                    }
                })
            },
            /*
           *   根据当前电视的id删除电视资源，删除完成后返回上一页
           * */
            deleteCase(id) {
                this.$ajax.delete('http://www.zetin.cn/api/case/' + id).then((response) => {
                    this.$Message.info('删除资源成功')
                    this.$router.go(-1)
                }).catch((error) => {
                    this.$Message.info('删除资源出错')
                    console.log('删除资源出错', error)
                })
            },
        }
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