var __platform=function(){var a={win:!1,mac:!1,xll:!1,is_pc:!1,is_phone:!1},b=navigator.platform;a.win=0==b.indexOf("Win");a.mac=0==b.indexOf("Mac");a.x11="X11"==b||0==b.indexOf("Linux");if(0<b.indexOf("Android")||0<b.indexOf("iPhone")||0<b.indexOf("SymbianOS")||0<b.indexOf("Windows Phone")||0<b.indexOf("iPod")||0<b.indexOf("iPad"))a.is_phone=!0;if(a.win||a.mac||a.xll)a.is_pc=!0,a.is_phone=!1;return a}();