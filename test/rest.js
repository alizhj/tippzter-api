function UserAction() {
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "http://tippzter-api.herokuapp.com/user/read.php");
     //xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send();
    //var response = JSON.parse(xhttp.status);
    console.log(xhttp.status);
}