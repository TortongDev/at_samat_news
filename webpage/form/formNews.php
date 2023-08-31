<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <script src="../js/script.js"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script type="text/javascript" src="//js.nicedit.com/nicEdit-latest.js"></script> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet" />
    <title>PAGE ONE</title>
    <style>
        .form-group {
            padding-inline-start: 20px;
            margin: auto;
            margin-block: 20px;

        }
        .nicEdit-main {
			outline: none;
			height: 300px;
			width: 100%;
		}
        .bootstrap-tagsinput .tag {
            margin-right: 2px;
            color: white !important;
            background-color: #0d6efd;
            padding: 0.2rem;
        }
        .bootstrap-tagsinput {
            width: 100% !important;
        }
        
    </style>
   
</head>
<body>

    <div id="wrapper">
        <?php include "../header.php"; ?>
        <main>
            <div class="header-title">
                <h3>บันทึกข่าว</h3>
                <h6>บันทึกข่าว อัพเดทข่าว ให้คนติดตามข้อมูลข่าวสารออนไลน์</h6>
            </div>
            <div class="wrapper-content">
            <?php // include "./mainpage.php";  ?>
            <article>
                <div class="topic"> <h5>ฟอร์มบันทึก</h5></div>
                <form action="../../services/news/setNews.php" method="post"  enctype="multipart/form-data">
                <div class="form-group">
                        <label for="NEW_PROFILE">โปรไฟล์ข่าว</label>
                        <input type="file" class="form-control" name="NEW_PROFILE" id="NEW_PROFILE">
                    </div>
                    <div class="form-group">
                        <label for="NEW_TOPIC">หัวข้อข่าว</label>
                        <input type="text" class="form-control" name="NEW_TOPIC" id="NEW_TOPIC">
                    </div>
                    <div class="form-group">
                        <label for="NEW_SUB_TOPIC">หัวข้อย่อยข่าว</label>
                        <input type="text" class="form-control" name="NEW_SUB_TOPIC" id="NEW_SUB_TOPIC">
                    </div>
                    <div class="form-group">
                        <label for="NEW_TAG">เพิ่ม tag</label>
                        <input type="text"  data-role="tagsinput" class="form-control" name="NEW_TAG" id="NEW_TAG">
                    </div>
                    <div class="form-group">
                        <label for="NEW_SIGNATURE">นามปากกา</label>
                        <input type="text" class="form-control" name="NEW_SIGNATURE" id="NEW_SIGNATURE">
                    </div>
                    <!-- <div class="form-group">
                        <label for="AUTHEN_ADMIN_ID">AUTHEN_ADMIN_ID</label>
                        <input type="text" class="form-control" name="AUTHEN_ADMIN_ID" id="AUTHEN_ADMIN_ID">
                    </div> -->
                    <div class="form-group">
                        <label for="NEW_TEXT">Editor</label>
						 <textarea name="NEW_TEXT" id="NEW_TEXT" style="width: 100%;" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                        &nbsp;
                        <button type="reset" class="btn btn-warning">ล้างฟอร์ม</button>
                    </div>

                </form>
            </article>
            </div>
        </main>
        <?php include "../footer.php"; ?>
    </div>
</body>
<script type="text/javascript">
   
   bkLib.onDomLoaded(function() 
     { 
       nicEditors.allTextAreas({
       }) 
     }
   );
</script>
<script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"
  ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
  <script>
    $(function () {
      $('input')
        .on('change', function (event) {
          var $element = $(event.target);
          var $container = $element.closest('.example');

          if (!$element.data('tagsinput')) return;

          var val = $element.val();
          if (val === null) val = 'null';
          var items = $element.tagsinput('items');

          $('code', $('pre.val', $container)).html(
            $.isArray(val)
              ? JSON.stringify(val)
              : '"' + val.replace('"', '\\"') + '"'
          );
          $('code', $('pre.items', $container)).html(
            JSON.stringify($element.tagsinput('items'))
          );
        })
        .trigger('change');
    });
</script>
<script>
    const app = Vue.createApp({
        data() {
            return {
                authenusername: '' ,
                authenpassword: '' ,
                authenemail: '', 
                menu: '',
                
            }
        },mounted() {
          

           fetch('../../config/json/menu.php')
            .then(response => response.json())
            .then((data)=>{
                this.menu = data
            })
            .catch(error => console.log(error));


        },methods: {
           
      
        }
    })
    app.mount("#wrapper")
</script>
</html>