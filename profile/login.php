<?php
function loadGetOTP()
{
    echo "
    <style>
main {
    height: calc(100vh - 60px);
}

.otp-box,
.otp-box form {
    display: flex;
    flex-direction: column;
    justify-content: start;
    align-items: start;
    width: 400px;
}

.otp-box form {
    height: 400px;
    justify-content: center;
}

.otp-box h2 {
    align-self: center;
    text-decoration: underline;
}

.otp-box>p {
    font-size: 15px;
}

.otp-box form>p {
    padding: 10px;
}

.otp-box form input[type=\"submit\"] {
    width: auto;
    height: 40px;
    color: #333333;
    font-weight: bold;
    font-size: 18px;
    background-color: limegreen;
    border: 0px;
    border-radius: 10px;
    padding: 10px;
    align-self: center;
    transition: background 0.3s, box-shadow 0.3s;
}

.otp-box form input[type=\"submit\"]:hover {
    background-color: rgba(233, 131, 33, 0.677);
    ;
    box-shadow: 0px 0px 5px gray;
    color: white;
    cursor: pointer;
}

.resend-box {
    width: 100%;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    padding: 10px;
}

.otp-field input[type=\"text\"] {
    /* Keep the width as you prefer */
    width: 60px;
    height: 80px;
    padding: 10px;
    font-size: 40px;
    background-color: transparent;
    outline: none;
    border: none;
    text-align: center;
    font-weight: normal;
    box-sizing: border-box;
    text-transform: uppercase;
}

.otp-field,
.input-bottom {
    display: flex;
    flex-direction: row;
    width: 100%;
    gap: 5px;
    align-items: center;
    justify-content: center;
}

.input-bottom-border {
    width: 60px;
    height: 4px;
    background-color: white;
}

@media (max-width: 440px) {
    .otp-box {
        width: 90%;
    }

    .otp-box form {
        width: 100%;
    }

    .otp-field input[type=\"text\"] {
        width: 40px;
        padding: 5px;
    }

    .input-bottom-border {
        width: 40px;
    }
}
</style>";
    echo "
            <div class=\"otp-box\">
                <h2>Verify Email</h2>
                <p>we have sent you an email with otp in it. put the otp below to verify your email: <b id=\"email\">osama@al-qaeda.af</b></p>
                <p class=\"error\" style=\"display: block;\" id=\"error\">this is just an simple error, two more error is on the sky..</p>
                <form id=\"otp-submit-form\" action=\"\" method=\"GET\">
                    <div class=\"otp-field\">
                        <input type=\"text\" minlength=\"1\" maxlength=\"1\" name=\"otp1\" id=\"otp1\" placeholder=\"N\" required>
                        <input type=\"text\" minlength=\"1\" maxlength=\"1\" name=\"otp2\" id=\"otp2\" placeholder=\"I\" required>
                        <input type=\"text\" minlength=\"1\" maxlength=\"1\" name=\"otp3\" id=\"otp3\" placeholder=\"N\" required>
                        <input type=\"text\" minlength=\"1\" maxlength=\"1\" name=\"otp4\" id=\"otp4\" placeholder=\"E\" required>
                        <input type=\"text\" minlength=\"1\" maxlength=\"1\" name=\"otp5\" id=\"otp5\" placeholder=\"1\" required>
                        <input type=\"text\" minlength=\"1\" maxlength=\"1\" name=\"otp6\" id=\"otp6\" placeholder=\"1\" required>
                    </div>
                    <div class=\"input-bottom\">
                        <span class=\"input-bottom-border\"></span>
                        <span class=\"input-bottom-border\"></span>
                        <span class=\"input-bottom-border\"></span>
                        <span class=\"input-bottom-border\"></span>
                        <span class=\"input-bottom-border\"></span>
                        <span class=\"input-bottom-border\"></span>
                    </div>
                    <div class=\"resend-box\">
                        <p class=\"resend-otp\"><a href=\"\">Resend OTP?</a></p>
                        <p id=\"attampt-left\"><b>3</b> attempt left.</p>
                    </div>
                    <input type=\"submit\" value=\"Verify\">
                    <p>Not this email address. <a href=\"./changeemail\">Change Email</a></p>
                </form>
            </div>
            ";
    echo "
            <script>
                // Select all input fields
                const otpInputs = document.querySelectorAll('.otp-field input');

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


                document.addEventListener('DOMContentLoaded', function() {
                    const inputs = document.querySelectorAll('.otp-field input');

                    inputs.forEach((input, index) => {
                        input.addEventListener('keydown', function(e) {
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
                document.getElementById(\"otp-submit-form\").addEventListener(\"submit\", function(event) {
                    event.preventDefault(); // Prevent the default form submission

                    // Collect all OTP input fields
                    const otpInputs = [
                        document.getElementById(\"otp1\"),
                        document.getElementById(\"otp2\"),
                        document.getElementById(\"otp3\"),
                        document.getElementById(\"otp4\"),
                        document.getElementById(\"otp5\"),
                        document.getElementById(\"otp6\")
                    ];

                    // Check if all OTP fields are filled
                    const allFilled = otpInputs.every(input => input.value.trim() !== \"\");

                    if (allFilled) {
                        this.submit(); // Submit the form if all fields are filled
                    } else {
                        // Optional: Handle case where not all fields are filled
                        alert(\"Please fill all OTP fields.\");
                    }
                });
            </script>";
}
