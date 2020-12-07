<?php 
include '../config/dbconfig.php';
session_start();

$fullname = $_SESSION['name'];

if(isset($_POST['save'])){
    $fname = $_POST['name'];
    $faculty = $_POST['faculty'];
    $date = date('Y-m-d h:m:s');

    $sqli = "INSERT INTO tbl_department(name, faculty_id, date_created) VALUES ('$name', '$faculty', '$date')";
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
    <title>Department</title>
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
                        <h3 class="text-dark mb-0">Department</h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block" data-toggle="modal" data-target="#addDepartmentForm" role="button" href="#"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Add Department</a>
                    </div>

<div class="modal fade" id="addDepartmentForm" tabindex="-1" role="dialog" aria-labelledby="add_department" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add_department">Add Department</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
            <div class="form-group">
                <label>Department's Name</label>                    
                <input type="text" class="form-control" name="dep_name" placeholder="Department's Name ...">
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
                                        <th>Name</th>
                                        <th>Faculty</th>
                                        <th>Date Created</th>
                                        <th> Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $sqli="SELECT * FROM tbl_department";
                                        $i=0;
                                        $result = mysqli_query($conn, $sqli);
                                        while($row = mysqli_fetch_assoc($result)){
                                            echo "<tr>";
                                            echo "<td>".$row['id']."</td>";
                                            echo "<td>".$row['name'] ."</td>";
                                            echo "<td>".$row['faculty_id']."</td>";
                                            echo "<td>".substr($row['date_created'],0,19)."</td>";
                                            echo "<td><button class='btn-sm btn-success fas fa-edit'>  Edit</button> <button class='btn-sm btn-danger fas fa-trash'>  Delete</button><br></td>";
                                        }

                                        echo "</tr>";
                                        $i++;
                                        ?>
                                </tbody>
                                    
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

          $("#add_department").on('click', function(){ 

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