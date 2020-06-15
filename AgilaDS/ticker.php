<!-- Styles -->	
<style style="text/css">
.example1 {
 height: 100%;	
 overflow: hidden;
 position: relative;
}
.example1 h3 {
 font-size: 3em;
 color: black;
 /*position: absolute;
 width: 100%;
 height: 100%;*/
 margin: 0;
 line-height: 50px;
 text-align: center;
 /* Starting position */
 -moz-transform:translateX(100%);
 -webkit-transform:translateX(100%);	
 transform:translateX(100%);
 /* Apply animation to this element */	
 -moz-animation: example1 30s linear infinite;
 -webkit-animation: example1 15s linear infinite;
 animation: example1 15s linear infinite;
 
 
 
 display: flex;
    padding-bottom: 3px;
    height: 300px;
	margin-left:300px;
	
}
/* Move it (define the animation) */
@-moz-keyframes example1 {
 0%   { -moz-transform: translateX(100%); }
 100% { -moz-transform: translateX(-100%); }
}
@-webkit-keyframes example1 {
 0%   { -webkit-transform: translateX(80%); }
 100% { -webkit-transform: translateX(-100%); }
}
@keyframes example1 {
 0%   { 
 -moz-transform: translateX(100%); /* Firefox bug fix */
 -webkit-transform: translateX(100%); /* Firefox bug fix */
 transform: translateX(100%); 		
 }
 100% { 
 -moz-transform: translateX(-100%); /* Firefox bug fix */
 -webkit-transform: translateX(-100%); /* Firefox bug fix */
 transform: translateX(-100%); 
 }
}
</style>




<div class="example1">
<h3>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rmi";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	}

		$sql = "SELECT * FROM crawlers";
		$result = mysqli_query($conn, $sql);

				if (mysqli_num_rows($result) > 0) {
					
					// output data of each row
					while($row = mysqli_fetch_assoc($result)) {
						
						?><img src="rmniEye.png" style="width:15%; ">
						<p style="margin-left: 100px; margin-right: 170px; margin-top: 100px;"><?php echo "&nbsp" . $row["crawler_message"]; ?>						
						</p><?php
						
												
					}
					
					?><img src="dailybullitin.jpg" style='width:150px ; height:50px; margin-right:10px' ;> <?php
						} else {
							echo "x";
							
							
							
				}

		mysqli_close($conn);



?>


</h3>
</div>

