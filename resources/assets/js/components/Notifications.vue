<template>
    <li class="nav-item dropdown">
        <a href="#" class="nav-link" id="dropPublicaciones" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="far fa-bell"></i> <span class="badge badge-pill badge-dark" v-if="posts.length" v-text="posts.length"></span>
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropPublicaciones">
            <li v-for="post in posts" v-if="posts.length">
                <a :href="'/posts/'+post.data.id" class="dropdown-item" v-text="post.data.title"></a>
            </li>
            <li class="small text-center" v-if="!posts.length">
                no hay notificaciones   
            </li>
            <hr>
            <li class="dropdown-item">
                <a @click="markAllAsRead" href="#" class="text-dark mr-3" v-if="posts.length">Marcar todo como leido</a>
                <a href="/posts" class="text-dark">Ver todos los post</a>
            </li>
        </ul>
    </li>
</template>

<script>
    export default {
        data(){
            return {
                posts: []
            }
        },
        mounted() {
            axios.get('/posts').then(res => {
                this.posts = res.data;
            })
        },
        methods:{
            markAllAsRead(){
                axios.patch('/read/').then(res => {
                    this.posts = res.data;
                });
            }
        }
    }
</script>
