<?php 
include '../config/dbconfig.php';
session_start();

$fullname = $_SESSION['name'];

if(isset($_POST['save'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $title = $_POST['title'];
    $faculty = $_POST['faculty'];
    $department = $_POST['department'];
    $date = date('Y-m-d h:m:s');

    $sqli = "INSERT INTO tbl_lecturer(fname, lname, title, faculty_id, department_id, date_created) VALUES ('$fname', '$lname' , '$title', '$faculty', '$department', '$date')";
    //$conn = new databaseconfig();
    $res = $conn->query($sqli);
    if ($res) {
        echo 'true';
    } 
    else {
        echo json_encode(array("statusCode"=>201));
    }
    mysqli_close($conn);



}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Lecturer</title>
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
                        <h3 class="text-dark mb-0">Lecturer</h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block" data-toggle="modal" data-target="#addLecturerForm" role="button" href="#"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Add Lecturer</a>
                    </div>
<div class="modal fade" id="addLecturerForm" tabindex="-1" role="dialog" aria-labelledby="add_lecturer" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add_lecturer">Add Lecturers</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="lecturer.php" method="POST">
            <div class="form-group">
                <label>Lecturer Title:</label>                    
                <select class="form-control form-control-sm" name="title"><option value="Prof." selected="">Professor</option><option value="Prof.">Associate Professor</option><option value="Dr.">Assisting Professor</option><option value="Dr.">Dr.</option><option value="Mr.">Mr.</option><option value="Mrs.">Mrs.</option><option value="Miss">Miss</option></select>
            </div>
            <div class="form-group">
                <label>Firstname:</label>                    
                <input type="text" class="form-control" name="fname" placeholder="Firstname ...">
            </div>
            <div class="form-group">
                <label>Lastname:</label>                    
                <input type="text" class="form-control" name="lname" placeholder="Lastname ...">
            </div>
            <div class="form-group">
                <label>Select Faculty:</label>                    
                <?php 
                $sqll="SELECT * FROM tbl_faculty";
                echo "<select class='form-control form-control-sm' name='faculty'>";
                echo "<option value='' selected=''>Select Faculty</option>";  
                foreach ($conn->query($sqll) as $row){
                echo "<option value=".$row['id'].">".$row['name']."</option>";  
                }
                echo "</select>";
                ?>
            </div>
            <div class="form-group">
                <label>Select Department:</label>                    
                <?php 
                $sqll="SELECT * FROM tbl_department";
                echo "<select class='form-control form-control-sm' name='department'>";
                echo "<option value='' selected=''>Select Department</option>";  
                foreach ($conn->query($sqll) as $row){
                echo "<option value=".$row['id'].">".$row['name']."</option>";  
                }
                echo "</select>";
                ?>
            </div>
            <input type="submit" name="save" class="btn btn-primary" value="Add Lecturer">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

                    <div class="card shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 text-nowrap">
                                <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label>Show&nbsp;<select class="form-control form-control-sm custom-select custom-select-sm"><option value="10" selected="">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select>&nbsp;</label></div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-right dataTables_filter" id="dataTable_filter"><label><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                            </div>
                        </div>
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table dataTable my-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Title</th>
                                        <th>Name</th>
                                        <th>Department</th>
                                        <!-- <th>Faculty</th> -->
                                        <th>Date Created</th>
                                        <th> Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $sqli="SELECT * FROM tbl_lecturer LEFT JOIN `tbl_department` ON `tbl_lecturer`.`department_id`=`tbl_department`.`id`";
                                        $i=0;
                                        $result = mysqli_query($conn, $sqli);
                                        while($row = mysqli_fetch_assoc($result)){
                                            echo "<tr>";
                                            echo "<td>".++$i."</td>";
                                            echo "<td>".$row['title'] . "</td>";
                                            echo "<td>".$row['fname'] . " " . $row['lname'] . "</td>";
                                            echo "<td>".$row['name']."</td>";
                                            // echo "<td>".$row['faculty_id']."</td>";
                                            echo "<td>".substr($row['date_created'],0,19)."</td>";
                                            echo "<td><button class='btn-sm btn-success fas fa-edit'>  Edit</button> <button class='btn-sm btn-danger fas fa-trash'>  Delete</button><br></td>";
                                        }

                                        echo "</tr>";
                                        $i++;
                                        ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-6 align-self-center">
                                <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 2 of 2</p>
                            </div>
                            <div class="col-md-6">
                                <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                    <ul class="pagination">
                                        <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                    </ul>
                                </nav>
                            </div>
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
    <script type="text/javascript">
        $(function(){ 

          $("#add_faculty").on('click', function(){ 

          $.ajax({ 

            method: "POST", 
            
            url: "add_records_ajax.php",

          }).done(function( data ) { 

            var result= $.parseJSON(data); 

            var string='<table width="100%"><tr> <th>#</th><th>Name</th> <th>Email</th><tr>';
     
           /* from result create a string of data and append to the div */
          
            $.each( result, function( key, value ) { 
              
              string += "<tr> <td>"+value['id'] + "</td><td>"+value['_name']+' '+value['last_name']+'</td>  \
                        <td>'+value['email']+"</td> </tr>"; 
                  }); 

                 string += '</table>'; 

              $("#records").html(string); 
           }); 
        }); 
    }); 
    </script>
</body>

</html>