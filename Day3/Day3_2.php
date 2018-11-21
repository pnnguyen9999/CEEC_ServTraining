<?php error_reporting(E_ERROR | E_PARSE); ?>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<head>
	<title>DAY 4</title>
</head>
<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "ceec";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	$id = $_GET['id'];
	$tenphong = $_POST['tenphong'];
	$nhietdo = $_POST['nhietdo'];
	$doam = $_POST['doam'];

	if(isset($_POST["submit"])){
        if($query = mysqli_query($conn,"INSERT INTO phong (`tenphong`, `nhietdo`, `doam`) VALUES ('".$tenphong."', '".$nhietdo."', '".$doam."')")){
            echo "Success";
        }else{
            echo "Failure" . mysqli_error($conn);
        }
    }
    if(isset($_POST["clear"])){
        if($query = mysqli_query($conn,"DELETE FROM phong;")){
            echo "Success";
        }else{
            echo "Failure" . mysqli_error($conn);
        }
    }
    if(isset($_POST["removeField"])){
        if($query = mysqli_query($conn,"DELETE FROM phong WHERE id=".$id.";")){
            echo "Success";
        }else{
            echo "Failure" . mysqli_error($conn);
        }
    }
	mysqli_close($conn);
?>
<body style="">

	<div class="col-sm-2"></div>
	<div class="col-sm-8">
		<h1>CEEC DAY 5</h1>
		<form action="" method="POST" style="padding: 40px;border: 2px dashed #454545">
			<div class="col-sm-4">
				<label>Tên phòng:</label>
			  	<input class="form-control" name="tenphong">
			</div>
			<div class="col-sm-4">
				<label>Nhiệt độ:</label>
			  	<input class="form-control" name="nhietdo">
			</div>
			<div class="col-sm-4">
				<label>Độ ẩm:</label>
			  	<input class="form-control" name="doam">
			</div>
			<div class="col-sm-12" style="text-align: center;padding: 20px;">
				<button type="submit" class="btn btn-success" name="submit">Gởi dữ liệu</button>
				<button type="submit" class="btn btn-danger" name="clear">Xóa toàn bộ dữ liệu</button>
			</div>
		</form>
		<!-- result -->
		<table class="table">
	    <thead>
	      <tr>
	        <th>ID Phòng</th>
	        <th>Tên phòng</th>
	        <th>Nhiệt độ</th>
	        <th>Độ ẩm</th>
	        <th>Chỉnh sửa</th>
	      </tr>
	    </thead>
	    <tbody>
	   <?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "ceec";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);

        $sql = "select * from phong";
        $result = $conn->query($sql);
           if ($result->num_rows > 0) {
               while ($row = $result->fetch_assoc()) {
                   echo "<tr>";
                   echo "<td>".$row["id"]."</td>";
                   echo "<td>".$row["tenphong"]."</td>";
                   echo "<td>".$row["nhietdo"]."</td>";
                   echo "<td>".$row["doam"]."</td>";
                   echo "<form method=\"POST\">";
                   echo "<td><button type=\"submit\" class=\"btn btn-warning\" name=\"removeField\" formaction=\"day4.php/?id=".$row["id"]."\">Xóa</button></td>";
                   echo "</form>";
                   echo "</tr>";
               }
           } else {

           }
           $conn->close();
        ?>
	    </tbody>
	  </table>
  </div>
  <div class="col-sm-2"></div>
</body>
</html>