<?php
/**
 * Created by PhpStorm.
 * User: Arc en ciel
 * Date: 2018/12/26
 * Time: 20:37
 */
header("Content-type:text/html;charset=utf-8");
if($con = mysqli_connect('localhost','root','')){
   // echo "连接成功\n";
}else{
    echo "连接失败";
}
if (mysqli_select_db($con,'HR')){
    //echo "选择数据库成功\n";
}else{
    echo "选择数据库失败";
}

$uname = $_POST["name"];
$upassword = $_POST["password"];
//$urank = $_POST["rank"];
//$sno = $_POST["number"];

//    echo "输入成功！\n";
//    echo "<br>";
//    echo "name",$uname;
//    echo "<br>";
//    echo "password",$upassword;
//    echo "<br>";
//    echo "rank",$urank;
//    echo "<br>";
//    echo "number",$sno;

//$sql = "INSERT INTO userinfo (uname,upassword,urank,sno)
//VALUES ('$uname','$upassword','$urank','$sno')";
//if ($con->query($sql) === TRUE) {
//    echo "注册成功！";
//} else {
//    echo "Error: " . $sql . "<br>" . $con->error;
//}


$sql = "SELECT * FROM userinfo WHERE uname = '$uname' and upassword = '$upassword'";
$result = $con->query($sql);
if (mysqli_num_rows($result) < 1){
    echo '用户名或密码错误！';
}else{
    echo "登陆成功！";
    $row=$result->fetch_all(MYSQLI_BOTH);//参数MYSQL_ASSOC、MYSQLI_NUM、MYSQLI_BOTH规定产生数组类型
    if ($row[0]["urank"]==1){
        echo "rank1";
        $sno = $row[0]["sno"];
        header("Refresh:1;url=user1.php/?sno=$sno");//隔2秒自动跳转
    }else if ($row[0]["urank"]==0){
        echo "rank0";
        $sno = $row[0]["sno"];
        header("Refresh:1;url=user0.php/?sno=$sno");
    }else{
        echo "error";
    }
}


?>
