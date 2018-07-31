var image_16_9_div = '.image_169_div';
var image_16_9 = '.image_169';
var fiimgWH = 0;//height = width / fiimgwh
var iwh = 0;
var isnowsingle = false;
var anifirstend = false;
var racinglistleftclassing = false;
var topmenumaxwidth = 500;
var mobilemenuarr = new Array();
var oldsize = [0,0];
var reloadtimer = null;
var autoreload = true;
$(document).ready(function(){
    var nyarukoplayerdivheight = $(window).height();
    var players = [$("#homepage_topimgbox"),$(".nyarukoplayer")];
    if (pagetype != 1) {
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
    msubmenu();
    centerlist();
    if (wpnyaruko_headermode == 1) {
        centertab();
    } else if (wpnyaruko_headermode == 2) {
        players[0].css("top","110px");
        headerstyle2();
        addyscroll('#racing_h2menu2box');
        addyscroll('#racing_topmenu');
    }
    $("#racing_h2logo").bind("load",resizetopmenu(true));
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
    resizealllrmargin(autohidelist2());
    resizebignews();
    startscrollpicture();
    resizebigpictitle();
    console.log("Loading (1/2)HTML ...OK");
});
function saveoldsize() {
    var bodyo = $("body");
    oldsize = [bodyo.width(),bodyo.height()];
}
function resizebignews(categoryid=Number.MAX_VALUE) {
    if (categoryid == Number.MAX_VALUE) {
        $('.racing_bigpicnews').each(function (i,thisbigpicnews){
            var nowbigpicnews = $(thisbigpicnews);
            var nowbigpicnewsid = nowbigpicnews.attr('id');
            var nowbigpicnewsimg = $("#"+nowbigpicnewsid+"img");
            nowbigpicnewsimg.css({"width":"100%","height":"auto"});
            nowbigpicnews.height(nowbigpicnewsimg.height());
        });
    } else {
        var bigpicnews = $("#racing_bigpicnews_"+categoryid);
        var bigpicnewsimg = $("#racing_bigpicnews_"+categoryid+"img");
        bigpicnewsimg.css({"width":"100%","height":"auto"});
        bigpicnews.height(bigpicnewsimg.height());
    }
}
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
function openmsubmenu(i) {
    var speed = 500;
    var nowa = $("#submenumaterialiconsa"+i);
    var nowi = $("#submenumaterialiconsi"+i);
    var mobilemenusubitem = $(".mobilemenusubitem");
    if (mobilemenusubitem.length > 0) mobilemenusubitem.stop();
    if (nowa.attr("value") == 1) {
        mobilemenusubitem.fadeOut(speed,function(){
            mobilemenusubitem.remove();
        });
        nowa.attr("value",0);
        nowi.attr("class","material-icons l90");
    } else {
        var exarrs = mobilemenuarr[i];
        var newexarrs = new Array();
        exarrs.forEach(menuitem => {
            var nowmenuitem = $(menuitem);
            nowmenuitem.attr("class","mobilemenusubitem");
            newexarrs.push(nowmenuitem);
        });
        $(".mobilemenu li:eq("+i+")").after(newexarrs);
        mobilemenusubitem = $(".mobilemenusubitem");
        mobilemenusubitem.fadeOut(0);
        mobilemenusubitem.fadeIn(speed);
        //$(selector).animate({params},speed,callback);
        nowi.attr("class","material-icons r90");
        nowa.attr("value",1);
    }
}
function msubmenu() {
    if ($(".mobilemenu").length > 0) {
        mobilemenuarr = li2array($(".mobilemenu li"));
        msubmenureload();
    }
}
function msubmenureload() {
    var mobilemenuhtml = "";
    for (let i = 0; i < mobilemenuarr.length; i++) {
        var nowmenu = mobilemenuarr[i];
        if ((typeof nowmenu) == "string") {
            mobilemenuhtml += nowmenu;
        }
    }
    $(".mobilemenu").html(mobilemenuhtml);
}
function li2array(lis) {
    var narray = new Array();
    for (let i = 0; i < lis.length; i++) {
        var nowobj = $(lis[i]);
        var nowid = nowobj.attr("id");
        if ($("#"+nowid+" ul").length > 0) {
            var newa = '<li><a href="javascript:openmsubmenu('+i+');" id="submenumaterialiconsa'+i+'" value=0><i class="material-icons" id="submenumaterialiconsi'+i+'">&#xE037;</i>&nbsp;'+$($("#"+nowid+" a")[0]).text()+'</a></li>';
            nowobj = li2array($("#"+nowid+" ul li"));
            i += nowobj.length;
            narray.push(nowobj);
            narray.push(newa);
        } else {
            narray.push("<li>"+nowobj.html()+"</li>");
        }
    }
    return narray;
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
        if (!anifirstend && pagetype == 1) { //TODO:设置是否只影响主页
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
function resizetopmenu(isfirest) {
    if ($("#racing_topmenu").length > 0) {
        if (isfirest) {
            topmenumaxwidth = $("#racing_topmenu ul").width();
        }
        var ulw = $(window).width() - $("#racing_h2logo").width() - 40 - 170;
        if (ulw > topmenumaxwidth) {
            $("#racing_topmenu").width("auto");
        } else {
            $("#racing_topmenu").width(ulw);
        }
    }
}
function addyscroll(divn) {
    $(divn).bind('mousewheel', function(event, delta) {
        var dir = delta > 0 ? 'Up' : 'Down';
        if (dir == 'Up') {
            var ml = $(divn).scrollLeft() - 20;
            $(divn).scrollLeft(ml);
        } else {
            var ml = $(divn).scrollLeft() + 20;
            $(divn).scrollLeft(ml);
        }
        return false;
    });
}
// function resizebigpictitle() {
//     if (bigpicdef[0] == "on") {
//         if (wpnyaruko_headermode == 1) {
//             resizebigpictitle1();
//         } else if (wpnyaruko_headermode == 2) {
//             resizebigpictitle2();
//         }
//     }
// }
function resizebigpictitle()
{
    if (bigpicdef[0] != "on") {
        return;
    }
    var pictitle = $(".pictitle2b");
    var pictitletext = $("#pictitletablecellr");
    var pictitletexti = $("#pictitletablecelll i");
    var pictitletextprepend = "";
    var pictitletexttext = pictitletext.text();
    var isi = false;
    if (pictitletexti.length > 0) {
        pictitletexti.css("display","none");
        pictitletextprepend += "一一";
        isi = true;
    }
    pictitletext.prepend(pictitletextprepend);
    var newfontsize = resizetext(pictitletext, pictitle.width(), parseInt(bigpicdef[1]), parseInt(bigpicdef[2]));
    pictitletext.html(pictitletexttext);
    pictitletext.css("font-size",newfontsize);
    if (isi) {
        pictitletexti.css("display","block");
        pictitletexti.css("font-size",newfontsize);
    }
    // // $(".racing_bigpicnews img").bind('load',function(){
    // $(this).css({'top':'0px'});
    // $(this).width("100%");
    // if(this.height > $('.racing_bigpicnews').height()){

    //     $(this).css({'top': -(this.height - $('.racing_bigpicnews').height())/2 + 'px'});
    // }else if(this.height < $('.racing_bigpicnews').height()){
    //     $(this).width('auto');
    //     $(this).height($('.racing_bigpicnews').height());
    //     $(this).css({'left': -(this.width - $('.racing_bigpicnews').width())/2 + 'px'});
    // }
    // // });
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
    if (isMobile) return;
    var tbody = $("body");
    var newsize = [tbody.width(),tbody.height()];
    centerlist();
    centertab();
    var listwidth = 0;
    if (oldsize[0] < newsize[0]) {
        listwidth = autohidelist2();
    }
    if(iwh > 1){
        image169_W();
    }else{
        image169_H();
    }
    rewh();
    resizebigpictitle();
    resizetopmenu(false);
    if (oldsize[0] > newsize[0]) {
        listwidth = autohidelist2();
    }
    saveoldsize();
    clearTimeout(reloadtimer);
    resizealllrmargin(listwidth);
    resizebignews();
    scrollpicturereload();
    if (autoreload && pagetype == 1) {
        reloadtimer = null;
        reloadtimer = setTimeout(function(){
            console.log("Reloading...");
            location.reload(false);
        },1000);
    }
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
function autohidelist2() {
    // var widthlevel = [733,1103,1471,65536]; //lr 10%
    var widthlevel = [660,992,1324,1656,1988,65536];
    var witemsi = 0;
    var bodywidth = $("body").width();
    for (let levi = 0; levi < widthlevel.length; levi++) {
        if (bodywidth < widthlevel[levi]) {
            witemsi = levi;
            break;
        }
    }
    witemsi++;
    var racinglist2 = $(".racing_listbox");
    var itemswidth = 0;
    var onelineitemi = 0;
    var linewidth = 0;
    racinglist2.each(function(){
        var listid = "#" + $(this).attr("id");
        var listzonewidth = $(listid+" .racing_list2").width();
        var items = $(listid+" .racing_item2");
        var nowlineitemi = 0;
        var oneline = true;
        itemswidth = items.width() + parseInt(items.css("margin-left")) + parseInt(items.css("margin-right"));
        onelineitemi = 0;
        for (let i = 0; i < items.length; i++) {
            nowlineitemi++;
            if (oneline) {
                onelineitemi++;
            }
            if (nowlineitemi >= witemsi) {
                nowlineitemi = 0;
                oneline = false;
            }
        }
        items.css("display","inline-block");
        if (nowlineitemi > 0 && !oneline) {
            for (let j = 0; j < items.length; j++) {
                var nowitem = $(items[items.length-1-j]);
                nowitem.css("display","none");
                nowlineitemi--;
                if (nowlineitemi <= 0) {
                    break;
                }
            }
        }
    });
    linewidth = onelineitemi * itemswidth;
    // $(".racing_list_test").width(linewidth);
    // $(".racing_list_test").text(witemsi+" = "+onelineitemi+" * "+linewidth+" / "+bodywidth);
    return linewidth;
}
function resizealllrmargin(linewidth) {
    var bodywidth = $("body").width();
    var newmargin = ((bodywidth - linewidth) * 0.5) + "px";
    var newcss = {"margin-left":newmargin,"margin-right":newmargin,"width":"auto"};
    $(".scrollview").css(newcss);
    $(".racing_bigpicnews").css(newcss);
    resizebigpictitle();
    $(".pictitle2").css(newcss);
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
function racinglistleftclass(link,event) {
    var e = event || window.event;
    if (e && e.stopPropagation){
        e.stopPropagation();    
    }else{
        e.cancelBubble=true;//兼容IE
    }
    racinglistleftclassing = true;
    window.location.href = link;
}
//[滚动图片 ready:scrollpicture('sp1'); resize:rewh();
var sparr = {"":[]};
var sparr0 = [];
var sparr1 = [];
var scrollimgs = [];
var sparr2 = [];
var scrollimgnum2 = {"":[]};
var scrollimgnum = {"":[]};
var spw = 0;
var spc = 10;
var spimgw = 0;
var spimgh = 0;
var spnum = 0;
var spshownum = 3;
var spdivlen = Math.ceil(spnum/spshownum);
var spith = 40;
function startscrollpicture() {
    for(var i = 0; i < scrollpicturespid.length; i++){
        scrollimgs = scrollpictureimgs[i];
        scrollpictureload(scrollpicturespid[i]);
    }
}
function scrollpicturereload() {
    $(".scrollpicture").html("");
    startscrollpicture();
}
function scrollpictureload(spid) {
    var sparr00 = [];
    var spshownum00 = true;//不足每页的需求
    var spshownum01 = true;
    sparr[spid] = [];
    spnum = 0;
    if(spdivlen < 3){
        spdivlen = 3;
    }
    var spw = $('.scrollview').width();
    if (spw <= 480) {
        spshownum = 1;
    } else if (spw <= 840) {
        spshownum = 2;
    } else {
        spshownum = 3;
    }
    var spc = 10;
    var spimgw = (spw - spc*(spshownum-1)) / spshownum;
    var spimgh = (spimgw / 16 * 9)+spith;
    scrollimgs.forEach(function(obj,i){
        spnum++;
        var spcss = 'spDIV';
        if (spshownum == 3){
            if (i % spshownum == 1) {
                spcss += ' spCentercss';
            }
        }else if (spshownum == 2){
            if (i % spshownum == 0) {
                spcss += ' spleftcss';
            }else{
                spcss += ' sprightcss';
            }
        } else if (spshownum == 1){
            spdivlen = scrollimgs.length;
        }

        sparr00.push("<div class='" + spcss + "' style='width: " + spimgw + "px;height: " + (spimgh+spith) + "px;'><div class='spimgdiv' style = 'width: " + spimgw + "px;height: " + spimgh + "px;'><a href='" + obj[2] + "'><img src='" + obj[1] + "'/></a></div><div class='scrolltitle'>" + obj[0] + "</div></div>");
        if (spshownum == 3){
            if (i % spshownum == 2){
                var nowarr = sparr[spid];
                if (spshownum01){
                    nowarr.unshift(sparr00);
                    spshownum01 = false;
                }else{
                    nowarr.push(sparr00);
                }
                sparr[spid] = nowarr;
                sparr00 = [];
            }
        }else if (spshownum == 2){
            if (i % spshownum == 1){
                var nowarr = sparr[spid];
                if (spshownum01){
                    nowarr.unshift(sparr00);
                    spshownum01 = false;
                }else{
                    nowarr.push(sparr00);
                }
                sparr[spid] = nowarr;
                sparr00 = [];
            }
        }else if (spshownum == 1){
            if (i == (scrollimgs.length - 1)){
                sparr[spid] = sparr00;
                sparr00 = [];
            }
        }
        if ((spnum == scrollimgs.length) && ((i % (spshownum-1)) < (spshownum - 1)) && (spnum % spshownum != 0)){
            var nowarr = sparr[spid];
            var fori = 0;
            if (scrollimgs.length == 4){
                fori = spshownum-(i % (spshownum-1));
            }else if(scrollimgs.length == 5){
                fori = 1;
            }
            for(var i = 0;i < fori;i++){
                if (spshownum == 3){
                    if (fori > 1 && i == 1) {
                        spcss += ' spCentercss';
                    }
                }else if (spshownum == 2){
                    spcss += ' sprightcss';
                }
                sparr00.push("<div class='" + spcss + "' style='width: " + spimgw + "px;height: " + (spimgh+spith) + "px;'><div class='spimgdiv' style = 'width: " + spimgw + "px;height: " + spimgh + "px;'></div></div>");
            }
            if (spshownum00){
                nowarr.unshift(sparr00);
                spshownum00 = false;
            }else{
                nowarr.push(sparr00);
            }
            sparr[spid] = nowarr;
            sparr00 = [];
        }
    });
    scrollimgnum[spid] = 1;
    switch(sparr[spid].length){
        case 1:
            var nowarr = sparr[spid];
            nowarr.push(sparr[spid][0],sparr[spid][0]);
            sparr[spid] = nowarr;
            scrollimgnum2[spid] = false;
            break;
        case 2:
            if ((scrollimgs.length == 4 || scrollimgs.length == 5) && spshownum == 3){
                sparr[spid].unshift(sparr[spid].pop());
            }
            var nowarr = sparr[spid];
            sparr2[spid] = nowarr;
            scrollimgnum2[spid] = true;
            var spi = sparr[spid].length - 1;
            nowarr.unshift(sparr[spid][spi]);
            sparr[spid] = nowarr;
            break;
        default:
            scrollimgnum2[spid] = false;
            break;
    }
    
    if (scrollimgs.length == 6 && spshownum < 3){
        sparr[spid].unshift(sparr[spid].pop());
    }else if((scrollimgs.length == 4 || scrollimgs.length == 5) && spshownum == 1){
        sparr[spid].unshift(sparr[spid].pop());
    }

    sparr[spid].forEach(function(obj,i){
        $('#' + spid + ' .scrollpicture').append(sparr[spid][i]);
    });
    
    $('.sp').height($('.spDIV').height()-1);
    $('.scrollpicturetitle').width(spimgw);
    $('.scrollpicturetitle').height(40);
    $('.scrollpicture').width(spdivlen * spw);
    $('.scrollpicture').height($('.spDIV').height());
    $(".scrollpicture").css({'left': -spw + 'px'});
    $('.spimgdiv img').bind('load',function(){
        var imgwidth = this.width;
        if (!imgwidth){
            imgwidth = $('.spimgdiv').width();
        }
        if(this.height > $('.spimgdiv').height()){
            $(this).css({'top': -(this.height - $('.spimgdiv').height())/2 + 'px'});
        }else if(this.height < $('.spimgdiv').height()){
            $(this).width('auto');
            $(this).height($('.spimgdiv').height());
            $(this).css({'left': -(this.width - $('.spimgdiv').width())/2 + 'px'});
        }
    });
    $(".spbutton").height($('.spimgdiv').height());
}
function rewh(){
    spw = $('.scrollview').width();
    var oldspshownum = spshownum;
    if (spw <= 480) {
        spshownum = 1;
    } else if (spw <= 840) {
        spshownum = 2;
    } else {
        spshownum = 3;
    }
    if (oldspshownum != spshownum) {
        sparr = {"":[]};
        $(".spfatherDIV").each(function() {
            var spid = $(this).attr("id");
            sparr[spid] = [];
            var sparr00 = [];
            scrollimgs.forEach(function(obj,i){
                var spcss = 'spDIV';
                if (spshownum == 3){
                    if (i % spshownum == 1) {
                        spcss += ' spCentercss';
                    }
                }else if (spshownum == 2){
                    if (i % spshownum == 0) {
                        spcss += ' spleftcss';
                    }else{
                        spcss += ' sprightcss';
                    }
                }
                sparr00.push("<div class='" + spcss + "' style = 'width: " + spimgw + "px;height: " + spimgh + "px;'><a href='" + obj[2] + "'><div></div><img src='" + obj[1] + "'/></a></div>");
                if (spshownum == 3){
                    if (i % spshownum == 2){
                        var nowarr = sparr[spid];
                        nowarr.push(sparr00);
                        sparr[spid] = nowarr;
                        sparr00 = [];
                    }
                } else if (spshownum == 2){
                    if (i % spshownum == 1){
                        var nowarr = sparr[spid];
                        nowarr.push(sparr00);
                        sparr[spid] = nowarr;
                        sparr00 = [];
                    }
                } else if (spshownum == 1){
                    if (i == (scrollimgs.length - 1)){
                        sparr[spid] = sparr00;
                        sparr00 = [];
                    }
                }
            });
            switch(sparr[spid].length){
                case 1:
                    var nowarr = sparr[spid];
                    nowarr.push(sparr[spid][0],sparr[spid][0]);
                    sparr[spid] = nowarr;
                    break;
                case 2:
                    var nowarr = sparr[spid];
                    sparr2[spid] = nowarr;
                    scrollimgnum2[spid] = true;
                    nowarr.push(sparr[spid][0]);
                    sparr[spid] = nowarr;
                    break;
                default:
                    break;
            }
        });
    }
    $('.scrollpicture').html("");
    $(".spfatherDIV").each(function() {
        var spid = $(this).attr("id");
        sparr[spid].forEach(function(obj,j){
            $('#' + spid + ' .scrollpicture').append(sparr[spid][j]);
        });
    });
    var spimgw = (spw - spc*(spshownum-1)) / spshownum;
    spimgh = spimgw / 16 * 9+spith;
    $(".spDIV").width(spimgw);
    $(".spDIV").height(spimgh);
    $('.sp').height($('.spDIV').height());
    $('.scrollpicture').width(spdivlen * spw);
    $('.scrollpicture').height($('.spDIV').height());
    $(".scrollpicture").css({'left': -spw + 'px'});
    $('.spimgdiv img').each(function(){     
        if(this.height > $('.spimgdiv').height()){
            $(this).css({'top': -(this.height - $('.spimgdiv').height())/2 + 'px'});
        }else if(this.height < $('.spimgdiv').height()){
            $(this).width('auto');
            $(this).height($('.spimgdiv').height());
            $(this).css({'left': -(this.width - $('.spimgdiv').width())/2 + 'px'});
        }
    });
}
function leftbutton(spid){
    $('#' + spid + ' .spleft').removeAttr("onclick");
    var spw = $('#' + spid + ' .scrollpicture').position().left + $('.scrollview').width();
    $('#' + spid + ' .scrollpicture').animate({left: spw + "px"},500,function(){
        $('#' + spid + ' .spleft').attr("onclick","leftbutton('" + spid + "');");
        $('.scrollpicture').css({'left': -$('.scrollview').width() + 'px'});
        $('#' + spid + ' .scrollpicture').html("");
        sparr[spid].forEach(function(obj, i){
            if (scrollimgnum2[spid]){
                sparr1.push(sparr2[spid][scrollimgnum[spid]]);
                if(scrollimgnum[spid] == 0){
                    scrollimgnum[spid]++;
                }else if(scrollimgnum[spid] == 1){
                    scrollimgnum[spid]--;
                }
            }else{
                if (i < (sparr[spid].length - 1)){
                    sparr1.push(obj);
                }else{
                    sparr1.unshift(obj);
                }
            }
        });
        sparr1.forEach(function(obj,i){
            $('#' + spid + ' .scrollpicture').append(obj);
        });
        $('.spimgdiv img').each(function(){
            if(this.height > $('.spimgdiv').height()){
                $(this).css({'top': -(this.height - $('.spimgdiv').height())/2 + 'px'});
            }else if(this.height < $('.spimgdiv').height()){
                $(this).width('auto');
                $(this).height($('.spimgdiv').height());
                spw = $('.scrollview').width();
                var spimgw = (spw - spc*(spshownum-1)) / spshownum;
                spimgh = spimgw / 16 * 9 + spith;
                $(".spimgdiv").height(spimgh);
                $(".spimgdiv").width(spimgw);
                $(this).css({'left': -($(this).width - $('.spimgdiv').width())/2 + 'px'});
            }
        });
        sparr[spid] = sparr1;
        sparr1 = [];
    });
}
function disableautowidth() {
    $(".racing_single_single img").css({"width":"","height":""});
}
function rightbutton(spid){
    $('#' + spid + ' .spright').removeAttr("onclick");
    var spw = $('#' + spid + ' .scrollpicture').position().left - $('.scrollview').width();
    $('#' + spid + ' .scrollpicture').animate({left: spw + "px"},500,function(){
        $('#' + spid + ' .spright').attr("onclick","rightbutton('" + spid + "');");
        $('.scrollpicture').css({'left': -$('.scrollview').width() + 'px'});
        $('#' + spid + ' .scrollpicture').html("");
        sparr[spid].forEach(function(obj, i){
            if (scrollimgnum2[spid]){
                sparr1.push(sparr2[spid][scrollimgnum[spid]]);
                if(scrollimgnum[spid] == 0){
                    scrollimgnum[spid]++;
                }else if(scrollimgnum[spid] == 1){
                    scrollimgnum[spid]--;
                }
            }else{
                if (i == 0){
                    sparr1.push(obj);
                }else{
                    sparr1.splice(i-1,0,obj);
                }
            }
        });
        sparr1.forEach(function(obj,i){
            $('#' + spid + ' .scrollpicture').append(obj);
        });
        $('.spimgdiv img').each(function(){
            if(this.height > $('.spimgdiv').height()){
                $(this).css({'top': -(this.height - $('.spimgdiv').height())/2 + 'px'});
            }else if(this.height < $('.spimgdiv').height()){
                $(this).width('auto');
                $(this).height($('.spimgdiv').height());
                spw = $('.scrollview').width();
                var spimgw = (spw - spc*(spshownum-1)) / spshownum;
                spimgh = spimgw / 16 * 9 + spith;
                $(".spimgdiv").height(spimgh);
                $(".spimgdiv").width(spimgw);
                $(this).css({'left': -(this.width - $('.spimgdiv').width())/2 + 'px'});
            }
        });
        sparr[spid] = sparr1;
        sparr1 = [];
    });
}
//滚动图片]