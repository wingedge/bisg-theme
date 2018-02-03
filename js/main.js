// custom scripts here

$j = jQuery.noConflict();

$j(document).ready(function(){
	
	$j('.slick-slider-four').slick({
		dots: false,
		arrows : true,
		nextArrow: '<i class="fa fa-arrow-right slick-right"></i>',
  		prevArrow: '<i class="fa fa-arrow-left slick-left"></i>',
		autoplay: true,
		infinite: true,
		speed: 300,
		slidesToShow: 4,
		slidesToScroll: 1,
		responsive: [
	    {
	      breakpoint: 1024,
	      settings: {
	        slidesToShow: 3,
	        slidesToScroll: 3,
	        infinite: true,
	        swipeToSlide: true,
			swipe: true,
	        dots: false
	      }
	    },
	    {
	      breakpoint: 600,
	      settings: {
	        slidesToShow: 2,
	        slidesToScroll: 2
	      }
	    },
	    {
	      breakpoint: 480,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    }
	    // You can unslick at a given breakpoint now by adding:
	    // settings: "unslick"
	    // instead of a settings object
	  ]
	});

	$j('.slick-slider-three').slick({
		dots: false,
		arrows : true,
		nextArrow: '<i class="fa fa-arrow-right slick-right"></i>',
  		prevArrow: '<i class="fa fa-arrow-left slick-left"></i>',
		autoplay: true,
		infinite: true,
		speed: 300,
		slidesToShow: 3,
		slidesToScroll: 1,
		responsive: [
	    {
	      breakpoint: 1024,
	      settings: {
	        slidesToShow: 3,
	        slidesToScroll: 3,
	        swipeToSlide: true,
			swipe: true,
	        infinite: true,
	        dots: false
	      }
	    },
	    {
	      breakpoint: 600,
	      settings: {
	        slidesToShow: 2,
	        slidesToScroll: 2
	      }
	    },
	    {
	      breakpoint: 480,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    }
	    // You can unslick at a given breakpoint now by adding:
	    // settings: "unslick"
	    // instead of a settings object
	  ]
	});

	$j('.slick-slider-one').slick({		
		dots: false,
		arrows : true,
		nextArrow: '<i class="fa fa-arrow-right slick-right"></i>',
  		prevArrow: '<i class="fa fa-arrow-left slick-left"></i>',
		autoplay: true,
		infinite: true,
		speed: 300,
		slidesToShow: 1,
		slidesToScroll: 1,
		responsive: [
	    {
	      breakpoint: 1024,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1,
	        infinite: true,	        
	        swipeToSlide: true,
			swipe: true,
	        dots: false
	      }
	    },
	    {
	      breakpoint: 600,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    },
	    {
	      breakpoint: 480,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    }
	    // You can unslick at a given breakpoint now by adding:
	    // settings: "unslick"
	    // instead of a settings object
	  ]
	});
});



// Starrr plugin (https://github.com/dobtco/starrr)
var slice = [].slice;

(function($, window) {
  var Starrr;
  window.Starrr = Starrr = (function() {
    Starrr.prototype.defaults = {
      rating: void 0,
      max: 5,
      readOnly: false,
      emptyClass: 'fa fa-star-o',
      fullClass: 'fa fa-star',
      change: function(e, value) {}
    };

    function Starrr($el, options) {
      this.options = $.extend({}, this.defaults, options);
      this.$el = $el;
      this.createStars();
      this.syncRating();
      if (this.options.readOnly) {
        return;
      }
      this.$el.on('mouseover.starrr', 'a', (function(_this) {
        return function(e) {
          return _this.syncRating(_this.getStars().index(e.currentTarget) + 1);
        };
      })(this));
      this.$el.on('mouseout.starrr', (function(_this) {
        return function() {
          return _this.syncRating();
        };
      })(this));
      this.$el.on('click.starrr', 'a', (function(_this) {
        return function(e) {
          e.preventDefault();
          return _this.setRating(_this.getStars().index(e.currentTarget) + 1);
        };
      })(this));
      this.$el.on('starrr:change', this.options.change);
    }

    Starrr.prototype.getStars = function() {
      return this.$el.find('a');
    };

    Starrr.prototype.createStars = function() {
      var j, ref, results;
      results = [];
      for (j = 1, ref = this.options.max; 1 <= ref ? j <= ref : j >= ref; 1 <= ref ? j++ : j--) {
        results.push(this.$el.append("<a href='#' />"));
      }
      return results;
    };

    Starrr.prototype.setRating = function(rating) {
      if (this.options.rating === rating) {
        rating = void 0;
      }
      this.options.rating = rating;
      this.syncRating();
      return this.$el.trigger('starrr:change', rating);
    };

    Starrr.prototype.getRating = function() {
      return this.options.rating;
    };

    Starrr.prototype.syncRating = function(rating) {
      var $stars, i, j, ref, results;
      rating || (rating = this.options.rating);
      $stars = this.getStars();
      results = [];
      for (i = j = 1, ref = this.options.max; 1 <= ref ? j <= ref : j >= ref; i = 1 <= ref ? ++j : --j) {
        results.push($stars.eq(i - 1).removeClass(rating >= i ? this.options.emptyClass : this.options.fullClass).addClass(rating >= i ? this.options.fullClass : this.options.emptyClass));
      }
      return results;
    };

    return Starrr;

  })();
  return $.fn.extend({
    starrr: function() {
      var args, option;
      option = arguments[0], args = 2 <= arguments.length ? slice.call(arguments, 1) : [];
      return this.each(function() {
        var data;
        data = $(this).data('starrr');
        if (!data) {
          $(this).data('starrr', (data = new Starrr($(this), option)));
        }
        if (typeof option === 'string') {
          return data[option].apply(data, args);
        }
      });
    }
  });
})(window.jQuery, window);


$j(function() {
  return $j(".starrr").starrr();
});

$j( document ).ready(function() {
      
  $j('#hearts').on('starrr:change', function(e, value){
    $j('#count').html(value);
    $j('#review_rating').val(value);
  });
  
  $j('#hearts-existing').on('starrr:change', function(e, value){
    $j('#count-existing').html(value);
    $j('#review_rating').val(value);
  });

  //$j('.review-score').starrr({ readOnly: true, rating:  });  
  $j('.review-score').each(function(e){
  	//console.log($j(this).attr('data-rating'));
  	$j(this).starrr({readOnly:true, rating: $j(this).attr('data-rating')});
  });




});

$j(function(){
  $j(".comparebox").twentytwenty();
});

$j(document).ready(function($){
	$(".skin-tone").on('click',function(){
		var skin = $(this).attr('skin-tone');
		$(".skin-tone").removeClass("active");
		$(this).addClass("active");

		$('#skin-tone-selected').text(skin);
		$('#skin-tone-field').val(skin);
	});

	$(".faq-wrapper .faq-item").hide();

	$(".faq-title").on('click',function(){
		//$(".faq-wrapper .faq-item").hide();
		$(this).parent().find('.faq-item').slideToggle();
	});

	

});

/* ACF Google Maps */


;(function($){

/*
*  new_map
*
*  This function will render a Google Map onto the selected jQuery element
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$el (jQuery element)
*  @return	n/a
*/

function new_map( $el ) {
	
	// var
	var $markers = $el.find('.marker');
	
	
	// vars
	var args = {
		zoom		: 16,
		center		: new google.maps.LatLng(0, 0),
		mapTypeId	: google.maps.MapTypeId.ROADMAP
	};
	
	
	// create map	        	
	var map = new google.maps.Map( $el[0], args);
	
	
	// add a markers reference
	map.markers = [];
	
	
	// add markers
	$markers.each(function(){
		
    	add_marker( $(this), map );
		
	});
	
	
	// center map
	center_map( map );
	
	
	// return
	return map;
	
}

/*
*  add_marker
*
*  This function will add a marker to the selected Google Map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$marker (jQuery element)
*  @param	map (Google Map object)
*  @return	n/a
*/

function add_marker( $marker, map ) {

	// var
	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

	// create marker
	var marker = new google.maps.Marker({
		position	: latlng,
		map			: map
	});

	// add to array
	map.markers.push( marker );

	// if marker contains HTML, add it to an infoWindow
	if( $marker.html() )
	{
		// create info window
		var infowindow = new google.maps.InfoWindow({
			content		: $marker.html()
		});

		// show info window when marker is clicked
		google.maps.event.addListener(marker, 'click', function() {

			infowindow.open( map, marker );

		});
	}

}

/*
*  center_map
*
*  This function will center the map, showing all markers attached to this map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	map (Google Map object)
*  @return	n/a
*/

function center_map( map ) {

	// vars
	var bounds = new google.maps.LatLngBounds();

	// loop through all markers and create bounds
	$.each( map.markers, function( i, marker ){

		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

		bounds.extend( latlng );

	});

	// only 1 marker?
	if( map.markers.length == 1 )
	{
		// set center of map
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( 16 );
	}
	else
	{
		// fit to bounds
		map.fitBounds( bounds );
	}

}

/*
*  document ready
*
*  This function will render each map when the document is ready (page has loaded)
*
*  @type	function
*  @date	8/11/2013
*  @since	5.0.0
*
*  @param	n/a
*  @return	n/a
*/
// global var
var map = null;

$(document).ready(function(){

	$('.acf-map').each(function(){
		// create map
		map = new_map( $(this) );
	});

	var url = document.location.toString();
	if (url.match('#')) {
	    $('.profiletabs a[href="#' + url.split('#')[1] + '"]').tab('show');
	    window.scrollTo(0, 0);
	} 

	// Change hash for page-reload
	$('.profiletabs a').on('shown.bs.tab', function (e) {
	    window.location.hash = e.target.hash;

	    $('.acf-map').each(function(){
			// create map
			map = new_map( $(this) );
		});
	})
});

})(jQuery);


jQuery(document).ready(function($) {
    // Configure/customize these variables.
    if ( $('.more-less p').length == 0 ){
    	$('.show-more').hide();
    }

   

    $('.more-less p').each(function(index){
    	if(index >= 3){
    		$(this).addClass('less-hidden');
    	}else{
    		$(this).addClass('always-show');
    	}
    });

    $('.show-more').on('click',function(){
    	$('.less-hidden').toggleClass('less-shown').toggle();
    	$(this).toggleClass('on');

    	if($(this).hasClass('on')){
    		$(this).text('Show Less...');
    	}else{
    		$(this).text('Show More...');
    	}
    	return false;
    });
});


