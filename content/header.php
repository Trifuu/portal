<?php
/*
 * Creata de Marius Trifu
 * Pentru intrebari trifumarius01@gmail.com  * 
 */


defined("autorizare") or die("Nu aveti autorizare");
?>

<header style="position: relative;z-index: 20;<?php echo($page == "home" && $view == "dashboard") ? 'display:none;' : ''; ?>position: fixed;top: 0px;width:100%;" class="afisare">
    <nav class="navbar navbar-expand-md navbar-light"  style="background: #f1f2f6;font-size:20px;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="<?php echo _SITE_BASE; ?>"><img src="<?php echo _SITE_CSS; ?>img/logo.png" style="width:150px;height:50px;"></a>
        <div class="collapse navbar-collapse" id="navbarsExample02">
            <?php if ($page == "home" && $view == "dashboard") { ?>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" style="color: black;" href="<?php echo _SITE_BASE; ?>#top">Top <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" style="color: black;" href="<?php echo _SITE_BASE; ?>#about">About</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" style="color: black;" href="<?php echo _SITE_BASE; ?>#solution">Solution</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" style="color: black;" href="<?php echo _SITE_BASE; ?>#team">Team</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" style="color: black;" href="<?php echo _SITE_BASE; ?>#contact">Contact</a>
                    </li>
                </ul>
            <?php } else { ?>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" style="color: black;" href="<?php getUrl("grafana", "dashboard", true) ?>">Monitoring <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" style="color: black;" href="<?php getUrl("node-red", "dashboard", true) ?>">Devices</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" style="color: black;" href="<?php getUrl("predictie", "dashboard", true) ?>">Prediction</a>
                    </li>
                </ul>
            <?php } ?>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                    <a class="nav-link" style="color: black;" href="<?php getUrl("home", "portal", true) ?>">Portal</a>
                </li>
            </ul>
        </div>
    </nav>
</header>