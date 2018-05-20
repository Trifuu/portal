<?php
/*
 * Creat de scriptul facut de Marius Trifu
 * La data de 04-09-2017 si ora 21:38:16
 * Pentru intrebari trifumarius01@gmail.com
 */

defined("autorizare") or die("Nu aveti autorizare");
?>

<div class="container-fluid row portal" style="text-align: center;height:100%;padding:0px;width:auto;margin:0px;">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="height:100%;background-color: #dfe4ea;">
        <table style="height: 100%;content-align:center;width:100%;z-index:10;">
            <tbody>
                <tr>
                    <td style="text-align: center;">
                        <div class="card border-primary mb-3 card_portal">
                            <a style="text-decoration: none;" href="<?php getUrl("grafana", "dashboard", true); ?>">
                                <div class="card-header portal_header_card">
                                    <i class="fas fa-chart-area fa-lg"></i> 
                                    Monitoring
                                </div>
                            </a>
                            <table class="table table-bordered table-sm" style="font-size: 12px;">
                                <tbody>
                                    <tr>
                                        <td>Demo</td>
                                        <td>Max value</td>
                                        <td id="max"><?php echo maxInflux("demo", "select max(value) from temperature"); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Demo</td>
                                        <td>Min value</td>
                                        <td id="min"><?php echo maxInflux("demo", "select min(value) from temperature"); ?></td>
                                    </tr>
<!--                                    <tr>
                                        <td>Room 3</td>
                                        <td>Pressure</td>
                                        <td>80%</td>
                                    </tr>
                                    <tr>
                                        <td>Room 4</td>
                                        <td>Consume</td>
                                        <td>70%</td>
                                    </tr>-->
                                </tbody>
                            </table>
                        </div>
                    </td>
                    <td style="text-align: center;">
                        <div class="card border-primary mb-3 card_portal">
                            <a style="text-decoration: none;" href="<?php getUrl("node-red", "dashboard", true); ?>">
                                <div class="card-header portal_header_card">
                                    <i class="fas fa-broadcast-tower"></i> 
                                    LoRa
                                </div>
                            </a>
                            <table class="table table-bordered table-sm" style="font-size: 12px;">
                                <tbody>
                                    <tr>
                                        <td colspan="3" style="padding: 0px;border:0;">
                                            <div class="card-header portal_title_card">Devices<span style="float: right;margin-right:10px;"><i class="fas fa-plus"></i></span></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>hermes-01</td>
                                        <td>Room 1</td>
                                        <td style="background-color: #7bed9f;">connected</td>
                                    </tr>
                                    <tr>
                                        <td>hermes-12</td>
                                        <td>Room 2</td>
                                        <td style="background-color: #ff7f50;">disconnected</td>
                                    </tr>
                                    <tr>
                                        <td>hermes-43</td>
                                        <td>Room 3</td>
                                        <td style="background-color: #7bed9f;">connected</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="padding: 0px;border:0;">
                                            <div class="card-header portal_title_card">Gateways<span style="float: right;margin-right:10px;"><i class="fas fa-plus"></i></span></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="white-space: nowrap;overflow: hidden;max-width: 70px;">eui-b827ebffff6a53dd</td>
                                        <td>RFM95 and Pi3</td>
                                        <td style="background-color: #7bed9f;">available</td>
                                    </tr>
                                    <tr>
                                        <td style="white-space: nowrap;overflow: hidden;max-width: 70px;">eui-5ccf7ff42f1168e8</td>
                                        <td>Not specified</td>
                                        <td style="background-color: #7bed9f;">not available</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                    <td style="text-align: center;">
                        <div class="card border-primary mb-3 card_portal">
                            <a style="text-decoration: none;" href="<?php getUrl("predictie", "dashboard", true); ?>">
                                <div class="card-header portal_header_card">
                                    <i class="fas fa-chart-line"></i> 
                                    Prediction
                                </div>
                            </a>
                            <div class="card-header portal_title_card">Data<span style="float: right;margin-right:10px;"><i class="fas fa-plus"></i></span></div>
                            <table class="table table-bordered table-sm" style="font-size: 12px;">
                                <tbody>
                                    <tr>
                                        <td>First month</td>
                                        <td>Company 10</td>
                                        <td>done</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="card-header portal_title_card">Results<span style="float: right;margin-right:10px;"><i class="fas fa-plus"></i></span></div>
                            <table class="table table-bordered table-sm" style="font-size: 12px;">
                                <tbody>
                                    <tr>
                                        <td>Scenario 1</td>
                                        <td>Company 10</td>
                                        <td style="background-color: #7bed9f;">Best case</td>
                                    </tr>
                                    <tr>
                                        <td>Scenario 2</td>
                                        <td>Company 10</td>
                                        <td style="background-color: #ff7f50;">Worst case</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
</div>