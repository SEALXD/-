<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>员工人事管理系统</title>
</head>
<body>
<table width="100%" border="1" cellpadding="0" cellspacing="0">
    <tr>
        <td>工号</td>
        <td>姓名</td>
        <td>性别</td>
        <td>民族</td>
        <td>生日</td>
        <td>政治面貌</td>
        <td>文化程度</td>

    </tr>

    <?php
    $sno=$_GET["sno"];
    $db = new mysqli("localhost","root","","HR");
    mysqli_set_charset($db,"utf8");
    $sql = "SELECT * FROM staff WHERE sno = '$sno'";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        // 输出数据
        while($row = $result->fetch_assoc()) {
            echo
            "<tr>
                <td>{$row["sno"]}</td>
                <td>{$row["sname"]}</td>
                <td>{$row["ssex"]}</td>
                <td>{$row["snation"]}</td>
                <td>{$row["sbirth"]}</td>
                <td>{$row["spolitic"]}</td>
                <td>{$row["sedu"]}</td>
             </tr>";
        }
    } else {
        echo "没有此员工！";
    }

    ?>
</table>

<div> </div>

<table width="100%" border="1" cellpadding="0" cellspacing="0">
    <tr>
        <td>部门名称</td>
        <td>编号</td>
        <td>职位</td>
    </tr>

    <?php
    $num = 1;
    $db = new mysqli("localhost","root","","HR");
    mysqli_set_charset($db,"utf8");
    $sql = "SELECT * FROM staffjob WHERE deptno = '$num'";
    $result = $db->query($sql);
    echo $result->num_rows;
    while ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo
            "<tr>
                <td>{$row["deptno"]}</td>
                <td>{$row["sno"]}</td>
                <td>{$row["spost"]}</td>
             </tr>
             
             ";
        }
        $num = $num + 1;
        $sql = "SELECT * FROM staffjob WHERE deptno = '$num'";
        $result = $db->query($sql);
    }

    ?>
</table>


</body>
</html>