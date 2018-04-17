var image_16_9_div = '.image_169_div';
var image_16_9 = '.image_169';
var fiimgWH = 0;//height = width / fiimgwh
var iwh = 0;
var isnowsingle = false;
var anifirstend = false;
var racinglistleftclassing = false;
$(document).ready(function(){
    var nyarukoplayerdivheight = $(window).height();
    var players = [$("#homepage_topimgbox"),$(".nyarukoplayer")];
    if (ishome == false) {
        nyarukoplayerdivheight /= 2;
    }
    if (wpnyaruko_headermode == 2) {
        nyarukoplayerdivheight -= 110;
    }
    if ($("#homepage_bignews").length > 0) {
        players[0].height(nyarukoplayerdivheight-64);
        players[1].height(nyarukoplayerdivheight-64);
        var homepage_topimgbox = $("#homepage_topimgbox");
        var homepage_topimgboxh = parseInt(homepage_topimgbox.css("height"))+64;
        homepage_topimgbox.css("height",homepage_topimgboxh+"px");
        $("#homepage_titleb").css("padding-top",64);
        reftitlebar();
    } else {
        players[0].height(nyarukoplayerdivheight);
        players[1].height(nyarukoplayerdivheight);
    }
    loadnyarukoplayer();
    tabmenu();
    resizebigpictitle();
    if (wpnyaruko_headermode == 1) {
        centertab();
    } else if (wpnyaruko_headermode == 2) {
        players[0].css("top","110px");
        headerstyle2();

        $('#racing_h2menu2box').bind('mousewheel', function(event, delta) {
            var dir = delta > 0 ? 'Up' : 'Down';
            if (dir == 'Up') {
                var ml = $('#racing_h2menu2box').scrollLeft() - 20;
                $('#racing_h2menu2box').scrollLeft(ml);
            } else {
                var ml = $('#racing_h2menu2box').scrollLeft() + 20;
                $('#racing_h2menu2box').scrollLeft(ml);
            }
            return false;
        });
    }
    centerlist();
    $(window).scroll(function() {
        if (wpnyaruko_headermode == 1) {
            reftitlebar();
        } else if (wpnyaruko_headermode == 2) {
            reftitlebar2();
        }
    });
    var rlli = $('.racing_list_left_img').length;
    $('.racing_list_left_img').load(function(){
        if(!--rlli){
            picsetting('.racing_list_left_img',352,198);
        }
    });
    var rsti = $('.racing_sidebar_top_img').length;
    $('.racing_sidebar_top_img').load(function(){
        if(!--rsti){
            picsetting('.racing_sidebar_top_img',256,144);
        }
    });
    var rpl = $('.racing_phone_list').length;
    $('.racing_phone_list').load(function(){
        if(!--rpl){
            proportion16_9('.racing_phone_list',true);
        }
    });
    var rplt = $('.racing_phone_list_top').length;
    $('.racing_phone_list_top').load(function(){
        if(!--rplt){
            proportion16_9('.racing_phone_list_top',false);
        }
    });
    var tplti = $('.racing_phone_list_top_img').length;
    $('.racing_phone_list_top_img').load(function(){
        if(!--tplti){
            picsetting('.racing_phone_list_top_img',$('.racing_phone_list_top').width(),$('.racing_phone_list_top').height());
        }
    });
    picsetting('.racing_list_left_img',352,198);
    picsetting('.racing_sidebar_top_img',256,144);
    proportion16_9('.racing_phone_list',true);
    proportion16_9('.racing_phone_list_top',false);
    picsetting('.racing_phone_list_top_img',$('.racing_phone_list_top').width(),$('.racing_phone_list_top').height());
    var iw = $(image_16_9).width();
    var ih = $(image_16_9).height();
    iwh = iw/ih;
    if(iwh > 1){
        image169_W();
    }else{
        image169_H();
    }

    var imgNum1=$('.items .flex-item img').length;
    var iroww = 0;
    var iroww0 = 0;
    var irw = 0;
    var irw0 = 0;
    var timernum0 = false;
    var timernum = 0;
    var timernum1 = 0;
    $('.items .flex-item img').load(function(){
        if(!--imgNum1){
            timernum0 = true;
            var timer = setInterval(function(){
                if(iroww == 0){
                    iroww = $('.carousel-inner img').width();
                }
                if(iroww !== 0 && iroww){
                    if(irw == 0){
                        irw = iroww/16*9;
                    }
                    var timer1 = setInterval(function(){
                        $(".carousel-inner img").each(function (index,domEle){
                            if(irw > domEle.clientHeight && domEle.clientHeight != 0){
                                irw = domEle.clientHeight;
                            }
                            $('.carousel-inner .flex-item').height(irw + "px");
                        });
                        fiimgWH = iroww/irw;
                        // console.log(fiimgWH);
                        if(timernum > 10){
                            clearInterval(timer1);
                        }
                        timernum++;
                    }, 2500);
                    fiimgWH = iroww/irw;
                    $('.carousel-inner .flex-item').height(irw + "px");
                    clearInterval(timer);
                }
            }, 1000);
        }
    });
    var timer2 = setInterval(function(){
        if(timernum0){
            clearInterval(timer2);
        }
        if(iroww0 == 0){
            iroww0 = $('.carousel-inner img').width();
        }
        if(iroww0 && iroww0 != 0){
            if(irw0 == 0){
                irw0 = iroww0/16*9;
            }
            $(".carousel-inner img").each(function (index,domEle){
                if(irw0 > domEle.clientHeight && domEle.clientHeight != 0){
                    irw0 = domEle.clientHeight;
                }
                $('.carousel-inner .flex-item').height(irw0 + "px");
            });
            fiimgWH = iroww0/irw0;
            // console.log(fiimgWH);
            if(timernum1 > 10){
                clearInterval(timer2);
            }
            timernum1++;
        }
    }, 1000);
});
function tabmenu() {
    var h2mode = "";
    if (wpnyaruko_headermode == 2) {
        h2mode = "h2";
    }
    var lii = 0;
    var racingsingles = [];
    $(".racing_single_info a").each(function(){
        racingsingles.push($(this).text());
    });
    var selectcss = "racing_"+h2mode+"tabmenu_select";
    if (racingsingles.length > 0) {
        selectcss = "racing_"+h2mode+"tabmenu_select2";
        $("#homepage_topimgbox").css("overflow","hidden");
    }
    if (!isnowsingle && $(".racing_"+h2mode+"single").length > 0) {
        isnowsingle = true;
    }
    $("#racing_"+h2mode+"tabmenu li").each(function(){
        var isnowsinglethis = false;
        var thisli = $(this);
        var tid = "racing_"+h2mode+"tabmenu_item" + (lii++);
        thisli.attr("id",tid);
        var thisa = $("#"+tid+" a");
        var hrefs = thisa.text().split('#');
        if (!hrefs[1]) hrefs[1] = "";
        var imgh = '<img src="'+hrefs[0]+'" alt="'+hrefs[1]+'" />';
        thisa.attr("title",hrefs[1]);
        for(var i in racingsingles){
            if (racingsingles[i] == hrefs[1]) {
                isnowsinglethis = true;
                break;
            }
        }
        if (isnowsinglethis || thisa.attr("href") == window.location.href) {
            thisli.attr("class",selectcss);
        } else {
            thisli.attr("class","");
        }
        thisa.html(imgh);
    });
    $("#racing_"+h2mode+"tabmenu").css("display","inline");
}
function scrollpicreheight() {
    var windowwidth = $(window).width();
    var scrollpicflwid = 30;
    var scrollpicflwsn = 2;
    var scrollpicflpic = 3;
    if (windowwidth < 653) {
        scrollpicflwsn = 0;
        scrollpicflpic = 1;
    } else if (windowwidth < 972) {
        scrollpicflwsn = 1;
        scrollpicflpic = 2;
    }
    var flexwidth = (windowwidth-scrollpicflwid*scrollpicflwsn)/scrollpicflpic;
    proportion16_9b('.row .flex-item',false,flexwidth);
}
function reftitlebar2() {
    var scr = $(window).scrollTop();
    $("#homepage_topimgbox").css("top",(0-scr+110)+"px");
}
function reftitlebar() {
    var scr = $(window).scrollTop();
    var windowh = $("#nyarukoplayer").height();
    var titleboxtop = 50;
    var mobilemenubtntop = 45;
    if ($("#homepage_bignews").length > 0) {
        windowh += 50;
        titleboxtop *= 2;
        mobilemenubtntop = 95;
    }
    var winb = 100/windowh;
    $("#homepage_topimgbox").css("top",(0-scr)+"px");
    var homepage_titlebox = $("#homepage_titlebox")
    var bgcolor = homepage_titlebox.css("background");
    if (scr > 0 && scr < windowh) {
        var newbackgrounda = (scr/windowh); //+0.5初始菜单透明度设置
        bgcolor = "rgba(60,60,60,"+newbackgrounda+")";
    } else if (scr >= windowh) {
        bgcolor = "#3C3C3C";
    }
    var isshowlogo = false;
    if ($("#homepage_logo").length > 0) {
        isshowlogo = true;
    }
    var homepage_mobilemenubtn = $("#homepage_mobilemenubtn");
    var homepage_sociallist = $("#homepage_sociallist");
    if (homepage_sociallist && homepage_sociallist.css("text-align") != "right") {
        homepage_sociallist = null;
    }
    if (scr > 50) {
        homepage_titlebox.css({"position":"fixed","padding-top":"15px","background":bgcolor});
        if (homepage_mobilemenubtn.css("display") != "none") {
            if (isshowlogo) {
                homepage_mobilemenubtn.css("top","17px");
                if (homepage_sociallist) homepage_sociallist.css("top","17px");
            } else {
                homepage_mobilemenubtn.css("top","12px");
                homepage_sociallist.css("top","17px");
            }
        }
        if (isshowlogo) {
            var homepage_logo = $("#homepage_logo");
            if (homepage_logo.css("height") == "60px") {
                homepage_logo.stop();
                if (homepage_mobilemenubtn.css("display") != "none") {
                    homepage_logo.animate({"height":"30px","left":"0px"});
                } else {
                    homepage_logo.animate({"height":"30px"});
                }
            }
        }
    } else {
        homepage_titlebox.css({"position":"absolute","padding-top":(titleboxtop+"px"),"background":bgcolor});
        if (homepage_mobilemenubtn.css("display") != "none")
        homepage_mobilemenubtn.css("top",mobilemenubtntop+"px");
        if (homepage_sociallist != null) homepage_sociallist.css("top",mobilemenubtntop+"px");
        if ($("#homepage_logo").length > 0) {
            var homepage_logo = $("#homepage_logo");
            if (homepage_logo.css("height") == "30px") {
                homepage_logo.stop();
                homepage_logo.animate({"height":"60px"});
            }
        }
    }
}
function loadnyarukoplayer() {
    if (playerdef[3] == "on") {
        nyarukoplayer_replay = false;
    }
    nyarukoplayer_init(nyarukoplayerjson,false);
    nyarukoplayerCallback_AnimateStart = function() {
    }
    nyarukoplayerCallback_AnimateEnd = function() {
        if (!anifirstend && ishome) { //TODO:设置是否只影响主页
            var inyarukoplayer = $(".nyarukoplayer");
            var homepage_topimgbox = $("#homepage_topimgbox");
            if (playerdef[0] == "on") {
                var scrh = $(window).scrollTop();
                var winh = $(window).height();
                var winh2 = winh / 2;
                var miniwinh = winh * 0.3; //TODO:设置缩小比率
                if (playerdef[1] == "on" && scrh > miniwinh) {
    
                } else if (inyarukoplayer.height() > miniwinh) {
                    var miniwinhpx = miniwinh+"px";
                    var cssto = {"height":miniwinhpx};
                    if (playerdef[2] == "on") {
                        inyarukoplayer.animate(cssto);
                        homepage_topimgbox.animate(cssto);
                    } else {
                        inyarukoplayer.css(cssto);
                        homepage_topimgbox.css(cssto);
                    }
                }
            }
            if (playerdef[4] == "on") {
                $("#homepage_title").remove();
                $("#homepage_topimgbox").remove();
                if (playerdef[2] == "on") {
                    inyarukoplayer.animate({"height":"0px"},function(){
                        nyarukoplayer_unload(true);
                    });
                } else {
                    nyarukoplayer_unload(true);
                }
            }
        }
        anifirstend = true;
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
function resizebigpictitle() {
    if (bigpicdef[0] == "on") {
        var pictitle = $(".pictitle");
        var pictitletext = $(".pictitletext");
        var pictitletexti = $(".pictitletext i");
        var pictitletextprepend = "&emsp;&emsp;";
        if (pictitletexti.length > 0) {
            pictitletexti.remove();
            pictitletextprepend += "&emsp;&nbsp;";
        }
        var pictitletexttext = pictitletext.text();
        pictitletext.prepend(pictitletextprepend);
        var newfontsize = resizetext(pictitletext, pictitle.width(), parseInt(bigpicdef[1]), parseInt(bigpicdef[2]));
        pictitletext.html('<i class="material-icons" style="font-size:'+newfontsize+';">&#xE039;&nbsp;</i>'+pictitletexttext);
    }
}
function resizetext(wordbox, maxWidth, minSize, maxSize) {
    var newfontsize = minSize + "px";
    wordbox.css('font-size', newfontsize);
    wordbox.each(function () {
        for (var i = minSize; i <= maxSize; i++) {
            // console.log("resize",i,$(this).width(),maxWidth);
            if ($(this).width() >= maxWidth) {
                newfontsize = (i - 2) + 'px';
                $(this).css('font-size', newfontsize);
                // console.log("break",i,$(this).width(),maxWidth);
                break;
            } else {
                newfontsize = i + 'px';
                $(this).css('font-size', newfontsize);  
            }
        }
    });
    return newfontsize;
};

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
function proportion16_9b(objDiv,isframe,width) {
    for (var i = 0; i < $(objDiv).length; i++) {
        var obj = $(objDiv)[i];
        var objWidth = width;
        if (isframe) {
            obj.style.height = objWidth/16*9*1.5 + "px";
        } else {
            obj.style.height = objWidth/16*9 + "px";
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
var openmenu = false;
function mobilemenu() {
    if(openmenu){
        $(".racing_phone_menu").addClass('frameAnimImg0');
        setTimeout(function(){
            $(".racing_phone_menu").removeClass('frameAnimImg0');
            $(".racing_phone_menu").css('left','-90%');
            $(".racing_phone_menuback").css('display','none');
            $("#mobilemenubox").css("display","none");
        }, 180);
        openmenu = false;
    } else {
        $("#mobilemenubox").css("display","inline");
        $(".racing_phone_menu").addClass('frameAnimImg');
        setTimeout(function(){
            $(".racing_phone_menu").removeClass('frameAnimImg');
            $(".racing_phone_menu").css('left','0');
            $(".racing_phone_menuback").css('display','inline');
        }, 180);
        openmenu = true;
    }
}
//image169
$(window).resize(function(){
    if(iwh > 1){
        image169_W();
    }else{
        image169_H();
    }
    centerlist();
    centertab();
    rewh();
    resizebigpictitle();
});
function centerlist() {
    if ($(".racing_list_tlr").length > 0) {
        var pagewidth = $("body").width();
        var listwidth = $(".racing_list").width();
        var blankwidth = (pagewidth - listwidth) / 2;
        $(".racing_list_tlr").width(blankwidth);
    }
}
function centertab() {
    if (isnowsingle) {
        var pagewidth = $("body").width();
        var listwidth = $(".racing_single").width();
        var blankwidth = (pagewidth - listwidth) / 2;
        $("#homepage_footbox").css("left",blankwidth+"px");
    }
}
function image169_W() {
    var i169width = $(image_16_9_div).width();
    var i169height = i169width/16*9;
    var imageh = $(image_16_9).height();
    var imagetop = (i169height - imageh) / 2;
    $(image_16_9_div).height(i169height);
    $(image_16_9).css('top',imagetop);
}
function image169_H() {
    $(image_16_9).width('auto');
    $(image_16_9).height('100%');
    var i169width = $(image_16_9_div).width();
    var i169height = i169width/16*9;
    var imagew = $(image_16_9).width();
    var imageleft = (i169width - imagew) / 2;
    $(image_16_9_div).height(i169height);
    $(image_16_9).css('left',imageleft);
}
function snsiconover(iid) {
    if (($("#homepage_mobilemenubtn").css("display")!="block" || wpnyaruko_headermode == 2) && !isMobile) {
        let ta = $("#homepage_snsa_"+iid);
        qr(ta.attr("href"),"homepage_snsqrshow","img","10","","");
        $(".homepage_snsqrshowbox").css("display","block");
    }
}
function snsiconout(iid) {
    let ta = $("#homepage_snsa_"+iid);
    qr(ta.attr("href"),"homepage_snsqrshow","img","10","","");
    $(".homepage_snsqrshowbox").css("display","none");
}
function bignewslinkmouse(over) {
    var bignewspopdisplay = "none";
    if (over) bignewspopdisplay = "inline";
    $("#homepage_bignewspop").css("display",bignewspopdisplay);
}
function headerstyle2() {

}
function racinglistgotolink(link) {
    if (!racinglistleftclassing) {
        window.location.href = link;
    } else {
        racinglistleftclassing = false;
    }
}
function racinglistleftclass(link) {
    racinglistleftclassing = true;
    window.location.href = link;
}