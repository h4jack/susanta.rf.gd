<?php
function getCurrentPageUrl()
{
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];
    $requestUri = $_SERVER['REQUEST_URI'];

    return "$protocol://$host$requestUri";
}

function print_head($username, $title)
{
    echo "
    <header>
        <div class=\"header-top\">
            <div class=\"menu-btn menu-open\" id=\"menuBtnOpen\">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <h1>$title</h1>
            <div class=\"void\"></div>
        </div>
        <div class=\"full-bar\"></div>
    </header>
";
    loadMenuBar($username);
}

function print_footer()
{
    echo "
        <!-- Footer -->
    <footer id=\"contact\">
        <div class=\"contact\">
            <div class=\"contact-form\">
                <form action=\"submit.php\" method=\"post\">
                    <p class=\"contact-heading\">Contact Us</p>
                    <div class=\"form-group\">
                        <label for=\"name\">Your Name:</label>
                        <input type=\"text\" id=\"name\" name=\"name\" placeholder=\"Your Name\" required>
                    </div>
                    <div class=\"form-group\">
                        <label for=\"email\">Your Email:</label>
                        <input type=\"email\" id=\"email\" name=\"email\" placeholder=\"Your Email\" required>
                    </div>
                    <div class=\"form-group\">
                        <label for=\"subject\">Subject:</label>
                        <input type=\"text\" id=\"subject\" name=\"subject\" placeholder=\"Enter the Subject for the Message\"
                            required>
                    </div>
                    <div class=\"form-group\">
                        <label for=\"message\">Message:</label>
                        <textarea id=\"message\" name=\"message\" placeholder=\"Describe what you want to say..\"
                            required></textarea>
                    </div>
                    <button type=\"submit\" class=\"btn\">Submit</button>
                </form>
            </div>
            <div class=\"full-bar footer-full-bar\"></div>
            <div class=\"contact-info\">
                <p class=\"contact-heading\">Contact Information</p>
                <div class=\"myinfo\">
                    <p>Email:
                        <a href=\"mailto:talk.susantamandi@gmail.com\">talk.susantamandi@gmail.com</a>
                    </p>
                    <p>Mob No:
                        <a href=\"tel:917557888303\">+91 7557888303</a>
                    </p>
                    <p>Address:
                        <a href=\"https://maps.app.goo.gl/ykeSiCvapp5wDpuD6\" draggable=\"false\" target=\"_blank\">Kolkata, West Bengal</a>
                    </p>
                </div>
                <div class=\"full-bar\" style=\"border-radius: 0px;\"></div>
                <p class=\"contact-heading\">Follow Us</p>
                <div class=\"social-links\">
                    <a href=\"https://github.com/h4jack\" draggable=\"true\" target=\"_blank\">
                        <div class=\"social-icon github-icon\"></div>
                        <p class=\"social-text\">@h4jack</p>
                    </a>
                    <a href=\"https://x.com/sus4nta\" draggable=\"true\" target=\"_blank\">
                        <div class=\"social-icon x-icon\"></div>
                        <p class=\"social-text\">@su4anta</p>
                    </a>
                    <a href=\"https://instagram.com/su_4nta\" draggable=\"true\" target=\"_blank\">
                        <div class=\"social-icon insta-icon\"></div>
                        <p class=\"social-text\">@su_4nta</p>
                    </a>
                    <a href=\"https://m.facebook.com/sus4nta\" draggable=\"true\" target=\"_blank\">
                        <div class=\"social-icon facebook-icon\"></div>
                        <p class=\"social-text\">@sus4nta</p>
                    </a>
                    <a href=\"https://www.linkedin.com/in/susantamandi/\" draggable=\"true\" target=\"_blank\">
                        <div class=\"social-icon linkedin-icon\"></div>
                        <p class=\"social-text\">@susantamandi</p>
                    </a>
                </div>
                <div class=\"full-bar\"></div>
                <p class=\"contact-heading\">Explore More</p>
                <div class=\"more_link_box\">
                    <div class=\"more_link_left\">
                        <div class=\"more_link_top\">
                            <p class=\"footer_none\">Explore</p>
                            <a href=\"/api\">Apis</a>
                            <a href=\"/tools\">Tools</a>
                            <a href=\"/mycode\">MyCodes</a>
                            <a href=\"/p\">Projects</a>
                        </div>
                        <div class=\" more_link_bottom\">
                            <p class=\"footer_none\">Read Details</p>
                            <a href=\"/b\">Blogs</a>
                            <a href=\"/materials\">Materials</a>
                            <a href=\"/docs\">Dcoumentation</a>
                            <a href=\"/learn\">Learning</a>
                        </div>
                    </div>
                    <div class=\"more_link_right\">
                        <div class=\"more_link_top\">
                            <p class=\"footer_none\">Connect</p>
                            <a href=\"/community\">Community</a>
                            <a href=\"#contact\">Contact-Us</a>
                            <a href=\"/about\">About</a>
                        </div>
                        <div class=\"more_link_bottom\">
                            <p class=\"footer_none\">Get Help</p>
                            <a href=\"/help\">Help</a>
                            <a href=\"/feedback\">Feedback</a>
                            <a href=\"/report\">Report</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"copyright\">
            © 2024 Susanta Mandi at <a href=\"https://susanta.rf.gd/\">susanta.rf.gd</a> all rights reserved. <a
                href=\"/rules/#tnc\">Terms of Service</a> | <a href=\"/rules/#pp\">Privacy Policy</a>
        </div>
    </footer>
";
}

function link_css($paths)
{
    foreach ($paths as $path) {
        echo "<link rel=\"stylesheet\" href=\"$path\">\n";
    }
}

function link_script($paths)
{
    foreach ($paths as $path) {
        echo "<script src=\"$path\"></script>\n";
    }
}


function load_sidebar($put)
{
    // load top 5 content.. on the sidebar..
    // 3 random from top 10 2 recent. recent, top, recent, top, top..
    echo "
        <!-- Sidebar (if applicable) -->
        <aside class=\"sidebar\">
            <div class=\"widgets\">
                <!-- Widgets or tools can be placed here -->
                <div class=\"side_feed\">
                    <img src=\"/assets/test.png\" alt=\"$put the alt variable there$\" class=\"side_feed_img\">
                    <div class=\"side_feed_body\">
                        <p class=\"title\">loksobha</p>
                        <p class=\"description\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex error harum
                            assumenda eveniet voluptatibus fugiat omnis aspernatur iusto doloremque placeat perspiciatis
                            voluptate praesentium amet eum veniam ratione, reiciendis adipisci velit.</p>
                    </div>
                </div>
                <div class=\"side_feed\">
                    <img src=\"/assets/test.png\" alt=\"$put the alt variable there$\" class=\"side_feed_img\">
                    <div class=\"side_feed_body\">
                        <p class=\"title\">loksobha</p>
                        <p class=\"description\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex error harum
                            assumenda eveniet voluptatibus fugiat omnis aspernatur iusto doloremque placeat perspiciatis
                            voluptate praesentium amet eum veniam ratione, reiciendis adipisci velit.</p>
                    </div>
                </div>
            </div>
        </aside>";
}

function print_sign_form()
{
    $current_page_url = htmlspecialchars(getCurrentPageUrl(), ENT_QUOTES);
    echo "
        <div id=\"sign_body\" class=\"sign_body\">
                <p id=\"close-sign-box\" type=\"submit\"></p>
                <div id=\"sign-up\" class=\"sign_form\">
                    <h2>Sign Up</h2>
                    <form id=\"user-form\" action=\"/profile/signup/getotp/\" method=\"POST\" class=\"sing_inputs\">
                            <input type=\"hidden\" name=\"redir\" value=\"$current_page_url\">
                        <span id=\"user-error\" class=\"error\"></span>
                        <input type=\"text\" id=\"username\" name=\"username\" minlength=\"3\" maxlength=\"30\" class=\"sign_username sing_input_fields\" placeholder=\"username\" required>
                        <span id=\"email-error\" class=\"error\"></span>
                        <input type=\"email\" id=\"login-email\" name=\"email\" maxlength=\"50\" class=\"sign_email sing_input_fields\" placeholder=\"email\" required>
                        <input type=\"password\" id=\"pass\" minlength=\"8\" maxlength=\"30\" name=\"password\" class=\"sign_password sing_input_fields\" placeholder=\"password\" required>
                        <span id=\"pass-error\" class=\"error\"></span>
                        <input type=\"password\" id=\"vpass\" name=\"vpassword\" class=\"sign_password sing_input_fields\" placeholder=\"verify password\" required>
                        <div class=\"checkbox_box\">
                            <input type=\"checkbox\" class=\"checkbox\" name=\"accept_tnc\" value=\"true\" required>
                            <label for=\"checkbox\" class=\"accept_tnc\">Accept <a href=\"/rules#tnc\" target=\"_blank\">Tarms and
                                    Conditions</a></label>
                        </div>
                        <input type=\"submit\" class=\"sign_submit_btn\" value=\"Sign Up\">
                    </form>
                    <div class=\"sign_in\">
                        <p class=\"accept_tnc\">Already have an account. <u
                                id=\"signin\">Sign In.</u></p>
                    </div>
                </div>
                <div id=\"sign-in\" class=\"sign_form\">
                    <h2>Sign In</h2>
                    <p id=\"login-error\" class=\"error\">Error: show error</p>
                    <form class=\"sing_inputs\" action=\"/profile/signin/getotp/\" method=\"POST\">
                        <input type=\"text\" name=\"username\" class=\"sign_username sing_input_fields\" placeholder=\"username\" required>
                        <input type=\"password\" name=\"password\" class=\"sign_password sing_input_fields\"
                            placeholder=\"password\" required>
                        <p style=\"align-self:start\">Can't sign in. <a href=\"/sign-help\">need help?</a></p>
                        <input type=\"submit\" class=\"sign_submit_btn\" value=\"Sign In\">
                    </form>
                    <div class=\"sign_in\">
                        <p class=\"accept_tnc\">Don't have an Account, <u id=\"signup\">Create.</u></p>
                    </div>
                </div>
            </div>
    ";
    echo "
    <script>
    document.addEventListener('DOMContentLoaded', function () {
    const signBody = document.getElementById(\"sign_body\");
    const closeSignBox = document.getElementById(\"close-sign-box\");

    // Event listener for \"Sign-Up\" button
    document.getElementById(\"signup\").addEventListener('click', function () {
        show_sign_up();
    });

    // Event listener for \"Close\" button
    closeSignBox.addEventListener('click', function () {
        signBody.style.display = 'none';
        closeSignBox.style.display = 'none';
    });

    // Event listener for \"Sign-In\" button
    document.getElementById(\"signin\").addEventListener('click', function () {
        show_sign_in();
    });

    // Event listener for \"Sign-In\" button
    document.getElementById(\"sign-self\").addEventListener('click', function () {
        show_sign_up();
        hideMenu();
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

// Add event listeners for real-time validation
document.getElementById(\"username\").addEventListener(\"keyup\", () => {
    const username = document.getElementById(\"username\").value;
    const userError = document.getElementById(\"user-error\");

    // Check length
    checkLength(username.length, document.getElementById(\"username\").maxLength, \"user-error\");

    // Validate username
    if (!validateUsername(username)) {
        userError.style.display = 'block';
        userError.innerText = \"Invalid username. Must be lowercase, can contain underscores and dots, but no consecutive dots or dots at the beginning/end.\";
    } else {
        userError.style.display = 'none';
    }
});


document.getElementById(\"pass\").addEventListener(\"keyup\", () => {
    const pass = document.getElementById(\"pass\").value;
    checkLength(pass.length, document.getElementById(\"pass\").maxLength, \"pass-error\");
    verifyPassword(); // Ensure password verification is up-to-date
});

document.getElementById(\"vpass\").addEventListener(\"keyup\", () => {
    verifyPassword(); // Ensure password verification is up-to-date
});

document.getElementById(\"login-email\").addEventListener(\"keyup\", () => {
    const email = document.getElementById(\"login-email\").value;
    const emailError = document.getElementById(\"email-error\");

    // Check length
    checkLength(email.length, document.getElementById(\"login-email\").maxLength, \"email-error\");

    // Validate email
    if (!validateEmail(email)) {
        emailError.style.display = 'block';
        emailError.innerText = \"Invalid email address.\";
    } else {
        emailError.style.display = 'none';
    }
});

document.getElementById(\"user-form\").addEventListener(\"submit\", (event) => {
    event.preventDefault(); // Prevent the default form submission

    let formIsValid = true;

    // Validate username
    const username = document.getElementById(\"username\").value;
    const userError = document.getElementById(\"user-error\");

    // Check length
    checkLength(username.length, document.getElementById(\"username\").maxLength, \"user-error\");

    // Validate username
    if (!validateUsername(username)) {
        userError.style.display = 'block';
        userError.innerText = \"Invalid username. Must be lowercase, can contain underscores and dots, but no consecutive dots or dots at the beginning/end.\";
        formIsValid = false;
    } else {
        userError.style.display = 'none';
    }

    // Validate password length
    const pass = document.getElementById(\"pass\").value;
    const passError = document.getElementById(\"pass-error\");
    checkLength(pass.length, document.getElementById(\"pass\").maxLength, \"pass-error\");

    // Validate password match
    const vpass = document.getElementById(\"vpass\").value;
    if (vpass !== pass) {
        passError.style.display = 'block';
        passError.innerText = \"Passwords do not match.\";
        formIsValid = false;
    } else {
        passError.style.display = 'none';
    }

    // Validate email
    const email = document.getElementById(\"login-email\").value;
    const emailError = document.getElementById(\"email-error\");
    if (!validateEmail(email)) {
        emailError.style.display = 'block';
        emailError.innerText = \"Invalid email address.\";
        formIsValid = false;
    } else {
        emailError.style.display = 'none';
    }
    checkLength(email.length, document.getElementById(\"login-email\").maxLength, \"email-error\");

    // If form is valid, you can proceed with form submission or other actions
    if (formIsValid) {
        document.getElementById(\"user-form\").submit(); // Submit the form
    }
});



function checkLength(length, maxLength, errorElementId) {
    const errorElement = document.getElementById(errorElementId);
    errorElement.className = 'warning'; // Default to warning class

    if (length === maxLength) {
        errorElement.style.display = 'block';
        errorElement.innerText = \"Length limit is \" + maxLength;
    } else if (length > maxLength) {
        errorElement.style.display = 'block';
        errorElement.innerText = \"Input length exceeds limit, maximum length is \" + maxLength;
    } else {
        errorElement.style.display = 'none';
    }
}

function verifyPassword() {
    const pass = document.getElementById(\"pass\").value;
    const vpass = document.getElementById(\"vpass\").value;
    const passError = document.getElementById(\"pass-error\");

    passError.className = 'error'; // Default to error class

    if (vpass === pass) {
        passError.style.display = 'none';
    } else {
        passError.style.display = 'block';
        passError.innerText = \"Passwords do not match.\";
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
    </script>
    ";
}

function printMenuList()
{
    echo "
        <a href=\"/\" draggable=\"true\">Home</a>
        <a href=\"/services\" draggable=\"true\">Services</a>
        <a href=\"/tools\" target=\"_blank\" draggable=\"true\">Tools</a>
        <a href=\"/p\" target=\"_blank\" draggable=\"true\">Projects</a>
        <a href=\"/b\" target=\"_blank\" draggable=\"true\">Blogs</a>
        <a href=\"/com\" target=\"_blank\" draggable=\"true\">Community</a>
        <a href=\"/learn/\" target=\"_blank\" draggable=\"true\">Learn</a>
        <a href=\"/materials/\" target=\"_blank\" draggable=\"true\">Materials</a>
        <a href=\"/api/\" target=\"_blank\" draggable=\"true\">Apis</a>
        <a href=\"/docs\" target=\"_blank\" draggable=\"true\">Documentation</a>
        <a href=\"/mycode\" target=\"_blank\" draggable=\"true\">MyCodes</a>
        <a href=\"#contact\" draggable=\"true\">Contact</a>
        <a href=\"/me\" draggable=\"true\">About Me</a>
        <a href=\"/about\" draggable=\"true\">About</a>
        <a href=\"/help\" draggable=\"true\">Help</a>
        <a href=\"/help#feedback\" draggable=\"true\">Feedback</a>
        <a href=\"/help#report\" draggable=\"true\">Report</a>
        </div>
    <div class=\"sidebar-close\" id=\"sidebar-close\">
    </div>
</aside>";
}

function loadMenuBar($username)
{
    echo "<aside id=\"sidebar\" class=\"sidebar\">
            <div class=\"sidebar-items\">
    ";
    if ($username) {
        $has_pimage = true;
        if ($has_pimage) {
        }
        echo "
                <a href=\"/profile/$username\" class=\"menu-profile-a\" draggable=\"true\">
                    <div class=\"menu-profile\" style=\"background-imasge: url(/assets/myself.jpg); background-size: contain;\">
                    </div>
                </a>
        ";
        printMenuList();
    } else {
        echo "
                <a id=\"sign-self\" class=\"menu-profile-a\">
                    <p class=\"profile-signup\">Sign Up</p>
                </a>
        ";
        printMenuList();
        print_sign_form();
    }
}
