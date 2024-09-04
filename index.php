<?php
include "./module/ui/main-ui.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to HomePage</title>
    <?php
    $paths = array(
        "/module/css/main.css",
        "/module/css/menubar.css",
        "/module/css/style.css"
    );

    // Define the function before calling it
    link_css($paths);
    ?>
</head>

<body>
    <?php
    print_head("asfd", "Home");
    ?>
    <!-- Main Content Area -->
    <main>
        <section class="page-content">
            <h1>To Build Your Future, You Have To Build Yourself.</h1>
            <p>I am a Computer Enthusiast. Currently Contributing to Open-Source Projects. Look I am Un-Successful because I only build websites never build my future. so don't forget this quote. Explore <a href="#explore-products">Contents.</a></p>
            <div class="quick-links">
                <a href="/b/" class="cta-button">😊 Blogs</a>
                <a href="/p" class="cta-button">😒 Projects</a>
                <a href="/tools/" class="cta-button">😍 Tools</a>
            </div>
        </section>
        <div class="full-bar some-margin"></div>
        <h2 style="margin: 10px 0 20px 0;">Explore</h2>
        <section id="explore-products" class="explore-products">
            <div class="product">
                <div class="top">
                    <div class="icon">😍</div>
                    <div class="title">Tools</div>
                </div>
                <p class="description">I have made a <a href="/tools/">Tools</a> Section where you can really use awesome tools to faster your productivity.</p>
            </div>
            <div class="product">
                <div class="top">
                    <div class="icon">😍</div>
                    <div class="title">Profile</div>
                </div>
                <p class="description">You can <a href="/profile/">Create</a> your profile with Email. and now you can access more features. can comment on post/blogs. create post. join community, groups, chat rooms.</p>
            </div>
            <div class="product">
                <div class="top">
                    <div class="icon">😍</div>
                    <div class="title">Learning</div>
                </div>
                <p class="description">if you want to <a href="/learn/">learn</a> information technology. or want to grow in this digital world then this section is for you. your profile with Email. and now you can access more features. can comment on post/blogs. create post. join community.</p>
            </div>
            <div class="product">
                <div class="top">
                    <div class="icon">😍</div>
                    <div class="title">Blogs</div>
                </div>
                <p class="description">Go to <a href="/b/">Blogs</a> to read blogs, trending tech news, and articles. you can save blogs. react on blogs, like, comment. </p>
            </div>
            <div class="product">
                <div class="top">
                    <div class="icon">😍</div>
                    <div class="title">Projects</div>
                </div>
                <p class="description">In the <a href="/p/">Project</a> Section you can explore my projects. that are none but the application that I have build. this projects can be small/wide application. you can use them if they are useful to you</p>
            </div>
            <div class="product">
                <div class="top">
                    <div class="icon">😍</div>
                    <div class="title">Community</div>
                </div>
                <p class="description">Join <a href="/community/">Community</a> and Make your network big.</p>
            </div>
            <div class="product">
                <div class="top">
                    <div class="icon">😍</div>
                    <div class="title">MyCodes</div>
                </div>
                <p class="description">If you are a Developer. This Section is specifically for you. you can see the <a href="/mycode/">Source Code</a> of my projects with explanation. like source code of tools/projects section</p>
            </div>
            <div class="product">
                <div class="top">
                    <div class="icon">😍</div>
                    <div class="title">Feedback/Suggestion</div>
                </div>
                <p class="description">This is specially for you. if you want to give <a href="/feedback/">Feedback, Suggestion</a>, or want any features to be added. just make a request on the feedback tab.</p>
            </div>
        </section>
    </main>
    <?php
    include "./module/ui/footer.html";
    ?>
</body>

</html>