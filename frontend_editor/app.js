$('.code-container').hide();
//
$('.editor').click(function(e){
    $(this).prevAll('.code-container').hide();
    $(this).nextAll('.code-container').animate(
        {height : '0rem'},
        {duration: 1000, queue: false}
    );
    //
    var offset = $(this).offset().top
    console.log(offset);
    if(offset > 350){
        $(this).next().animate(
            {height: '25.7rem'},
            {duration: 1000, queue: false}
        )
        $(this).prevAll('.code-container').animate(
            {height : '0rem'},
            {duration: 1000, queue: false}
        )
    }
    else{
        $(this).next().animate(
            {height: '25.7rem'},
            {duration: 1000, queue: false}
        )
        $(this).next().nextAll('.code-container').hide();
    }
    
});
//
$('#run').click(function(){
    $('#result-frame').contents().find("head").html("<style>" + $('#css-code').val() + "</style>");
    $('#result-frame').contents().find("body").html($('#html-code').val());
    //
    document.getElementById('#result-frame').contentWindow.eval($("#js-code").val())
});
//
var $fr = $('#result-frame');
var $window = $(window).on("resize", function(){
    $fr.height($(this).height() - 581);
}).trigger('resize');