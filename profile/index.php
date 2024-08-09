<?php
include_once "/WorkSpace/susanta.rf.gd/module/html/main.php";
?>

<?php
if (isset($_GET['url'])) {
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-In</title>

    <?php
    $paths = array(
        "/module/css/main.css",
        "/module/css/header.css",
        "/module/css/footer.css",
        "/module/css/sign_form.css",
        "/module/css/menubar.css"
    );

    // Define the function before calling it
    link_css($paths);
    ?>
</head>

<body>
    <?php
    print_head("myname", 'Profile');
    $paths = array(
        "/module/js/header.js"
    );
    echo link_script($paths);
    ?>
    <main>
        <section class="page-content">
        </section>
    </main>
    <?php
    print_footer();
    ?>
</body>

</html>