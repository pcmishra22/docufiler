<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Docufiler admin</title>
    <meta name="author" content="SuggeElson" />
    <meta name="description" content="Supr admin template - new premium responsive admin template. This template is designed to help you build the site administration without losing valuable time.Template contains all the important functions which must have one backend system.Build on great twitter boostrap framework" />
    <meta name="keywords" content="admin, admin template, admin theme, responsive, responsive admin, responsive admin template, responsive theme, themeforest, 960 grid system, grid, grid theme, liquid, masonry, jquery, administration, administration template, administration theme, mobile, touch , responsive layout, boostrap, twitter boostrap" />
    <meta name="application-name" content="Supr admin template" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Force IE9 to render in normla mode -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Le styles -->

    <!-- Use new way for google web fonts 
    http://www.smashingmagazine.com/2012/07/11/avoiding-faux-weights-styles-google-web-fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css' /> <!-- Headings -->
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css' /> <!-- Text -->
    <!--[if lt IE 9]>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:700" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Droid+Sans:400" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Droid+Sans:700" rel="stylesheet" type="text/css" />
    <![endif]-->

    <!-- Core stylesheets do not remove -->
    <link id="bootstrap" href="<?php echo base_url()?>css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>css/bootstrap/bootstrap-theme.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>css/supr-theme/jquery.ui.supr.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url()?>css/icons.css" rel="stylesheet" type="text/css" />

    <!-- Plugin stylesheets -->
    <link href="<?php echo base_url()?>plugins/misc/qtip/jquery.qtip.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>plugins/forms/uniform/uniform.default.css" type="text/css" rel="stylesheet" />        
    <link href="<?php echo base_url()?>plugins/tables/dataTables/jquery.dataTables.css" type="text/css" rel="stylesheet" />
    <link href="<?php echo base_url()?>plugins/tables/dataTables/TableTools.css" type="text/css" rel="stylesheet" />
    
    <!-- Main stylesheets -->
    <link href="<?php echo base_url()?>css/main.css" rel="stylesheet" type="text/css" /> 

    <!-- Custom stylesheets ( Put your own changes here ) -->
    <link href="<?php echo base_url()?>css/custom.css" rel="stylesheet" type="text/css" />

    <!--[if IE 8]><link href="<?php echo base_url()?>css/ie8.css" rel="stylesheet" type="text/css" /><![endif]-->
    
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script type="text/javascript" src="<?php echo base_url()?>js/libs/excanvas.min.js"></script>
      <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>js/libs/respond.min.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/favicon.ico" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/apple-touch-icon-144-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/apple-touch-icon-114-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon-57-precomposed.png" />

    <!-- Windows8 touch icon ( http://www.buildmypinnedsite.com/ )-->
    <meta name="application-name" content="Supr"/> 
    <meta name="msapplication-TileColor" content="#3399cc"/> 

    <!-- Load modernizr first -->
    <script type="text/javascript" src="<?php echo base_url()?>js/libs/modernizr.js"></script>
    
    </head>
      
    <body>

    <!-- loading animation -->
    <div id="qLoverlay"></div>
    <div id="qLbar"></div>

    <div id="header">
        <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="dashboard.html">Docufiler.<span class="slogan">admin</span></a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon16 icomoon-icon-arrow-4"></span>
                </button>
            </div> 
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                </ul>
              
                <ul class="nav navbar-right usernav">
                    <li><a href="<?php echo base_url()?>admin/logout"><span class="icon16 icomoon-icon-exit"></span><span class="txt"> Logout</span></a></li>
                </ul>
            </div><!-- /.nav-collapse -->
        </nav><!-- /navbar --> 

    </div><!-- End #header -->

    <div id="wrapper">

        <!--Responsive navigation button-->  
        <div class="resBtn">
            <a href="#"><span class="icon16 minia-icon-list-3"></span></a>
        </div>

        <!--Sidebar collapse button-->  
        <div class="collapseBtn leftbar">
             <a href="#" class="tipR" title="Hide sidebar"><span class="icon12 minia-icon-layout"></span></a>
        </div>

        <!--Sidebar background-->
        <div id="sidebarbg"></div>
        <!--Sidebar content-->
        <div id="sidebar">

            <div class="shortcuts">
                <ul>
                    <li><a href="support.html" title="Support section" class="tip"><span class="icon24 icomoon-icon-support"></span></a></li>
                    <li><a href="#" title="Database backup" class="tip"><span class="icon24 icomoon-icon-database"></span></a></li>
                    <li><a href="charts.html" title="Sales statistics" class="tip"><span class="icon24 icomoon-icon-pie-2"></span></a></li>
                    <li><a href="#" title="Write post" class="tip"><span class="icon24 icomoon-icon-pencil"></span></a></li>
                </ul>
            </div><!-- End search -->            

            <div class="sidenav">
                <div class="sidebar-widget" style="margin: -1px 0 0 0;">
                    <h5 class="title" style="margin-bottom:0">Navigation</h5>
                </div><!-- End .sidenav-widget -->
                <div class="mainnav">
                    <ul>
                        <li>
                            <a href="#"><span class="icon16 icomoon-icon-table-2"></span>User</a>
                            <ul class="sub">
                                <li><a href="<?php echo base_url()?>admin/listuser"><span class="icon16 icomoon-icon-arrow-right-3"></span>List Users</a></li>
                                 <li><a href="<?php echo base_url()?>admin/adduser"><span class="icon16 icomoon-icon-arrow-right-3"></span>Add User</a></li>
                            </ul>
                        </li>
                         <li>
                            <a href="#"><span class="icon16 icomoon-icon-table-2"></span>Email Template</a>
                            <ul class="sub">
                                <li><a href="<?php echo base_url()?>admin/listtemplate"><span class="icon16 icomoon-icon-arrow-right-3"></span>List Templates</a></li>
                                <li><a href="<?php echo base_url()?>admin/addtemplate"><span class="icon16 icomoon-icon-arrow-right-3"></span>Add Template</a></li>
                            </ul>
                        </li>
                          <li>
                            <a href="#"><span class="icon16 icomoon-icon-table-2"></span>Files</a>
                            <ul class="sub">
                                <li><a href="<?php echo base_url()?>admin/listfile"><span class="icon16 icomoon-icon-arrow-right-3"></span>List Files</a></li>
                                <li><a href="<?php echo base_url()?>admin/addfile"><span class="icon16 icomoon-icon-arrow-right-3"></span>Add File</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div><!-- End sidenav -->

        </div><!-- End #sidebar -->

        <!--Body content-->
        <div id="content" class="clearfix">
            <div class="contentwrapper"><!--Content wrapper-->

                <div class="heading">

                    <h3>Admin Panel</h3>                    

                    <div class="resBtnSearch">
                        <a href="#"><span class="icon16 icomoon-icon-search-3"></span></a>
                    </div>

                </div><!-- End .heading-->
                    
                <!-- Build page from here: Usual with <div class="row-fluid"></div> -->
                <?php
                    echo $content;
                ?>
                <!-- Page end here -->
                    
            </div><!-- End contentwrapper -->
        </div><!-- End #content -->
    
    </div><!-- End #wrapper -->

    <!-- Le javascript
    ================================================== -->
    <!-- Important plugins put in all pages -->
    <script  type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/bootstrap/bootstrap.js"></script>  
    <script type="text/javascript" src="<?php echo base_url()?>js/jquery.mousewheel.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/libs/jRespond.min.js"></script>

    <!-- Charts plugins -->
    <script type="text/javascript" src="<?php echo base_url()?>plugins/charts/sparkline/jquery.sparkline.min.js"></script><!-- Sparkline plugin -->
   
    <!-- Misc plugins -->
    <script type="text/javascript" src="<?php echo base_url()?>plugins/misc/nicescroll/jquery.nicescroll.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>plugins/misc/qtip/jquery.qtip.min.js"></script><!-- Custom tooltip plugin -->
    <script type="text/javascript" src="<?php echo base_url()?>plugins/misc/totop/jquery.ui.totop.min.js"></script> 

    <!-- Search plugin -->
    <script type="text/javascript" src="<?php echo base_url()?>plugins/misc/search/tipuesearch_set.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>plugins/misc/search/tipuesearch_data.js"></script><!-- JSON for searched results -->
    <script type="text/javascript" src="<?php echo base_url()?>plugins/misc/search/tipuesearch.js"></script>

    <!-- Form plugins -->
    <script type="text/javascript" src="<?php echo base_url()?>plugins/forms/uniform/jquery.uniform.min.js"></script>

    <!-- Table plugins -->
    <script type="text/javascript" src="<?php echo base_url()?>plugins/tables/dataTables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>plugins/tables/dataTables/TableTools.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>plugins/tables/dataTables/ZeroClipboard.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>plugins/tables/responsive-tables/responsive-tables.js"></script><!-- Make tables responsive -->

    <!-- Init plugins -->
    <script type="text/javascript" src="<?php echo base_url()?>js/main.js"></script><!-- Core js functions -->
    <script type="text/javascript" src="<?php echo base_url()?>js/datatable.js"></script><!-- Init plugins only for page -->
   
    </body>
</html>
