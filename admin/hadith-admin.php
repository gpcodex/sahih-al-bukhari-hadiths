<?php

if (current_user_can('activate_plugins')) {

defined( 'ABSPATH' ) or die( 'Salem aleykoum!' );

    wp_register_script('hadith_admin_color',plugin_dir_url( __FILE__ ).'js/jscolor/jscolor.js');	

	wp_enqueue_script('hadith_admin_color');


	if(isset($_POST['kb_hadith_update'])){

		if(!wp_verify_nonce($_POST['kb_hadith_noncename'], 'tplquran')){

			die('token non valide');

		}


		foreach($_POST['option'] as $name => $val){

			$value = sanitize_text_field($val);
			
			if(empty($value)){

				delete_option($name);

			}else{

				update_option($name, $value);

			}



		}

			?>

			<div id="message" class="updated fade">

			<p>Thème sauvegardé!</p>

			</div>

			<?php

	}

?>

<style>

#thadminhadith{width: auto !important;}
#borderColorHadith{display: none;}
#bloc_admin_hadith{background:#ffffff;padding:20px;color:#7a7a7a;}
#bloc_admin_hadith th{color:#7a7a7a;padding:20px;}
#bloc_admin_hadith tr:nth-child(even) {background: #F8F8F8}
#bloc_admin_hadithtr:nth-child(odd) {background: #FFF}
</style>

<div class="wrap" id="bloc_admin_hadith">

<h3>Bukhari Hadith Plugin Options</h3>



<form method="post" action="">



<?php settings_fields( 'quran-options' ); ?>


<table class="form-table">




<tr valign="top" id="borderColorHadith">
<th scope="row" id="thadminhadith">Choose border Color</th>
<td>
<input name="option[border_hadith_color]" id="text_hadith_title" class="color" value="<?php echo get_option('border_hadith_color'); ?>" />
</td>
</tr>

<tr valign="top">
<th scope="row" id="thadminhadith">border hadith bloc</th>
<td>
<input name="option[border_hadith_bloc]" id="border_hadith_bloc" class="color" value="<?php echo get_option('border_hadith_bloc'); ?>" />
</td>
</tr>

<tr valign="top">
<th scope="row" id="thadminhadith">Background hadith bloc</th>
<td>
<input name="option[background_hadith_bloc]" id="background_hadith_bloc" class="color" value="<?php echo get_option('background_hadith_bloc'); ?>" />
</td>
</tr>


<tr valign="top">
<th scope="row" id="thadminhadith">Text Color hadith Reference</th>
<td>
<input name="option[color_hadith_ref]" id="color_hadith_ref" class="color" value="<?php echo get_option('color_hadith_ref'); ?>" />
</td>
</tr>

<tr valign="top">
<th scope="row" id="thadminhadith">Background Reference</th>
<td>
<input name="option[background_hadith_ref]" id="background_hadith_ref" class="color" value="<?php echo get_option('background_hadith_ref'); ?>" />
</td>
</tr>


<tr valign="top">

<th scope="row" id="thadminhadith">Custum CSS</th>

<td>without the tag &lt;style&gt;...&lt;/style&gt;<button id="hadith_custum_css"> Click Here</button>
<p><textarea  name="option[hadith_custum_css]" id="areacsscustum" style="width: 500px; height: 150px;display:none">
<?php echo get_option('hadith_custum_css'); ?>
</textarea></p>

</td>

</tr>


</table>

<script>

jQuery(document).ready(function($){

$("#hadith_custum_css").click(function(){
        $("#areacsscustum").toggle();
        return false;
    });

	$( "input[name='submit']").val("Save")

});

</script>

<div id="button_hadith_submit">

<div style="float:right">

</div>


		<input  type="hidden" name="kb_hadith_noncename" value="<?= wp_create_nonce('tplquran');?>">

		<p class="submit"> 

		<input type="submit" name="kb_hadith_update" class="button-primary autowidth" value="Save">

		</p>

</form>
 <fieldset style="border: 1px solid #DDDBDB;padding: 15px;" id="button_quran_submit">
  <legend>You can help me in 2 ways</legend>
 <p>1- Make du'a for me to go to hajj.</p>
 <p>2- By making a donation to help me pay the server.</p>
 <p>Barak'Allah oufikoum<span style="float:right"><a href="http://gp-codex.fr/forums" target="_blank">Free support</a></span></p>
 
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="LTVQQZDXPLHU8">
<input type="image" src="https://www.paypalobjects.com/en_US/FR/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
</form>

 </fieldset>
</div>

</div>

<?php
}
?>
