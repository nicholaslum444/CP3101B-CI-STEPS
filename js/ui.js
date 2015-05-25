$(function() {

    $(window).resize(function() {
        // make the module images square
        $(".module-thumb-img img").css("width", ($(".col-xs-12").css("width") - 20));
        $(".module-thumb-img img").css("height", $(".module-thumb-img img").css("width"));

    });

    $(window).resize(function() {
        // make the body adapt to an expanding header bar
        $("body").css("padding-top", $("header").height());
        $(".project-box-container").css("padding-top", $("header").height());
        $(".project-box-container").css("margin-top", -1 * $("header").height());
    });

    $(window).resize();

});
