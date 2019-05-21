<h1> Panda Theme Optons </h1>
<h3 class="title"> Manage Options </h3>
<p> Customize Sidebar Options </p>


<!-- register_settings in function-admin.php
 -->

 <form method="post" action=" ">
 	
 	<!-- settings_fields( $option_group ) -->
 	<?php settings_fields('panda-settings-group'); //function-admin.php line 31 ?>

 	<!-- do_settings_sections( $page ) -->
 	<?php do_settings_sections('panda_page'); ?>

 	<?php submit_button(); ?>

 </form>