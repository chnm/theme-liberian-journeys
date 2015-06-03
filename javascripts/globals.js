if (!Omeka) {
    var Omeka = {};
}

(function ($) {    
    $(function(){
        var dropdownMenu = $('#mobile-nav');
        dropdownMenu.prepend('<a class="menu">Menu <span class="arrow">&#9660;</span></a>');
        //Hide the rest of the menu
        $('#mobile-nav .navigation').hide();

        //function the will toggle the menu
        $('.menu').click(function() {
            var x = $(this).attr('id');

            if (x==1) {
                $("#mobile-nav .navigation").slideUp();
                $(this).attr('id', '0');
            } else {
                $("#mobile-nav .navigation").slideDown();
                $(this).attr('id','1');
            }
        });
    });

    $(function(){
        var dropdownMenu = $('.mobile-secondary-nav');
        dropdownMenu.prepend('<a class="second-menu">Collections <span class="arrow">&#9660;</span></a>');
        //Hide the rest of the menu
        $('.mobile-secondary-nav .navigation').hide();

        //function the will toggle the menu
        $('.second-menu').click(function() {
            var x = $(this).attr('id');

            if (x==1) {
                $(".mobile-secondary-nav .navigation").slideUp();
                $(this).attr('id', '0');
            } else {
                $(".mobile-secondary-nav .navigation").slideDown();
                $(this).attr('id','1');
            }
        });
    });
    
})(jQuery);
