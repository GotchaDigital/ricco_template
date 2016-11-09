var $ = jQuery;
$(function(){
    var hs = document.location.hash;
    if( hs.substring(0,6) == '#prod-' )
    {
        var postId = 'id=' + hs.substring(6);
        $.ajax({
            url: '/wp-content/themes/focuson/mktz/functions/get_prod.php',
            method: 'post',
            data: postId,
            success: function(data){
                //console.log( prod.title + ' ( ' + prod.id + ' - '  + prod.URL +  ' )' );
                //alert(data);
                prod = JSON.parse(data);
                $('input[name=mktz-produto]')
                    .val( prod.title + ' ( ' + prod.id + ' - '  + prod.URL +  ' )' )
                    .prop('disabled', true);
            }
        });
    }
});