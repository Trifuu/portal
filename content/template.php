<?php
/*
 * Creat de scriptul facut de Marius Trifu
 * La data de 04-09-2017 si ora 21:38:16
 * Pentru intrebari trifumarius01@gmail.com
 */

defined("autorizare") or die("Nu aveti autorizare");
?>

<!DOCTYPE html>
<html lang="ro-RO">
    <head>
        <title><?php echo $title_app_title . $title_app_separator . $title_app_name; ?></title>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="<?php echo _SITE_CSS; ?>/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo _SITE_CSS; ?>material_icons">
        <link rel="stylesheet" href="<?php echo _SITE_CSS; ?>material.min.css">
        <?php
        if (count($css) > 0) {
            foreach ($css as $row) {
                echo '<link rel="stylesheet" href="' . _SITE_CSS . $row . '">';
            }
        }
        ?>
        
        <link rel="stylesheet" href="<?php echo _SITE_CSS; ?>styles.css">

    </head>
    <body style="background-color:#333333;height: 90%;">
        
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
            <?php require_once _ROOT_CONTENT . "header.php"; ?>
            <?php require_once $content; ?>
        
        
            <script>var _SITE_BASE = "<?php echo _SITE_BASE; ?>";</script>
            <script src="<?php echo _SITE_JS ?>jquery-3.2.1.min.js"></script>
            <script src="<?php echo _SITE_JS ?>material.min.js"></script>
            <?php
            if (count($js) > 0) {
                foreach ($js as $row) {
                    echo '<script src="' . _SITE_JS . $row . '"></script>' . "\r\n";
                }
            }
            ?>
        </div>
    </body>
</html>