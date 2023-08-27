<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <div id="app">
         <form method="post" @submit.prevent="addUser()">
            <input type="text" v-model="username">
            <input type="text" v-model="password">
            <button type="submit">submit</button>
        </form>
    </div>
   

<script>
    const app = Vue.createApp({
        data() {
            return {
                username:'',
                password:''
            }
        },methods: {
            addUser(){
                const formd = new FormData()
                formd.append('username',this.username)
                formd.append('password',this.password)
                axios.post('./service_get.php',formd)
            .then(response => console.log(response.data))
            .catch(error => console.log(error)); 
            }
        }
    })
    app.mount('#app')
   
</script>