<?php
    require_once "../services/authen/authen.php";
    require_once "../config/key/config.php";
    require_once "../config/key/byepass_code.php";
    require_once "../class/Connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="css/style.css">
       <style>
        html,body {
            height: 100%;
        }
        .topic {margin-inline: 20px;}
        #wrapper-new {
            min-height: 100vh;
            width: 80%;
            margin-inline: 30px;
        }
        img {
            margin: 0 auto !important;
            width: 100% !important;
            height: 500px;
            object-fit: cover;
        }
        .sub-topic {color:gray;margin-inline: 38px;}

       </style>
    <title>PAGE ONE</title>
</head>
<body>

    <div id="wrapper">
        <?php include "./header.php"; ?>
        <main>
            <?php
                    $newID          = isset($_GET['newID']) ? $_GET['newID'] : '';
                    $ID_Decrypt     = decrypt_code(base64_decode($newID),PRIVATE_KEY,IV);
                    $db = new Connection(true);
                    $new = $db->pdo->prepare("SELECT * FROM `samat_news` WHERE ? AND NEW_ID = ?");
                    $new->execute(array("1=1", $ID_Decrypt ));
                
            ?>
            <?php while ($r = $new->fetch(PDO::FETCH_ASSOC)): ?>
            <div class="header-title">
                <h3><?php echo $r['NEW_TOPIC'];?></h3>
                <h6><?php echo $r['NEW_SUB_TOPIC']; ?></h6>
            </div>
               
            <article>
                <div class="topic"> 
                    <h5> วันที่ลงข่าว : <?php echo $r['SAMAT_TIMESTAMP']; ?></h5>
                    
                </div>
                <h6 class="sub-topic" >เขียนข่าวโดย : <?php echo $r['NEW_SIGNATURE']; ?></h6>
                <section id="wrapper-new">

                    <?php echo $r['NEW_TEXT']; ?>

                    <br><br>
                    <div class="card mr-top-100" >
                        <div class="card-header">กล่องแสดงข้อความ</div>
                        <div class="cord-body"   style="height: 400px;overflow: auto;">
                          
                                <p>
                                    <ul>
                                        <li  v-for="item in message" :key="index"><span class="bg-success text-light">{{ item.ID }}</span> : {{ item.TEXT }}</li>
                                    </ul>
                                </p>
                        </div>
                    </div><br>
                    <form action="post" @submit.prevent="postMessage()">
                    <div class="form-group">
                        <label for="commend">กล่องพิมพ์ข้อความ</label>
                        " {{comment}} " {{userid}}
                        <input type="hidden" name="userid"  value="<?php echo $_SESSION['USER_ID'];?>">
                        <input type="hidden" name="newid"  value="<?php echo $ID_Decrypt;?>">
                        <textarea name="commend" id="commend" v-model="comment" class="form-control"></textarea><br>
                        <button type="submit" class="btn btn-secondary" @submit.prevent="postMessage">Commend</button>
                    </div>
                </form>
                </section>

               
            </article>
               
                    
            <?php endwhile; ?>
        
      
        </main>

        <?php include "./footer.php"; ?>
    </div>
</body>
<script>
    const app = Vue.createApp({
        data() {
            return {
                menu: '',
                comment: 'hello',
                userid: '',
                content:'<?php echo $ID_Decrypt ;?>',
                message:''
                
            }
        },mounted() {
              // fetch menu
           fetch('../config/json/menu.php')
            .then(response => response.json())
            .then((data)=>{
                this.menu = data
            })
            .catch(error => console.log(error));

            fetch('../services/news/resetMessage.php?newid='+this.content)
            .then(response => response.json())
            .then((data)=>{
                this.message = data
                console.log(this.message);
            })
            .catch(error => console.log(error));
        },methods: {
            postMessage(){
            // fetch menu
            const formData = new FormData()
            this.userid = document.querySelector('[name=userid]').value
            this.newid = document.querySelector('[name=newid]').value
            
            formData.append('message',this.comment)
            formData.append('userid',this.userid)
            formData.append('newid',this.newid)
            axios.post('../services/news/postMessage.php',formData)
           
            .then((response) => {
                fetch('../services/news/resetMessage.php?newid='+this.content)
                .then(response => response.json())
                .then((data)=>{
                    this.message = data
                    console.log(this.message);
                })
                .catch(error => console.log(error));
            })
            .catch(error => console.log(error));
        },
    },

})
app.mount("#wrapper")
</script>
</html>
<?php 
    $db->pdo = null;
    $db      = null;
    exit;
 ?>