<?php
 function qtm_chapterhadith(){
	
	$chapter = sanitize_text_field($_POST['chapter']);

	$url_chapter = HADITH_PLUGIN_URL.'data/chapters/'.$chapter.'.html';
?>	 
<script>
jQuery(document).ready(function($){
$('.hadith_content').load('<?php echo $url_chapter;?>',function(){
	console.log("bukhari hadiths charged");
});
});

jQuery("html, body").animate({ scrollTop: 0 }, "fast");
</script>
<?php
	die();
 }
?>