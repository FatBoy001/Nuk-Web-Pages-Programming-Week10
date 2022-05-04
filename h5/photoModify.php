<?php
    session_start();
    require("LinkToSQL.php");
    $pNo=$_SESSION["pNo"];
    if(isset($_POST["update"])){    
        
        $pathpart=pathinfo($_FILES['photo']['name']);//$pathpart是陣列
        echo $pathpart['extension']; 
        $extname=$pathpart['extension'];
        $finalphoto="Photo_".time().".".$extname;
        $now=time();
        
        $SQL="UPDATE photo SET ppath = '$finalphoto', pdate= '$now' WHERE pNo = $pNo";

        if(copy($_FILES['photo']["tmp_name"],$finalphoto)){
            if(mysqli_query($LinkToSQL,$SQL)){
                echo "<script type='text/javascript'>";
                echo "alert('上傳成功');";
                echo "</script>";
                
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
    }

?>
<html>
    <header>
    </header>
    <body>
        <form action="photoModify.php" method="post" enctype="multipart/form-data">
            <input type="file" name="photo" accept="image/*"/></br><!--只接受圖片-->
            <input type="submit" value="修改圖片" name="update">
        </form>
    </body>
</html>