<?php 
include '../config/dbconfig.php';
session_start();

$fullname = $_SESSION['name'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Timetable</title>
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
                        <h3 class="text-dark mb-0">Timetable</h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block" data-toggle="modal" data-target="#addDepartmentForm" role="button" href="#"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Add Department</a>
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
                             <?php

                    echo "<table id='dataTable' border='1' class='table dataTable my-0'>";

echo "<tr class='danger'><th colspan='9'><a href='admindashboard.php?info=add_timetable'>Add New</a></th></tr>";

echo "<tr>
<th>Date</th>
<th>Morning Session</th>
<th>Afternoon Session</th>
<th>Evening Session</th></tr>";

$que=mysqli_query($conn,"select *  from time_tms");
    while($res=mysqli_fetch_array($que))
    {
    echo "<tr>";
    echo "<td>".$res['timeschedule_id']."</td>" ;
    
    //display department name
    $que2=mysqli_query($con,"select *  from department where department_id='".$res['department_name']."'");
    $res2=mysqli_fetch_array($que2);
    
    echo "<td>".$res2['department_name']."</td>" ;
    
    
    
    //display subject name
    $que3=mysqli_query($con,"select *  from subject where subject_id='".$res['subject_name']."'");
    $res3=mysqli_fetch_array($que3);
    echo "<td>".$res3['subject_name']."</td>" ;
    
    //display semester name
    $que4=mysqli_query($con,"select *  from semester where sem_id='".$res['semester_name']."'");
    $res4=mysqli_fetch_array($que4);
    echo "<td>".$res4['semester_name']."</td>" ;
    
    
    //display teacher name
    $que5=mysqli_query($con,"select *  from teacher where teacher_id='".$res['teacher_id']."'");
    $res5=mysqli_fetch_array($que5);
    echo "<td>".$res5['name']."</td>" ;
    
    
    echo "<td>".$res['time']."</td>" ;
    echo "<td>".$res['date']."</td>" ;


    echo "<td><a href='admindashboard.php?info=updatetimetable&timeschedule_id=$res[timeschedule_id]'>Update</a></td>";
    ?>
    
    <td>
    <a href='javascript:deleteData("<?php echo  $res[timeschedule_id];?>")'>Delete</a></td>
    <?php
    echo "</tr>";
    }
    echo "</table>";    

?>
                            <table class="table dataTable my-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Day/Date</th>
                                        <th>Morning Session</th>
                                        <th>Afternoon Session</th>
                                        <th>Evening Session</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <tr>
                                        <td>Monday</td>
                                        <td>Mathematical Sciences</td>
                                        <td>Science and Science Education</td>
                                        <td>22-05-2017</td>
                                        <td><button class="btn-sm btn-success fas fa-edit">  Edit</button> <button class="btn-sm btn-danger fas fa-trash">  Delete</button><br></td>
                                       
                                    </tr>
                                    
                                    <tr>
                                        <td>Tuesday</td>
                                        <td>English</td>
                                        <td>Humanities</td>
                                        <td>22-05-2017</td>
                                        <td><button class="btn-sm btn-success fas fa-edit">  Edit</button> <button class="btn-sm btn-danger fas fa-trash">  Delete</button><br></td>
                                        
                                    </tr>

                                    <tr>
                                        <td>Wednesday</td>
                                        <td>Mathematical Sciences</td>
                                        <td>Science and Science Education</td>
                                        <td>22-05-2017</td>
                                        <td><button class="btn-sm btn-success fas fa-edit">  Edit</button> <button class="btn-sm btn-danger fas fa-trash">  Delete</button><br></td>
                                    </tr>

                                    <tr>
                                        <td>Thursday</td>
                                        <td>Mathematical Sciences</td>
                                        <td>Science and Science Education</td>
                                        <td>22-05-2017</td>
                                        <td><button class="btn-sm btn-success fas fa-edit">  Edit</button> <button class="btn-sm btn-danger fas fa-trash">  Delete</button><br></td>
                                    </tr>

                                    <tr>
                                        <td>Friday</td>
                                        <td>Mathematical Sciences</td>
                                        <td>Science and Science Education</td>
                                        <td>22-05-2017</td>
                                        <td><button class="btn-sm btn-success fas fa-edit">  Edit</button> <button class="btn-sm btn-danger fas fa-trash">  Delete</button><br></td>
                                    </tr>
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