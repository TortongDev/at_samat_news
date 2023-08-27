<?php
    spl_autoload_register('autoload_class');
    function autoload_class($loadClass)
    {
        $this_path = array(
            "./class",
            "../class",
            "../../class",
            "../../../class",
            "../../../../class"
        );
        foreach ($this_path as $key => $value) {
            if(file_exists($value)):
                $setPath = "$value/$loadClass.php";
                require_once $setPath;
            endif;
        }

    }
?>