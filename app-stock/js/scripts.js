// Function to load categories dynamically
function loadCategories(selectId) {
    $.ajax({
        url: 'php/get_categories.php',
        type: 'GET',
        success: function(response) {
            $(selectId).html(response);
        }
    });
}

// Function to load items dynamically
function loadItems(selectId) {
    $.ajax({
        url: 'php/get_items.php',
        type: 'GET',
        success: function(response) {
            $(selectId).html(response);
        }
    });
}