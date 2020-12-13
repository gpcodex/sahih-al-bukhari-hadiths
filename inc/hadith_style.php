<?php
defined( 'ABSPATH' ) or die( 'Salem aleykoum!' );
?>

<style>

@media only screen and (max-width: 780px) {
	.hadithenglish{width:100% !important;}
	.arabic{
		width:100% !important;
		margin-left: 0px !important;
		margin-top:0px !important;
		padding:5px !important;
	}
}

.chapters_hadith td span{width:100%;display:block;text-decoration: none !important;color:#000;}
.chapters_hadith td span:hover{width:100%;display:block;text-decoration: none !important;color:#000;cursor:pointer;}

.arabic{
box-sizing: border-box;
font-family: KFGQPC Uthman Taha Naskh, KFGQPC Uthmanic Script HAFS, Scheherazade, Trebuchet MS, Arial, Helvetica;
font-size: 19px;
width:49%;
float:left;
padding:20px;
direction: ltr;
text-align: justify;	
margin-top:75px;
}


.hadithenglish{
box-sizing: border-box;
width:49%;float:left;padding:20px;
}



.title_arabic{
	font-family: KFGQPC Uthman Taha Naskh, KFGQPC Uthmanic Script HAFS, Scheherazade, Trebuchet MS, Arial, Helvetica;
	direction:ltr;
	float:right;
	vertical-align: middle;
	font-size: 18px;
}
.chapters_hadith td{
	text-align:left;
	border:none;
	font-size: 18px;
}
.chapters_hadith th{
	vertical-align: middle;
}
.backchapter{display:none}
img.loader_hadith{
  position: fixed;
  z-index: 999;
  height: 5em;
  width: 5em;
  overflow: show;
  margin: auto;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  display:none;
}

.bloc_hadith{
	border:#<?php echo get_option('border_hadith_bloc'); ?> 1px solid;
	background:#<?php echo get_option('background_hadith_bloc'); ?>;
	margin-top:20px;
	border-radius: 10px;
	padding: 10px;
}
.chaptershadith{
height: 50px;
font-size: 19px;
display: block;
margin: 0 auto;
font-family: KFGQPC Uthman Taha Naskh, KFGQPC Uthmanic Script HAFS, Scheherazade, Trebuchet MS, Arial, Helvetica;
}
.hadithenglish > p:first-child {
    background: #<?php echo get_option('background_hadith_ref'); ?>;
    color: #<?php echo get_option('color_hadith_ref'); ?>;
    padding: 5px;
    width: 250px;
    text-align: center;
    border-radius: 5px;
}
<?php echo get_option('hadith_custum_css'); ?>
</style>
