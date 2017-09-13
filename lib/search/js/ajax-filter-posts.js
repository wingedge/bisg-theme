jQuery(document).ready(function($) {  
	$('#bi-search-btn').on('click',function(){
        $('#posttype_search').keyup();
    });

    $('#posttype_search').keyup(function () {
        if($('#posttype_search').val().length > 3) 
        {
          var s = $('input[id="posttype_search"]').val();
          //alert(s);
            $('#loading').show().html('<img src="/wp-content/themes/bisgtheme/lib/search/images/loading.gif"> <h4>Searching..</h4>');
           
           //$('#loading').html('<img src="'+site_url+'/wp-content/themes/bisgtheme/lib/search/images/loading.gif"><br><h4>Searching..</h4>');

            
    		// Prevent defualt action - opening tag page
    		/*
            if (event.preventDefault) {
    			event.preventDefault();
    		} else {
    			event.returnValue = false;
    		}*/
    
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
    				$('#loading').html('').hide();
    				$('#tagged-posts').html( data );
    				$('#tagged-posts').fadeIn(0.001);
    				//console.log( textStatus );
    				//console.log( XMLHttpRequest );
    			},
    			error: function( MLHttpRequest, textStatus, errorThrown ) {
    				$('#loading').html('').hide();
    				//console.log( MLHttpRequest );
    				//console.log( textStatus );
    				//console.log( errorThrown );
    				$('#tagged-posts').html( 'No Results found' );
    				$('#tagged-posts').fadeIn(0.001);
    			}
    		})
    		
    		$('#tagged-posts').blur(function(){
                //$('#tagged-posts').html('').fadeOut(0.001);
                $('#tagged-posts').fadeOut(0.001);
                $(this).val('');
            });

        }
        else { 
            //$('#tagged-posts').html('').fadeOut(0.001);
            $('#tagged-posts').fadeOut(0.001);
        }
        
	});

    $(document).mouseup(function(e) 
    {
        var container = $("#tagged-posts");
        // if the target of the click isn't the container nor a descendant of the container
        if (!container.is(e.target) && container.has(e.target).length === 0) 
        {
            container.hide();
        }
    });
});