var priceElements = document.querySelectorAll('.product-prices');
priceElements.forEach(function(element) {
    var price = element.textContent.trim().substring(4); // Extract the numeric value

    // Convert the price to a number and add thousand separators with a dot
    var formattedPrice = parseInt(price).toLocaleString('en-US', { useGrouping: true }).replace(/,/g, '.');

    // Update the HTML content of each element with the formatted price
    element.innerHTML = 'IDR ' + formattedPrice;
});