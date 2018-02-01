var colmgr_blo_val = -1;
var colmgr_bln_val = -1;
var colmgr_blo_stype = 0;
var colmgr_blo_snum = 10;
var colmgr_blo_names = [];
var colmgr_blo_stypes = [];
var colmgr_cmd = "";
$(document).ready(function(){
    colmgr_cmd = $("#wpNyarukoIndexModule").attr("value");
    colmgr_blo_cmd2gui();
    flexicolorpickerinit();
});
function colmgr_blo_click(thisdiv) {
    var classname0 = thisdiv.attr("class").split(" ")[0];
    if (classname0 == "colmgr_blo") {
        $(".colmgr_blo").attr("class","colmgr_blo");
        thisdiv.attr("class","colmgr_blo colmgr_blo_selected");
        colmgr_blo_val = parseInt(thisdiv.attr("id").split("_")[2]);
    } else if (classname0 == "colmgr_bln") {
        $(".colmgr_bln").attr("class","colmgr_bln");
        thisdiv.attr("class","colmgr_bln colmgr_blo_selected");
        colmgr_bln_val = parseInt(thisdiv.attr("id").split("_")[2]);
    }
}
function colmgr_blo_stypeonchange(value) {
    colmgr_blo_stype = value.split(" ");
}
function colmgr_blo_snumonchange(value) {
    colmgr_blo_snum = value.split(" ");
}
function colmgr_blnmgr_click(mode) {
    if (colmgr_bln_val >= 0) {
        var newselect = -1;
        var items = colmgr_cmd.split("|");
        if (mode == 2) {
            items.splice(colmgr_bln_val,1);
            newselect = colmgr_bln_val;
        } else if (mode == 1 && colmgr_bln_val > 0) {
            var nitem = items[colmgr_bln_val];
            items.splice(colmgr_bln_val,1);
            newselect = colmgr_bln_val-1;
            items.splice(newselect,0,nitem);
        } else if (mode == 3 && colmgr_bln_val < items.length-2) {
            var nitem = items[colmgr_bln_val];
            items.splice(colmgr_bln_val,1);
            newselect = colmgr_bln_val+1;
            items.splice(newselect,0,nitem);
        } else {
            return;
        }
        colmgr_bln_val = -1;
        colmgr_cmd = items.join("|");
        $("#wpNyarukoIndexModule").attr("value",colmgr_cmd);
        colmgr_blo_cmd2gui();
        if (newselect >= 0 && newselect < items.length-1) {
            $("#colmgr_bln_"+newselect).attr("class","colmgr_bln colmgr_blo_selected");
            colmgr_bln_val = newselect;
        }
    }
}
function colmgr_blnset_click(mode) {
    var colmgr_indexcol = $("#wpNyarukoIndexModule");
    var imp = prompt("主页模块配置代码:",colmgr_indexcol.attr("value"));
    if (imp != null){
        colmgr_indexcol.attr("value",imp);
        colmgr_cmd = imp;
        colmgr_blo_cmd2gui();
    }
}
function colmgr_blo_add() {
    if (colmgr_blo_val >= 0) {
        var blocmd = colmgr_blo_val + "_" + colmgr_blo_stype + "_" + colmgr_blo_snum + "|";
        colmgr_cmd += blocmd;
        $("#wpNyarukoIndexModule").attr("value",colmgr_cmd);
        colmgr_blo_cmd2gui();
    }
}
function colmgr_blo_cmd2gui() {
    var items = colmgr_cmd.split("|");
    var html = "";
    for (let i = 0; i < items.length; i++) {
        var iteminfo = items[i].split("_");
        if (iteminfo.length == 3) {
            var ncolmgr_blo_val = iteminfo[0];
            var ncolmgr_blo_stype = iteminfo[1];
            var ncolmgr_blo_snum = iteminfo[2];
            var show_ncolmgr_blo_snum = "";
            if (ncolmgr_blo_snum >= 0) {
                show_ncolmgr_blo_snum = '，显示 '+ncolmgr_blo_snum+' 篇</div>';
            }
            html += '<div class="colmgr_bln" id="colmgr_bln_'+i+'" onclick="colmgr_blo_click($(this));"><b>'+colmgr_blo_names["id"+ncolmgr_blo_stype.toString()]+'</b><br/>'+colmgr_blo_stypes[ncolmgr_blo_val]+show_ncolmgr_blo_snum+'</div>';
        }
    }
    var colmgr_nowtb = $("#colmgr_nowtb");
    if (html == "") {
        colmgr_nowtb.html('<p>当前没有模块</p>');
    } else {
        colmgr_nowtb.html(html);
    }
}
var fcpDefault,fcpiHex,fcpiR,fcpiG,fcpiB,fcpiH,fcpiS,fcpiV,fcpcolor = null;
var fcpinitialHex = '#f4329c';
function flexicolorpickerinit() {
    fcpDefault = ColorPicker(document.getElementById('fcp_yashi'), updateInputs);
    fcpiHex = document.getElementById('fcp_hex');
    fcpiR = document.getElementById('fcp_rgb_r');
    fcpiG = document.getElementById('fcp_rgb_g');
    fcpiB = document.getElementById('fcp_rgb_b');
    fcpiH = document.getElementById('fcp_hsv_h');
    fcpiS = document.getElementById('fcp_hsv_s');
    fcpiV = document.getElementById('fcp_hsv_v');
    fcpcolor = document.getElementById('fcp_color');
    fcpinitialHex = '#f4329c';
    fcpDefault.setHex(fcpinitialHex);
    fcpiHex.onchange = function() { fcpDefault.setHex(fcpiHex.value); };
    fcpiR.onchange = function() { fcpDefault.setHex(ColorPicker.rgb2hex({ r: fcpiR.value, g: fcpiG.value, b: fcpiB.value })); }
    fcpiG.onchange = function() { fcpDefault.setHex(ColorPicker.rgb2hex({ r: fcpiR.value, g: fcpiG.value, b: fcpiB.value })); }
    fcpiB.onchange = function() { fcpDefault.setHex(ColorPicker.rgb2hex({ r: fcpiR.value, g: fcpiG.value, b: fcpiB.value })); }
    fcpiH.onchange = function() { fcpDefault.setHex(ColorPicker.hsv2hex({ h: fcpiH.value, s: fcpiS.value, v: fcpiV.value })); }
    fcpiS.onchange = function() { fcpDefault.setHex(ColorPicker.hsv2hex({ h: fcpiH.value, s: fcpiS.value, v: fcpiV.value })); }
    fcpiV.onchange = function() { fcpDefault.setHex(ColorPicker.hsv2hex({ h: fcpiH.value, s: fcpiS.value, v: fcpiV.value })); }
}
function colorpickerclose(save) {
    $(".colorpickerbox").css("display","none");
}
function updateInputs(hex) {
    var rgb = ColorPicker.hex2rgb(hex);
    var hsv = ColorPicker.hex2hsv(hex);
    fcpiHex.value = hex;
    fcpiR.value = rgb.r;
    fcpiG.value = rgb.g;
    fcpiB.value = rgb.b;
    fcpiH.value = hsv.h.toFixed(2);
    fcpiS.value = hsv.s.toFixed(2);
    fcpiV.value = hsv.v.toFixed(2);
    fcpcolor.style.backgroundColor = hex;
}