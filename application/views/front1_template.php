<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/font-awesome.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/style.css" />
<script src="<?php echo base_url();?>js/frontend/TreeMenu.js" type="text/javascript"></script>
</head>

<body>


<!--=====================Yellow Header Section================================-->



<!--start of middle section-->

<?php echo $content;?>

<!--end of middle section-->

     <script type="text/javascript">
		var baseUrl="<?php echo base_url(); ?>";
    </script>
 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script src="<?php echo base_url();?>js/frontend/bootstrap.min.js"></script>
 <script src="<?php echo base_url();?>js/frontend/common.js"></script>
    
	
<link rel="stylesheet" href="<?php echo base_url(); ?>css/tv/css/style.css">

<script type="text/javascript">

		$( document ).ready( function( ) {
				$( '.tree li' ).each( function() {
						if( $( this ).children( 'ul' ).length > 0 ) {
								$( this ).addClass( 'parent' );     
						}
				});
				
				$( '.tree li.parent > a' ).click( function( ) {
						$( this ).parent().toggleClass( 'active' );
						$( this ).parent().children( 'ul' ).slideToggle( 'fast' );
				});
				
		});
    function test()
{
alert("test");
}    
	</script>
<script>

/*            $(document).ready(function() {
                $('.demo').ntm();
            });

    (function ($) {
        function init() {
            $('.easy-tree').EasyTree({
                addable: true,
                editable: true,
                deletable: true
            });
        }
        window.onload = init();
    })(jQuery)
	*/
</script>
<script>
function test()
{
	alert('test is calling');
}
        </script>	
<script>
/*
$('ul.nav-left-ml').toggle();
$('ul.nav-left-ml nested').toggle();
$('label.nav-toggle span').click(function () {
  $(this).parent().parent().children('ul.nav-left-ml').toggle(300);
  var cs = $(this).attr("class");

  if(cs == 'nav-toggle-icon glyphicon glyphicon-chevron-right') {
    $(this).removeClass('glyphicon-chevron-right').addClass('glyphicon-chevron-down');
  }
  if(cs == 'nav-toggle-icon glyphicon glyphicon-chevron-down') {
    $(this).removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-right');
  }
});
*/
</script>
</body>
</html>
