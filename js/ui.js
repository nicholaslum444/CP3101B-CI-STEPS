$(function() {

    $(window).resize(function() {
        // make the module images square
        $(".module-thumb-img img").css("width", ($(".col-xs-12").css("width") - 20));
        $(".module-thumb-img img").css("height", $(".module-thumb-img img").css("width"));

    });
    $(window).resize();

});
