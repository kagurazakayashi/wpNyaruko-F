console.log("Loading...");
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
function contentformat() {
    var texts = $(".racing_text");
    var textlines = texts.html().split('\n');
    var firstline = true;
    var spacespan = '<span class="racing_indent"></span>';
    for (let line = 0; line < textlines.length; line++) {
        var nowline = textlines[line];
        var nowlinetype = nowline.replace(/(^\s*)|(\s*$)/g, "").substr(0,2);
        if (nowlinetype == "<i" || nowlinetype == "<s" || nowlinetype == "<d" || nowlinetype == "<v" || nowlinetype == "") {
            if (firstline && nowlinetype != "") {
                if (firstline) {
                    if (nowlinetype == "<d") {
                        $("#sortingtotext").css("height","20px");
                    } else if (nowlinetype != "") {
                        $("#sortingtotext").css("height","0px");
                    }
                    firstline = false;
                }
            }
        } else  {
            if (nowlinetype != "<p") {
                textlines[line] = spacespan + textlines[line];
            }
            firstline = false;
        }
    }
    var newhtml = textlines.join('\n');
    newhtml = newhtml.replace(/\n\n/g, '<br/>');
    texts.html(newhtml);
}
function insertstr(scrstr,instr,strindex) {
    var newstr="";
    for(var i=0;i<scrstr.length;i+=strindex){
        var tmp=scrstr.substring(i, i+strindex);
        newstr+=tmp+instr;
    }
    return newstr;
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