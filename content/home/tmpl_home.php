<?php
/*
 * Creat de scriptul facut de Marius Trifu
 * La data de 04-09-2017 si ora 21:38:16
 * Pentru intrebari trifumarius01@gmail.com
 */

defined("autorizare") or die("Nu aveti autorizare");
?>
<main class="mdl-layout__content" style="margin-top: -20px;background-color: #dfe6e9;">
    <div class="mdl-grid">
        <div class = "mdl-cell mdl-cell--12-col append_after_this">
            <button id="add_dashboard" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
                <i class="material-icons">add</i>
            </button>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
                <input type="text" value="" class="mdl-textfield__input" id="d1" readonly>
                <input type="hidden" value="" name="d1">
                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                <label for="d1" class="mdl-textfield__label">Selectează Dashboard</label>
                <ul id="home_select_dashboard" for="d1" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                    <?php for ($i = 0; $i < count($dashboards); $i++) { ?>
                        <li data-poz="<?php echo $i; ?>" class="mdl-menu__item item_dash" <?php echo $i == $current_dashboard ? 'data-selected=\"true\"' : ''; ?>>
                            <?php echo $dashboards[$i]["nume"]; ?>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <button style="float: right;" class="mdl-button mdl-button--icon mdl-button--colored"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
        </div>

        <?php for ($i = 0; $i < count($sensors); $i++) { ?>
            <div class = "mdl-card mdl-cell mdl-cell--2-col mdl-shadow--16dp card_senzor" style="background-color: white;min-height: 0px;">
                <div class="mdl-card__title  mdl-card--border" style="padding: 5px;background-color: #b2bec3;">
                    <span style="margin-left: 3px;"><?php echo $sensors[$i]["nume"]; ?></span>
                    <div class="mdl-layout-spacer"></div>
                    <button data-id="<?php echo $sensors[$i]["id"]; ?>" class="mdl-button grafic_button"><i class="fa fa-bar-chart graph_home_box_icon" aria-hidden="true"></i></button>
                </div>
                <div class="mdl-card__title" style="padding: 0px;padding-top: 5px;font-size: 22px;">
                    <div class="mdl-layout-spacer"></div>
                    <?php echo $sensors[$i]["tip"]; ?>&nbsp;&nbsp; <?php tip_simbol($sensors[$i]["tip"]); ?>
                    <div class="mdl-layout-spacer"></div>
                </div>
                <div class="mdl-card__title mdl-card--border" style="padding: 5px;font-size: 35px;font-weight: 300;">
                    <div class="mdl-layout-spacer"></div>
                    <?php echo $sensors[$i]["valoare"] == "" ? "&#8203;" : $sensors[$i]["valoare"] . " " . $sensors[$i]["um"]; ?>
                    <div class="mdl-layout-spacer"></div>
                </div>
                <div class="mdl-card__title" style="padding: 5px;">
                    <button data-poz="<?php echo $i; ?>" data-id="<?php echo $sensors[$i]["id"]; ?>" class="mdl-button mdl-button--icon mdl-button--colored operation_senzor">∑</button>
                    <div class="mdl-layout-spacer"></div>
                    <button data-id="<?php echo $sensors[$i]["id"]; ?>" class="mdl-button mdl-button--icon mdl-button--colored delete_senzor"><i style="color:red;" class="fa fa-trash" aria-hidden="true"></i></button>&nbsp;
                    <div class="mdl-layout-spacer"></div>
                    <button data-poz="<?php echo $i; ?>" data-id="<?php echo $sensors[$i]["id"]; ?>" class="mdl-button mdl-button--icon mdl-button--colored edit_senzor"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                </div>
            </div>
        <?php } ?>
        <div id="card_add_senzor" class = "mdl-card mdl-cell mdl-cell--2-col" style="background-color: #dfe6e9;min-height: 0px;<?php echo count($dashboards) > 0 ? "" : "display:none;"; ?>">
            <div style="top: 50px;text-align: center;height: 80px;">
                Adaugă senzor<br>
                <button id="add_sensor" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
                    <i class="material-icons">add</i>
                </button>
            </div>
        </div>
    </div>

</main>
<div style="display:none" id="add_form">

</div>
<div id="modal_add_dashboard" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close1 close">&times;</span>
            Adaugă un nou Dashboard
        </div>
        <div class="modal-body">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" id="nume_dashboard" value="Dashboard <?php echo (count($dashboards) + 1); ?>">
                <label class="mdl-textfield__label" for="nume_dashboard">Nume</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
                <input type="text" value="" class="mdl-textfield__input" id="tip_dashboard" readonly>
                <input type="hidden" value="" name="tip_dashboard">
                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                <label for="tip_dashboard" class="mdl-textfield__label">Tip</label>
                <ul for="tip_dashboard" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                    <li class="mdl-menu__item" data-selected="true">Privat</li>
                    <li class="mdl-menu__item">Public</li>
                </ul>
            </div><br/>
            <button id="submit_new_dashboard" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                Adaugă
            </button>
        </div>
    </div>

</div>
<div id="modal_add_sensor" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close2 close">&times;</span>
            Adaugă un nou senzor
        </div>
        <div class="modal-body">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" id="nume_sensor" value="Senzor <?php echo (count($sensors) + 1); ?>">
                <label class="mdl-textfield__label" for="nume_sensor">Nume</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
                <input type="text" value="" class="mdl-textfield__input" id="decimals_sensor" readonly>
                <input type="hidden" value="" name="decimals_sensor">
                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                <label for="decimals_sensor" class="mdl-textfield__label">Număr de zecimale</label>
                <ul for="decimals_sensor" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                    <li class="mdl-menu__item" data-selected="true">0</li>
                    <li class="mdl-menu__item">1</li>
                    <li class="mdl-menu__item">2</li>
                    <li class="mdl-menu__item">3</li>
                    <li class="mdl-menu__item">4</li>
                </ul>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
                <input type="text" value="" class="mdl-textfield__input" id="tip_sensor" readonly>
                <input type="hidden" value="" name="tip_sensor">
                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                <label for="tip_sensor" class="mdl-textfield__label">Tip</label>
                <ul for="tip_sensor" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                    <li class="mdl-menu__item" data-selected="true">Număr</li>
                    <li class="mdl-menu__item">Temperatură</li>
                    <li class="mdl-menu__item">Luminozitate</li>
                    <li class="mdl-menu__item">Umiditate</li>
                </ul>
            </div><br/>
            <button id="submit_new_sensor" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                Adaugă
            </button>
        </div>
    </div>

</div>
<div id="modal_grafic_sensor" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close3 close">&times;</span>
            Grafic
        </div>
        <div class="modal-body grafic_content">
        </div>
    </div>
</div>

<div id="modal_edit_sensor" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close4 close">&times;</span>
            Edit senzor
        </div>
        <div class="modal-body">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" id="edit_nume_sensor" value="">
                <label class="mdl-textfield__label" for="edit_nume_sensor">Nume</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
                <input type="text" value="" class="mdl-textfield__input" id="edit_decimals_sensor" readonly>
                <input type="hidden" value="" name="edit_decimals_sensor">
                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                <label for="edit_decimals_sensor" class="mdl-textfield__label">Număr de zecimale</label>
                <ul id="lista_zecimale_edit" for="edit_decimals_sensor" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                    <li class="mdl-menu__item">0</li>
                    <li class="mdl-menu__item">1</li>
                    <li class="mdl-menu__item">2</li>
                    <li class="mdl-menu__item">3</li>
                    <li class="mdl-menu__item">4</li>
                </ul>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
                <input type="text" value="" class="mdl-textfield__input" id="edit_tip_sensor" readonly>
                <input type="hidden" value="" name="edit_tip_sensor">
                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                <label for="edit_tip_sensor" class="mdl-textfield__label">Tip</label>
                <ul id="lista_tip_edit" for="edit_tip_sensor" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                    <li class="mdl-menu__item">Număr</li>
                    <li class="mdl-menu__item">Temperatură</li>
                    <li class="mdl-menu__item">Luminozitate</li>
                    <li class="mdl-menu__item">Umiditate</li>
                </ul>
            </div><br/>
            <button id="save_senzor_edit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                Salvează
            </button>
        </div>
    </div>
</div>

<div id="modal_operation_sensor" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close5 close">&times;</span>
            Calculează
        </div>
        <div class="modal-body operation_body">

        </div>
        <div style="text-align:center;">
            <!-- Accent-colored raised button -->
            <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">
                Run
            </button>
        </div>
        <div style="height:100px;padding: 10px;margin-bottom: 3px;">
            <textarea readonly="true" style="height: 100%;width: 100%;"></textarea>
        </div>
    </div>

</div>

<script>
    var nr_dashboards =<?php echo count($dashboards); ?>;
    var dashboard_id =<?php echo count($dashboards) == 0 ? -1 : $dashboards[$current_dashboard]["id"]; ?>;
    var poz_dashboard =<?php echo $current_dashboard; ?>;
    var sensors = <?php echo json_encode($sensors); ?>;
</script>