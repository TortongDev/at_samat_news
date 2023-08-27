<aside>
    <div class="topic">
        <h5>ข่าวยอดนิยม</h5>
        <a href="#" @click="onPageContent()">ทั้งหมด</a>
    </div>
    <ul  v-for="(item,index) in news_popular">
        <li><a href="#">{{ item.NEW_TOPIC }}</a></li>
    </ul>
    
    <div class="topic">
        <h5>โพสต์ยอดนิยม</h5>
        <a href="#" @click="onPageContent()">ทั้งหมด</a>
    </div>
    <ul>
        <li><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing.</a></li>
        <li><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing.</a></li>
        <li><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing.</a></li>
        <li><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing.</a></li>
        <li><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing.</a></li>
        
    </ul>
</aside>