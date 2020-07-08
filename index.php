<!doctype html>
    <head>
        <?php include './root/header.php' ?>
        <meta name="google-site-verification" content="avUJ1EXVTYeClRcjbyA9wQy3jAghkCv-ILIzAYtIQKo" />

    </head>

    <body>
        <?php $previousUrl = $_SERVER['HTTP_REFERER']; ?>
        <script> location.href='./root/main.php?previousUrl=<?php echo $previousUrl ?>'; </script>;
    </body>
</html>
