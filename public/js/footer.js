// footer.js
document.addEventListener('DOMContentLoaded', function() {
    // Get the address, email, and phone elements
    var address = document.querySelector('.address');
    var email = document.querySelector('.email');
    var phone = document.querySelector('.phone');

    // Add click event listener to the address
    address.addEventListener('click', function() {
        // Redirect to Google Maps
        window.location.href = 'https://www.google.com/maps?q=' + encodeURIComponent(address.innerText);
    });

    // Add click event listener to the email
    email.addEventListener('click', function() {
        // Extract the email address
        var emailAddress = this.innerText.trim();

        // Redirect to compose email
        window.location.href = 'mailto:' + emailAddress;
    });

    // Add click event listener to the phone number
    phone.addEventListener('click', function() {
        // Extract the phone number
        var phoneNumber = this.innerText.trim();

        // Redirect to call the number
        window.location.href = 'tel:' + phoneNumber;
    });
});
