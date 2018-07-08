<template>
    <div class="spin-container">
        <Row>
            <Col span="18" offset="3">
                <Card>
                    <Row>
                        <Col span="12" offset="6">
                            <i-form :model="tv" :label-width="160">

                                <form-item label="频道名称">
                                    <i-input v-model="tv.channel" placeholder="" />
                                </form-item>

                                <form-item label="展现形式">
                                    <i-input v-model="tv.form" placeholder="" />
                                </form-item>

                                <form-item label="频道介绍">
                                    <i-input v-model="tv.detail" placeholder="" />
                                </form-item>

                                <form-item label="覆盖地区">
                                    <i-input v-model="tv.area" placeholder="" />
                                </form-item>

                                <form-item label="语言">
                                    <i-input v-model="tv.language" placeholder="" />
                                </form-item>

                                <form-item label="类别">
                                    <i-select v-model="tv.category" style="width:120px;">
                                        <i-option value="综合" label="综合"></i-option>
                                        <i-option value="新闻" label="新闻"></i-option>
                                        <i-option value="财经" label="财经"></i-option>
                                        <i-option value="体育" label="体育"></i-option>
                                        <i-option value="娱乐" label="娱乐"></i-option>
                                        <i-option value="时尚" label="时尚"></i-option>
                                        <i-option value="科技" label="科技"></i-option>
                                        <i-option value="生活" label="生活"></i-option>
                                        <i-option value="文史" label="文史"></i-option>
                                        <i-option value="军事" label="军事"></i-option>
                                        <i-option value="旅游" label="旅游"></i-option>
                                        <i-option value="八卦" label="八卦"></i-option>
                                        <i-option value="音乐" label="音乐"></i-option>
                                        <i-option value="电影" label="电影"></i-option>
                                        <i-option value="少儿" label="少儿"></i-option>
                                        <i-option value="艺术" label="艺术"></i-option>
                                        <i-option value="汽车" label="汽车"></i-option>
                                        <i-option value="健康" label="健康"></i-option>
                                        <i-option value="其他" label="其他"></i-option>
                                    </i-select>
                                </form-item>

                                <form-item label="所属电视台">
                                    <i-input v-model="tv.station" placeholder="" />
                                </form-item>

                                <form-item label="最小采购金额或周期">
                                    <i-input v-model="tv.minimum_buy" placeholder="" />
                                </form-item>

                                <form-item label="广告时长">
                                    <radio-group v-model="tv.time" type="button">
                                        <radio value="5" label="5秒"></radio>
                                        <radio value="10" label="10秒"></radio>
                                        <radio value="15" label="15秒"></radio>
                                        <radio value="20" label="20秒"></radio>
                                        <radio value="25" label="25秒"></radio>
                                        <radio value="30" label="30秒"></radio>
                                        <radio value="45" label="45秒"></radio>
                                        <radio value="60" label="60秒"></radio>
                                        <radio value="120" label="120秒"></radio>
                                    </radio-group>
                                    <!--<i-select v-model="tv.time" style="width:120px;">
                                        <i-option value="5" label="5秒"></i-option>
                                        <i-option value="10" label="10秒"></i-option>
                                        <i-option value="15" label="15秒"></i-option>
                                        <i-option value="20" label="20秒"></i-option>
                                        <i-option value="25" label="25秒"></i-option>
                                        <i-option value="30" label="30秒"></i-option>
                                        <i-option value="45" label="45秒"></i-option>
                                        <i-option value="60" label="60秒"></i-option>
                                        <i-option value="120" label="120秒"></i-option>
                                    </i-select>-->
                                </form-item>

                                <form-item label="媒体所属公司或集团">
                                    <i-input v-model="tv.company" placeholder="" />
                                </form-item>

                                <form-item label="媒介开发者">
                                    <i-input v-model="tv.contributor" placeholder="" />
                                </form-item>

                                <form-item label="价格区间(美金)">
                                    <i-input v-model="tv.price" placeholder="" />
                                </form-item>

                                <form-item label="国家或地区">
                                    <i-input v-model="tv.country" placeholder="" />
                                </form-item>

                                <form-item label="热门节目">
                                    <i-input v-model="tv.program" placeholder="" />
                                </form-item>

                                <form-item label="图片">
                                    <i-input v-model="tv.image" placeholder="" />
                                </form-item>

                                <form-item label="上刊要求">
                                    <i-input v-model="tv.requirements" placeholder="" />
                                </form-item>

                                <form-item label="是否有效">
                                    <i-switch v-model="tv.isuse" size="large" @on-change="tt">
                                        <span slot="open">有效</span>
                                        <span slot="close">无效</span>
                                    </i-switch>
                                </form-item>

                            </i-form>
                        </Col>
                    </Row>
                </Card>
            </Col>
        </Row>
        <Spin size="large" fix v-if="spinShow"></Spin>
        <i-button @click="show_tv">更改后的文字</i-button>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                tv: {
                },
                spinShow: true,
            }
        },
        methods: {
            show_tv() {
                console.log('show tv:', this.tv)
            },
            tt() {
                alert(this.tv.isuse)
            }
        },
        created(){
            this.$ajax.get('http://iview-laravel.test/api/tv/' + this.$route.params.id).then((response) => {
                console.log(response)
                this.tv = response.data
                this.spinShow = false
            }).catch((error) => {
                this.$Message.error('出错了')
            })
        },
        mounted() {
        },
    }
</script>
<style lang="scss">
    .spin-container {
        position:relative;
    }
</style>