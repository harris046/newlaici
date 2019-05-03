<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>LaiCi E-Learning</title>
  <link rel="stylesheet" href="../scss/style.css">
  <link rel="icon" type="image/png"  href="../images/favicon.png">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

  <script type="text/javascript" src="../js/main.js"></script>
</head>
<body>
  <section class="container">

    <div class="login">
      <h1>Student</h1>
       <form class="form" onsubmit="signUp(); return false;" id="signUpForm">
    <input type="text"name="fname"  id="form" placeholder="First Name" required/>
    <input type="text" name="mname" id="form" placeholder="Middle Name" required/>
    <input type="text" name="lname" id="form" placeholder="Last Name" required/>
    <label>Date of birth</label><br>
    <input type="date" name="dob" id="form" required style="width:280px;">
    <select name="gender" id="form" style="width:300px;">
      <option>Gender</option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select>
    <select name="course" id="form" style="width:300px;">
      <option>Course</option> 
      <option value="BSIT">BSIT</option>
      <option value="BSCS">BSCS</option>
    </select>
     <select name="yrlvl" id="form" style="width:300px;">
      <option>Year Level</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
    </select>
    <input type="text" id="form" name="username" placeholder="Email" required>
    <input type="password" id="form" name="password" placeholder="Password" required>
    <input type="submit" value="Signup" />
  </form><br>

    </div>

    <div class="login-help">
      <p>Already a member? <a href="../index.php">Login here!</a>.</p>
    </div>

  </section>

  <!-- firebase -->
    <!-- Firebase App is always required and must be first -->
    <script src="https://www.gstatic.com/firebasejs/5.9.0/firebase-app.js"></script>

    <!-- Add additional services that you want to use -->
    <script src="https://www.gstatic.com/firebasejs/5.9.0/firebase-auth.js"></script>
    <script>
      // Initialize Firebase
      var config = {
        apiKey: "AIzaSyA6L9gG1oXm8tgawzfMf9BSCz99mJZ0HsA",
        authDomain: "laiciris-3037e.firebaseapp.com",
        databaseURL: "https://laiciris-3037e.firebaseio.com",
        projectId: "laiciris-3037e",
        storageBucket: "laiciris-3037e.appspot.com",
        messagingSenderId: "1081023603889"
      };
      firebase.initializeApp(config);
    </script>

</body>
</html>
