$(document).ready(function(){

    const $addCars = $('.add-cars'),
    $addWeapons = $('.add-weapons'),
    $containerPopupCars = $('.container-popupcars'),
    $containerPopupWeapons = $('.container-popupweapons'),
    $body = $('body'),
    $submitBtn = $('#submit-btn'),
    $submitBtn2 = $('#submit-btn2'),
    $iconsClose = $('.icons-close'),
    $iconsClose2 = $('.icons-close2');

    // $containerPopupCars.css({"display":"none"});
    $containerPopupWeapons.css({"display":"none"});

    $addCars.on('click', function(event){
        $containerPopupCars.css({"display":"flex"});
        $body.css({"overflow":"hidden"});
        $submitBtn.html("Ajouter");
    });

    $addWeapons.on('click', function(event){
        $containerPopupWeapons.css({"display":"flex"});
        $body.css({"overflow":"hidden"});
        $submitBtn2.html("Ajouter");
    });

    $iconsClose.on('click', function(event){
        $containerPopupCars.css({"display":"none"});
    });
    
    $iconsClose2.on('click', function(event){
        $containerPopupWeapons.css({"display":"none"});
    });

    $containerPopupCars.on('click', (event) => {
        if(event.target === $containerPopupCars[0]) {
            $containerPopupCars.css({"display":"none"});
        }
    });

    $containerPopupWeapons.on('click', (event) => {
        if(event.target === $containerPopupWeapons[0]) {
            $containerPopupWeapons.css({"display":"none"});
        }
    });







});