$(document).ready(function(){

    let $containerNav = $('.container-nav'),
    $logo = $('.container-logo'),
    $menuLogo = $('.menu-logo'),
    $bgImageHome = $('#bg-img'),
    $arrowUp = $('#arrow-up');
    
    if($(window).width() < 768) {
        $logo.on('click', function(){
            $containerNav.slideToggle();        
            $menuLogo.animate({height:'toggle'}, 100);
            $arrowUp.animate({height:'toggle'}, 100);
        });    
    }

                    
});
