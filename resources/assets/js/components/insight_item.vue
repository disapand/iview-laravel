<template>
    <div class="spin-container">

        <i-form :model="insight" ref="insight" :rules="insightRules">
            <!--
            -
            -   基本信息编辑部分
            -
            --->
            <Card style="width: 1175px; display: inline-block; left: 50%;transform: translateX(-50%);">
                <p slot="title">
                    <Icon type="clipboard"></Icon>
                    基本信息
                </p>

                <form-item label="标题" prop="title">
                    <i-input v-model="insight.title" placeholder="" clearable autofocus/>
                </form-item>

                <form-item label="分类" prop="category">
                    <radio-group v-model="insight.category" type="button">
                        <radio label="全部"></radio>
                        <radio label="财务"></radio>
                        <radio label="创意"></radio>
                        <radio label="电商"></radio>
                        <radio label="旅游"></radio>
                        <radio label="媒体"></radio>
                        <radio label="品牌"></radio>
                        <radio label="市场"></radio>
                        <radio label="数字"></radio>
                        <radio label="消费者"></radio>
                        <radio label="游戏"></radio>
                    </radio-group>
                </form-item>

                <form-item label="洞察内容" prop="content">
                    <Editor v-model="insight.content"></Editor>
                </form-item>
            </Card>

            <div style="margin: 30px;text-align: center">
                <i-button icon="ios-arrow-back" @click="back">返回资源列表</i-button>
                <i-button icon="ios-checkmark-empty" type="success" @click="updateInsight">{{ edit }}</i-button>
                <poptip confirm v-if="canDel" transfer title="您确定要删除该资源吗？删除后不可恢复" @on-ok="deleteInsight(insight.id)">
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
                insight: {
                    id: '',
                    title:'',
                    category: '',
                    content: '',
                },
                insightRules: {
                    title:[
                        {required: true, message: '请输入标题', trigger: 'blur'}
                    ],
                    category:[
                        {required: true, message: '请选择分类', trigger: 'change'}
                    ],
                    content:[
                        {required: true, message: '请输入内容', trigger: 'blur'}
                    ]
                },
            }
        },
        created() {
            if (this.$route.params.id) {
                this.$ajax.get('http://www.zetin.cn/api/insight/' + this.$route.params.id + '?include=Imgs').then((response) => {
                    console.log('获取资源', response)
                    this.insight = response.data
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
            updateInsight() {
                this.$refs['insight'].validate((valid) => {
                    if (valid) {
                        this.$ajax.post('http://www.zetin.cn/api/insight', this.insight).then((response) => {
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
            deleteInsight(id) {
                this.$ajax.delete('http://www.zetin.cn/api/insight/' + id).then((response) => {
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