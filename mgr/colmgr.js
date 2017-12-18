var colmgr_blo_val = -1;
var colmgr_bln_val = -1;
var colmgr_blo_stype = 0;
var colmgr_blo_snum = -1;
var colmgr_cmd = "";
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
        $("#colmgr_indexcol").attr("value",colmgr_cmd);
        colmgr_blo_cmd2gui();
        if (newselect >= 0 && newselect < items.length-1) {
            $("#colmgr_bln_"+newselect).attr("class","colmgr_bln colmgr_blo_selected");
            colmgr_bln_val = newselect;
        }
    }
}
function colmgr_blnset_click(mode) {
    var colmgr_indexcol = $("#colmgr_indexcol");
    var imp = prompt("主页模块配置代码:",colmgr_indexcol.attr("value"));
    if (imp != null){
        colmgr_indexcol.attr("value",imp);
        colmgr_cmd = imp;
        colmgr_blo_cmd2gui();
    }
}
function colmgr_blo_add() {
    if (colmgr_blo_val > 0) {
        var blocmd = colmgr_blo_val + "_" + colmgr_blo_stype + "_" + colmgr_blo_snum + "|";
        colmgr_cmd += blocmd;
        $("#colmgr_indexcol").attr("value",colmgr_cmd);
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
            if (ncolmgr_blo_snum < 0) {
                ncolmgr_blo_snum = "默认";
            }
            html += '<div class="colmgr_bln" id="colmgr_bln_'+i+'" onclick="colmgr_blo_click($(this));"><b>栏目名称</b><hr>样式代码：'+ncolmgr_blo_val+'<br/>分类代码：'+ncolmgr_blo_stype+'，显示数量：'+ncolmgr_blo_snum+'</div>';
        }
    }
    var colmgr_nowtb = $("#colmgr_nowtb");
    if (html == "") {
        colmgr_nowtb.html('<p>当前没有模块</p>');
    } else {
        colmgr_nowtb.html(html);
    }
}