<header>
    <ul v-for="(item, index) in menu" :key="index">
        <li><a :href="item.url_redirect">{{ item.menu }}</a></li>
    </ul>
</header>