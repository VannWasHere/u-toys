let numbers = 1;
let pSummary = document.getElementById('prices');
let valueString = pSummary.innerText;
let numericString = valueString.replace(/[^0-9]/g, '');

// Convert the numeric string to a number
let valueNumber = parseInt(numericString);

document.getElementById('add-buttons').onclick = function() {
    numbers += 1;
    document.getElementById('quantity-number').value = numbers;

    total = numbers * valueNumber;
    document.getElementById('prices').innerHTML = "IDR " + total;
}

document.getElementById('min-buttons').onclick = function() {
    if (numbers >= 2) {
        numbers -= 1;
        document.getElementById('quantity-number').value = numbers;
    } else {
        numbers = 1;
        document.getElementById('quantity-number').value = numbers;
    }

    total = numbers * valueNumber;

    document.getElementById('prices').innerHTML = "IDR " + total;
}
