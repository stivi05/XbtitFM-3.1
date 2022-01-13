<?php
/////////////////////////////////////////////////////////////////////////////////////
// xbtit - Bittorrent tracker/frontend
//
// Copyright (C) 2004 - 2020  xbtitFM Team
//
//    This file is part of xbtitFM.
//
// Redistribution and use in source and binary forms, with or without modification,
// are permitted provided that the following conditions are met:
//
//   1. Redistributions of source code must retain the above copyright notice,
//      this list of conditions and the following disclaimer.
//   2. Redistributions in binary form must reproduce the above copyright notice,
//      this list of conditions and the following disclaimer in the documentation
//      and/or other materials provided with the distribution.
//   3. The name of the author may not be used to endorse or promote products
//      derived from this software without specific prior written permission.
//
// THIS SOFTWARE IS PROVIDED BY THE AUTHOR ``AS IS'' AND ANY EXPRESS OR IMPLIED
// WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
// MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED.
// IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
// SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED
// TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR
// PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF
// LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
// NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE,
// EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
//
////////////////////////////////////////////////////////////////////////////////////
global $CURUSER,$btit_settings;
if (!$CURUSER || $CURUSER["view_news"]=="no")
   {
    // do nothing
   }
else
    {

     
     print("\n<table class=\"lista\" width=\"100%\"><tr><td class=\"lista\">\n");


?>
<style type="text/css">

#bodyarea .b-content .main {
width:100%;
/*border:1px solid;*/
}

#bodyarea .b-content .month {
font:bold 9pt verdana;
}

#bodyarea .b-content .daysofweek {
font:bold 9pt verdana;
}

#bodyarea .b-content .days {
font-size: 9pt;
font-family:verdana;
padding: 2px;
}

#bodyarea .b-content .days #today{
font-weight: bold;
color: red;
}

</style>


<script type="text/javascript" src="jscript/basiccalendar.js">

/***********************************************
* Basic Calendar-By Brian Gosselin at http://scriptasylum.com/bgaudiodr/
* Script featured on Dynamic Drive (http://www.dynamicdrive.com)
* This notice must stay intact for use
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>
<div align='center'>
<form>
<select onChange="updatecalendar(this.options)">
<script type="text/javascript">

var themonths=['January','February','March','April','May','June',
'July','August','September','October','November','December']

var todaydate=new Date()
var curmonth=todaydate.getMonth()+1 //get current month (1-12)
var curyear=todaydate.getFullYear() //get current year

function updatecalendar(theselection){
var themonth=parseInt(theselection[theselection.selectedIndex].value)+1
var calendarstr=buildCal(themonth, curyear, "main", "month", "daysofweek", "days", 0)
if (document.getElementById)
document.getElementById("calendarspace").innerHTML=calendarstr
}

document.write('<option value="'+(curmonth-1)+'" selected="yes">Current Month</option>')
for (i=0; i<12; i++) //display option for 12 months of the year
document.write('<option value="'+i+'">'+themonths[i]+' '+curyear+'</option>')


</script>
</select>
</div>

<div id="calendarspace">
<script>
//write out current month's calendar to start
document.write(buildCal(curmonth, curyear, "main", "month", "daysofweek", "days", 0))
</script>
</div>

</form>
<?php 
     
     print("</td></tr></table>\n");
} // end if user can view
?>
