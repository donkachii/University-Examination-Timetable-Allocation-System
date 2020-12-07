<?php
//echo "hi";
set_time_limit(3000);
//echo "start";

$count=0;
$count1=0;
$inst_q="SELECT * FROM tbl_courses";
$inst_res=mysqli_query($conn,$inst_q);
while($row0=mysqli_fetch_array($inst_res))
{
    $dataset_size=$row0['id'];
}

//echo $dataset_size."dataset size<br>";
$POPULATION = array();
$POPULATE = array();
$POPULAR = array();
$venues=array();
$courses=array();
$lecturer=array();
$prop=array();
 //population of individuals
// $POPULATION_SIZE=200;
$POPULATION_SIZE = 2*$dataset_size;
//echo "<br>Population size: ".$POPULATION_SIZE."<br>dataset_size: ".$dataset_size;
// $DNA_SIZE = 12;
// $GEN_COUNT = 1;
// $TEST_COUNT = 0;
//echo count($POPULATION);
//echo "<br><pre>";
//print_r($POPULATION);
genInitPopulation();
//echo '<td>'.print_r($POPULATION).'</td>';
$check_if = array();
$check_for = array();
?>
<div class="card shadow">
    <div class="card-body">
        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
            <table class="table dataTable my-0" id="dataTable">
                <thead>
                    <tr>
                        <th>Day/Date</th>
                        <th>Morning Session <br> (8:00 - 11:00)</th>
                        <th>Afternoon Session <br> (11:00 - 1:00)</th>
                        <th>Evening Session <br> (3:00 - 6:00)</th>                                        
                    </tr>
                </thead>
                <tbody>
                    
                    <tr>
                        <td>Monday</td>
                        <?php 
                            $w=0;
                            foreach($POPULATION as $POP){
                                if($w>=3){
                                    break;
                                }else{
                                    $if = in_array($POP[0], $check_if);
                                    if($if == TRUE){
                                        //echo '<td>'.$POP[0].'</td>';
                                    }elseif($if == FALSE){
                                        echo '<td>'.$POP[0];
                                        $e=0;
                                            foreach($POPULATE as $P){
                                                if($e>=1){
                                                    break;
                                                }else{
                                                    $for = in_array($P[0], $check_for);
                                                    if($for == TRUE){
                                                       //echo ' ('.$P[0].')';
                                                    }elseif($for == FALSE){
                                                        echo ''.$P[0].'';
                                                        array_push($check_for, $P[0]);
                                                        $e++;
                                                    }
                                                }
                                            }
                                        echo'</td>';
                                        array_push($check_if, $POP[0]);
                                        $w++;
                                    }
                                }
                            }
                        ?>
                    </tr>
                    
                    <tr>
                        <td>Tuesday</td>
                        <?php 
                            $w=0;
                            foreach($POPULATION as $POP){
                                if($w>=3){
                                    break;
                                }else{
                                    $if = in_array($POP[0], $check_if);
                                    if($if == TRUE){
                                        //echo '<td>'.$POP[0].'</td>';
                                    }elseif($if == FALSE){
                                        echo '<td>'.$POP[0];
                                        $e=0;
                                            foreach($POPULATE as $P){
                                                if($e>=1){
                                                    break;
                                                }else{
                                                    $for = in_array($P[0], $check_for);
                                                    if($for == TRUE){
                                                       //echo ' ('.$P[0].')';
                                                    }elseif($for == FALSE){
                                                        echo ''.$P[0].'';
                                                        array_push($check_for, $P[0]);
                                                        $e++;
                                                    }
                                                }
                                            }
                                        echo'</td>';
                                        array_push($check_if, $POP[0]);
                                        $w++;
                                    }
                                }
                            }
                        ?>
                    </tr>

                    <tr>
                        <td>Wednesday</td>
                        <?php 
                            $w=0;
                            foreach($POPULATION as $POP){
                                if($w>=3){
                                    break;
                                }else{
                                    $if = in_array($POP[0], $check_if);
                                    if($if == TRUE){
                                        //echo '<td>'.$POP[0].'</td>';
                                    }elseif($if == FALSE){
                                        echo '<td>'.$POP[0];
                                        $e=0;
                                            foreach($POPULATE as $P){
                                                if($e>=1){
                                                    break;
                                                }else{
                                                    $for = in_array($P[0], $check_for);
                                                    if($for == TRUE){
                                                       //echo ' ('.$P[0].')';
                                                    }elseif($for == FALSE){
                                                        echo ''.$P[0].'';
                                                        array_push($check_for, $P[0]);
                                                        $e++;
                                                    }
                                                }
                                            }
                                        echo'</td>';
                                        array_push($check_if, $POP[0]);
                                        $w++;
                                    }
                                }
                            }
                        ?>
                    </tr>

                    <tr>
                        <td>Thursday</td>
                        <?php 
                            $w=0;
                            foreach($POPULATION as $POP){
                                if($w>=3){
                                    break;
                                }else{
                                    $if = in_array($POP[0], $check_if);
                                    if($if == TRUE){
                                        //echo '<td>'.$POP[0].'</td>';
                                    }elseif($if == FALSE){
                                        echo '<td>'.$POP[0];
                                        $e=0;
                                            foreach($POPULATE as $P){
                                                if($e>=1){
                                                    break;
                                                }else{
                                                    $for = in_array($P[0], $check_for);
                                                    if($for == TRUE){
                                                       //echo ' ('.$P[0].')';
                                                    }elseif($for == FALSE){
                                                        echo ''.$P[0].'';
                                                        array_push($check_for, $P[0]);
                                                        $e++;
                                                    }
                                                }
                                            }
                                        echo'</td>';
                                        array_push($check_if, $POP[0]);
                                        $w++;
                                    }
                                }
                            }
                        ?>
                    </tr>

                    <tr>
                        <td>Friday</td>
                        <?php 
                            $w=0;
                            foreach($POPULATION as $POP){
                                if($w>=3){
                                    break;
                                }else{
                                    $if = in_array($POP[0], $check_if);
                                    if($if == TRUE){
                                        //echo '<td>'.$POP[0].'</td>';
                                    }elseif($if == FALSE){
                                        echo '<td>'.$POP[0];
                                        $e=0;
                                            foreach($POPULATE as $P){
                                                if($e>=1){
                                                    break;
                                                }else{
                                                    $for = in_array($P[0], $check_for);
                                                    if($for == TRUE){
                                                       //echo ' ('.$P[0].')';
                                                    }elseif($for == FALSE){
                                                        echo ''.$P[0].'';
                                                        array_push($check_for, $P[0]);
                                                        $e++;
                                                    }
                                                }
                                            }
                                        echo'</td>';
                                        array_push($check_if, $POP[0]);
                                        $w++;
                                    }
                                }
                            }
                        ?>
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
<?php
//echo "</pre>";
ob_flush();
flush();
while (true) 
{
    naturalSelection();
    recreatePopulation();
    // //echo "ok";
    // echo "<br><pre>";
    // //print_r($POPULATION);
    // echo "</pre>";
    ob_flush();
    flush();
    //function to determine if the loop should stop... argument($POPULATION)
    if(check_pop($POPULATION))
    {

        // echo "----------------------------------------------------------------------------------------------- <br>";
        // echo "----------------------------------------------------------------------------------------------- <br>";
        // echo "----------------------------------------------------------------------------------------------- <br>";
        // echo "<br><pre>";
        // //print_r($POPULATION);
        // echo "</pre><br>";

        // echo "----------------------------------------------------------------------------------------------- <br>";
        // echo "----------------------------------------------------------------------------------------------- <br>";
        // echo "----------------------------------------------------------------------------------------------- <br>";
        exit();
    }
    //prop($prop_v, $prop_c);
}

//echo "<br> ok <br>";

// echo "<br><pre>";
// //print_r($venues);
// echo "</pre>";
// echo "<br><pre>";
// //print_r($courses);
// echo "</pre>";
/*ob_flush();
flush();*/
//========================== FUNCTIONS ============================

function check_pop($pop)
{
    $count=0;
    global $POPULATION_SIZE, $POPULATION, $POPULATE;
    //if(count($pop) == count(array_unique($pop)))
    if(count($pop))
    {
        for($i=0;$i<$POPULATION_SIZE;$i++)
        {
            if($POPULATION[$i][1]==0)
                $count++;
        }
        if($count==$POPULATION_SIZE)
            return true;
        else
            return false;
    }
    else
    {
        for($i=0;$i<$POPULATION_SIZE;$i++)
        {
            if($POPULATION[$i][1]==0)
                $count++;
        }
        if($count==$POPULATION_SIZE)
        {

        }
        else
            return false;
    }
}

function mutate($s) 
{
    $temp1=explode(",",$s);
    $sample = randomIndividual();
    $temp=explode(",",$sample);
    for ($i=0; $i<3; $i++) 
    {
        if (rand(0,1000) == 1000) 
        {
            //$temp1[$i] = $temp[$i];
        }
    }
    $mutated_child=implode(",", $temp1);
    return $mutated_child;
}

function reproduction($ia, $ib)
{
    $temp1=explode(",", $ia);
    $temp2=explode(",", $ib);
    $n=rand(1,2);
    if($n==1)
    {
      $random=rand(0,3);
      //$temp1[$random]=$temp2[$random];
    }
    else
    {
        random0:
        {
            $random1=rand(0,3);
            $random2=rand(0,3);
        }
    if($random1==$random2)
        goto random0;
    
    //$temp1[$random1]=$temp2[$random1];
    //$temp1[$random2]=$temp2[$random2];
    }
    $child=implode(",",$temp1);
    $child=mutate($child);
    global $DNA_SIZE;
    $crosspoint   = rand(0, $DNA_SIZE-1);
    $ia_before_cp = substr($ia, 0, $crosspoint);
    //$ia_after_cp  = substr($ia[0], $crosspoint);
    //$ib_before_cp = substr($ib[0], 0, $crosspoint);
    $ib_after_cp  = substr($ib, $crosspoint);
    $child = $ia_before_cp.$ib_after_cp;
    $child = mutate($child);
    return array($child, fitness($child));
}
function recreatePopulation()
{
    global $POPULATION, $POPULATION_SIZE;
    //echo '* Recreating population by reproducing randomly...'."\n";
    $c = count($POPULATION);
    for ($i=$c; $i<$POPULATION_SIZE; $i++) 
    {
        $a = rand(0, $c-1);
        $b = rand(0, $c-1);
       array_push($POPULATION, reproduction($POPULATION[$a][0], $POPULATION[$b][0]));
    }
}
function naturalSelection()
{
    global $POPULATION, $POPULATION_SIZE, $GEN_COUNT;
    //echo '* Natural selection...'."\n";
    usort($POPULATION, "cmp");
    array_splice($POPULATION, ceil($POPULATION_SIZE/2));
    //echo 'Best fit gen '.$GEN_COUNT.': '.$POPULATION[0][0].' ('.$POPULATION[0][1].')'."<br>";
    //echo 'Best fit gen : '.$POPULATION[0][0]."<br>";
    $count=count($POPULATION);
    /*if($POPULATION[$count-1]==0)
    {
        echo "<br><pre>";
        print_r($POPULATION);
        echo "</pre><br>";
        echo "----------------------------------------------------------------------------------------------- <br>";
        echo "----------------------------------------------------------------------------------------------- <br>";
        echo "----------------------------------------------------------------------------------------------- <br>";
        exit();
    }*/
}
function cmp($a, $b)
{
    if ($a[1] == $b[1]) return 0;
    return ($a[1] > $b[1]) ? -1 : 1;
}



//OK beyond this point


function genInitPopulation()
{
    global $POPULATION, $POPULATION_SIZE, $POPULATE;
    //echo '* Generating inital population...'."\n";
    $break=ceil($POPULATION_SIZE/4);
    /*for($i=0;$i<$break;$i++)
    {
        $individual1 = randomIndividual1();
        $fit1=fitness($individual1);
        array_push($POPULATION,array($individual1,$fit1));
    }*/
    for($j=0; $j<$POPULATION_SIZE; $j++) 
    {
        $individual = randomIndividual();
        $individual1 = randomIndividual1();
        $fit=fitness($individual);
        $fit1=fitness($individual1);
        array_push($POPULATION,array($individual,$fit));
        array_push($POPULATE,array($individual1,$fit1));
        //$POPULATION["venueid"]=array("tid"=>"lecturerid","departmentid"=>"departmentid","course"=>"courseid");
    }
}

function randomIndividual()
{
    global $venues,$courses,$count,$count1,$POPULATION,$conn;
    $individual = '';

    initial_array:
    {
        $venue_array=array();
        $lecturer_array=array();
        $course_array=array();
        $Department_array=array();
    }

    venue_selection:
    {
        $venue_q = "SELECT * FROM tbl_venues";
        $venue_res = mysqli_query($conn, $venue_q) or die("Venue error");
        $venue_array=array();
        while($row1=mysqli_fetch_array($venue_res))
            $venue_array[$row1['id']]=$row1['venue_code'];
        $venue_random_index=array_rand($venue_array);
    }

    lecturer_selection:
    {
        $lecturer_q="SELECT * FROM tbl_lecturer";
        $lecturer_res = mysqli_query($conn, $lecturer_q) or die("lecturer error");
        $lecturer_array=array();
        while($row2=mysqli_fetch_array($lecturer_res))
            $lecturer_array[$row2['id']]=$row2['title'].' '.$row2['fname'].' '.$row2['lname'];
        $lecturer_random_index=array_rand($lecturer_array);
    }

    course_selection:
    {
        $course_q="SELECT * FROM tbl_courses";
        $course_res = mysqli_query($conn, $course_q) or die("course error");
        $course_array=array();
        while($row3=mysqli_fetch_array($course_res))
            $course_array[$row3['id']]=$row3['code'];
        $course_random_index=array_rand($course_array);
    }

    department_selection:
    {
        $department_q="SELECT * FROM tbl_department";
        $department_res = mysqli_query($conn, $department_q) or die("department error");
        $Department_array=array();
        while($row4=mysqli_fetch_array($department_res))
            $Department_array[$row4['id']]=$row4['name'];
        $department_random_index=array_rand($Department_array);
    }

    //lecturer-venue constraint... population cannot have the same (venue,lecturer) pair twice
    if (array_key_exists($venue_array[$venue_random_index],$courses))
    {
        if($courses[$venue_array[$venue_random_index]] == $lecturer_random_index)
        {
            $count++;
            goto initial_array;
        }
    }
    else
    {
        $courses[$venue_array[$venue_random_index]]=$lecturer_random_index; 
    }

    //department-venue constraint... population cannot have the same (venue,department) pair twice
    if (array_key_exists($venue_array[$venue_random_index],$venues))
    {
        if($venues[$venue_array[$venue_random_index]] == $department_random_index)
        {
            
            goto initial_array;
        }
        
    }
    else
    {
        $venues[$venue_array[$venue_random_index]]=$department_random_index;
    }

    //individual in a population : comman seperated values of venue,lecturerid,courseid

    $individual.=$course_array[$course_random_index];
    // $POPULATION["venueid"]=array("tid"=>"lecturerid","departmentid"=>"departmentid","course"=>"courseid");
    
    return $individual;
}

function randomIndividual1()
{
    global $venues,$courses,$count,$count1,$POPULATION,$conn;
    $individual1 = '';

    initial_array:
    {
        $venue_array=array();
        $lecturer_array=array();
        $course_array=array();
        $Department_array=array();
    }

    venue_selection:
    {
        $venue_q = "SELECT * FROM tbl_venues";
        $venue_res = mysqli_query($conn, $venue_q) or die("Venue error");
        $venue_array=array();
        while($row1=mysqli_fetch_array($venue_res))
            $venue_array[$row1['id']]=$row1['venue_code'];
        $venue_random_index=array_rand($venue_array);
    }

    lecturer_selection:
    {
        $lecturer_q="SELECT * FROM tbl_lecturer";
        $lecturer_res = mysqli_query($conn, $lecturer_q) or die("lecturer error");
        $lecturer_array=array();
        while($row2=mysqli_fetch_array($lecturer_res))
            $lecturer_array[$row2['id']]=$row2['title'].' '.$row2['fname'].' '.$row2['lname'];
        $lecturer_random_index=array_rand($lecturer_array);
    }

    course_selection:
    {
        $course_q="SELECT * FROM tbl_courses";
        $course_res = mysqli_query($conn, $course_q) or die("course error");
        $course_array=array();
        while($row3=mysqli_fetch_array($course_res))
            $course_array[$row3['id']]=$row3['code'];
        $course_random_index=array_rand($course_array);
    }

    department_selection:
    {
        $department_q="SELECT * FROM tbl_department";
        $department_res = mysqli_query($conn, $department_q) or die("department error");
        $Department_array=array();
        while($row4=mysqli_fetch_array($department_res))
            $Department_array[$row4['id']]=$row4['name'];
        $department_random_index=array_rand($Department_array);
    }

    //lecturer-venue constraint... population cannot have the same (venue,lecturer) pair twice
    if (array_key_exists($venue_array[$venue_random_index],$courses))
    {
        if($courses[$venue_array[$venue_random_index]] == $lecturer_random_index)
        {
            $count++;
            goto initial_array;
        }
    }
    else
    {
        $courses[$venue_array[$venue_random_index]]=$lecturer_random_index; 
    }

    //department-venue constraint... population cannot have the same (venue,department) pair twice
    if (array_key_exists($venue_array[$venue_random_index],$venues))
    {
        if($venues[$venue_array[$venue_random_index]] == $department_random_index)
        {
            
            goto initial_array;
        }
        
    }
    else
    {
        $venues[$venue_array[$venue_random_index]]=$department_random_index;
    }

    //individual in a population : comman seperated values of venue,lecturerid,courseid

    $individual1.='('.$venue_array[$venue_random_index].') <br>'.$lecturer_array[$lecturer_random_index];
    // $POPULATION["venueid"]=array("tid"=>"lecturerid","departmentid"=>"departmentid","course"=>"courseid");
    
    return $individual1;
}

function fitness($individual)
{
    global $prop, $conn;
    $delta=0;
    $temp=explode(",", $individual);
    $res=$temp[0];

    $r = in_array($res, $prop);

    if($r == TRUE){
        $delta = $res;
    }elseif($r == FALSE){
        $delta = 'None';
        array_push($prop,$res);
    }else{
        array_push($prop,$res);
        $delta = 'None';
    }

    //return $delta;
}

// function prop($prop_v, $prop_c){
//     global $prop_v, $prop_c;
//     foreach ($prop_v as $pv) {
//         echo "<br>Venues:<br>";
//         print_r($pv);
//     }
//     foreach ($prop_c as $pc) {
//         echo "<br>Courses:<br>";
//         print_r($pc);
//     }
// }
//Try using cards... ASC timetable 
// advantage: No need to check if lecturer's load is fulfilled in final timetable, because cards are already made(contains lecturerid,courseid,departmentid), u have to just randomly select a venue



?>
