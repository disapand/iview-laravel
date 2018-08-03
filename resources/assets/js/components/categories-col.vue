<template>
    <div>
        <span v-for="category in categories">
        <tag color="#539ef0">{{ category }}</tag>
    </span>
    </div>
</template>

<script>
    export default {
        props: {
            categories: Array,
        }
    }
</script>

<style scoped>

</style>