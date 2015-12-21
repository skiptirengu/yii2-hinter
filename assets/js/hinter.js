(function ($) {

    $.fn.hinter = function (method) {
        if (methods[method]) {
            return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === 'object' || !method) {
            return methods.init.apply(this, arguments);
        } else {
            $.error("Call to undefined method " + method);
        }
    };

    var defaults = {
        message: "",
        isSuccess: "",
        slideUp: 300,
        delay: 5000
    };

    var methods = {
        init: function (config) {
            if (!config.message) return;

            var options = $.extend(true, defaults, config || {});
            var css = options.isSuccess ? 'alert-success' : 'alert-danger';
            var html = '<div class="' + css + ' alert affix hinter" id="hinter">' +
                '<button type="button" class="close" data-dismiss="alert">' +
                '<span>&times;</span></button>' + options.message + '</div>';

            $(this).prepend(html);
            $("#hinter").delay(options.delay).slideUp(options.slideUp, function () {
                $(this).remove();
            });
        }
    };

})(jQuery);