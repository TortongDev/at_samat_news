<script>
    
        fetch('./add_process.php?username=12345')
        .then(response => response.json())
        .then(data => console.log(data))
        .catch(error => console.log(error));
</script>
<?php

?>