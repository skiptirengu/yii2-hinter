(function ($) {

    // Default plugin configuration
    var defaults = {

        // The message to be shown
        message: "",

        // Whether this is a success message
        isSuccess: true,

        // Default slideUp animation time
        slideUp: 250,

        // Time (ms) before the hint is removed
        delay: 5000,

        // Id for the hinter container
        id: "hinter",

        // The class to be added to the hint container
        class: "hinter"
    };

    $.fn.hinter = function (config) {

        if (!config.message) return this;

        var options = $.extend({}, defaults, config || {});

        $(this).prepend(
            $('<div></div>')
                .addClass(options.isSuccess ? 'alert-success' : 'alert-danger')
                .addClass(options.class)
                .addClass('alert affix')
                .attr('id', options.id)
                .text(options.message)
                .prepend('<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>')
        );

        $("#" + options.id).delay(options.delay).slideUp(options.slideUp, function () {
            $(this).remove();
        });

        return this;
    };

})(jQuery);