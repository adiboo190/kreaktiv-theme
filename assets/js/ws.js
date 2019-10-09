(function($) {
  "use strict"; // Start of use strict

  // Smooth scrolling using jQuery easing
  $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: (target.offset().top - 56)
        }, 1000, "easeInOutExpo");
        return false;
      }
    }
  });

  // Closes responsive menu when a scroll trigger link is clicked
  $('.js-scroll-trigger').click(function() {
    $('.navbar-collapse').collapse('hide');
  });

  // Activate scrollspy to add active class to navbar items on scroll
  $('body').scrollspy({
    target: '#mainNav',
    offset: 56
  });

  // Others
  $( '[data-toggle="tooltip"]:hover,[data-toggle="tooltip"]' ).tooltip();
  $('[data-toggle="popover"],[data-toggle="popover"]:hover').popover({
    html : true,
    trigger : 'click',
    container : 'body',
    template : '<div class="popover" role="tooltip"><h3 class="popover-header"><button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></h3><div class="popover-body"></div></div>',
  });

  // Widgets
  $( ".widget_categories select, .widget_categories input:not([type=\"submit\"]), .widget_archive select, .widget_archive input:not([type=\"submit\"])" ).addClass( 'form-control' );
  $( '.widget_pages ul, .widget_archive ul, .widget_categories ul, .widget_recent_comments ul, .widget_meta ul, .widget_recent_entries ul' ).addClass( 'list-group' );
  $( '.widget_pages ul li,  .widget_archive ul li, .widget_categories ul li, .widget_recent_comments ul li, .widget_meta ul li, .widget_recent_entries ul li' ).addClass( 'list-group-item' );
  $( '.widget_pages .post-date, .widget_recent_entries .post-date' ).addClass( 'badge' ).addClass( 'badge-primary' ).addClass( 'float-right' );
  $( '.screen-reader-text' ).addClass( 'sr-only' );
  $( '.widget_tag_cloud a' ).addClass( 'btn' ).addClass( 'btn-primary' ).addClass('mb-2');

  // Widget Navigation
  $( '.widget_nav_menu ul' ).addClass( 'nav' );
  $( '.widget_nav_menu ul li' ).addClass( 'nav-item' );
  $( '.widget_nav_menu ul li a' ).addClass( 'nav-link' );

  // Calendar
  $('#wp-calendar td').each(function() {
    // console.log($(this).prop('id'));
    if($(this).prop('id') == 'today') {
      $( '#wp-calendar #today a' ).addClass( 'badge' ).addClass( 'badge-light' );
    } else {
      $( '#wp-calendar a' ).addClass( 'badge' ).addClass( 'badge-primary' );
    }
  });

  $( '.widget_calendar #calendar_wrap' ).addClass( 'table-responsive' );
  $( '#wp-calendar' ).addClass( 'table' ).addClass( 'table-striped' );
  $( '#wp-calendar td, #wp-calendar th' ).addClass( 'text-center' );
  $( '#wp-calendar #today' ).addClass( 'bg-secondary' ).addClass('text-white');
  $( '#wp-calendar th' ).attr({
    'data-toggle'    : 'tooltip',
    'data-placement' : 'top'
  });

  // Comments
  $( '.comment-form-cookies-consent' ).addClass('custom-control').addClass('custom-checkbox').addClass('my-1').addClass('mr-sm-2');
  $( '#wp-comment-cookies-consent' ).addClass('custom-control-input');
  $( '.comment-form-cookies-consent label' ).addClass('custom-control-label');

  $('.comment-edit-link').addClass('badge-primary').addClass('badge').addClass('ml-2');
  $('.comment-reply-link').addClass('badge-primary').addClass('badge');

})(jQuery); // End of use strict

