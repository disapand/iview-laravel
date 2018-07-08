<template>
    <div>
        <div>
            <i-table border :columns="col" :data="tvs" stripe highlight-row @on-row-click="tv_item"></i-table>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                loading: 'false',
                col: [
                    {
                        'title': 'id',
                        'key': 'id',
                        'width': 60,
                        'align': 'center'
                    },
                    {
                        'title': '电视频道',
                        'key': 'channel'
                    },
                    {
                        'title': '形式',
                        'key': 'form'
                    },
                    {
                        'title': '频道介绍',
                        'key': 'detail'
                    },
                    {
                        'title': '覆盖地区',
                        'key': 'area'
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

                                    },
                                    on: {
                                        click: () => {
                                            event.stopPropagation()
                                            this.show(params.index)
                                        }
                                    }
                                }, '查看'),
                                h('i-button', {
                                    props: {
                                        type: 'error',
                                        size: 'small',
                                    },
                                    style: {

                                    },
                                    on: {
                                        click: () => {
                                            event.stopPropagation()
                                            this.remove(params.index)
                                        }
                                    }
                                }, '删除')
                            ])
                        },
                    },
                ],
                tvs:[],
            }
        },
        created(){
            this.$ajax.get('http://iview-laravel.test/api/tv').then((response) => {
               console.log(response.data);
               let arr = [];
               this.tvs = response.data.data
            }).catch((error) => {
                console.log('some errors has happend:',  error);
            })
        },
        mounted() {
        },
        methods: {
            tv_item(row ,index) {
                this.$router.push({'name': 'tv_item', params:{id: row.id}})
                this.$ajax.get('http://iview-laravel.test/api/tv/' + row.id).then((response) => {

                }).catch((error) => {

                })
            },
            info(row, index) {
                console.log(index)
                this.$Message.info(row.id.toString())
            },
            show(index) {
                this.$Modal.info({
                    title: '测试标题',
                    content: index
                })
            },
            remove(index) {
                this.$Message.info('确定删除吗')
            }
        }
    }
</script>