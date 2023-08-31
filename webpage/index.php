<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <script src="./js/script.js"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="css/style.css">
    <title>PAGE ONE</title>
</head>
<body>

    <div id="wrapper">
        <?php include "./header.php"; ?>
        <main>
            <div class="header-title">
                <h3>แจ้งข่าวอาจสามารถ</h3>
                <h6>คนอาจสามารถทั้งอยู่ใกล้อยู่ไกล รวมตัวกันหน่อยเร็วทุกคน</h6>
            </div>
            <div class="wrapper-content">
                <?php include "./mainpage.php"; ?>
                <?php include "./aside.php"; ?>
            </div>
            <?php
                include "./banner.php";
            ?>
        </main>
        <?php include "./footer.php"; ?>
    </div>
</body>
<script>
    const app = Vue.createApp({
        data() {
            return {
                authenusername: '' ,
                authenpassword: '' ,
                authenemail: '', 
                menu: '',
                content: '',
                news_popular: '',
                page:'',
                
            }
        },mounted() {
            // fetch news
            fetch('../services/news/getNews.php?page='+this.page)
            .then(response => response.json())
            .then((data)=>{
                this.content = data
            })
            .catch(error => console.log(error));
            // fetch news popular aside
            fetch('../services/news/getNewsPopular.php')
            .then(response => response.json())
            .then((data)=>{
                this.news_popular = data
            })
            .catch(error => console.log(error));
            // fetch menu
           fetch('../config/json/menu.php')
            .then(response => response.json())
            .then((data)=>{
                this.menu = data
            })
            .catch(error => console.log(error));


        },methods: {
            navPage(countPage){
                fetch('../services/news/getNews.php?pages='+countPage)
                .then(response => response.json())
                .then((data)=>{
                    this.content = data
                })
                .catch(error => console.log(error));
             
            }
        }
    })
    app.mount("#wrapper")
</script>
</html>