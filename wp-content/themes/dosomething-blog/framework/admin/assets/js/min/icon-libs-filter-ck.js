!function(e){"use strict";e(document).ready(function(){e(".icon-filter").fastLiveFilter("#icon-lists",{timeout:100})})}(jQuery),jQuery.fn.fastLiveFilter=function(e,t){t=t||{},e=jQuery(e);var n=this,i="",o=t.timeout||0,l=t.callback||function(){},s,r=e.children(),a=r.length,c=a>0?r[0].style.display:"block";return l(a),n.change(function(){for(var e=n.val().toLowerCase(),i,o,s=0,u=0;a>u;u++)i=r[u],o=t.selector?$(i).find(t.selector).text():i.textContent||i.innerText||"",o.toLowerCase().indexOf(e)>=0?("none"==i.style.display&&(i.style.display=c),s++):"none"!=i.style.display&&(i.style.display="none");return l(s),!1}).keydown(function(){clearTimeout(s),s=setTimeout(function(){n.val()!==i&&(i=n.val(),n.change())},o)}),this};