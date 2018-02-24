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

    </head>
    <body>
        <?php echo $content; ?>
        
    </body>
</html>