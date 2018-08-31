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
    var selectedPage;
    var searchTerm;
    var xhr;

    // when clicing btn-filters, show filter in modal like behaviour

    $('.btn-filters').on('click',function(){
      // show the filter
      $('.filters-box-overlay').toggleClass('displayOn');
      $('#filters-box').toggleClass('displayOn');
      

    });

    $('.clearFilters').on('click touchstart', function(){  
       $('input:checkbox').prop('checked', false);
       $('#byterm').val();
       get_selected_cats();
       get_selected_attr();

       get_selected_ecats();
       get_selected_eattr();
       get_filtered_result();
    });

    $('.item-filters').on('click',function(){   
      $('.cat-filters').removeClass('on');
      $(this).addClass('on');

      //get_selected_sort();
      get_selected_cats();
      get_selected_attr();

      get_selected_ecats();
      get_selected_eattr();

      //get_filtered_result();
    });

    $('.filters-box-overlay').on('click', function (e) {
      if ($(e.target).closest("#filters-box").length === 0) {
          $('.filters-box-overlay').toggleClass('displayOn');
          $('#filters-box').toggleClass('displayOn');
      }
    });

    $('.filter-attribute-container .filter-title').on('click',function(){
      $(this).parent().find('.attribute-child-container').toggle();
    });

    $('#byterm').donetyping(function(e){
      selectedCategory = null;
      selectedAttribute = null;
      selectedECategory = null;
      selectedEAttribute = null;
      searchTerm = $(this).val();

      console.log(searchTerm);
      //get_filtered_result();
      
    });

     
    $('.applyfilters').on('click',function(){  

      searchTerm =  $('#byterm').val();

      console.log(searchTerm);

      get_selected_cats();
      get_selected_attr();

      get_selected_ecats();
      get_selected_eattr();

      get_filtered_result();

      // remove the filter on mobile

  //    $('.filters-box-overlay').removeClass('displayOn');      
  //    $('#filters-box').removeClass('displayOn');
      

    });


    $('body').on('click','.filter-ajax-results .page-numbers' ,function(e){
      e.preventDefault();

      var href = $(this).attr('href');
      var current = href.match(/\d+/); // 123456
      
      selectedPage = parseInt(current);

      get_selected_cats();
      get_selected_attr();

      get_selected_ecats();
      get_selected_eattr();


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
             searchTerm: searchTerm,
             filterPaged: selectedPage, 
      },
      success: function( data, textStatus, XMLHttpRequest ) {
        //console.log( textStatus );
        //console.log(data);
        $('#filter-results').html( data );

        $('.filters-box-overlay').removeClass('displayOn');      
        $('#filters-box').removeClass('displayOn');
        window.scrollTo(0, 0);

        //console.log( XMLHttpRequest );
      },
      error: function( MLHttpRequest, textStatus, errorThrown ) {
        //console.log( MLHttpRequest );
        //console.log( textStatus );
        //console.log( errorThrown );
        $('#filter-results').html( 'No Results found' );

        $('.filters-box-overlay').removeClass('displayOn');      
        $('#filters-box').removeClass('displayOn');
        window.scrollTo(0, 0);
        //$('#tagged-posts').fadeIn(0.001);
      }
    })
    }

    $('#wp-submit').addClass('btn btn-primary');

} );