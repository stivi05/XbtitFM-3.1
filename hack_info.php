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

$HERE=dirname(__FILE__);
require_once("$HERE/include/functions.php");
global $CURUSER, $BASEURL;
if($CURUSER["edit_users"]!="yes")
die("no dice!");
require_once("$HERE/".load_language("lang_hack_info.php"));
$page=$_GET["page"];
$page=htmlentities($page);
echo '<script type="text/javascript" src="'.$BASEURL.'/jscript/xbtit.js"></script>';//damn images need resized
if(substr($page, 0, 4)=="INV"){
echo format_comment($language["INV_INFO"]);
}
elseif(substr($page, 0, 4)=="CMT"){
echo format_comment($language["CMT_INFO"]);
}
elseif(substr($page, 0, 4)=="BS"){
echo format_comment($language["BS_INFO"]);
}
elseif(substr($page, 0, 4)=="DH"){
echo format_comment($language["DH_INFO"]);
}
elseif(substr($page, 0, 4)=="SD"){
echo format_comment($language["SD_INFO"]);
}
elseif(substr($page, 0, 4)=="TR"){
echo format_comment($language["TR_INFO"]);
}
elseif(substr($page, 0, 4)=="ADS"){
echo format_comment($language["ADS_INFO"]);
}
elseif(substr($page, 0, 4)=="GST"){
echo format_comment($language["GST_INFO"]);
}
elseif(substr($page, 0, 4)=="FRH"){
echo format_comment($language["FRH_INFO"]);
}
elseif(substr($page, 0, 4)=="TIU"){
echo format_comment($language["TIU_INFO"]);
}
elseif(substr($page, 0, 4)=="WS"){
echo format_comment($language["WS_INFO"]);
}
elseif(substr($page, 0, 4)=="HR"){
echo format_comment($language["HR_INFO"]);
}
/*elseif(substr($page, 0, 4)=="RS"){
echo format_comment($language["RS_INFO"]);
}
elseif(substr($page, 0, 4)=="AR"){
echo format_comment($language["AR_INFO"]);
}
elseif(substr($page, 0, 4)=="RTU"){
echo format_comment($language["RTU_INFO"]);
}
elseif(substr($page, 0, 4)=="BT"){
echo format_comment($language["BT_INFO"]);
}
elseif(substr($page, 0, 4)=="GCO"){
echo format_comment($language["GCO_INFO"]);
}*/
elseif(substr($page, 0, 4)=="IMD"){
echo format_comment($language["IMD_INFO"]);
}
elseif(substr($page, 0, 4)=="SP"){
echo format_comment($language["SP_INFO"]);
}
/*elseif(substr($page, 0, 4)=="RWG"){
echo format_comment($language["RWG_INFO"]);
}
elseif(substr($page, 0, 4)=="SSB"){
echo format_comment($language["SSB_INFO"]);
}
elseif(substr($page, 0, 4)=="SMT"){
echo format_comment($language["SMT_INFO"]);
}
elseif(substr($page, 0, 4)=="ST"){
echo format_comment($language["ST_INFO"]);
}
elseif(substr($page, 0, 4)=="HD"){
echo format_comment($language["HD_INFO"]);
}
elseif(substr($page, 0, 4)=="TRV"){
echo format_comment($language["TRV_INFO"]);
}
elseif(substr($page, 0, 4)=="ETD"){
echo format_comment($language["ETD_INFO"]);
}
elseif(substr($page, 0, 4)=="GAB"){
echo format_comment($language["GAB_INFO"]);
}
elseif(substr($page, 0, 4)=="USC"){
echo format_comment($language["USC_INFO"]);
}
elseif(substr($page, 0, 4)=="DNT"){
echo format_comment($language["DNT_INFO"]);
}
elseif(substr($page, 0, 4)=="LOT"){
echo format_comment($language["LOT_INFO"]);
}
elseif(substr($page, 0, 4)=="SBAN"){
echo format_comment($language["SBAN_INFO"]);
}
elseif(substr($page, 0, 4)=="LED"){
echo format_comment($language["LED_INFO"]);
}
elseif(substr($page, 0, 4)=="TT"){
echo format_comment($language["TT_INFO"]);
}
elseif(substr($page, 0, 4)=="DLT"){
echo format_comment($language["DLT_INFO"]);
}*/
elseif(substr($page, 0, 4)=="ATS"){
echo format_comment($language["ATS_INFO"]);
}
elseif(substr($page, 0, 4)=="SBET"){
echo format_comment($language["SBET_INFO"]);
}
/*elseif(substr($page, 0, 4)=="SOFF"){
echo format_comment($language["SOFF_INFO"]);
}
elseif(substr($page, 0, 4)=="SSDJ"){
echo format_comment($language["SSDJ_INFO"]);
}
elseif(substr($page, 0, 4)=="MSPY"){
echo format_comment($language["MSPY_INFO"]);
}
elseif(substr($page, 0, 4)=="DRC"){
echo format_comment($language["DRC_INFO"]);
}
elseif(substr($page, 0, 4)=="SBU"){
echo format_comment($language["SBU_INFO"]);
}
elseif(substr($page, 0, 4)=="ANU"){
echo format_comment($language["ANU_INFO"]);
}
elseif(substr($page, 0, 4)=="TL"){
echo format_comment($language["TL_INFO"]);
}
elseif(substr($page, 0, 4)=="EWT"){
echo format_comment($language["EWT_INFO"]);
}
elseif(substr($page, 0, 4)=="BC"){
echo format_comment($language["BC_INFO"]);
}
elseif(substr($page, 0, 4)=="ADTC"){
echo format_comment($language["ADTC_INFO"]);
}
elseif(substr($page, 0, 4)=="SMWR"){
echo format_comment($language["SMWR_INFO"]);
}
elseif(substr($page, 0, 4)=="BBUT"){
echo format_comment($language["BBUT_INFO"]);
}
elseif(substr($page, 0, 4)=="REDI"){
echo format_comment($language["REDI_INFO"]);
}
elseif(substr($page, 0, 4)=="SSPF"){
echo format_comment($language["SSPF_INFO"]);
}
elseif(substr($page, 0, 4)=="SUBT"){
echo format_comment($language["SUBT_INFO"]);
}
elseif(substr($page, 0, 4)=="TNR"){
echo format_comment($language["TNR_INFO"]);
}
elseif(substr($page, 0, 4)=="DUPA"){
echo format_comment($language["DUPA_INFO"]);
}
elseif(substr($page, 0, 4)=="HUSR"){
echo format_comment($language["HUSR_INFO"]);
}
elseif(substr($page, 0, 4)=="TWUP"){
echo format_comment($language["TWUP_INFO"]);
}
elseif(substr($page, 0, 4)=="TORM"){
echo format_comment($language["TORM_INFO"]);
}
elseif(substr($page, 0, 4)=="UMED"){
echo format_comment($language["UMED_INFO"]);
}
elseif(substr($page, 0, 4)=="NFO"){
echo format_comment($language["NFO_INFO"]);
}
elseif(substr($page, 0, 4)=="ISAX"){
echo format_comment($language["ISAX_INFO"]);
}
elseif(substr($page, 0, 4)=="BOM"){
echo format_comment($language["BOM_INFO"]);
}
elseif(substr($page, 0, 4)=="TEAM"){
echo format_comment($language["TEAM_INFO"]);
}
elseif(substr($page, 0, 4)=="CLT"){
echo format_comment($language["CLT_INFO"]);
}
elseif(substr($page, 0, 4)=="SMFB"){
echo format_comment($language["SMFB_INFO"]);
}
elseif(substr($page, 0, 4)=="PS"){
echo format_comment($language["PS_INFO"]);
}
elseif(substr($page, 0, 4)=="LCOM"){
echo format_comment($language["LCOM_INFO"]);
}
elseif(substr($page, 0, 4)=="ACPA"){
echo format_comment($language["ACPA_INFO"]);
}
elseif(substr($page, 0, 4)=="LRBS"){
echo format_comment($language["LRBS_INFO"]);
}
elseif(substr($page, 0, 4)=="ACPG"){
echo format_comment($language["ACPG_INFO"]);
}
elseif(substr($page, 0, 4)=="HOS"){
echo format_comment($language["HOS_INFO"]);
}
elseif(substr($page, 0, 4)=="UMUL"){
echo format_comment($language["UMUL_INFO"]);
}
elseif(substr($page, 0, 4)=="TBAR"){
echo format_comment($language["TBAR_INFO"]);
}
elseif(substr($page, 0, 4)=="DUUD"){
echo format_comment($language["DUUD_INFO"]);
}
elseif(substr($page, 0, 4)=="DBP"){
echo format_comment($language["DBP_INFO"]);
}
elseif(substr($page, 0, 4)=="VWDP"){
echo format_comment($language["VWDP_INFO"]);
}
elseif(substr($page, 0, 4)=="COML"){
echo format_comment($language["COML_INFO"]);
}
elseif(substr($page, 0, 4)=="FAQ"){
echo format_comment($language["FAQ_INFO"]);
}
elseif(substr($page, 0, 4)=="GIFT"){
echo format_comment($language["GIFT_INFO"]);
}
elseif(substr($page, 0, 4)=="HLAN"){
echo format_comment($language["HLAN_INFO"]);
}
elseif(substr($page, 0, 4)=="HSTY"){
echo format_comment($language["HSTY_INFO"]);
}
elseif(substr($page, 0, 4)=="BBEN"){
echo format_comment($language["BBEN_INFO"]);
}
elseif(substr($page, 0, 4)=="AANN"){
echo format_comment($language["AANN_INFO"]);
}
elseif(substr($page, 0, 4)=="SCON"){
echo format_comment($language["SCON_INFO"]);
}
elseif(substr($page, 0, 4)=="BDAY"){
echo format_comment($language["BDAY_INFO"]);
}
elseif(substr($page, 0, 4)=="PBAN"){
echo format_comment($language["PBAN_INFO"]);
}
elseif(substr($page, 0, 4)=="IFD"){
echo format_comment($language["IFD_INFO"]);
}
elseif(substr($page, 0, 4)=="PAS"){
echo format_comment($language["PAS_INFO"]);
}
elseif(substr($page, 0, 4)=="VPD"){
echo format_comment($language["VPD_INFO"]);
}
elseif(substr($page, 0, 4)=="DPS"){
echo format_comment($language["DPS_INFO"]);
}
elseif(substr($page, 0, 4)=="URIG"){
echo format_comment($language["URIG_INFO"]);
}
elseif(substr($page, 0, 4)=="PTS"){
echo format_comment($language["PTS_INFO"]);
}
elseif(substr($page, 0, 4)=="UNOT"){
echo format_comment($language["UNOT_INFO"]);
}
elseif(substr($page, 0, 4)=="ASS"){
echo format_comment($language["ASS_INFO"]);
}
elseif(substr($page, 0, 4)=="BCD"){
echo format_comment($language["BCD_INFO"]);
}
elseif(substr($page, 0, 4)=="UPCO"){
echo format_comment($language["UPCO_INFO"]);
}
elseif(substr($page, 0, 4)=="IPCO"){
echo format_comment($language["IPCO_INFO"]);
}
elseif(substr($page, 0, 4)=="AVUP"){
echo format_comment($language["AVUP_INFO"]);
}
elseif(substr($page, 0, 4)=="FFAQ"){
echo format_comment($language["FFAQ_INFO"]);
}
elseif(substr($page, 0, 4)=="ROD"){
echo format_comment($language["ROD_INFO"]);
}
elseif(substr($page, 0, 4)=="FAT"){
echo format_comment($language["FAT_INFO"]);
}
elseif(substr($page, 0, 4)=="OREN"){
echo format_comment($language["OREN_INFO"]);
}
elseif(substr($page, 0, 4)=="SCL"){
echo format_comment($language["SCL_INFO"]);
}
elseif(substr($page, 0, 4)=="SEOP"){
echo format_comment($language["SEOP_INFO"]);
}
elseif(substr($page, 0, 4)=="SCTD"){
echo format_comment($language["SCTD_INFO"]);
}
elseif(substr($page, 0, 4)=="DURD"){
echo format_comment($language["DURD_INFO"]);
}
elseif(substr($page, 0, 4)=="RETO"){
echo format_comment($language["RETO_INFO"]);
}
elseif(substr($page, 0, 4)=="UIMG"){
echo format_comment($language["UIMG_INFO"]);
}
elseif(substr($page, 0, 4)=="DDOW"){
echo format_comment($language["DDOW_INFO"]);
}
elseif(substr($page, 0, 4)=="ABME"){
echo format_comment($language["ABME_INFO"]);
}*/
elseif(substr($page, 0, 4)=="CBT"){
echo format_comment($language["CBT_INFO"]);
}
/*elseif(substr($page, 0, 4)=="MTS"){
echo format_comment($language["MTS_INFO"]);
}
elseif(substr($page, 0, 4)=="UWL"){
echo format_comment($language["UWL_INFO"]);
}
elseif(substr($page, 0, 4)=="PARP"){
echo format_comment($language["PARP_INFO"]);
}
elseif(substr($page, 0, 4)=="SIMT"){
echo format_comment($language["SIMT_INFO"]);
}
elseif(substr($page, 0, 4)=="FSSL"){
echo format_comment($language["FSSL_INFO"]);
}
elseif(substr($page, 0, 4)=="ADDT"){
echo format_comment($language["ADDT_INFO"]);
}*/
elseif(substr($page, 0, 4)=="XTD"){
echo format_comment($language["XTD_INFO"]);
}

else{
echo"<h5>".$language['MENU_INFO']."</h5>
<table width=100% border=0 cellpadding=5><tr><td>
<a href='hack_info.php?page=INV'>".$language['INV_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=CMT'>".$language['CMT_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=BS'>".$language['BS_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=DH'>".$language['DH_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=SD'>".$language['SD_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=TR'>".$language['TR_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=ADS'>".$language['ADS_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=GST'>".$language['GST_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=FRH'>".$language['FRH_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=TIU'>".$language['TIU_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=WS'>".$language['WS_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=HR'>".$language['HR_MENU']."</a>&nbsp; | &nbsp;<!--
<a href='hack_info.php?page=RS'>".$language['RS_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=AR'>".$language['AR_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=RTU'>".$language['RTU_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=BT'>".$language['BT_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=GCO'>".$language['GCO_MENU']."</a>&nbsp; | &nbsp;-->
<a href='hack_info.php?page=IMD'>".$language['IMD_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=SP'>".$language['SP_MENU']."</a>&nbsp; | &nbsp;<!--
<a href='hack_info.php?page=RWG'>".$language['RWG_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=SSB'>".$language['SSB_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=SMT'>".$language['SMT_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=ST'>".$language['ST_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=HD'>".$language['HD_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=TRV'>".$language['TRV_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=ETD'>".$language['ETD_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=GAB'>".$language['GAB_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=USC'>".$language['USC_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=DNT'>".$language['DNT_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=LOT'>".$language['LOT_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=SBAN'>".$language['SBAN_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=LED'>".$language['LED_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=TT'>".$language['TT_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=DLT'>".$language['DLT_MENU']."</a>&nbsp; | &nbsp;-->
<a href='hack_info.php?page=ATS'>".$language['ATS_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=SBET'>".$language['SBET_MENU']."</a>&nbsp; | &nbsp;<!--
<a href='hack_info.php?page=SOFF'>".$language['SOFF_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=SSDJ'>".$language['SSDJ_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=MSPY'>".$language['MSPY_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=DRC'>".$language['DRC_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=SBU'>".$language['SBU_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=ANU'>".$language['ANU_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=TL'>".$language['TL_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=EWT'>".$language['EWT_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=BC'>".$language['BC_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=ADTC'>".$language['ADTC_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=SMWR'>".$language['SMWR_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=BBUT'>".$language['BBUT_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=REDI'>".$language['REDI_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=SSPF'>".$language['SSPF_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=SUBT'>".$language['SUBT_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=TNR'>".$language['TNR_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=DUPA'>".$language['DUPA_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=HUSR'>".$language['HUSR_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=TWUP'>".$language['TWUP_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=TORM'>".$language['TORM_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=UMED'>".$language['UMED_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=NFO'>".$language['NFO_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=ISAX'>".$language['ISAX_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=BOM'>".$language['BOM_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=TEAM'>".$language['TEAM_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=CLT'>".$language['CLT_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=SMFB'>".$language['SMFB_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=PS'>".$language['PS_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=LCOM'>".$language['LCOM_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=ACPA'>".$language['ACPA_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=LRBS'>".$language['LRBS_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=ACPG'>".$language['ACPG_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=HOS'>".$language['HOS_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=UMUL'>".$language['UMUL_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=TBAR'>".$language['TBAR_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=DUUD'>".$language['DUUD_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=DBP'>".$language['DBP_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=VWDP'>".$language['VWDP_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=COML'>".$language['COML_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=FAQ'>".$language['FAQ_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=GIFT'>".$language['GIFT_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=HLAN'>".$language['HLAN_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=HSTY'>".$language['HSTY_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=BBEN'>".$language['BBEN_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=AANN'>".$language['AANN_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=SCON'>".$language['SCON_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=BDAY'>".$language['BDAY_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=PBAN'>".$language['PBAN_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=IFD'>".$language['IFD_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=PAS'>".$language['PAS_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=VPD'>".$language['VPD_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=DPS'>".$language['DPS_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=URIG'>".$language['URIG_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=PTS'>".$language['PTS_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=UNOT'>".$language['UNOT_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=ASS'>".$language['ASS_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=BCD'>".$language['BCD_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=UPCO'>".$language['UPCO_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=IPCO'>".$language['IPCO_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=AVUP'>".$language['AVUP_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=FFAQ'>".$language['FFAQ_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=ROD'>".$language['ROD_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=FAT'>".$language['FAT_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=OREN'>".$language['OREN_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=SCL'>".$language['SCL_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=SEOP'>".$language['SEOP_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=SCTD'>".$language['SCTD_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=DURD'>".$language['DURD_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=RETO'>".$language['RETO_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=UIMG'>".$language['UIMG_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=DDOW'>".$language['DDOW_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=ABME'>".$language['ABME_MENU']."</a>&nbsp; | &nbsp;-->
<a href='hack_info.php?page=CBT'>".$language['CBT_MENU']."</a><!--&nbsp; | &nbsp;
<a href='hack_info.php?page=MTS'>".$language['MTS_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=UWL'>".$language['UWL_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=PARP'>".$language['PARP_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=SIMT'>".$language['SIMT_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=FSSL'>".$language['FSSL_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page=ADDT'>".$language['ADDT_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>&nbsp; | &nbsp;
<a href='hack_info.php?page='>".$language['_MENU']."</a>-->&nbsp; | &nbsp;
<a href='hack_info.php?page=XTD'>".$language['XTD_MENU']."</a>
</td>
</tr></table>
<br>
<table width=100% border=0 cellpadding=5>
<tr>
<td><font style='text-shadow:rgba(0,0,0,0.5) -1px 0, rgba(0,0,0,0.3) 0 -1px, rgba(255,255,255,0.5) 0 1px, rgba(0,0,0,0.3) -1px -2px;font-size: 24px;font-weight: bolder;color:white;'>
<center>".$language['MENU_FM']."</center></font></td></tr></table>";
}
?>