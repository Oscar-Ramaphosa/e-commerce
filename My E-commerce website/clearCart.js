//this javascript code runs when the user clicks the clear cart button, it also
//uses the AJAX request
document.addEventListener("DOMContentLoaded", function() {
    var clearCartBtn = document.getElementById("clearCartBtn");
    clearCartBtn.addEventListener("click", function() {
        // Send an AJAX request to clear_cart.php
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "clear_cart.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Handle the response
                alert(xhr.responseText);

                // Refreshing the page
                location.reload(); 
            }
        };
        xhr.send(); 
    });
});