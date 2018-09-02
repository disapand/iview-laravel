<template>
    <div>
        <Card style="width: 22.5%; display: inline-block;margin: 1% 1%;">
            <p slot="title">
                <Icon type="navicon-round"></Icon>
                资源统计
            </p>
            <div style="text-align: center">
                <span class="total">合计：</span>
                <router-link to="/television" class="num" style="color: #2d8cf0;">256</router-link> <br />
                <span class="item">报刊杂志：120</span>
                <span class="item">电视媒体：120</span> <br />
                <span class="item">户外媒体：120 </span>
                <span class="item">交通媒体：120</span>  <br />
                <span class="item">线上媒体：120 </span>
                <span class="item">网络红人：120</span>
                <div style="width: 100%; height: 250px;" id="zzt">

                </div>
            </div>
        </Card>

        <Card style="width: 22.5%; vertical-align: top; display: inline-block;margin: 1% 1%;">
            <p slot="title">
                <Icon type="eye"></Icon>
                洞察统计
            </p>
            <div style="text-align: center">
                <span class="total">合计：</span>
                <router-link to="/insight" class="num" style="color: #19be6b;">256</router-link> <br />
                <span class="item">财务：120</span>
                <span class="item">创意：120</span>
                <span class="item">电商：120 </span> <br />
                <span class="item">旅游：120</span>
                <span class="item">媒体：120 </span>
                <span class="item">品牌：120</span> <br />
                <span class="item">市场：120 </span>
                <span class="item">数字：120</span>
                <span class="item">消费者：120 </span> <br />
                <span class="item">游戏：120</span>
            </div>
        </Card>

        <Card style="width: 22.5%; vertical-align: top; display: inline-block;margin: 1% 1%;">
            <p slot="title">
                <Icon type="clipboard"></Icon>
                案例统计
            </p>
            <div style="text-align: center">
                <span class="total">合计：</span>
                <router-link to="/case" class="num">256</router-link> <br />
                <span class="item">游戏：120</span>
                <span class="item">应用：120</span>
                <span class="item">电商：120 </span> <br />
                <span class="item">旅游：120</span>
                <span class="item">汽车：120 </span>
                <span class="item">快销品：120 </span> <br />
                <span class="item">3C电子产品：120</span>
                <span class="item">其他：120</span>
            </div>
        </Card>

        <Card style="width: 22.5%; vertical-align: top; display: inline-block;margin: 1% 1%;">
            <p slot="title">
                <Icon type="shuffle"></Icon>
                动态统计
            </p>
            <div style="text-align: center">
                <span class="total">合计：</span>
                <router-link to="/dynamic" class="num" style="color: #ed3f14;">256</router-link>
            </div>
        </Card>
    </div>
</template>

<script>

    export default {
        data() {
            return {

            }
        },
        created() {
            this.$ajax.get()
                .then( (res) => {

                })
                .catch( (err) => {

                })
        },
        mounted() {
            let myChart = this.$echarts.init(document.getElementById('zzt'))
            myChart.setOption({
            title: {
                text: 'ECharts 入门示例'
            },
            tooltip: {},
            xAxis: {
                data: ['衬衫', '羊毛衫', '雪纺衫', '裤子', '高跟鞋', '袜子']
            },
            yAxis: {},
            series: [{
                name: '销量',
                type: 'bar',
                data: [5, 20, 36, 10, 10, 20]
            }]
        })
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
</style>