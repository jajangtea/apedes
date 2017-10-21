function no_photo (object,url) {
	object.src = url;
	object.onerror = "";
	return true;
}
function onlyNumeric(o) {
   $(o).keypress(function (e) {
       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
           return false;
        }
   });
}
function clearField(inputField) {
	var field = $(inputField);	
	field.value='';
	field.focus();
}
function clearMessage (id) {
    var message = $(id);	
    message.innerHTML='';
}
(function ($) {
    $.fn.extend({
       limiter: function (limit,elem) {
           $(this).on("keyup focus",function() {
               setCount(this,elem);
           });
           function setCount(src,elem) {
               var chars = src.value.length;
               if (chars > limit) {
                   src.value = src.value.substr(0,limit);
               }
               elem.html(limit - chars)
           }
            setCount($(this)[0],elem);
       } 
    });    
})($);
