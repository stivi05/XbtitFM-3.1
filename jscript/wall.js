$(document).ready(function()
{
$('.stdelete').live("click",function()
{var ID=$(this).attr("id");var dataString='act=myass&del='+ID;if(confirm("Sure you want to delete this comment? There is NO undo!"))
{$.ajax({type:"GET",url:"chatedit.php",data:dataString,cache:false,success:function(html){$("#stbody"+ID).slideUp();var newString='getChatData.php';$('#fake').fadeOut('fast').load(newString).fadeIn("fast");}});}
return false;});});
