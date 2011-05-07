<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<meta name="description" content="3T Flower shop - Bring you a blossom season" />
		<meta name="keywords" content="3T, flower shop, flower, blossom season" />
		<meta name="author" content="Tran Trung Tin, Lu Nguyen Phuc Thinh, Le Chi Thien" />
		<meta name="googlebot" content="noarchive, nofollow, noindex, nosnippet"/>
		<meta name="robots" content="NONE"/>
		<title>3TFS - Mastertemplate</title>
		<link rel="stylesheet" type="text/css" href="masterstyles.css" media="all" />

		<script type="text/javascript" src="scripts/scripts.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>
		<script type="text/javascript" src="scripts/jquery.equalheights.js"></script>
		<script type="text/javascript"></script>
	</head>
	<body>
		<!-- PAGE SECTION -->
		<div id="pagesection">

			<!-- TOP PAGE SECTION -->
			<div id="top">

			</div>
			<!-- BANNER SECTION -->
			<div id="banner">
				<?php	/*include("banner.php");*/?>
				<!-- ACCOUNTS SECTION -->
				<div class="menu" id="accounts">
					<?php	include ('accounts.php');?>
				</div>
				<!-- SEARCH SECTION -->
				<div id="search">
					<?php	include ('search.php');?>
				</div>
			</div>
			<!-- MAIN SECTION -->
			<div id="main">
				<!-- HORIZONTAL NAVIGATION SECTION -->
				<div class="menu" id="horizontalnav">
					<?php	include ('horizontalnav.php');?>
				</div>
				<!-- CONTENT SECTION -->
				<!-- <div id="contentsection"> -->
				<!-- THREE COLUMN AT EQUAL HEIGHT SECTION -->
				<div id="rightlayout">
					<div id="mainlayout">
						<div id="leftlayout">

							<!-- LEFT SIDEBAR SECTION -->
							<div class="column" id="lsidebar">
								<div class="menu" id="verticalmenu">
									<?php	include ("menu.php");?>
								</div>
							</div>
							<!-- CONTENT SECTION -->
							<div class="column" id="content">
							
							<div id="login">
							    <?php
							    //ob_start();
							    //session_start();
							
							    require_once ("functions.php");
							
							    $returnurl = urlencode(isset($_GET["returnurl"]) ? $_GET["returnurl"] : "");
							    if ($returnurl == "")
							        $returnurl = urlencode(isset($_POST["returnurl"]) ? $_POST["returnurl"] : "");
							
							    $do = isset($_GET["do"]) ? $_GET["do"] : "";
							
							    $do = strtolower($do);
							
							    switch ($do) {
							        case "":
							            echo "Case mothing!\n";
							            if (checkLoggedin()) {
							                echo "<H1>You are already logged in - <A href = \"login.php?do=logout\">logout</A></h1>";
							            } else {
							    ?> 
							
							                <form name="login" action="login.php?do=login" method="post" onsubmit="return aValidator();">
							                    <input TYPE="hidden" name="returnurl" value="<?php echo $returnurl; ?>"> 
							                    <div class="section" id="loginform">
							                        <ul>
							                            <li><label for="username">Username</label>
							                                <input type="text" name="username" id="username" value="<?php if (!empty($username)) echo $username; ?>"/>
							                            </li>
							
							                            <li><label for="password">Password</label>
							                                <input type="password" name="password" id="password" value=""/>
							                            </li>
							                        </ul>
							                    </div>
							
							                    <input type="submit" value="Submit" name="submit"/>
							                    <input type="reset" value="Clear" name="clear"/>
							
							                    <br />
							                    <a href="lostpassword.php">Forgot your password?</a>
							                    <br />
							                    <a href="signup.php">Register?</a>
							                </form>
							
							    <?php
							        }
							        break;
							    case "login":
							        echo "Case login!n";
							        $username = isset($_POST["username"]) ? $_POST["username"] : "";
							        $password = isset($_POST["password"]) ? $_POST["password"] : "";
							
							        if ($username == "" or $password == "") {
							            echo "<h1>Username or password is blank</h1>";
							            clearsessionscookies();
							            header("location: login.php?returnurl=$returnurl");
							        } else {
							            //if(confirmuser($username,md5($password))) // As pointed out by asgard2005
							            if (confirmuser($username, $password)) { // As pointed out by asgard2005
							                createsessions($username, $password);
							                if ($returnurl <> "")
							                    header("location: $returnurl");
							                else {
							                    header("Location: index.php");
							                }
							            } else {
							                echo "<h1>Invalid Username and/Or password</h1>";
							                clearsessionscookies();
							                header("location: login.php?returnurl=$returnurl");
							            }
							        }
							        break;
							    case "logout":
							        echo "Case logout!n";
							        clearsessionscookies();
							        header("location: index.php");
							        break;
							}
							?>
							</div>
							</div>
							<!-- RIGHT SIDEBAR SECTION -->
							<div id="rsidebar">

								<!-- ADVERTISEMENT SECTION -->
								<div id="ads">
									<p>
										Advertisment section
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- </div> -->

				<!-- CLEARER SECTION -->
				<div id="clearer">
				</div>
				<!-- FOOTER SECTION -->
				<div id="footer">
					<?php include ('footer.php'); ?>
				</div>
			</div>
		</div>
	</body>
</html>