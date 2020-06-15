<script src="jquery-3.1.1.min.js"></script>


















<body style="margin: 0px;overflow-x:hidden;">










    <div id="ref">

        <p>
        <div>

    <!--<div style="margin-bottom: -42px;font-size: 30px;font-style: normal;font-weight: bold;margin-left: 13px;font-family: fantasy;">01:00</div><div style="border: 0px;border-color: rgb(86, 158, 220);border-style: solid;border-left-width: 10px;height: 70px;" ><p style="margin-top: 17px; margin-left:1190px; font-family: Arial Black, Gadget, sans-serif; font-size: 30px; display: inline-flex;" id="myDIVs" class="ani">-->
            <div style="margin-bottom: -42px;font-size: 30px;font-style: normal;font-weight: bold;margin-left: 13px;font-family: fantasy;">01:00</div>
            <div style="border: 0px;border-color: rgb(86, 158, 220);border-style: solid;border-left-width: 10px;height: 70px;" >
                <p style="margin-top: 13px; margin-left:2000px; font-family: Arial Black, Gadget, sans-serif; font-size: 55px; display: inline-flex;" id="myDIVss" class="ani">

                    <?php echo str_replace(" ", "&nbsp", "You're Watching Richmedia Digital Signage"); ?>


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
    <div     style="margin-top: 165px;
             position: sticky;
             margin-left: 10px;
             font-size: 20px;
             color: gold;
             font-family: Arial, Helvetica, sans-serif;
             /*margin-right: 1210px;*/
             width: 187px;
             display: inline-block;
             " dir="rtl">




        



    </div>

</div>
<!--<div     style="margin-top: 45px;
         position: sticky;
         margin-left: 180px;
         font-size: 20px;
         color: transparent;">right</div>-->




<!--<div id="div1"></div>-->



<?php //echo $lens;  ?>

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
        animation: example 10s normal;
    }
    /* Safari 4.0 - 8.0 */
    #myDIVss {-webkit-animation-timing-function: linear;}


    /* Standard syntax */
    #myDIVss {animation-timing-function: linear;}
    /* Safari 4.0 - 8.0 */
    @-webkit-keyframes example {
        /*0%   {background-color:none; right:0px; top:0px;}
        100%  {background-color:none; right:2000px; top:0px;}*/
        from {left: 0px;}
        to {left: -2500px;}
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
        border-bottom: 26px solid #2d852e;
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
        $("#myDIVss").one("animationend", function () {
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
