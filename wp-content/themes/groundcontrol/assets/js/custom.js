jQuery( document ).ready(function() { 
 jQuery(document.body).trigger('wc_fragments_refreshed');
  jQuery(".inquire").click(function() {
      jQuery(".product-enquire").addClass('modal-open');
  });
  var t_filter   = '';
  function getCaseStusdy(page) 
  {
    var ajax_url = jQuery('.admin_url').val();
      jQuery.ajax({    
      type: "POST", 
      url: ajax_url,
      data: {
        action: 'casestudy_post_ajax_callback',
        page: page,
        t_filter: t_filter,
      },          
      success: function (response) {
        if(response.success){
          jQuery('.studies-container').html(response.data.html).fadeIn();
          jQuery('.pagination-inner').html(response.data.pagination).fadeIn();
          if(response.data.sel_terms_data != '')
          {
            jQuery(".title-holder .subtitle").html(response.data.sel_terms_data);
          }
        }
      },
    });
  }

  jQuery(document).on('click','.pagination-inner a',function(e){
    var page = jQuery(this).data('page');
    getCaseStusdy(page);
  });

  jQuery(document).on('click','.filters-container.filters-open a',function(e){
    t_filter = jQuery(this).attr('id');
    jQuery(".filters-container").removeClass("filters-open")
    getCaseStusdy(1);
  });

  setTimeout(() => {
    getCaseStusdy(1);
  }, 2000);

  jQuery(".lower-menu .menu_title .arrow").click(function(){
      if(jQuery(this).next(".submenu").is(":visible")){
        jQuery(this).next(".submenu").slideUp();
        jQuery(".menu_title").removeClass("active");
      }
      else
      {
        jQuery(".lower-menu .menu_title").removeClass("active");
        jQuery(this).parent(".menu_title").addClass("active");
        jQuery(".lower-menu .menu_title .submenu").slideUp();
        jQuery(this).next(".submenu").slideDown();
      }
  });

  jQuery('.mobile-trigger').click(function(){
    jQuery("body").toggleClass('menu-open');
  });
  
  jQuery('body.blog .template-inner .posts a.single-post').matchHeight();
  
	

    jQuery(".js-accordion-link").click(function(){
        if(jQuery(this).next(".js-accordion-details").is(":visible"))
        {
          jQuery(this).next(".js-accordion-details").slideUp();
          jQuery(this).removeClass("open");
        }
        else
        {
          jQuery(this).next(".js-accordion-details").slideDown();
          jQuery(this).addClass("open");
        }
    });

    jQuery('.custom_select2').niceSelect();      
      
    jQuery('.slider-for').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
      asNavFor: '.slider-nav'
    });
    jQuery('.slider-nav').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      asNavFor: '.slider-for',
      dots: false,      
      centerMode: true,
      focusOnSelect: true,
      
    });


    jQuery('.products-related').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      dots: false,      
      centerMode: true,
      focusOnSelect: true,
      responsive: [
        {
          breakpoint: 1199,
          settings: {
            slidesToShow: 3
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
          }
        },
        {
          breakpoint: 640,
          settings: {
            slidesToShow: 2,
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
          }
        }
        
      ]
    });

     
    jQuery(".accordion_item").eq(0).addClass("active");
    jQuery(".accordion_item").eq(0).children(".faq_details").show();
    jQuery(".accordion_item .faq_title").click(function(){
      if(jQuery(this).next(".faq_details").is(":visible"))
      {         
        jQuery(".accordion_item .faq_details").slideUp();
        jQuery(".accordion_item").removeClass("active");
      }
      else
      {         
        jQuery(".accordion_item").removeClass("active");
        jQuery(".accordion_item .faq_details").slideUp();
        jQuery(this).next(".faq_details").slideDown();
        jQuery(this).parents(".accordion_item").addClass("active");
      }
    });
    
    jQuery(".custom_tab .tab_content .inner_tab_content").each(function(e) {
      jQuery(this).find('table').wrap('<div class="table-responsiv"></div>');
    });

  jQuery(".custom_tab .tab_menu li a").click(function(){
      var open_id = jQuery(this).attr("id");
      jQuery(".custom_tab .tab_menu li").removeClass("active");
      jQuery(this).parent("li").addClass("active");
      jQuery(".inner_tab_content").hide();
      jQuery("." + open_id).show();
  });
  var ship_to_different_address_cb  = jQuery('#ship-to-different-address-checkbox:checked').length > 0;
    
  if(ship_to_different_address_cb){
    jQuery(".woocommerce-billing-frm").slideUp();
    jQuery(".woocommerce-billing-fields__field-wrapper .woocommerce-ac-heading").addClass("close"); 
  }   
  jQuery('#ship-to-different-address-checkbox').on( "click",function() { 
    if (jQuery(this).is(':checked')) {
      jQuery(".woocommerce-billing-frm").slideUp();
      jQuery(".woocommerce-billing-fields__field-wrapper .woocommerce-ac-heading").addClass("close"); 
    }else
    {
      jQuery(".woocommerce-billing-frm").slideDown();
      jQuery(".woocommerce-billing-fields__field-wrapper .woocommerce-ac-heading").removeClass("close");       
    }
  });
	
  jQuery( document ).on( "click", ".woocommerce-billing-fields__field-wrapper .woocommerce-ac-heading", function() {
  	  if(jQuery(this).next(".woocommerce-billing-frm").is(":visible"))
		{
			jQuery(this).addClass("close");
			jQuery(this).next(".woocommerce-billing-frm").slideUp();
		  
	  }
	  else
	  {
		  jQuery(this).removeClass("close");
		  jQuery(this).next(".woocommerce-billing-frm").slideDown();
	  }
  })
	jQuery( document ).on( "click", ".woocommerce-shipping-fields__field-wrapper .woocommerce-ac-heading", function() {
  	  if(jQuery(this).next("div").is(":visible"))
		{
		  jQuery(this).next(".woocommerce-shipping-frm").slideUp();
		  jQuery(this).addClass("close");
	  }
	  else
	  {
		  jQuery(this).removeClass("close");
		  jQuery(this).next(".woocommerce-shipping-frm").slideDown();
	  }
  })
 
  jQuery(".language-select .language-title").click(function(){
    if(jQuery(this).next(".language-view").is(":visible"))
    {
      jQuery(this).next(".language-view").slideUp();
    }
    else
    {
      jQuery(this).next(".language-view").slideDown();
    }
  });
  // jQuery("body").click(function(e){
  //       if(e.target.className == "language-title" || jQuery(event.target).parents(".language-view") == "language-view") { 
  //           //alert("do't hide");  
  //       }
  //       else {
  //           jQuery(".language-select .language-view").slideUp();
  //       }
  //   });


  // var curr = jQuery('.woocommerce-multi-currency').find('.wmc-currency');

		// 	jQuery.each(curr, function(e) {
				
		// 	    curr_val = jQuery(this).attr('data-currency');
		// 	    if(curr_val == 'EUR'){
		// 	        jQuery(this).find('a span').trigger('click');
		// 	    }
		// 	    return false;

		// 	});
});


jQuery(document).ready(function () {
    eqheight();
});

jQuery(window).on('load', function () {
    eqheight();
}).resize(function(){
    eqheight();
});

function eqheight() {
    setTimeout(function () {
        equalheight('.related-products .products-related .single-product .content-container h3 ');
    }, 300);
}

equalheight = function (container) {
    if (jQuery(window).width() > 767) {

        var currentTallest = 0,
            currentRowStart = 0,
            rowDivs = new Array(),
            $el,
            topPosition = 0;
        jQuery(container).each(function () {
            $el = jQuery(this);
            jQuery($el).height('auto')
            topPostion = $el.offset().top;
            if (currentRowStart != topPostion) {
                for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
                    rowDivs[currentDiv].innerHeight(currentTallest);
                }
                rowDivs.length = 0; // empty the array
                currentRowStart = topPostion;
                currentTallest = $el.innerHeight();
                rowDivs.push($el);
            } else {
                rowDivs.push($el);
                currentTallest = (currentTallest < $el.innerHeight()) ? ($el.innerHeight()) : (currentTallest);
            }
            for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
                rowDivs[currentDiv].innerHeight(currentTallest);
            }
        });
    } else {
        jQuery(container).height('auto');
    }
};