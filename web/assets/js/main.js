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
        var id = $(this).attr('yt');
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

    //modal pedido
    $("*[sku]").click(function (e) {
        e.preventDefault();
        var sku = $(this).attr('sku');
        $.ajax({
            type: "POST",
            url: $(this).attr('act'),
            data: {sku:sku},
            success: function (data) {
                $('#prod-titulo').html(data.titulo);
                $('#prod-desc').html(data.descripcion);
                $('#prod-sku').html(data.sku);
                $('.pedido-sku').val(data.sku);
                $('#prod-precio').html('$ '+data.precio);
                $('.quantity').attr('precio',data.precio);
                $('#pedido').modal('show');
            }
        });
    });

    //products
    $('.over,.over2').click(function(){
        $('#pedido').modal('show');
    });

    $('.finish').click(function(e){
        e.preventDefault();
        $('#status-pedido').html('');
        $
        $.ajax({
            type: "POST",
            url: $(this).attr('action'),
            data: $("#pedido-form").serialize(),
            success: function (data) {
                if(data.status==1){
                    $('#pedido').modal('hide');
                    $('#pedido :input')
                        .not(':button, :submit, :reset, :hidden')
                        .val('')
                        .removeAttr('checked')
                        .removeAttr('selected');
                    var total = 0;
                    $('#pedido .resume h2').text('$ '+total.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                    $('#gracias').modal('show');
                }else if(data.errores.length > 0){
                    data.errores.forEach(function (item,index) {
                        $('#status-pedido').append('<p>'+item.campo+': '+item.mensaje+'</p>');
                    })
                }
                $('#status-pedido').show();
            }
        });
    });
    
    //sum
    $('.quantity:input').bind('keyup mouseup',function(){
        var x = $(this).val();
        var price = $(this).attr('precio');
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
    
    //carousel cursos
    $('.cursos-marquee h4').click(function(){
        $('.cursos-carousel').carousel($(this).attr('data-slide'));
    });

    //modal rules
    $("*[data-toggle='modal'][act]").click(function (e) {
        e.preventDefault();
        var id = $(this).attr('modal');
        String.prototype.filename=function(){
            var s= this.replace(/\\/g, '/');
            s= s.substring(s.lastIndexOf('/')+ 1);
            return s;
        }
        var img = $('#imagenmodal').attr('src').filename();
        $.ajax({
            type: "POST",
            url: $(this).attr('act'),
            data: {id:id},
            success: function (data) {
                $('#titulomodal').html(data.titulo);
                $('#descripcionmodal').html(data.descripcion);
                var src = $('#imagenmodal').attr("src").replace(img, data.imagen);
                $('#imagenmodal').attr('src',src);
                $('#modal').modal('show');
            }
        });
    });

    //inscripcion a curso
    $('#submit-ins').click(function (e) {
        e.preventDefault();
        $('#status').html('');
        $.ajax({
            type: "POST",
            url: $(this).attr('action'),
            data: $("#inscripcion-form").serialize(),
            success: function (data) {
                if(data.status==1){
                    $('#curso-add').modal('hide');
                    $('#curso-fin').modal('show');
                }else if(data.status==2){
                    $('#status').append('<p>El correo o el teléfono ya están registrados!</p>');
                }else if (data.errores.length > 0){
                    data.errores.forEach(function (item,index) {
                        $('#status').append('<p>'+item.campo+': '+item.mensaje+'</p>');
                    })
                }
                $('#status').show();
            }
        });
    });

    //suscripcion
    $('#registro').click(function (e) {
        e.preventDefault();
        $('#status-reg').html('');
        $.ajax({
            type: "POST",
            url: $('#registro-form').attr('action'),
            data: $("#registro-form").serialize(),
            success: function (data) {
                if(data.status==1){
                    $('#status-reg').append('<p>Gracias por tu Registro. Pronto recibirás nuestras promociones y novedades!</p>');
                    $('#first-reg').hide();
                    $('#registro-form').hide();
                }else if(data.status==2){
                    $('#status-reg').append('<p>El correo ya está registrado!</p>');
                }else if (data.errores.length > 0){
                    data.errores.forEach(function (item,index) {
                        $('#status-reg').append('<p>'+item.campo+': '+item.mensaje+'</p>');
                    })
                }
                $('#status-reg').show();
            }
        });
    });

    //modals
    $('*[data-toggle="modal"]').click(function(){
        var name = $(this).attr("modal");
        $('#'+name).modal('show');
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