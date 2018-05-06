/**
 *
 * Ajax function,
 *  dependant on: $.ajax
 *
 *  Code Examples:
 *   ajax({
 *       type: 'GET',
 *       url: '',
 *       url: '/api',
 *       data: {name: 'abc'},
 *       success: function(data, status, xhr) {},
 *       error: function(data, errorType, errorMsg, xhr) {}
 *   });
 *
 * @return $.ajax
 *
 */
define(['zepto'], function ($) {
    $.http = (function () {

        var $ajaxLoading = $('.ajax-loading');

        function ajax(options) {

            // default configurations.
            var defaultOptions = {
                dataType: 'json',
                ignoreAjaxLoading: false
            }, callback = {
                success: options.success,
                error: options.error
            };

            options = $.extend(defaultOptions, options);

            //TODO::format request URL here.

            options.success = function (data, status, xhr) {
                /* jshint expr:true */
                (callback.success) ? callback.success(data, status, xhr) : null;
            };
            options.error = function (xhr, errorType, error) {
                var dataType = options.dataType,
                    result = xhr.responseText;
                if (result && dataType === 'json') {
                    try {
                        result = $.parseJSON(result);
                    } catch (exception) {
                        result = {msg: 'Invalid JSON format'};
                    }
                    error = result.msg;
                } else if (dataType === 'xml') {
                    result = xhr.responseXML;
                }

                /* jshint expr:true */
                (callback.error) ? callback.error(result, errorType, error, xhr) : null;
            };
            options.complete = function (xhr, status) {
                /* jshint expr:true */
                (!options.ignoreAjaxLoading) && $ajaxLoading.removeClass('active');

                (callback.complete) ? callback.complete(xhr, status) : null;
            };

            /* jshint expr:true */
            (!options.ignoreAjaxLoading) && $ajaxLoading.addClass('active');

            return $.ajax(options);
        }

        return ajax;
    })();
});