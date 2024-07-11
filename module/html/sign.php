<?php
function print_sign_form(){
    echo "
        <div id=\"sign_body\" class=\"sign_body\">
            <p id=\"close-sign-box\" type=\"submit\"></p>
                <div id=\"sign-up\" class=\"sign_form\">
                    <h2>Sign Up</h2>
                    <p class=\"error\">Error: show error</p>
                    <div class=\"sing_inputs\">
                        <input type=\"text\" name=\"username\" class=\"sign_username sing_input_fields\" placeholder=\"username\">
                        <div class=\"email_box\">
                            <div class=\"email_box_right\">
                                <input type=\"email\" name=\"email\" class=\"sign_email sing_input_fields\" placeholder=\"email\">
                                <input type=\"text\" name=\"otp\" class=\"sign_otp sing_input_fields\" style=\"display:block;\"
                                    placeholder=\"otp\">
                            </div>
                            <div class=\"email_box_left\">
                                <input type=\"submit\" class=\"otp_btn get_otp_btn\" value=\"GetOTP\">
                                <input type=\"submit\" class=\"otp_btn put_otp_btn\" value=\"Verify\">
                            </div>
                        </div>
                        <input type=\"password\" name=\"password\" class=\"sign_password sing_input_fields\"
                            placeholder=\"password\">
                        <input type=\"password\" name=\"vpassword\" class=\"sign_password sing_input_fields\"
                            placeholder=\"verify password\">
                        <div class=\"checkbox_box\">
                            <input type=\"checkbox\" name=\"accept_tnc\" id=\"accept_tnc\" value=\"accept_tnc\">
                            <label for=\"checkbox\" class=\"accept_tnc\">Accept <a href=\"/tarms\" target=\"_blank\">Tarms and
                                    Conditions</a></label>
                        </div>
                        <input type=\"submit\" id=\"sign-up-submit\" class=\"sign_submit_btn\" value=\"Sign Up\">
                    </div>
                    <div class=\"sign_in\">
                        <p class=\"accept_tnc\">Already have an account. <u
                                id=\"signin\">Sign In.</u></p>
                    </div>
                </div>
                <div id=\"sign-in\" class=\"sign_form\">
                    <h2>Sign In</h2>
                    <p class=\"error\">Error: show error</p>
                    <div class=\"sing_inputs\">
                        <input type=\"text\" name=\"username\" class=\"sign_username sing_input_fields\" placeholder=\"username\">
                        <input type=\"password\" name=\"password\" class=\"sign_password sing_input_fields\"
                            placeholder=\"password\">
                        <p style=\"align-self:start\">Can't sign in. <a href=\"/sign-help\">need help?</a></p>
                        <input type=\"submit\" id=\"sign-in-submit\"s  class=\"sign_submit_btn\" value=\"Sign In\">
                    </div>
                    <div class=\"sign_in\">
                        <p class=\"accept_tnc\">Don't have an Account, <u id=\"signup\">Create.</u></p>
                    </div>
                </div>
            </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const signBody = document.getElementById(\"sign_body\");
            const closeSignBox = document.getElementById(\"close-sign-box\");

            // Event listener for \"Sign-Up\" button
            document.getElementById(\"signup\").addEventListener('click', function() {
                show_sign_up();
            });
            
            document.getElementById(\"sign_in\").addEventListener('click', function() {
                show_sign_up();
            });
            
            // Event listener for \"Close\" button
            closeSignBox.addEventListener('click', function() {
                signBody.style.display = 'none';
                closeSignBox.style.display = 'none';
            });
            
            // Event listener for \"Sign-In\" button
            document.getElementById(\"signin\").addEventListener('click', function() {
                show_sign_in();
            });
            
            // Function to display the sign-in form
            function show_sign_in() {
                get_sign_page(\"sign-in\");
                signBody.style.display = 'flex';
                closeSignBox.style.display = 'block';
            }

            // Function to display the sign-up form
            function show_sign_up() {
                get_sign_page(\"sign-up\");
                signBody.style.display = 'flex';
                closeSignBox.style.display = 'block';
            }

            // Function to toggle between sign-in and sign-up forms
            function get_sign_page(type) {
                const sign_in_box = document.getElementById(\"sign-in\");
                const sign_up_box = document.getElementById(\"sign-up\");
                if (type === 'sign-in') {
                    sign_in_box.style.display = 'flex';
                    sign_up_box.style.display = 'none';
                } else if (type === 'sign-up') {
                    sign_up_box.style.display = 'flex';
                    sign_in_box.style.display = 'none';
                }
            }
        });
    </script>
    ";
}
?>