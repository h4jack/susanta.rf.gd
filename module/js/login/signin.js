import * as util from '/module/js/login/login-util.js';

const uname = document.getElementById("input-loginid");
const form = document.querySelector('.login-form');


uname.addEventListener("input", () => {
    if (util.isValidEmail(uname.value)) {
        util.showError(document.querySelector(".uname-error"), "valid Email address.", "positive")

    } else if (util.isValidPhone(uname.value)) {
        util.showError(document.querySelector(".uname-error"), "valid phone.", "positive")

    } else if (util.isValidUsername(uname.value)) {
        util.showError(document.querySelector(".uname-error"), "valid username.", "positive")

    } else {
        util.showError(document.querySelector(".uname-error"), "Not a valid username/phone/email. please enter a valid value.", "warning")
    }
});


// Add event listener for form submission
form.addEventListener('submit', function (event) {
    // Prevent the default form submission
    event.preventDefault();

    // Get form data
    const formData = new FormData(form);

    // Convert FormData to a plain object
    const data = {};
    formData.forEach((value, key) => {
        data[key] = value;
    });

    const isvaliduname = util.isValidEmail(data.username) || util.isValidPhone(data.username) || util.isValidUsername(data.username);
    const isvalidpass = util.isValidPassword(data.pass);
    if (isvaliduname && !isvalidpass) {
        form.submit();
    } else {
        if (!isvaliduname)
            util.showError(document.querySelector(".uname-error"), "Not a valid username/phone/email. please enter a valid value.", "warning")
        if (isvalidpass)
            util.showError(document.querySelector(".pass-error"), "Not a valid password. please enter a valid value.", "warning")
    }

    // Optionally clear the form fields
    form.reset();
});