/*********************************************************************************
						!!!! IMG OPEN ON CLICK BÖRJAR HÄR (aka lightbox) !!!!
**********************************************************************************/
$(document).ready(function() {
    var $lightbox = $('#lightbox');
    
    $('[data-target="#lightbox"]').on('click', function(event) {
		
        var $img = $(this).find('img'), 
            src = $img.attr('src'),
            alt = $img.attr('alt'),
            css = {
                'maxWidth': $(window).width() - 100,
                'maxHeight': $(window).height() - 100
            };
    
        $lightbox.find('.close').addClass('hidden');
        $lightbox.find('img').attr('src', src);
        $lightbox.find('img').attr('alt', alt);
        $lightbox.find('img').css(css);
    });
    
    $lightbox.on('shown.bs.modal', function (e) {
        var $img = $lightbox.find('img');
            
        $lightbox.find('.modal-dialog').css({'width': $img.width()});
        $lightbox.find('.close').removeClass('hidden');
    });
});
/*********************************************************************************
										!!!! INFINITE SCROLL !!!!
**********************************************************************************/
/******************************************
	Infinite jQuery Scroll
	@author Fabio Mangolini
	http://www.responsivewebmobile.com
******************************************/
jQuery(document).ready(function() {
	//location.href = 'index.html#start';
	var pages = new Array(); //key value array that maps the pages. Ex. 1=>page2.html, 2=>page3.html
	var current = 0; //the index of the starting page. 0 for index.html in this case
	var loaded = new Array(); //key value array to prevent loading a page more than once

	//get all the pages link inside the #pages div and fill an array
	$('#pages a').each(function(index) {
		pages[index] = $(this).attr('href');
		loaded[$(this).attr('href')] = 0; //initialize all the pages to be loaded to 0. It means that they are not yet been loaded.
	});

	//on scroll gets when bottom of the page is reached and calls the function do load more content
	$(window).scroll(function(e){
		//Not always the pos == h statement is verified, expecially on mobile devices, that's why a 300px of margin are assumed.
		if($(window).scrollTop() + $(window).height() >= $(document).height() - 300) {
			console.log("bottom of the page reached!");

			//in some broswer (es. chrome) if the scroll is fast, the bottom 
			//reach events fires several times, this may cause the page loaging 
			//more than once. To prevent such situation every time the bottom is 
			//reached the number of time is added to that page in suach a way to call 
			//the loadMoreContent page only when the page value in "loaded" array is 
			//minor or equal to one
			loaded[pages[current+1]] = loaded[pages[current+1]] + 1; 

			if(loaded[pages[current+1]] <= 1)
				loadMoreContent(current+1);
		}
		var $lightbox = $('#lightbox');
    
    $('[data-target="#lightbox"]').on('click', function(event) {
        var $img = $(this).find('img'), 
            src = $img.attr('src'),
            alt = $img.attr('alt'),
            css = {
                'maxWidth': $(window).width() - 100,
                'maxHeight': $(window).height() - 100
            };
    
        $lightbox.find('.close').addClass('hidden');
        $lightbox.find('img').attr('src', src);
        $lightbox.find('img').attr('alt', alt);
        $lightbox.find('img').css(css);
    });
    
    $lightbox.on('shown.bs.modal', function (e) {
        var $img = $lightbox.find('img');
            
        $lightbox.find('.modal-dialog').css({'width': $img.width()});
        $lightbox.find('.close').removeClass('hidden');
    });
	});

	//loads the next page and append it to the content with a fadeIn effect. 
	//Before loading the content it shows and hides the loaden Overlay DIV
	function loadMoreContent(position) {
		//try to load more content only if the counter is minor than the number of total pages
		if(position < pages.length) {
			$('#loader').fadeIn('slow', function() {
				$.get(pages[position], function(data) {
					$('#loader').fadeOut('slow', function() {
						$('#scroll-container').append(data).fadeIn(999);
						current=position;
					});					
				});
			});
		}
	}
	
});
////////////////// inf scroll end
/*********************************************************************************
										!!!! UPLOAD.JS BÖRJAR HÄR !!!!
**********************************************************************************/

(function($) {
    'use strict';

    // UPLOAD CLASS DEFINITION
    // ======================

    var dropZone = document.getElementById('drop-zone');
    var uploadForm = document.getElementById('js-upload-form');

    var startUpload = function(files) {
        console.log(files)
    }

    uploadForm.addEventListener('submit', function(e) {
        var uploadFiles = document.getElementById('js-upload-files').files;
        e.preventDefault()

        startUpload(uploadFiles)
    })

    dropZone.ondrop = function(e) {
        e.preventDefault();
        this.className = 'upload-drop-zone';

        startUpload(e.dataTransfer.files)
    }

    dropZone.ondragover = function() {
        this.className = 'upload-drop-zone drop';
        return false;
    }

    dropZone.ondragleave = function() {
        this.className = 'upload-drop-zone';
        return false;
    }

})(jQuery);

/*********************************************************************************
										!!!! TAG.JS BÖRJAR HÄR !!!!
**********************************************************************************/

$(document).ready(function () {
    $('#defaultForm')
        .find('[name="taggar"]')
    // Revalidate the color when it is changed
    .change(function (e) {
        console.warn($('[name="taggar"]').val());
        console.info($('#image_tag').val());
        console.info($("#image_tag").tagsinput('items'));
        var a = $("#image_tag").tagsinput('items');
        console.log(typeof (a));
        console.log(a.length);
        $('#defaultForm').bootstrapValidator('revalidateField', 'image_tag');
    })
        .end()
        .find('[name="image_tag1"]')
    // Revalidate the color when it is changed
    .change(function (e) {
        console.warn($('[name="image_tag1"]').val());
        console.info($('#image_tag1').val());
        console.info($("#image_tag1").tagsinput('items'));
        var a = $("#image_tag1").tagsinput('items');
        console.log(typeof (a));
        console.log(a.length);
       /* $('#defaultForm').bootstrapValidator('revalidateField', 'taggar1'); */
    })
        .end()
       
	   /* .bootstrapValidator({
        excluded: ':disabled',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            taggar: {
                validators: {
                    notEmpty: {
                        message: 'Please enter at least one city you like the most'
                    }
                }
            },
            taggar1: {
                validators: {
                    callback: {
                        message: 'Please choose 2-4 color you like most',
                        callback: function (value, validator) {
                            // Get the selected options
                            var options = validator.getFieldElements('taggar1').tagsinput('items');
                            // console.info(options);
                            return (options !== null && options.length >= 2 && options.length <= 4);
                        }
                    }
                }
            }
        }
    })  */
        .on('success.form.bv', function (e) {
        // Prevent form submission
        e.preventDefault();
    });
});




