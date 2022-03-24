<template>
    <div>
        <main>
            <div class="container">
                <div v-for="(post,index) in posts" :key="index" class="info_post">
                    <h4>ID: {{post.id}}</h4>
                    <h5>Titolo: {{post.title}}</h5>
                    <h6>Contenuto: {{post.content}}</h6>
                </div>
            </div>
        </main>
    </div>
    
</template>

<script>

export default{
    name: "Main",
    data(){
        return {
            posts: [],
        };
    },
    created() {
        axios
        .get("/api/posts")
        .then((response)=>{
            this.posts = response.data
        })
    }
}

</script>

<style lang="scss" scoped>

.container{
    width: 100%;
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
}

.info_post{
    width: 18%;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    background-color: lightgreen;
    padding: 20px;
    margin-bottom: 20px;
    margin-right: 20px;
}
</style>