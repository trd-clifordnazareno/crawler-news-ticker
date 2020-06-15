<script src="jquery-3.1.1.min.js"></script>




<?php
ini_set('max_execution_time', 900);

$connect = mysqli_connect("localhost", "root", "", "rmniled_db");

				
	 $condb = new mysqli("localhost", "root", "", "rmniled_db");	
         $check = $condb->query("select * from tbl_dsinfo");
         if($check->num_rows){
             while($check_row = $check->fetch_object()){
                 $ds_info = $check_row->LocationName;
             }
         }
				
				
				
   
                
         $query = "delete from crawlers";
                mysqli_query($connect, $query);       
                
                $handle_crawlers = fopen("file://D:/AgilaDS/db/$ds_info/crawlers/$ds_info-crawlers.csv", "r");
   while($data = fgetcsv($handle_crawlers))
   {
                                $item1 = mysqli_real_escape_string($connect, $data[0]);  
                                $item2 = mysqli_real_escape_string($connect, $data[1]);
				$item3 = mysqli_real_escape_string($connect, $data[2]);
				$item4 = mysqli_real_escape_string($connect, $data[3]);  
                                $item5 = mysqli_real_escape_string($connect, $data[4]);
				$item6 = mysqli_real_escape_string($connect, $data[5]);
                                $item7 = mysqli_real_escape_string($connect, $data[6]);
                $query = "INSERT into crawlers(crawler_id, location_id, crawler_message, start_date, end_date, playlist_id, crawler_type_id) values('$item1', '$item2', '$item3', '$item4', '$item5', '$item6', '$item7')";
                mysqli_query($connect, $query);
   }
   fclose($handle_crawlers); 
   $query = "delete from crawlers where location_id = 'location_id'";
                mysqli_query($connect, $query);
                
                
                
                
                $query = "delete from crawler_type";
                mysqli_query($connect, $query);       
                
                $handle_crawler_type = fopen("file://D:/AgilaDS/db/$ds_info/crawlers/$ds_info-crawler_type.csv", "r");
   while($data = fgetcsv($handle_crawler_type))
   {
                                $item1 = mysqli_real_escape_string($connect, $data[0]);  
                                $item2 = mysqli_real_escape_string($connect, $data[1]);
				$item3 = mysqli_real_escape_string($connect, $data[2]);
				$item4 = mysqli_real_escape_string($connect, $data[3]);  
                                
                $query = "INSERT into crawler_type(crawler_type_id, crawler_name, logo, indicate) values('$item1', '$item2', '$item3', '$item4')";
                mysqli_query($connect, $query);
   }
   fclose($handle_crawler_type); //AUTO IMPORT CRAWLER TYPE IN CSV
   $query = "delete from crawler_type where crawler_type_id = 'crawler_type_id'";
                mysqli_query($connect, $query);


?>










<body style="margin: 0px;overflow-x:hidden;">










    <div id="ref">

        <p>
        <div>

    <!--<div style="margin-bottom: -42px;font-size: 30px;font-style: normal;font-weight: bold;margin-left: 13px;font-family: fantasy;">01:00</div><div style="border: 0px;border-color: rgb(86, 158, 220);border-style: solid;border-left-width: 10px;height: 70px;" ><p style="margin-top: 17px; margin-left:1190px; font-family: Arial Black, Gadget, sans-serif; font-size: 30px; display: inline-flex;" id="myDIVs" class="ani">-->
            <div style="margin-bottom: -42px;font-size: 30px;font-style: normal;font-weight: bold;margin-left: 13px;font-family: fantasy;">01:00</div>
            <div style="border: 0px;border-color: rgb(86, 158, 220);border-style: solid;border-left-width: 10px;height: 70px;" >
                <p style="margin-top: 13px; margin-left:1900px; font-family: Arial Black, Gadget, sans-serif; font-size: 55px; display: inline-flex;" id="myDIVs" class="ani">
                    

<?php
                    $con = new mysqli("localhost", "root", "", "rmniled_db");
                    $get_loc_name = $con->query("select * from tbl_dsinfo");
                    if($get_loc_name->num_rows){
                        while($get_loc_name_row = $get_loc_name->fetch_object()){
                            $loc_name = $get_loc_name_row->LocationName;
                        }
                    }
                    $loc_id = $loc_name;

                    $get_max_cawler_type_id = $con->query("select max(crawler_type_id) as crawler_type_id from crawler_running where location_id = '$loc_id'");
                    if ($get_max_cawler_type_id->num_rows) {
                        while ($get_max_cawler_type_id_row = $get_max_cawler_type_id->fetch_object()) {
                            $get_crawler_type_id = $get_max_cawler_type_id_row->crawler_type_id;
                            break;
                        }
                        //date_default_timezone_set('Asia/Manila');
                        $time_now = date("Y-m-d H:i:s");


                        //////////////////////////////////
                        //$get_crawler_type_id_w_locs = $con->query("select * from crawlers where start_date between '$time_now' and '2018-10-10 10:10:10'" );
                        //if ($get_crawler_type_id_w_locs->num_rows) {
                        //while($get_crawler_type_id_w_locs_row = $get_crawler_type_id_w_locs->fetch_object()){
                        //}



                        $get_crawler_type_id_w_loc = $con->query("select * from crawlers where location_id = '$loc_id' and crawler_type_id = $get_crawler_type_id and start_date <= '$time_now' and end_date >= '$time_now'");
                        if ($get_crawler_type_id_w_loc->num_rows) {
                            $num = 0;
                            while ($get_crawler_type_id_w_loc_row = $get_crawler_type_id_w_loc->fetch_object()) {
                                $num = strlen($get_crawler_type_id_w_loc_row->crawler_message) + $num;
                                $image = $get_crawler_type_id_w_loc_row->crawler_type_id;
                                $date_i = strtotime($get_crawler_type_id_w_loc_row->start_date);
                                $date_y = strtotime($get_crawler_type_id_w_loc_row->end_date);

                                $newformat = date('Y-m-d H:i:s', $date_i);
                                $new_format = date('Y-m-d H:i:s', $date_y);
                                
                                
                                
                                //$newformat = date('Y-m-d ', $date_i);
                                //$new_format = date('Y-m-d', $date_y);
                                
                                
                                
                                //$new_time1 = date('H:i:s', $date_i);
                                //$new_time2 = date('H:i:s', $date_y);
                                        
                                        
$new_time3 = date('H:i:s');
                                if ($newformat <= $time_now and $new_format >= $time_now) {
                                    echo '<img src=/AgilaDS/rmniEye.png style="width: 60px;height: 60px;margin-left: 40px;margin-top: 5px;">' . $message = str_replace(" ", "&nbsp", "&nbsp&nbsp" . $get_crawler_type_id_w_loc_row->crawler_message);
                                    //break;
                                    $q = 1;
                                    $css = 1;
                                }
                            }
                            if ($image == 2) {
                                if (isset($q)) {
                                    $sel_logo = $con->query("select * from crawler_type where crawler_type_id = $image");
                                    while ($sel_logo_row = $sel_logo->fetch_object()) {
                                        $indicate = $sel_logo_row->indicate;
                                        $logo_data = $sel_logo_row->logo;
                                        break;
                                    }
                                    if ($logo_data != NULL) {
                                        echo '<img src=/AgilaDS/rmniEye.png style="width: 60px;height: 60px;margin-left: 40px;margin-top: 5px;">' . "&nbsp&nbsp$indicate&nbsp:" . "<img src=logo/$logo_data style='width: 130px;height: 50px; margin-left: 40px; margin-top: 13px;'>";
				$num = $num + 50;
                                    }
                                } else {
                                    //echo str_replace(" ", "&nbsp", "You are watching Richmedia Digital Signage From Richmedia Network Incorporated");
                                $x = 1;
                                    
                                }
                            } else if ($image == 1) {
                                if (isset($q)) {
                                    $sel_logo = $con->query("select * from crawler_type where crawler_type_id = $image");
                                    while ($sel_logo_row = $sel_logo->fetch_object()) {
                                        $indicate = $sel_logo_row->indicate;
                                        $logo_data = $sel_logo_row->logo;
                                        break;
                                    }
                                    if ($logo_data != NULL) {
                                        //$x = 1;
                                        echo '<img src=/AgilaDS/rmniEye.png style="width: 60px;height: 60px;margin-left: 40px;margin-top: 5px;">' . "&nbsp&nbsp$indicate&nbsp:" . "<img src=logo/$logo_data style='width: 130px;height: 50px; margin-left: 40px; margin-top: 13px;'>"/* . "&nbsp&nbsp&nbsp" . str_replace(" ", "&nbsp", "SOURCE: The Richmedia Team") */;
                                    }
                                } else {
                                    //echo str_replace(" ", "&nbsp", "Contact RICHMEDIA NETWORKS INCORPORATED @ (032)415 - 4907");
                                $x = 1;
                                    
                                }
                            } else if ($image == 3) {
                                if (isset($q)) {
                                    $sel_logo = $con->query("select * from crawler_type where crawler_type_id = $image");
                                    while ($sel_logo_row = $sel_logo->fetch_object()) {
                                        $indicate = $sel_logo_row->indicate;
                                        $logo_data = $sel_logo_row->logo;
                                        break;
                                    }
                                    if ($logo_data != NULL) {
                                        echo '<img src=/AgilaDS/rmniEye.png style="width: 60px;height: 60px;margin-left: 40px;margin-top: 5px;">' . "&nbsp&nbsp$indicate&nbsp:" . "<img src=logo/$logo_data style='width: 130px;height: 50px; margin-left: 40px; margin-top: 13px;'>";
                                    }
                                } else {
                                    //echo str_replace(" ", "&nbsp", "You are watching Richmedia Digital Signage From Richmedia Network Incorporated");
                                $x = 1;
                                    
                                }
                            } else if ($image == 4) {
                                if (isset($q)) {
                                    $sel_logo = $con->query("select * from crawler_type where crawler_type_id = $image");
                                    while ($sel_logo_row = $sel_logo->fetch_object()) {
                                        $indicate = $sel_logo_row->indicate;
                                        $logo_data = $sel_logo_row->logo;
                                        break;
                                    }
                                    if ($logo_data != NULL) {
                                        echo '<img src=/AgilaDS/rmniEye.png style="width: 60px;height: 60px;margin-left: 40px;margin-top: 5px;">' . "&nbsp&nbsp$indicate&nbsp:" . "<img src=logo/$logo_data style='width: 130px;height: 50px; margin-left: 40px; margin-top: 13px;'>";
                                    }
                                } else {
                                    //echo str_replace(" ", "&nbsp", "You are watching Richmedia Digital Signage From Richmedia Network Incorporated");
                                $x = 1;
                                    
                                }
                            } else if ($image == 5) {
                                if (isset($q)) {
                                    $sel_logo = $con->query("select * from crawler_type where crawler_type_id = $image");
                                    while ($sel_logo_row = $sel_logo->fetch_object()) {
                                        $indicate = $sel_logo_row->indicate;
                                        $logo_data = $sel_logo_row->logo;
                                        break;
                                    }
                                    if ($logo_data != NULL) {
                                        echo '<img src=/AgilaDS/rmniEye.png style="width: 60px;height: 60px;margin-left: 40px;margin-top: 5px;">' . "&nbsp&nbsp$indicate&nbsp:" . "<img src=logo/$logo_data style='width: 130px;height: 50px; margin-left: 40px; margin-top: 13px;'>";
                                    }
                                } else {
                                    //echo str_replace(" ", "&nbsp", "You are watching Richmedia Digital Signage From Richmedia Network Incorporated");
                                $x = 1;
                                    
                                }
                            } else if ($image == 6) {
                                if (isset($q)) {
                                    $sel_logo = $con->query("select * from crawler_type where crawler_type_id = $image");
                                    while ($sel_logo_row = $sel_logo->fetch_object()) {
                                        $indicate = $sel_logo_row->indicate;
                                        $logo_data = $sel_logo_row->logo;
                                        break;
                                    }
                                    if ($logo_data != NULL) {
                                        echo '<img src=/AgilaDS/rmniEye.png style="width: 60px;height: 60px;margin-left: 40px;margin-top: 5px;">' . "&nbsp&nbsp$indicate&nbsp:" . "<img src=logo/$logo_data style='width: 130px;height: 50px; margin-left: 40px; margin-top: 13px;'>";
                                    }
                                } else {
                                    //echo str_replace(" ", "&nbsp", "You are watching Richmedia Digital Signage From Richmedia Network Incorporated");
                                $x = 1;
                                    
                                }
                            } else if ($image == 7) {
                                if (isset($q)) {
                                    $sel_logo = $con->query("select * from crawler_type where crawler_type_id = $image");
                                    while ($sel_logo_row = $sel_logo->fetch_object()) {
                                        $indicate = $sel_logo_row->indicate;
                                        $logo_data = $sel_logo_row->logo;
                                        break;
                                    }
                                    if ($logo_data != NULL) {
                                        echo '<img src=/AgilaDS/rmniEye.png style="width: 60px;height: 60px;margin-left: 40px;margin-top: 5px;">' . "&nbsp&nbsp$indicate&nbsp:" . "<img src=logo/$logo_data style='width: 130px;height: 50px; margin-left: 40px; margin-top: 13px;'>";
$num = $num + 30;
                                    }
                                } else {
                                    //echo str_replace(" ", "&nbsp", "You are watching Richmedia Digital Signage From Richmedia Network Incorporated");
                                $x = 1;
                                    
                                }
                            }
                            $lens = $num;
                            $new_crawler_type_id = $get_crawler_type_id + 1;

                            $get_new_crawler_type_id = $con->query("select * from crawlers where location_id = '$loc_id' and crawler_type_id = $new_crawler_type_id");
                            if ($get_new_crawler_type_id->num_rows) {
                                $con->query("delete from crawler_running where crawler_type_id = $new_crawler_type_id and location_id = '$loc_id'");
                                $con->query("insert into crawler_running (crawler_type_id, location_id) values ($new_crawler_type_id, '$loc_id')");
                            } else {
                                //$con->query("delete from crawler_running where location_id = $loc_id");
                                $new_crawler_type_inc = $new_crawler_type_id;
                                $con->query("insert into crawler_running (crawler_type_id, location_id) values ($new_crawler_type_inc, '$loc_id')");
                            }
                        } else {
                            $range = $con->query("select * from crawlers where crawler_type_id >= $get_crawler_type_id");
                            if ($range->num_rows) {
                                $con->query("insert into crawler_running (crawler_type_id, location_id) values ($get_crawler_type_id + 1, '$loc_id')");
                                //header("location:http://localhost/AgilaDS/redir.php");
                                $x = 1;
                            } else {
                                $con->query("delete from crawler_running where location_id = '$loc_id'");
                                $con->query("insert into crawler_running (crawler_type_id, location_id) values (1, '$loc_id')");
                                $x = 1;
                                //header("location:http://localhost/AgilaDS/redir.php");
                                //if ($range->num_rows) {
                                // $con->query("insert into crawler_running (crawler_type_id, location_id) values ($get_crawler_type_id + 1, $loc_id)");
                                // header("location:http://localhost/AgilaDS/redir.php");
                                // } else {
                                //$con->query("delete from crawler_running where location_id = $loc_id");
                                //$con->query("insert into crawler_running (crawler_type_id, location_id) values (1, $loc_id)");
                                //header("location:http://localhost/AgilaDS/redir.php");
                                // }
                            }



                            //$con->query("delete from crawler_running where location_id = $loc_id");
                            //$con->query("insert into crawler_running (crawler_type_id, location_id) values (1, $loc_id)");
                            //header("location:http://localhost/AgilaDS/redir.php");
                        }
                        //}else{
                        //$lens = 0;
                        //}------------------>
                        //////////////////////////////////
                    } else {
                        $con->query("insert into crawler_running (crawler_type_id, location_id) values (1, '$loc_id')");
                        header("location:http://localhost/AgilaDS/c.php");
                    }
                    ?>

                </p></div>
        </div>
    </p>

    <div class="trapezoid1"><div id="time" style="margin-left: -3px; font-family: Arial Black, Gadget, sans-serif; color:white; padding-top: 10px; text-align: center;font-size: 35px;"></div></div>
    <div class="trapezoid1s"></div>


<!--<p style="color: transparent;">czxcczxczx</p>-->
    <div style="
         margin-top: -190px;
         position: relative;
         margin-bottom: -42px;
         font-size: 30px;
         font-style: normal;
         font-weight: 500;
         margin-left: 26px;
         font-family: sans-serif;
         color: white;
         ">



        <!--<div id="time" style="margin-left: -10px; font-family: Arial Black, Gadget, sans-serif"></div>-->
    </div>
    <?php if(isset($css)){
        $col = "gold";
    }else{
        $col = "transparent";
    }   ?>
    <div     style="margin-top: 165px;
             position: sticky;
             margin-left: 10px;
             font-size: 20px;
             color: <?php echo $col;   ?>;
             font-family: Arial, Helvetica, sans-serif;
             /*margin-right: 1210px;*/
             width: 187px;
             display: inline-block;
             " dir="rtl">




        <?php
                            error_reporting(0);
        $con = new mysqli("localhost", "root", "", "rmniled_db");
        $get_loc_name = $con->query("select * from tbl_dsinfo");
                    if($get_loc_name->num_rows){
                        while($get_loc_name_row = $get_loc_name->fetch_object()){
                            $loc_name = $get_loc_name_row->LocationName;
                        }
                    }
        $loc_id = $loc_name;

        $get_max_cawler_type_id = $con->query("select max(crawler_type_id) as crawler_type_id from crawler_running where location_id = '$loc_id'");
        if ($get_max_cawler_type_id->num_rows) {
            while ($get_max_cawler_type_id_row = $get_max_cawler_type_id->fetch_object()) {
                $get_crawler_type_ids = $get_max_cawler_type_id_row->crawler_type_id;
                //break;
            }
            /* if ($get_crawler_type_ids == 1) {
              $max_id = $con->query("select max(crawler_type_id) as max_id from crawlers where location_id = $loc_id");
              if ($max_id->num_rows) {
              while ($max_id_row = $max_id->fetch_object()) {
              $get_crawler_type_id = $max_id_row->max_id;
              //break;
              }
              }
              } */
            if ($get_crawler_type_ids > 1) {
                $get_crawler_type_id = $get_crawler_type_ids - 1;
            }
            $crawler_type_id_data = $con->query("select * from crawler_type where crawler_type_id = $get_crawler_type_id");
            if ($crawler_type_id_data->num_rows) {
                while ($crawler_type_id_data_row = $crawler_type_id_data->fetch_object()) {
                    $crawler_color_type = $crawler_type_id_data_row->crawler_name;
                    echo strtoupper($crawler_type_id_data_row->crawler_name);
                }
            }
        }
        ?>




    </div>

</div>
<!--<div     style="margin-top: 45px;
         position: sticky;
         margin-left: 180px;
         font-size: 20px;
         color: transparent;">right</div>-->


<div><img src="https://s3-ap-southeast-1.amazonaws.com/jobayan/upload/02eaf03b418c4557f91ec0904b96a099.JPG" style="margin-top: -90px;
     /*margin-left: 100px; */
    height: 70px;
    width: 200px;"></div>

<!--<div id="div1"></div>-->


<?php
if ($lens <= 20) {
    $laps_time = $lens * 1;
} else if ($lens <= 30) {
    $laps_time = ($lens / 15) * 15;
} else if ($lens <= 40) {
    $laps_time = $lens - 10;
} else if ($lens <= 50) {
    $laps_time = $lens - 15;
} else {
    $laps_time = ($lens / 5) * 2;
}
?>


<style>
    .ani {
        font-size: 30px;
        display:inline-block;
        width: 700px;
        height: 10px;
        background-color: none;
        position: relative;
        -webkit-animation-name: example; /* Safari 4.0 - 8.0 */
        /*-webkit-animation-duration: 20s; /* Safari 4.0 - 8.0 */
        animation-name: example;
        /*animation-duration:20s;*/
        /* if gamiton ang original nga webkit animation duration mu pause sya after first of second loop*/
        -webkit-animation: example 40s normal; /* Safari 4.0 - 8.0 */
        animation: example <?php echo $laps_time; ?>s normal;
    }
    /* Safari 4.0 - 8.0 */
    #myDIVs {-webkit-animation-timing-function: linear;}


    /* Standard syntax */
    #myDIVs {animation-timing-function: linear;}
    /* Safari 4.0 - 8.0 */
    @-webkit-keyframes example {
        /*0%   {background-color:none; right:0px; top:0px;}
        100%  {background-color:none; right:2000px; top:0px;}*/
        from {left: 0px;}
        to {left: -<?php echo ($lens * 32) + 2300; ?>px;}
    }

    /* Standard syntax */

</style>





<style>


    .trapezoids {
        border-bottom: 40px solid red;
        border-left: 0px solid transparent;
        border-right: 50px solid transparent;
        height: 0;
        width: 135px;
        margin-top: -50px;
        position: relative;
    }
</style>













<?php
if (isset($crawler_color_type)) {
    if ($crawler_color_type == "Breaking News") {
        $col_data = "#d12727";
    } else {
        $col_data = "#2d852e";
    }
}
?>





<?php
if (isset($x)) {
    ?>  <script>window.location = "http://localhost/AgilaDS/unavailable.php";

        //$(document).ready(function () {
        //$("#ref").load("http://localhost/AgilaDS/unavailable.php");
        //});


    </script>    <?php
} else {
    //echo "x";
}
?>



<?php

//$file_to_delete = 'D:\AgilaDS\db\AlphaTest\logs\playlog.csv';
            //unlink($file_to_delete);


$txtdata = "D:\AgilaDS\db" ."\\" . $ds_info ."\logs\playlogs.csv";
$myfile = fopen("del_report.bat", "w") or die("Unable to open file!");
$txt = "del $txtdata";
fwrite($myfile, $txt);
fclose($myfile);

$txtbin = "select DSLocationCode, DSClientCode, DSMaterial, Timestamp from tbl_playlogs into outfile 'D:/AgilaDS/db/$ds_info/logs/playlogs.csv';";
$write_bin = fopen("D:/wamp/mysql/bin/gen_csv.sql", "w") or die("Unable to open file!");
$bin = $txtbin;
fwrite($write_bin, $bin);
fclose($write_bin);

$myfile = fopen("d:/AgilaDS/db/$ds_info/logs/logs.txt", "r");
$data = fgets($myfile);
fclose($myfile);

$writedata = "$ds_info" . "-" . date("Y-m-d H:i:s") . "-----";
$open_data = fopen("d:/AgilaDS/db/$ds_info/logs/logs.txt" , "w");
fwrite($open_data, $writedata);
fwrite($open_data, $data);
fclose($open_data);


/*$loadmovie = "delete from tbl_movielist load data local infile 'd:/AgilaDS/db/$ds_info/playlist/$ds_info-playlist.csv' into table tbl_movielist fields  TERMINATED BY ',' ENCLOSED BY" . '"' . "ESCAPED BY '/'LINES TERMINATED BY '\r\n' delete from tbl_movielist where PlaylistNumber = 0;";
$loadmovie_bin = fopen("d:/wamp/mysql/bin/gen_csv.sql", "w") or die("Unable to open file!");
$data_bin = $loadmovie;
fwrite($loadmovie_bin, $data_bin);
fclose($loadmovie_bin);*/



exec('del_report.bat');
exec('d:\wamp\www\AgilaDS\image_finder.bat');
    //echo "Game server has been started";
exec('d:\AgilaDS\db\default\gen_csv.bat');
exec('import_csv.bat'); //AUTO IMPORT MOVIE IN CSV


?>



<style>
    .trapezoid1 {
        border-bottom: 85px solid rgb(34, 37, 155);
        border-left: 0px solid transparent;
        /* border-right: 50px solid transparent; */
        height: 0;
        width: 205px;
        margin-top: -80px;
        position: relative;
        border-top-right-radius: 30px;
        border-bottom-right-radius: 30px;
    }

    .trapezoid1s {
        border-bottom: 26px solid green;
        border-left: 0px solid transparent;
        /* border-right: 19px solid transparent; */
        height: 0;
        width: 205px;
        margin-top: -24px;
        position: relative;
        border-bottom-right-radius: 30px;
    }
</style>

<script>
    $(document).ready(function () {
        $("#myDIVs").one("animationend", function () {
            window.location = "http://localhost/AgilaDS/c.php";



        });
    });
</script>

<script>
    $(document).ready(function () {
        setInterval(function () {
            $("#time").load("http://localhost/AgilaDS/time_con.php");
        }, 0010);
    });

</script>
</body>



<!--<img src="http://localhost/crawler/breaker.png" style="-webkit-margin-after: -19px;width: 50px;height: 50px;margin-left: -10px;position: absolute;margin-top: 407px;">-->