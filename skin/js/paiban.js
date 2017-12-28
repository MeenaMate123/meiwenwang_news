function format() {
    var message = "\n" + document.getElementById("themessage").value;
    message = message.replace(/　/ig, "");
    message = message.replace(/       /ig, "");
    message = message.replace(/      /ig, "");
    message = message.replace(/     /ig, "");
    message = message.replace(/    /ig, " ");
    message = message.replace(/   /ig, " ");
    message = message.replace(/  /ig, " ");
    message = message.replace(/\r\n/ig, "\n");
    message = message.replace(/\n\n/ig, "\n");
    message = message.replace(/\n\n/ig, "\n");
    message = message.replace(/\n\n/ig, "\n");
    message = message.replace(/\n\n/ig, "\n");
    message = message.replace(/\n /, "\n");
    message = message.replace(/\n/, "");
    message = message.replace(/\n$/, "");
    message = message.replace(/\n /ig, "\n");
    message = message.replace(/ \n/ig, "\n");
    message = message.replace(/\n/ig, "\n\n　　");
    for (var ii = 0; 100 > ii; ii++) {
        message = message.replace(",", "，");
        message = message.replace("?", "？");
        message = message.replace(".", "。");
        message = message.replace(";", "；");
        message = message.replace(":", "：");
        message = message.replace("!", "！");
    }
    message = message.replace(/。。。。。。。。/g, "……");
    message = message.replace(/。。。。。。。/g, "……");
    message = message.replace(/。。。。。。/g, "……");
    message = message.replace(/。。。。。/g, "……");
    message = message.replace(/。。。。/g, "……");
    message = message.replace(/。。。/g, "……");
    message = message.replace(/。。/g, "。");
    message = message.replace(/～～～～～～～～/g, "……");
    message = message.replace(/～～～～～～～/g, "……");
    message = message.replace(/～～～～～～/g, "……");
    message = message.replace(/～～～～～/g, "……");
    message = message.replace(/～～～～/g, "……");
    message = message.replace(/～～～/g, "……");
    message = message.replace(/～～/g, "……");
    message = message.replace(/,,,,,,,,/g, "……");
    message = message.replace(/,,,,,,,/g, "……");
    message = message.replace(/,,,,,,/g, "……");
    message = message.replace(/,,,,,/g, "……");
    message = message.replace(/,,,,/g, "……");
    message = message.replace(/,,,/g, "……");
    message = message.replace(/,,/g, ",");
    message = message.replace(/，，，，，，，，/g, "……");
    message = message.replace(/，，，，，，，/g, "……");
    message = message.replace(/，，，，，，/g, "……");
    message = message.replace(/，，，，，/g, "……");
    message = message.replace(/，，，，/g, "……");
    message = message.replace(/，，，/g, "……");
    message = message.replace(/，，/g, "，");
    message = message.replace(/\.\.\.\.\.\.\.\./g, "……");
    message = message.replace(/\.\.\.\.\.\.\./g, "……");
    message = message.replace(/\.\.\.\.\.\./g, "……");
    message = message.replace(/\.\.\.\.\./g, "……");
    message = message.replace(/\.\.\.\./g, "……");
    message = message.replace(/\.\.\./g, "……");
    message = message.replace(/\.\./g, ".");
    message = message.replace(/~~~~~~~/g, "……");
    message = message.replace(/~~~~~~/g, "……");
    message = message.replace(/~~~~~/g, "……");
    message = message.replace(/~~~~/g, "……");
    message = message.replace(/~~~/g, "……");
    message = message.replace(/！！！！！/g, "！");
    message = message.replace(/！！！！/g, "！");
    message = message.replace(/！！！/g, "！");
    message = message.replace(/！！/g, "！");
    message = message.replace(/!!!!!!/g, "!");
    message = message.replace(/!!!!!/g, "!");
    message = message.replace(/!!!!/g, "!");
    message = message.replace(/!!!/g, "!");
    message = message.replace(/!!/g, "!");
    message = message.replace(/？？？？？？/g, "？");
    message = message.replace(/？？？？？/g, "？");
    message = message.replace(/？？？？/g, "？");
    message = message.replace(/？？？/g, "？");
    message = message.replace(/？？/g, "？");
    message = message.replace(/\?\?\?\?\?\?/g, "?");
    message = message.replace(/\?\?\?\?\?/g, "?");
    message = message.replace(/\?\?\?\?/g, "?");
    message = message.replace(/\?\?\?/g, "?");
    message = message.replace(/\?\?/g, "?");
    message = message.replace(/<</g, "《");
    message = message.replace(/>>/g, "》");
    message = message.replace(/``````/g, "……");
    message = message.replace(/````/g, "……");
    message = message.replace(/```/g, "……");
    message = message.replace(/``/g, "……");
    message = message.replace(/．．．．．．．．/g, "……");
    message = message.replace(/．．．．．．/g, "……");
    message = message.replace(/．．．．．．/g, "……");
    message = message.replace(/．．．．．/g, "……");
    message = message.replace(/．．．．/g, "……");
    message = message.replace(/．．．/g, "……");
    message = message.replace(/．．/g, "．");
    message = message.replace(/---------/g, "——");
    message = message.replace(/--------/g, "——");
    message = message.replace(/-------/g, "——");
    message = message.replace(/------/g, "——");
    message = message.replace(/-----/g, "——");
    message = message.replace(/----/g, "——");
    message = message.replace(/、、、、、、、、/g, "……");
    message = message.replace(/、、、、、、、/g, "……");
    message = message.replace(/、、、、、、/g, "……");
    message = message.replace(/、、、、、/g, "……");
    message = message.replace(/、、、、/g, "……");
    message = message.replace(/、、、/g, "……");
    message = message.replace(/、、/g, " 、");
    message = message.replace(/········/g, "……");
    message = message.replace(/·······/g, "……");
    message = message.replace(/······/g, "……");
    message = message.replace(/·····/g, "……");
    message = message.replace(/····/g, "……");
    message = message.replace(/···/g, "……");
    message = message.replace(/··/g, "……");
    message = message.replace(/~！/g, "！");
    message = message.replace(/~!/g, "!");
    document.getElementById("themessage").value = message;
}
function format2() {
    var message = "\n" + document.getElementById("themessage").value;
    message = message.replace(/ |　/ig, "");
    message = message.replace(/\r\n/ig, "\n");
    message = message.replace(/\n\n/ig, "\n");
    message = message.replace(/\n\n/ig, "\n");
    message = message.replace(/\n\n/ig, "\n");
    message = message.replace(/\n\n/ig, "\n");
    message = message.replace(/\n/ig, " \n");
    message = message.replace("\n\n", "\n");
    document.getElementById("themessage").value = message;
}
function findObj(n, d) {
    var p, i, x;
    if (!d) d = document;
    if ((p = n.indexOf("?")) > 0 && parent.frames.length) {
        d = parent.frames[n.substring(p + 1)].document;
        n = n.substring(0, p);
    }
    if (! (x = d[n]) && d.all) x = d.all[n];
    for (i = 0; ! x && i < d.forms.length; i++) x = d.forms[i][n];
    for (i = 0; ! x && d.layers && i < d.layers.length; i++) x = findObj(n, d.layers[i].document);
    if (!x && document.getElementById) x = document.getElementById(n);
    return x;
}
function chklen() {
    var strlen;
    strlen = document.getElementById('themessage').value.length;
    alert("目前长度 " + strlen + " 字节，一个汉字等于2个字节\n");
    return;
}
function copy(ob) {
    var obj = findObj(ob);
    if (obj) {
        obj.select();
        js = obj.createTextRange();
        js.execCommand("Copy");
    }
}