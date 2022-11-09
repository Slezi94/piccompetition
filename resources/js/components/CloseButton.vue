<template>
    <button type="submit" class="btn btn-warning" @click="close">
        <b-icon icon="door-closed"></b-icon>
    </button>
</template>

<script>
    import axios from 'axios'
    export default {
        props:['competitions'],
        methods:{
            close(){
                axios.put('/close', { competition_status:this.competitions.competition_status, id:this.competitions.id })
                .then((res)=>{
                    console.log(res);
                    location.reload();
                    alert("The competition closed!");
                }).catch(function(error){
                    console.log(error);
                });
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
