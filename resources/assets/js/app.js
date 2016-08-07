(function() {

	/**
	 * Material initialization
	 */
	$.material.init();

	/**
	 * Carousel Auto Play
	 */
	$('.carousel').carousel({
		interval : 4000
	});

	/**
	 * Add bg class for login and register page
	 */
	$('.login, .register').parent().addClass('bg');

	/**
	 * Bootstrap Date picker
	 * @type {Date}
	 */
	var nowTemp = new Date();
	var now     = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

	$('#date').datepicker({
		format   : 'yyyy-mm-dd',
		onRender : function(date) {
			return date.valueOf() < now.valueOf() ? 'disabled' : '';
		}
	});

	/**
	 * Alert fade in and out
	 */
	$('.alert-dismissible')
		.fadeIn(500)
		.delay(7000)
		.fadeOut(500)
		.addClass('animated tada');

	/**
	 * This function will make menus drop automatically
	 * it targets the ul navigation and li drop-down
	 * and uses the jQuery hover() function to do that.
	 */
	$('ul.nav li.dropdown').hover(function() {
		$('.dropdown-menu', this).fadeIn('fast');
	}, function() {
		$('.dropdown-menu', this).fadeOut('fast');
	}); // HOVER

	/**
	 * Show tooltips
	 */
	$("[data-toggle='tooltip']").tooltip({animation : true});

	/**
	 * Show pop overs
	 */
	$('[data-toggle="popover"]').popover();

	/**
	 * Attribute data-remote for every form
	 */
	$('form[data-remote]').on('submit', function(e) {
		var $btn = $(this).find('button').button('loading');
		setTimeout(function() {
			$btn.button('reset');
		}, 3600000); // 1000*60*60 (1 hour)
	});

	/**
	 * Dropzone
	 * @type {{paramName: string, maxFilesize: number, acceptedFiles: string}}
	 */
	Dropzone.options.addPhotosFrom = {
		paramName     : "photo", // The name that will be used to transfer the file
		maxFilesize   : 5, // MB
		acceptedFiles : '.jpg, .jpeg, .png, .bmp', // Validates file types
		// addRemoveLinks : true,
	};

	/**
	 * Pjax
	 */
	$(document).pjax('a#pjax', '#pjax-container');

	/**
	 * Confirmation class
	 */
	$('.confirm').click(function(e) {
		e.preventDefault();
		var form = $(this).parents('form');
		swal({
			title              : "Are You Sure ?",
			// text               : 'You won\'t be able to recover from this action again',
			type               : "warning",
			showCancelButton   : true,
			confirmButtonColor : "#4CAF50",
			cancelButtonColor  : "#F44336",
			confirmButtonClass : 'btn btn-success btn-raised',
			cancelButtonClass  : 'btn btn-danger btn-raised',
			confirmButtonText  : "Yes",
			cancelButtonText   : "No",
			closeOnConfirm     : true,
			closeOnCancel      : true,
		}).then(
			function() {
				form.submit();
			}
		);
	});

	/**
	 * Reloading page every interval minute
	 */
	var reloading;
	var interval = 5000;

	function checkReloading() {
		if (window.location.hash == "#autoreload") {
			reloading                                  = setTimeout("window.location.reload();", interval);
			document.getElementById("refresh").checked = true;
		}
	}

	function toggleAutoRefresh(cb) {
		if (cb.checked) {
			window.location.replace("#autoreload");
			reloading = setTimeout("window.location.reload();", interval);
		} else {
			window.location.replace("#");
			clearTimeout(reloading);
		}
	}

	$('#refresh').on('click', function() {
		toggleAutoRefresh(this);
	});

	checkReloading();

})();
