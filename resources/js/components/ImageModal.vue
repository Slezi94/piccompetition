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
                                <form method="POST" enctype="multipart/form-data" name="selectComp" id="selectComp" @submit.prevent="submit">
                                    <div class="form-group">
                                        <select name="competitions_id" id="select-competition" class="form-control" v-model="id">
                                            <option v-for="competition in this.competitions" v-bind:value="competition.id">{{ competition.competition_title }}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Enty</button>
                                        <button @click="delImage" type="button" class="btn btn-danger">Delete</button>
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
        props: ['pictures','competitions'],
        data(){
            return{
                id: ''
            }
        },
        methods: {
            submit(){
                axios.put('/picture/'+this.pictures.id,{competitions_id:this.id})
                .then((res)=>{
                    console.log(res);
                }).catch(function(error){
                    console.log(error);
                });
            },
            delImage(){
                axios.post('/delImage',{id:this.pictures.id})
                .then((res)=>{
                    console.log(res);
                    location.reload();
                    alert("The image deleted!");
                }).catch(function(error){
                    console.log(error);
                });
            },
            /* next(){
                var id=this.pictures.id++;
                fetch()
            }, */
            /* prev(){
                // this.index = (this.index - 1) % image.length;
                this.image = image[this.index];
            }, */
            asset(path) { 
                var base_path = window._asset || '';
                return base_path + path;
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
