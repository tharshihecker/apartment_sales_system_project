function validatePassword() {
    var password = document.getElementById('password').value;
    var passwordValidation = document.getElementById('password-validation');
    if (password.length < 8) {
        passwordValidation.textContent = "Password should be at least 8 characters long";
        passwordValidation.style.color = "red"; // Set color to red for error
    } else {
        passwordValidation.textContent = "Your password is great";
        passwordValidation.style.color = "green"; // Set color to green for success
    }
}

function validatePhoneNumber() {
    var phone = document.getElementById('phone').value;
    var phoneValidation = document.getElementById('phone-validation');
    if (phone.length != 10) {
        phoneValidation.textContent = "Phone number should be exactly 10 digits";
        phoneValidation.style.color = "red"; // Set color to red for error
    } else {
        phoneValidation.textContent = "Valid number";
        phoneValidation.style.color = "green"; // Set color to green for success
    }
}
function budgetValidation() {
    var budget = document.getElementById("budget").value;
    var budgetValidation = document.getElementById("budget-validation");
    if (Number(budget) < 1000000) {
        budgetValidation.textContent = "Budget should be more than 1 million";
        budgetValidation.style.color = "red"; // Set color to red for error
    } else {
        budgetValidation.textContent = "Great Budget";
        budgetValidation.style.color = "green"; // Set color to green for success
    }
}