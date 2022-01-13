<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html<tag:main_rtl /> lang="en" xmlns:tag="http://www.w3.org/1999/html">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="xbtitFM">
    <meta name="author" content="xbtitFM">
    <title><tag:main_title /></title>
	<if:seo_enabled>
  <tag:cano />
  <tag:meta />
  <tag:analytic />
  <tag:ggwebmaster />
  </if:seo_enabled>
    <!-- Bootstrap Core CSS -->
    <link href="style/Valentine_3.0/css/bootstrap.css" rel="stylesheet">
    <!-- Theme CSS -->
    <link href="style/Valentine_3.0/main.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="./font_awesome/css/font-awesome.css" rel="stylesheet" type="text/css">

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <tag:more_css />
    <tag:main_jscript />	
<script src='ajaxchat/scripts.js' language='JavaScript' type='text/javascript'></script>
<script type="text/javascript">
    var GB_ROOT_DIR = "./greybox/";
</script>
<script type="text/javascript" src="greybox/AJS.js"></script>
<script type="text/javascript" src="greybox/AJS_fx.js"></script>
<script type="text/javascript" src="greybox/gb_scripts.js"></script>
<link href="greybox/gb_styles.css" rel="stylesheet" type="text/css" />	

<if:IS_DISPLAYED_1>	
<!--[if lte IE 7]>
<style type='text/css'>
#menu ul {display:inline;}
</style>
<![endif]-->
</if:IS_DISPLAYED_1>

<if:aads_enabled>
<script type="text/javascript">
 $(document).ready(function() {
 	 $("#bitcoin_payment_status").load("bitcoin_monitor.php?<tag:bc_extra_params />");
   var refreshId = setInterval(function() {
      $("#bitcoin_payment_status").load("bitcoin_monitor.php?<tag:bc_extra_params />");
   }, 60000);
   $.ajaxSetup({ cache: false });
});
</script>
</if:aads_enabled>

<if:balloons_enabled>
  <script type="text/javascript" src="./jscript/overlib.js"></script>
  </head>
  <div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
<else:balloons_enabled>
  </head>
</if:balloons_enabled>

</head>
<body>
    <script src="style/Valentine_3.0/js/popper.min.js"></script>
    <script src="style/Valentine_3.0/js/bootstrap.min.js"></script>
<if:IS_DISPLAYED_2>
    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-dark bg-primary navbar-inverse role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-brand">
            <img src="./images/favicon.png" width="32" height="32" class="d-inline-block alt="">
            <span class="navbar-brand mb-0 h1"><tag:site_name /></span></div>
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <tag:main_dropdown /><br /><br />
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

<!-- Content Row -->
        <div class="row">
            <!-- Content Column -->
                 
<div id='main_body_wrap'>
                        
<div id='outer_wrap'>
<div id='mid_Container'>
<div id='Logo_Spacer1'></div>
	<div id='Logo'></div>	
<!-- blah blah -->
<br /><br />	  
  <div id='top_row'>
		<div id='Logo_Spacer2'></div>				
     <div id='top_row_inner1'>
        <div id='top_row_inner2'>
				 <div class="top_row_spacer"></div>
 				  <div id='header'>
<!-- blah blah -->		
				<div class="rap_tl">
      <div class="rap_tr">
    <div class="rap_tm"></div>
  </div>
   </div>
<!-- blah blah -->	
    <div class="rap_ml">
      <div class="rap_mr">
        <div class="rap_mm">
          <div class="rap_inner_content">
<tag:main_header />
					    <div class="space"></div>
					    </div>
					  </div>
				 </div>
       </div>
<!-- blah blah -->		
    <div class="rap_bl">
      <div class="rap_br">
        <div class="rap_bm"></div>
      </div>
    </div>
<div style='clear: both;'></div>
	</div>
</div>
 </div>
<!-- blah blah -->
   </div>			
    </div>			

<div id='ader_wrap'>	
  <div id='ader_wrap1'>
    <div id='ader_wrap2'>
		    <div id='adarea'><tag:main_adarea /></div>
      </div>
    </div>
  </div>
<!-- Start of main bodyarea wrapper -->
  <div class='wrap_tl'>
      <div class='wrap_tr'>
        <div class='wrap_tm'></div>
      </div>
    </div>
    <div class='wrap_ml'>
      <div class='wrap_mr'>
        <div class='wrap_mm'>
          <div class='wrap_inner_content'> 
						<div class="spacer"></div>
<div id='top_margin'></div>
  
 <div id='bodyarea'>
  <script type="text/javascript">
var q=jQuery.noConflict();
    q(document).ready(function(){ 
q('#ann').load('ann.php?ignoreMe=' + new Date().getTime()).fadeIn("slow");
    });  
</script>
<div id="ann"></div> 
	<div id='surround'>
 
    <table border='0' align='center' cellpadding='0' cellspacing='0' width='100%'>
      <tr>
        <td valign='top' width='10' rowspan='2'></td>
				<if:HAS_LEFT_COL>
          <td valign='top' id='scol' width='190'><tag:main_left /></td>
        <td valign='top' width='10' rowspan='2'></td>
				</if:HAS_LEFT_COL>
          <td id='Mcol' valign='top'><tag:main_content /></td>
				<if:HAS_RIGHT_COL>
        <td valign='top' width='10' rowspan='2'></td>
          <td valign='top' id='scol' width='190'><tag:main_right /></td>
				</if:HAS_RIGHT_COL>
        <td valign='top' width='10' rowspan='2'></td>
      </tr>
    </table>

    <br />      
    <table align='center' width='100%' cellpadding='0' cellspacing='0' border='0'>
      <tr>
        <td valign='top' width='10' rowspan='2'></td>
          <td id='Fcol' valign='top'><div id='bottom_menu'><tag:main_footer /></div></td>
				 </div>
        <td valign='top' width='10' rowspan='2'></td>
      </tr>
    </table>

	 </div> 
	 <div style='clear: both;'></div>
  </div>

    </div>
</div>
    </div>
        </div>
    <div class="wrap_bl">
      <div class="wrap_br">
        <div class="wrap_bm"> </div>
      </div>
    </div>
		<div class="shadowbar"></div>
  </div>
<!-- End of main bodyarea wrapper -->
<!-- end mid_Container -->   
<div class="spacer"></div>
	       <div id='bottom_margin'></div>
             <div id='bottom_row'>
            <div id='bottom_row_inner1'>
        <div id='bottom_row_inner2'>		
      <div id='footer_wrap'>
   <div id='footer_text'><span class="footer"><tag:to_top /><br /><tag:style_copyright />&nbsp;<tag:xbtit_version /><br /><tag:xbtit_debug />&nbsp;&nbsp;&nbsp;<a href="http://validator.w3.org/check?uri=referer" target="_blank"><img
      src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" height="25" width="80" /></a><br /></span></div>
				 
        </div>
				 <div style='clear: both;'></div>
        </div>
      </div>
  </div>
 
<else:IS_DISPLAYED_2>
    <div id='bodyarea' style='padding: 1ex 0ex 0ex 0ex;'>  
<table border='0' align='center' cellpadding='0' cellspacing='0' width='100%'>
    <tr>
<td valign='top' width='5' rowspan='2'></td>
    <td valign='top'><tag:main_content /></td>
<td valign='top' width='5' rowspan='2'></td>
      </tr>
    </table>
      </div>
</if:IS_DISPLAYED_2>
</div>
<!-- end outer_wrap -->
<if:anon_enabled>
  <script src="<tag:protected />/jscript/anon.js" type="text/javascript"></script>
  <script type="text/javascript"><!--
  protected_links = "<tag:protected />";
  auto_anonymize();
  //--></script>
</if:anon_enabled>
</body>
</html>