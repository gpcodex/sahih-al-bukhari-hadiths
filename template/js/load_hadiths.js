jQuery(document).ready(function($){
	
	
/*************************************************LOAD CHAPTER HADITH BUKHARI**********************************************************/
      $('.chaptershadith').on("change", function(){
		$('.loader_hadith').show();
		$('.hadith_content').css('opacity', '0.3');
        var chapter = $(this).val();

          jQuery.post(
              ajaxurl,
              {
                    'action': 'qtm_chapterhadith',
                    'chapter': chapter
              },
            function(response){
			  $('.hadith_content').css('opacity', '1');
			  $('.backchapter').show();	  
			  $('.loader_hadith').fadeOut(800);
              $('.hadith_content').html(response);			  
            }
          );
				  
		  
      });	
	 
});