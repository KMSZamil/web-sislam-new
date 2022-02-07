jQuery(document).ready(function($) {
    "use strict";
    var specialKeys = [];
    specialKeys.push(8); //Backspace
    $(function () {
        $('.numeric').bind("keypress", function (e) {
            var attr_id = $(this).attr('id');//alert(attr_id);
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57 || keyCode == 46 || keyCode == 45) || specialKeys.indexOf(keyCode) != -1);
            $(".error" + attr_id).css("display", ret ? "none" : "inline");
            return ret;
        });
        $('.numeric').bind("paste", function (e) {
            return false;
        });
        $(".numeric").bind("drop", function (e) {
            return false;
        });
    });


    $('.js-example-basic-single').select2({
        placeholder: 'Select an option'
    });

});

