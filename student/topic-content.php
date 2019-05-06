<?php
  session_start();
  if (isset($_SESSION['username'])&&$_SESSION['username']!=""){
  }
  else
  {
    header("Location:../index.php");
  }
$username=$_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="free-educational-responsive-web-template-webEdu">
	<meta name="author" content="webThemez.com">
	<title>LaiCi E-Learning</title>
	 <link rel="icon" type="image/png"  href="../images/favicon.png">
	<link rel="stylesheet" media="screen" href="../http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css"> 
	<link rel="stylesheet" href="../css/bootstrap-theme.css" media="screen"> 
	<link rel="stylesheet" href="../css/style.css">
    <link rel='stylesheet' id='camera-css'  href='../css/camera.css' type='text/css' media='all'> 
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="../js/html5shiv.js"></script>
	<script src="../js/respond.min.js"></script>
	<![endif]-->
	<script>
//This script is to disable copy and paste.
  function disableCopy(e){
    return false
  }
   
  function reEnable(){
    return true
  }
   
  document.onselectstart=new Function ("return false")
  if (window.sidebar){
    document.onmousedown=disableCopy
    document.onclick=reEnable
	}
	
	//var
	var username = '<?= $username ?>';

</script>

<!-- ChatCamp -->
<script src="../vendors/ChatCamp/ChatCamp.min.js"></script>
<script type="text/javascript" src="../js/chat.js"></script>

</head>
<body ondragstart="return false" onselectstart="return false" oncontextmenu="return false">
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
				<a class="navbar-brand" href="home.php">
					<img src="../images/logo.png" alt="Techro HTML5 template"></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right mainNav">
					<li class=""><a href="home.php">Home</a></li>
  					<li class=""><a href="new-course.php">New Course</a></li>
					<li class="dropdown">
						<a href="../#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $username;?> <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="user-details.php">Profile</a></li>
							<li><a href="../functions/user_logout.php">Logout</a></li>
						</ul>
					</li>
					

				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	<!-- /.navbar -->
	<!-- /.navbar -->

	<header id="head" class="secondary">
            <div class="container">
                    <h1>Topics</h1>
                    <p>Welcome!</p>
                </div>
    </header>


<div class="container">


</div>
	<div id="courses">
		<section class="container">
			<h3>Topic Content</h3>
			<div class="row">
				<div class="col-md-8">
					<div class="featured-box"> 
					 			
			<?php
        require_once "../functions/connect.php";
       

        $sql = mysqli_query($conn, "SELECT * FROM `tbl_topic`  WHERE `topic_Id`=".$_GET["topic_Id"]);
        if(mysqli_num_rows($sql)==0)
        {
        echo "<p class='alert alert-danger'>"."No Post have been found"."</p>";
        }
        else                            
        {
        while($row=mysqli_fetch_array($sql, MYSQLI_ASSOC)){   
        $id = $row['topic_Id'];
        $title = $row['title'];
        // $category = $row['cat_Id'];
        $content = $row['content'];
        $datetime = $row['datetime_posted'];

     
        ?>
   
        <p>Topic Title: <?php echo $title;?></p>
        <p>Subject: <?php $sel = mysqli_query($conn, "SELECT * from tbl_category WHERE `cat_Id`=".$_GET["cat_Id"]);
													if($sel==true){
														while($row=mysqli_fetch_assoc($sel)){
															extract($row);
															echo '<span value='.$cat_Id.'>'.$name.'</span>';
														}
													}?></p>
        <p>Date and Time: <?php echo $datetime;?></p>
        <p>Content: <br><?php echo "<div align=center><video width='400' height='400' controls><source src='../teacher/video/$content' type='video/mp4'>Your browser does
not support the video tag.</video></div>"?></p>
        <hr>


  <?php
}
}
  ?>
       	 				</div>
					</div>
								<div class="col-md-4 pull-right" style="padding-top:50px; padding-right:100px; padding-bottom:50px; padding-left:80px;">
									<div class="featured-box" > 
										<a href="quiz/index.php" class="pull-right btn btn-primary">Practice</a>
									</div>
								</div>	

								<!-- Live Chat div -->
								<div class="col-md-4 pull-right">
									<div class="cc-live-discussion-app" data-channel-id="5ccd3a6061544d0001193929" data-channel-type="open" data-height="500px" data-width="100%"></div>
								</div>
				</div>
				
									</div>										

		</section>
	</div>
  
		
	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="../js/modernizr-latest.js"></script> 
	<script type='text/javascript' src='../js/jquery.min.js'></script>
    <script type='text/javascript' src='../js/fancybox/jquery.fancybox.pack.js'></script>
    
    <script type='text/javascript' src='../js/jquery.mobile.customized.min.js'></script>
    <script type='text/javascript' src='../js/jquery.easing.1.3.js'></script> 
    <script type='text/javascript' src='../js/camera.min.js'></script> 
    <script src="../js/bootstrap.min.js"></script> 
	<script src="../js/custom.js"></script>
    <script>
		jQuery(function(){
			
			jQuery('#camera_wrap_4').camera({
                transPeriod: 500,
                time: 3000,
				height: '600',
				loader: 'false',
				pagination: true,
				thumbnails: false,
				hover: false,
                playPause: false,
                navigation: false,
				opacityOnGrid: false,
				imagePath: 'images/'
			});

		});
      
	</script>

<!-- ChatCamp UI -->
<script src="https://cdn.chatcamp.io/2.x/js/chatcamp-ui.min.js"></script>
<script>
	// Initialize ChatCamp
	window.ChatCampUi.init({
		appId: "6530329265836126208", 
		user: {
			id: username,
			displayName: username // optional
			// avatarUrl: USER_AVATAR_URL // optional
			// accessToken: USER_ACCESS_TOKEN // optional
		}, 
		ui: {
			theme: {
				primaryBackground: "#3f45ad",
				primaryText: "#ffffff",
				secondaryBackground: "#ffffff",
				secondaryText: "#000000",
				tertiaryBackground: "#f4f7f9",
				tertiaryText: "#263238"
			},
			roster: {
				tabs: ['recent', 'rooms', 'users'], 
				render: false, 
				defaultMode: 'open', // other possible values are minimize, hidden
				showUserAvatarUpload: false,
				showStartNewChat: true
			},
			channel: {
				showAttachFile: true,
				showVideoCall: true,
				showVoiceRecording: true
			}
		}
	})
</script>
    
</body>
</html>
