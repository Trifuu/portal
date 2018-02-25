<?php
/*
 * Creata de Marius Trifu
 * Pentru intrebari trifumarius01@gmail.com  * 
 */


defined("autorizare") or die("Nu aveti autorizare");
?>

<header class="mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
    <div class="mdl-layout__header-row">
        <div class="link_empty dimension_header_cell">
            <a class="mdl-layout-title no_decoration" href='<?php echo _SITE_BASE; ?>'>Home</a>
        </div>
        <div class="mdl-layout-spacer"></div>

        <div class="link_empty dimension_header_cell">
            <a class="mdl-layout-title no_decoration" href='<?php getUrl("about", "dashboard", true); ?>'>About</a>
        </div>
        <div class="link_empty dimension_header_cell">
            <a class="mdl-layout-title no_decoration" href='<?php getUrl("contact", "dashboard", true); ?>'>Contact</a>
        </div>
        <?php if ($_user->isLogged()) { ?>
            <button style="height: 100%;" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="options">
                <i class="material-icons">more_vert</i>
            </button>
            <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="options">
                <li class="mdl-menu__item" style="font-size: 16px;"><a style="text-decoration: none;" href="<?php getUrl("home", "disconnect", true) ?>">Disconnect</a></li>
            </ul>
        <?php } ?>
    </div>
</header>