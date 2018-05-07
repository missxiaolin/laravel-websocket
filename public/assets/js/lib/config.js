/**
 * 前端模块配置
 */

require.config({
    paths: {
        'jquery': 'lib/jquery/jquery-2.0.0.min',
        'zepto': 'lib/zepto-custom.min',
        'validate': 'lib/zepto-mvalidate',
        'ajax': 'lib/ajax',
        'jquery.fileupload': 'lib/jquery-file-upload/js/jquery.fileupload',
        'jquery.ui.widget': 'lib/jquery-file-upload/js/vendor/jquery.ui.widget',
        'upload': 'component/upload'
    },
    shim: {
        'zepto': {
            exports: '$'
        },
        'jquery.fileupload': ['jquery'],
        'jquery.ui.widget': ['jquery'],
    }
});