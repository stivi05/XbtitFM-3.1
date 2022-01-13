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

$morescript='
	<!--[if lt IE 7.]>
	<script defer type="text/javascript" src="'.$BASEURL.'/jscript/pngfix.js"></script>
	<![endif]-->
	<script type="text/javascript" src="'.$BASEURL.'/jscript/ajax.js"></script>
	<script type="text/javascript" src="'.$BASEURL.'/jscript/ajax-poller.js"></script>
	<script type="text/javascript" src="'.$BASEURL.'/jscript/marquee.js"></script>
     <!-- these next 3 scripts are for the new animated collapse -->
		<script type="text/javascript" src="'.$BASEURL.'/jscript/animatedcollapse.js"></script>
		<script type="text/javascript" src="'.$BASEURL.'/jscript/1.4.2_jquery.min.js"></script>
		<script type="text/javascript" src="'.$BASEURL.'/jscript/jquery.min.js"></script>
		<!-- // -->
	<script type="text/javascript" src="'.$BASEURL.'/jscript/xbtit.js"></script>
    <script type="text/javascript" src="'.$BASEURL.'/jscript/jquery.tools.min.js"></script>
    '.($btit_settings["fmhack_shoutcast_stats_and_DJ_application"]=="enabled" && htmlentities($_GET["page"])==''?'<script src="'.$BASEURL.'/radiostats/ajaxradio.js" language="JavaScript" type="text/javascript"></script>':'').'
';

$morecss='';
?>