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
        <script type="text/javascript">

        </script>
    </head>
    <body>
        <!-- PAGE SECTION -->
        <div id="pagesection">

            <!-- TOP PAGE SECTION -->
            <div id="top">

            </div>
            <!-- BANNER SECTION -->
            <div id="banner">
                <?php /* include("banner.php"); */ ?>
                <!-- ACCOUNTS SECTION -->
                <div class="menu" id="accounts">
                    <?php include('accounts.php'); ?>

                </div>
                <!-- SEARCH SECTION -->
                <div id="search">
                    <?php include('search.php'); ?>

                </div>
            </div>

            <!-- MAIN SECTION -->
            <div id="main">
                <!-- HORIZONTAL NAVIGATION SECTION -->
                <div class="menu" id="horizontalnav"><?php include('horizontalnav.php'); ?></div>
                <!-- CONTENT SECTION -->
                <div id="contentsection">
                    <!-- THREE COLUMN AT EQUAL HEIGHT SECTION -->
                    <div id="rightlayout">
                        <div id="mainlayout">
                            <div id="leftlayout">

                                <!-- LEFT SIDEBAR SECTION -->
                                <div class="column" id="lsidebar">
                                    <div class="menu" id="verticalmenu"><?php include("menu.php"); ?></div>
                                </div>

                                <!-- CONTENT SECTION -->
                                <div class="column" id="content">
                                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                                        <div class="section" id="loginform">

                                            <label for="lostpassword">Your username or E-mail address:</label><input type="text" name="lostpassword" id="" />
                                        </div>

                                        <input type="submit" value="Send" title="Send" name="submit" onclick=""/>

                                    </form>

                                </div>

                                <!-- RIGHT SIDEBAR SECTION -->
                                <div id="rsidebar">

                                    <!-- ADVERTISEMENT SECTION -->
                                    <div id="ads">
                                        <p>Advertisment section</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CLEARER SECTION -->
                <div id="clearer"></div>

                <!-- FOOTER SECTION -->
                <div id="footer"><?php include('footer.php'); ?></div>

            </div>
        </div>
    </body>
</html>