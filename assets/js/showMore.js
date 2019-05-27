console.log('show_more_posts');
$ = jQuery;

$('#showMore').click(function(){
    console.log('button is clicked');
    $.ajax({
        url: load_more.ajax_url,
        type: 'POST',
        data: {
            'action': 'loadmore',
            'query': load_more.query,
            'page': load_more.current_page

        },
        success:function(){

        },
        error: function(){

        }
    })
});
console.log('load_more');