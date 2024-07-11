
//the folowing javasript code i used in couting the number of products in the cart
function addToCart(formId) {
    var form = document.getElementById(formId);
    var formData = new FormData(form);

    
    var x = new XMLHttpRequest();
    x.open('POST', 'add_to_cart.php', true);
    x.onload = function () {
        if (x.status == 200) {
            updateCartLabel(); // change label on the add to cart page
            showNotification('Item added to cart!');
        } else if (x.status == 401) {
            showNotification('Sorry: Please log in to add items to your cart.');
        } else {
            showNotification('Error: Unable to add item to cart. Please try again later.');
        }
        
    };
    x.send(formData);
}

//this is a function that update the cart label on cart page
function updateCartLabel() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'get_cart_count.php', true);
    xhr.onload = function () {
        if (xhr.status == 200) {
            document.getElementById('cartLabel').textContent = 'Cart: ' + xhr.responseText;
        }
    };
    xhr.send();
}

//this function is created to show notification on top of the page.
function showNotification(message) {
    var notificationContainer = document.getElementById('notificationContainer');
    notificationContainer.textContent = message;
    notificationContainer.style.display = 'block';
    setTimeout(function () {
        notificationContainer.style.display = 'none';
    }, 6000); // Hide the notification after 3 seconds
}

updateCartLabel(); // Initial call to load cart count
