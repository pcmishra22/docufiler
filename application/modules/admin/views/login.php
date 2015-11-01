<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Docufiler Admin</title>
    <meta name="author" content="SuggeElson" />
    <meta name="description" content="Supr admin template - new premium responsive admin template. This template is designed to help you build the site administration without losing valuable time.Template contains all the important functions which must have one backend system.Build on great twitter boostrap framework" />
    <meta name="keywords" content="admin, admin template, admin theme, responsive, responsive admin, responsive admin template, responsive theme, themeforest, 960 grid system, grid, grid theme, liquid, masonry, jquery, administration, administration template, administration theme, mobile, touch , responsive layout, boostrap, twitter boostrap" />
    <meta name="application-name" content="Supr admin template" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Force IE9 to render in normla mode -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Le styles -->
    <link href="<?php echo base_url()?>css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>css/supr-theme/jquery.ui.supr.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url()?>css/icons.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>plugins/forms/uniform/uniform.default.css" type="text/css" rel="stylesheet" />

    <!-- Main stylesheets -->
    <link href="<?php echo base_url()?>css/main.css" rel="stylesheet" type="text/css" /> 

    <!--[if IE 8]><link href="<?php echo base_url()?>css/ie8.css" rel="stylesheet" type="text/css" /><![endif]-->
    
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script type="text/javascript" src="<?php echo base_url()?>js/libs/excanvas.min.js"></script>
      <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>js/libs/respond.min.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo base_url()?>images/favicon.ico" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url()?>images/apple-touch-icon-144-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url()?>images/apple-touch-icon-114-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url()?>images/apple-touch-icon-72-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url()?>images/apple-touch-icon-57-precomposed.png" />

    <script type="text/javascript" src="<?php echo base_url()?>js/libs/modernizr.js"></script>

    </head>
      
    <body class="loginPage">

    <div class="container">

        <div id="header">

            <div class="row">

                <div class="navbar">
                    <div class="container">
                        <a class="navbar-brand" href="dashboard.html">Docufiler.<span class="slogan">admin</span></a>
                    </div>
                </div><!-- /navbar -->

            </div><!-- End .row -->

        </div><!-- End #header -->

    </div><!-- End .container -->    

    <div class="container">

        <div class="loginContainer">
            <form class="form-horizontal" method="post" action="<?php echo  base_url(); ?>admin/validate_credentials" id="loginForm" role="form">
                <div class="form-group">
                    <?php
    if(isset($message_error) && $message_error){
          ?>
            <div style="height:5px;"><a class="close" data-dismiss="alert">×</a>
            <strong style="color:red;">Please enter correct details</strong></div>
            <?php
        }
        ?>
                    <label class="col-lg-12 control-label" for="username">Username:</label>
                    <div class="col-lg-12">
                        <input id="username" type="text" name="username" class="form-control" placeholder="Enter your username ...">
                        <span class="icon16 icomoon-icon-user right gray marginR10"></span>
                    </div>
                </div><!-- End .form-group  -->
                <div class="form-group">
                    <label class="col-lg-12 control-label" for="password">Password:</label>
                    <div class="col-lg-12">
                        <input id="password" type="password" name="password" class="form-control">
                        <span class="icon16 icomoon-icon-lock right gray marginR10"></span>
                        <span class="forgot help-block"><a href="#">Forgot your password?</a></span>
                    </div>
                </div><!-- End .form-group  -->
                <div class="form-group">
                    <div class="col-lg-12 clearfix form-actions">
                        <div class="checkbox left">
                            <label><input type="checkbox" id="keepLoged" value="Value" class="styled" name="logged" /> Keep me logged in</label>
                        </div>
                        <button type="submit" class="btn btn-info right" id="loginBtn"><span class="icon16 icomoon-icon-enter white"></span> Login</button>
                    </div>
                </div><!-- End .form-group  -->
            </form>
        </div>

    </div><!-- End .container -->

    <!-- Le javascript
    ================================================== -->
    <script  type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>js/bootstrap/bootstrap.js"></script>  
    <script type="text/javascript" src="<?php echo base_url()?>plugins/forms/validate/jquery.validate.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>plugins/forms/uniform/jquery.uniform.min.js"></script>

     <script type="text/javascript">
        // document ready function
        $(document).ready(function() {
            //------------- Options for Supr - admin tempalte -------------//
            var supr_Options = {
                rtl:false//activate rtl version with true
            }
            //rtl version
            if(supr_Options.rtl) {
                localStorage.setItem('rtl', 1);
                $('#bootstrap').attr('href', '<?php echo base_url()?>css/bootstrap/bootstrap.rtl.min.css');
                $('#bootstrap-responsive').attr('href', '<?php echo base_url()?>css/bootstrap/bootstrap-responsive.rtl.min.css');
                $('body').addClass('rtl');
                $('#sidebar').attr('id', 'sidebar-right');
                $('#sidebarbg').attr('id', 'sidebarbg-right');
                $('.collapseBtn').addClass('rightbar').removeClass('leftbar');
                $('#content').attr('id', 'content-one')
            } else {localStorage.setItem('rtl', 0);}
            
            $("input, textarea, select").not('.nostyle').uniform();
            $("#loginForm").validate({
                rules: {
                    username: {
                        required: true,
                        minlength: 4
                    },
                    password: {
                        required: true,
                        minlength: 3
                    }  
                },
                messages: {
                    username: {
                        required: "Fill me please",
                        minlength: "My name is bigger"
                    },
                    password: {
                        required: "Please provide a password",
                        minlength: "My password is more that 3 chars"
                    }
                }   
            });
        });
    </script> 
    </body>
</html>
