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
      <form id="loginForm" onsubmit="signIn(); return false;">
        <p><input type="text" name="email" value="" placeholder="student"></p>
        <p><input type="password" name="password" value="" placeholder="*****"></p>
        <p class="submit"><a href="forgotpassword.php">Forgot password</a></p>
        <p class="submit"><input type="submit" name="commit" value="Login"></p>
      </form>
    </div>

    <div class="login-help">
      <p>Not a Member? <a href="signup.php">Register here!</a>.</p>
    </div>
    <div class="login-help">
      <p>Back to main page <a href="../index.php">Back</a>.</p>
    </div>
   
  </section>

</body>
<!-- firebase -->
  <!-- Firebase App is always required and must be first -->
  <script src="https://www.gstatic.com/firebasejs/5.9.0/firebase-app.js"></script>

  <!-- Add additional services that you want to use -->
  <script src="https://www.gstatic.com/firebasejs/5.9.0/firebase-auth.js"></script>
  <script>
    // Initialize Firebase
    var config = {
        apiKey: "AIzaSyDYf_Tw0tM2HhxAz8fc8Mle-21Xt7RlMC8",
        authDomain: "laicielearning.firebaseapp.com",
        databaseURL: "https://laicielearning.firebaseio.com",
        projectId: "laicielearning",
        storageBucket: "laicielearning.appspot.com",
        messagingSenderId: "973796751991"
    };
    firebase.initializeApp(config);
  </script>
</html>
