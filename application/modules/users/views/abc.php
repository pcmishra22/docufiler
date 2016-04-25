
<!DOCTYPE html>
<html lang="en"><head>
<TITLE>Demo Load Data Dynamically on Page Scroll using jQuery AJAX and PHP</TITLE>
<style>
.question {font-weight:bold;background-color:#FFF;padding:7px 0px  0px 15px;}
.answer{font-style:italic;background-color:#FFF;padding:0px 0px 7px 15px;}
#faq-result{margin: -10px auto 0px;line-height:30px;border-radius:5px;min-height:300px;}
#loader-icon {float:right;display:none;}
</style>
<script type="text/javascript" src="jquery-1.2.6.pack.js"></script>
<script>
$(document).ready(function(){
	function getresult(url) {
		$.ajax({
			url: url,
			type: "GET",
			data:  {rowcount:$("#rowcount").val()},
			beforeSend: function(){
			$('#loader-icon').show().fadeOut('slow',5000);
			},
			success: function(data){
			setTimeout(function() {$("#faq-result").append(data);$('#loader-icon').hide();}, 1000);
			},
			error: function(){} 	        
	   });
	}
	$(window).scroll(function(){
	//	following if detects the browser end and loads
		if ($(window).scrollTop() == $(document).height() - $(window).height()){
			if(parseInt($(".pagenum:last").val()) < parseInt($(".total-page").val())) {
				//$('#loader-icon').show();
				var pagenum = parseInt($(".pagenum:last").val()) + 1;
				getresult('getresult.php?page='+pagenum);				
			}
		}
	}); 
});
</script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="index,follow">
<link rel="shortcut icon" href="http://phppot.com/favicon.ico" type="image/x-icon">
<link rel="stylesheet" id="solandra-style-css" href="http://phppot.com/wp-content/themes/solandra/style.css" type="text/css" media="all">
<style>
#demo-content {padding: 0px 0px 100px 0px;}
#demo-content table.tutorial-table {table-layout:auto;}
.tutorial-back a{background: url('http://phppot.com/wp-content/themes/solandra/images/back.png') no-repeat 15px center #09f;padding: 10px 10px 10px 20px;margin: 20px 40px 20px 0;color: #fff;display: inline-block;width: 155px;text-align: center;border-radius: 5px;box-shadow: 0 2px 5px rgba(0,0,0,0.25);}
.tutorial-back a:hover {
box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.50);
}
</style><script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-40067115-1']);
  _gaq.push(['_setDomainName', 'phppot.com']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script></head>
<body>
<div id="site_header"><div class="content"><a href="http://phppot.com/" title="PhpPot Home"><img src="http://phppot.com/wp-content/themes/solandra/images/phppot.png" alt="PhpPot Home"></a><a class="header-link" href="http://phppot.com/demo/">Demo &amp; Download</a></div></div><div class="content">
<div id="menu-icon" ><a href="#tutorial-menu" title="Tutorial Menu"><img src="http://phppot.com/wp-content/themes/solandra/images/tutorial-menu.png" alt="Tutorial Menu" /></a></div>
<div id="tutorial-body"><div id="tutorial"><h1>Demo Load Data Dynamically on Page Scroll using jQuery AJAX and PHP</h1>
<div id="demo-content">
<p><strong>NOTE:</strong> Keep scrolling till THE BOTTOM END of the browser to see the dynamic load scroll effect.</p>
<div id="faq-result">
<input type="hidden" class="pagenum" value="1" /><input type="hidden" class="total-page" value="10" /><div class='question'>1. What are the widely used array functions in PHP?</div><div class="answer">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisi mi, lacinia id faucibus at, commodo dapibus turpis. Quisque fermentum arcu vel sem cursus placerat. Etiam egestas eu lorem aliquet finibus. Duis aliquet, nisl a condimentum varius, arcu mi mattis lectus, et volutpat turpis ipsum non ipsum. Donec fringilla id eros id elementum. Curabitur non euismod libero. Maecenas at nisi est.</div><div class='question'>2. How to redirect using PHP?</div><div class="answer">Integer vel eros aliquam, efficitur odio sit amet, pharetra neque. Praesent convallis euismod lacus, a semper leo iaculis vitae. Cras ut nibh laoreet, ultricies neque eget, sodales felis. Morbi ut erat nec nibh ullamcorper ornare pellentesque sed lectus. Nam id mauris auctor, ultricies dui eu, placerat sapien.</div><div class='question'>3. Differentiate PHP size() and count():</div><div class="answer">Vivamus eget est elit. Ut magna dolor, placerat sed risus ac, varius facilisis leo. Duis hendrerit, ante vitae volutpat eleifend, orci turpis malesuada ligula, sed hendrerit quam dolor sed eros. Suspendisse pulvinar orci non leo vehicula, et commodo leo pharetra. Donec fringilla id eros id elementum. Curabitur non euismod libero. Maecenas at nisi est.</div></div>
<p class="navigation"><a href="http://phppot.com/jquery/load-data-dynamically-on-page-scroll-using-jquery-ajax-and-php/">Back to Tutorial</a>
<span id="loader-icon"><img src="LoaderIcon.gif" /></span>
</p>
</div>
<p><a href="#top" class="top">Back to Top</a></p>   
</div>

<div id="tutorial-menu">
	<ul class="main-menu"><li class="cat-item cat-item-2"><a href="http://phppot.com/category/php/">PHP</a></li><li class="cat-item cat-item-8"><a href="http://phppot.com/category/jquery/">jQuery</a></li><li class="cat-item cat-item-4"><a href="http://phppot.com/category/mysql/">MySQL</a></li><li class="cat-item cat-item-3"><a href="http://phppot.com/category/wordpress/">Wordpress</a></li><li class="cat-item cat-item-10"><a href="http://phppot.com/category/css/">CSS</a></li></ul></div></div>
<div id="sidebar">
	<div id="aboutcntnt"><div id="photo"><img src="http://phppot.com/wp-content/themes/solandra/images/Vincy.jpg" alt="Vincy" width="100" height="100"></div><div id="aboutdesc"><p>Hello! I am Vincy and PhpPot is my web technologies blog. My specialities are PHP, WordPress, jQuery, eCommerce, CMS and bespoke web application development.</p>
<p>I do accept paid work. Write to me to start working on your dream project or just say hi!</p></div><div id="contactMe"><a href="mailto:vincy@phppot.com" title="Contact Me">vincy@phppot.com</a></div></div>
<div class="hiadcomponent"><div class="heading">FREE EMAIL UPDATES</div>	<div>
	<form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open(&#39;http://feedburner.google.com/fb/a/mailverify?uri=phppot&#39;, &#39;popupwindow&#39;, &#39;scrollbars=yes,width=550,height=520&#39;);return true">
	<p>
	<input placeholder="Enter your email here" type="text" class="feedb-email" name="email">
	<input type="hidden" value="phppot" name="uri">
	<input type="hidden" name="loc" value="en_US">
	<input type="submit" value="Subscribe" class="subscribe"></p></form>
	</div>	
	<div>
	</div>
</div>
<div id="recommended">
<div class="heading">Recommended Tutorial</div>
<ul>
<li><a href="http://phppot.com/php/php-login-script-with-session/">PHP Login Script with Session</a></li>
<li><a href="http://phppot.com/php/php-ajax-image-upload/">PHP AJAX Image Upload</a></li>
<li><a href="http://phppot.com/jquery/php-ajax-multiple-image-upload-using-jquery/">PHP AJAX Multiple Image Upload using jQuery</a></li>
<li><a href="http://phppot.com/jquery/jquery-contact-form-with-attachment-using-php/">jQuery Contact Form with Attachment using PHP</a></li>
<li><a href="http://phppot.com/jquery/jquery-drag-and-drop/">jQuery Drag and Drop</a></li>
<li><a href="http://phppot.com/php/php-input-filtering/">PHP Input Filtering</a></li>
<li><a href="http://phppot.com//php/php-change-password-script/">PHP Change Password Script</a></li>
<li><a href="http://phppot.com//php/php-json-encode-and-decode/">PHP JSON Encode and Decode</a></li>
</ul>
</div>

</div></div>
<div id="footer">
<div class="follow"><a href="https://plus.google.com/100835954832081019478/posts" title="Google Plus"><img src="http://phppot.com/wp-content/themes/solandra/images/googleplus.png" alt="Google Plus"></a><a class="facebook" href="https://www.facebook.com/pages/phppotcom/1428212654057945" title="Facebook" target="_blank"><img src="http://phppot.com/wp-content/themes/solandra/images/facebook.png" alt="Facebook"></a><a class="feed" href="http://phppot.com/feed/" title="Feed"><img src="http://phppot.com/wp-content/themes/solandra/images/feed.png" alt="Feed"></a></div>
<ul id="footer-menu">	
<li class="cat-item cat-item-2"><a href="http://phppot.com/category/php/">PHP</a></li>
<li class="cat-item cat-item-8"><a href="http://phppot.com/category/jquery/">jQuery</a></li>
<li class="cat-item cat-item-4"><a href="http://phppot.com/category/mysql/">MySQL</a></li>
<li class="cat-item cat-item-3"><a href="http://phppot.com/category/wordpress/">Wordpress</a></li>
<li class="cat-item cat-item-10"><a href="http://phppot.com/category/css/">CSS</a></li>
</ul>
<div id="footer-bottom">
<p> © 2008-2014 <a href="http://phppot.com/" title="PhpPot Home">phppot.com</a>. The design and content are copyrighted to Vincy and may not be reproduced in any form.</p>
</div>
</div></body></html>