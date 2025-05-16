function validatepassword1() {
    var password = document.getElementById('password').value;
    var passwordValidation1 = document.getElementById('password-validation1');
    if (password.length < 8) {
        passwordValidation1.textContent = "Password should be at least 8 characters long";
        passwordValidation1.style.color = "red"; // Set color to red for error
    } else {
        passwordValidation1.textContent = "Your password is great";
        passwordValidation1.style.color = "green"; // Set color to green for success
    }
}