<template>
    <div>
        <div>
            <i-table border :columns="col" :data="users" stripe :highlight-row=false
                     :loading="loading"></i-table>
        </div>
        <page :total="total" show-total @on-change="changePage" :current="currentPage" :page-size="pageSize"
              :class-name="pageClass" show-elevator></page>
    </div>
</template>

<script>
    export default {
        name: "users.vue",
        data() {
            return {
                pageClass: 'page',
                users: '',
            }
        },
    }
</script>

<style scoped>
    .page {
        margin: 10px 0;
    }
</style>