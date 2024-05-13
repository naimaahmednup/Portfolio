( function( $ ) {
    'use strict';

    var elementor = 0;
    if ( window.location.href.indexOf('/?elementor-preview=') > -1 ) {
        elementor = 1;
    }
    if ($('.trm-sidebar--defaulttrm-sidebar').length) {
      $('body').addClass('defaulttrm-sidebar');
    }
    if ($('.trm-app-frame-light').length) {
      $('body').addClass('ui-light');
    }

    /***************************

    swup

    ***************************/

    const options = {
      containers: ['#trm-dynamic-content'],
      animateHistoryBrowsing: true,
      linkSelector: '.trm-menu a:not([data-no-swup]), .trm-anima-link:not([data-no-swup])',
      animationSelector: '[class="trm-swup-animation"]',
      plugins: [new SwupBodyClassPlugin()]
    };
    if ( $('#trm-dynamic-content').length ) {
      const swup = new Swup(options);
    }

    // reinit
    document.addEventListener("swup:contentReplaced", function() {
      /*reinit cf7 forms validations*/
      const $cf7FormElement = document.querySelector('.wpcf7-form');
      if ($cf7FormElement && (typeof variable !== 'undefined')) {
        wpcf7.init($cf7FormElement);
      }

      /* menu custom link */
      $('.menu-item-type-custom').each(function () {
        $(this).find('> a').attr('data-no-swup', '');
      });

      /*add custom elementor css*/
      var body_classes = $('body').attr('class').split(' ');
      var page_class = '';
      var page_id = 0;

      for (var i=0; i<body_classes.length; i++) {
        if (body_classes[i].substring(0, 8) == "page-id-") {
          var page_class = body_classes[i];
          var page_id = parseInt(page_class.replace('page-id-', ''));
        } else if (body_classes[i].substring(0, 15) == "elementor-page-") {
          var page_class = body_classes[i];
          var page_id = parseInt(page_class.replace('elementor-page-', ''));
        }
      }
      var elementor_post_css_url = swup_url_data.url.replace('themes/trueman', '') + 'uploads/elementor/css/post-'+page_id+'.css'

      if ( !$("#elementor-post-"+page_id+"-css").length ) {
        $('<link id="elementor-post-'+page_id+'-css" href="'+elementor_post_css_url+'" rel="stylesheet">').appendTo("head");
      }

      /***************************

      preloader

      ***************************/

      $(".trm-scroll-container").animate({
        opacity: 1,
      }, 600);

      /***************************

      locomotive scroll

      ***************************/

      if ( ! elementor ) {
        var masonryFiltered = false;

        const scroll = new LocomotiveScroll({
          el: document.querySelector('#trm-scroll-container'),
          smooth: true,
          lerp: .1
        });
        document.addEventListener('swup:contentReplaced', (event) => {
          scroll.destroy()
        });
        $('.trm-grid-masonry').on( 'layoutComplete', function( event, laidOutItems ) {
          if ( masonryFiltered ) {
            scroll.scrollTo(0, {
              callback: function(){
                scroll.update();
                console.log('scroll update');
              }
            });
          }
        });

        var hash = window.location.hash;
        if ( hash && $('body').hasClass('single-post') ) {
          var targetHash = document.querySelector(hash);

          if(targetHash != null) {
            window.location.href = window.location.href.split('?')[0];
          }
        }

    	  const anchorLinks = document.querySelectorAll(
    		'a[href^=\\#]:not([href$=\\#])'
    	  );

    	  anchorLinks.forEach((anchorLink) => {
      		let hashval = anchorLink.getAttribute('href');
      		let target = document.querySelector(hashval);
      		anchorLink.addEventListener('click', (e) => {
      		  e.preventDefault();
      		  e.stopPropagation();

      		  anchorLinks.forEach((anchorLink) => {
      			anchorLink.classList.remove('active');
      		  });

      		  $('.trm-menu nav ul li').removeClass('current-menu-item');
      		  e.target.classList.add('active');

      		  scroll.scrollTo(target, {offset: -120});
      		});
    	  });
      }

    	/***************************

      menu

      ***************************/

      $('.trm-menu-btn').on('click', function() {
        $('.trm-menu-btn , .trm-right-side').toggleClass('trm-active');
      });
      $('.trm-menu ul li a').on('click', function() {
        $('.trm-menu-btn , .trm-right-side').removeClass('trm-active');
      });
      menu_mobile();
      $(window).on('resize', function(){
        menu_mobile();
      });
      function menu_mobile() {
        if ($(window).width() < 1200) {
          $('.trm-menu ul li.menu-item-has-children > a').on('click', function(){
        		if($(this).closest('li').hasClass('opened')) {
        			$(this).closest('li').removeClass('opened');
        		} else {
        			$(this).closest('li').addClass('opened');
        		}
        		return false;
        	});
        }
      }

      /***************************

      mode switch

      ***************************/

      var style_dir = $('.trm-mode-switcher-place').data( 'ui-dir' ) + '/assets/css/';
      var skin = $.cookie('skin');

      if ( skin == 'dark' ) {
        $('body').removeClass('ui-light');
        $('body').addClass('ui-dark');
    	}
    	if ( skin == 'light' ) {
        $('body').removeClass('ui-dark');
        $('body').addClass('ui-light');
    	}

      $('.trm-mode-switcher-place').html('');
      $('.trm-mode-switcher').clone().appendTo('.trm-mode-switcher-place');
      $('#trm-swich').on('change', function() {
        if (this.checked) {
          $.cookie('skin', 'dark', { expires: 7, path: '/' });
          $('body').removeClass('ui-light');
          $('body').addClass('ui-dark');
          $('.trm-hidden-switcher input').prop("checked", true);
          $('.trm-mode-swich-animation-frame').addClass('trm-active');
          $("#trm-scroll-container").animate({
            opacity: 0,
          }, 600, function() {
            setTimeout(function() {
              $("#trueman-ui-css").attr("href", style_dir+"ui-dark.css");
              $('.trm-mode-swich-animation').addClass('trm-active');
            }, 200);
            setTimeout(function() {
              $('.trm-mode-swich-animation-frame').removeClass('trm-active');
              $("#trm-scroll-container").animate({
                opacity: 1,
              }, 600);
            }, 1000);
          });
        } else {
          $.cookie('skin', 'light', { expires: 7, path: '/' });
          $('body').removeClass('ui-dark');
          $('body').addClass('ui-light');
          $('.trm-hidden-switcher input').prop("checked", false);
          $('.trm-mode-swich-animation-frame').addClass('trm-active');
          $("#trm-scroll-container").animate({
            opacity: 0,
          }, 600, function() {
            setTimeout(function() {
              $("#trueman-ui-css").attr("href", style_dir+"ui-light.css");
              $('.trm-mode-swich-animation').removeClass('trm-active');
            }, 200);
            setTimeout(function() {
              $('.trm-mode-swich-animation-frame').removeClass('trm-active');
              $("#trm-scroll-container").animate({
                opacity: 1,
              }, 600);
            }, 1000);
          });
        }
      });

      /***************************

      counters

      ***************************/

      $('.trm-counter').each(function() {
        $(this).prop('Counter', 0).animate({
          Counter: $(this).text()
        }, {
          duration: 2000,
          easing: 'linear',
          step: function(now) {
            $(this).text(Math.ceil(now));
          }
        });
      });

      /***************************

      projects masonry

      ***************************/

      if ( $('.trm-grid-masonry').length ) {
        var $gridMasonry = $('.trm-grid-masonry');
        $gridMasonry.imagesLoaded(function() {
          $gridMasonry.isotope({
            filter: '*',
            itemSelector: '.trm-grid-item',
            masonry: {
              // use element for option
              columnWidth: 1
            },
            transitionDuration: '.6s',
          });
        });
      }

      /***************************

      filter

      ***************************/

      $('.trm-filter a').on('click', function() {
        $('.trm-filter .trm-current').removeClass('trm-current');
        $(this).addClass('trm-current');

        masonryFiltered = true;

        var selector = $(this).data('filter');
        $gridMasonry.isotope({
          filter: selector
        });

        return false;
      });

      /***************************

      slideshow

      ***************************/

      var swiper = new Swiper('.trm-slideshow', {
        slidesPerView: 1,
        effect: 'fade',
        parallax: true,
        autoplay: true,
        speed: 1400,
      });

      /***************************

      testimonials slider

      ***************************/

      var swiper = new Swiper('.trm-testimonials-slider', {
        slidesPerView: 1,
        spaceBetween: 30,
        parallax: true,
        autoplay: false,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
        speed: 1400,
        pagination: {
          el: '.trm-testimonials-slider-pagination',
          clickable: true,
        },
        navigation: {
          nextEl: '.trm-testimonials-slider-next',
          prevEl: '.trm-testimonials-slider-prev',
        },
      });

      /***************************

      Magnific Popups

      ***************************/

      if(/\.(?:jpg|jpeg|gif|png)$/i.test($('.wp-block-gallery .blocks-gallery-item:first a').attr('href'))){
        $('.wp-block-gallery a').magnificPopup({
          gallery: {
              enabled: true
          },
          type: 'image',
          closeOnContentClick: false,
          fixedContentPos: false,
          closeBtnInside: false,
          callbacks: {
            beforeOpen: function() {
              // just a hack that adds mfp-anim class to markup
               this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
               this.st.mainClass = 'mfp-zoom-in';
            }
          },
        });
      }
      $('[data-magnific-inline], [href="#trm-order"]').magnificPopup({
        type: 'inline',
        overflowY: 'auto',
        preloader: false,
        callbacks: {
          beforeOpen: function() {
             this.st.mainClass = 'mfp-zoom-in';
          }
        },
      });
      $('[data-magnific-image]').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        fixedContentPos: false,
        closeBtnInside: false,
        callbacks: {
          beforeOpen: function() {
            // just a hack that adds mfp-anim class to markup
             this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
             this.st.mainClass = 'mfp-zoom-in';
          }
        },
      });
      if (!$('body').hasClass('elementor-page')) {
        $("a").each(function(i, el) {
          var href_value = el.href;
          if (/\.(jpg|png|gif)$/.test(href_value)) {
             $(el).magnificPopup({
                type: 'image',
                closeOnContentClick: true,
                fixedContentPos: false,
                closeBtnInside: false,
                callbacks: {
                  beforeOpen: function() {
                    // just a hack that adds mfp-anim class to markup
                     this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
                     this.st.mainClass = 'mfp-zoom-in';
                  }
                },
              });
          }
        });
      }
      $('[data-magnific-video]').magnificPopup({
        type: 'iframe',
        iframe: {
            patterns: {
                youtube_short: {
                  index: 'youtu.be/',
                  id: 'youtu.be/',
                  src: 'https://www.youtube.com/embed/%id%?autoplay=1'
                }
            }
        },
        preloader: false,
        fixedContentPos: false,
        callbacks: {
          markupParse: function(template, values, item) {
            template.find('iframe').attr('allow', 'autoplay');
          },
          beforeOpen: function() {
            // just a hack that adds mfp-anim class to markup
             this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
             this.st.mainClass = 'mfp-zoom-in';
          }
        },
      });
      $('[data-magnific-music]').magnificPopup({
        type: 'iframe',
        preloader: false,
        fixedContentPos: false,
        closeBtnInside: true,
        callbacks: {
          beforeOpen: function() {
            // just a hack that adds mfp-anim class to markup
             this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
             this.st.mainClass = 'mfp-zoom-in';
          }
        },
      });
      $('[data-magnific-gallery]').magnificPopup({
        gallery: {
            enabled: true
        },
        type: 'image',
        closeOnContentClick: false,
        fixedContentPos: false,
        closeBtnInside: false,
        callbacks: {
          beforeOpen: function() {
            // just a hack that adds mfp-anim class to markup
             this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
             this.st.mainClass = 'mfp-zoom-in';
          }
        },
      });

    });

} )( jQuery );
