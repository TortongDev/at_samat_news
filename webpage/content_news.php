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
                <?php
                    require_once "../config/key/config.php";
                    $newID = isset($_GET['newID']) ? $_GET['newID'] : '';
                    $tag = null;
                    $decrypt =  openssl_decrypt($r['NEW_ID'],'aes-128-gcm', PRIVATE_KEY , OPENSSL_RAW_DATA, IV ,$tag);
                    echo $decrypt;
                ?>
                <article>
                    
                    <div class="topic"> <h5>อัพเดทล่าสุด <?php //echo date('d/m/Y'); ?></h5></div>

                    <section class="content-new">
                       
                    </section>
                </article>
            </div>
        </main>
        <?php include "./footer.php"; ?>
    </div>
</body>
<script>
    const app = Vue.createApp({
        data() {
            return {
              
            }
        },mounted() {
          


        },methods: {
           
          
        }
    })
    app.mount("#wrapper")
</script>
</html>