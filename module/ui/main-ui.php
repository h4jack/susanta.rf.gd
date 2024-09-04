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
    <link rel=\"stylesheet\" href=\"/module/css/header.css\">
    <header>
        <div class=\"header-top\">
            <div class=\"header-right\">
                <div class=\"menu-btn menu-open\" id=\"menuBtnOpen\">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <h1>Susanta Mandi</h1>
            </div>
            <a class=\"header-sign-in\" href=\"/profile/signin/\">Sign In</a>
        </div>
        <div class=\"full-bar\"></div>
    </header>
";
    loadMenuBar($username);
}

function hasPImage($username)
{
    //is has profile image, then return the username.
    //else return none value string: "none"
    return "";
}

function loadMenuBar($username)
{
    $username = hasPImage($username);
    echo "
    <aside id=\"sidebar\" class=\"sidebar\">
        <div class=\"sidebar-items\">
            <a class=\"menu-profile-box\" style=\"margin-top: 10px;\" href=\"/profile/\" draggable=\"false\">
                <img src=\"/assets/profile/$username.png\" class=\"profile-image\" alt=\"$username profile iamge}\">
            </a>
            <a href=\"/\" class=\"menu-items\" draggable=\"true\">
                <div class=\"menu-items-text\">Home</div>
            </a>
            <div class=\"bar-start-heading\">
                <p>Services</p>
                <div class=\"menu-heading-line\"></div>
            </div>
            <a href=\"/services\" class=\"menu-items\" draggable=\"true\">
                <div class=\"menu-items-text\">Services</div>
            </a>
            <div class=\"menu-item-break-bar\"></div>
            <a href=\"/tools\" class=\"menu-items\" draggable=\"true\">
                <div class=\"menu-items-text\">Tools</div>
            </a>
            <div class=\"menu-item-break-bar\"></div>
            <a href=\"/b\" class=\"menu-items\" draggable=\"true\">
                <div class=\"menu-items-text\">Blogs</div>
            </a>
            <div class=\"menu-item-break-bar\"></div>
            <a href=\"/c\" class=\"menu-items\" draggable=\"true\">
                <div class=\"menu-items-text\">Community</div>
            </a>
            <div class=\"menu-item-break-bar\"></div>
            <a href=\"/l\" class=\"menu-items\" draggable=\"true\">
                <div class=\"menu-items-text\">Learn</div>
            </a>
            <div class=\"bar-start-heading\">
                <p>For Developers</p>
                <div class=\"menu-heading-line\"></div>
            </div>
            <a href=\"/mycode/\" class=\"menu-items\" draggable=\"true\">
                <div class=\"menu-items-text\">MyCodes</div>
            </a>
            <div class=\"menu-item-break-bar\"></div>
            <a href=\"/p\" class=\"menu-items\" draggable=\"true\">
                <div class=\"menu-items-text\">Projects</div>
            </a>
            <div class=\"menu-item-break-bar\"></div>
            <a href=\"/api/\" class=\"menu-items\" draggable=\"true\">
                <div class=\"menu-items-text\">API</div>
            </a>
            <div class=\"menu-item-break-bar\"></div>
            <a href=\"/materials/\" class=\"menu-items\" draggable=\"true\">
                <div class=\"menu-items-text\">Materials</div>
            </a>
            <div class=\"menu-item-break-bar\"></div>
            <a href=\"/docs/\" class=\"menu-items\" draggable=\"true\">
                <div class=\"menu-items-text\">Docs</div>
            </a>
            <div class=\"bar-start-heading\">
                <p>About</p>
                <div class=\"menu-heading-line\"></div>
            </div>
            <a href=\"/about/\" class=\"menu-items\" draggable=\"true\">
                <div class=\"menu-items-text\">About</div>
            </a>
            <div class=\"menu-item-break-bar\"></div>
            <a href=\"/about/contact/\" class=\"menu-items\" draggable=\"true\">
                <div class=\"menu-items-text\">Contact</div>
            </a>
            <div class=\"menu-item-break-bar\"></div>
            <a href=\"/help/\" style=\"margin-bottom: 10px;\" class=\"menu-items\" draggable=\"true\">
                <div class=\"menu-items-text\">Help</div>
            </a>
        </div>
        <div class=\"sidebar-close\" id=\"sidebar-close\">
        </div>
    </aside>
    <script src=\"/module/js/ui/header.js\"></script>
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
