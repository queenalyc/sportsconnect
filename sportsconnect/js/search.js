// Title: Product Filter Search with Ajax, PHP & MySQL
// Author: PHPZAG Team
// Date: 4 December, 2019
// Code Version: 1.0
// Availability: https://www.phpzag.com/product-filter-search-with-ajax-php-mysql/
$(document).ready(function(){
    filterSearch();	
    $('.classDetail').click(function(){
        filterSearch();
        // console.log(filterSearch());
    });
   
    $('#priceSlider').slider({
        range:true,
        min:0,
        max:500,
        values:[0, 500],
        step:5,
        stop:function(event, ui){
            $('#priceRange').html(ui.values[0]+'-'+ui.values[1]);
            $('#minPrice').val(ui.values[0]);
            $('#maxPrice').val(ui.values[1]);
            filterSearch();
            console.log(filterSearch());
        }		
	}).on('change', priceRange); 
    		
});
function filterSearch(){
    $('.searchResult').html('<div id="loading">Loading Classes.....</div>');
    var action = 'fetch_data';
    var day = getFilterData('day');
    var level = getFilterData('level');
    var minPrice = $('#minPrice').val();
    var maxPrice = $('#maxPrice').val();
    console.log(day);
    $.ajax({
        url:"action.php",
        method:"POST",
        dataType:"json",
        data:{action:action,day:day,level:level, minPrice:minPrice, maxPrice:maxPrice},
        success:function(data){
            $('.searchResult').html(data.html); //display all the classes details
            console.log(data);
        },

        error: function(data){
            console.log(data);
            console.log("error");
            $('.searchResult').html('Error occurred.');
            alert(data);
        }
    })

}

function getFilterData(className) {
	var filter = [];
	$('.'+className+':checked').each(function(){
        filter.push($(this).val());
        console.log($(this).val());
	});
	return filter;
}