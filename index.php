<?php
require_once ('config.php');
require_once (CONTROLLER.'/UserController.php');
if(isset($_SESSION['id'])){
?>
    <?php include (MODULES.'/_header.php');?>
    <body class="skin-blue">
    <div class="backgroundalerts"></div>
    <!-- header logo: style can be found in header.less -->
    <header class="header">
        <a href="#" class="logo">
            <!-- Add the class icon to your logo image or logo icon to add the margining -->
            REST_CMS
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="glyphicon glyphicon-user"></i>
                            <span>ოპერატორი <i class="caret"></i></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="?p=profile" class="btn btn-default btn-flat">პროფილი</a>
                                </div>
                                <div class="pull-right">
                                    <a href="logout.php" class="btn btn-default btn-flat">გამოსვლა</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas">
            <!-- sidebar: style can be found in sidebar.less -->
                <?php include(MODULES.'/_leftmenu.php');?>
            <!-- /.sidebar -->
        </aside>

        <!-- Right side column. Contains the navbar and content of the page -->
        <?php
            if(isset($p)){
                if(file_exists(PAGES.'/'.$p.'.php')){
                    include(PAGES.'/'.$p.'.php');
                }else{
                    include(PAGES.'dashboard.php');
                }
            }else{
                include(PAGES.'/dashboard.php');
            }
        ?>
        <!-- /.right-side -->
    </div><!-- ./wrapper -->
    <!-- add new calendar event modal -->
    <?php include (MODULES.'/_footer.php');?>

    </body>
    </html>
<?php }else{ include('login.php'); }