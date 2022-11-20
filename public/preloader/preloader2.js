var myVar;
function myFunction() {
    myVar = setTimeout(showPage, 150);
}
function showPage() {
    document.getElementById("loader2") && ((document.getElementById("loader2").style.display = "none"), (document.getElementById("myDiv2").style.display = "block"));
}
