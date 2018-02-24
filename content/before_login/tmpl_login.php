<?php
/*
 * Creat de scriptul facut de Marius Trifu
 * La data de 04-09-2017 si ora 21:38:16
 * Pentru intrebari trifumarius01@gmail.com
 */

defined("autorizare") or die("Nu aveti autorizare");
?>
<div class="mdl-grid">

    <div class="mdl-card mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-shadow--16dp login_box">
        <form action="<?php getUrl("before_login", "login_action",true) ?>" method="post" style="margin-top: 30px;">
            <div class="mdl-textfield mdl-js-textfield">
                <input class="mdl-textfield__input" type="text" id="email" name="email">
                <label class="mdl-textfield__label" for="sample1">Email...</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield" style="margin-top: 15px;">
                <input class="mdl-textfield__input" type="password" id="parola" name="parola">
                <label class="mdl-textfield__label" for="parola">Parola...</label>
            </div>

            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect login_button">
                 Log in
            </button>
            <button onclick="location.href='<?php getUrl("before_login", "register",true); ?>';" type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect login_button">
                Register
            </button>
        </form>
        
    </div>
    
</div>