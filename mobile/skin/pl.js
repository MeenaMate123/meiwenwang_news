//畅言评论插件
(function(){
    var expire_time = parseInt((new Date()).getTime()/(5*60*1000));
    var head = document.head || document.getElementsByTagName("head")[0] || document.documentElement;
    var script_version = document.createElement("script"),script_cyan = document.createElement("script");
    script_version.type = script_cyan.type = "text/javascript";
    script_version.charset = script_cyan.charset = "utf-8";
    script_version.onload = function(){
        script_cyan.id = 'changyan_mobile_js';
        script_cyan.src = 'http://changyan.itc.cn/upload/mobile/wap-js/changyan_mobile.js?client_id=cyrIiB2Xt&'
                        + 'conf=prod_89d2e1e34e8a801f5cc5478bfccd44c4&version=' + cyan_resource_version;
        head.insertBefore(script_cyan, head.firstChild);
    };
    script_version.src = 'http://changyan.sohu.com/upload/mobile/wap-js/version.js?_='+expire_time;
    head.insertBefore(script_version, head.firstChild);
})();
