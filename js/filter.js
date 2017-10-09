;(function($){
    $.fn.extend({
        donetyping: function(callback,timeout){
            timeout = timeout || 1e3; // 1 second default timeout
            var timeoutReference,
                doneTyping = function(el){
                    if (!timeoutReference) return;
                    timeoutReference = null;
                    callback.call(el);
                };
            return this.each(function(i,el){
                var $el = $(el);
                // Chrome Fix (Use keyup over keypress to detect backspace)
                // thank you @palerdot
                $el.is(':input') && $el.on('keyup keypress paste',function(e){
                    // This catches the backspace button in chrome, but also prevents
                    // the event from triggering too preemptively. Without this line,
                    // using tab/shift+tab will make the focused element fire the callback.
                    if (e.type=='keyup' && e.keyCode!=8) return;
                    
                    // Check if timeout has been set. If it has, "reset" the clock and
                    // start over again.
                    if (timeoutReference) clearTimeout(timeoutReference);
                    timeoutReference = setTimeout(function(){
                        // if we made it here, our timeout has elapsed. Fire the
                        // callback
                        doneTyping(el);
                    }, timeout);
                }).on('blur',function(){
                    // If we can, fire the event since we're leaving the field
                    doneTyping(el);
                });
            });
        }
    });
})(jQuery);


jQuery( document ).ready( function( $ ) {
    // $() will work as an alias for jQuery() inside of this function
   	
    var showCategory;
    var postType;
	  var selectedCategory;
   	var selectedAttribute;
    var selectedECategory;
    var selectedEAttribute;
   	var selectedOrder;
   	var searchTerm;
   	var xhr;

   

   	$('.item-filters').on('click',function(){		
		  $('.cat-filters').removeClass('on');
		  $(this).addClass('on');

		  //get_selected_sort();
		  get_selected_cats();
		  get_selected_attr();

      get_selected_ecats();
      get_selected_eattr();

		  get_filtered_result();
   	});

   	$('#byterm').donetyping(function(e){
   		selectedCategory = null;
   		selectedAttribute = null;
      selectedECategory = null;
      selectedEAttribute = null;
   		searchTerm = $(this).val();

   		console.log(searchTerm);
   		get_filtered_result();
   		
   	});

   	/*function get_selected_sort(){
   		selectedSort = $(".filter-sort.on").attr('filter-sort');
   		selectedOrder = $(".filter-sort.on").attr('filter-order');
   	}*/

   	function get_selected_cats(){
   		selectedCategory = $("input.cat-filters:checkbox:checked").map(function(){
			return $(this).val();
		}).get(); // this works like .each()
   	}

    function get_selected_ecats(){
      selectedECategory = $("input.ecat-filters:checkbox:checked").map(function(){
      return $(this).val();
    }).get(); // this works like .each()
    }

   	function get_selected_attr(){
   		selectedAttribute = $("input.attr-filters:checkbox:checked").map(function(){
			return $(this).val();
		}).get(); // this works like .each()
   	}

    function get_selected_eattr(){
      selectedEAttribute = $("input.eattr-filters:checkbox:checked").map(function(){
      return $(this).val();
    }).get(); // this works like .each()
    }

   	function get_filtered_result(){
   		showCategory = $('#filterDetails').attr('show-category');
   		postType = $('#filterDetails').attr('post-type');
   		// change the content to loading
   		$('#filter-results').html( 'refreshing results ...' );		
		// don't load ajax if it is sending a request   		
   		if(xhr && xhr.readyState != 4){
            xhr.abort();
        }
        // load ajax
   		xhr = $.ajax({
			type: 'post', 			
			url: bisg.ajax_url,
			data: {action: 'filter_results',              
             postType: postType, 
             category: showCategory, 
             filterAttributes: selectedAttribute,
             filterCategory: selectedCategory,  
             filterEAttributes: selectedEAttribute,
             filterECategory: selectedECategory,               
             searchTerm: searchTerm },
			success: function( data, textStatus, XMLHttpRequest ) {
				//console.log( textStatus );
				//console.log(data);
				$('#filter-results').html( data );
				//console.log( XMLHttpRequest );
			},
			error: function( MLHttpRequest, textStatus, errorThrown ) {
				//console.log( MLHttpRequest );
				//console.log( textStatus );
				//console.log( errorThrown );
				$('#filter-results').html( 'No Results found' );
				//$('#tagged-posts').fadeIn(0.001);
			}
		})
   	}


} );