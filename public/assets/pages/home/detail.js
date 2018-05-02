require(['jquery'], function ($) {
    var $nav = $('.tab-nav div');
    var $content = $('.tab-block > div');
    var $back = $('#back');

    /*切换tab*/
    $nav.click(function () {
        var $this = $(this);
        var $t = $this.index();
        $nav.removeClass();
        $this.addClass('active');
        $content.css('display', 'none');
        $content.eq($t).css('display', 'block');
    });

    $back.click(function () {
        window.history.back();
    });
});