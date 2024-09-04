import * as util from '/module/js/login/login-util.js';

const name_input = document.getElementById("input-name");
const email_input = document.getElementById("input-email");
const number_input = document.getElementById("input-phone");
const username_input = document.getElementById("input-uname");
const pass_input = document.getElementById("input-pass");
const vpass_input = document.getElementById("input-vpass");

const name_error = document.querySelector(".name-error");
const email_error = document.querySelector(".email-error");
const number_error = document.querySelector(".phone-error");
const username_error = document.querySelector(".uname-error");
const pass_error = document.querySelector(".pass-error");
const vpass_error = document.querySelector(".vpass-error");

name_input.addEventListener("input", () => {
    if (util.isValidName(name_input.value)) {
        util.hideError(name_error);
    } else {
        util.showError(name_error);
    }
    name_input.value = name_input.value.substr(0, 50);
});

email_input.addEventListener("input", () => {
    if (util.isValidEmail(email_input.value)) {
        util.hideError(email_error);
    } else {
        util.showError(email_error);
    }
});

number_input.addEventListener("input", () => {
    if (util.isValidPhone(number_input.value)) {
        util.hideError(number_error);
    } else {
        util.showError(number_error);
    }

});

username_input.addEventListener("input", () => {
    if (util.isValidUsername(username_input.value)) {
        util.showError(username_error, "username is available", "positive");
    } else {
        util.showError(username_error, "username is not valid", "warning");
    }
});

pass_input.addEventListener("input", () => {
    let emsg = util.isValidPassword(pass_input.value, email_input.value);
    if (emsg) {
        util.showError(pass_error, emsg);
    } else {
        util.hideError(pass_error);
        if (pass_input.value == vpass_input.value) {
            util.hideError(vpass_error);
        } else {
            util.showError(vpass_error, "Password and verify password do not match.");
        }
    }
    vpass_input.addEventListener("input", () => {
        let emsg = util.isValidPassword(pass_input.value, email_input.value);
        if (emsg) {
            util.showError(pass_error, emsg);
        } else {
            util.hideError(pass_error);
            if (pass_input.value == vpass_input.value) {
                util.hideError(vpass_error);
            } else {
                util.showError(vpass_error, "Password and verify password do not match.");
            }
        }
    });
});

// Set current date from backend
const current_date = '13-08-2024';

// Split current date into day, month, and year
const [current_day, current_month, current_year] = current_date.split('-');

// Function to populate days
function populateDays() {
    const daySelect = document.getElementById('day');
    for (let i = 1; i <= 31; i++) {
        const option = document.createElement('option');
        option.value = i;
        option.text = i;
        daySelect.appendChild(option);
    }
}


// Function to populate months based on selected day
function populateMonths() {
    const daySelect = document.getElementById('day');
    const monthSelect = document.getElementById('month');
    monthSelect.disabled = false;
    monthSelect.innerHTML = '';
    const selectedDay = daySelect.value;
    const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    const monthDays = [31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
    for (let i = 0; i < 12; i++) {
        if (selectedDay <= monthDays[i]) {
            const option = document.createElement('option');
            option.value = i + 1;
            option.text = months[i];
            monthSelect.appendChild(option);
        }
    }
    populateYears();
}



// Function to populate years based on selected month
function populateYears() {
    const monthSelect = document.getElementById('month');
    const daySelect = document.getElementById('day');
    const yearSelect = document.getElementById('year');
    yearSelect.disabled = false;
    yearSelect.innerHTML = '';
    const selectedMonth = monthSelect.value;
    const selectedDay = daySelect.value;
    if (selectedMonth == 2 && selectedDay == 29) {
        const currentYear = parseInt(current_year);
        for (let i = currentYear - 16; i >= currentYear - 150; i--) {
            const isLeapYear = (i % 4 === 0 && i % 100 !== 0) || i % 400 === 0;
            if (isLeapYear) {
                const option = document.createElement('option');
                option.value = i;
                option.text = i;
                yearSelect.appendChild(option);
            }
        }
    } else {
        const currentYear = parseInt(current_year);
        for (let i = currentYear - 16; i >= currentYear - 150; i--) {
            const option = document.createElement('option');
            option.value = i;
            option.text = i;
            yearSelect.appendChild(option);
        }
    }
}

// Function to check eligibility
function isEligible() {
    const daySelect = document.getElementById('day');
    const monthSelect = document.getElementById('month');
    const yearSelect = document.getElementById('year');
    const selectedDay = daySelect.value;
    const selectedMonth = monthSelect.value;
    const selectedYear = yearSelect.value;
    const dob = new Date(selectedYear, selectedMonth - 1, selectedDay);
    const age = current_year - dob.getFullYear();
    return age >= 16;
}

// Populate days initially

// Add event listeners
document.getElementById('day').addEventListener('change', () => {
    populateMonths();
    isEligible() ? showSubmit() : hideSubmit();
});
populateDays();
document.getElementById('month').addEventListener('change', () => {
    populateYears();
    isEligible() ? showSubmit() : hideSubmit();
});
document.getElementById('year').addEventListener('change', () => {
    isEligible() ? showSubmit() : hideSubmit();
});


// Get all gender cards
const genderCards = document.querySelectorAll('.gender-card');

// Add event listener to each card
genderCards.forEach((card) => {
    card.addEventListener('click', () => {
        // Remove active class from all cards
        genderCards.forEach((c) => c.classList.remove('active'));

        // Add active class to the clicked card
        card.classList.add('active');

        // Check the corresponding radio button
        card.querySelector('input[type="radio"]').checked = true;
    });
});


document.addEventListener("DOMContentLoaded", function () {
    const textElement = document.querySelector('.typing-text');
    const text = textElement.textContent.trim();
    textElement.innerText = ""; // Clear the text element

    let index = 0;
    let typingSpeed = 50; // Speed for typing effect
    let erasingSpeed = 20; // Speed for erasing effect
    let typingDelay = 2000; // Delay before starting to erase

    // Typing function
    function type() {
        if (index < text.length) {
            textElement.textContent += text[index];
            index++;
            setTimeout(type, typingSpeed);
        } else {
            // After typing is complete, wait before starting to erase
            setTimeout(erase, typingDelay);
        }
    }

    // Erasing function
    function erase() {
        if (textElement.textContent.length > 0) {
            textElement.textContent = textElement.textContent.slice(0, -1);
            setTimeout(erase, erasingSpeed);
        } else {
            // Hide the element after erasing is complete
            setTimeout(() => {
                textElement.style.display = "none";
            }, 1000); // Small delay before hiding
        }
    }

    // Start the typing effect
    type();
});


const form = document.querySelector(".login-form");

// Add event listener for form submission
form.addEventListener('submit', function (event) {
    // Prevent the default form submission
    event.preventDefault();
    console.log("hello world");
    // Get form data
    const formData = new FormData(form);

    // Convert FormData to a plain object
    const data = {};
    formData.forEach((value, key) => {
        data[key] = value;
    });


    // Optionally clear the form fields
    form.reset();
});