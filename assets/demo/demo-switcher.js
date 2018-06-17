$(function() {

	var sidebarColors = "sidebar-default sidebar-yellow sidebar-bleachedcedar sidebar-light-blue sidebar-gray sidebar-bluegray sidebar-cyan sidebar-red sidebar-orange sidebar-lime sidebar-deep-orange sidebar-light-green sidebar-green sidebar-pink sidebar-deep-purple sidebar-amber sidebar-brown sidebar-midnightblue sidebar-blue sidebar-teal sidebar-purple sidebar-indigo navbar-default navbar-bluegray navbar-amber navbar-deep-purple navbar-light-blue navbar-brown navbar-orange navbar-pink navbar-bleachedcedar navbar-lime navbar-red navbar-deep-orange navbar-yellow navbar-blue navbar-teal navbar-light-green navbar-purple navbar-gray navbar-green navbar-indigo navbar-cyan";
	var headerColors = "navbar-default navbar-gray navbar-bleachedcedar navbar-bluegray navbar-green navbar-orange navbar-pink navbar-blue navbar-deep-orange navbar-lime navbar-yellow navbar-light-blue navbar-light-green navbar-deep-purple navbar-brown navbar-amber navbar-teal navbar-red navbar-purple navbar-indigo navbar-cyan";
	var brandColors = "navbar-brand-default navbar-brand-primary navbar-brand-success navbar-brand-warning navbar-brand-danger navbar-brand-info navbar-brand-inverse";

	var navColor = localStorage.getItem('navbar-color');
	if (navColor) {
		$('body header').removeClass(headerColors).addClass(navColor);
	}

	var sideColor = localStorage.getItem('sidebar-color');
	if (sideColor) {
		$('.static-sidebar-wrapper, .fixed-sidebar-wrapper').removeClass(sidebarColors).addClass(sideColor);
		$('#headernav').removeClass(sidebarColors).addClass('navbar-' + sideColor.replace('sidebar-', ''));
	}

	var brandColor = localStorage.getItem('brand-color');
	if (brandColor) {
		$('body #topnav .navbar-brand').removeClass(brandColors).addClass(brandColor);
	}

	//Show Switcher
	$(".demo-switcher-fab").click(function () {
		$('.demo-options').toggleClass("active");
		$('.demo-switcher-fab').toggleClass("toggle-rotate btn-danger");
	});

	if ($('body header').hasClass('navbar-fixed-top')) {
		$('input[name="demo-fixedheader"]').prop('checked', true)
	}

	$('input[name="demo-fixedheader"]').on('change', function () {
		if ($(this).prop('checked')) {
			$('body header').removeClass('navbar-static-top').addClass('navbar-fixed-top');
		} else {
			$('body header').addClass('navbar-static-top').removeClass('navbar-fixed-top');
		}
	});

	if ($('body').hasClass('layout-boxed')) {
		$('input[name="demo-layoutboxed"]').prop('checked', true)
	}

	$('input[name="demo-layoutboxed"]').on('change', function () {
		if ($(this).prop('checked')) {
			$('body').addClass('layout-boxed');
		} else {
			$('body').removeClass('layout-boxed');
		}
	});

	if ($('body').hasClass('sidebar-collapsed')) {
		$('input[name="demo-collapseleftbar"]').prop('checked', true)
	}

	$('input[name="demo-collapseleftbar"]').on('change', function () {
		if ($(this).prop('checked')) {
			$('body').addClass('sidebar-collapsed');
		} else {
			$('body').removeClass('sidebar-collapsed');
		}
	});

	$('.leftbar-switcher').click(function () {
		var className = $(this).attr('data-addclass');
		$('.static-sidebar-wrapper').removeClass(sidebarColors).addClass(className);
		var horizontalClass = 'navbar-' + className.replace('sidebar-', '');
		$('#headernav').removeClass(sidebarColors).addClass(horizontalClass);
		localStorage.setItem('sidebar-color', className);
	});

	$('.topnav-switcher').click(function () {
		var className = $(this).attr('data-addclass');
		$('body header').removeClass(headerColors).addClass(className);
		localStorage.setItem('navbar-color', className);
	});

	$('.brand-switcher').click(function () {
		var className = $(this).attr('data-addclass');
		$('body #topnav .navbar-brand').removeClass(brandColors).addClass(className);
		localStorage.setItem('brand-color', className);
	});
});