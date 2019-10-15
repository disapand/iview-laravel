<template>
    <div>
        <Card style="width: 40%; display: inline-block;margin: 1% 4%;">
            <p slot="title">
                <Icon type="navicon-round"></Icon>
                资源统计
            </p>
            <div style="text-align: center">
                <span class="total">合计：</span>
                <router-link to="/television" class="num" style="color: #2d8cf0;">{{ this.dataList.outdoors +
                    this.dataList.transforms + this.dataList.onlines
                    + this.dataList.televisons + this.dataList.newspapers + this.dataList.internetCelebrities }}
                </router-link>
                <br/>
                <div class="echarts-container" id="zysl">
                    <Spin fix v-if="loading"></Spin>
                </div>
            </div>
        </Card>

        <Card style="width: 40%; display: inline-block;margin: 1% 4%;">
            <p slot="title">
                <Icon type="navicon-round"></Icon>
                资源上传数量统计
            </p>
            <div style="text-align: center">
                <span class="total">合计：</span>
                <router-link to="/television" class="num" style="color: #2d8cf0;">{{ this.dataList.lastWeekInternet +
                    this.dataList.lastWeekNewspaper + this.dataList.lastWeekOnline
                    + this.dataList.lastWeekOutdoor + this.dataList.lastWeekTelevision + this.dataList.lastWeekTransform }}
                </router-link>
                <br/>
                <div class="echarts-container" id="zytj">
                    <Spin fix v-if="loading"></Spin>
                </div>
            </div>
        </Card>

        <Card style="width: 40%; vertical-align: top; display: inline-block;margin: 1% 4%;">
            <p slot="title">
                <Icon type="eye"></Icon>
                洞察统计
            </p>
            <div style="text-align: center">
                <span class="total">合计：</span>
                <router-link to="/insight" class="num" style="color: #19be6b;">{{ this.dataList.insights}}</router-link>
                <div class="echarts-container" id="dctj">
                    <Spin fix v-if="loading"></Spin>
                </div>
            </div>
        </Card>

        <Card style="width: 40%; vertical-align: top; display: inline-block;margin: 1% 4%;">
            <p slot="title">
                <Icon type="clipboard"></Icon>
                案例统计
            </p>
            <div style="text-align: center">
                <span class="total">合计：</span>
                <router-link to="/case" class="num">{{ this.dataList.cases}}</router-link>
                <div class="echarts-container" id="altj">
                    <Spin fix v-if="loading"></Spin>
                </div>
            </div>
        </Card>

        <Card style="width: 40%; vertical-align: top; display: inline-block;margin: 1% 4%;">
            <p slot="title">
                <Icon type="shuffle"></Icon>
                动态统计
            </p>
            <div style="text-align: center">
                <span class="total">合计：</span>
                <router-link to="/dynamic" class="num" style="color: #ed3f14;">{{ this.dataList.dynamics }}
                </router-link>
                <div class="echarts-container" id="dttj">
                    <Spin fix v-if="loading"></Spin>
                </div>
            </div>
        </Card>

        <Card style="width: 80%; vertical-align: top; display: inline-block;margin: 1% 8%;">
            <p slot="title">
                <Icon type="stats-bars"></Icon>
                UV/PV
            </p>
            <div style="text-align: center">
                <div class="echarts-container" id="uv" style="width:100%;border:none;">
                </div>
            </div>
            <div style="text-align: center; font-size: 1.5em;">
                <span style="margin-right: 30px">总访问次数：{{ this.dataList.uv_count }}</span>
                <span>总访问人数：{{ this.dataList.pv_count }}</span>
            </div>
        </Card>

    </div>
</template>

<script>

    export default {
        data() {
            return {
                dataList: '',
                loading: true,
            }
        },
        created() {

        },
        mounted() {
            setTimeout( () => {
                console.log(this.$store.state.user, '看看用户信息有没有')
                this.$ajax.get('https://iview-laravel.test/api/dashboard/' + this.$store.state.user.id)
                    .then((res) => {
                        console.log('返回数据', res.data)
                        this.dataList = res.data
                        this.draw()
                        this.loading = true
                    })
                    .catch((err) => {

                    })
            }, 1000)
        },
        methods: {
            getDay(day) {
                let myDate = new Date()
                let tmp
                let m = myDate.getMonth() + 1
                let d = myDate.getDate() - day
                if (d <= 0) {
                    tmp = this.getDateCount(myDate.getFullYear(), m - 1) + d
                    return m - 1 + '-' + tmp
                } else {
                    return m + '-' + d
                }
            },
            getDateCount(year, month) {
                let d = new Date(year, month, 0)
                return d.getDate()
            },
            draw() {
                /*
            * 资源统计的柱状图
            * */
                let zysl = this.$echarts.init(document.getElementById('zysl'))
                zysl.setOption({
                    title: {
                        text: '各类资源数量统计'
                    },
                    legend: {
                        data: ['资源数量']
                    },
                    tooltip: {},
                    xAxis: {
                        data: ['报刊杂志', '电视媒体', '户外媒体', '交通媒体', '线上媒体', '网络红人']
                    },
                    yAxis: {},
                    series: [{
                        name: '资源数量',
                        type: 'bar',
                        data: [this.dataList.newspapers, this.dataList.televisons, this.dataList.outdoors,
                            this.dataList.transforms, this.dataList.onlines, this.dataList.internetCelebrities]
                    }],
                    itemStyle: {
                        color: '#2d8cf0'
                    }
                })

                /*
                * 洞察统计的柱状图
                * */
                let dctj = this.$echarts.init(document.getElementById('dctj'))
                dctj.setOption({
                    title: {
                        text: '洞察数量统计'
                    },
                    legend: {
                        data: ['洞察数量']
                    },
                    tooltip: {},
                    xAxis: {
                        data: ['财务', '创意', '电商', '旅游', '媒体', '品牌', '市场', '数字', '消费者', '游戏']
                    },
                    yAxis: {},
                    series: [{
                        name: '洞察数量',
                        type: 'bar',
                        data: [this.dataList.insight_cw, this.dataList.insight_cy, this.dataList.insight_ds, this.dataList.insight_lv, this.dataList.insight_mt,
                            this.dataList.insight_pp, this.dataList.insight_sc, this.dataList.insight_sz, this.dataList.insight_xfz, this.dataList.insight_yx,],
                        itemStyle: {
                            color: '#19be6b'
                        }
                    }]
                })

                /*
                * 洞察统计的柱状图
                * */
                let altj = this.$echarts.init(document.getElementById('altj'))
                altj.setOption({
                    title: {
                        text: '案例数量统计'
                    },
                    legend: {
                        data: ['案例数量']
                    },
                    tooltip: {},
                    xAxis: {
                        data: ['游戏', '应用', '电商', '旅游', '汽车', '3C', '快销品', '其他']
                    },
                    yAxis: {},
                    series: [{
                        name: '案例数量',
                        type: 'bar',
                        data: [this.dataList.case_game, this.dataList.case_app, this.dataList.case_shop, this.dataList.case_lv, this.dataList.case_car, this.dataList.case_3c,
                            this.dataList.case_kxp, this.dataList.case_other,],
                        itemStyle: {
                            color: '#ff9900'
                        }
                    }]
                })

                /*
                * 动态统计的折线图
                * */
                let dttj = this.$echarts.init(document.getElementById('dttj'))
                dttj.setOption({
                    title: {
                        text: '动态数量统计'
                    },
                    legend: {
                        data: ['动态数量']
                    },
                    tooltip: {},
                    xAxis: {
                        data: [this.getDay(6), this.getDay(5), this.getDay(4), this.getDay(3), this.getDay(2), this.getDay(1), this.getDay(0)]
                    },
                    yAxis: {},
                    series: [{
                        name: '动态数量',
                        type: 'line',
                        data: [this.dataList.dynamic_1, this.dataList.dynamic_2, this.dataList.dynamic_3, this.dataList.dynamic_4, this.dataList.dynamic_5,
                            this.dataList.dynamic_6, this.dataList.dynamic_7,],
                        itemStyle: {
                            color: '#ed3f14'
                        }
                    }]
                })

                /*
                * UV/PV
                * */
                let uv = this.$echarts.init(document.getElementById('uv'))
                uv.setOption({
                    legend: {
                        data: ['UV', 'PV']
                    },
                    tooltip: {},
                    xAxis: {
                        data: [this.getDay(6), this.getDay(5), this.getDay(4), this.getDay(3), this.getDay(2), this.getDay(1), this.getDay(0)]
                    },
                    yAxis: {},
                    series: [
                        {
                            name: 'PV',
                            type: 'line',
                            data: [this.dataList.uv6, this.dataList.uv5, this.dataList.uv4, this.dataList.uv3, this.dataList.uv2,
                                this.dataList.uv1, this.dataList.uv],
                            itemStyle: {
                                color: '#495060'
                            }
                        },
                        {
                            name: 'UV',
                            type: 'line',
                            data: [this.dataList.pv6, this.dataList.pv5, this.dataList.pv4, this.dataList.pv3, this.dataList.pv2,
                                this.dataList.pv1, this.dataList.pv],
                            itemStyle: {
                                color: '#2b85e4'
                            }
                        },
                    ]
                })

                // let zytj = this.$echarts.init(document.getElementById('zytj'))
                // zytj.setOption({
                //     title: {
                //         text: '上传资源数量统计'
                //     },
                //     legend: {
                //         data: ['资源数量']
                //     },
                //     tooltip: {},
                //     xAxis: {
                //         data: ['报刊杂志', '电视媒体', '户外媒体', '交通媒体', '线上媒体', '网络红人']
                //     },
                //     series: [{
                //         name: '资源数量',
                //         type: 'bar',
                //         // data: [this.dataList.lastWeekNewspaper, this.dataList.lastWeekTelevision, this.dataList.lastWeekOutdoor,
                //         //     this.dataList.lastWeekTransform, this.dataList.lastWeekOnline, this.dataList.lastWeekInternet]
                //         data:[1, 2, 3, 5, 6, 7]
                //     }],
                //     itemStyle: {
                //         color: '#2d8cf0'
                //     }
                // })
                let zytj = this.$echarts.init(document.getElementById('zytj'))
                zytj.setOption({
                    title: {
                        text: '上周上传资源数量统计'
                    },
                    legend: {
                        data: ['资源数量']
                    },
                    tooltip: {},
                    xAxis: {
                        data: ['报刊杂志', '电视媒体', '户外媒体', '交通媒体', '线上媒体', '网络红人']
                    },
                    yAxis: {},
                    series: [{
                        name: '资源数量',
                        type: 'bar',
                        data: [this.dataList.lastWeekNewspaper, this.dataList.lastWeekTelevision, this.dataList.lastWeekOutdoor,
                            this.dataList.lastWeekTransform, this.dataList.lastWeekOnline, this.dataList.lastWeekInternet]
                    }],
                    itemStyle: {
                        color: '#2d8cf0'
                    }
                })
            }
        }
    }
</script>

<style scoped>

    .total {
        font-weight: bold;
        color: #333;
        font-size: 2.5em;
    }

    .num {
        color: #ff9900;
        font-size: 5em;
        font-weight: bold;
    }

    .item {
        color: #666;
        margin: 10px 10px;
    }

    .echarts-container {
        width: 100%;
        height: 250px;
        border-top: solid 1.5px #ccc;
        margin: 15px auto;
        padding-top: 15px
    }
</style>