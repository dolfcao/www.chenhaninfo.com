(function(){function z(){for(var a=$G("tabhead").children,b=0;b<a.length;b++)domUtils.on(a[b],"click",function(a){w((a.target||a.srcElement).getAttribute("data-content-id"))});w("upload")}function w(a){if(a){var b,c,e=$G("tabhead").children;for(b=0;b<e.length;b++)c=e[b].getAttribute("data-content-id"),c==a?(domUtils.addClass(e[b],"focus"),domUtils.addClass($G(c),"focus")):(domUtils.removeClasses(e[b],"focus"),domUtils.removeClasses($G(c),"focus"));switch(a){case "upload":n=n||new x("queueList");break;
case "online":p=p||new y("fileList")}}}function B(){dialog.onok=function(){for(var a=[],b,c=$G("tabhead").children,e=0;e<c.length;e++)if(domUtils.hasClass(c[e],"focus")){b=c[e].getAttribute("data-content-id");break}switch(b){case "upload":a=n.getInsertList();if(b=n.getQueueCount())return $(".info","#queueList").html('<span style="color:red;">'+"\u8fd8\u67092\u4e2a\u672a\u4e0a\u4f20\u6587\u4ef6".replace(/[\d]/,b)+"</span>"),!1;break;case "online":a=p.getInsertList()}editor.execCommand("insertfile",
a)}}function x(a){this.$wrap=a.constructor==String?$("#"+a):$(a);this.init()}function y(a){this.container=utils.isString(a)?document.getElementById(a):a;this.init()}var n,p;window.onload=function(){z();B()};x.prototype={init:function(){this.fileList=[];this.initContainer();this.initUploader()},initContainer:function(){this.$queue=this.$wrap.find(".filelist")},initUploader:function(){function a(a){var b=g('<li id="'+a.id+'"><p class="title">'+a.name+'</p><p class="imgWrap"></p><p class="progress"><span></span></p></li>'),
c=g('<div class="file-panel"><span class="cancel">'+lang.uploadDelete+'</span><span class="rotateRight">'+lang.uploadTurnRight+'</span><span class="rotateLeft">'+lang.uploadTurnLeft+"</span></div>").appendTo(b),e=b.find("p.progress span"),d=b.find("p.imgWrap"),h=g('<p class="error"></p>').hide().appendTo(b),k=function(a){switch(a){case "exceed_size":text=lang.errorExceedSize;break;case "interrupt":text=lang.errorInterrupt;break;case "http":text=lang.errorHttp;break;case "not_allow_type":text=lang.errorFileType;
break;default:text=lang.errorUploadRetry}h.text(text).show()};"invalid"===a.getStatus()?k(a.statusText):(d.text(lang.uploadPreview),-1=="|png|jpg|jpeg|bmp|gif|".indexOf("|"+a.ext.toLowerCase()+"|")?d.empty().addClass("notimage").append('<i class="file-preview file-type-'+a.ext.toLowerCase()+'"></i><span class="file-title" title="'+a.name+'">'+a.name+"</span>"):browser.ie&&7>=browser.version?d.text(lang.uploadNoPreview):f.makeThumb(a,function(a,b){if(a||!b)d.text(lang.uploadNoPreview);else{var c=g('<img src="'+
b+'">');d.empty().append(c);c.on("error",function(){d.text(lang.uploadNoPreview)})}},w,x),r[a.id]=[a.size,0],a.rotation=0,a.ext&&-1!=z.indexOf(a.ext.toLowerCase())||(k("not_allow_type"),f.removeFile(a)));a.on("statuschange",function(d,f){"progress"===f?e.hide().width(0):"queued"===f&&(b.off("mouseenter mouseleave"),c.remove());"error"===d||"invalid"===d?(k(a.statusText),r[a.id][1]=1):"interrupt"===d?k("interrupt"):"queued"===d?r[a.id][1]=0:"progress"===d&&(h.hide(),e.css("display","block"));b.removeClass("state-"+
f).addClass("state-"+d)});b.on("mouseenter",function(){c.stop().animate({height:30})});b.on("mouseleave",function(){c.stop().animate({height:0})});c.on("click","span",function(){var b;switch(g(this).index()){case 0:f.removeFile(a);return;case 1:a.rotation+=90;break;case 2:a.rotation-=90}y?(b="rotate("+a.rotation+"deg)",d.css({"-webkit-transform":b,"-mos-transform":b,"-o-transform":b,transform:b})):d.css("filter","progid:DXImageTransform.Microsoft.BasicImage(rotation="+~~(a.rotation/90%4+4)%4+")")});
b.insertBefore(C)}function b(){var a=0,b=0,c=q.children(),d;g.each(r,function(c,d){b+=d[0];a+=d[0]*d[1]});d=b?a/b:0;c.eq(0).text(Math.round(100*d)+"%");c.eq(1).css("width",Math.round(100*d)+"%");e()}function c(a,b){if(a!=k){var g=f.getStats();h.removeClass("state-"+k);h.addClass("state-"+a);switch(a){case "pedding":n.addClass("element-invisible");u.addClass("element-invisible");p.removeClass("element-invisible");q.hide();m.hide();f.refresh();break;case "ready":p.addClass("element-invisible");n.removeClass("element-invisible");
u.removeClass("element-invisible");q.hide();m.show();h.text(lang.uploadStart);f.refresh();break;case "uploading":q.show();m.hide();h.text(lang.uploadPause);break;case "paused":q.show();m.hide();h.text(lang.uploadContinue);break;case "confirm":q.show();m.hide();h.text(lang.uploadStart);g=f.getStats();if(g.successNum&&!g.uploadFailNum){c("finish");return}break;case "finish":q.hide(),m.show(),g.uploadFailNum?h.text(lang.uploadRetry):h.text(lang.uploadStart)}k=a;e()}d.getQueueCount()?h.removeClass("disabled"):
h.addClass("disabled")}function e(){var a="",b;"ready"===k?a=lang.updateStatusReady.replace("_",v).replace("_KB",WebUploader.formatSize(t)):"confirm"===k?(b=f.getStats(),b.uploadFailNum&&(a=lang.updateStatusConfirm.replace("_",b.successNum).replace("_",b.successNum))):(b=f.getStats(),a=lang.updateStatusFinish.replace("_",v).replace("_KB",WebUploader.formatSize(t)).replace("_",b.successNum),b.uploadFailNum&&(a+=lang.updateStatusError.replace("_",b.uploadFailNum)));m.html(a)}var d=this,g=jQuery,l=d.$wrap,
n=l.find(".filelist"),u=l.find(".statusBar"),m=u.find(".info"),h=l.find(".uploadBtn");l.find(".filePickerBtn");var C=l.find(".filePickerBlock"),p=l.find(".placeholder"),q=u.find(".progress").hide(),v=0,t=0,l=window.devicePixelRatio||1,w=113*l,x=113*l,k="",r={},y=function(){var a=document.createElement("p").style;return"transition"in a||"WebkitTransition"in a||"MozTransition"in a||"msTransition"in a||"OTransition"in a}(),f,A=editor.getActionUrl(editor.getOpt("fileActionName")),l=editor.getOpt("fileMaxSize"),
z=(editor.getOpt("fileAllowFiles")||[]).join("").replace(/\./g,",").replace(/^[,]/,"");WebUploader.Uploader.support()?editor.getOpt("fileActionName")?(f=d.uploader=WebUploader.create({pick:{id:"#filePickerReady",label:lang.uploadSelectFile},swf:"../../third-party/webuploader/Uploader.swf",server:A,fileVal:editor.getOpt("fileFieldName"),duplicate:!0,fileSingleSizeLimit:l,compress:!1}),f.addButton({id:"#filePickerBlock"}),f.addButton({id:"#filePickerBtn",label:lang.uploadAddFile}),c("pedding"),f.on("fileQueued",
function(b){v++;t+=b.size;1===v&&(p.addClass("element-invisible"),u.show());a(b)}),f.on("fileDequeued",function(a){v--;t-=a.size;var c=g("#"+a.id);delete r[a.id];b();c.off().find(".file-panel").off().end().remove();b()}),f.on("filesQueued",function(a){f.isInProgress()||"pedding"!=k&&"finish"!=k&&"confirm"!=k&&"ready"!=k||c("ready");b()}),f.on("all",function(a,b){switch(a){case "uploadFinished":c("confirm",b);break;case "startUpload":var d=utils.serializeParam(editor.queryCommandValue("serverparam"))||
"",d=utils.formatUrl(A+(-1==A.indexOf("?")?"?":"&")+"encode=utf-8&"+d);f.option("server",d);c("uploading",b);break;case "stopUpload":c("paused",b)}}),f.on("uploadBeforeSend",function(a,b,c){c.X_Requested_With="XMLHttpRequest"}),f.on("uploadProgress",function(a,c){g("#"+a.id).find(".progress span").css("width",100*c+"%");r[a.id][1]=c;b()}),f.on("uploadSuccess",function(a,b){var c=g("#"+a.id);try{var e=utils.str2json(b._raw||b);"SUCCESS"==e.state?(d.fileList.push(e),c.append('<span class="success"></span>')):
c.find(".error").text(e.state).show()}catch(f){c.find(".error").text(lang.errorServerUpload).show()}}),f.on("uploadError",function(a,b){}),f.on("error",function(b,c){"Q_TYPE_DENIED"!=b&&"F_EXCEED_SIZE"!=b||a(c)}),f.on("uploadComplete",function(a,b){}),h.on("click",function(){if(g(this).hasClass("disabled"))return!1;"ready"===k?f.upload():"paused"===k?f.upload():"uploading"===k&&f.stop()}),h.addClass("state-"+k),b()):g("#filePickerReady").after(g("<div>").html(lang.errorLoadConfig)).hide():g("#filePickerReady").after(g("<div>").html(lang.errorNotSupport)).hide()},
getQueueCount:function(){var a,b,c=0,e=this.uploader.getFiles();for(b=0;a=e[b++];)a=a.getStatus(),"queued"!=a&&"uploading"!=a&&"progress"!=a||c++;return c},getInsertList:function(){var a,b,c,e=[],d=editor.getOpt("fileUrlPrefix");for(a=0;a<this.fileList.length;a++)c=this.fileList[a],b=c.url,e.push({title:c.original||b.substr(b.lastIndexOf("/")+1),url:d+b});return e}};y.prototype={init:function(){this.initContainer();this.initEvents();this.initData()},initContainer:function(){this.container.innerHTML=
"";this.list=document.createElement("ul");this.clearFloat=document.createElement("li");domUtils.addClass(this.list,"list");domUtils.addClass(this.clearFloat,"clearFloat");this.list.appendChild(this.clearFloat);this.container.appendChild(this.list)},initEvents:function(){var a=this;domUtils.on($G("fileList"),"scroll",function(b){10>this.scrollHeight-(this.offsetHeight+this.scrollTop)&&a.getFileData()});domUtils.on(this.list,"click",function(a){a=(a.target||a.srcElement).parentNode;"li"==a.tagName.toLowerCase()&&
(domUtils.hasClass(a,"selected")?domUtils.removeClasses(a,"selected"):domUtils.addClass(a,"selected"))})},initData:function(){this.state=0;this.listSize=editor.getOpt("fileManagerListSize");this.listIndex=0;this.listEnd=!1;this.getFileData()},getFileData:function(){var a=this;a.listEnd||this.isLoadingData||(this.isLoadingData=!0,ajax.request(editor.getActionUrl(editor.getOpt("fileManagerActionName")),{timeout:1E5,data:utils.extend({start:this.listIndex,size:this.listSize},editor.queryCommandValue("serverparam")),
method:"get",onsuccess:function(b){try{var c=eval("("+b.responseText+")");"SUCCESS"==c.state&&(a.pushData(c.list),a.listIndex=parseInt(c.start)+parseInt(c.list.length),a.listIndex>=c.total&&(a.listEnd=!0),a.isLoadingData=!1)}catch(e){-1!=b.responseText.indexOf("ue_separate_ue")&&(b=b.responseText.split(b.responseText),a.pushData(b),a.listIndex=parseInt(b.length),a.listEnd=!0,a.isLoadingData=!1)}},onerror:function(){a.isLoadingData=!1}}))},pushData:function(a){var b,c,e,d,g,l=this,n=editor.getOpt("fileManagerUrlPrefix"),
p=editor.getOpt("fileManagerUrlPrefixPreview");for(b=0;b<a.length;b++)if(a[b]&&a[b].url){c=document.createElement("li");g=document.createElement("span");e=a[b].url.substr(a[b].url.lastIndexOf(".")+1);if(-1!="png|jpg|jpeg|gif|bmp".indexOf(e))d=document.createElement("img"),domUtils.on(d,"load",function(a){return function(){l.scale(a,a.parentNode.offsetWidth,a.parentNode.offsetHeight)}}(d)),d.width=113,d.setAttribute("src",p+a[b].url+(-1==a[b].url.indexOf("?")?"?noCache=":"&noCache=")+(+new Date).toString(36));
else{var m=document.createElement("i"),h=document.createElement("span");h.innerHTML=a[b].url.substr(a[b].url.lastIndexOf("/")+1);d=document.createElement("div");d.appendChild(m);d.appendChild(h);domUtils.addClass(d,"file-wrapper");domUtils.addClass(h,"file-title");domUtils.addClass(m,"file-type-"+e);domUtils.addClass(m,"file-preview")}domUtils.addClass(g,"icon");c.setAttribute("data-url",n+a[b].url);a[b].original&&c.setAttribute("data-title",a[b].original);c.appendChild(d);c.appendChild(g);this.list.insertBefore(c,
this.clearFloat)}},scale:function(a,b,c,e){var d=a.width,g=a.height;"justify"==e?d>=g?(a.width=b,a.height=c*g/d,a.style.marginLeft="-"+parseInt((a.width-b)/2)+"px"):(a.width=b*d/g,a.height=c,a.style.marginTop="-"+parseInt((a.height-c)/2)+"px"):d>=g?(a.width=b*d/g,a.height=c,a.style.marginLeft="-"+parseInt((a.width-b)/2)+"px"):(a.width=b,a.height=c*g/d,a.style.marginTop="-"+parseInt((a.height-c)/2)+"px")},getInsertList:function(){var a,b=this.list.children,c=[];for(a=0;a<b.length;a++)if(domUtils.hasClass(b[a],
"selected")){var e=b[a].getAttribute("data-url"),d=b[a].getAttribute("data-title")||e.substr(e.lastIndexOf("/")+1);c.push({title:d,url:e})}return c}}})();