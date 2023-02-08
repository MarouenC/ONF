<template>
    <div>
        <button class="btn btn-primary mx-3 h6" @click="followUser">Follow</button>
    </div>
</template>

<script>
import axios from 'axios';
import { urlToHttpOptions } from 'url';

    export default {
        props:['userId'],
        mounted() {
            console.log(this.userId)
        },
        methods:{
            followUser(){
                axios.post('/follow', {
                    userId : this.userId,
                })
                .then(response=>
                    window.location.reload()
                ).catch(error => console.log(error));
            }
        }
    }
</script>
