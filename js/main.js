function getXHR() {
    var xmlhttp = null;
    if (window.XMLHttpRequest) {
      xmlhttp = new XMLHttpRequest();
    }
    else {
      xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }
    return xmlhttp;
}

function authListener(){
    firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
          // User is signed in.
          console.log("USER SIGNED IN! " + user.email);
        } else {
          // No user is signed in.
          console.log("NO USER");
        }
      });
}

function signUp(){
    console.log("signUp()");

    var form = document.getElementById("signUpForm");

    var fname = form.elements["fname"].value;
    var mname = form.elements["mname"].value;
    var lname = form.elements["lname"].value;
    var dob = form.elements["dob"].value;
    var gender = form.elements["gender"].value;
    var course = form.elements["course"].value;
    var yrlvl = form.elements["yrlvl"].value;
    var email = form.elements["username"].value;
    var password = form.elements["password"].value;

    firebase.auth().createUserWithEmailAndPassword(email, password)
    .then(function(){
        console.log("success");
        console.log("to signup-functions...");

        var xhr = getXHR();
        xhr.onreadystatechange = function (){
            if (xhr.readyState == 4){
                if (xhr.status == 200){
                    var arr = JSON.parse(this.responseText);
                    console.log(arr);

                    if(arr.success == "success"){
                        alert("Successfully Registered");
                        window.location.href = "../student/index.php";
                    }
                }
                xhr = null;
            }
        }
        xhr.open('POST', '../functions/signup-functions.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        var data = 'fname=' + fname + '&mname=' + mname + '&lname=' + lname + '&dob=' + dob + '&gender=' + gender 
                    + '&course=' + course + '&yrlvl=' + yrlvl + '&email=' + email + '&password=' + password;
        xhr.send(data);
    })
    .catch(function(error) {
        // Handle Errors here.
        var errorCode = error.code;
        var errorMessage = error.message;
        // ...
    });
}

function signIn(){
    console.log("signIn()");

    var form = document.getElementById("loginForm");
    var email = form.elements["email"].value;
    var password = form.elements["password"].value;

    // console.log("email => " + email);
    // console.log("password => " + password);

    firebase.auth().signInWithEmailAndPassword(email, password)
    .then(function(){
        console.log("sign in success kk");
        if(email == "lect@lect.com"){
            window.location.replace("lectpage.php");
        }
        else {
            window.location.replace("studentpage.php");
        }
    })
    .catch(function(error) {
        // Handle Errors here.
        var errorCode = error.code;
        var errorMessage = error.message;
        // ...
        console.log("ERROR => "+ error);
    });

    
}

function signOut(){
    console.log("signOut()");

    firebase.auth().signOut()
    .then(function() {
        // Sign-out successful.
        console.log("signed out!");
    })
    .catch(function(error) {
    // An error happened.
    });
}