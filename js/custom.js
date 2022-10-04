
jQuery(document).ready(function($) {
    jQuery(function($) {
        $(document).ready( function(){
            var x = 0;
          $('.wpcf7-list-item label input[type="checkbox"]').each(function(){
            x++;
            var span = $(this).parent('span');
            if(span){
              var idAttr = span.attr('id');
              $(this).attr('id',idAttr);
              span.attr('id','');
            }
            var name = $(this).attr('name');
            var val = $(this).attr('value');
            var type = $(this).attr('type');
            console.log($('.'+ x +'').attr('value'));
            console.log(" Val checkbox: "+val)
            if (val == $('.'+ x +'').attr('value')) {
               console.log('same value');
           
            switch(type){
              case 'radio':
              case 'checkbox':
                name = $('.'+ x +'').attr('id');
            } 
            $(this).attr('id',name);}
            else{
                console.log('nie działa dobrze ale '+ name);
            }
          });
        });
      });
    if ( $( ".single-graphic-item" ).length ){
    $('.single-graphic-item:first-child').addClass('active-graph');
  
    if($('.single-graphic-item').hasClass('active-graph'))
        {
        post_id = jQuery('.active-graph').attr("id");
         var my_data = {
            'action': "get_content",
            'post_id' : post_id
        };
       
        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            data: my_data,
            type: "POST",
            success:function(response) {
                
                $( ".grafika-content" ).html(response);
              
            },
            error: function(errorThrown){
                console.log(errorThrown);
            }
        }); }
       
        
    
        
   
    $('.single-graphic-item').click(function (){
        $('.single-graphic-item').removeClass('active-graph');
        if($(this).hasClass('active-graph')){
            $('.single-graphic-item').removeClass('active-graph');
        
        }else{
            $(this).addClass('active-graph');
            post_id = jQuery(this).attr("id");
             var my_data = {
                'action': "get_content",
                'post_id' : post_id
            };
            $.ajax({
                url: '/wp-admin/admin-ajax.php',
                data: my_data,
                type: "POST",
                success:function(response) {
                    
                    $( ".grafika-content" ).html(response);
                    var divHeightS = $('.price-banner').height(); 
                    var finallHeight = divHeightS - 200;
                    $('.graphic-height-cnt').css('min-height', finallHeight+'px');
                },
                error: function(errorThrown){
                    console.log(errorThrown);
                }

        })}
    })
    $(document).ajaxStop(function () {
        var divHeightSecond = $('.price-banner').height(); 
        var finallHeight = divHeightSecond - 200;
        $('.graphic-height-cnt').css('min-height', finallHeight+'px');
     
            return true;
      
      }); }
// referencje ajax
if ( $( ".single-reference-item" ).length ){
   

   
    $('.single-reference-item:first-child').addClass('active-ref');
if( $('.single-reference-item').hasClass('active-ref'))
    {
    ref_id = jQuery('.active-ref').attr("id");
    console.log(ref_id);
     var my_data_ref = {
        'action': "get_reference",
        'ref_id' : ref_id
    };
   
    $.ajax({
        url: '/wp-admin/admin-ajax.php',
        data: my_data_ref,
        type: "POST",
        success:function(response_reff) {
            
            $( ".reference-content" ).html(response_reff);
            var divHeight = $('.reference-content').height(); 
            $('.content-height').css('min-height', divHeight+'px');
        },
        error: function(errorThrown_reff){
            console.log(errorThrown_reff);
        }
    }); 
  
}




$('.single-reference-item').click(function (){
    $('.single-reference-item').removeClass('active-ref');
    $('.single-reference-item:first-child').removeClass('active-ref');
    if($(this).hasClass('active-ref')){
        $('.single-reference-item').removeClass('active-ref');
    
    }else{
        $(this).addClass('active-ref');
       var ref_id = jQuery(this).data("cat");
        console.log(ref_id);
         var my_data_ref = {
            'action': "get_reference",
            'ref_id' : ref_id
        };

        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            data: my_data_ref,
            type: "POST",
            success:function(response_ref) {
                
                $( ".reference-content" ).html(response_ref);
                var divHeight = $('.reference-content').height(); 
                $('.content-height').css('min-height', divHeight+'px');
                   
             
            },
            error: function(errorThrown_ref){
                console.log(errorThrown_ref);
            }
    })}
})

$(document).ajaxStop(function () {
    var divHeightFirst = $('.reference-content').height(); 
    $('.content-height').css('min-height', divHeightFirst+'px');
  
   return true;
  });

}





$('#radio_form span label input').click(function (){
  
    if($(this).hasClass(':checked')){
        $(this).prop("checked", false);
    }else{
        $(this).prop("checked", true);
     
        area_id = jQuery(this).attr("id");
        console.log("Area id by click "+area_id);
         var my_data_area = {
            'action': "get_price_area",
            'area_id' : area_id
        };
       
        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            data: my_data_area,
            type: "POST",
            success:function(response_area) {
                
                $( ".price-summary-content" ).html(response_area);
            },
            error: function(errorThrown_area){
                console.log(errorThrown_area);
            }
         
    })}
})




});
