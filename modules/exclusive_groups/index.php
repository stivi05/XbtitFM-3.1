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

ob_start();


if(!$CURUSER || $CURUSER["can_upload"] == "no") {

    err_msg($language["SORRY"], $language["ERROR"].$language["NOT_AUTHORIZED"]);
    $module_out=ob_get_contents();
    ob_end_clean();
    die();
    
} else {

    
    $action=isset($_GET["action"])?htmlentities($_GET["action"]):$action='';
    
    switch ($action) {
        
        case 'savedit':
            save_edit();
        break;  
        
        case 'addnew':
            add_new();
        break;
        
        case 'add':
            main_add();
        break;
        
        case 'edit':
            edit_current();
        break;
        
        case '':
        default:
            maindisplay();
        break;
            
    }

}

function save_edit() {
    
    global $TABLE_PREFIX, $CURUSER;    
    
    if ($CURUSER['id_level']!=8) {
        err_msg($language["SORRY"], $language["ERROR"].$language["NOT_AUTHORIZED"]);
        $module_out=ob_get_contents();
        ob_end_clean();
        die();
    }
        
    

    
    // whitelist users
    if (isset($_POST['chosen']) && isset($_POST['group_description'])) {
        $chosen=join(',',$_POST['chosen']);
        $description=sqlesc($_POST['group_description']);
        do_sqlquery("UPDATE {$TABLE_PREFIX}whitelisted_groups SET description=".$description.", users='".$chosen."' WHERE id=".(int)$_POST['groupid']);
    }
    
    // whitelist users
    redirect("index.php?page=modules&module=exclusive_groups");
    die();    
}

function edit_current() {
    global $TABLE_PREFIX, $CURUSER;
    
    if ($CURUSER['id_level']!=8) {
        err_msg($language["SORRY"], $language["ERROR"].$language["NOT_AUTHORIZED"]);
        $module_out=ob_get_contents();
        ob_end_clean();
        die();
    }
    

    $rowsgroup=get_result("SELECT * FROM {$TABLE_PREFIX}whitelisted_groups WHERE id='".(int)($_GET["id"])."' LIMIT 1");
    $rowsgroup=$rowsgroup[0];
    // select all users except myself and guest and allready selected
    if (empty($rowsgroup))
        $rowsavail=get_result("SELECT id, username FROM {$TABLE_PREFIX}users WHERE id NOT IN (1,".$CURUSER['uid'].") ORDER BY username");
    else
        $rowsavail=get_result("SELECT id, username FROM {$TABLE_PREFIX}users WHERE id NOT IN (1,".$CURUSER['uid'].",".$rowsgroup['users'].") ORDER BY username");
        
    foreach($rowsavail as $id => $rowavail) {
        $avail_select.="\r\n".'<option value="'.$rowavail['id'].'">'.$rowavail['username'].'</option>';
    }
    
    $rowschoosen=get_result("SELECT id, username FROM {$TABLE_PREFIX}users WHERE id IN (".$rowsgroup['users'].") ORDER BY username");
    foreach($rowschoosen as $id => $rowchoosen) {
        $choosen_select.="\r\n".'<option value="'.$rowchoosen['id'].'">'.$rowchoosen['username'].'</option>';
    }
    
    ?>
<!-- whitelist group  -->
<script type="text/javascript">

function form_submit(form) { 
    
    desc = document.getElementById('group_description');
    
    if (desc.value.length==0) {
        alert ('Description is mandatory!');
        return false;
    }
    
        
    e = document.getElementById('chosen'); 
    if(e) { o = e.options; 
        for(var i=0; i<o.length; i++) 
            o[i].selected =true; 
    }
    
    return true; 
}

function shuttle(id1, id2) { 
    var el1 = document.getElementById(id1); 
    var el2 = document.getElementById(id2); 
    for(var i=0; i<el1.options.length; i++) { 
        if (el1.options[i].selected) { 
            el2.options[el2.options.length] = new Option(el1.options[i].text, el1.options[i].value); 
            el1.options[i] = null; 
            i--; 
        } 
    } 
}

</script>
<form method="post" onsubmit="return form_submit(this);" action="index.php?page=modules&module=exclusive_groups&action=savedit" name="newgroup" id="newgroup" enctype="multipart/form-data">
    <input type="hidden" name="groupid" value="<?php echo $rowsgroup['id'] ?>" />
    <table class="lista" style="width:100%;">    
        <tr>
            <td class="header">Make a new Exclusive Group</td>
        </tr>
        <tr>
            <td class="lista">Group Description: <input type="text" style="width: 100%;" name="group_description" id="group_description" value="<?php echo $rowsgroup['description']; ?>" /></td>
        </tr>
        <tr>
            <td class="lista" style="text-align: center;">
                <table style="border: none; text-align: center;">
                <tbody>
                <tr>
                    <th style="vertical-align: top; text-align: center;">Available Users<br />
                        <select id="avail" name="avail[]" multiple="" size="30" style="width: 400px" ondblclick="shuttle('avail', 'chosen')">
                            <?php echo $avail_select; ?>
                        </select>
                    </th>
                    <th style="vertical-align: middle; text-align: center;">
                        <input type="button" onclick="shuttle('avail', 'chosen')" value="&gt;" />
                        <br />
                        <br />
                        <input type="button" onclick="shuttle('chosen', 'avail')" value="&lt;" />
                    </th>
                    <th style="vertical-align: top; text-align: center;">Exclusive Users in this Group<br />
                        <select id="chosen" name="chosen[]" multiple="" size="30" style="width: 400px" ondblclick="shuttle('chosen', 'avail')">
                            <?php echo $choosen_select; ?>
                        </select>
                    </th>
                </tr>
                </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td class="header" style="text-align: right;"><input type="button" name="cancel" value="Cancel" onclick="history.back();" />&nbsp;<input type="submit" name="save" value="Submit" /></td>
        </tr>
    <!-- whitelist group -->
    </table>    
</form>
    <?php
    
}

function add_new() {
    global $TABLE_PREFIX, $CURUSER;
    
    // whitelist users
    if (isset($_POST['chosen']) && isset($_POST['group_description'])) {
        $chosen=join(',',$_POST['chosen']);
        $description=sqlesc($_POST['group_description']);
        $creator=(int)$CURUSER['uid'];
        $newdate=time();
        do_sqlquery("INSERT INTO {$TABLE_PREFIX}whitelisted_groups (description, users, creator, creation_date) VALUES (".$description.",'".$chosen."', ".$creator.", ". $newdate.")");
    }
    
    // whitelist users
    redirect("index.php?page=modules&module=exclusive_groups");
    die();
}

function main_add() {
    global $TABLE_PREFIX, $CURUSER;

    $rowsavail=get_result("SELECT id, username FROM {$TABLE_PREFIX}users WHERE id>1 AND id<>".$CURUSER['uid']." ORDER BY username");
    $avail_select='';
    
    foreach($rowsavail as $id => $rowavail) {
        $avail_select.="\r\n".'<option value="'.$rowavail['id'].'">'.$rowavail['username'].'</option>';
    }
    
    ?>
<!-- whitelist group  -->
<script type="text/javascript">

function form_submit(form) { 
    
    desc = document.getElementById('group_description');
    
    if (desc.value.length==0) {
        alert ('Description is mandatory!');
        return false;
    }
    
        
    e = document.getElementById('chosen'); 
    if(e) { o = e.options; 
        for(var i=0; i<o.length; i++) 
            o[i].selected =true; 
    }
    
    return true; 
}

function shuttle(id1, id2) { 
    var el1 = document.getElementById(id1); 
    var el2 = document.getElementById(id2); 
    for(var i=0; i<el1.options.length; i++) { 
        if (el1.options[i].selected) { 
            el2.options[el2.options.length] = new Option(el1.options[i].text, el1.options[i].value); 
            el1.options[i] = null; 
            i--; 
        } 
    } 
}

</script>
<form method="post" onsubmit="return form_submit(this);" action="index.php?page=modules&module=exclusive_groups&action=addnew" name="newgroup" id="newgroup" enctype="multipart/form-data">
    <table class="lista" style="width:100%;">    
        <tr>
            <td class="header">Make a new Exclusive Group</td>
        </tr>
        <tr>
            <td class="lista">Group Description: <input type="text" style="width: 100%;" name="group_description" id="group_description" value="" /></td>
        </tr>
        <tr>
            <td class="lista" style="text-align: center;">
                <table style="border: none; text-align: center;">
                <tbody>
                <tr>
                    <th style="vertical-align: top; text-align: center;">Available Users<br />
                    <select id="avail" name="avail[]" multiple="" size="30" style="width: 400px" ondblclick="shuttle('avail', 'chosen')">
                        <?php echo $avail_select; ?>
                    </select>
                    </th>
                    <th style="vertical-align: middle; text-align: center;">
                        <input type="button" onclick="shuttle('avail', 'chosen')" value="&gt;" />
                        <br />
                        <br />
                        <input type="button" onclick="shuttle('chosen', 'avail')" value="&lt;" />
                    </th>
                    <th style="vertical-align: top; text-align: center;">Exclusive Users in this Group<br />
                        <select id="chosen" name="chosen[]" multiple="" size="30" style="width: 400px" ondblclick="shuttle('chosen', 'avail')">
                        </select>
                    </th>
                </tr>
                </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td class="header" style="text-align: right;"><input type="button" name="cancel" value="Cancel" onclick="history.back();" />&nbsp;<input type="submit" name="save" value="Submit" /></td>
        </tr>
    <!-- whitelist group -->
    </table>    
</form>
    <?php
    
}


function maindisplay() {
    global $TABLE_PREFIX, $CURUSER;
    
    $groupres=get_result("SELECT wg.*, u.username FROM {$TABLE_PREFIX}whitelisted_groups wg LEFT JOIN {$TABLE_PREFIX}users u ON u.id=wg.creator ORDER BY ID");
    
    ?>
    
    <table class="lista" style="width:100%;">
        <tr>
            <td colspan="5" class="header"><a href="index.php?page=modules&module=exclusive_groups&action=add">Add New</a></td>
        </tr>
        <tr>
            <td class="header" style="width: 18%;">
                Author
            </td>
            <td class="header" style="width: 10%;">
                Creation Date
            </td>
            <td class="header" style="width: 60%;">
                Description
            </td>
            <td class="header" style="width: 10%;">
                Num. Users
            </td>
            <td class="header" style="width: 2%;">&nbsp;</td>
        </tr>
    <?php
    if (count($groupres)>0) {
        foreach ($groupres as $id => $group) {
    ?>
        <tr>
            <td class="lista">
                <?php echo $group['username']; ?>
            </td>
            <td class="lista">
                <?php echo date('d/m/Y',$group['creation_date']); ?>
            </td>
            <td class="lista">
                <?php echo $group['description']; ?>
            </td>
            <td class="lista">
                <?php echo count(explode(',',$group['users'])); ?>
            </td>
            <td>
                <a <?php if ($CURUSER['id_level']!=8) { ?> style="pointer-events: none; cursor: default;" <?php } ?> href="index.php?page=modules&module=exclusive_groups&action=edit&id=<?php echo $group['id']; ?>">Edit</a>
            </td>
        </tr>
    <?php           
        }
    } else {
    ?>
        <tr>
            <td class="lista" colspan="4" style="text-align: center">No Group found here...</td>
        </tr>
    <?php
    }
    ?>    
    </table>
    
    <?php

}



$module_out=ob_get_contents();
ob_end_clean();


?>