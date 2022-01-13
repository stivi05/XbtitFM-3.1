<div align="center">
  <form action="index.php" name="ricerca" method="get">
  <input type="hidden" name="page" value="users" />
    <table border="0" class="lista">
      <tr>
        <td class="block"><tag:language.FIND_USER /></td>
        <td class="block"><tag:language.USER_LEVEL /></td>
        <td class="block">&nbsp;</td>
      </tr>
      <tr>
        <td><input type="text" name="searchtext" size="30" maxlength="50" value="<tag:users_search />" /><if:pun_enabled> <tag:language.PREUS_PUN /> <input type="checkbox" name="previous_usernames"<if:pun_checked> checked="checked"</if:pun_checked> /></if:pun_enabled></td>
        <td><select name="level">
            <option value="0" <tag:users_search_level />><tag:language.ALL /></option>
            <tag:users_search_select />
            </select>
        </td>
        <td><input type="submit" class="btn" value="<tag:language.SEARCH />" /></td>
      </tr>

      <if:view_client_search>
      <tr>
        <td colspan="2" class="block"><tag:language.CLIENT /></td>
        <td class="block"><tag:language.PORT />Port</td>
      </tr>
      <tr>
        <td colspan=2><input type="text" name="client" size="48" maxlength="100" value="<tag:client />" /></td>
        <td><input type="text" name="port" size="5" maxlength="5" value="<tag:port />" /></td>
      </tr>
      <else:view_client_search>
      </if:view_client_search>
    </table>
  </form>
  <tag:users_pagertop />
    <table class="lista" width="95%">
      <tr>
        <td class="header" align="center"><tag:users_sort_username /></td>
        <td class="header" align="center"><tag:users_sort_userlevel /></td>
        <if:user_reputation>
        <td class="header" align="center"><tag:language.REP /></td>
        <else:user_reputation>
        </if:user_reputation>
        <if:warn_enabled>
        <td class="header" align="center"><tag:language.WS_WL /></td>
        </if:warn_enabled>

        <td class="header" align="center"><tag:users_sort_joined /></td>
        <td class="header" align="center"><tag:users_sort_lastaccess /></td>
        <td class="header" align="center"><tag:users_sort_country /></td>
        <if:ip2c_enabled1>
        <td class="header" align="center"><tag:rcountry /></td>
        </if:ip2c_enabled1>
        <td class="header" align="center"><tag:users_sort_ratio /></td>
        <td class="header" align="center"><tag:users_pm /></td>
        <if:ban_button_enabled>
        <td class="header" align="center"><tag:users_ban /></td>
        </if:ban_button_enabled>
        <if:privprof_enabled>
        <td class="header" align="center"><tag:language.PP_PROFILE /></td>
        </if:privprof_enabled>
        <td class="header" align="center"><tag:users_edit /></td>
        <td class="header" align="center"><tag:users_delete /></td>
      </tr>
      <if:no_users>
        <tr>
          <td class="lista" colspan="9"><tag:language.NO_USERS_FOUND /></td>
        </tr>
      <else:no_users>
        <loop:users>
          <tr>
            <td class="lista" align="center" style="padding-left:10px;"><tag:users[].username /><if:user_img_enabled><tag:users[].user_images /></if:user_img_enabled></td>
            <td class="lista" align="center" style="text-align: center;"><tag:users[].userlevel /></td>
            <if:user_reputation>
            <td class="lista" align="center" style="text-align: center;"><tag:users[].reput /></td>
            <else:user_reputation>
            </if:user_reputation>
        <if:warn_enabled2>
        <td class="lista" align="center" style="text-align: center;"><tag:users[].warns /></td>
        </if:warn_enabled2>

            <td class="lista" align="center" style="text-align: center;"><tag:users[].joined /></td>
            <td class="lista" align="center" style="text-align: center;"><tag:users[].lastconnect /></td>
            <td class="lista" align="center" style="text-align: center;"><tag:users[].flag /></td>
            <if:ip2c_enabled2>
            <td class="lista" align="center" style="text-align: center;"><tag:users[].country /></td>
            </if:ip2c_enabled2>
            <td class="lista" align="center" style="text-align: center;"><tag:users[].ratio /></td>
            <td class="lista" align="center" style="text-align: center;"><tag:users[].pm /></td>
            <if:ban_button_enabled2>
            <td class="lista" align="center" style="text-align: center;"><tag:users[].ban /></td>
            </if:ban_button_enabled2>
            <if:privprof_enabled2>
            <td class="lista" align="center" style="text-align: center;"><tag:users[].private /></td>
            </if:privprof_enabled2>
            <td class="lista" align="center" style="text-align: center;"><tag:users[].edit /></td>
            <td class="lista" align="center" style="text-align: center;"><tag:users[].delete /></td>
          </tr>
        </loop:users>
      </if:no_users>
    </table>
</div>
<br />