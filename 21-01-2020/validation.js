var Name = [];
var Email = [];
var Password = [];
var City = [];
var State = [];


var admin_Data = function (name, Email, Password, city, state) {
    this.Name = name;
    this.Email = Email;
    this.City = city;
    this.Password = Password;
    this.State = state;
}

function validate_Login() {
    if (sessionStorage.admin == '') {
        sessionStorage.admin = 0;
    }
    if (sessionStorage.admin == 0) {

        var data = `<div id="login_container">
        <h1>Login</h1>
        <div id="login_data" >
        <input type="email" name="email" placeholder="Email" id="email"><br>
        <input type="password" placeholder="Password" id="password"><br>
        <input type="button" onclick="userlogin()" value="Login"><br>
        <br>OR<br>
        <input type="button" onclick="adminButton()" value="REGISTER NOW " id="adminButton">
        </div>
        </div>`
    } else {

        var data = `<div id="login_container">
        <h1>Login</h1>
        <div id="login_data" >
        <input type="email" name="email" placeholder="Email" id="email"><br>
        <input type="password" placeholder="Password" id="password"><br>
        <input type="button" onclick="userlogin()" value="Login"><br>
        </div>
        </div>`
    }

    document.getElementById("login_data").innerHTML = data;

}

function validate_Register() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var psw1 = document.getElementById("password1").value;
    var psw2 = document.getElementById("password2").value;
    var city = document.getElementById("city").value;
    var state = document.getElementById("state").value;
    if (name == '') {
        alert("please enter a name");

    }
    if (email == '') {
        alert("please enter a email id");

    }
    if (psw1 == '') {
        alert("please enter a password");

    }
    if (psw2 == '') {
        alert("please enter a confirm password");

    }
    if (psw1 !== psw2) {
        alert("please enter a same password in both");
    }
    if (city == '') {
        alert("please enter a city name");

    }
    if (state == '') {
        alert("please choose a state");
    }
    if (!document.getElementById('checkbox1').checked) {
        alert("please accept terms and condition");
    }
    if (validateName(name) == true && validEmail(email) == true && ValidPass(psw1) == true) {
        Name.push(name);
        Email.push(email);
        Password.push(psw1);
        City.push(city);
        State.push(state);  

        admin = new admin_Data(name, email, psw1, city, state);
        localStorage.setItem("admin", JSON.stringify(admin));
        sessionStorage.admin = 1;
        location.replace("dashboard.html")
        //localStorage.setItem("adminName", name);
        //alert("Data Registered SuccessFull!!!");
        //window.location.href = "dashboard.html";
    }
    function validateName(name) {
        if (/^[a-z,A-Z]{3,10}$/.test(name)) {
            return true;
        }
        else {
            alert("Enter Valid Name");
            return false;
        }
    }

    function validEmail(email) {
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
            return true;
        }
        else {
            alert("Enter Valid Email");
            return false;
        }
    }
    function ValidPass(pass) {
        //console.log("Function call"+pass);
        if (/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z]).{7,15}$/.test(pass)) {
            return true;
        }
        else {
            alert("Enter Strong Password.");
            return false;
        }
    }
    /*for(var i=0; i<Email.length; i++){
        if(email==Email[i]){
            alert("This email id is already exist");
        }
    }*/

    console.log("success");
}
