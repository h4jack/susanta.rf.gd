<?php
function print_head($username = "", $visible = true)
{
    echo "
    <!-- Header -->
    <header>
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\">
        <div class=\"navbar\">
            <div class=\"left\">
                <a class=\"active\" href=\"/\"><i class=\"fa fa-fw fa-home\"></i> Home</a>
                <a href=\"#\"><i class=\"fa fa-fw fa-search\"></i> Search</a>
            </div>
            <div class=\"right\">
                <a href=\"#\"><i class=\"fa fa-fw fa-envelope\"></i> Contact</a>
";
    if($visible){
        if($username){
            echo "
            <style>
                .fa-user-big {
                    margin: 0px;
                    height: 40px;
                    width: 40px;
                    font-size: 20px;
                    text-align: center;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    background-color: #00000030;
                    border: 1px;
                    border-radius: 50%;
                }
            </style>
                <a href=\"/profile/\">
                    <p class=\"profile-name\">$username </p>
                    <i class=\"fa fa-fw fa-user-big fa-user\"></i>
                </a>
";
        }else{
            echo "
            <a style=\"cursor:pointer;\" id=\"sign_in\"><i class=\"fa fa-fw fa-user\"></i> Sign-Up</a>
";
        }
    }
    echo "
            </div>
        </div>
        <div class=\"nav_bar_bottom\"></div> 
    </header>
    ";
}

function print_footer()
{
    echo "
        <!-- Footer -->
    <footer class=\"footer\">
        <div class=\"follow-us\">
            <h3>Follow Us</h3>
            <a href=\"http://github.com/h4jack\" target=\"_blank\" rel=\"noopener noreferrer\">
                <span class=\"social-icon github-icon\"></span>
            </a>
            <a href=\"#linkedin\" target=\"_blank\" rel=\"noopener noreferrer\">
                <span class=\"social-icon linkedin-icon\"></span>
            </a>
            <a href=\"#twitter\" target=\"_blank\" rel=\"noopener noreferrer\">
                <span class=\"social-icon twitter-icon\"></span>
            </a>
            <a href=\"http://instagram.com/sus4nta\" target=\"_blank\" rel=\"noopener noreferrer\">
                <span class=\"social-icon instagram-icon\"></span>
            </a>
        </div>
        <div class=\"more_link_box\">
            <div class=\"more_link_left\">
                <div class=\"more_link_top\">
                    <p class=\"footer_none\">Explore</p>
                    <a href=\"/apis\">Apis</a>
                    <a href=\"/tools\">Tools</a>
                    <a href=\"/profile/\">MyCodes</a>
                    <a href=\"/p\">Projects</a>
                </div>
                <div class=\" more_link_bottom\">
                    <p class=\"footer_none\">Read Details</p>
                    <a href=\"/b\">Blogs</a>
                    <a href=\"/materials\">Materials</a>
                    <a href=\"/docs\">Dcoumentation</a>
                    <a href=\"/sitemap\">Sitemap</a>
                </div>
            </div>
            <div class=\"more_link_right\">
                <div class=\"more_link_top\">
                    <p class=\"footer_none\">Connect</p>
                    <a href=\"/community\">Community</a>
                    <a href=\"/contact-us\">Contact-Us</a>
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
        <div class=\"footer-navigation\">Make sure you accepts the
            <a href=\"#\">Terms of Service and Conditions</a> based on your role and use cases of our services or/and
            products. You
            can also read the <a href=\"#\">Privacy Policy</a> of our site. and yea I am Us. if you love what i provide
            please <a href=\"/donate\">buy</a> me a cup of coffie. if you want to know more click <a href=\"/about/\">about</a> me.
        </div>
        <div class=\"copyright\">
            <p>&copy; 2024 susanta.rf.gd. All rights reserved.</p>
        </div>
    </footer>
";

}
        
function link_css($paths) {
    foreach ($paths as $path) {
        echo "<link rel=\"stylesheet\" href=\"$path\">\n";
    }
}

function load_sidebar($put){
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

?>