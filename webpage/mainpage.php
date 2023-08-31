
<article>
    <div class="topic"> <h5>อัพเดทล่าสุด <?php echo date('d/m/Y'); ?></h5></div>
    <section class="content-new" v-for="(item,index) in content">
        <img class="img-new" :src="'../services/news/img_profile/'+item.NEW_PROFILE"  >
        <div class="detail-new">
            <h5>
                <a :href="'content_news.php?newID='+item.NEW_ID_ENCYPT">{{item.NEW_TOPIC}}</a>
            </h5>
        <h6>{{ item.NEW_SUB_TOPIC}}</h6>
       
            <div class="list-footer-new">
                <ul>
                    <li>
                        <i class="fa fa-eye"></i> 10
                    </li>
                    <li>Like 100</li>
                    <li>
                        <i class="fa fa-comment-o"></i> 5
                    </li>
                    
                </ul>
            </div>
        </div>
    </section>
    <?php
        require_once "../autoload_class.php";
        require_once "../config/key/config.php";
        $get = new Connection(true);
        $stmtCount = $get->pdo->query("SELECT * FROM `samat_news` ");
        $count = $stmtCount->rowCount();
        $pageNumber =  ceil($count/5);

        for($i = 0; $i < $pageNumber; $i++): 
        ?>
        <a @click="navPage(<?php echo $i+1;?>)"><?php echo $i+1;?></a>
    <?php endfor; ?>
</article>
