!function($){$.fn.imagefill=function(t){function i(){n=0,s=0,h.each(function(){o=$(this).find(a.target).width()/$(this).find(a.target).height();var t=$(this).outerWidth(),i=$(this).outerHeight();n+=$(this).outerHeight(),s+=$(this).outerWidth();var e=t/i;o>e?$(this).find(a.target).css({width:"auto",height:i,top:0,left:-(i*o-t)/2}):$(this).find(a.target).css({width:t,height:"auto",top:-(t/o-i)/2,left:0})})}function e(){var t=0,o=0;h.each(function(){o+=$(this).outerHeight(),t+=$(this).outerWidth()}),(n!==o||s!==t)&&i(),setTimeout(e,a.throttle)}var h=this,o=1,n=0,s=0,r={runOnce:!1,target:"img",throttle:200},a=$.extend({},r,t),u=h.find(a.target).addClass("loading").css({position:"absolute"}),d=h.css("position");return h.css({overflow:"hidden",position:"static"===d?"relative":d}),h.each(function(){n+=$(this).outerHeight(),s+=$(this).outerWidth()}),h.imagesLoaded().done(function(t){o=u.width()/u.height(),u.removeClass("loading"),i(),a.runOnce||e()}),this}}(jQuery);