(function() {
    'use strict';

    function init() {

        // INLINE SVG
        jQuery('img.svg').each(function(i) {
            var $img = jQuery(this);
            var imgID = $img.attr('id');
            var imgClass = $img.attr('class');
            var imgURL = $img.attr('src');

            jQuery.get(imgURL, function(data) {
                var $svg = jQuery(data).find('svg');
                if (typeof imgID !== 'undefined') {
                    $svg = $svg.attr('id', imgID);
                }
                if (typeof imgClass !== 'undefined') {
                    $svg = $svg.attr('class', imgClass + ' replaced-svg');
                }
                $svg = $svg.removeAttr('xmlns:a');
                $img.replaceWith($svg);
            }, 'xml');
        });


        setTimeout(mainLayout, 100);
        setTimeout(animation, 100);
        setTimeout(slider, 100);
        setTimeout(func, 100);

        $(window).scroll(function() {
            setTimeout(function() {
                animation();
            }, 300)
        });

    }
    init(); // end of init()

    $(window).resize(function() {
        setTimeout(mainLayout, 100);
        setTimeout(slider, 100);
    });

    function mainLayout() {
        var h = $('#header').outerHeight(true),
            m = $('main'),
            f = $('#footer').outerHeight(true),
            set = f + h;

        m.css('min-height', 'calc(100vh - ' + set + 'px)');
    }

    function animation() {
        $(".animate").each(function() {
            var bottom_of_object = $(this).offset().top + 10;
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            if (bottom_of_window > bottom_of_object) {
                $(this).addClass('animate--in');
            }
        })
    }

    function slider() {
        $('.scompany__slider').each(function() {
            var slider = $(this),
                item = slider.find('.slider-item');

            if (item.length > 3) {
                slider.owlCarousel({
                    items: 3,
                    loop: true,
                    dots: true,
                    nav: false,
                    autoplay: true,
                    autoplayTimeout: 6000,
                    autoplaySpeed: 800,
                    margin: 100,
                });
            } else {
                slider.trigger('destroy.owl.carousel').removeClass('owl-carousel owl-loaded');
                slider.find('.owl-stage-outer').children().unwrap();
            }
        })
    }
    slider();

    function uploadImages(){
        //inputfile
        $('.upload-file').each(function(e) {
            var t = $(this),
                input = t.find('.inputfile'),
                label = t.find('.label-btn'),
                del = t.find('.del-btn'),
                info = t.find('.file-info'),
                prev = t.find('.image-preview'),
                pB = t.find('.pB'),
                to = t.closest('form').attr('action'),
                fSize;

            function toggleDel() {
                if (t.hasClass('has-file')) {
                    del.removeClass('dis');
                } else {
                    del.addClass('dis');
                }
            }
            toggleDel();

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        lb();
                        setTimeout(
                        function()
                        {
                            prev.css('background-image', 'url(' + e.target.result + ')');
                        }, 1000);
                        // console.log('hai');
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            function lb(){
                var ajax = new XMLHttpRequest();
                var formdata = new FormData();
                // ajax.upload.addEventListener('progress', uploadProgress, false);
                ajax.onprogress = function (e) {
                    if (e.lengthComputable) {
                        // console.log(e.loaded+  " / " + e.total);
                        var percent = (e.loaded / e.total) * 100;
                        pB.attr('value', Math.round(percent));
                    }
                }

                ajax.onloadstart = function (e) {
                    pB.removeClass('hide');
                    console.log(to);
                }
                ajax.onloadend = function (e) {
                    pB.addClass('hide');
                }
                ajax.open("POST", to);
                ajax.send(FormData);

            }

            input.change(function(e) {
                var fileName = '',
                    val = $(this).val();

                if (this.files && this.files.length > 1) {
                    fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);
                } else if (e.target.value) {
                    fileName = e.target.value.split('\\').pop();
                }

                if (this.files[0].size > 200097152) {
                    // alert('Max upload 2MB.');
                    alertUpload('Your file is too large!');
                    // input.val('');
                } else {

                    if (fileName && prev.length == 0) {
                        switch (val.substring(val.lastIndexOf('.') + 1).toLowerCase()) {
                            case 'doc':
                            case 'docx':
                            case 'pdf':
                            case 'txt':
                            case 'jpg':
                            case 'png':
                                info.html(fileName);
                                info.removeClass('deleted');
                                t.addClass('has-file');
                                break;
                            default:
                                // alert('Only document files are allowed.')
                                alertUpload('Only document files are allowed.');
                                break;
                        }
                    }

                    if (prev.length != 0) {
                        switch (val.substring(val.lastIndexOf('.') + 1).toLowerCase()) {
                            case 'gif':
                            case 'jpg':
                            case 'png':
                            case 'svg':
                                readURL(this);
                                t.addClass('has-file');
                                break;
                            default:
                                // alert('Only image files are allowed.')
                                alertUpload('Only image files are allowed.');
                                break;
                        }
                    }

                }

                toggleDel();
            });

            del.click(function() {
                console.log('a');
                if (prev.length != 0) {
                    prev.css('background-image', '');
                }

                info.addClass('deleted');
                input.val('');
                t.removeClass('has-file');

                pB.addClass('hide');
                pB.attr('value', 0)

                toggleDel();
            })
        });
    }uploadImages();

    $('select.select').selectpicker();

    function func() {

        $('a[target!="_blank"]')
            .not('[href*="#"]')
            .not('.scroll-to')
            .not('[data-lity]')
            .not('[data-product]')
            .not('.lsb-preview').click(function(t) {
                t.preventDefault();
                var href = this.href;
                $("body").addClass("link-transition");
                setTimeout(function() {
                    window.location = href
                }, 500)
            })

        $("body").addClass("load-page");
        $("html, body").animate({ scrollTop: 0 }, 100);

        // STICKY HEADER
        if ($('.header').length > 0) {
            var header = $('.header'),
                pos = 10;
            $(window).on('scroll', function() {
                var scroll = $(window).scrollTop();
                if (scroll >= pos) {
                    header.addClass('sticky');
                    $('body').addClass('header-stick');
                } else {
                    header.removeClass('sticky');
                    $('body').removeClass('header-stick');
                }
            });
        }

        $('.header-toggle').click(function() {
            $('body').toggleClass('menu-open');
        })

        $('.has-sub').each(function() {
            var t = $(this);
            $('.has-sub').click(function() {
                t.toggleClass('sub-open');
                $('.has-sub').not(this).removeClass('sub-open');
            })
        })

        $('.scroll-down').each(function() {
            var target = $(this).data('target');
            $(this).click(function() {
                $('html, body').animate({
                    scrollTop: $(target).offset().top - 100
                }, 900);
            })
        })

        // SMOOTH SCROLL
        $('.scroll-to').click(function(event) {
            if (
                location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
                location.hostname == this.hostname
            ) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top - 60
                    }, 800, function() {
                        var $target = $(target);
                        if ($target.is(":focus")) {
                            return false;
                        } else {
                            $target.attr('tabindex', '-1');
                        };
                    });
                }
            }
        });

    } // end of func

    $('.modal').on('show.bs.modal', function(e) {
        $('html').addClass('modal-open');
        $('body').removeClass('menu-open');
    })

    $('.modal').on('hide.bs.modal', function(e) {
        $('html').removeClass('modal-open');
    })


})();

//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJtYWluLmpzIl0sInNvdXJjZXNDb250ZW50IjpbIihmdW5jdGlvbigpIHtcclxuICAgICd1c2Ugc3RyaWN0JztcclxuXHJcbiAgICBmdW5jdGlvbiBpbml0KCkge1xyXG5cclxuICAgICAgICAvLyBJTkxJTkUgU1ZHXHJcbiAgICAgICAgalF1ZXJ5KCdpbWcuc3ZnJykuZWFjaChmdW5jdGlvbihpKSB7XHJcbiAgICAgICAgICAgIHZhciAkaW1nID0galF1ZXJ5KHRoaXMpO1xyXG4gICAgICAgICAgICB2YXIgaW1nSUQgPSAkaW1nLmF0dHIoJ2lkJyk7XHJcbiAgICAgICAgICAgIHZhciBpbWdDbGFzcyA9ICRpbWcuYXR0cignY2xhc3MnKTtcclxuICAgICAgICAgICAgdmFyIGltZ1VSTCA9ICRpbWcuYXR0cignc3JjJyk7XHJcblxyXG4gICAgICAgICAgICBqUXVlcnkuZ2V0KGltZ1VSTCwgZnVuY3Rpb24oZGF0YSkge1xyXG4gICAgICAgICAgICAgICAgdmFyICRzdmcgPSBqUXVlcnkoZGF0YSkuZmluZCgnc3ZnJyk7XHJcbiAgICAgICAgICAgICAgICBpZiAodHlwZW9mIGltZ0lEICE9PSAndW5kZWZpbmVkJykge1xyXG4gICAgICAgICAgICAgICAgICAgICRzdmcgPSAkc3ZnLmF0dHIoJ2lkJywgaW1nSUQpO1xyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgaWYgKHR5cGVvZiBpbWdDbGFzcyAhPT0gJ3VuZGVmaW5lZCcpIHtcclxuICAgICAgICAgICAgICAgICAgICAkc3ZnID0gJHN2Zy5hdHRyKCdjbGFzcycsIGltZ0NsYXNzICsgJyByZXBsYWNlZC1zdmcnKTtcclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICRzdmcgPSAkc3ZnLnJlbW92ZUF0dHIoJ3htbG5zOmEnKTtcclxuICAgICAgICAgICAgICAgICRpbWcucmVwbGFjZVdpdGgoJHN2Zyk7XHJcbiAgICAgICAgICAgIH0sICd4bWwnKTtcclxuICAgICAgICB9KTtcclxuXHJcblxyXG4gICAgICAgIHNldFRpbWVvdXQobWFpbkxheW91dCwgMTAwKTtcclxuICAgICAgICBzZXRUaW1lb3V0KGFuaW1hdGlvbiwgMTAwKTtcclxuICAgICAgICBzZXRUaW1lb3V0KHNsaWRlciwgMTAwKTtcclxuICAgICAgICBzZXRUaW1lb3V0KGZ1bmMsIDEwMCk7XHJcblxyXG4gICAgICAgICQod2luZG93KS5zY3JvbGwoZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgICAgIHNldFRpbWVvdXQoZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgICAgICAgICBhbmltYXRpb24oKTtcclxuICAgICAgICAgICAgfSwgMzAwKVxyXG4gICAgICAgIH0pO1xyXG5cclxuICAgIH1cclxuICAgIGluaXQoKTsgLy8gZW5kIG9mIGluaXQoKVxyXG5cclxuICAgICQod2luZG93KS5yZXNpemUoZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgc2V0VGltZW91dChtYWluTGF5b3V0LCAxMDApO1xyXG4gICAgICAgIHNldFRpbWVvdXQoc2xpZGVyLCAxMDApO1xyXG4gICAgfSk7XHJcblxyXG4gICAgZnVuY3Rpb24gbWFpbkxheW91dCgpIHtcclxuICAgICAgICB2YXIgaCA9ICQoJyNoZWFkZXInKS5vdXRlckhlaWdodCh0cnVlKSxcclxuICAgICAgICAgICAgbSA9ICQoJ21haW4nKSxcclxuICAgICAgICAgICAgZiA9ICQoJyNmb290ZXInKS5vdXRlckhlaWdodCh0cnVlKSxcclxuICAgICAgICAgICAgc2V0ID0gZiArIGg7XHJcblxyXG4gICAgICAgIG0uY3NzKCdtaW4taGVpZ2h0JywgJ2NhbGMoMTAwdmggLSAnICsgc2V0ICsgJ3B4KScpO1xyXG4gICAgfVxyXG5cclxuICAgIGZ1bmN0aW9uIGFuaW1hdGlvbigpIHtcclxuICAgICAgICAkKFwiLmFuaW1hdGVcIikuZWFjaChmdW5jdGlvbigpIHtcclxuICAgICAgICAgICAgdmFyIGJvdHRvbV9vZl9vYmplY3QgPSAkKHRoaXMpLm9mZnNldCgpLnRvcCArIDEwO1xyXG4gICAgICAgICAgICB2YXIgYm90dG9tX29mX3dpbmRvdyA9ICQod2luZG93KS5zY3JvbGxUb3AoKSArICQod2luZG93KS5oZWlnaHQoKTtcclxuICAgICAgICAgICAgaWYgKGJvdHRvbV9vZl93aW5kb3cgPiBib3R0b21fb2Zfb2JqZWN0KSB7XHJcbiAgICAgICAgICAgICAgICAkKHRoaXMpLmFkZENsYXNzKCdhbmltYXRlLS1pbicpO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfSlcclxuICAgIH1cclxuXHJcbiAgICBmdW5jdGlvbiBzbGlkZXIoKSB7XHJcbiAgICAgICAgJCgnLnNjb21wYW55X19zbGlkZXInKS5lYWNoKGZ1bmN0aW9uKCkge1xyXG4gICAgICAgICAgICB2YXIgc2xpZGVyID0gJCh0aGlzKSxcclxuICAgICAgICAgICAgICAgIGl0ZW0gPSBzbGlkZXIuZmluZCgnLnNsaWRlci1pdGVtJyk7XHJcblxyXG4gICAgICAgICAgICBpZiAoaXRlbS5sZW5ndGggPiAzKSB7XHJcbiAgICAgICAgICAgICAgICBzbGlkZXIub3dsQ2Fyb3VzZWwoe1xyXG4gICAgICAgICAgICAgICAgICAgIGl0ZW1zOiAzLFxyXG4gICAgICAgICAgICAgICAgICAgIGxvb3A6IHRydWUsXHJcbiAgICAgICAgICAgICAgICAgICAgZG90czogdHJ1ZSxcclxuICAgICAgICAgICAgICAgICAgICBuYXY6IGZhbHNlLFxyXG4gICAgICAgICAgICAgICAgICAgIGF1dG9wbGF5OiB0cnVlLFxyXG4gICAgICAgICAgICAgICAgICAgIGF1dG9wbGF5VGltZW91dDogNjAwMCxcclxuICAgICAgICAgICAgICAgICAgICBhdXRvcGxheVNwZWVkOiA4MDAsXHJcbiAgICAgICAgICAgICAgICAgICAgbWFyZ2luOiAxMDAsXHJcbiAgICAgICAgICAgICAgICB9KTtcclxuICAgICAgICAgICAgfSBlbHNlIHtcclxuICAgICAgICAgICAgICAgIHNsaWRlci50cmlnZ2VyKCdkZXN0cm95Lm93bC5jYXJvdXNlbCcpLnJlbW92ZUNsYXNzKCdvd2wtY2Fyb3VzZWwgb3dsLWxvYWRlZCcpO1xyXG4gICAgICAgICAgICAgICAgc2xpZGVyLmZpbmQoJy5vd2wtc3RhZ2Utb3V0ZXInKS5jaGlsZHJlbigpLnVud3JhcCgpO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfSlcclxuICAgIH1cclxuICAgIHNsaWRlcigpO1xyXG5cclxuICAgIGZ1bmN0aW9uIHVwbG9hZEltYWdlcygpe1xyXG4gICAgICAgIC8vaW5wdXRmaWxlXHJcbiAgICAgICAgJCgnLnVwbG9hZC1maWxlJykuZWFjaChmdW5jdGlvbihlKSB7XHJcbiAgICAgICAgICAgIHZhciB0ID0gJCh0aGlzKSxcclxuICAgICAgICAgICAgICAgIGlucHV0ID0gdC5maW5kKCcuaW5wdXRmaWxlJyksXHJcbiAgICAgICAgICAgICAgICBsYWJlbCA9IHQuZmluZCgnLmxhYmVsLWJ0bicpLFxyXG4gICAgICAgICAgICAgICAgZGVsID0gdC5maW5kKCcuZGVsLWJ0bicpLFxyXG4gICAgICAgICAgICAgICAgaW5mbyA9IHQuZmluZCgnLmZpbGUtaW5mbycpLFxyXG4gICAgICAgICAgICAgICAgcHJldiA9IHQuZmluZCgnLmltYWdlLXByZXZpZXcnKSxcclxuICAgICAgICAgICAgICAgIHBCID0gdC5maW5kKCcucEInKSxcclxuICAgICAgICAgICAgICAgIHRvID0gdC5jbG9zZXN0KCdmb3JtJykuYXR0cignYWN0aW9uJyksXHJcbiAgICAgICAgICAgICAgICBmU2l6ZTtcclxuXHJcbiAgICAgICAgICAgIGZ1bmN0aW9uIHRvZ2dsZURlbCgpIHtcclxuICAgICAgICAgICAgICAgIGlmICh0Lmhhc0NsYXNzKCdoYXMtZmlsZScpKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgZGVsLnJlbW92ZUNsYXNzKCdkaXMnKTtcclxuICAgICAgICAgICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgICAgICAgICAgZGVsLmFkZENsYXNzKCdkaXMnKTtcclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB0b2dnbGVEZWwoKTtcclxuXHJcbiAgICAgICAgICAgIGZ1bmN0aW9uIHJlYWRVUkwoaW5wdXQpIHtcclxuICAgICAgICAgICAgICAgIGlmIChpbnB1dC5maWxlcyAmJiBpbnB1dC5maWxlc1swXSkge1xyXG4gICAgICAgICAgICAgICAgICAgIHZhciByZWFkZXIgPSBuZXcgRmlsZVJlYWRlcigpO1xyXG4gICAgICAgICAgICAgICAgICAgIHJlYWRlci5vbmxvYWQgPSBmdW5jdGlvbihlKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGxiKCk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHNldFRpbWVvdXQoXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGZ1bmN0aW9uKClcclxuICAgICAgICAgICAgICAgICAgICAgICAge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgcHJldi5jc3MoJ2JhY2tncm91bmQtaW1hZ2UnLCAndXJsKCcgKyBlLnRhcmdldC5yZXN1bHQgKyAnKScpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB9LCAxMDAwKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgLy8gY29uc29sZS5sb2coJ2hhaScpO1xyXG4gICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICByZWFkZXIucmVhZEFzRGF0YVVSTChpbnB1dC5maWxlc1swXSk7XHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIH1cclxuXHJcbiAgICAgICAgICAgIGZ1bmN0aW9uIGxiKCl7XHJcbiAgICAgICAgICAgICAgICB2YXIgYWpheCA9IG5ldyBYTUxIdHRwUmVxdWVzdCgpO1xyXG4gICAgICAgICAgICAgICAgdmFyIGZvcm1kYXRhID0gbmV3IEZvcm1EYXRhKCk7XHJcbiAgICAgICAgICAgICAgICAvLyBhamF4LnVwbG9hZC5hZGRFdmVudExpc3RlbmVyKCdwcm9ncmVzcycsIHVwbG9hZFByb2dyZXNzLCBmYWxzZSk7XHJcbiAgICAgICAgICAgICAgICBhamF4Lm9ucHJvZ3Jlc3MgPSBmdW5jdGlvbiAoZSkge1xyXG4gICAgICAgICAgICAgICAgICAgIGlmIChlLmxlbmd0aENvbXB1dGFibGUpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgLy8gY29uc29sZS5sb2coZS5sb2FkZWQrICBcIiAvIFwiICsgZS50b3RhbCk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHZhciBwZXJjZW50ID0gKGUubG9hZGVkIC8gZS50b3RhbCkgKiAxMDA7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHBCLmF0dHIoJ3ZhbHVlJywgTWF0aC5yb3VuZChwZXJjZW50KSk7XHJcbiAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgfVxyXG5cclxuICAgICAgICAgICAgICAgIGFqYXgub25sb2Fkc3RhcnQgPSBmdW5jdGlvbiAoZSkge1xyXG4gICAgICAgICAgICAgICAgICAgIHBCLnJlbW92ZUNsYXNzKCdoaWRlJyk7XHJcbiAgICAgICAgICAgICAgICAgICAgY29uc29sZS5sb2codG8pO1xyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgYWpheC5vbmxvYWRlbmQgPSBmdW5jdGlvbiAoZSkge1xyXG4gICAgICAgICAgICAgICAgICAgIHBCLmFkZENsYXNzKCdoaWRlJyk7XHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICBhamF4Lm9wZW4oXCJQT1NUXCIsIHRvKTtcclxuICAgICAgICAgICAgICAgIGFqYXguc2VuZChGb3JtRGF0YSk7XHJcblxyXG4gICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICBpbnB1dC5jaGFuZ2UoZnVuY3Rpb24oZSkge1xyXG4gICAgICAgICAgICAgICAgdmFyIGZpbGVOYW1lID0gJycsXHJcbiAgICAgICAgICAgICAgICAgICAgdmFsID0gJCh0aGlzKS52YWwoKTtcclxuXHJcbiAgICAgICAgICAgICAgICBpZiAodGhpcy5maWxlcyAmJiB0aGlzLmZpbGVzLmxlbmd0aCA+IDEpIHtcclxuICAgICAgICAgICAgICAgICAgICBmaWxlTmFtZSA9ICh0aGlzLmdldEF0dHJpYnV0ZSgnZGF0YS1tdWx0aXBsZS1jYXB0aW9uJykgfHwgJycpLnJlcGxhY2UoJ3tjb3VudH0nLCB0aGlzLmZpbGVzLmxlbmd0aCk7XHJcbiAgICAgICAgICAgICAgICB9IGVsc2UgaWYgKGUudGFyZ2V0LnZhbHVlKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgZmlsZU5hbWUgPSBlLnRhcmdldC52YWx1ZS5zcGxpdCgnXFxcXCcpLnBvcCgpO1xyXG4gICAgICAgICAgICAgICAgfVxyXG5cclxuICAgICAgICAgICAgICAgIGlmICh0aGlzLmZpbGVzWzBdLnNpemUgPiAyMDAwOTcxNTIpIHtcclxuICAgICAgICAgICAgICAgICAgICAvLyBhbGVydCgnTWF4IHVwbG9hZCAyTUIuJyk7XHJcbiAgICAgICAgICAgICAgICAgICAgYWxlcnRVcGxvYWQoJ1lvdXIgZmlsZSBpcyB0b28gbGFyZ2UhJyk7XHJcbiAgICAgICAgICAgICAgICAgICAgLy8gaW5wdXQudmFsKCcnKTtcclxuICAgICAgICAgICAgICAgIH0gZWxzZSB7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgIGlmIChmaWxlTmFtZSAmJiBwcmV2Lmxlbmd0aCA9PSAwKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHN3aXRjaCAodmFsLnN1YnN0cmluZyh2YWwubGFzdEluZGV4T2YoJy4nKSArIDEpLnRvTG93ZXJDYXNlKCkpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGNhc2UgJ2RvYyc6XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBjYXNlICdkb2N4JzpcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGNhc2UgJ3BkZic6XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBjYXNlICd0eHQnOlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgY2FzZSAnanBnJzpcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGNhc2UgJ3BuZyc6XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgaW5mby5odG1sKGZpbGVOYW1lKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBpbmZvLnJlbW92ZUNsYXNzKCdkZWxldGVkJyk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgdC5hZGRDbGFzcygnaGFzLWZpbGUnKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBicmVhaztcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGRlZmF1bHQ6XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgLy8gYWxlcnQoJ09ubHkgZG9jdW1lbnQgZmlsZXMgYXJlIGFsbG93ZWQuJylcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBhbGVydFVwbG9hZCgnT25seSBkb2N1bWVudCBmaWxlcyBhcmUgYWxsb3dlZC4nKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBicmVhaztcclxuICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgIH1cclxuXHJcbiAgICAgICAgICAgICAgICAgICAgaWYgKHByZXYubGVuZ3RoICE9IDApIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgc3dpdGNoICh2YWwuc3Vic3RyaW5nKHZhbC5sYXN0SW5kZXhPZignLicpICsgMSkudG9Mb3dlckNhc2UoKSkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgY2FzZSAnZ2lmJzpcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGNhc2UgJ2pwZyc6XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBjYXNlICdwbmcnOlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgY2FzZSAnc3ZnJzpcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICByZWFkVVJMKHRoaXMpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHQuYWRkQ2xhc3MoJ2hhcy1maWxlJyk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgYnJlYWs7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBkZWZhdWx0OlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIC8vIGFsZXJ0KCdPbmx5IGltYWdlIGZpbGVzIGFyZSBhbGxvd2VkLicpXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgYWxlcnRVcGxvYWQoJ09ubHkgaW1hZ2UgZmlsZXMgYXJlIGFsbG93ZWQuJyk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgYnJlYWs7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICAgICAgfVxyXG5cclxuICAgICAgICAgICAgICAgIHRvZ2dsZURlbCgpO1xyXG4gICAgICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgICAgIGRlbC5jbGljayhmdW5jdGlvbigpIHtcclxuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKCdhJyk7XHJcbiAgICAgICAgICAgICAgICBpZiAocHJldi5sZW5ndGggIT0gMCkge1xyXG4gICAgICAgICAgICAgICAgICAgIHByZXYuY3NzKCdiYWNrZ3JvdW5kLWltYWdlJywgJycpO1xyXG4gICAgICAgICAgICAgICAgfVxyXG5cclxuICAgICAgICAgICAgICAgIGluZm8uYWRkQ2xhc3MoJ2RlbGV0ZWQnKTtcclxuICAgICAgICAgICAgICAgIGlucHV0LnZhbCgnJyk7XHJcbiAgICAgICAgICAgICAgICB0LnJlbW92ZUNsYXNzKCdoYXMtZmlsZScpO1xyXG5cclxuICAgICAgICAgICAgICAgIHBCLmFkZENsYXNzKCdoaWRlJyk7XHJcbiAgICAgICAgICAgICAgICBwQi5hdHRyKCd2YWx1ZScsIDApXHJcblxyXG4gICAgICAgICAgICAgICAgdG9nZ2xlRGVsKCk7XHJcbiAgICAgICAgICAgIH0pXHJcbiAgICAgICAgfSk7XHJcbiAgICB9dXBsb2FkSW1hZ2VzKCk7XHJcblxyXG4gICAgJCgnc2VsZWN0LnNlbGVjdCcpLnNlbGVjdHBpY2tlcigpO1xyXG5cclxuICAgIGZ1bmN0aW9uIGZ1bmMoKSB7XHJcblxyXG4gICAgICAgICQoJ2FbdGFyZ2V0IT1cIl9ibGFua1wiXScpXHJcbiAgICAgICAgICAgIC5ub3QoJ1tocmVmKj1cIiNcIl0nKVxyXG4gICAgICAgICAgICAubm90KCcuc2Nyb2xsLXRvJylcclxuICAgICAgICAgICAgLm5vdCgnW2RhdGEtbGl0eV0nKVxyXG4gICAgICAgICAgICAubm90KCdbZGF0YS1wcm9kdWN0XScpXHJcbiAgICAgICAgICAgIC5ub3QoJy5sc2ItcHJldmlldycpLmNsaWNrKGZ1bmN0aW9uKHQpIHtcclxuICAgICAgICAgICAgICAgIHQucHJldmVudERlZmF1bHQoKTtcclxuICAgICAgICAgICAgICAgIHZhciBocmVmID0gdGhpcy5ocmVmO1xyXG4gICAgICAgICAgICAgICAgJChcImJvZHlcIikuYWRkQ2xhc3MoXCJsaW5rLXRyYW5zaXRpb25cIik7XHJcbiAgICAgICAgICAgICAgICBzZXRUaW1lb3V0KGZ1bmN0aW9uKCkge1xyXG4gICAgICAgICAgICAgICAgICAgIHdpbmRvdy5sb2NhdGlvbiA9IGhyZWZcclxuICAgICAgICAgICAgICAgIH0sIDUwMClcclxuICAgICAgICAgICAgfSlcclxuXHJcbiAgICAgICAgJChcImJvZHlcIikuYWRkQ2xhc3MoXCJsb2FkLXBhZ2VcIik7XHJcbiAgICAgICAgJChcImh0bWwsIGJvZHlcIikuYW5pbWF0ZSh7IHNjcm9sbFRvcDogMCB9LCAxMDApO1xyXG5cclxuICAgICAgICAvLyBTVElDS1kgSEVBREVSXHJcbiAgICAgICAgaWYgKCQoJy5oZWFkZXInKS5sZW5ndGggPiAwKSB7XHJcbiAgICAgICAgICAgIHZhciBoZWFkZXIgPSAkKCcuaGVhZGVyJyksXHJcbiAgICAgICAgICAgICAgICBwb3MgPSAxMjI7XHJcbiAgICAgICAgICAgICQod2luZG93KS5vbignc2Nyb2xsJywgZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgICAgICAgICB2YXIgc2Nyb2xsID0gJCh3aW5kb3cpLnNjcm9sbFRvcCgpO1xyXG4gICAgICAgICAgICAgICAgaWYgKHNjcm9sbCA+PSBwb3MpIHtcclxuICAgICAgICAgICAgICAgICAgICBoZWFkZXIuYWRkQ2xhc3MoJ3N0aWNreScpO1xyXG4gICAgICAgICAgICAgICAgICAgICQoJ2JvZHknKS5hZGRDbGFzcygnaGVhZGVyLXN0aWNrJyk7XHJcbiAgICAgICAgICAgICAgICB9IGVsc2Uge1xyXG4gICAgICAgICAgICAgICAgICAgIGhlYWRlci5yZW1vdmVDbGFzcygnc3RpY2t5Jyk7XHJcbiAgICAgICAgICAgICAgICAgICAgJCgnYm9keScpLnJlbW92ZUNsYXNzKCdoZWFkZXItc3RpY2snKTtcclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgfVxyXG5cclxuICAgICAgICAkKCcuaGVhZGVyLXRvZ2dsZScpLmNsaWNrKGZ1bmN0aW9uKCkge1xyXG4gICAgICAgICAgICAkKCdib2R5JykudG9nZ2xlQ2xhc3MoJ21lbnUtb3BlbicpO1xyXG4gICAgICAgIH0pXHJcblxyXG4gICAgICAgICQoJy5oYXMtc3ViJykuZWFjaChmdW5jdGlvbigpIHtcclxuICAgICAgICAgICAgdmFyIHQgPSAkKHRoaXMpO1xyXG4gICAgICAgICAgICAkKCcuaGFzLXN1YicpLmNsaWNrKGZ1bmN0aW9uKCkge1xyXG4gICAgICAgICAgICAgICAgdC50b2dnbGVDbGFzcygnc3ViLW9wZW4nKTtcclxuICAgICAgICAgICAgICAgICQoJy5oYXMtc3ViJykubm90KHRoaXMpLnJlbW92ZUNsYXNzKCdzdWItb3BlbicpO1xyXG4gICAgICAgICAgICB9KVxyXG4gICAgICAgIH0pXHJcblxyXG4gICAgICAgICQoJy5zY3JvbGwtZG93bicpLmVhY2goZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgICAgIHZhciB0YXJnZXQgPSAkKHRoaXMpLmRhdGEoJ3RhcmdldCcpO1xyXG4gICAgICAgICAgICAkKHRoaXMpLmNsaWNrKGZ1bmN0aW9uKCkge1xyXG4gICAgICAgICAgICAgICAgJCgnaHRtbCwgYm9keScpLmFuaW1hdGUoe1xyXG4gICAgICAgICAgICAgICAgICAgIHNjcm9sbFRvcDogJCh0YXJnZXQpLm9mZnNldCgpLnRvcCAtIDEwMFxyXG4gICAgICAgICAgICAgICAgfSwgOTAwKTtcclxuICAgICAgICAgICAgfSlcclxuICAgICAgICB9KVxyXG5cclxuICAgICAgICAvLyBTTU9PVEggU0NST0xMXHJcbiAgICAgICAgJCgnLnNjcm9sbC10bycpLmNsaWNrKGZ1bmN0aW9uKGV2ZW50KSB7XHJcbiAgICAgICAgICAgIGlmIChcclxuICAgICAgICAgICAgICAgIGxvY2F0aW9uLnBhdGhuYW1lLnJlcGxhY2UoL15cXC8vLCAnJykgPT0gdGhpcy5wYXRobmFtZS5yZXBsYWNlKC9eXFwvLywgJycpICYmXHJcbiAgICAgICAgICAgICAgICBsb2NhdGlvbi5ob3N0bmFtZSA9PSB0aGlzLmhvc3RuYW1lXHJcbiAgICAgICAgICAgICkge1xyXG4gICAgICAgICAgICAgICAgdmFyIHRhcmdldCA9ICQodGhpcy5oYXNoKTtcclxuICAgICAgICAgICAgICAgIHRhcmdldCA9IHRhcmdldC5sZW5ndGggPyB0YXJnZXQgOiAkKCdbbmFtZT0nICsgdGhpcy5oYXNoLnNsaWNlKDEpICsgJ10nKTtcclxuICAgICAgICAgICAgICAgIGlmICh0YXJnZXQubGVuZ3RoKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgZXZlbnQucHJldmVudERlZmF1bHQoKTtcclxuICAgICAgICAgICAgICAgICAgICAkKCdodG1sLCBib2R5JykuYW5pbWF0ZSh7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHNjcm9sbFRvcDogdGFyZ2V0Lm9mZnNldCgpLnRvcCAtIDYwXHJcbiAgICAgICAgICAgICAgICAgICAgfSwgODAwLCBmdW5jdGlvbigpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgdmFyICR0YXJnZXQgPSAkKHRhcmdldCk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGlmICgkdGFyZ2V0LmlzKFwiOmZvY3VzXCIpKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICByZXR1cm4gZmFsc2U7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAkdGFyZ2V0LmF0dHIoJ3RhYmluZGV4JywgJy0xJyk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIH07XHJcbiAgICAgICAgICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9KTtcclxuXHJcbiAgICB9IC8vIGVuZCBvZiBmdW5jXHJcblxyXG4gICAgJCgnLm1vZGFsJykub24oJ3Nob3cuYnMubW9kYWwnLCBmdW5jdGlvbihlKSB7XHJcbiAgICAgICAgJCgnaHRtbCcpLmFkZENsYXNzKCdtb2RhbC1vcGVuJyk7XHJcbiAgICAgICAgJCgnYm9keScpLnJlbW92ZUNsYXNzKCdtZW51LW9wZW4nKTtcclxuICAgIH0pXHJcblxyXG4gICAgJCgnLm1vZGFsJykub24oJ2hpZGUuYnMubW9kYWwnLCBmdW5jdGlvbihlKSB7XHJcbiAgICAgICAgJCgnaHRtbCcpLnJlbW92ZUNsYXNzKCdtb2RhbC1vcGVuJyk7XHJcbiAgICB9KVxyXG5cclxuXHJcbn0pKCk7XHJcbiJdLCJmaWxlIjoibWFpbi5qcyJ9

//# sourceMappingURL=main.js.map
