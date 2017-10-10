<?php
header("Content-Type: text/html;charset=utf-8");
$name=$_POST['stu-name'];
$number=$_POST['stu-number'];
$school=$_POST['stu-school'];
$department=$_POST['stu-department'];
$servername = "localhost";
$username = "root";
$password = "zhou123456";
$dbname = "department";

// 创建连接
$conn = mysqli_connect($servername, $username, $password, $dbname);
// 检测连接
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "insert into zxf (name, number, school, department) values ('$name', $number, '$school', '$department')";

if (mysqli_query($conn, $sql)) {
    echo "提交成功，感谢你的报名！";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>