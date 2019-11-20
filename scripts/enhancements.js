/**
* Author: Khanh Hung Nguyen, 102414836
* Target: Validate user input in apply.html
* Created: 17/04/2019
* Last update: 21/04/2019
* Credits:
*/

"use strict";

$(function () { //wait for everything to load first
	//Apply page upload image
	//Reference: http://jsfiddle.net/vacidesign/ja0tyj0f/
    $(":file").change(function () { //wait for that file being loaded, then keep going
        if (this.files && this.files[0]) { //this: whatever action is on ' file isn't empty
            var reader = new FileReader(); //open from local store
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);
        }
    });
	
	//Index page slider
	//settings for slider
    var width = 801;
    var animationSpeed = 1000;
    var pause = 3000;
    var currentSlide = 1;

    var $slider = $('#slider');
    var $slideContainer = $('#slides', $slider);
    var $slides = $('.slide', $slider);

    var interval;

    function startSlider() {
        interval = setInterval(function() {
            $slideContainer.animate({'margin-left': '-='+width}, animationSpeed, function() {
                if (++currentSlide === $slides.length) {
                    currentSlide = 1;
                    $slideContainer.css('margin-left', 0);
                }
            });
        }, pause);
    }
    function pauseSlider() {
        clearInterval(interval);
    }

    $slideContainer
        .on('mouseenter', pauseSlider)
        .on('mouseleave', startSlider);

    startSlider();
	
	//Scroll to top or bottom for every page
	//show if the scroll bar is visible
	if ($(document).height() > $(window).height()) {
		$('#scroll').show();
		
		//http://jsfiddle.net/designaroni/sj3euzL7/
		//Chek direction of scrolling
		var position = $(window).scrollTop(); 
		var up = true;
		$(window).scroll(function() {
			var scroll = $(window).scrollTop();
			var check_scroll = $(this)
			if(scroll > position) {
				$("#scroll").text('End of page');
				up = false;
			} else {
				 $("#scroll").text('Back to Top');
				 up = true;
			}
			position = scroll;
		});
		
		//http://jsfiddle.net/didierg/Kwhbv/
		$("#scroll").click(function (){
			if (up == true) {
				$('html, body').animate({
					scrollTop: $("#top").offset().top
				}, 2000);
			} else {
				$('html, body').animate({
					scrollTop: $("#bottom").offset().top
				}, 2000);
			}   
		});
	} else {
		$('#scroll').hide();
	}
	
	//Enhancements 2
	 $('.tab-panels .tabs li').on('click', function() {

        var $panel = $(this).closest('.tab-panels');

        $panel.find('.tabs li.active').removeClass('active');
        $(this).addClass('active');

        //figure out which panel to show
        var panelToShow = $(this).attr('rel');

        //hide current panel
        $panel.find('.panel.active').slideUp(300, showNextPanel);

        //show next panel
        function showNextPanel() {
            $(this).removeClass('active');

            $('#'+panelToShow).slideDown(300, function() {
                $(this).addClass('active');
            });
        }
    });
});

function imageIsLoaded(e) {
    $('#myImg').attr('src', e.target.result);
};