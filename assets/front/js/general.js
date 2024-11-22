// Access Script
akCookie={create:function(name,value,days){var expires="";if(days){var expireDate=new Date;expireDate.setTime(expireDate.getTime()+days*24*60*60*1E3);expires="; expires="+expireDate.toGMTString()}document.cookie=name+"="+value+expires+"; path=/"},read:function(name){var nameEQ=name+"=";var ca=document.cookie.split(";");for(var i=0;i<ca.length;i++){var c=ca[i];while(c.charAt(0)==" ")c=c.substring(1,c.length);if(c.indexOf(nameEQ)==0)return c.substring(nameEQ.length,c.length)}return null},erase:function(name){akCookie.create(name,"",-1)}};$(function(){$("#accessControl").show();akAccess=function(){var sizes={normal:"93.7%",large:"100%",larger:"106.2%"};var contrasts=["normal","wob"];var chosenSize;var chosenContrast;var cookieValue=akCookie.read("meaLiveSite");if(cookieValue!==null){settings=cookieValue.split(" ");_setFontSize(settings[0]);_setContrast(settings[1])}else{$("input#font-normal").addClass("current");$("input#contrast-normal").addClass("current")}function _setFontSize(size){$("body").css("font-size",sizes[size]);for(key in sizes)if(size===key)chosenSize=key;if(!chosenSize)chosenSize="normal";$("#font-"+chosenSize).addClass("current")}function _setContrast(contrast){chosenContrast=contrast;if(!contrast in contrasts)contrast="normal";if(contrast==="normal")$("body").removeClass(contrasts.join(" "));else $("body").addClass(contrast);$("input.contrastChanger").each(function(){$(this).removeClass("current")});$("input#contrast-"+chosenContrast).addClass("current")}function _save(){akCookie.create("meaLiveSite",chosenSize+" "+chosenContrast,2)}return{handleFontSizeEvent:function(size){var varFontSize=size.split("_")[size.split("_").length-1];_setFontSize(varFontSize);_save();return false},handleContrastEvent:function(contrast){var varContrastSize=contrast.split("_")[contrast.split("_").length-1];_setContrast(varContrastSize);_save();return false}}}();$("#accessControl input.fontScaler").click(function(){akAccess.handleFontSizeEvent($(this).attr("id"));$("#accessControl input.fontScaler").each(function(){$(this).removeClass("current")});$(this).addClass("current");return false});$("#accessControl input.contrastChanger").click(function(){akAccess.handleContrastEvent($(this).attr("id"))})});


$(document).ready(function(){

	$('section#photos-videos').addClass('photo-is-live');
	$('section.photos-videos ul.tab-titles li:first-child').click(function(e){
		e.preventDefault();
		$(this).parents('.photos-videos').addClass('photo-is-live');
		return false;
		  });
		$('section.photos-videos ul.tab-titles li:nth-child(2)').click(function(e){
		e.preventDefault();
		$(this).parents('.photos-videos').removeClass('photo-is-live');
		return false;
		  });


	function contentspacenew() {
	    var windwidth = $(window).width();
	    var containerwidth = $('.container').outerWidth();
	    var contentlrspace = (windwidth - containerwidth) / 2;
	    $('.left-spacepadd').css('padding-left', contentlrspace);
	    $('.right-spacepadd').css('padding-right', contentlrspace);
	}

	if ($(window).width() > 767) {
		contentspacenew();
	}


	if ($(window).width() < 992) { 
		$('table.table.table-bordered').closest('div').addClass('table-responsive');
		// $('table.table.table-bordered').addClass('table-responsive-scroll');
	}

	$('.rightMenu ul li:first-child a').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	        var target = $(this.hash);
	        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	        if (target.length) {
	            $('html, body').animate({
	                scrollTop: target.offset().top - 73
	            }, 1000);
	            return false;
	        }
	    }
	});


	$("li.contrast-main > a").click(function() {
		event.preventDefault();
    	event.stopPropagation();
	    $(this).next().slideToggle(250);
	});

	$(".fixed-sidebar-toggle").click(function() {
		event.preventDefault();
    	event.stopPropagation();
	    $(this).parents('.bannerNavLink').toggleClass('sidebar-menu-main');
	});


	$( ".fixed-sidebar-toggle" ).hover(function() {
	  	$(this).parents('.bannerNavLink').toggleClass('tooltip-main');
	});

	// When any accordion title is clicked...
	$(".accordion__title").click(function() {
	  const $accordion_wrapper = $(this).parent();
	  const $accordion_content = $(this).parent().find(".accordion__content").first();
	  const $accordion_open = "accordion--open";


	  // If this accordion is already open
	  if ($accordion_wrapper.hasClass($accordion_open)) {
	    $accordion_content.slideUp();                     // Close the content.
	    $accordion_wrapper.removeClass($accordion_open);  // Remove the accordionm--open class.
	  }
	  // If this accordion is not already open
	  else {
	    $accordion_content.slideDown();                 // Show this accordion's content.
	    $accordion_wrapper.addClass($accordion_open);   // Add the accordion--open class.
	  }
	});


	// $("table i").removeClass("fa-download").addClass("fa-cloud-download");

	$('.cms p').each(function() {
	    var $p = $(this),
	        txt = $p.html();
	    if (txt=='&nbsp;') {
	        $p.remove();   
	    }
	});

	/*===== Max Height =====*/
	var max = -1;
    $('.dLoans-inner .content').each(function() {
        var h = $(this).outerHeight(); 
        max = h > max ? h : max;
    });
    $('.dLoans-inner .content').css('height',max);


	/*===== Sticky Header Function =====*/
	function stickyHeader() {
		var headerHeight = $('header').innerHeight();
		if ($(window).scrollTop() > 0) {
			$('header').addClass('stickyHeader')
		}
		else {
			$('header').removeClass('stickyHeader')
		}
	}
	stickyHeader();

	jQuery(window).on('scroll', function(event) {	
		stickyHeader();
	});

	$('.menu-close').on('click', function(event){
		event.preventDefault();
		$('.navbar-toggler').trigger('click')
	});

	$('.navbar-toggler').on('click', function(){
		$('body').toggleClass('overflow-hidden');
	});

	//banner
	if ($('.banner').length) {
		const swiper = new Swiper(".bannerSlider .swiper-container", {
			direction: 'horizontal',
			loop: true,
			mousewheel: false,
			spaceBetween: 10,
            navigation: {
	          nextEl: ".bannerSliderNavNext",
	          prevEl: ".bannerSliderNavPrev",
	        },
	        breakpoints: { 
				0: { 
					direction: 'horizontal', 
				},
				768: { 
					direction: 'horizontal', 
				}
			}		
		});
	}
	const sliderThumbs = new Swiper('.slider__thumbs .swiper-container', { 
		direction: 'vertical', 
		loop: false,
		slidesPerView: 15, 
		spaceBetween: 0, 
		navigation: { 
			nextEl: '.slider__next', 
			prevEl: '.slider__prev' 
		},
		freeMode: true, 
		breakpoints: { 
			0: { 
				direction: 'horizontal', 
			},
			768: { 
				direction: 'vertical', 
			}
		}
	});
	const sliderImages = new Swiper('.slider__images .swiper-container', { 
		direction: 'vertical', 
		slidesPerView: 3, 
		centeredSlides: true,
		loop: false,
		spaceBetween: 0, 
		mousewheel: true, 
		navigation: { 
			nextEl: '.slider__next', 
			prevEl: '.slider__prev' 
		},
		grabCursor: true, 
		thumbs: { 
			swiper: sliderThumbs 
		},
		breakpoints: { 
			0: { 
				direction: 'horizontal', 
				slidesPerView: 1,
				height : window.innerHeight
			},
			768: { 
				direction: 'vertical', 
			}
		}
	});


	if ($(window).width() < 1200) {
		$("ul#nav > li").prependTo(".headerSideBar ul.list-unstyled");
		$('section.headerSideBar ul.list-unstyled > li').each(function() {
		    const el = $(this);
		    if(el.find('ul').length);
		    el.addClass('inner-menu');
		});
	}
	$("section.headerSideBar .close-btn").click(function() {
        $("body").removeClass("activeMobNav");
        $('.hamburger').trigger('click');
        if($(this).next("ul.list-unstyled").find("li.inner-menu > a").hasClass("inner-nav-subopen")){
		   	$('a.inner-nav-subopen').removeClass('inner-nav-subopen');
		   	$(this).next("ul.list-unstyled").find("li.inner-menu > a").next("ul").slideUp();
		}
    });

	// Header SideBar
    if($('.headerSideBar').length){
    	$('.hamburger').on('click', function(){
    		event.preventDefault();
    		event.stopPropagation();
    		$(this).stop().toggleClass('active');
    		$('.headerSideBar').stop().toggleClass('active');
    		$("body").toggleClass('sidebar-open');
    	});
    	$('.headerSideBar').on('click', function(){
    		event.stopPropagation();
    	});
    }

    $( "section.headerSideBar ul.list-unstyled li.inner-menu" ).has( "ul" ).addClass('sidebar-has-dropdown');

    $("section.headerSideBar ul.list-unstyled li.inner-menu.sidebar-has-dropdown > a").click(function(){
	    $(this).parent('li.inner-menu.sidebar-has-dropdown').siblings('li.inner-menu.sidebar-has-dropdown').find('.inner-menu-toggle').removeClass('inner-nav-subopen');
	    $(this).parent('li.inner-menu.sidebar-has-dropdown').siblings('li.inner-menu.sidebar-has-dropdown').find('ul').slideUp(250);
	    $(this).next().slideToggle(250);
	    $(this).toggleClass('inner-nav-subopen');
	    return false;
	});

    $('body').on('click', function(){
    	if($('.hamburger').hasClass('active')){
	    	$('.hamburger').trigger('click')
    	}
    });

    $(".rightMenu ul li.font-manager > a").click(function(){
    	event.preventDefault();
    	event.stopPropagation();
	    $(this).next('ul').slideToggle(250);
	    return false;
	});

	// Search
	$('.search-toggle').addClass('closed');
		$('.search-toggle .search-icon').click(function(e) {
		  if ($('.search-toggle').hasClass('closed')) {
		    $('.search-toggle').removeClass('closed').addClass('opened');
		    $('.search-toggle, .search-container').addClass('opened');
		    $('#search-terms').focus();
		  } else {
		    $('.search-toggle').removeClass('opened').addClass('closed');
		    $('.search-toggle, .search-container').removeClass('opened');
		}
	});

	// Tab
	if( $(".tabSection").length) {
		$('.tabBtn a').click(function(){
            $('.tabBtn a').removeClass('activelink');
            $(this).addClass('activelink');
            var tagid = $(this).data('tag');
            $('.tabDetials').removeClass('active').addClass('hide');
            $('#'+tagid).addClass('active').removeClass('hide');
        });
    };

    $('body').click(function() {
		$('.rightMenu ul li.font-manager>ul').slideUp();
		$('.rightMenu ul li.contrast-main ul.fontResize').slideUp();
	});

	if($('.customScroll').length){
        $(".customScroll").mCustomScrollbar({
          theme:"dark",
          mouseWheelPixels: 80
        });
	}

	if($('.customScroll').length){
        $(".customScrollNew").mCustomScrollbar({
          theme:"dark",
          mouseWheelPixels: 80
        });
	}

	if($('.customScrollNew2').length){
        $(".customScrollNew2").mCustomScrollbar({
          theme:"light",
          mouseWheelPixels: 80
        });
	}

	if($('.table-responsive-scroll').length){
        $(".table-responsive-scroll").mCustomScrollbar({
          	theme:"dark",
          	axis:"x",
      		setLeft:"200px"
        });
	}

	// Fancybox Config
	$('[data-fancybox="gallery"]').fancybox({
	  buttons: [
	    "slideShow",
	    "thumbs",
	    "zoom",
	    "fullScreen",
	    "share",
	    "close"
	  ],
	  loop: false,
	  protect: true
	});


    // Footer Logo
    if( $(".logoSection").length) {
    	var swiper = new Swiper(".logoSliderInner", {
    		loop:true,
	        slidesPerView: 5,
	        spaceBetween: 10,
	        navigation: {
	          nextEl: ".logoNavNext",
	          prevEl: ".logoNavPrev",
	        },
	        breakpoints: {
	        	991:{
	        		slidesPerView: 5,
		            spaceBetweenSlides: 20
	        	},
		        768: {
		            slidesPerView: 4,
		            spaceBetweenSlides: 20
		        },
		        575: {
		            slidesPerView: 2,
		            spaceBetweenSlides: 20
		        },
		        278:{
		        	slidesPerView: 1,
		            spaceBetweenSlides: 0
		        }
    		}
      	});
    }



    if( $("section.logoSection.microfinance-congress-logosection").length) {
    	var swiper = new Swiper("section.logoSection.microfinance-congress-logosection .microfinance-congress-logosection-inner", {
    		loop:true,
	        slidesPerView: 5,
	        spaceBetween: 10,
	        navigation: {
	          nextEl: ".logoNavNext-microfinance-congress-next",
	          prevEl: ".logoNavPrev-microfinance-congress-prev",
	        },
	        breakpoints: {
	        	991:{
	        		slidesPerView: 5,
		            spaceBetweenSlides: 20
	        	},
		        768: {
		            slidesPerView: 4,
		            spaceBetweenSlides: 20
		        },
		        575: {
		            slidesPerView: 3,
		            spaceBetweenSlides: 20
		        },
		        278:{
		        	slidesPerView: 1,
		            spaceBetweenSlides: 20
		        }
    		}
      	});
    }



	if($('.social-media').length){
		var socialSwiper = new Swiper(".social-media-slider", {
			loop:false,
			slidesPerView: 4,
			spaceBetween: 15,
			navigation: {
				nextEl: ".socialNavNext",
				prevEl: ".socialNavPrev",
			},
			breakpoints: {
				991:{
					slidesPerView: 4,
				},
				768: {
					slidesPerView: 2,
				},
				575: {
					slidesPerView: 2,
				},
				320:{
					slidesPerView: 1,
				}
			}
		});
	}
    if( $(".tabSection").length) {
    	var swiper = new Swiper(".tabDescriptionInner", {
    		loop:true,
	        slidesPerView: 3,
	        spaceBetween: 0,
	        speed:500,
	        autoplay: 
		    {
		      delay: 3000,
		    },
	        navigation: {
	          nextEl: ".tabNavNext",
	          prevEl: ".tabNavPrev",
	        },
	        breakpoints: {
	        	991:{
	        		slidesPerView: 3,
		            spaceBetweenSlides: 20
	        	},
		        768: {
		            slidesPerView: 2,
		            spaceBetweenSlides: 20
		        },
		        270: {
		            slidesPerView: 1,
		            spaceBetweenSlides: 20
		        }
    		}
      	});
    }

    if( $(".tabSection").length) {
    	var swiper = new Swiper(".tabDescriptionInner-second", {
    		loop:true,
	        slidesPerView: 3,
	        spaceBetween: 0,
	        speed:500,
	        autoplay: 
		    {
		      delay: 3000,
		    },
	        navigation: {
	          nextEl: ".tabNavNext-second",
	          prevEl: ".tabNavPrev-second",
	        },
	        breakpoints: {
	        	991:{
	        		slidesPerView: 3,
		            spaceBetweenSlides: 20
	        	},
		        768: {
		            slidesPerView: 2,
		            spaceBetweenSlides: 20
		        },
		        270: {
		            slidesPerView: 1,
		            spaceBetweenSlides: 20
		        }
    		}
      	});
    }



    if( $(".press-releases").length) {
    	var swiper = new Swiper(".press-releases-listing", {
    		loop:false,
	        slidesPerView: 3,
	        spaceBetween: 10,
	        speed:1000,
	        navigation: {
	          nextEl: ".press-releases-slider-next",
	          prevEl: ".press-releases-slider-prev",
	        },
	        breakpoints: {
	        	1199:{
	        		slidesPerView: 3,
		            spaceBetweenSlides: 20
	        	},
		        768: {
		            slidesPerView: 2,
		            spaceBetweenSlides: 20
		        },
		        320:{
		        	slidesPerView: 1,
		            spaceBetweenSlides: 20
		        }
    		}
      	});
    }


    if( $(".speakers-slider").length) {
    	var swiper = new Swiper(".speakers-slider-main-inner", {
    		loop:true,
	        slidesPerView: 4,
    		mousewheel: true,
	        spaceBetween: 0,
	        speed:1000,
	        navigation: {
	          nextEl: ".speakers-slider-main-next",
	          prevEl: ".speakers-slider-main-prev",
			  dynamicBullets: true,
	        },
			
	        breakpoints: {
	        	991:{
	        		slidesPerView: 3,
		            spaceBetweenSlides: 0
	        	},
		        768: {
		            slidesPerView: 2,
		            spaceBetweenSlides: 0,
		            pagination: {
				      	el: '.slider__pagination',
				      	clickable: true,
				    }
		        },
		        575: {
		            slidesPerView: 2,
		            spaceBetweenSlides: 0,
		            pagination: {
				      	el: '.slider__pagination',
				      	clickable: true,
				    }
		        },
		        320:{
		        	slidesPerView: 1,
		            spaceBetweenSlides: 0,
		            pagination: {
				      	el: '.slider__pagination',
				      	clickable: true,
				    }
		        }
    		}
      	});
    }


    // plan swiper

	if( $(".plan-content").length) {
    	var swiper = new Swiper(".plan-content .swiper-container", {
    		loop:false,
	        slidesPerView: 4,
	        spaceBetween: 25,
	        speed:2000,
	        autoplay: 
		    {
		      delay: 2000,
		    },
            navigation: {
	          nextEl: ".plan-slider-main-next",
	          prevEl: ".plan-slider-main-prev",
			  dynamicBullets: true,
	        },
           	breakpoints: {
	        	1199:{
	        		slidesPerView: 4,
		            spaceBetweenSlides: 20
	        	},
		        991: {
		            slidesPerView: 3,
		            spaceBetweenSlides: 20
		        },
				768: {
		            slidesPerView: 2,
		            spaceBetweenSlides: 20,
		            pagination: {
				      	el: '.plan-slider-pagination',
				      	clickable: true,
				    }
		        },
				575: {
		            slidesPerView: 2,
		            spaceBetweenSlides: 0,
		            pagination: {
				      	el: '.plan-slider-pagination',
				      	clickable: true,
				    }
		        },
		        320:{
		        	slidesPerView: 1,
		            spaceBetweenSlides: 20,
		            pagination: {
				      	el: '.plan-slider-pagination',
				      	clickable: true,
				    }
		        }
    		}
      	});
    }


    if( $(".latest-news").length) {
    	var swiper = new Swiper(".latest-news-listing", {
    		loop:true,
	        slidesPerView: 3,
	        spaceBetween: 10,
	        speed:1000,
	        navigation: {
	          nextEl: ".latest-news-slider-next",
	          prevEl: ".latest-news-slider-prev",
	        },
	        breakpoints: {
	        	1199:{
	        		slidesPerView: 3,
		            spaceBetweenSlides: 20
	        	},
		        768: {
		            slidesPerView: 2,
		            spaceBetweenSlides: 20
		        },
		        320:{
		        	slidesPerView: 1,
		            spaceBetweenSlides: 20
		        }
    		}
      	});
    }

    if( $(".press-coverage").length) {
    	var swiper = new Swiper(".press-coverage-listing", {
    		loop:true,
	        slidesPerView: 3,
	        spaceBetween: 29,
	        speed:1000,
	        navigation: {
	          nextEl: ".press-coverage-slider-next",
	          prevEl: ".press-coverage-slider-prev",
	        },
	        breakpoints: {
	        	1199:{
	        		slidesPerView: 3,
		            spaceBetweenSlides: 20
	        	},
		        768: {
		            slidesPerView: 2,
		            spaceBetweenSlides: 20
		        },
		        320:{
		        	slidesPerView: 1,
		            spaceBetweenSlides: 20
		        }
    		}
      	});
    }

	if( $(".accordion").length){
		$(".accTrigger").click(function() {
	        $('.accTrigger').not($(this)).removeClass('active');
	        $('.accordDetail').not($(this).next()).slideUp();
	        $(this).toggleClass('active');
	        $(this).next().slideToggle(250);
	    }).filter(':first').click();
	    $(".accordion").first().find(".accTrigger").addClass("active");
	    $(".accordion").first().find(".accordDetail").slideDown();
    };

    

	if ($(window).width() > 991) { 
	    $('section.debenture-trustees .tab-content-main').slideUp();
		$('section.debenture-trustees .tab-content-main:first').slideDown();
		$('section.debenture-trustees .tabing-main ul.tab-titles li:first').addClass('tab-active');

		$('section.debenture-trustees .tabing-main ul.tab-titles li a').on('click', function(event){
		  event.preventDefault();
		  $('section.debenture-trustees .tabing-main ul.tab-titles li').removeClass('tab-active');
		  $(this).parent().addClass('tab-active');
		  $('section.debenture-trustees .tab-content-main').slideUp();
		  $($(this).attr('href')).slideDown();
		});
	}
	if ($(window).width() < 992) {
		$("section.debenture-trustees .tabing-main .mobile-tab-title").click(function(event) {
			$('section.debenture-trustees .tabing-main .tab-content-main:first-child > .tabContent').not($(this).next()).slideUp();
			event.preventDefault();
		    $('section.debenture-trustees .tabing-main .mobile-tab-title').not($(this)).removeClass('active');
		    $('section.debenture-trustees .tabing-main .tab-content-main > .tabContent').not($(this).next()).slideUp();
		    $(this).toggleClass('active');
		    $(this).next().slideToggle(250);
		}).filter(':first').click();
	};

	if ($(window).width() > 991) { 
	    $('section.publications .tab-content-main').slideUp();
		$('section.publications .tab-content-main:first').slideDown();
		$('section.publications .tabing-main ul.tab-titles li:first').addClass('tab-active');
		$('section.publications .tabing-main ul.tab-titles li a').on('click', function(event){
		  event.preventDefault();
		  $('section.publications .tabing-main ul.tab-titles li').removeClass('tab-active');
		  $(this).parent().addClass('tab-active');
		  $('section.publications .tab-content-main').slideUp();
		  $($(this).attr('href')).slideDown();
		});
	}
	if ($(window).width() < 992) {
		$("section.publications .tabing-main .mobile-tab-title").click(function(event) {
			 $('section.publications .tabing-main .tab-content-main:first-child > .tabContent').not($(this).next()).slideUp();
			event.preventDefault();
		    $('section.publications .tabing-main .mobile-tab-title').not($(this)).removeClass('active');
		    $('section.publications .tabing-main .tab-content-main > .tabContent').not($(this).next()).slideUp();
		    $(this).toggleClass('active');
		    $(this).next().slideToggle(250);
		}).filter(':first').click();
	};


	// media tabbing
	if ($(window).width() > 991) { 
	    $('section.media .tab-content-main').slideUp();
		$('section.media .tab-content-main:first').slideDown();
		$('section.media .tabing-main ul.tab-titles li:first').addClass('tab-active');
		$('section.media .tabing-main ul.tab-titles li a').on('click', function(event){
		  event.preventDefault();
		  $('section.media .tabing-main ul.tab-titles li').removeClass('tab-active');
		  $(this).parent().addClass('tab-active');
		  $('section.media .tab-content-main').slideUp();
		  $($(this).attr('href')).slideDown();
		});
	}
	if ($(window).width() < 992) {
		$("section.media .mobile-tab-title").click(function(event) {
			$('section.media  .tab-content-main:first-child > .tabContent').not($(this).next()).slideUp();
			event.preventDefault();
		    $('section.media .tabing-main .mobile-tab-title').not($(this)).removeClass('active');
		    $('section.media .tabing-main .tab-content-main > .tabContent').not($(this).next()).slideUp();
		    $(this).toggleClass('active');
		    $(this).next().slideToggle(250);
		}).filter(':first').click();
	};


	$("section.disclosures-announcements .accordian-listing .accordian-list .accordian-title").click(function() {
        $('section.disclosures-announcements .accordian-listing .accordian-list .accordian-title').not($(this)).removeClass('active');
        $('.accordian-content').not($(this).next()).slideUp();
        $(this).toggleClass('active');
        $(this).next().slideToggle(250);
    }).filter(':first').click();
    $("section.disclosures-announcements .accordian-listing .accordian-list").first().find(".accordian-title").addClass("active");
    $("section.disclosures-announcements .accordian-listing .accordian-list").first().find(".accordian-content").slideDown();


    $(".ecosyTitle").click(function() {
        $('.ecosyTitle').not($(this)).removeClass('active');
        $('.ecosyContent').not($(this).next()).slideUp();
        $(this).toggleClass('active');
        $(this).next().slideToggle(250);
    }).filter(':first').click();
    $("section.ecosystemAccodianWrap .ecosy-listing").first().find(".ecosyTitle").addClass("active");
    $("section.ecosystemAccodianWrap .ecosy-listing").first().find(".ecosyContent").slideDown();


    $('header ul.mainmenu > li > .megamenu').parents('li').addClass('has-megamenu');


	if ($(window).width() > 991) { 
	    $('section.photos-videos .tab-content-main').slideUp();
		$('section.photos-videos .tab-content-main:first').slideDown();
		$('section.photos-videos .tabing-main ul.tab-titles li:first').addClass('tab-active');

		$('section.photos-videos .tabing-main ul.tab-titles li a').on('click', function(event){
		  event.preventDefault();
		  $('section.photos-videos .tabing-main ul.tab-titles li').removeClass('tab-active');
		  $(this).parent().addClass('tab-active');
		  $('section.photos-videos .tab-content-main').slideUp();
		  $($(this).attr('href')).slideDown();
		});
	}
	if ($(window).width() < 992) {
		$("section.photos-videos .tabing-main .mobile-tab-title").click(function(event) {
			$('section.photos-videos .tabing-main .tab-content-main:first-child > .tabContent').not($(this).next()).slideUp();
			event.preventDefault();
		    $('section.photos-videos .tabing-main .mobile-tab-title').not($(this)).removeClass('active');
		    $('section.photos-videos .tabing-main .tab-content-main > .tabContent').not($(this).next()).slideUp();
		    $(this).toggleClass('active');
		    $(this).next().slideToggle(250);
		}).filter(':first').click();
	};

	if ($(window).width() > 991) { 
	    $('section.complaint .tab-content-main').slideUp();
		$('section.complaint .tab-content-main:first').slideDown();
		$('section.complaint .tabing-main ul.tab-titles li:first').addClass('tab-active');

		$('section.complaint .tabing-main ul.tab-titles li a').on('click', function(event){
		  event.preventDefault();
		  $('section.complaint .tabing-main ul.tab-titles li').removeClass('tab-active');
		  $(this).parent().addClass('tab-active');
		  $('section.complaint .tab-content-main').slideUp();
		  $($(this).attr('href')).slideDown();
		});
	}
	if ($(window).width() < 992) {
		$("section.complaint .tabing-main .mobile-tab-title").click(function(event) {
			$('section.complaint .tabing-main .tab-content-main:first-child > .complaint-inner').not($(this).next()).slideUp();
			event.preventDefault();
		    $('section.complaint .tabing-main .mobile-tab-title').not($(this)).removeClass('active');
		    $('section.complaint .tabing-main .tab-content-main > .complaint-inner').not($(this).next()).slideUp();
		    $(this).toggleClass('active');
		    $(this).next().slideToggle(250);
		}).filter(':first').click();
	};

	if ($(window).width() > 1199) { 
		$('.product-tabing-parent .all-product-content .product-content-main').slideUp();
		$('.product-tabing-list').each(function(){
			$(this).find('.product-tabing-parent .all-product-content .product-content-main:first').slideDown();
			$(this).find('.product-tabing-parent .product-tabing-ul ul li:first').addClass('tab-active');
		})
		

		$('.product-tabing-parent .product-tabing-ul ul li a').on('click', function(event){
		  event.preventDefault();
		  $(this).parents('.product-tabing-parent').find('.product-tabing-ul ul li').removeClass('tab-active');
		  $(this).parent().addClass('tab-active');
		  $(this).parents('.product-tabing-parent').find('.all-product-content .product-content-main').slideUp();
		  $($(this).attr('href')).slideDown();
		});
		
	}
	if ($(window).width() < 1200) {
		$(".product-tabing-parent .all-product-content .product-content-main .mobile-tab-title").click(function(event) {
			$('.product-tabing-parent .all-product-content .product-content-main:first-child > .content-detail').not($(this).next()).slideUp();
			event.preventDefault();
			$('.product-tabing-parent .all-product-content .product-content-main .mobile-tab-title').not($(this)).removeClass('active');
			$('.product-tabing-parent .all-product-content .product-content-main > .content-detail').not($(this).next()).slideUp();
			$(this).toggleClass('active');
			$(this).next().slideToggle(250);
		});
	};

	$('section.photos-videos .tabContent .video-cards .video-card > a').fancybox({});


	// if( $("section.zig-zag-section").length){
	//    $('section.zig-zag-section .acc-content').hide();
	//    $("section.zig-zag-section .acc-content:first").show(); 
	//    $("section.zig-zag-section .acc-title:first").addClass("active");	
	//    $('section.zig-zag-section .acc-title').click(function(){
	// 	  if ($(this).hasClass('active')) {
	// 		   $(this).removeClass('active');
	// 		   $(this).next().slideUp();
	// 	  } else {
	// 		  if ($('body').hasClass('desktop')) {
	// 		   $('section.zig-zag-section .acc-title').removeClass('active');
	// 		   $('section.zig-zag-section .acc-content').slideUp();
	// 		  }
	// 		   $(this).addClass('active');			   
	// 		   $(this).next().slideDown();
	// 	  }
	// 	  return false;
	//    });
	// };


	$("section.zig-zag-section .accordian-main .acc-title").click(function() {
        $('section.zig-zag-section .accordian-main .acc-title').not($(this)).removeClass('active');
        $('section.zig-zag-section .accordian-main .acc-content').not($(this).next()).slideUp();
        $(this).toggleClass('active');
        $(this).next().slideToggle(250);
    });

	// $('video').click(function(){
	// 	$(this).parents(".video-wrap").toggleClass('play');
	//     this[this.paused ? 'play' : 'pause']();
	// });


	//vertical menu
    if($('.swavalamban-prabhav').length){
    	
    	// var removeClass = true;
		$(".menu-logo").click(function(e) {
		  $(".menu-content").toggleClass('active-menu');
		  $('body').toggleClass('bg-color');
		  e.stopPropagation()
		  // removeClass = false;
		});
		$(document).on("click", function(e) {
		    if ($(e.target).is(".menu-logo") === false) {
		      // $(".menu-content").toggleClass('active-menu');
		      $( '.menu-logo' ).trigger( "click" );
		      $('body').removeClass("bg-color");
		      $(".menu-content").removeClass('active-menu');
		    }
		  });
		// $("html").click(function() {
		//   if (removeClass) {
		//     $(".menu-content").removeClass('active-menu');
		//     $('body').removeClass('bg-color');
		//   }
		//   removeClass = true;
		// });
    }


    // Fancybox Config
	$('[data-fancybox="gallery-new"]').fancybox({
	  	buttons: [
		    "slideShow",
		    "thumbs",
		    "zoom",
		    "fullScreen",
		    "share",
		    "close"
	  ],
	  loop: false,
	  protect: true
	});


	$('.galleries-microfinance .list .list-image a[data-fancybox="gallery-micro"]').fancybox({
	  	buttons: [
		    "slideShow",
		    "thumbs",
		    "zoom",
		    "fullScreen",
		    "share",
		    "close"
	  ],
	  loop: false,
	  protect: true
	});


});

// AOS Init
AOS.init({
	duration: 1000,
	once: true,
	disable: 'mobile'
});




// equle height
equalheight = function(container){
    var currentTallest = 0,
        currentRowStart = 0,
        rowDivs = new Array(),
        $el,
        topPosition = 0;
    $(container).each(function() {
        $el = $(this);
        $($el).height('auto')
        topPostion = $el.position().top;
        if (currentRowStart != topPostion) {
            for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
                rowDivs[currentDiv].height(currentTallest);
            }
            rowDivs.length = 0; // empty the array
            currentRowStart = topPostion;
            currentTallest = $el.height();
            rowDivs.push($el);
        } else {
            rowDivs.push($el);
            currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
        }
        for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
            rowDivs[currentDiv].height(currentTallest);
        }
    });
}


equalheight('.sameheight');