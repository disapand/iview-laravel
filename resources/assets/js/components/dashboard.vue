<template>
    <div>
        <Card style="width: 40%; display: inline-block;margin: 1% 4%;">
            <p slot="title">
                <Icon type="navicon-round"></Icon>
                资源统计
            </p>
            <div style="text-align: center">
                <span class="total">合计：</span>
                <router-link to="/television" class="num" style="color: #2d8cf0;">{{ this.dataList.outdoors + this.dataList.transforms + this.dataList.onlines
                    + this.dataList.televisons + this.dataList.newspapers + this.dataList.internetCelebrities }}</router-link>
                <br/>
                <div class="echarts-container" id="zysl"></div>
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
                <div class="echarts-container" id="dctj"></div>
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
                <div class="echarts-container" id="altj"></div>
            </div>
        </Card>

        <Card style="width: 40%; vertical-align: top; display: inline-block;margin: 1% 4%;">
            <p slot="title">
                <Icon type="shuffle"></Icon>
                动态统计
            </p>
            <div style="text-align: center">
                <span class="total">合计：</span>
                <router-link to="/dynamic" class="num" style="color: #ed3f14;">{{ this.dataList.dynamics }}</router-link>
                <div class="echarts-container" id="dttj"></div>
            </div>
        </Card>
    </div>
</template>

<script>

    export default {
        data() {
            return {
                dataList: '',
            }
        },
        created() {
            this.$ajax.get('http://localhost/api/dashboard')
                .then((res) => {
                    console.log('返回数据', res.data)
                    this.dataList = res.data
                    this.draw()
                })
                .catch((err) => {

                })
        },
        mounted() {


        },
        methods: {
            getDay(day) {
                let myDate = new Date()
                let tmp
                let m = myDate.getMonth()
                let d = myDate.getDate() - day
                if ( d <= 0) {
                    tmp = this.getDateCount(myDate.getFullYear(), m - 1 ) + d
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
                        data:['资源数量']
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
                        data:['洞察数量']
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
                        data:['案例数量']
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
                        data:['动态数量']
                    },
                    tooltip: {},
                    xAxis: {
                        data: [this.getDay(7), this.getDay(6), this.getDay(5), this.getDay(4), this.getDay(3), this.getDay(2), this.getDay(1), this.getDay(0)]
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
        width: 610px;
        height: 250px;
        border-top: solid 1.5px #ccc;
        margin: 15px auto;
        padding-top: 15px
    }
</style>