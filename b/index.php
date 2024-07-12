<?php
include "./../module/html/main.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to HomePage</title>
    <?php
    $paths = array(
        "/module/css/footer.css",
        "/module/css/header.css",
        "/module/css/sidebar.css",
        "/module/css/main.css",
        "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    );

    link_css($paths);
    ?>
</head>

<body>
    <?php
    echo print_head("abhi");
    ?>
    <!-- Main Content Area -->
    <main>
        <section class="page-content">
            <h1>Welcome to My Site</h1>
            <p>I am a Computer Enthusiast. Currently Contributing on Open-Source Projects. Explore <a href="#sidebar">Contents..</a></p>
            <div class="quick-links">
                <a href="/about/" class="cta-button">About</a>
                <a href="/blog/" class="cta-button">Blogs</a>
                <a href="/Projects" class="cta-button">Projects</a>
                <a href="/tools/" class="cta-button">Tools</a>
            </div>
        </section>
        <!-- Sidebar (if applicable) -->
        <aside id="sidebar" class="sidebar">
            <div class="widgets">
                <div class="side_feed">
                    <img src="/assets/test.png" alt="$put the alt variable there$" class="side_feed_img">
                    <div class="side_feed_body">
                        <p class="title">Ikbal ne Kyu Kaha ki maine</p>
                        <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam dolores ratione quisquam fuga voluptates repellat, pariatur culpa unde tempora non rerum veniam molestiae eligendi, illo harum nostrum. Deserunt, iste tenetur?</p>
                    </div>
                </div>
            </div>
        </aside>
    </main>
    <?php
    echo print_footer();
    ?>
</body>

</html>