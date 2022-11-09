<template>
    <div class="modal fade" :id="'picDetail-'+ this.pictures.id" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" role="dialog">
        <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-7">    
                            <img :src="asset('/storage/'+pictures.pic_image)" class="w-75">
                        </div>
                        <div class="col-md-5 d-flex justifycontent-center align-items-center">
                            <ul>
                                <h3>{{ pictures.pic_title }}</h3>
                                <h4>{{ pictures.pic_description }}</h4>
                                <h5>{{ pictures.created_at }}</h5>
                                <form method="POST" enctype="multipart/form-data" name="votePic" id="votePic" @submit.prevent="vote">
                                    <div class="form-group">
                                        <button id="voteButton" @click="votes" type="button" class="btn btn-primary" v-bind:disabled="voted > 0">Vote</button>
                                        <!-- <p>{{ vote }}</p> -->
                                    </div>
                                </form>
                            </ul>   
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <!-- <button @click="prev" class="btn btn-primary">&lt;</button>
                            <button @click="next" class="btn btn-primary float-md-right">&gt;</button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    export default {
        props: ['pictures','competitions','voted'],
        data(){
            return{
                vote: 0,
                disabledBtnFlag: false,
                v: 1
            }
        },
        methods: {
            votes(){
                this.vote++
                if(!this.disabledBtnFlag){
                    this.disabledBtnFlag = true
                    
                    axios.post('/vote',{piccomp_id: this.pictures.id,pic_votes:this.vote})
                    .then((res)=>{
                        console.log(res);
                        location.reload();
                        alert("The vote succeeded!");
                    }).catch(function(error){
                        console.log(error);
                    }); 

                    this.v = ++this.v
                }
            },
            asset(path) { 
                var base_path = window._asset || '';
                return base_path + path;
            }
        },
        computed:{
            /* voted(){
                var button = document.getElementById('voteButton')
                return true
                
            } */
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
