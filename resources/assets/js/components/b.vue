<template>
    <div>
        <i-button type="primary" @click="getVersion">primary</i-button>
        <i-button type="primary" @click="getVersion2">v2</i-button>
        <i-select v-model="s1" style="width:200px" clearable multiple >
            <i-option v-for="item in CList" :value="item.value" :key="item.value">{{ item.label }}</i-option>
        </i-select>
        {{ s1 }}
    </div>
</template>

<script>
    export default {
        data(){
            return {
                s1: '',
                CList: '',
                mess: '',
            }
        },
        mounted(){
            this.$ajax.get('http://iview-laravel.test/api/CList').then((response) => {
               console.log(response);
               this.CList = response.data
            }).catch((error) => {
                console.log('some errors has happend:',  error);
            })
        },
        methods: {
            getVersion() {
                /*this.$ajax.get('http://iview-laravel.test/api/version').then(function (response) {
                    alert(response.data)
                    console.log(response)
                }).catch(function (error) {
                    console.log(error)
                })*/
                this.$ajax({
                    url: 'http://iview-laravel.test/api/version',
                    headers: {
                        'Accept': 'application/prs.iview-laravel.v1+json',
                    }
                }).then(function (response) {
                    alert(response.data)
                    console.log(response)
                })
            },
            getVersion2() {
                /*this.$ajax.get('http://iview-laravel.test/api/version').then(function (response) {
                    alert(response.data)
                    console.log(response)
                }).catch(function (error) {
                    console.log(error)
                })*/
                this.$ajax({
                    url: 'http://iview-laravel.test/api/version',
                    headers: {
                        'Accept': 'application/prs.iview-laravel.v2+json',
                    }
                }).then(function (response) {
                    alert(response.data)
                    console.log(response)
                })
            }
        }
    }
</script>