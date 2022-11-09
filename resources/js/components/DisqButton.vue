<template>
    <div>
        <button type="submit" class="btn btn-danger" @click="del">
            <b-icon icon="exclamation-diamond"></b-icon>
        </button>
    </div>
</template>

<script>
import axios from 'axios'
    export default {
        props:['pictures','competitions'],
        data(){
            return{
                id:''
            }
        },
        methods:{
            del(){
                axios.post('/disq', { picture_id: this.pictures.id, competition_id: this.competitions.id})
                .then((res)=>{
                    console.log(res);
                    location.reload();
                    alert("The picture was disqualified")
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
