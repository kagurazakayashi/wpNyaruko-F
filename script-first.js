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