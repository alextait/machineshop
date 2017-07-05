var cd = cd || {};
cd.navigation = {
    menu: function() {
        var e = $("#menu"),
            a = $("#nav-toggle");
        a && a.on("click", function() {
            $(this).toggleClass("active"), e.toggleClass("menu-open")
        })
    },
    subMenu: function() {
        var e = $(".page-navigation "),
            a = $("#subnav-toggle");
        a && a.on("click", function() {
            e.toggleClass("open")
        })
    }
}, cd.carousels = {
    home: function() {
        new Swiper(".banner .swiper-container", {
            speed: 400,
            autoplay: 5e3,
            pagination: ".swiper-pagination",
            paginationClickable: !0,
            effect: "fade"
        })
    },
    projects: function() {
        $(window).width(), new Swiper(".project-carousel .swiper-container", {
            speed: 400,
            autoplay: 3e3,
            pagination: ".swiper-pagination",
            paginationClickable: !0,
            slidesPerView: 1,
            spaceBetween: 15,
            loop: !0,
            nextButton: ".icon-chevron-right",
            prevButton: ".icon-chevron-left"
        })
    },
    team: function() {
        var e = $(window).width(),
            a = 768 >= e ? 1 : 4,
            o = new Swiper(".team-carousel .swiper-container", {
                speed: 400,
                autoplay: 3e3,
                pagination: ".swiper-pagination",
                paginationClickable: !0,
                slidesPerView: a,
                spaceBetween: 15
            });
        cd.carousels.resize(o, 4)
    },
    resize: function(e, a) {
        $(window).resize(function() {
            var o = $(window).width();
            768 >= o ? e.params.slidesPerView = 1 : o > 768 && (e.params.slidesPerView = a)
        })
    }
}, cd.maps = {
    contact: function() {
        var e = new google.maps.LatLng(51.5339366, -.2613523),
            a = new google.maps.LatLng(51.53631, -.25786),
            o = new google.maps.LatLng(51.5352779, -.2617801),
            n = {
                center: o,
                zoom: 15,
                panControl: !1,
                zoomControlOptions: {
                    style: google.maps.ZoomControlStyle.SMALL,
                    position: google.maps.ControlPosition.RIGHT_BOTTOM
                },
                scrollwheel: !1,
                styles: [{
                    featureType: "landscape",
                    elementType: "labels",
                    stylers: [{
                        visibility: "off"
                    }]
                }, {
                    featureType: "transit",
                    elementType: "labels",
                    stylers: [{
                        visibility: "off"
                    }]
                }, {
                    featureType: "poi",
                    elementType: "labels",
                    stylers: [{
                        visibility: "off"
                    }]
                }, {
                    featureType: "water",
                    elementType: "labels",
                    stylers: [{
                        visibility: "off"
                    }]
                }, {
                    featureType: "road",
                    elementType: "labels.icon",
                    stylers: [{
                        visibility: "off"
                    }]
                }, {
                    stylers: [{
                        hue: "#00aaff"
                    }, {
                        saturation: -100
                    }, {
                        gamma: 2.15
                    }, {
                        lightness: 12
                    }]
                }, {
                    featureType: "road",
                    elementType: "labels.text.fill",
                    stylers: [{
                        visibility: "on"
                    }, {
                        lightness: 24
                    }]
                }, {
                    featureType: "road",
                    elementType: "geometry",
                    stylers: [{
                        lightness: 57
                    }]
                }]
            },
            i = new google.maps.Map(document.getElementById("map-canvas"), n),
            t = "../Images/pin.png",
            s = "../Images/tube.png",
            l = new google.maps.Marker({
                position: e,
                map: i,
                icon: t
            });
        google.maps.event.addListener(l, "click", function() {
            window.open("https://www.google.co.uk/maps/place/Machine+Shop/@51.5338802,-0.2612042,17z/data=!4m2!3m1!1s0x0000000000000000:0x353a6c6e9eb6f65f", "_blank")
        });
        var l = new google.maps.Marker({
            position: a,
            map: i,
            icon: s
        });
        google.maps.event.addListener(l, "click", function() {
            window.open("https://www.google.co.uk/maps/place/Harlesden/@51.5362828,-0.2576315,17z/data=!4m2!3m1!1s0x487611bff2f756ad:0xbc977b749092d7e7", "_blank")
        })
    }
}, cd.video = {
    player: function() {
        var e = $(".modal-close"),
            a = $(".modal.in");
        e.on("click", function() {
            player.pauseVideo()
        }), a.on("click", function() {
            player.pauseVideo()
        })
    }
}, $(function() {
    cd.navigation.menu(), cd.navigation.subMenu(), $("body").hasClass("home") && cd.carousels.home(), $("body").hasClass("project") && cd.carousels.projects(), $("body").hasClass("about") && cd.carousels.team(), $("body").hasClass("contact") && cd.maps.contact(), $("body").hasClass("project") && cd.video.player()
});