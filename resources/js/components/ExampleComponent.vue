<template>
    <div></div>
</template>
 
<script>
    export default {
        mounted () {
            console.log('Component mounted.')
 
            Echo.channel('test')
                .listen('Test', (e) => {
                    console.log(e)
                })
        }
    }
</script>