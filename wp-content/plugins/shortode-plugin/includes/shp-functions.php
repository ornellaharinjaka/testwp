<?php

/*
* Shortcode to show users
*/

add_shortcode('user', 'shp_user_list');

function shp_user_list() {
    ?>
    <table width="500">
        <tr>
            <th>ID</th>
            <th>Pseudo</th>
            <th>Email</th>
            <th>Rôle</th>
            <th>Date d'inscription</th>
        </tr>

   <?php
   $users = get_users();
   /*echo "<pre>";
   var_dump($users);
   echo "</pre>";*/
   foreach( $users as $user ) { ?>
   	  <tr>
	      <td><?php echo $user->ID; ?></td>
          <td><?php echo $user->display_name; ?></td>
          <td><?php echo $user->user_email; ?></td>
          <td><?php echo $user->roles[0]; ?></td>
	      <td><?php echo date_i18n( get_option('date_format'), strtotime( $user->user_registered ) ); ?></td>
      </tr>
  <?php	
  }
  ?>
  </table>
  <?php
    }

?>