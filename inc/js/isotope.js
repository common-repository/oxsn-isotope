(function($) {

    $('.oxsn_isotope_filter').on( 'click', function() {

      var filterValue = $(this).attr('data-filter');

      $('.oxsn_isotope_wrap').isotope({ filter: filterValue });

      $('.oxsn_isotope_filter').removeClass('active');

      $(this).addClass('active');

    });

    var $isotopeContainer = $('.oxsn_isotope_wrap');

    $isotopeContainer.imagesLoaded( function(){

      $isotopeContainer.isotope({

        layoutMode: 'masonry',

        masonry: {

          columnWidth: '.oxsn_isotope_item_column_width',

          gutter: 'oxsn_isotope_gutter_width',

          isFitWidth: true,

        },

        itemSelector: '.oxsn_isotope_item',

        stamp: '.oxsn_isotope_stamp',

      });

    });

    $(window).resize(function() {
      $isotopeContainer.isotope();
    });

  })(jQuery);