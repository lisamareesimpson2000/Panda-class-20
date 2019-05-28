console.log('show_more_posts');
$ = jQuery;

$('#showMore').click(function(){

    console.log('button is clicked');
    var button = $(this);
    $.ajax({
        url: load_more.ajax_url,
        type: 'POST',
        data: {
            'action': 'loadmore',
            'query': load_more.query,
            'page': load_more.current_page

        },
        beforeSend:function(){
            button.text('Loading.....');
        },

        success:function(data){
            
            if(data){
                $('#postList').append(data);
                load_more.current_page++;
                if(load_more.current_page == load_more.max_page){
                    button.remove();
                } else{
                    button.text('Show More');
                }
            }
            // console.log(data);
        },
        error: function(error){
            console.log(error);
        }
    })
});
console.log('load_more');