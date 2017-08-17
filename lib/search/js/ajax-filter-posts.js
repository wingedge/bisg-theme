jQuery(document).ready(function($) {  
	$('#posttype_search').keyup(function () {
        if($('#posttype_search').val().length > 3) 
        {
          var s = $('input[id="posttype_search"]').val();
          //alert(s);
      
           
           $('#loading').html('<img src="/wp-content/themes/bisgtheme/img/loading.gif"><br><h4>Searching..</h4>');
            
    		// Prevent defualt action - opening tag page
    		if (event.preventDefault) {
    			event.preventDefault();
    		} else {
    			event.returnValue = false;
    		}
    
    		// Get tag slug from value attirbute
    		var selecetd_taxonomy = $(this).attr('value');
    
    		 $('#tagged-posts').fadeOut(0.001);
    
    		data = {
    			action: 'filter_posts',
    			afp_nonce: afp_vars.afp_nonce,
    			s_string: s,
    		};
    
    		$.ajax({
    			type: 'post', 
    			dataType: 'json',
    			url: afp_vars.afp_ajax_url,
    			data: data,
    			success: function( data, textStatus, XMLHttpRequest ) {
    				$('#loading').html('');
    				$('#tagged-posts').html( data );
    				$('#tagged-posts').fadeIn(0.001);
    				console.log( textStatus );
    				console.log( XMLHttpRequest );
    			},
    			error: function( MLHttpRequest, textStatus, errorThrown ) {
    				$('#loading').html('');
    				console.log( MLHttpRequest );
    				console.log( textStatus );
    				console.log( errorThrown );
    				$('#tagged-posts').html( 'No Results found' );
    				$('#tagged-posts').fadeIn(0.001);
    			}
    		})
    		
    		$('#posttype_search').blur(function(){
                $('#tagged-posts').html('');
                $(this).val('');
            });

        }
        else { $('#tagged-posts').html('');}
        
	});
});