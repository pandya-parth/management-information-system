(function($) {

    'use strict';

    $(document).ready(function() {
        // Initializes search overlay plugin.
        // Replace onSearchSubmit() and onKeyEnter() with 
        // your logic to perform a search and display results

        $('#birth-date,#joining-date,#start-date,#end-date,#task-start-date,#due-date').datepicker({
            autoclose: true
        });

        $('#task_startdate, #task_enddate').datepicker({
            autoclose: true
        });


        $('pgn-warpper').css('display:none');

       $('.task_category').click(function(){
        
                var a = $(this).data('id');
                $('#cat_id').val(a);
            });

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



//plupload end

})(window.jQuery);

