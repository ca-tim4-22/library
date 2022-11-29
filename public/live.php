<?php 
// Program to display URL of current page.
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
$link = "https";
else $link = "http";

// Here append the common URL characters.
$link .= "://";

// Append the host(domain name, ip) to the URL.
$link .= $_SERVER['HTTP_HOST'];

// Append the requested resource location to the URL
$link .= $_SERVER['REQUEST_URI'];

if (str_contains($link, 'tim4')) {
    unlink("/home/tim4/aplikacija/storage/framework/down");
} else {
    unlink(dirname(__FILE__) . "/../storage/framework/down");
}
?>

<title>Redirekcija - Online biblioteka</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=0" />
<link rel="icon" type="image/x-icon" href="library-favicon.ico" />
<link rel="stylesheet" href="css/custom-style/live_php.style.css" />
<p>
    Redirekcija za <time><strong id="seconds"></strong></time>...
</p>
<link rel="stylesheet" href="css/custom-style/style.css" />

<script type="text/javascript">
    var count = 5;
    let URL = window.location.href;
    let result = URL.includes("tim4")
    if (result == true) {
        redirect = "https://tim4.ictcortex.me/"
    } else {
        redirect = "http://127.0.0.1:8000/"
    }
    function countDown() {
        var timer = document.getElementById("timer");
        if (count > 0) {
            count--;
            document.getElementById("seconds").innerHTML = count;
            setTimeout("countDown()", 1000);
        } else {
            window.location.href = redirect;
        }
    }
</script>
<span id="timer">
    <script type="text/javascript">
        countDown();
    </script>
</span>
<?php die() ?>
