<template>
    <div>
        <button class="btn btn-outline-primary mx-3 h6 unfollowBtn" onmouseover="change_btn();" @click="unfollowUser"><span>Following &check;</span></button>
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
            unfollowUser(){
                console.log('deleting '+ this.userId);
                axios.delete('/unfollow/'+this.userId)
                .then(response=> window.location.reload()
                ).catch(error => console.log(error));
            }
        }
    }
    function change_btn(){

$('.unfollow-button').removeClass("btn-outline-primary");
$('.unfollow-button').addClass("btn-danger");
$('.unfollow-button').html("&cross; UnFollow");

}
</script>
