<?php 
include '../config/dbconfig.php';
session_start();

$error = '';

$fullname = $_SESSION['name'];

if(isset($_POST['save'])){
    $name = $_POST['name'];
    $date = date('Y-m-d h:m:s');

    $sqli = "INSERT INTO tbl_faculty(name, date_created, date_updated) VALUES ('$name', '$date' , '$date')";
    //$conn = new databaseconfig();
    $res = $conn->query($sqli);
    if ($res) {
        echo 'true';
        header("Location:faculty.php");
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
                        <h3 class="text-dark mb-0">Faculty</h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block" data-toggle="modal" data-target="#addFacultyForm" role="button" href="#"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Add Faculty</a>
                    </div>

<div class="modal fade" id="addFacultyForm" tabindex="-1" role="dialog" aria-labelledby="add_faculty" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add_faculty">Add Faculty</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div style="margin: auto;width: 60%;">
    <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    </div>
    <form id="fupForm" name="form1" method="post">
        <div class="form-group">
            <label for="fname">Faculty Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Name" name="name">
        </div>
        <input type="submit" name="save" class="btn btn-primary" value="Add Faculty" id="butsave">
        <!-- <img src="LoaderIcon.gif" id="loaderIcon" style="display: none;"> -->
    </form>
</div>

        <!--<div class="row">
            <div class="success" style="padding-bottom: 7px;display: none;"><center>Sign in<?php echo $error?></center>
            <div id="message"></div></div>
        </div>
        <form id="addFacultyForm1" action="" method="POST">
            <div class="form-group">
                <label>Faculty's Name</label>                    
                <input type="text" class="form-control" id="name" name="name" placeholder="Faculty's Name ...">
            </div>
            <div class="form-group">
                <button type="button" name="addfaculty" id="addfaculty"  class="btn btn-success" value="Submit">Add Faculty</button>
            </div>
        </form>-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <!-- <script>
        $(document).ready(function() {
            $('#butsave').on('click', function() {
                $("#butsave").attr("disabled", "disabled");
                $("#loaderIcon").show();

                var name = $('#name').val();
                var save = $('$butsave').val();
                
                if(name != ""){
                    $("#loaderIcon").hide();
                    $.ajax({
                        url: "addfaculty.php",
                        type: "POST",
                        data: {
                            name: name,
                            save: save           
                        },
                        cache: false,
                        success: function(dataResult){
                            var dataResult = dataResult;
                            if(dataResult =='true'){
                                $("#butsave").removeAttr("disabled");
                                $('#fupForm').find('input:text').val('');
                                $("#loaderIcon").hide();
                                $("#success").show();
                                $('#success').html('Data added successfully !');                        
                            }
                            else if(dataResult.statusCode==201){
                                $("#loaderIcon").hide();
                                $("#butsave").removeAttr("disabled");
                               alert("Error occured !");
                            }
                            
                        }
                    });
                }
                else{
                    $("#butsave").removeAttr("disabled");
                    alert('Please fill all the fields !');
                }
            });
        });
        </script> -->
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
                                        <th>Date Created</th>
                                        <th>Date Updated</th>
                                        <th> Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php 
                                        $sqli="SELECT * FROM tbl_faculty";
                                        $i=0;
                                        $result = mysqli_query($conn, $sqli);
                                        while($row = mysqli_fetch_assoc($result)){
                                            $ffid = $row['id'];
                                            $ffname = $row['name'];

                                            echo '<tr id="'.$ffid.'">';
                                            echo '<td id="'.$ffid.'">'.$ffid.'</td>'; 
                                            echo '<td id="'.$ffid.'">'.$ffname.'</td>';
                                            echo '<td id="'.$ffid.'">'.substr($row['date_created'],0,19).'</td>';
                                            echo '<td id="'.$ffid.'">'.substr($row['date_updated'],0,19).'</td>';
                                            ?>
                                            
                                            <td><button id="edit_button(<?php echo $ffid ?>)" class="btn-sm btn-success fas fa-edit" onclick="edit_row(<?php echo $ffid ?>)">Edit</button> 
                                            <button class='btn-sm btn-danger fas fa-trash'>  Delete</button><br></td> <?php
                                        }

                                        echo "</tr>";
                                        ?>

                                        <?php
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
    <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
    
    <script type="text/javascript">
        function edit_row(no){
            document.getElementById("edit_button"+no).style.display="none";
            document.getElementById("save_button"+no).style.display="block";

            var name=document.getElementById(no);
    
            var name_data=name.innerHTML;
            
            name.innerHTML="<input type='text' id='no' value='"+name_data+"''>";
    </script>
    
</body>

</html>