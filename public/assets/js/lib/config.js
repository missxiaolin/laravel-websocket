/**
 * 前端模块配置
 */

require.config({
    paths: {
        'jquery': 'lib/jquery/jquery-2.0.0.min',
        'zepto': 'lib/zepto-custom.min',
        'validate': 'lib/zepto-mvalidate'
    },
    shim: {
        zepto: {
            exports: '$'
        },
    }
});