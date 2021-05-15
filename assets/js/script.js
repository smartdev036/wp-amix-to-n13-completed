/**
 * This is script for index page
 */
gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

(function ($) {
  $(document).ready(function () {
    // Init scroller
    initScroll();
    function initScroll() {
      var CurrentScroll = 0;

      const scroller = document.querySelector("scroll");
      if (scroller) {
        const bodyScrollBar = Scrollbar.init(scroller, {
          damping: 0.1,
        });
        ScrollTrigger.scrollerProxy("scroll", {
          scrollTop(value) {
            if (arguments.length) {
              bodyScrollBar.scrollTop = value;
            }
            return bodyScrollBar.scrollTop;
          },
        });
        bodyScrollBar.track.xAxis.element.remove();
        bodyScrollBar.addListener(ScrollTrigger.update);
        ScrollTrigger.defaults({ scroller: scroller });
        bodyScrollBar.addListener((status) => {
          $(window).trigger("scroll");
          if (150 < status.offset.y) {
            $(".header").addClass("scrolled");
            var NextScroll = status.offset.y;
			
            if (NextScroll > CurrentScroll) {
              $(".header").addClass("hide");
			  $('.page-template-donate .sticky-donate-link').addClass('hide');
            } else {
              $(".header").removeClass("hide");
			  $('.page-template-donate .sticky-donate-link').removeClass('hide');
            }
            CurrentScroll = NextScroll;
          } else {
            $(".header").removeClass("scrolled").removeClass("hide");
          }
        });
        // Scroll To links
        $(document).on(
          "click touchend",
          ".sidebar a, .btn-scroll-link",
          function (e) {
            let target = $(this).attr("href");
            const targetEl = document.querySelector(target);
            const targetRect = targetEl.getBoundingClientRect();
            e.preventDefault();
            var topY =
              $(target).offset().top - $(".scroll-content").offset().top;
            gsap.to(bodyScrollBar, {
              duration: 1,
              scrollTo: {
                y: topY,
                autoKill: true,
              },
              offsetY: 80,
              ease: "power4",
            });
          }
        );
      }
    }
    initSlider();
    // Init Slider
    function initSlider() {
      $carousel = $(".slick-carousel");
      function setSlideVisibility() {
        //Find the visible slides i.e. where aria-hidden="false"
        var visibleSlides = $carousel.find(
          '.slick-slide__item[aria-hidden="false"]'
        );
        //Make sure all of the visible slides have an opacity of 1
        $(visibleSlides).each(function () {
          $(this).css("opacity", 1);
        });
        //Set the opacity of the first and last partial slides.
        $(visibleSlides).first().prev().css("opacity", 0);
      }
      $carousel.slick({
        arrows: false,
        dots: false,
        infinite: false,
        speed: 300,
        slidesToScroll: 1,
        variableWidth: true,
      });
      // Show half
      setSlideVisibility();
      $carousel.each(function () {
        $(this).slick("slickGoTo", 0);
        $(this).on("afterChange", function () {
          let $parent = $(this).closest(".slider-wrapper");
          let $curNum = $parent.find(".current-num");
          $curNum.text($(this).slick("slickCurrentSlide") + 1);
          setSlideVisibility();
        });
        $(this).on(
          "init reInit afterChange",
          function (event, slick, currentSlide, nextSlide) {
            //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
            let $navigator = $(this)
              .parent(".slider-wrapper")
              .find(".slider-navigator");
            var i = (currentSlide ? currentSlide : 0) + 1;
            let curText = ("0" + i).slice(-2);
            let totalText = ("0" + slick.slideCount).slice(-2);
            $navigator.text(curText + "/" + totalText);
          }
        );
      });
      $(".btn-slider").on("click", function () {
        let $wrapper = $(this).closest(".slider-wrapper");
        let $slider = $wrapper.find(".slick-carousel");
        if ($(this).hasClass("prev")) {
          $slider.slick("slickPrev");
        } else {
          $slider.slick("slickNext");
        }
      });
    }
    // Animations
    initAnimations();
    function initAnimations() {}

    // Init Popup
    initPopup();
    function initPopup() {
      // Init popup
      if ($(".popup").length > 0) {
        $(".popup-close").on("click", function () {
          let popup = $(this).closest(".popup");
          $(popup).removeClass("active");
        });
        $(".btn-popup").on("click", function () {
          let popup = $(this).attr("data-target");
          $(popup).addClass("active");
        });
      }
    }

    // Init Components
    initComponents();
    function initComponents() {
      // Init mobile menu dropdown
      let timer;
      $(".menu-item-has-children").on("click", function () {
        $(this).toggleClass("show");
      });
      $(".menu-item-has-children").on("mouseenter", function () {
        if (!$(this).hasClass("hover")) {
          $(".menu-item-has-children.hover").removeClass("hover");
          $(this).addClass("hover");
        }
      });
	  $(document).on("click", function(event) {
		  var $target = $(event.target);
		  if(!$target.closest(".menu-item.hover").length) {
			  $('.menu-item.hover').removeClass("hover");
		  }        
	  })
//       $(".menu-item-has-children .dropdown-menu").on("mouseleave", function () {
//         let $parent = $(this).closest(".menu-item-has-children");
//         $parent.removeClass("hover");
//       });
      // Init hamburger
      $(document).on("click", ".hamburger-btn", function () {
        $(".nav-menu").css("left", 0);
      });
      // Init hamburger close
      $(document).on("click", ".hamburger-close-btn", function () {
        $(".nav-menu").css("left", "-100vw");
      });
      // Init Accordion
      $(document).on("click", ".accordion-item__title", function () {
        let $parent = $(this).closest(".accordion-item");
        let $content = $parent.find(".accordion-item__content");
        $parent.toggleClass("active");
        $content.slideToggle();
      });
      // Hero video
      $(document).on("click", ".btn-mute", function () {
        let $video = $(this).closest(".hero-video").find("video");
        $video.prop("muted", true);
        let $controls = $(this).closest(".video-controls");
        $controls.removeClass("active");
      });
      $(document).on("click", ".btn-unmute", function () {
        let $video = $(this).closest(".hero-video").find("video");
        $video.prop("muted", false);
        let $controls = $(this).closest(".video-controls");
        $controls.addClass("active");
      });
      $(document).on("click", ".btn-play", function () {
        let $video = $(this).closest(".hero-video").find("video");
        $video.play();
      });

      // Ajax Get news by category
      function loadAjaxNews() {
        // update url with category
        let category = $("#news").attr("data-category");
        let paged = $("#news").attr("data-paged");
        let max_page = 0;
        let search = $("#news").attr("data-search");
        let url =
          window.location.origin +
          window.location.pathname +
          "?cat=" +
          category +
          "&search=" +
          search +
          "&paged=" +
          paged;
        window.history.pushState("", "", url);

        $.ajax({
          url: ajaxurl,
          type: "POST",
          data: {
            action: "loadAjaxNews",
            category,
            paged,
            search,
          },
          beforeSend: function () {
            $(".searched-news .single-news").remove();
            $(".searched-news").append(
              '<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>'
            );
          },
          success: function (res) {
            let json = $.parseJSON(res);
            let strHTML = json.output;
            max_page = json.max_page;
            $(".searched-news").html(strHTML);
            $(".page-navigator .current-page").html(paged);
            $(".page-navigator .total-page").html(max_page);
          },
          complete: function () {
            if (paged == 1) {
              $(".btn-pagination.prev").addClass("disabled");
            } else {
              $(".btn-pagination.prev").removeClass("disabled");
            }
            if (paged == max_page) {
              $(".btn-pagination.next").addClass("disabled");
            } else {
              $(".btn-pagination.next").removeClass("disabled");
            }
            $(".btn-category-filter").each(function () {
              if ($(this).attr("data-category") == category) {
                $(this).addClass("active");
              }
            });
          },
        });
      }
      if ($("body").hasClass("post-type-archive-news")) {
        loadAjaxNews();
      }
      $(document).on("click", ".btn-category-filter", function () {
        if ($(this).hasClass("active")) {
          $(this).removeClass("active");
          $("#news").attr("data-category", "10");
          loadAjaxNews();
        } else {
          let category = $(this).attr("data-category");
          $(".btn-category-filter.active").removeClass("active");
          $(this).addClass("active");
          if ($(this).hasClass("active")) {
            $("#news").attr("data-category", category);
            $("#news").attr("data-paged", 1);
            loadAjaxNews();
          }
        }
      });
      $(document).on("click", ".btn-pagination", function () {
        let current_page = $(".pagination .current-page").text();
        let max_page = $(".pagination .total-page").text();
        if ($(this).hasClass("prev")) {
          if (current_page > 1) current_page--;
        } else {
          if (current_page < max_page) current_page++;
        }
        $("#news").attr("data-paged", current_page);
        loadAjaxNews();
      });
      $(document).on("submit", "#search-form", function () {
        $("#news").attr("data-search", $("#news-search").val());
        loadAjaxNews();
        return false;
      });
		// Map module script
		$('.map-module .map').on('click', function() {
			$('.map iframe').css('pointer-events', 'auto');
		});
		$('.map-module .map').on('mouseleave', function() {
			$('.map iframe').css('pointer-events', 'none');
		});
    }
  });
})(jQuery);
