document.addEventListener('DOMContentLoaded', function () {
    const signBody = document.getElementById("sign_body");
    const closeSignBox = document.getElementById("close-sign-box");

    // Event listener for "Sign-Up" button
    document.getElementById("signup").addEventListener('click', function () {
        show_sign_up();
    });

    // Event listener for "Close" button
    closeSignBox.addEventListener('click', function () {
        signBody.style.display = 'none';
        closeSignBox.style.display = 'none';
    });

    // Event listener for "Sign-In" button
    document.getElementById("signin").addEventListener('click', function () {
        show_sign_in();
    });

    // Event listener for "Sign-In" button
    document.getElementById("sign-self").addEventListener('click', function () {
        show_sign_up();
        hideMenu();
    });

    // Function to display the sign-in form
    function show_sign_in() {
        get_sign_page("sign-in");
        signBody.style.display = 'flex';
        closeSignBox.style.display = 'block';
    }

    // Function to display the sign-up form
    function show_sign_up() {
        get_sign_page("sign-up");
        signBody.style.display = 'flex';
        closeSignBox.style.display = 'block';
    }

    // Function to toggle between sign-in and sign-up forms
    function get_sign_page(type) {
        const sign_in_box = document.getElementById("sign-in");
        const sign_up_box = document.getElementById("sign-up");
        if (type === 'sign-in') {
            sign_in_box.style.display = 'flex';
            sign_up_box.style.display = 'none';
        } else if (type === 'sign-up') {
            sign_up_box.style.display = 'flex';
            sign_in_box.style.display = 'none';
        }
    }
});

// Add event listeners for real-time validation
document.getElementById("username").addEventListener("keyup", () => {
    const username = document.getElementById("username").value;
    const userError = document.getElementById("user-error");

    // Check length
    checkLength(username.length, document.getElementById("username").maxLength, "user-error");

    // Validate username
    if (!validateUsername(username)) {
        userError.style.display = 'block';
        userError.innerText = "Invalid username. Must be lowercase, can contain underscores and dots, but no consecutive dots or dots at the beginning/end.";
    } else {
        userError.style.display = 'none';
    }
});


document.getElementById("pass").addEventListener("keyup", () => {
    const pass = document.getElementById("pass").value;
    checkLength(pass.length, document.getElementById("pass").maxLength, "pass-error");
    verifyPassword(); // Ensure password verification is up-to-date
});

document.getElementById("vpass").addEventListener("keyup", () => {
    verifyPassword(); // Ensure password verification is up-to-date
});

document.getElementById("login-email").addEventListener("keyup", () => {
    const email = document.getElementById("login-email").value;
    const emailError = document.getElementById("email-error");

    // Check length
    checkLength(email.length, document.getElementById("login-email").maxLength, "email-error");

    // Validate email
    if (!validateEmail(email)) {
        emailError.style.display = 'block';
        emailError.innerText = "Invalid email address.";
    } else {
        emailError.style.display = 'none';
    }
});

document.getElementById("user-form").addEventListener("submit", (event) => {
    event.preventDefault(); // Prevent the default form submission

    let formIsValid = true;

    // Validate username
    const username = document.getElementById("username").value;
    const userError = document.getElementById("user-error");

    // Check length
    checkLength(username.length, document.getElementById("username").maxLength, "user-error");

    // Validate username
    if (!validateUsername(username)) {
        userError.style.display = 'block';
        userError.innerText = "Invalid username. Must be lowercase, can contain underscores and dots, but no consecutive dots or dots at the beginning/end.";
        formIsValid = false;
    } else {
        userError.style.display = 'none';
    }

    // Validate password length
    const pass = document.getElementById("pass").value;
    const passError = document.getElementById("pass-error");
    checkLength(pass.length, document.getElementById("pass").maxLength, "pass-error");

    // Validate password match
    const vpass = document.getElementById("vpass").value;
    if (vpass !== pass) {
        passError.style.display = 'block';
        passError.innerText = "Passwords do not match.";
        formIsValid = false;
    } else {
        passError.style.display = 'none';
    }

    // Validate email
    const email = document.getElementById("login-email").value;
    const emailError = document.getElementById("email-error");
    if (!validateEmail(email)) {
        emailError.style.display = 'block';
        emailError.innerText = "Invalid email address.";
        formIsValid = false;
    } else {
        emailError.style.display = 'none';
    }
    checkLength(email.length, document.getElementById("login-email").maxLength, "email-error");

    // If form is valid, you can proceed with form submission or other actions
    if (formIsValid) {
        document.getElementById("user-form").submit(); // Submit the form
    }
});



function checkLength(length, maxLength, errorElementId) {
    const errorElement = document.getElementById(errorElementId);
    errorElement.className = 'warning'; // Default to warning class

    if (length === maxLength) {
        errorElement.style.display = 'block';
        errorElement.innerText = "Length limit is " + maxLength;
    } else if (length > maxLength) {
        errorElement.style.display = 'block';
        errorElement.innerText = "Input length exceeds limit, maximum length is " + maxLength;
    } else {
        errorElement.style.display = 'none';
    }
}

function verifyPassword() {
    const pass = document.getElementById("pass").value;
    const vpass = document.getElementById("vpass").value;
    const passError = document.getElementById("pass-error");

    passError.className = 'error'; // Default to error class

    if (vpass === pass) {
        passError.style.display = 'none';
    } else {
        passError.style.display = 'block';
        passError.innerText = "Passwords do not match.";
    }
}

function validateUsername(username) {
    const pattern = /^(?!.*\.\.)(?!^\.)(?!\.$)[a-z0-9._]+(?<!\.)$/;
    return pattern.test(username);
}

function validateEmail(email) {
    const pattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/; // Basic email format validation
    return pattern.test(email);
}