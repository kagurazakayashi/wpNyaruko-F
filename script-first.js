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
function qr(text="",innerid="qrview",imgtype="",type="",errorcorrection="",mode="") {
	if (text == "") {
		text = window.location.href;
	}
	if (qrdef.length > 0) {
		if (imgtype == "") {
			imgtype = qrdef[4];
		}
		if (type == "") {
			type = qrdef[0];
		}
		if (errorcorrection == "") {
			errorcorrection = qrdef[1];
		}
		if (mode == "") {
			mode = qrdef[2];
		}
	}
	if (imgtype == "" || type == "" || errorcorrection == "" || mode == "") {
		return;
	}
	var qrgen = qrcode(type, errorcorrection);
	qrgen.addData(text, mode);
	qrgen.make();
	var innerdiv = document.getElementById(innerid);
	if (imgtype == "tab") {
		innerdiv.innerHTML = qrgen.createTableTag();
	}
	if (imgtype == "svg") {
		innerdiv.innerHTML = qrgen.createSvgTag();
	}
	if (imgtype == "img") {
		innerdiv.innerHTML = qrgen.createImgTag();
	}
}
function contentformat() {
    // $(".racing_single_single img").css({"width":"90%","height":"auto"});
}
//[滚动图片 ready:scrollpicture('sp1'); resize:rewh();
var sparr = {"":[]};
var sparr1 = [];
var scrollimgs = [];
var spw = 0;
var spc = 10;
var spimgw = 0;
var spimgh = 0;
var spnum = 0;
var spshownum = 3;
var spdivlen = Math.ceil(spnum/spshownum);
function setscrollimgs(imgsarr){
    scrollimgs = imgsarr;
}
function scrollpicture(spid) {
	var sparr00 = [];
	sparr[spid] = [];
    if(spdivlen < 3){
        spdivlen = 3;
    }
    var spw = $('body').width();
    if (spw <= 480) {
		spshownum = 1;
    } else if (spw <= 840) {
        spshownum = 2;
    } else {
		spshownum = 3;
	}
    var spc = 10;
    var spimgw = (spw - spc*(spshownum-1)) / spshownum;
    var spimgh = spimgw / 16 * 9;
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
        }else if (spshownum == 2){
            if (i % spshownum == 1){
				var nowarr = sparr[spid];
				nowarr.push(sparr00);
				sparr[spid] = nowarr;
                sparr00 = [];
            }
        }else if (spshownum == 1){
            if (i == (scrollimgs.length - 1)){
                sparr[spid] = sparr00;
                sparr00 = [];
            }
        }
        spnum++;
    });
    
    switch(sparr[spid].length){
        case 1:
			var nowarr = sparr[spid];
			nowarr.push(sparr[spid][0],sparr[spid][0]);
			sparr[spid] = nowarr;
            break;
        case 2:
			var nowarr = sparr[spid];
			nowarr.push(sparr[spid][0]);
			sparr[spid] = nowarr;
            break;
        default:
            break;
    }
    sparr[spid].forEach(function(obj,i){
        $('#' + spid + ' .scrollpicture').append(sparr[spid][i]);
    });
    
    
    $('.sp').height($('.spDIV').height());
    $('.scrollpicture').width(spdivlen * spw);
    $('.scrollpicture').height($('.spDIV').height());
    $(".scrollpicture").css({'left': -spw + 'px'});
    $('.spDIV img').bind('load',function(){
        if(this.height > $('.spDIV').height()){
            $(this).css({'top': -(this.height - $('.spDIV').height())/2 + 'px'});
        }else if(this.height < $('.spDIV').height()){
            $(this).width('auto');
            $(this).height($('.spDIV').height());
            $(this).css({'left': -(this.width - $('.spDIV').width())/2 + 'px'});
        }
	});
	$(".spbutton").height($('.spDIV').height());
}
function rewh(){
	spw = $('body').width();
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
				}else if (spshownum == 2){
					if (i % spshownum == 1){
						var nowarr = sparr[spid];
						nowarr.push(sparr00);
						sparr[spid] = nowarr;
						sparr00 = [];
					}
				}else if (spshownum == 1){
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
    spimgh = spimgw / 16 * 9;
    $(".spDIV").width(spimgw);
    $(".spDIV").height(spimgh);
    $('.sp').height($('.spDIV').height());
    $('.scrollpicture').width(spdivlen * spw);
    $('.scrollpicture').height($('.spDIV').height());
	$(".scrollpicture").css({'left': -spw + 'px'});
	// if (oldspshownum != spshownum) {
		$('.spDIV img').each(function(){			
			if(this.height > $('.spDIV').height()){
				$(this).css({'top': -(this.height - $('.spDIV').height())/2 + 'px'});
			}else if(this.height < $('.spDIV').height()){
				$(this).width('auto');
				$(this).height($('.spDIV').height());
				$(this).css({'left': -(this.width - $('.spDIV').width())/2 + 'px'});
			}
		});
	// }
}
function leftbutton(spid){
    $('#' + spid + ' .spleft').removeAttr("onclick");
    var spw = $('#' + spid + ' .scrollpicture').position().left + $('body').width();
    $('#' + spid + ' .scrollpicture').animate({left: spw + "px"},500,function(){
        $('#' + spid + ' .spleft').attr("onclick","leftbutton('" + spid + "');");
        $('.scrollpicture').css({'left': -$('body').width() + 'px'});
        $('#' + spid + ' .scrollpicture').html("");
        sparr[spid].forEach(function(obj, i){
            if (i < (sparr[spid].length - 1)){
                sparr1.push(obj);
            }else{
                sparr1.unshift(sparr[spid][i]);
            }
        });
        sparr1.forEach(function(obj,i){
            $('#' + spid + ' .scrollpicture').append(obj);
        });
        // rewh();
        $('.spDIV img').each(function(){
            if(this.height > $('.spDIV').height()){
                $(this).css({'top': -(this.height - $('.spDIV').height())/2 + 'px'});
            }else if(this.height < $('.spDIV').height()){
                $(this).width('auto');
                $(this).height($('.spDIV').height());
				spw = $('body').width();
				var spimgw = (spw - spc*(spshownum-1)) / spshownum;
				spimgh = spimgw / 16 * 9;
				$(".spDIV").height(spimgh);
				$(".spDIV").width(spimgw);
				$(this).css({'left': -($(this).width - $('.spDIV').width())/2 + 'px'});
            }
        });
        sparr[spid] = sparr1;
        sparr1 = [];
    });
}
function rightbutton(spid){
    $('#' + spid + ' .spright').removeAttr("onclick");
    var spw = $('#' + spid + ' .scrollpicture').position().left - $('body').width();
    $('#' + spid + ' .scrollpicture').animate({left: spw + "px"},500,function(){
        $('#' + spid + ' .spright').attr("onclick","rightbutton('" + spid + "');");
        $('.scrollpicture').css({'left': -$('body').width() + 'px'});
		$('#' + spid + ' .scrollpicture').html("");
        sparr[spid].forEach(function(obj, i){
            if (i == 0){
                sparr1.push(obj);
            }else{
                sparr1.splice(i-1,0,sparr[spid][i]);
            }
		});
        sparr1.forEach(function(obj,i){
			$('#' + spid + ' .scrollpicture').append(obj);
        });
        // rewh();
        $('.spDIV img').each(function(){
            if(this.height > $('.spDIV').height()){
                $(this).css({'top': -(this.height - $('.spDIV').height())/2 + 'px'});
            }else if(this.height < $('.spDIV').height()){
                $(this).width('auto');
				$(this).height($('.spDIV').height());
				spw = $('body').width();
				var spimgw = (spw - spc*(spshownum-1)) / spshownum;
				spimgh = spimgw / 16 * 9;
				$(".spDIV").height(spimgh);
				$(".spDIV").width(spimgw);
				$(this).css({'left': -(this.width - $('.spDIV').width())/2 + 'px'});
            }
		});
        sparr[spid] = sparr1;
        sparr1 = [];
    });
}
//滚动图片]