<?php
//000000003600a:3:{i:0;a:7:{s:2:"id";s:1:"1";s:3:"url";s:5:"about";s:11:"show_in_nav";s:1:"1";s:5:"title";s:12:"关于我们";s:8:"keywords";s:12:"关于我们";s:11:"description";s:12:"关于我们";s:7:"content";s:1264:"<p><img src="data/image/201504/18/71949_nMQP_7254.png" title="Screen Shot 2015-04-18 at 03.58.38.png" alt="Screen Shot 2015-04-18 at 03.58.38.png" width="283" height="210" style="width: 283px; height: 210px; float: left;"/></p><p style="text-indent: 2em; text-align: left;"><br/></p><p style="text-indent: 2em; text-align: left;"><span style="text-indent: 32px;">湖南宸瀚信息科技有限公司</span>是一家面向全球提供IT解决方案与服务的公司，致力于通过创新的信息化技术来推动社会的发展与变革，为个人创造新的生活方式，为社会创造价值。</p><p style="text-indent: 2em; text-align: left;">湖南宸瀚信息科技有限公司以软件技术为核心，提供行业解决方案和产品工程解决方案以及相关软件产品、平台及服务。</p><p style="text-indent: 2em; text-align: left;">面向行业客户，<span style="text-indent: 32px;">湖南宸瀚信息科技有限公司</span>提供满足行业智慧发展与管理的解决方案、产品及服务，涵盖领域包括：电信、能源、金融、政府、制造业、商贸流通业、医疗卫生、教育与文化、交通、移动互联网、传媒、环保等。</p><p><br style="text-indent: 2em; text-align: left;"/></p>";}i:1;a:7:{s:2:"id";s:1:"2";s:3:"url";s:7:"contact";s:11:"show_in_nav";s:1:"1";s:5:"title";s:12:"联系我们";s:8:"keywords";s:12:"联系我们";s:11:"description";s:12:"联系我们";s:7:"content";s:5663:"<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="keywords" content="百度地图,百度地图API，百度地图自定义工具，百度地图所见即所得工具" />
<meta name="description" content="百度地图API自定义地图，帮助用户在可视化操作下生成百度地图" />
<title>百度地图API自定义地图</title>
<!--引用百度地图API-->
<style type="text/css">
    html,body{margin:0;padding:0;}
    .iw_poi_title {color:#CC5522;font-size:14px;font-weight:bold;overflow:hidden;padding-right:13px;white-space:nowrap}
    .iw_poi_content {font:12px arial,sans-serif;overflow:visible;padding-top:4px;white-space:-moz-pre-wrap;word-wrap:break-word}
</style>
<script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
</head>

<body>


<p style="text-indent: 2em; text-align: left;">
    宸瀚信息科技的为您的公司提供最便捷的服务。
</p>
<p style="text-indent: 2em; text-align: left;">
    <br/>
</p>
<p style="text-indent: 2em; text-align: left;">
    我们将随时为您献上真诚的服务。
</p>
<hr/>
<p style="white-space: normal; text-indent: 2em; text-align: left;">
    邮箱：chenhaninfo@gmail.com
</p>
<p style="white-space: normal; text-indent: 2em; text-align: left;">
    手机：13308443362
</p>
<p style="white-space: normal; text-indent: 2em; text-align: left;">
    QQ ：996418131
</p>


  <!--百度地图容器-->
  <div style="width:349px;height:275px;border:#ccc solid 1px;text-align: center;" id="dituContent"></div>
</body>
<script type="text/javascript">
    //创建和初始化地图函数：
    function initMap(){
        createMap();//创建地图
        setMapEvent();//设置地图事件
        addMapControl();//向地图添加控件
        addMarker();//向地图中添加marker
    }
    
    //创建地图函数：
    function createMap(){
        var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
        var point = new BMap.Point(113.007109,28.235911);//定义一个中心点坐标
        map.centerAndZoom(point,17);//设定地图的中心点和坐标并将地图显示在地图容器中
        window.map = map;//将map变量存储在全局
    }
    
    //地图事件设置函数：
    function setMapEvent(){
        map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
        map.enableScrollWheelZoom();//启用地图滚轮放大缩小
        map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
        map.enableKeyboard();//启用键盘上下左右键移动地图
    }
    
    //地图控件添加函数：
    function addMapControl(){
        //向地图中添加缩放控件
	var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
	map.addControl(ctrl_nav);
        //向地图中添加缩略图控件
	var ctrl_ove = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:1});
	map.addControl(ctrl_ove);
        //向地图中添加比例尺控件
	var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
	map.addControl(ctrl_sca);
    }
    
    //标注点数组
    var markerArr = [{title:"美美公馆",content:"我的备注",point:"113.006112|28.236022",isOpen:0,icon:{w:21,h:21,l:0,t:0,x:6,lb:5}}
		 ];
    //创建marker
    function addMarker(){
        for(var i=0;i<markerArr.length;i++){
            var json = markerArr[i];
            var p0 = json.point.split("|")[0];
            var p1 = json.point.split("|")[1];
            var point = new BMap.Point(p0,p1);
			var iconImg = createIcon(json.icon);
            var marker = new BMap.Marker(point,{icon:iconImg});
			var iw = createInfoWindow(i);
			var label = new BMap.Label(json.title,{"offset":new BMap.Size(json.icon.lb-json.icon.x+10,-20)});
			marker.setLabel(label);
            map.addOverlay(marker);
            label.setStyle({
                        borderColor:"#808080",
                        color:"#333",
                        cursor:"pointer"
            });
			
			(function(){
				var index = i;
				var _iw = createInfoWindow(i);
				var _marker = marker;
				_marker.addEventListener("click",function(){
				    this.openInfoWindow(_iw);
			    });
			    _iw.addEventListener("open",function(){
				    _marker.getLabel().hide();
			    })
			    _iw.addEventListener("close",function(){
				    _marker.getLabel().show();
			    })
				label.addEventListener("click",function(){
				    _marker.openInfoWindow(_iw);
			    })
				if(!!json.isOpen){
					label.hide();
					_marker.openInfoWindow(_iw);
				}
			})()
        }
    }
    //创建InfoWindow
    function createInfoWindow(i){
        var json = markerArr[i];
        var iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title + "</b><div class='iw_poi_content'>"+json.content+"</div>");
        return iw;
    }
    //创建一个Icon
    function createIcon(json){
        var icon = new BMap.Icon("http://app.baidu.com/map/images/us_mk_icon.png", new BMap.Size(json.w,json.h),{imageOffset: new BMap.Size(-json.l,-json.t),infoWindowOffset:new BMap.Size(json.lb+5,1),offset:new BMap.Size(json.x,json.h)})
        return icon;
    }
    
    initMap();//创建和初始化地图
</script>
</html>";}i:2;a:7:{s:2:"id";s:1:"3";s:3:"url";s:6:"awards";s:11:"show_in_nav";s:1:"1";s:5:"title";s:12:"荣誉资质";s:8:"keywords";s:12:"荣誉资质";s:11:"description";s:12:"荣誉资质";s:7:"content";s:19:"<p>荣誉资质</p>";}}
?>