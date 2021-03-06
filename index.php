<?php
session_start();
require_once "classes/imageuploader/imageuploader.php";
$_SESSION["imageuploader"] = new imageuploader(600, 480, "upload/");
$picuploader = $_SESSION["imageuploader"];
?>
<!doctype html>
<html>
    <head>
        <title>Upload test</title>
        <link rel="stylesheet" href="css/style.css">

    </head>
    <body>
        <div class="col6 center clearfix">
            <?php
            /* POST HANDLER */
            if (isset($_POST)) {
                if (isset($_FILES["picture"])) {
                    $image = $_FILES["picture"];
                    $picuploader->upload("picture", $_FILES["picture"]);
                    $picuploader->dodebug();
                    $array = $picuploader->get_all_images();
                    foreach ($array as $image) {
                        echo sprintf("<div class=\"center\"><img src=\"upload/%s\"></div>", $image["name"]);
                    }
                }
            }
            ?>

            <form method="post" enctype="multipart/form-data">
                <label>Upload</label>
                <input type="file" name="picture[]">
                <input type="file" name="picture[]">
                <input type="submit" value="Upload">
            </form>
        </div>
    </body>
</html>
