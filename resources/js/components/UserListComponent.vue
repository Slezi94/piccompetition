<template>
    <div>
        <table class="table">
            <thead>
                <th>ID</th>
                <th>User name</th>
                <th>E-mail</th>
                <th>Registreted</th>
                <th>Edit</th>
                <th>Ban</th>
            </thead>
            <tbody>
                <tr v-for="user in this.users" :class="'user-' + user.id">
                    <td>{{ user.id }}</td>
                    <td><div contenteditable="true" class="edit">{{ user.name }}</div></td>
                    <td>{{ user.email }}</td>
                    <td>{{ user.created_at }}</td>
                    <td><button class="btn btn-primary" @click="updateUser(user.id)">
                            <b-icon icon="pencil"></b-icon>
                        </button>
                    </td>
                    <td><input type="checkbox" class="form-check-input" :id="'ban-'+user.id" @click="banning(user.id)" :checked="!!user.ban"></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from 'axios'
    export default {
        props:['users'],
        data(){
            return{
            
            }
        },
        methods:{
    
            updateUser(userid){
                var input = document.getElementsByClassName("user-" + userid)[0].getElementsByClassName("edit")[0].textContent
                console.log(input)
                axios.put('/edit',{id: userid, name: input})
                .then((res)=>{
                    console.log(res);
                    location.reload();
                    alert("The user updated!");
                }).catch(function(error){
                    console.log(error);
                });
            },

            banning(userid){
                var ban = document.getElementById("ban-"+userid).checked;
                if(ban == true){
                    ban=1;
                }else{
                    ban=0;
                }

                //this.$root.$emit('showAlertEvent')
                
                axios.post('/ban',{id: userid, ban: ban})
                .then((res)=>{
                    console.log(res);
                    location.reload();
                    alert("The user banned!");
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
