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
            $('#mobile-nav .navigation').slideToggle();
        });
    });

    // $(function(){
    //     var dropdownMenu = $('.mobile-secondary-nav');
    //     dropdownMenu.prepend('<a class="second-menu">Collections <span class="arrow">&#9660;</span></a>');
    //     //Hide the rest of the menu
    //     $('.mobile-secondary-nav .navigation').hide();

    //     //function the will toggle the menu
    //     $('.second-menu').click(function() {
    //         $('.mobile-secondary-nav .navigation').slideToggle();
    //     });
    // });

    $(function(){
        var dropdownMenu = $('#mobile-exhibit-pages');
        dropdownMenu.prepend('<a class="exhibit-menu">Exhibit Pages<span class="arrow">&#9660;</span></a>');
        //Hide the rest of the menu
        $('#mobile-exhibit-pages nav ul').hide();

        //function the will toggle the menu
        $('.exhibit-menu').click(function() {
            $('#mobile-exhibit-pages nav ul').slideToggle();
        });
    });
    
})(jQuery);
