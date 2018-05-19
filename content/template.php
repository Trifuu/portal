<?php
/*
 * Creat de scriptul facut de Marius Trifu
 * La data de 04-09-2017 si ora 21:38:16
 * Pentru intrebari trifumarius01@gmail.com
 */

defined("autorizare") or die("Nu aveti autorizare");
?>

<!DOCTYPE html>
<html lang="ro-RO" style="height:100%">
    <head>
        <title><?php echo $title_app_title . $title_app_separator . $title_app_name; ?></title>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="<?php echo _SITE_CSS; ?>fontawesome-free-5.0.13/web-fonts-with-css/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="<?php echo _SITE_CSS; ?>bootstrap.min.css">
        <link rel="icon" type="image/png" href="<?php echo _SITE_CSS; ?>img/favicon.png">
        
        <?php
        if (count($css) > 0) {
            foreach ($css as $row) {
                echo '<link rel="stylesheet" href="' . _SITE_CSS . $row . '">';
            }
        }
        ?>

        <link rel="stylesheet" href="<?php echo _SITE_CSS; ?>styles.css">

    </head>
    <body style="background-color:#ffffff;height: 100%;">

        <?php require_once _ROOT_CONTENT . "header.php"; ?>
        <?php require_once $content; ?>


        <script>var _SITE_BASE = "<?php echo _SITE_BASE; ?>";</script>
        <script src="<?php echo _SITE_JS ?>jquery-3.3.1.slim.min.js"></script>
        <script src="<?php echo _SITE_JS ?>popper.min.js"></script>
        <script src="<?php echo _SITE_JS ?>bootstrap.min.js"></script>
        <?php
        if (count($js) > 0) {
            foreach ($js as $row) {
                echo '<script src="' . _SITE_JS . $row . '"></script>' . "\r\n";
            }
        }
        ?>
    </body>
</html>