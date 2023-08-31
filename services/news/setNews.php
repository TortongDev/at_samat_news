<?php
    require_once "../../autoload_class.php";
    $set = new Connection(true);
    
    $NEW_TOPIC      = isset($_POST['NEW_TOPIC']) ? $_POST['NEW_TOPIC'] : '';
    $NEW_SUB_TOPIC  = isset($_POST['NEW_SUB_TOPIC']) ? $_POST['NEW_SUB_TOPIC'] : '';
    $NEW_TEXT       = isset($_POST['NEW_TEXT']) ? $_POST['NEW_TEXT'] : '';
    $NEW_TAG        = isset($_POST['NEW_TAG']) ? $_POST['NEW_TAG'] : '';
    $NEW_SIGNATURE  = isset($_POST['NEW_SIGNATURE']) ? $_POST['NEW_SIGNATURE'] : '';
    $AUTHEN_ADMIN_ID = isset($_POST['AUTHEN_ADMIN_ID']) ? $_POST['AUTHEN_ADMIN_ID'] : '';

    $imgNames    = $_FILES["NEW_PROFILE"]["name"];
    $tmp_names   = $_FILES["NEW_PROFILE"]["tmp_name"];
    $file_size   = $_FILES["NEW_PROFILE"]["size"];
   
    function profile($imgName,$tmp_name,$file_size){
        // var_dump($imgName);
        $target_dir = "./img_profile";
        // var_dump( $imgName["name"]);
        $target_file = $target_dir.'/' . basename($imgName);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if(isset($_POST["submit"])) {
            $check = getimagesize($tmp_name);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($file_size > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
        }
        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($tmp_name, $target_file)) {
          //  echo "The file ". htmlspecialchars( basename($imgName)). " has been uploaded.";
            return $imgName;
            } else {
            echo "Sorry, there was an error uploading your file.";
            }
        }
        }

    $NEW_PROFILES = profile($imgNames , $tmp_names , $file_size);
    echo $NEW_PROFILES;
    $arr_data = array(
        $NEW_TOPIC,
        $NEW_SUB_TOPIC,
        $NEW_TEXT,
        $NEW_TAG,
        $NEW_SIGNATURE,
        $AUTHEN_ADMIN_ID,
        $NEW_PROFILES
    );
    try {
       $insert = $set->pdo->prepare('INSERT INTO `samat_news`(`NEW_TOPIC`, `NEW_SUB_TOPIC`, `NEW_TEXT`, `NEW_TAG`, `NEW_SIGNATURE`,`AUTHEN_ADMIN_ID`,`NEW_PROFILE`) VALUES (?,?,?,?,?,?,?)');
       $insert->execute($arr_data);
        // echo "";
        echo json_encode(array('status'=>'1','message'=> "seccessfully."));
    } catch (PDOException $err) {
        echo json_encode(array('status'=>'0','message'=> $err->getMessage()));
    }
    $set = null;
    exit;
?>