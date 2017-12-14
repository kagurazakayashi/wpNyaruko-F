$(document).ready(function(){
    var nyarukoplayerdivheight = $(window).height();
    var players = [$("#homepage_topimgbox"),$("#nyarukoplayer")];
    if (ishome == false) {
        nyarukoplayerdivheight /= 2;
    }
    if ($("#homepage_bignews").length > 0) {
        players[0].height(nyarukoplayerdivheight-50);
        players[1].height(nyarukoplayerdivheight-50);
        reftitlebar();
    } else {
        players[0].height(nyarukoplayerdivheight);
        players[1].height(nyarukoplayerdivheight);
    }
    loadnyarukoplayer();
    $(window).scroll(function() {
        reftitlebar();
    });
    picsetting('.racing_list_left_img',352,198);
    picsetting('.racing_sidebar_top_img',256,144);
    proportion16_9('.racing_phone_list',true);
    proportion16_9('.racing_phone_list_top',false);
    picsetting('.racing_phone_list_top_img',$('.racing_phone_list_top').width(),$('.racing_phone_list_top').height());
});
function reftitlebar() {
    var scr = $(window).scrollTop();
    var windowh = $("#nyarukoplayer").height();
    var titleboxtop = 50;
    if ($("#homepage_bignews").length > 0) {
        windowh += 50;
        titleboxtop *= 2;
    }
    var winb = 100/windowh;
    $("#homepage_topimgbox").css("top",(0-scr)+"px");
    var bgcolor = "transparent";
    if (scr > 0 && scr < windowh) {
        bgcolor = "rgba(60,60,60,"+(scr/windowh)+")";
    } else if (scr >= windowh) {
        bgcolor = "#3C3C3C";
    }
    var homepage_mobilemenubtn = $("#homepage_mobilemenubtn");
    if (scr > 50) {
        $("#homepage_titlebox").css({"position":"fixed","padding-top":"15px","background":bgcolor});
        if (homepage_mobilemenubtn.css("display") != "none")
        homepage_mobilemenubtn.css("top","12px");
    } else {
        $("#homepage_titlebox").css({"position":"absolute","padding-top":(titleboxtop+"px"),"background":bgcolor});
        if (homepage_mobilemenubtn.css("display") != "none")
        homepage_mobilemenubtn.css("top","45px");
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

function picsetting(imgclass,imgDivW,imgDivH){
    for (var i = 0; i < $(imgclass).length; i++) {
        var img = $(imgclass)[i];
        var imgw = img.naturalWidth;
        var imgh = img.naturalHeight;
        var comparison = (imgw / imgDivW) * imgDivH;
        if (comparison > imgh) {
            img.style.height = imgDivH + 'px';
            var imgleft = (img.width - imgDivW) / 2;
            img.style.left = '-' + imgleft + 'px';
        } else {
            img.style.width = imgDivW + 'px';
            var imgtop = (img.height - imgDivH) / 2;
            img.style.top = '-' + imgtop + 'px';
        }
    }
}
function proportion16_9(objDiv,isframe) {
    for (var i = 0; i < $(objDiv).length; i++) {
        var obj = $(objDiv)[i];
        var objWidth = obj.offsetWidth;
        if (isframe) {
            obj.style.height = objWidth/16*9*1.5 + "px";
        } else {
            obj.style.height = objWidth/16*9 + "px";
        }
    }
}
function settitle(t1,t2) {
    var code = "";
    if (t1 && t1 != "") code += ('<h1 id="homepage_title1">' + t1 + '</h1>');
    if (t2 && t2 != "") code += ('<h2 id="homepage_title2">' + t2 + '</h2>');
    var homepage_title = $("#homepage_title");
    if (code != "") {
        homepage_title.html('<div id="homepage_titleb">' + code + '</div>');
    } else {
        homepage_title.html("");
    }
}
function contentformat() {
    // $(".racing_single_single img").css({"width":"90%","height":"auto"});
}