<template>
    <div>
        <i-button type="primary" @click="getVersion">primary</i-button>
        <i-button type="primary" @click="getVersion2">v2</i-button>
    </div>
</template>

<script>
    export default {
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