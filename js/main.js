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
                    var arr = JSON.parse(xhr.responseText);
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
        console.log("sign in success");
        console.log("to user_login...");

        var xhr = getXHR();
        xhr.onreadystatechange = function (){
            if (xhr.readyState == 4){
                if (xhr.status == 200){
                    var arr = JSON.parse(this.responseText);
                    console.log(arr);

                    if(arr.success == "success"){
                        window.location.href = "home.php";
                    }
                    else{
                        alert("Incorrect email or password!");
                        form.reset();
                    }
                }
                xhr = null;
            }
        }
        xhr.open('POST', '../functions/user_login.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        var data = 'email=' + email ;
        xhr.send(data);

        // window.location.href = "home.php";
    })
    .catch(function(error) {
        // Handle Errors here.
        var errorCode = error.code;
        var errorMessage = error.message;
        // ...
        console.log("ERROR => "+ error);

        alert("Incorrect email or password!");
        form.reset();
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

function forgotPass(){
    var form = document.getElementById("forgotPassForm");

    var email = form.elements["email"].value;

    var auth = firebase.auth();
    // var emailAddress = "user@example.com";

    auth.sendPasswordResetEmail(email).then(function() {
        // Email sent.
        console.log("Email sent");

        alert("Reset password email sent! Please follow instructions in the email.");

        window.location.href = "index.php";

    }).catch(function(error) {
        // An error happened.
        console.log("Error => " + error);
        alert("Please enter a valid email registered with our system.");
        form.reset();
    });
}

function enrollCourse(cat_Id, user_Id){
    var xhr = getXHR();

    xhr.onreadystatechange = function (){
        if (xhr.readyState == 4){
            if (xhr.status == 200){
                var arr = JSON.parse(this.responseText);

                if(arr.success == "success"){
                    alert("Successfully enrolled!");
                    var btn = document.getElementById(cat_Id);
                    btn.innerHTML = "";
                    btn.style.backgroundColor = "green";

                    var em = document.createElement("em");
                    em.className = "fa fa-check";
                    em.innerHTML = "&nbsp;&nbsp;&nbsp;Enrolled";

                    btn.appendChild(em);
                }
                else{
                    alert("Something went wrong.");
                }
            }
        }
    }
    xhr.open('GET', '../functions/enroll-course.php?user_Id=' + user_Id + '&cat_Id=' + cat_Id, true);
    xhr.send();
}