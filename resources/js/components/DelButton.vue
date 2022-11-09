<template>
    <div>
        <button type="submit" class="btn btn-danger" @click="del">
            <b-icon icon="trash-fill"></b-icon>
        </button>
    </div>
</template>

<script>
import axios from 'axios'
    export default {
        props:['competitions'],
        data(){
            return {
               dismissSecs: 3,
            dismissCountDown: 0,
            showDismissibleAlert: false 
            }
        },
        methods:{
            del(){
                axios.post('/del', { id: this.competitions.id})
                .then((res)=>{
                    console.log(res);
                    location.reload();
                    alert("The competition deleted!");
                }).catch(function(error){
                    console.log(error);
                });
            },
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>