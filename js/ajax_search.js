var user_search = document.getElementById('user-search');
var card_container = document.getElementById('containing-card');
var category = document.getElementById('prod_cat').value;
var filtering = document.getElementById('prod_filtering').value;

// Add event listener keyup, for live searching
user_search.addEventListener('keyup', function() {

    // Object AJAX
    var xhr = new XMLHttpRequest();

    // Check AJAX status
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            card_container.innerHTML = xhr.responseText;
        }
    }

    // AJAX exe
    xhr.open('GET', 'php/liveSearch_process.php?cat=' + category + '&sort=' + filtering + '&keyword=' + user_search.value, true);
    xhr.send();

});
