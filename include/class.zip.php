<?php
/////////////////////////////////////////////////////////////////////////////////////
// xbtit - Bittorrent tracker/frontend
//
// Copyright (C) 2004 - 2018  xbtitFM Team
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

class zip
{

public $errors = array();

    public function databaseConnection()
    {
		global $dbhost,$dbuser,$dbpass,$database;
        // if connection already exists
        if ($this->db_connection != null) {
            return true;
        } else {
            try {
                // Generate a database connection, using the PDO connector
                // @see http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/
                // Also important: We include the charset, as leaving it out seems to be a security issue:
                // @see http://wiki.hashphp.org/PDO_Tutorial_for_MySQL_Developers#Connecting_to_MySQL says:
                // "Adding the charset to the DSN is very important for security reasons,
                // most examples you'll see around leave it out. MAKE SURE TO INCLUDE THE CHARSET!"
                $this->db_connection = new PDO('mysql:host='. $dbhost .';dbname='. $database . ';charset=utf8', $dbuser, $dbpass);
                return true;
            } catch (PDOException $e) {
                $this->errors[] = "Database Error!!" . $e->getMessage();
            }
        }
        // default return
        return false;
    }
public function moveme($url, $permanent = false) {
	if($permanent) {
		header('HTTP/1.1 301 Moved Permanently');
	}
	header('Location: '.$url);
	exit();
}
public function clear()
{
global $TABLE_PREFIX, $tracker_version;
if ($this->databaseConnection())
$query_user = $this->db_connection->prepare('SELECT `domain`,`serialkey` FROM '.$TABLE_PREFIX.'serials');
$query_user->execute();
$check=$query_user->fetchObject();
if($check->domain=='' || $check->serialkey=='' || $check->domain!=$_SERVER["HTTP_HOST"])
{
ext_err_msg("Error Invalid License!",'<br />
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<form method="POST" action="insert_license_requested.php">
<label for="serialkey">Enter License to continue:</label>
<fieldset id="serialkey">
    <input name="key1" type="text" size="5" maxlength="5">
    <input name="key2" type="text" size="5" maxlength="5">
    <input name="key3" type="text" size="5" maxlength="5">
    <input name="key4" type="text" size="5" maxlength="5">
    <input name="key5" type="text" size="5" maxlength="5">
</fieldset>
<input type="submit" class="btn" value="Submit">
</form>
<script>
$( \'#serialkey\' ).on( \'keyup\', \'input\', function () {
    if ( this.value.length === 5 ) {
        $( this ).next().focus();
    }
});
</script>');
exit();
}
if(file_get_contents("http://xbtitfm.com/checkkey.php?domain=".$check->domain."&key=".$check->serialkey."&v=".substr($tracker_version,0,3)."")==1)
{
return false;
}
else{
ext_err_msg("Error Invalid License!",'<br />
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<form method="POST" action="insert_license_requested.php">
<label for="serialkey">Enter License to continue:</label>
<fieldset id="serialkey">
    <input name="key1" type="text" size="5" maxlength="5">
    <input name="key2" type="text" size="5" maxlength="5">
    <input name="key3" type="text" size="5" maxlength="5">
    <input name="key4" type="text" size="5" maxlength="5">
    <input name="key5" type="text" size="5" maxlength="5">
</fieldset>
<input type="submit" class="btn" value="Submit">
</form>
<script>
$( \'#serialkey\' ).on( \'keyup\', \'input\', function () {
    if ( this.value.length === 5 ) {
        $( this ).next().focus();
    }
});
</script>');
exit();
}
}
}