(function(b){"function"===typeof define&&define.amd?define(["jquery"],b):b(jQuery)})(function(b){function f(c){b(c).css({visibility:"hidden"});var a=k(c),d,g,e,f,h;d=c.parent().outerHeight();g=c.parent().offset().top;e=c.outerHeight();f=a.overflowElement.outerHeight();h=a.isWindow?a.overflowElement.scrollTop():a.overflowElement.offset().top;a=g-h;d=f-d-(g-h);(e<d?0:e<a||e>=a&&e>=d&&a>=d)?c.parent().addClass("dropup"):c.parent().removeClass("dropup");b(c).css({visibility:"visible"})}function k(c){var a,
d;c.attr("data-target")?(a=c.attr("data-target"),d=!1):(a=window,d=!0);b.each(c.parents(),function(c,e){if("visible"!==b(e).css("overflow"))return a=e,d=!1});return{overflowElement:b(a),isWindow:d}}b(document.body).on("click.fu.dropdown-autoflip","[data-toggle=dropdown][data-flip]",function(c){"auto"===b(this).data().flip&&f(b(this).next(".dropdown-menu"))});b(document.body).on("suggested.fu.pillbox",function(c,a){f(b(a));b(a).parent().addClass("open")});b.fn.dropdownautoflip=function(){}});