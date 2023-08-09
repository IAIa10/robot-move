<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "robot_move";



	$sql = "insert into robot (move)
         values('right')";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if (mysqli_query($conn, $sql)) {
  echo "right";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);


}


// استعلام لاسترداد آخر قيمة موجودة في الجدول
$sql = "SELECT * FROM robot WHERE id=(SELECT MAX(id)FROM robot)";

// تنفيذ الاستعلام وحفظ النتيجة في متغير
$result = $conn->query($sql);

// التحقق من وجود بيانات وإظهارها
if ($result->num_rows > 0) {
    // عرض البيانات في صفحة HTML
    while($row = $result->fetch_assoc()) {
        echo "<br> Move: "   . $row["move"] ;echo " <br>ID : " . $row["id"];
    }
} else {
    echo "لا يوجد بيانات في الجدول";
}

mysqli_close($conn);

?>
<html>
<body>
<FORM ACTION="index.html" METHOD="post">
<INPUT TYPE="SUBMIT" VALUE ="  Back to main Menu  ">
	
</FORM>

</body>
</html>