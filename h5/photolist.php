<?php
session_start();
require("LinkToSQL.php");
$SQL="SELECT * FROM photo";
echo "<h1>user list<h1>";
$result=mysqli_query($LinkToSQL,$SQL);       
//看執行成不成功 
if(isset($_GET["pNo"])){
    $_SESSION["pNo"]=$_GET["pNo"];
    header("Location:photoModify.php");
}
    if($result){
        echo "<table border='1'>";
        while($row=mysqli_fetch_assoc($result)){//此while用於印出所有資料
            //mysqli_fetch_assoc會找出第一條array可以用echo implode(" ",$w);看到並以空白分開
            echo "<tr>";
            echo "<td>";
            echo "<a href='/h5/".$row["ppath"]."' >";
            echo "<img src='/h5/".$row["ppath"]."' width='100%'>";
            echo "</a>";
            echo "</td>";
            echo "<td>".$row["pNo"]."</td><td>".$row["ppath"]."</td><td>".$row["pdate"]."</td><td><a href='photolist.php?pNo=".$row["pNo"]."'>修改</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    
?>