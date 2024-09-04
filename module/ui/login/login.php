<?php
function getOtpUi(string $email = "NULL", string $error = ""):void
{
    echo "
<link rel=\"stylesheet\" href=\"/module/css/login/get-otp.css\">
<div class=\"otp-box\">
    <h2>Verify Email</h2>
    <p>we have sent you an email with otp in it. put the otp below to verify your email: <b id=\"email\">$email</b></p>
    <form id=\"otp-submit-form\" action=\"\" method=\"GET\">
        <p class=\"error otp-error\" style=\"display: block;\" id=\"error\">$error</p>
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
<script type=\"module\" src=\"/module/js/login/get-otp.js\"></script>    
";
}