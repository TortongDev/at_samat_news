
<article>
    <div class="topic"> <h5>อัพเดทล่าสุด <?php echo date('d/m/Y'); ?></h5></div>
    <section class="content-new" v-for="(item,index) in content">
        <img class="img-new" src="data:image/png;base64,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"  alt="">
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
