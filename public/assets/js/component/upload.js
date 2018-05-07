/**
 *
 * Please include two libraries before using it:
 *  - js/lib/uploadify/jquery.uploadify.js (IE flash)
 *  - js/lib/jquery-file-upload/js/jquery.fileupload.js (Chrome, FF, Safari)
 *
 * Steps as following:
 *  Step 1: put the following code in your view to include those library:
 *      \Angejia\Helpers\Resource::add_external_js(array(
 *        '../lib/uploadify/jquery.uploadify',
 *        '../lib/jquery-file-upload/js/vendor/jquery.ui.widget',
 *        '../lib/jquery-file-upload/js/jquery.fileupload'
 *      ));
 *
 *  Step 2: require this module in your JS file, and execute fileupload function:
 *      // require module.
 *      var fileupload = require('./modules/fileupload');
 *      // execute fileupload funciton.
 *      fileupload({
 *        dom: $(".fileupload"),
 *        callback: function (result) {
 *            // result:
 *            // {
 *            //     id: "98693",
 *            //     url: "http://7tebqs.com2.z0.glb.qiniucdn.com/FlSY_xdQSZkdmRzn9-wiYZIaYYVm"
 *            // }
 *          }
 *      });
 *
 * @returns {uploader}
 */

define(['jquery'], function fileupload($) {

    "use strict";

    // get token
    var isIE = (function (ver) {
            var b = document.createElement('b')
            b.innerHTML = '<!--[if IE ' + ver + ']><i></i><![endif]-->'
            return b.getElementsByTagName('i').length === 1
        })(),
        returnUrl = location.protocol + '//' + location.hostname + '/api/upload',// jshint ignore:line
        forceIframeTransport = isIE;// jshint ignore:line
    var fileType = '';

    /**
     * upload file.
     * @param options
     * {
     *  dom: $('#input-file')
     *  callback: function() {}
     * }
     *
     */
    function uploader(options) {
        (isIE) ? _uploadByFlash(options) : _uploadByXhr(options);// jshint ignore:line
    }

    function _uploadByXhr(options) {
        var $dom = options.dom,
            configs = _uploadConfigXhr(options);

        configs.url = options.url;

        $dom.fileupload(configs);
    }

    function _uploadConfigXhr(options) {
        var Errors = {},
            fnStart = options.start,
            fnAlways = options.always,
            resOptions;

        function doneFN(e, result) {
            options.callback(result.result, fileType);
        }

        function addCallback(e, data) {
            fileType = data.originalFiles[0]['type'];
            if (options.acceptFileTypes) {
                if (_validateAcceptFileTypes(options.acceptFileTypes, data) === false) {
                    (typeof fnAlways === 'function') && fnAlways(e, data, Errors);// jshint ignore:line
                    alert(Errors.accepetFileType.join('\n'));// jshint ignore:line
                    return;
                }
            }

            (typeof fnStart === 'function') && fnStart(e, data);// jshint ignore:line

            data.formData = data.formData || {};
            data.submit();

        }

        /**
         * Validate accept file type.
         * @param types ['jpe?g', 'gif', 'png']
         *
         * @private
         */
        function _validateAcceptFileTypes(types, data) {
            // /^image\/(gif|jpe?g|png)$/i;
            //change by wangxinzhuo to upload pdf
            //var regRule = '^image\/(' + types.join('|') + ')$';
            var regRule = '';
            if (types[0] == 'plain') {
                regRule = '^text\/(' + types.join('|') + ')$';
            } else {
                regRule = '^image|application\/(' + types.join('|') + ')$';
            }
            var uploadErrors = [];
            var acceptFileTypes = new RegExp(regRule, 'i');
            if (data.originalFiles[0]['type'].length === 0 || !acceptFileTypes.test(data.originalFiles[0]['type'])) {// jshint ignore:line
                uploadErrors.push('请上传JPG、PNG、BMP格式的图片');
            }
            //大小
            if (options.acceptFileSize) {
                var file_size = options.acceptFileSize;
            } else {
                var file_size = 2097152;
            }
            if (data.originalFiles[0]['size'] && data.originalFiles[0]['size'] > file_size) {
                uploadErrors.push('请上传小于2MB的图片');
            }
            Errors.accepetFileType = uploadErrors;

            return (uploadErrors.length === 0);
        }

        resOptions = {
            formData: {},
            add: addCallback,
            done: doneFN
        };

        if (typeof fnAlways === 'function') {
            resOptions.always = fnAlways;
        }

        return resOptions;
    }


    function _uploadByFlash(options) {
        // jshint undef: false, unused: false, camelcase: false, expr: true, eqeqeq: false
        var $dom = options.dom,
            callback = options.callback,
            fileTypes = options.acceptFileTypes,
            fnStart = options.start,
            fnAlways = options.always,
            fileTypeRules = [];

        var uploadParams = {
            buttonText: '上传图片',
            fileObjName: 'file',
            formData: {},
            'swf': '/dist/lib/uploadify/uploadify.swf',
            'uploader': options.url,
            onSelect: function (file) {
                (typeof fnStart === 'function') && fnStart({}, file);// jshint ignore:line

                var formData = this.settings.formData;
                $dom.uploadify("settings", "formData", formData);
            },
            onUploadSuccess: function (file, data, response) {
                var results = JSON.parse(data);//{id: '', url: ''}
                callback(results);
                (typeof fnAlways === 'function') && fnAlways(file, results);// jshint ignore:line
            },
            onUploadError: function (file, errorCode, errorMsg, errorString) {
                //-200 "400" "HTTP Error (400)"
                callback({
                    error: errorString
                });
                (typeof fnAlways === 'function') && fnAlways(null, null, [errorString]);// jshint ignore:line
            }
        };

        if (fileTypes) {
            for (var i = 0; i < fileTypes.length; i++) {
                fileTypeRules.push('*.' + fileTypes[i]);
            }
            uploadParams.fileTypeExts = fileTypeRules.join(';');
            uploadParams.fileTypeDesc = 'Image Files';
        }

        $dom.uploadify(uploadParams);

    }

    return uploader;
}); //jshint ignore: line

