<template>
    <div>
        <toolbar></toolbar>
        <router-view></router-view>
        <app-footer></app-footer>
    </div>
</template>

<script>
    import Toolbar from "./Toolbar";
    import AppFooter from "./AppFooter";
    export default {
        components: {AppFooter, Toolbar}
    }
</script>

<style scoped>

</style>
