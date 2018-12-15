console.log("Loading...");
var yashitheme = "wpnyarukof";
var wpnyarukolive_ready = true;
function medialoaded() {
    console.log('Loading (2/2)Media ...OK');
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
if (typeof(wpNyarukoNotFormat) == "undefined") {
    var wpNyarukoNotFormat = false;
}
function contentformat() {
    if (wpNyarukoNotFormat) return;
    var texts = $(".racing_text");
    var alltext = texts.html();
    var textlines = alltext.split('\n');
    var firstline = true;
    var spacespan = '<span class="racing_indent"></span>';
    var noformats = ["[noformat]","[noformat=all]","<script","<link","[noformat=img]","[noformat=indent]","[nyarukotabloid]"];
    var isnoformat = false;
    var newhtml = "";
    for (let noformatj = 2; noformatj <= 3; noformatj++) {
        const noformat = noformats[noformatj];
        if (textlines[0].length >= noformat.length && textlines[0].substr(0,noformat.length) == noformat) {
            isnoformat = true;
            break;
        }
    }
    if (!isnoformat) {
        for (let noformati = 0; noformati < noformats.length; noformati++) {
            const noformat = noformats[noformati];
            if (textlines[0].length >= noformat.length && textlines[0].substr(0,noformat.length) == noformat) {
                isnoformat = true;
                newhtml = alltext.substr(noformat.length,alltext.length-noformat.length);
                break;
            }
        }
    }
    if (textlines[0].length >= noformats[4].length && textlines[0].substr(0,noformats[4].length) == noformats[4]) {
        console.log(noformats[4]);
        isnoformat = false;
    }
    if (textlines[0].length >= noformats[5].length && textlines[0].substr(0,noformats[5].length) == noformats[5]) {
        console.log(noformats[5]);
        spacespan = "";
    }
    var debug_noformat = window.location.hash == "#noformat" ? true : false;
    var debug_format = window.location.hash == "#format" ? true : false;
    if (debug_noformat) {
        console.log("[DEBUG MODE] noformat");
        isnoformat = true;
    }
    if (debug_format) {
        console.log("[DEBUG MODE] format");
        isnoformat = false;
    }
    if (!isnoformat) {
        console.log("format...");
        for (let line = 0; line < textlines.length; line++) {
            var nowline = textlines[line];
            var nowlinetype = nowline.replace(/(^\s*)|(\s*$)/g, "").substr(0,2);
            if (window.location.hash == "#formatlog") {
                console.log(line,nowlinetype,nowline);
            }
            if (nowlinetype == "<i" || nowlinetype == "<s" || nowlinetype == "<d" || nowlinetype == "<v" || nowlinetype == "") {
                if (firstline && nowlinetype != "") {
                    if (firstline) {
                        if (nowlinetype == "<d" || nowlinetype == "<p") {
                            $("#sortingtotext").css("height","20px");
                        } else if (nowlinetype != "") {
                            $("#sortingtotext").css("height","0px");
                        }
                        firstline = false;
                    }
                }
            } else  {
                firstline = false;
            }
            if (nowlinetype == "<p") {
                var nowlinesplit = nowline.split('>');
                var nowlinetype2 = nowlinesplit[1];
                if (nowlinetype2.length > 4) {
                    if (nowlinetype2.substr(0,4) != "<img") {
                        textlines[line] = nowlinesplit[0] + ">" + spacespan + nowlinetype2 + ">";
                        if (nowlinesplit.length > 2) {
                            for (let lineti = 2; lineti < nowlinesplit.length; lineti++) {
                                const nowospan = nowlinesplit[lineti];
                                if (nowospan != "") textlines[line] += nowospan + ">";
                            }
                        }
                    }
                }
            } else if (nowlinetype != "" && nowlinetype.substr(0,1) != "<") {
                textlines[line] = spacespan + nowline;
            } else {
                textlines[line] = nowline;
            }
        }
        newhtml = textlines.join('<br/>');
        newhtml = newhtml.replace(/<br\/><br\/>/g, '<br/>');
        newhtml = newhtml.replace(/<br\/><p/g, '<p');
        newhtml = newhtml.replace(/<br\/> 	<li>/g, '<li>');
        newhtml = newhtml.replace(/<br\/><\/ul><br\/>/g, '</ul>');
        newhtml = newhtml.replace(/<br\/><\/ol><br\/>/g, '</ol>');
        newhtml = newhtml.replace(/<\/h1><br\/>/g, '</h1>');
        newhtml = newhtml.replace(/<\/h2><br\/>/g, '</h2>');
        newhtml = newhtml.replace(/<\/h3><br\/>/g, '</h3>');
        newhtml = newhtml.replace(/<\/h4><br\/>/g, '</h4>');
        newhtml = newhtml.replace(/<\/h5><br\/>/g, '</h5>');
        newhtml = newhtml.replace(/<\/h6><br\/>/g, '</h6>');
        textboxsethtml(texts,newhtml);
        if (!(textlines[0].length >= noformats[2].length && textlines[0].substr(0,noformats[2].length) == noformats[2])) {
            $(".racing_single_single img").each(function(){
                $(this).addClass("racing_single_autosizeimg");
            });
        }
        var scrolltable = $(".scrolltable");
        for (let sti = 0; sti < scrolltable.length; sti++) {
            const scrolltablen = $(scrolltable[sti]);
            const scrolltablet = $(".scrolltable table")[sti];
            scrolltablen.html(scrolltablet);
        }
    } else {
        textboxsethtml(texts,newhtml);
    }
}
function textboxsethtml(texts,newhtml) {
    if (newhtml != "") texts.html(newhtml);
}
function insertstr(scrstr,instr,strindex) {
    var newstr="";
    for(var i=0;i<scrstr.length;i+=strindex){
        var tmp=scrstr.substring(i, i+strindex);
        newstr+=tmp+instr;
    }
    return newstr;
}
function isopenlink(url) {
    if ((isMobile && linkdef[1] == "on") || (!isMobile && linkdef[0] == "on")) {
        return true;
    }
    return false;
}
function openlink(url) {
    if (isopenlink(url)) {
        window.open(url, '_blank').location;
    } else {
        window.location.href = url;
    }
}
//[滚动图片
var scrollpicturespid = [];
var scrollpictureimgs = [];
function scrollpicture(spid) {
    scrollpicturespid.push(spid);
}
function setscrollimgs(imgsarr){
    scrollpictureimgs.push(imgsarr);
}
//滚动图片]