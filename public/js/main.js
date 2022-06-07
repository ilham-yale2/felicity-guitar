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

    $('.mobile-menu').click(function () {
        $('body').toggleClass('menu-open');
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
                pos = 122;
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

//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJtYWluLmpzIl0sInNvdXJjZXNDb250ZW50IjpbIihmdW5jdGlvbigpIHtcclxuICAgICd1c2Ugc3RyaWN0JztcclxuXHJcbiAgICBmdW5jdGlvbiBpbml0KCkge1xyXG5cclxuICAgICAgICAvLyBJTkxJTkUgU1ZHXHJcbiAgICAgICAgalF1ZXJ5KCdpbWcuc3ZnJykuZWFjaChmdW5jdGlvbihpKSB7XHJcbiAgICAgICAgICAgIHZhciAkaW1nID0galF1ZXJ5KHRoaXMpO1xyXG4gICAgICAgICAgICB2YXIgaW1nSUQgPSAkaW1nLmF0dHIoJ2lkJyk7XHJcbiAgICAgICAgICAgIHZhciBpbWdDbGFzcyA9ICRpbWcuYXR0cignY2xhc3MnKTtcclxuICAgICAgICAgICAgdmFyIGltZ1VSTCA9ICRpbWcuYXR0cignc3JjJyk7XHJcblxyXG4gICAgICAgICAgICBqUXVlcnkuZ2V0KGltZ1VSTCwgZnVuY3Rpb24oZGF0YSkge1xyXG4gICAgICAgICAgICAgICAgdmFyICRzdmcgPSBqUXVlcnkoZGF0YSkuZmluZCgnc3ZnJyk7XHJcbiAgICAgICAgICAgICAgICBpZiAodHlwZW9mIGltZ0lEICE9PSAndW5kZWZpbmVkJykge1xyXG4gICAgICAgICAgICAgICAgICAgICRzdmcgPSAkc3ZnLmF0dHIoJ2lkJywgaW1nSUQpO1xyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgaWYgKHR5cGVvZiBpbWdDbGFzcyAhPT0gJ3VuZGVmaW5lZCcpIHtcclxuICAgICAgICAgICAgICAgICAgICAkc3ZnID0gJHN2Zy5hdHRyKCdjbGFzcycsIGltZ0NsYXNzICsgJyByZXBsYWNlZC1zdmcnKTtcclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICRzdmcgPSAkc3ZnLnJlbW92ZUF0dHIoJ3htbG5zOmEnKTtcclxuICAgICAgICAgICAgICAgICRpbWcucmVwbGFjZVdpdGgoJHN2Zyk7XHJcbiAgICAgICAgICAgIH0sICd4bWwnKTtcclxuICAgICAgICB9KTtcclxuXHJcblxyXG4gICAgICAgIHNldFRpbWVvdXQobWFpbkxheW91dCwgMTAwKTtcclxuICAgICAgICBzZXRUaW1lb3V0KGFuaW1hdGlvbiwgMTAwKTtcclxuICAgICAgICBzZXRUaW1lb3V0KHNsaWRlciwgMTAwKTtcclxuICAgICAgICBzZXRUaW1lb3V0KGZ1bmMsIDEwMCk7XHJcblxyXG4gICAgICAgICQod2luZG93KS5zY3JvbGwoZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgICAgIHNldFRpbWVvdXQoZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgICAgICAgICBhbmltYXRpb24oKTtcclxuICAgICAgICAgICAgfSwgMzAwKVxyXG4gICAgICAgIH0pO1xyXG5cclxuICAgIH1cclxuICAgIGluaXQoKTsgLy8gZW5kIG9mIGluaXQoKVxyXG5cclxuICAgICQod2luZG93KS5yZXNpemUoZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgc2V0VGltZW91dChtYWluTGF5b3V0LCAxMDApO1xyXG4gICAgICAgIHNldFRpbWVvdXQoc2xpZGVyLCAxMDApO1xyXG4gICAgfSk7XHJcblxyXG4gICAgJCgnLm1vYmlsZS1tZW51JykuY2xpY2soZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICQoJ2JvZHknKS50b2dnbGVDbGFzcygnbWVudS1vcGVuJyk7XHJcbiAgICB9KTtcclxuXHJcbiAgICBmdW5jdGlvbiBtYWluTGF5b3V0KCkge1xyXG4gICAgICAgIHZhciBoID0gJCgnI2hlYWRlcicpLm91dGVySGVpZ2h0KHRydWUpLFxyXG4gICAgICAgICAgICBtID0gJCgnbWFpbicpLFxyXG4gICAgICAgICAgICBmID0gJCgnI2Zvb3RlcicpLm91dGVySGVpZ2h0KHRydWUpLFxyXG4gICAgICAgICAgICBzZXQgPSBmICsgaDtcclxuXHJcbiAgICAgICAgbS5jc3MoJ21pbi1oZWlnaHQnLCAnY2FsYygxMDB2aCAtICcgKyBzZXQgKyAncHgpJyk7XHJcbiAgICB9XHJcblxyXG4gICAgZnVuY3Rpb24gYW5pbWF0aW9uKCkge1xyXG4gICAgICAgICQoXCIuYW5pbWF0ZVwiKS5lYWNoKGZ1bmN0aW9uKCkge1xyXG4gICAgICAgICAgICB2YXIgYm90dG9tX29mX29iamVjdCA9ICQodGhpcykub2Zmc2V0KCkudG9wICsgMTA7XHJcbiAgICAgICAgICAgIHZhciBib3R0b21fb2Zfd2luZG93ID0gJCh3aW5kb3cpLnNjcm9sbFRvcCgpICsgJCh3aW5kb3cpLmhlaWdodCgpO1xyXG4gICAgICAgICAgICBpZiAoYm90dG9tX29mX3dpbmRvdyA+IGJvdHRvbV9vZl9vYmplY3QpIHtcclxuICAgICAgICAgICAgICAgICQodGhpcykuYWRkQ2xhc3MoJ2FuaW1hdGUtLWluJyk7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9KVxyXG4gICAgfVxyXG5cclxuICAgIGZ1bmN0aW9uIHNsaWRlcigpIHtcclxuICAgICAgICAkKCcuc2NvbXBhbnlfX3NsaWRlcicpLmVhY2goZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgICAgIHZhciBzbGlkZXIgPSAkKHRoaXMpLFxyXG4gICAgICAgICAgICAgICAgaXRlbSA9IHNsaWRlci5maW5kKCcuc2xpZGVyLWl0ZW0nKTtcclxuXHJcbiAgICAgICAgICAgIGlmIChpdGVtLmxlbmd0aCA+IDMpIHtcclxuICAgICAgICAgICAgICAgIHNsaWRlci5vd2xDYXJvdXNlbCh7XHJcbiAgICAgICAgICAgICAgICAgICAgaXRlbXM6IDMsXHJcbiAgICAgICAgICAgICAgICAgICAgbG9vcDogdHJ1ZSxcclxuICAgICAgICAgICAgICAgICAgICBkb3RzOiB0cnVlLFxyXG4gICAgICAgICAgICAgICAgICAgIG5hdjogZmFsc2UsXHJcbiAgICAgICAgICAgICAgICAgICAgYXV0b3BsYXk6IHRydWUsXHJcbiAgICAgICAgICAgICAgICAgICAgYXV0b3BsYXlUaW1lb3V0OiA2MDAwLFxyXG4gICAgICAgICAgICAgICAgICAgIGF1dG9wbGF5U3BlZWQ6IDgwMCxcclxuICAgICAgICAgICAgICAgICAgICBtYXJnaW46IDEwMCxcclxuICAgICAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICB9IGVsc2Uge1xyXG4gICAgICAgICAgICAgICAgc2xpZGVyLnRyaWdnZXIoJ2Rlc3Ryb3kub3dsLmNhcm91c2VsJykucmVtb3ZlQ2xhc3MoJ293bC1jYXJvdXNlbCBvd2wtbG9hZGVkJyk7XHJcbiAgICAgICAgICAgICAgICBzbGlkZXIuZmluZCgnLm93bC1zdGFnZS1vdXRlcicpLmNoaWxkcmVuKCkudW53cmFwKCk7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9KVxyXG4gICAgfVxyXG4gICAgc2xpZGVyKCk7XHJcblxyXG4gICAgZnVuY3Rpb24gdXBsb2FkSW1hZ2VzKCl7XHJcbiAgICAgICAgLy9pbnB1dGZpbGVcclxuICAgICAgICAkKCcudXBsb2FkLWZpbGUnKS5lYWNoKGZ1bmN0aW9uKGUpIHtcclxuICAgICAgICAgICAgdmFyIHQgPSAkKHRoaXMpLFxyXG4gICAgICAgICAgICAgICAgaW5wdXQgPSB0LmZpbmQoJy5pbnB1dGZpbGUnKSxcclxuICAgICAgICAgICAgICAgIGxhYmVsID0gdC5maW5kKCcubGFiZWwtYnRuJyksXHJcbiAgICAgICAgICAgICAgICBkZWwgPSB0LmZpbmQoJy5kZWwtYnRuJyksXHJcbiAgICAgICAgICAgICAgICBpbmZvID0gdC5maW5kKCcuZmlsZS1pbmZvJyksXHJcbiAgICAgICAgICAgICAgICBwcmV2ID0gdC5maW5kKCcuaW1hZ2UtcHJldmlldycpLFxyXG4gICAgICAgICAgICAgICAgcEIgPSB0LmZpbmQoJy5wQicpLFxyXG4gICAgICAgICAgICAgICAgdG8gPSB0LmNsb3Nlc3QoJ2Zvcm0nKS5hdHRyKCdhY3Rpb24nKSxcclxuICAgICAgICAgICAgICAgIGZTaXplO1xyXG5cclxuICAgICAgICAgICAgZnVuY3Rpb24gdG9nZ2xlRGVsKCkge1xyXG4gICAgICAgICAgICAgICAgaWYgKHQuaGFzQ2xhc3MoJ2hhcy1maWxlJykpIHtcclxuICAgICAgICAgICAgICAgICAgICBkZWwucmVtb3ZlQ2xhc3MoJ2RpcycpO1xyXG4gICAgICAgICAgICAgICAgfSBlbHNlIHtcclxuICAgICAgICAgICAgICAgICAgICBkZWwuYWRkQ2xhc3MoJ2RpcycpO1xyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIHRvZ2dsZURlbCgpO1xyXG5cclxuICAgICAgICAgICAgZnVuY3Rpb24gcmVhZFVSTChpbnB1dCkge1xyXG4gICAgICAgICAgICAgICAgaWYgKGlucHV0LmZpbGVzICYmIGlucHV0LmZpbGVzWzBdKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgdmFyIHJlYWRlciA9IG5ldyBGaWxlUmVhZGVyKCk7XHJcbiAgICAgICAgICAgICAgICAgICAgcmVhZGVyLm9ubG9hZCA9IGZ1bmN0aW9uKGUpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgbGIoKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgc2V0VGltZW91dChcclxuICAgICAgICAgICAgICAgICAgICAgICAgZnVuY3Rpb24oKVxyXG4gICAgICAgICAgICAgICAgICAgICAgICB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBwcmV2LmNzcygnYmFja2dyb3VuZC1pbWFnZScsICd1cmwoJyArIGUudGFyZ2V0LnJlc3VsdCArICcpJyk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIH0sIDEwMDApO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAvLyBjb25zb2xlLmxvZygnaGFpJyk7XHJcbiAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgIHJlYWRlci5yZWFkQXNEYXRhVVJMKGlucHV0LmZpbGVzWzBdKTtcclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgfVxyXG5cclxuICAgICAgICAgICAgZnVuY3Rpb24gbGIoKXtcclxuICAgICAgICAgICAgICAgIHZhciBhamF4ID0gbmV3IFhNTEh0dHBSZXF1ZXN0KCk7XHJcbiAgICAgICAgICAgICAgICB2YXIgZm9ybWRhdGEgPSBuZXcgRm9ybURhdGEoKTtcclxuICAgICAgICAgICAgICAgIC8vIGFqYXgudXBsb2FkLmFkZEV2ZW50TGlzdGVuZXIoJ3Byb2dyZXNzJywgdXBsb2FkUHJvZ3Jlc3MsIGZhbHNlKTtcclxuICAgICAgICAgICAgICAgIGFqYXgub25wcm9ncmVzcyA9IGZ1bmN0aW9uIChlKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgaWYgKGUubGVuZ3RoQ29tcHV0YWJsZSkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAvLyBjb25zb2xlLmxvZyhlLmxvYWRlZCsgIFwiIC8gXCIgKyBlLnRvdGFsKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgdmFyIHBlcmNlbnQgPSAoZS5sb2FkZWQgLyBlLnRvdGFsKSAqIDEwMDtcclxuICAgICAgICAgICAgICAgICAgICAgICAgcEIuYXR0cigndmFsdWUnLCBNYXRoLnJvdW5kKHBlcmNlbnQpKTtcclxuICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICAgICAgYWpheC5vbmxvYWRzdGFydCA9IGZ1bmN0aW9uIChlKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgcEIucmVtb3ZlQ2xhc3MoJ2hpZGUnKTtcclxuICAgICAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyh0byk7XHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICBhamF4Lm9ubG9hZGVuZCA9IGZ1bmN0aW9uIChlKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgcEIuYWRkQ2xhc3MoJ2hpZGUnKTtcclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgIGFqYXgub3BlbihcIlBPU1RcIiwgdG8pO1xyXG4gICAgICAgICAgICAgICAgYWpheC5zZW5kKEZvcm1EYXRhKTtcclxuXHJcbiAgICAgICAgICAgIH1cclxuXHJcbiAgICAgICAgICAgIGlucHV0LmNoYW5nZShmdW5jdGlvbihlKSB7XHJcbiAgICAgICAgICAgICAgICB2YXIgZmlsZU5hbWUgPSAnJyxcclxuICAgICAgICAgICAgICAgICAgICB2YWwgPSAkKHRoaXMpLnZhbCgpO1xyXG5cclxuICAgICAgICAgICAgICAgIGlmICh0aGlzLmZpbGVzICYmIHRoaXMuZmlsZXMubGVuZ3RoID4gMSkge1xyXG4gICAgICAgICAgICAgICAgICAgIGZpbGVOYW1lID0gKHRoaXMuZ2V0QXR0cmlidXRlKCdkYXRhLW11bHRpcGxlLWNhcHRpb24nKSB8fCAnJykucmVwbGFjZSgne2NvdW50fScsIHRoaXMuZmlsZXMubGVuZ3RoKTtcclxuICAgICAgICAgICAgICAgIH0gZWxzZSBpZiAoZS50YXJnZXQudmFsdWUpIHtcclxuICAgICAgICAgICAgICAgICAgICBmaWxlTmFtZSA9IGUudGFyZ2V0LnZhbHVlLnNwbGl0KCdcXFxcJykucG9wKCk7XHJcbiAgICAgICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICAgICAgaWYgKHRoaXMuZmlsZXNbMF0uc2l6ZSA+IDIwMDA5NzE1Mikge1xyXG4gICAgICAgICAgICAgICAgICAgIC8vIGFsZXJ0KCdNYXggdXBsb2FkIDJNQi4nKTtcclxuICAgICAgICAgICAgICAgICAgICBhbGVydFVwbG9hZCgnWW91ciBmaWxlIGlzIHRvbyBsYXJnZSEnKTtcclxuICAgICAgICAgICAgICAgICAgICAvLyBpbnB1dC52YWwoJycpO1xyXG4gICAgICAgICAgICAgICAgfSBlbHNlIHtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgaWYgKGZpbGVOYW1lICYmIHByZXYubGVuZ3RoID09IDApIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgc3dpdGNoICh2YWwuc3Vic3RyaW5nKHZhbC5sYXN0SW5kZXhPZignLicpICsgMSkudG9Mb3dlckNhc2UoKSkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgY2FzZSAnZG9jJzpcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGNhc2UgJ2RvY3gnOlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgY2FzZSAncGRmJzpcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGNhc2UgJ3R4dCc6XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBjYXNlICdqcGcnOlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgY2FzZSAncG5nJzpcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBpbmZvLmh0bWwoZmlsZU5hbWUpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGluZm8ucmVtb3ZlQ2xhc3MoJ2RlbGV0ZWQnKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB0LmFkZENsYXNzKCdoYXMtZmlsZScpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGJyZWFrO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgZGVmYXVsdDpcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAvLyBhbGVydCgnT25seSBkb2N1bWVudCBmaWxlcyBhcmUgYWxsb3dlZC4nKVxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGFsZXJ0VXBsb2FkKCdPbmx5IGRvY3VtZW50IGZpbGVzIGFyZSBhbGxvd2VkLicpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGJyZWFrO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgfVxyXG5cclxuICAgICAgICAgICAgICAgICAgICBpZiAocHJldi5sZW5ndGggIT0gMCkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBzd2l0Y2ggKHZhbC5zdWJzdHJpbmcodmFsLmxhc3RJbmRleE9mKCcuJykgKyAxKS50b0xvd2VyQ2FzZSgpKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBjYXNlICdnaWYnOlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgY2FzZSAnanBnJzpcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGNhc2UgJ3BuZyc6XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBjYXNlICdzdmcnOlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHJlYWRVUkwodGhpcyk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgdC5hZGRDbGFzcygnaGFzLWZpbGUnKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBicmVhaztcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGRlZmF1bHQ6XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgLy8gYWxlcnQoJ09ubHkgaW1hZ2UgZmlsZXMgYXJlIGFsbG93ZWQuJylcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBhbGVydFVwbG9hZCgnT25seSBpbWFnZSBmaWxlcyBhcmUgYWxsb3dlZC4nKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBicmVhaztcclxuICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgIH1cclxuXHJcbiAgICAgICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICAgICAgdG9nZ2xlRGVsKCk7XHJcbiAgICAgICAgICAgIH0pO1xyXG5cclxuICAgICAgICAgICAgZGVsLmNsaWNrKGZ1bmN0aW9uKCkge1xyXG4gICAgICAgICAgICAgICAgY29uc29sZS5sb2coJ2EnKTtcclxuICAgICAgICAgICAgICAgIGlmIChwcmV2Lmxlbmd0aCAhPSAwKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgcHJldi5jc3MoJ2JhY2tncm91bmQtaW1hZ2UnLCAnJyk7XHJcbiAgICAgICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICAgICAgaW5mby5hZGRDbGFzcygnZGVsZXRlZCcpO1xyXG4gICAgICAgICAgICAgICAgaW5wdXQudmFsKCcnKTtcclxuICAgICAgICAgICAgICAgIHQucmVtb3ZlQ2xhc3MoJ2hhcy1maWxlJyk7XHJcblxyXG4gICAgICAgICAgICAgICAgcEIuYWRkQ2xhc3MoJ2hpZGUnKTtcclxuICAgICAgICAgICAgICAgIHBCLmF0dHIoJ3ZhbHVlJywgMClcclxuXHJcbiAgICAgICAgICAgICAgICB0b2dnbGVEZWwoKTtcclxuICAgICAgICAgICAgfSlcclxuICAgICAgICB9KTtcclxuICAgIH11cGxvYWRJbWFnZXMoKTtcclxuXHJcbiAgICAkKCdzZWxlY3Quc2VsZWN0Jykuc2VsZWN0cGlja2VyKCk7XHJcblxyXG4gICAgZnVuY3Rpb24gZnVuYygpIHtcclxuXHJcbiAgICAgICAgJCgnYVt0YXJnZXQhPVwiX2JsYW5rXCJdJylcclxuICAgICAgICAgICAgLm5vdCgnW2hyZWYqPVwiI1wiXScpXHJcbiAgICAgICAgICAgIC5ub3QoJy5zY3JvbGwtdG8nKVxyXG4gICAgICAgICAgICAubm90KCdbZGF0YS1saXR5XScpXHJcbiAgICAgICAgICAgIC5ub3QoJ1tkYXRhLXByb2R1Y3RdJylcclxuICAgICAgICAgICAgLm5vdCgnLmxzYi1wcmV2aWV3JykuY2xpY2soZnVuY3Rpb24odCkge1xyXG4gICAgICAgICAgICAgICAgdC5wcmV2ZW50RGVmYXVsdCgpO1xyXG4gICAgICAgICAgICAgICAgdmFyIGhyZWYgPSB0aGlzLmhyZWY7XHJcbiAgICAgICAgICAgICAgICAkKFwiYm9keVwiKS5hZGRDbGFzcyhcImxpbmstdHJhbnNpdGlvblwiKTtcclxuICAgICAgICAgICAgICAgIHNldFRpbWVvdXQoZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgd2luZG93LmxvY2F0aW9uID0gaHJlZlxyXG4gICAgICAgICAgICAgICAgfSwgNTAwKVxyXG4gICAgICAgICAgICB9KVxyXG5cclxuICAgICAgICAkKFwiYm9keVwiKS5hZGRDbGFzcyhcImxvYWQtcGFnZVwiKTtcclxuICAgICAgICAkKFwiaHRtbCwgYm9keVwiKS5hbmltYXRlKHsgc2Nyb2xsVG9wOiAwIH0sIDEwMCk7XHJcblxyXG4gICAgICAgIC8vIFNUSUNLWSBIRUFERVJcclxuICAgICAgICBpZiAoJCgnLmhlYWRlcicpLmxlbmd0aCA+IDApIHtcclxuICAgICAgICAgICAgdmFyIGhlYWRlciA9ICQoJy5oZWFkZXInKSxcclxuICAgICAgICAgICAgICAgIHBvcyA9IDEyMjtcclxuICAgICAgICAgICAgJCh3aW5kb3cpLm9uKCdzY3JvbGwnLCBmdW5jdGlvbigpIHtcclxuICAgICAgICAgICAgICAgIHZhciBzY3JvbGwgPSAkKHdpbmRvdykuc2Nyb2xsVG9wKCk7XHJcbiAgICAgICAgICAgICAgICBpZiAoc2Nyb2xsID49IHBvcykge1xyXG4gICAgICAgICAgICAgICAgICAgIGhlYWRlci5hZGRDbGFzcygnc3RpY2t5Jyk7XHJcbiAgICAgICAgICAgICAgICAgICAgJCgnYm9keScpLmFkZENsYXNzKCdoZWFkZXItc3RpY2snKTtcclxuICAgICAgICAgICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgICAgICAgICAgaGVhZGVyLnJlbW92ZUNsYXNzKCdzdGlja3knKTtcclxuICAgICAgICAgICAgICAgICAgICAkKCdib2R5JykucmVtb3ZlQ2xhc3MoJ2hlYWRlci1zdGljaycpO1xyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9KTtcclxuICAgICAgICB9XHJcblxyXG4gICAgICAgICQoJy5oZWFkZXItdG9nZ2xlJykuY2xpY2soZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgICAgICQoJ2JvZHknKS50b2dnbGVDbGFzcygnbWVudS1vcGVuJyk7XHJcbiAgICAgICAgfSlcclxuXHJcbiAgICAgICAgJCgnLmhhcy1zdWInKS5lYWNoKGZ1bmN0aW9uKCkge1xyXG4gICAgICAgICAgICB2YXIgdCA9ICQodGhpcyk7XHJcbiAgICAgICAgICAgICQoJy5oYXMtc3ViJykuY2xpY2soZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgICAgICAgICB0LnRvZ2dsZUNsYXNzKCdzdWItb3BlbicpO1xyXG4gICAgICAgICAgICAgICAgJCgnLmhhcy1zdWInKS5ub3QodGhpcykucmVtb3ZlQ2xhc3MoJ3N1Yi1vcGVuJyk7XHJcbiAgICAgICAgICAgIH0pXHJcbiAgICAgICAgfSlcclxuXHJcbiAgICAgICAgJCgnLnNjcm9sbC1kb3duJykuZWFjaChmdW5jdGlvbigpIHtcclxuICAgICAgICAgICAgdmFyIHRhcmdldCA9ICQodGhpcykuZGF0YSgndGFyZ2V0Jyk7XHJcbiAgICAgICAgICAgICQodGhpcykuY2xpY2soZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgICAgICAgICAkKCdodG1sLCBib2R5JykuYW5pbWF0ZSh7XHJcbiAgICAgICAgICAgICAgICAgICAgc2Nyb2xsVG9wOiAkKHRhcmdldCkub2Zmc2V0KCkudG9wIC0gMTAwXHJcbiAgICAgICAgICAgICAgICB9LCA5MDApO1xyXG4gICAgICAgICAgICB9KVxyXG4gICAgICAgIH0pXHJcblxyXG4gICAgICAgIC8vIFNNT09USCBTQ1JPTExcclxuICAgICAgICAkKCcuc2Nyb2xsLXRvJykuY2xpY2soZnVuY3Rpb24oZXZlbnQpIHtcclxuICAgICAgICAgICAgaWYgKFxyXG4gICAgICAgICAgICAgICAgbG9jYXRpb24ucGF0aG5hbWUucmVwbGFjZSgvXlxcLy8sICcnKSA9PSB0aGlzLnBhdGhuYW1lLnJlcGxhY2UoL15cXC8vLCAnJykgJiZcclxuICAgICAgICAgICAgICAgIGxvY2F0aW9uLmhvc3RuYW1lID09IHRoaXMuaG9zdG5hbWVcclxuICAgICAgICAgICAgKSB7XHJcbiAgICAgICAgICAgICAgICB2YXIgdGFyZ2V0ID0gJCh0aGlzLmhhc2gpO1xyXG4gICAgICAgICAgICAgICAgdGFyZ2V0ID0gdGFyZ2V0Lmxlbmd0aCA/IHRhcmdldCA6ICQoJ1tuYW1lPScgKyB0aGlzLmhhc2guc2xpY2UoMSkgKyAnXScpO1xyXG4gICAgICAgICAgICAgICAgaWYgKHRhcmdldC5sZW5ndGgpIHtcclxuICAgICAgICAgICAgICAgICAgICBldmVudC5wcmV2ZW50RGVmYXVsdCgpO1xyXG4gICAgICAgICAgICAgICAgICAgICQoJ2h0bWwsIGJvZHknKS5hbmltYXRlKHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgc2Nyb2xsVG9wOiB0YXJnZXQub2Zmc2V0KCkudG9wIC0gNjBcclxuICAgICAgICAgICAgICAgICAgICB9LCA4MDAsIGZ1bmN0aW9uKCkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB2YXIgJHRhcmdldCA9ICQodGFyZ2V0KTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgaWYgKCR0YXJnZXQuaXMoXCI6Zm9jdXNcIikpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHJldHVybiBmYWxzZTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgfSBlbHNlIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICR0YXJnZXQuYXR0cigndGFiaW5kZXgnLCAnLTEnKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgfTtcclxuICAgICAgICAgICAgICAgICAgICB9KTtcclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH0pO1xyXG5cclxuICAgIH0gLy8gZW5kIG9mIGZ1bmNcclxuXHJcbiAgICAkKCcubW9kYWwnKS5vbignc2hvdy5icy5tb2RhbCcsIGZ1bmN0aW9uKGUpIHtcclxuICAgICAgICAkKCdodG1sJykuYWRkQ2xhc3MoJ21vZGFsLW9wZW4nKTtcclxuICAgICAgICAkKCdib2R5JykucmVtb3ZlQ2xhc3MoJ21lbnUtb3BlbicpO1xyXG4gICAgfSlcclxuXHJcbiAgICAkKCcubW9kYWwnKS5vbignaGlkZS5icy5tb2RhbCcsIGZ1bmN0aW9uKGUpIHtcclxuICAgICAgICAkKCdodG1sJykucmVtb3ZlQ2xhc3MoJ21vZGFsLW9wZW4nKTtcclxuICAgIH0pXHJcblxyXG5cclxufSkoKTtcclxuIl0sImZpbGUiOiJtYWluLmpzIn0=

//# sourceMappingURL=main.js.map
