<?php

global $wpdb;

$querychapter = "SELECT * FROM bukhari_chapters";
$data = $wpdb->get_results($querychapter, ARRAY_A);
?>

<script>
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
  }
</script>

<div><img class="loader_hadith" src='<?=HADITH_PLUGIN_URL;?>template/img/loader_hadith.gif'></div>
<select name="chapters-hadith" class="chaptershadith">

<?php
if(!$_POST['chapter']){
?>
<script>
jQuery(document).ready(function($){
$('.hadith_content').load('<?php echo HADITH_PLUGIN_URL;?>data/chapters/chapter-1.html',function(){
	console.log("bukhari hadiths charged");
});
});
</script>
<?php
}

global $wpdb;
foreach ($data as $row) {

	?>
<option value="chapter-<?=$row['id_chapter'];?>"><?php echo $row['id_chapter'].': ';echo $row['name_english'].' - ';echo $row['name_arabic'];?></option>

<?php
}
?>
</select>
<div class="hadith_content">

</div>

