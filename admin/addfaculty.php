<?php
include "../config/dbconfig.php"; 

if(isset($_POST['save'])){
    $name = $_POST['name'];
    $date = date('Y-m-d h:m:s');

    $sqli = "INSERT INTO tbl_faculty(name, date_created) VALUES ('$name' '$date')";
    //$conn = new databaseconfig();
    $res = $conn->query($sqli);
	if ($res) {
		echo 'true';
		header("location:faculty.php");
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);



}

?>
<?php 
include '../config/dbconfig.php';
session_start();

$error = '';

$fullname = $_SESSION['name'];

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Faculty</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <?php include 'includes/sidebar.php'; ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <?php include 'includes/navbar.php'; ?>
            <div id="content">
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Add Faculty</h3>
                    </div>



                    <div class="card shadow"> 
                    <div class="card-body">
                    	<div class="row mb-4">
                    		<form id="fupForm" action="addfaculty.php" name="form1" method="post">
        <div class="form-group">
            <label for="email">Faculty Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Name" name="name">
        </div>
        <input type="submit" name="save" class="btn btn-primary" value="Add Faculty" id="butsave">
        <img src="LoaderIcon.gif" id="loaderIcon" style="display: none;">
    </form>
                    	</div>

                    </div>
                </div>

                </div>

            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © </span></div>
                </div>
            </footer>
        </div>
        <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
        <div>
        </div>
    </div>
            
        </div>
    </div>


    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/chart.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="../assets/js/theme.js"></script>
    <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
    
    
</body>

</html>