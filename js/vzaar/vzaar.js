    var jq = jQuery.noConflict();
    jq(document).ready(function() {
        jq(".vzaar").fancybox({
            nextClick   : false,
            maxWidth    : 800,
            maxHeight   : 600,
            fitToView   : false,
            width       : '70%',
            height      : '70%',
            autoSize    : false,
            closeClick  : false,
            openEffect  : 'none',
            closeEffect : 'none',
            arrows : false,
            closeBtn : true,
            type: 'iframe',
        });
    });