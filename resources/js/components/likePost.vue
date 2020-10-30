<template>
    <div class="heart">
        <button class="btn row" @click="likePost(); likesCount()" ><img v-bind:src="likeSVG" class=" w-100" style="max-width: 25px;"></button>
        <p><strong v-text="likesAmount"></strong><strong> likes</strong></p>
    </div>
</template>

<script>
    export default {
        props: [
            'postId',
            'liked',
            'likes'
        ],


        mounted() {
            console.log('Component mounted.')
        },

        data: function () {
                return{
                    status: this.liked,
                    numberOfLikes: Number(this.likes),
                }
        },

        methods:{
            likePost(){
                axios.post('/like/' + this.postId)
                    .then(response => {      
                        this.status = !this.status;
                    })
                    .catch(errors => {
                        if(errors.response.status == 401){
                            window.location = '/login';
                        }
                    });
            },

            likesCount(){
                (this.status) ? this.numberOfLikes = this.numberOfLikes - 1 : this.numberOfLikes = this.numberOfLikes + 1;
            }
        },

        computed: {
            likeSVG() {
                return (this.status) ? '/svg/toggled-like.svg' : '/svg/like.svg';
            },

            likesAmount(){
                return this.numberOfLikes;
            }
        },

    }
</script>
