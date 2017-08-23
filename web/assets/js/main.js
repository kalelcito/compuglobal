$(document).ready(function(){
    //menu stick
    $(window).scroll(function() {
        var m = $(".navbar");
        var m2 = $('.menu2');
        var m3 = $('.collapse.in');
        var space = $(".row-menu").height();
        var windowpos = $(window).scrollTop();
        if(windowpos > space){
            m.addClass("navbar-fixed-top");
            m2.addClass("menu2-fixed");
            m3.addClass("fixed");
        } else {
            m.removeClass("navbar-fixed-top");
            m2.removeClass("menu2-fixed");
            m3.removeClass("fixed");
        }
      });
    
    //modals
    $('a[data-toggle="modal"]').click(function(){
        var name = $(this).attr("modal");
        $('#'+name).modal('show');
    });
    
    //intervals carousel-1
    $('#myCarousel').on('slide.bs.carousel', function() {
      var interval = $('div.item.active').attr('data-interval');
      setTimeout(function() {
        $('#myCarousel').carousel('next');
      }, interval);
    });
    
    //owl
    $('.owl-carousel').owlCarousel({
        stagePadding:50,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
        loop:true,
        margin:15,
        autoplay: true,
        autoplayHoverPause: true,
        autoplayTimeout:2500,
        nav:true,
        dots:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });
    
    //change youtube video
    $('.youtube').click(function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        var videoid = url.match(/(?:https?:\/{2})?(?:w{3}\.)?youtu(?:be)?\.(?:com|be)(?:\/watch\?v=|\/)([^\s&]+)/);
        var id = videoid[1];
        $('.videoYoutube').attr('src',"https://www.youtube.com/embed/"+id+"?rel=0");
        $('.tit-video').text($(this).attr('title'));
        $('.desc-video').text($(this).attr('desc'));
    });
    
    //carousel products
    $('.computo-controles .new-control').click(function(){
        $('.computo-carousel').carousel($(this).attr('data-slide'));
    });
    $('.perifericos-controles .new-control').click(function(){
        $('.perifericos-carousel').carousel($(this).attr('data-slide'));
    });
    $('.impresoras-controles .new-control').click(function(){
        $('.impresoras-carousel').carousel($(this).attr('data-slide'));
    });
    $('.accesorios-controles .new-control').click(function(){
        $('.accesorios-carousel').carousel($(this).attr('data-slide'));
    });
    $('.tecnologia-controles .text-center').click(function(){
        $('.tecnologia-carousel .carousel').carousel($(this).attr('data-slide'));
    });
    
    //products
    $('.over,.over2').click(function(){
        $('#pedido').modal('show');
    });
    
    //sum
    $('.quantity:input').bind('keyup mouseup',function(){
        var x = $(this).val();
        var price = 6250;
        var total = price * x;
        $('#pedido .resume h2').text('$ '+total.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
    });
    $('#pedido button').attr('data-dismiss','modal').click(function(){
        $('#pedido :input')
          .not(':button, :submit, :reset, :hidden')
          .val('')
          .removeAttr('checked')
          .removeAttr('selected');
        var total = 0;
        $('#pedido .resume h2').text('$ '+total.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
    });
    $('.finish').click(function(){
        $('#pedido').modal('hide');
        $('#gracias').modal('show');
    });
    
    //carousel cursos
    $('.cursos-marquee h4').click(function(){
        $('.cursos-carousel').carousel($(this).attr('data-slide'));
    });
    
    //modals cursos
    $('[data-toggle="modal"]').click(function(){
        var name = $(this).attr("modal");
        $('#'+name).modal('show');
    });
    $('.interesado').click(function(){
        $('#curso-add').modal('show');
    });
});

$( window ).on( "load", function() {
    //responsive
    var eve = $('.eventos').height();
    $('.hp img.back').css('height',eve-76);
    $(window).resize(function(){
        if($(window).width()>767){
            eve = $('.eventos').height();
            $('.hp img.back').css('height',eve-76);
        }else{
            $('.hp img.back').css('height','auto');
        }
    });
});