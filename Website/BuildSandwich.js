$(document).ready(function() {
    // Update total price when ingredient selections change
    $('#sandwichForm').on('change', 'select, input[type="checkbox"]', function() {
        updatePrice();
    });
});

function updatePrice() {
    var totalPrice = 0;
    $('#sandwichForm select').each(function() {
        totalPrice += parseFloat($(this).find(':selected').data('price') || 0);
    });
    $('#sandwichForm input[type="checkbox"]:checked').each(function() {
        totalPrice += parseFloat($(this).data('price') || 0);
    });
    $('#totalPrice').text(totalPrice.toFixed(2));
    $('#hiddenTotalPrice').val(totalPrice.toFixed(2)); // Update hidden input to submit form
}