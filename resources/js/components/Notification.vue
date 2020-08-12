<template>
    <div>hello</div>
</template>

<script>
    export default {
        data() {
            return {
                notification: {},
            }
        },
        methods: {
            loadUsers() {
                axios.get('admin/notification').then(({data}) => (this.notification = data.data));
            },
        },
        mounted() {
        }
    }
</script>