<?php
    require("LinkToSQL.php");
    //$phptoname=$_FILES["photo"]["tmp_name"];
    //echo $phptoname;
    $pathpart=pathinfo($_FILES['photo']['name']);//$pathpart是陣列
    $extname=$pathpart['extension'];

    //產生新黨案名稱
    $finalphoto="Photo_".time().".".$extname;
    $now=time();
    //加入資料庫
    $SQL="INSERT INTO photo (ppath,pdate) VALUES ('$finalphoto','$now')";

    echo $finalphoto;

    //上傳檔案
    echo "<br/>";
    if(copy($_FILES['photo']["tmp_name"],$finalphoto)){
        if(mysqli_query($LinkToSQL,$SQL)){
            echo "<script type='text/javascript'>";
            echo "alert('上傳成功');";
            echo "</script>";
            echo "<meta http-equiv='Refresh' content='0;url=photolist.php'>";
        }else{
            echo "<script type='text/javascript'>";
            echo "alert('上傳失敗');";
            echo "</script>";
            echo "<meta http-equiv='Refresh' content='0;url=photo.php'>";
        }
    }else{
        echo "<script type='text/javascript'>";
            echo "alert('上傳失敗');";
            echo "</script>";
            echo "<meta http-equiv='Refresh' content='0;url=photo.php'>";
    }
?>