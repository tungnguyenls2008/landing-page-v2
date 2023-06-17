(function ($) {
    'use strict';

const lang=$("#session-lang").attr('data-value');
    /*-------------------------------------------------------------------------------
       Detect mobile device
     -------------------------------------------------------------------------------*/

    var navbar = $('.js-navbar:not(.navbar-fixed)');


    $(window).on('load', function () {

        $('.loader').fadeOut(1000);
    });


    /*-------------------------------------------------------------------------------
      Navbar
    -------------------------------------------------------------------------------*/


    navbar.affix({
        offset: {
            top: 50
        }
    });


    navbar.on('affix.bs.affix', function () {
        if (!navbar.hasClass('affix')) {
            navbar.addClass('animated slideInDown');
        }
    });

    navbar.on('affixed-top.bs.affix', function () {
        navbar.removeClass('animated slideInDown');

    });

    $('.nav-mobile-list li a[href="#"]').on('click', function () {
        $(this).closest('li').toggleClass('current');
        $(this).closest('li').children('ul').slideToggle(200);
        return false;
    });


    /*-------------------------------------------------------------------------------
      Menu
    -------------------------------------------------------------------------------*/


    $('.navbar-toggle').on('click', function () {
        $('body').removeClass('menu-is-closed').addClass('menu-is-opened');
    });

    $('.close-menu, .click-capture').on('click', function () {
        $('body').removeClass('menu-is-opened').addClass('menu-is-closed');
        $('.menu-list ul').slideUp(300);
    });


    /*-------------------------------------------------------------------------------
      Owl Carousel
    -------------------------------------------------------------------------------*/


    if ($('.owl-carousel').length > 0) {

        $(".review-carousel").owlCarousel({
            responsive: {
                0: {
                    items: 1
                },
                720: {
                    items: 1,

                },
                1280: {
                    items: 1
                }
            },
            responsiveRefreshRate: 0,
            nav: true,
            navText: [],
            animateIn: 'fadeIn',
            dots: false
        });

        $(".project-carousel").owlCarousel({
            responsive: {
                0: {
                    items: 1
                },
                720: {
                    items: 1,

                },
                1280: {
                    items: 1
                }
            },
            autoHeight: true,
            nav: true,
            navText: [],
            loop: true,
            responsiveRefreshRate: 0,
            smartSpeed: 500,
            dots: false
        });

    }


    /*-------------------------------------------------------------------------------
      Full screen sections
    -------------------------------------------------------------------------------*/


    if ($('.pagepiling').length > 0) {

        $('.pagepiling').pagepiling({
            scrollingSpeed: 280,
            loopBottom: true,
            anchors: ['page1', 'page2', 'page3', 'page4', 'page5', 'page6', 'page7'],
            afterLoad: function (anchorLink, index) {
                if ($('.pp-section.active').scrollTop() > 0) {
                    $('.navbar').removeClass('navbar-white');
                } else {
                    $('.navbar').addClass('navbar-white');
                }

            }
        });


        /*-------------------------------------------------------------------------------
           Scroll into sections
        /-------------------------------------------------------------------------------*/


        $('.pp-scrollable').on('scroll', function () {
            var scrollTop = $(this).scrollTop();
            if (scrollTop > 0) {
                $('.navbar-2').removeClass('navbar-white');
            } else {
                $('.navbar-2').addClass('navbar-white');
            }
        });


        /*-------------------------------------------------------------------------------
           Scroller navigation
        /-------------------------------------------------------------------------------*/


        $('#pp-nav').remove().appendTo('body').addClass('white right-boxed hidden-xs');

        $('.pp-nav-up').on('click', function () {
            $.fn.pagepiling.moveSectionUp();
        });

        $('.pp-nav-down').on('click', function () {
            $.fn.pagepiling.moveSectionDown();
        });
    }


    /*-------------------------------------------------------------------------------
	  Change bacgkround on project section
	-------------------------------------------------------------------------------*/


    $('.project-box').on('mouseover', function () {
        var index = $('.project-box').index(this);
        $('.bg-changer .section-bg').removeClass('active').eq(index).addClass('active');
    });


    /*-------------------------------------------------------------------------------
      Ajax Forms
    -------------------------------------------------------------------------------*/


    if ($('.js-form').length) {
        $('.js-form').each(function () {
            $(this).validate({
                errorClass: 'error wobble-error',
                submitHandler: function (form) {
                    $("#btn_submit").attr('disabled', 'disabled');
                    $.ajax({
                        type: "POST",
                        url: "/contact",
                        data: $(form).serialize(),
                        success: function () {
                            $('#error').modal('hide');
                            $('#success').modal('show');
                            $("#btn_submit").removeAttr('disabled');
                        },

                        error: function () {
                            $('#success').modal('hide');
                            $('#error').modal('show');
                            $("#btn_submit").removeAttr('disabled');
                        }
                    });
                }
            });
        });
    }
// chat box
    $('.chat_button').on('click', function () {
        openChatBox();
    });
    $('.chat-send').on('click', function () {
        if ($("#MsgInput").val()){
            send();
        }else{
            var chatBody = document.getElementById("chatBody");

            var divClient = document.createElement("div");
            divClient.classList.add("chat_box_body_other");

            if (lang=='en'){
                divClient.innerHTML = 'You have to ask me out first!';
            }else{
                divClient.innerHTML = 'Bạn phải hỏi thì tôi mới trả lời được chứ!';
            }
            chatBody.append(divClient);
        }
    });
    $(document).on('keypress', function (e) {
        if (e.which == 13) {
            if ($("#MsgInput").is(':focus') && $("#MsgInput").val()){
                send();
            }else{
                var chatBody = document.getElementById("chatBody");

                var divClient = document.createElement("div");
                divClient.classList.add("chat_box_body_other");
                if (lang=='en'){
                    divClient.innerHTML = 'You have to ask me out first!';
                }else{
                    divClient.innerHTML = 'Bạn phải hỏi thì tôi mới trả lời được chứ!';
                }

                chatBody.append(divClient);
            }
        }
    });
    var ischatopen = false;
    var ele = document.getElementById("chatbar");

    function openChatBox() {
        if (ischatopen == false) {
            ele.classList.add("toggle");
            ischatopen = true;
            document.getElementById("chatOpen").classList.remove("fa-comments");
            document.getElementById("chatOpen").classList.add("fa-times");

        } else {
            ele.classList.remove("toggle");
            ischatopen = false;
            document.getElementById("chatOpen").classList.add("fa-comments");
            document.getElementById("chatOpen").classList.remove("fa-times");
        }
    }


    function send() {
        var chatBody = document.getElementById("chatBody");
        var Clientmsg = document.getElementById("MsgInput").value;
        document.getElementById('MsgInput').value = '';
        var divClient = document.createElement("div");
        var divOther = document.createElement("div");
        divClient.classList.add("chat_box_body_self");
        divOther.classList.add("loading-gif");
        divOther.classList.add("chat_box_body_other");

        divClient.innerHTML = Clientmsg;
        divOther.innerHTML = '<div class="double-bounce1"></div><div class="double-bounce2"></div>';

        chatBody.append(divClient);
        chatBody.append(divOther);
        chatBody.scrollTop = chatBody.scrollHeight;

//call chat here
        $.ajax({
            url: 'chat',
            data: {
                message: Clientmsg
            },
            method: 'POST',
            success: function (data) {
                $(".loading-gif").remove();
                var divBot = document.createElement("div");
                divBot.classList.add("chat_box_body_other");

                divBot.innerHTML = data;
                setTimeout(function () {
                    $('divBot').show();
                }, 5000);
                chatBody.append(divBot);
                chatBody.scrollTop = chatBody.scrollHeight;
            }
        });


    }


})(jQuery);
