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

/*******************************************************************
* shoutcast.class.php
* Version: 0.1
* Author: Henrik Malmberg
* Copyright (C) 2002, Henrik Malmberg
* henrik@ih.nut
* http://yoda.ih.nu/
*
*******************************************************************
This program is free software; you can redistribute it and/or modify it
under the terms of the GNU General Public License as published by the
Free Software Foundation; either version 2 of the License, or (at your
option) any later version.

This program is distributed in the hope that it will be useful, but
WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
General Public License for more details.

You should have received a copy of the GNU General Public License along
with this program; if not, write to the Free Software Foundation, Inc.,
59 Temple Place - Suite 330, Boston, MA 02111-1307, USA.
*******************************************************************/

class ShoutCast {
	// Public
	var $host;
	var $port;
	var $passwd;
	
	//Private
	var $_xml;
	var $_error;
	
	function openstats() {
		$fp = fsockopen($this->host, $this->port, $errno, $errstr, 10);
		If (!$fp) {
			$this->_error = "$errstr ($errno)";
			return(0);
		} else {
		    fputs($fp, "GET /admin.cgi?pass=".$this->passwd."&mode=viewxml HTTP/1.0\r\n");
		    fputs($fp, "User-Agent: Mozilla\r\n\r\n");
		    while (!feof($fp)) {
     	   		$this->_xml .= fgets($fp, 512);
		    }
		    fclose($fp);

		    if (stristr($this->_xml, "HTTP/1.0 200 OK") == true) {
		    	// <-H> Thanks to Blaster for this fix.. trim();
    			$this->_xml = trim(substr($this->_xml, 42));
			} else {
				$this->_error = "Bad login";
				return(0);
			}

			$xmlparser = xml_parser_create();
			if (!xml_parse_into_struct($xmlparser, $this->_xml, $this->_values, $this->_indexes)) {
				$this->_error = "Unparsable XML";
				return(0);
			}
	
			xml_parser_free($xmlparser);

			return(1);
		}
	}
	
	function GetCurrentListenersCount() {
		return($this->_values[$this->_indexes["CURRENTLISTENERS"][0]]["value"]);
	}

	function GetPeakListenersCount() {
		return($this->_values[$this->_indexes["PEAKLISTENERS"][0]]["value"]);
	}

	function GetMaxListenersCount() {
		return($this->_values[$this->_indexes["MAXLISTENERS"][0]]["value"]);
	}
	
	function GetReportedListenersCount() {
		return($this->_values[$this->_indexes["REPORTEDLISTENERS"][0]]["value"]);
	}
	
	function GetAverageListenTime() {
		return($this->_values[$this->_indexes["AVERAGETIME"][0]]["value"]);
	}
	
	function GetServerGenre() {
		return($this->_values[$this->_indexes["SERVERGENRE"][0]]["value"]);
	}
	
	function GetServerURL() {
		return($this->_values[$this->_indexes["SERVERURL"][0]]["value"]);
	}
	
	function GetServerTitle() {
		return($this->_values[$this->_indexes["SERVERTITLE"][0]]["value"]);
	}
	
	function GetCurrentSongTitle() {
		return($this->_values[$this->_indexes["SONGTITLE"][0]]["value"]);
	}
	
	function GetIRC() {
		return($this->_values[$this->_indexes["IRC"][0]]["value"]);
	}
	
	function GetAIM() {
		return($this->_values[$this->_indexes["AIM"][0]]["value"]);
	}
	
	function GetICQ() {
		return($this->_values[$this->_indexes["ICQ"][0]]["value"]);
	}

	function GetWebHitsCount() {
		return($this->_values[$this->_indexes["WEBHITS"][0]]["value"]);
	}
	
	function GetStreamHitsCount() {
		return($this->_values[$this->_indexes["STREAMHITS"][0]]["value"]);
	}
	
	function GetStreamStatus() {
		return($this->_values[$this->_indexes["STREAMSTATUS"][0]]["value"]);
	}
	
	function GetBitRate() {
		return($this->_values[$this->_indexes["BITRATE"][0]]["value"]);
	}
	
	function GetSongHistory() {
		for($i=1;$i<sizeof($this->_indexes['TITLE']);$i++) {
			$arrhistory[$i-1] = array(
									"playedat"=>$this->_values[$this->_indexes['PLAYEDAT'][$i]]['value'],
									"title"=>$this->_values[$this->_indexes['TITLE'][$i]]['value']
								);
		}

		return($arrhistory);
	}

	function GetListeners() {
		for($i=0;$i<sizeof($this->_indexes['USERAGENT']);$i++) {
			$arrlisteners[$i] = array(
									"hostname"=>$this->_values[$this->_indexes['HOSTNAME'][$i]]['value'],
									"useragent"=>$this->_values[$this->_indexes['USERAGENT'][$i]]['value'],
									"underruns"=>$this->_values[$this->_indexes['UNDERRUNS'][$i]]['value'],
									"connecttime"=>$this->_values[$this->_indexes['CONNECTTIME'][$i]]['value'],
									"pointer"=>$this->_values[$this->_indexes['POINTER'][$i]]['value'],
									"uid"=>$this->_values[$this->_indexes['UID'][$i]]['value'],
								);
		}

		return($arrlisteners);
	}
	
	function geterror() { return($this->_error); }
}

?>