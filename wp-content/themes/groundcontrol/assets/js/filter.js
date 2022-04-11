var paged = 1;
var total_pages = '';
var total_pages_after = '';
var pagination = '';
var prev_page = '';
var next_page = '';
var checked = '';

function getChecked() {
  checked = [];
    jQuery(".main_cat_iot input[type=checkbox]:checked").each(function(data) {
        checked.push({
          key: jQuery(this).attr('data-type'),
          value: jQuery(this).val(),
          compare: 'LIKE'
        });
    });
    jQuery(".main_cat_iot input[type=radio]:checked").each(function(data) {
      checked.push({
        key: jQuery(this).attr('data-type'),
        value: jQuery(this).val(),
        compare: 'REGEXP'
      });

  });
}

function doajaxcall(mythis) {
  paged = mythis.data('page');
  
  //jQuery('.main_cat_iot input[type=checkbox]').attr('data-page', paged);
  if (paged) {
    jQuery('.cur_page').val(paged);
  } else {
    jQuery('.cur_page').val(1);
  }
  total_pages = jQuery('.total_pages').val();

  function afterPagi(total_pages) {
    pagination += '<div class="pagination_cls">';
      pagination += '<ul>';
        if (paged > 1) {
          prev_page = paged - 1;
          pagination += '<li><a class="prev page-numbers" data-page="' + prev_page + '"><i class="fa fa-chevron-left" aria-hidden="true"></i></a></li>';
        }
        for (var i = 1; i <= total_pages; i++) {
          if (paged == i) {
            pagination += '<li><span aria-current="page" class="page-numbers current">' + i + '</span></li>';
          } else {
            pagination += '<li><a class="page-numbers" data-page="' + i + '">' + i + '</a></li>';
          }
        }
        if (paged != total_pages) {
          next_page = paged + 1;
          pagination += '<li><a class="next page-numbers" data-page="' + next_page + '"><i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>';
        }
      pagination += '</ul>';
    pagination += '</div>';

    jQuery('.pagination_cls').replaceWith(pagination);
    jQuery('.pagination_cls a').on('click', function() {
      var mythis = jQuery(this);
      doajaxcall(mythis);
    });
    jQuery('.pagination_cls').prevAll('.pagination_cls').remove();
  }


  var cat_id = jQuery('#get_cat_id').val();
  var tax_name = jQuery('#get_cat_tax').val();
  var site_id = jQuery('#site_id').val();
  var sortby_val = jQuery('.sortby_val').val();
  getChecked();

  var sendjson = JSON.stringify(checked);
  var qty_data = {
    action: "ajax_cart_update",
    cat_id: cat_id,
    site_id: site_id,
    tax_name: tax_name,
    checked: sendjson,
    sort_val: sortby_val,
    paged: paged
  };
  jQuery.ajax({
    type: "post",
    dataType: "json",
    url: my_ajax_object.ajax_url,
    data: qty_data,
    success: function(result) {
      var data = result.data;
      var set_html = jQuery("#show_product_view");
      var html = "";
      if (data != "") {
        set_html.block({
          bindEvents: true,
          fadeIn: 500,
          timeout: 3000,
          overlayCSS: { backgroundColor: '#92ceed' },
          onBlock: function() {
            set_html.empty();
            html += '<div class="product_list_multiple_items">';
              var m =1;
              for (var i = 0; i < data.length; i++) {
                
                //console.log(key + val); 
                html += '<div class="single_item post-' + data[i].id + '">';
                  html += '<div class="inner_single_item">';
                    html += '<a href="' + data[i].post_url + '" class="product-bdage">';
                      
                      if(data[i].gc_pbttl_one != '')
                      {
                        html += '<span class="own_brand" style="background-color:'+data[i].gc_pbclr_one+';" >'+data[i].gc_pbttl_one+'</span>';
                      }
                      if(data[i].gc_pbttl_two != '')
                      {
                        html += '<span class="own_brand" style="background-color:'+data[i].gc_pbclr_two+';" >'+data[i].gc_pbttl_two+'</span>';
                      }
                      html += '<div data-mh="product-thumbnails" class="product-thumb img">' + data[i].featured_img + '</div>';
                    html += '</a>';
                    html += '<div class="product-info" data-mh="product">';
                      html += '<h3 class="card-title"><a href="' + data[i].post_url + '">' + data[i].post_title + "</a></h3>";
                      if(data[i].buyingoptions == 'enquire'){}
                      else{
                        html += "<h4>" + data[i].product_price + "</h4>";
                      }
                    html += "</div>";
                    if(data[i].buyingoptions == 'enquire'){
                      html += '<div class="read_more">'; 
                        html += '<a href="javascript:void(0);" class="enquiry" >Inquire</a>'; 
                      html += '</div>'; 
                    }
                    else{
                      if(data[i].product_price != '' && data[i].product_stock == 1)
                      {
                        html += "" + data[i].cart_btn + "";
                      }else if(data[i].product_price == '' || data[i].product_stock == '')
                      {
                        html += '<div class="read_more">'; 
                          html += '<a href="javascript:void(0);" class="enquiry" >Inquire</a>'; 
                        html += '</div>'; 
                      }
                    }
                    
                      html += "" + data[i].cmpr_btn + "";
                  html += '</div>';
                html += '</div>';

                html += '<div class="modal product-module-modal product-enquire" id="product-enquire_'+m+'">';
                  html += '<div class="modal-wrapper">';
                    html += '<span class="close" id="closeProductModuleModal"></span>';
                    html += "" + data[i].gravityform + "";
                  html += '</div>';
                html += '</div>';
                m++;
              }

            html += "</div>";
            html += '<input type="hidden" name="total_pages_after" class="total_pages_after" value="' + result.paginate_after + '">';
            set_html.append(html);

            total_pages_after = result.paginate_after;
            if (total_pages_after > 1) {
              afterPagi(total_pages_after);
            } else {
              jQuery(".pagination_cls").html(" ");
            }

            jQuery( ".product_list_multiple_items .single_item" ).each(function( index ) {
                 jQuery(this).children().children().children(".enquiry").click(function(){
                    var indexval = index+1;
                    var mid = "#product-enquire_"+indexval;
                    jQuery(mid).addClass('modal-open');
                 });
            });

            jQuery('.product-enquire .close').click(function(){
                jQuery('.product-module-modal').removeClass('modal-open');
            });

            var groups = {};

            // generate groups by their groupId set by elements using data-match-height
            jQuery('[data-match-height], [data-mh]').each(function() {
                var $this = jQuery(this),
                    groupId = $this.attr('data-mh') || $this.attr('data-match-height');

                if (groupId in groups) {
                    groups[groupId] = groups[groupId].add($this);
                } else {
                    groups[groupId] = $this;
                }
            });

            // apply matchHeight to each group
            jQuery.each(groups, function() {
                this.matchHeight(true);
            });
          },
        });
      } else {
        set_html.html("<div class='data-not-found'><h3>products not found</h3></div>");
      }
    },
  });
}


jQuery(document).ready(function($) {
   $( ".product_list_multiple_items .single_item" ).each(function( index ) {
       $(this).children().children().children(".enquiry").click(function(){
          var indexval = index+1;
          var mid = "#product-enquire_"+indexval;
          $(mid).addClass('modal-open');
       });
  });

  $('.product-enquire .close').click(function(){
      $('.product-module-modal').removeClass('modal-open');
  });

  $('.pagination_cls a').on('click', function() {
    getChecked();
    var mythis = $(this);
    doajaxcall(mythis);
  });

  $('.checkbox_dofilter').on('change', function() {
    // paged = jQuery('.cur_page').val();
    // getChecked();
    paged = 1;
    var mythis = $(this);
    doajaxcall(mythis);
  });
  $('.sortby').on('change', function() {
    jQuery('.sortby_val').val($(this).val());
    // getChecked();
    paged = 1;
    var mythis = $(this);
    doajaxcall(mythis);
  });

  $('.reset').on('click', function() {
    $('.checkbox_dofilter').prop('checked', false);
    var mythis = $(this);
    doajaxcall(mythis);
  });
});