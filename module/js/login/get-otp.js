// Add event listeners to each input field
document.addEventListener('DOMContentLoaded', () => {
    const otpInputs = document.querySelectorAll('.otp-field input');

    otpInputs.forEach((input, index) => {
        input.addEventListener('input', (e) => {
            // Allow only alphanumeric characters
            let value = input.value.toUpperCase().replace(/[^A-Z0-9]/g, '');
            input.value = value;

            // Automatically focus on the next input field when a character is entered
            if (input.value && index < otpInputs.length - 1) {
                otpInputs[index + 1].focus();
            }
        });

        input.addEventListener('keydown', (e) => {
            // Handle backspace to shift focus back
            if (e.key === 'Backspace' && index > 0 && !input.value) {
                otpInputs[index - 1].focus();
            }
        });
    });
});


document.addEventListener('DOMContentLoaded', function () {
    const inputs = document.querySelectorAll('.otp-field input');

    inputs.forEach((input, index) => {
        input.addEventListener('keydown', function (e) {
            if (e.key === 'ArrowRight' || e.key === 'ArrowLeft') {
                e.preventDefault();
                const nextIndex = e.key === 'ArrowRight' ? index + 1 : index - 1;
                if (nextIndex >= 0 && nextIndex < inputs.length) {
                    inputs[nextIndex].focus();
                }
            }
        });
    });
});

document.getElementById("otp-submit-form").addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent the default form submission

    // Collect all OTP input fields
    const otpInputs = [
        document.getElementById("otp1"),
        document.getElementById("otp2"),
        document.getElementById("otp3"),
        document.getElementById("otp4"),
        document.getElementById("otp5"),
        document.getElementById("otp6")
    ];

    // Check if all OTP fields are filled
    const allFilled = otpInputs.every(input => input.value.trim() !== "");

    if (allFilled) {
        this.submit(); // Submit the form if all fields are filled
    } else {
        // Optional: Handle case where not all fields are filled
        alert("Please fill all OTP fields.");
    }
});