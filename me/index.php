<?php
include "../module/html/main.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="title">Susanta Mandi</title>
    <link rel="stylesheet" href="/module/css/header.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="/module/css/all.css">
    <link rel="stylesheet" href="/module/css/footer.css">
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="css/skills.css">
    <link rel="shortcut icon" href="/assets/myself.jpg" type="image/x-icon">
    <style>
        /* CSS styles can be added here for basic layout and appearance */
        body {
            font-family: 'Rubik', sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #161616;
            background-image: linear-gradient(135deg, rgba(7, 59, 96, 0.222), #161616, rgba(6, 6, 72, 0.486));
            box-shadow: inset 0px 0px 5px rgba(4, 48, 60, 0.644);
        }

        footer {
            line-height: 1.2;
        }
    </style>
    <style>
        @media (max-width:900px) {
            .main-section {
                width: 90%;
                padding: 0px 20px;
            }
        }

        @media only screen and (max-width: 768px) {
            .sidebar {
                top: 0;
                left: 0px;
                width: 100%;
                height: 100vh;
                position: fixed;
                background-color: #00000030;
            }

            .main-section {
                width: 100%;
            }

            .sidebar-items {
                margin: 0px;
                height: 100%;
            }

            .sidebar-close {
                display: block;
                width: 100%;
                background-color: #30303080;
                filter: blur(5px);
            }

            .sidebar h2 {
                display: none;
            }

            .header-top {
                justify-content: space-between;
            }

            .menu-btn {
                display: flex;
            }
        }
    </style>
</head>

<body>

    <header>
        <div class="header-top">
            <div class="menu-btn menu-open" id="menuBtnOpen">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="menu-btn menu-close" id="menuBtnClose">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <h1></h1>
            <div class="void"></div>
        </div>
        <div class="full-bar"></div>
    </header>

    <main id="main" class="container">
        <aside id="sidebar" class="sidebar">
            <div class="sidebar-items">
                <a class="active" href="#" draggable="true">Home</a>
                <a href="#about" draggable="true">About Me</a>
                <a href="/p" target="_blank" draggable="true">Projects</a>
                <a href="#skills" draggable="true">Skills</a>
                <a href="/services" draggable="true">Services</a>
                <a href="./assets/_resume.pdf" draggable="true" download>Resume/CV</a>
                <a href="/b/" target="_blank" draggable="true">Blogs</a>
                <a href="/" target="_blank" draggable="true">Website</a>
                <a href="#testimonials" draggable="true">Testimonials</a>
                <a href="#contact" draggable="true">Contact</a>
            </div>
            <div class="sidebar-close" id="sidebar-close">
            </div>
        </aside>

        <section id="main-section" class="main-section">
            <!-- Your main content (sections, articles, etc.) will go here -->
        </section>
    </main>

    <?php
    print_footer();
    ?>
    <script src="script/main.js"></script>
</body>

</html>