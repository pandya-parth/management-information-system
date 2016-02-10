(function($) {

    'use strict';

    $(document).ready(function() {
        // Initializes search overlay plugin.
        // Replace onSearchSubmit() and onKeyEnter() with 
        // your logic to perform a search and display results

        $('#birth-date,#joining-date,#start-date,#end-date,#task-start-date,#due-date,#task_start_date,#task_due_date').datepicker({
            autoclose: true
        });


        $('pgn-warpper').css('display:none');

       

        $(".list-view-wrapper").scrollbar();

        $('[data-pages="search"]').search({
            // Bind elements that are included inside search overlay
            searchField: '#overlay-search',
            closeButton: '.overlay-close',
            suggestions: '#overlay-suggestions',
            brand: '.brand',
             // Callback that will be run when you hit ENTER button on search box
            onSearchSubmit: function(searchString) {
                console.log("Search for: " + searchString);
            },
            // Callback that will be run whenever you enter a key into search box. 
            // Perform any live search here.  
            onKeyEnter: function(searchString) {
                console.log("Live search for: " + searchString);
                var searchField = $('#overlay-search');
                var searchResults = $('.search-results');

                /* 
                    Do AJAX call here to get search results
                    and update DOM and use the following block 
                    'searchResults.find('.result-name').each(function() {...}'
                    inside the AJAX callback to update the DOM
                */

                // Timeout is used for DEMO purpose only to simulate an AJAX call
                clearTimeout($.data(this, 'timer'));
                searchResults.fadeOut("fast"); // hide previously returned results until server returns new results
                var wait = setTimeout(function() {

                    searchResults.find('.result-name').each(function() {
                        if (searchField.val().length != 0) {
                            $(this).html(searchField.val());
                            searchResults.fadeIn("fast"); // reveal updated results
                        }
                    });
                }, 500);
                $(this).data('timer', wait);

            }
        })

    });



    $('.registerBtn').click(function() {
       $("#cat_id").val($(this).attr('data-value'));
    });
    
        $('.task_category').click(function() {
            $('#addNewAppModal').modal('show');
        });


    
    $('.panel-collapse label').on('click', function(e){
        e.stopPropagation();
    })

$(".dropdown").click(function() {          
    $(".log-indropdown").slideToggle('slow');    
    $(this).toggleClass('active');  
});

 
$('.btn-list-action').click(function(){
    $('.grid_list_view .data_area').addClass('list_view');
    $('.grid_list_view .data_area').removeClass('grid_view');
    $('.grid_list_view .data_area').removeClass('box_view');

    $('.grid_list_view .head').addClass('list_view');
    $('.grid_list_view .head').removeClass('grid_view');
    $('.grid_list_view .head').removeClass('box_view');
});
$('.btn-grid-action').click(function(){
    $('.grid_list_view .data_area').removeClass('list_view');
    $('.grid_list_view .data_area').addClass('grid_view');
    $('.grid_list_view .data_area').removeClass('box_view');

    $('.grid_list_view .head').removeClass('list_view');
    $('.grid_list_view .head').addClass('grid_view');
    $('.grid_list_view .head').removeClass('box_view');
});
$('.btn-box-action').click(function(){
    $('.grid_list_view .data_area').removeClass('list_view');
    $('.grid_list_view .data_area').removeClass('grid_view');
    $('.grid_list_view .data_area').addClass('box_view');

    $('.grid_list_view .head').removeClass('list_view');
    $('.grid_list_view .head').removeClass('grid_view');
    $('.grid_list_view .head').addClass('box_view');
});


})(window.jQuery);

