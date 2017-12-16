$(document).ready(function(){
    loadnyarukoplayer();
    if ($("#bignews").length > 0) {
        $("#nyarukoplayer").height($("#nyarukoplayer").height()-50);
        reftitlebar();
    }
    $(window).scroll(function() {
        reftitlebar();
    });
});
function reftitlebar() {
    var scr = $(window).scrollTop();
    var windowh = $("#nyarukoplayer").height();
    var titleboxtop = 50;
    if ($("#bignews").length > 0) {
        windowh += 50;
        titleboxtop *= 2;
    }
    var winb = 100/windowh;
    $("#topimgbox").css("top",(0-scr)+"px");
    var bgcolor = "transparent";
    if (scr > 0 && scr < windowh) {
        bgcolor = "rgba(60,60,60,"+(scr/windowh)+")";
    } else if (scr >= windowh) {
        bgcolor = "#3C3C3C";
    }
    if (scr > 50) {
        $("#titlebox").css({"position":"fixed","padding-top":"15px","background":bgcolor});
    } else {
        $("#titlebox").css({"position":"absolute","padding-top":(titleboxtop+"px"),"background":bgcolor});
    }
}
function loadnyarukoplayer() {
    nyarukoplayer_init("homepage/nyarukoplayer/racing1.json",false);
    nyarukoplayerCallback_AnimateStart = function() {
    }
    nyarukoplayerCallback_AnimateEnd = function() {
    }
    nyarukoplayerCallback_AnimateReady = function(autoplay) {
    }
}
function disablemedia() {
    if ($.cookie("disable") == "true") {
        nyarukoplayer_disable(false);
    } else {
        nyarukoplayer_disable(true);
    }
}