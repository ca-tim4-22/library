<?php
unlink(dirname(__FILE__) . "/../storage/framework/down");
?>

<!-- Title -->
<title>Redirect - Online Library</title>

<!-- Icon -->
<link rel="shortcut icon" href="img/library-favicon.ico" type="image/vnd.microsoft.icon" />

<!-- Meta -->
<x-meta></x-meta>

<link rel="stylesheet" href="custom-style/live_php.style.css">

<p>You will be redirected in <time><strong id="seconds">3</strong> seconds</time>...</p>

<link rel="stylesheet" href="custom-style/style.css">

<script type="text/javascript">
    var count = 5;
    var redirect = "http://127.0.0.1:8000";
     
    function countDown(){
        var timer = document.getElementById("timer");
        if(count > 0){
            count--;
            document.getElementById("seconds").innerHTML=count;
            setTimeout("countDown()", 1000);
        }else{
            window.location.href = redirect;
        }
    }
    </script>
     
    <span id="timer">
    <script type="text/javascript">countDown();</script>
    </span>

<?php 
die()
?>
