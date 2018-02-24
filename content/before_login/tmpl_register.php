<?php
/*
 * Creat de scriptul facut de Marius Trifu
 * La data de 04-09-2017 si ora 21:38:16
 * Pentru intrebari trifumarius01@gmail.com
 */

defined("autorizare") or die("Nu aveti autorizare");
?>
<main class="mdl-layout mdl-color--grey-100" style="margin-top: -20px;">
    <div class="mdl-grid" style="height: 100%">

        <div class="mdl-card mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet mdl-shadow--16dp register_box">
            <form action="<?php getUrl("before_login", "post_register", true); ?>" method="post" style="margin-top: 30px;">
                <div class="mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" type="text" id="nume" name="nume">
                    <label class="mdl-textfield__label" for="nume">Nume...</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield" style="margin-top: 15px;">
                    <input class="mdl-textfield__input" type="text" id="prenume" name="prenume">
                    <label class="mdl-textfield__label" for="prenume">Prenume...</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield" style="margin-top: 15px;">
                    <input class="mdl-textfield__input" type="email" id="email" name="email">
                    <label class="mdl-textfield__label" for="email">Email...</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield" style="margin-top: 15px;">
                    <input class="mdl-textfield__input" type="password" id="parola" name="parola">
                    <label class="mdl-textfield__label" for="parola">Parola...</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield" style="margin-top: 15px;">
                    <input class="mdl-textfield__input" type="text" id="telefon" name="telefon">
                    <label class="mdl-textfield__label" for="telefon">Telefon...</label>
                </div>
                <div style="text-align: center;">
                    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect login_button">
                        Submit
                    </button>
                </div>
            </form>

        </div>

    </div>
</main>