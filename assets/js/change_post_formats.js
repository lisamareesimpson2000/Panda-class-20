console.log(formatObject);
// console.log(format);

$ = jQuery; //in wordpress 4 this is needed

$(document).ready(function(){

    $('.conditionalField').hide(); //first onload telling everything to hide
    var inputs = $('.conditionalField');
        inputs.each(function(i, input){
            if($(this).data('condition') == formatObject['format']){
                $(this).show();
                return;
            }

        });

    $(document).on('change', '#post-format-selector-0', function(){
        // console.log("change value");
        console.log($(this).val());
        var value = $(this).val();

        var inputs = $('.conditionalField');
        inputs.each(function(i, input){
            if ($(this).data('condition') == value){
                $(this).show();
            } else {
                $(this).hide();
                $(this).find('input').val(''); //wipes the input field to blank
            }
        })

    });

})

