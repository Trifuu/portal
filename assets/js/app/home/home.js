/* 
 * Creata de Marius Trifu
 * Pentru intrebari trifumarius01@gmail.com  * 
 */

$(document).ready(function () {
    var modal_dashboard = document.getElementById('modal_add_dashboard');
    var modal_sensor = document.getElementById('modal_add_sensor');
    var modal_grafic = document.getElementById('modal_grafic_sensor');

    // When the user clicks the button, open the modal 
    $("#add_dashboard").click(function () {
        modal_dashboard.style.display = "block";
    });

    $("#add_sensor").click(function () {
        modal_sensor.style.display = "block";
    });

    // When the user clicks on <span> (x), close the modal
    $(".close1").click(function () {
        modal_dashboard.style.display = "none";
    });
    $(".close2").click(function () {
        modal_sensor.style.display = "none";
    });

    $(".close3").click(function () {
        modal_grafic.style.display = "none";
    });
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal_dashboard) {
            modal_dashboard.style.display = "none";
        } else if (event.target == modal_sensor) {
            modal_sensor.style.display = "none";
        } else if (event.target == modal_grafic) {
            modal_grafic.style.display = "none";
        }
    }

    function load_dashboard(dashboard) {
        $("#add_form").append("\n\
                <form id='form_trick' method='post' action='" + _SITE_BASE + "'>\n\
                    <input name='current_dashboard' value='" + dashboard + "'/>\n\
                </form>");
        $("#form_trick").submit();
    }

    //adauga un nou dashboard
    $("#submit_new_dashboard").click(function () {
        modal_dashboard.style.display = "none";
        var nume = document.getElementById("nume_dashboard").value;
        var tip = document.getElementById("tip_dashboard").value;
        $.ajax({
            type: "POST",
            url: _SITE_BASE + "includes/ajax/add_new_dashboard.php",
            data: {
                nume: nume,
                tip: tip
            },
            success: function (event) {
                if (event != 1) {
                    alert(event);
                } else {
                    load_dashboard(nr_dashboards);
                }
            },
            error: function (xhr, status, error) {
                //alert(status);
            },
        });
    });

    //adauga un nou senzor
    $("#submit_new_sensor").click(function () {
        modal_sensor.style.display = "none";
        var nume = document.getElementById("nume_sensor").value;
        var zecimale = document.getElementById("decimals_sensor").value;
        var um = document.getElementById("um_sensor").value;
        $.ajax({
            type: "POST",
            url: _SITE_BASE + "includes/ajax/add_new_sensor.php",
            data: {
                nume: nume,
                zecimale: zecimale,
                um: um,
                dashboard: dashboard_id
            },
            success: function (event) {
                if (event != 1) {
                    alert(event);
                } else {
                    load_dashboard(poz_dashboard);
                }
            },
            error: function (xhr, status, error) {
                //alert(status);
            },
        });
    });

    $('.item_dash').click(function (e)
    {
        load_dashboard($(this).data("poz"));

    });

    $(".grafic_button").click(function (e) {
        var id_senzor = $(this).data("id");
        $.ajax({
            type: "POST",
            url: _SITE_BASE + "includes/ajax/get_senzor_values.php",
            data: {
                id: id_senzor
            },
            dataType: "json",
            success: function (event) {
                $("#grafic_user").html("");
                modal_grafic.style.display = "block";
                var ctx = document.getElementById("myChart").getContext('2d');

                var min = Math.min.apply(Math, event.valoare);
                var max = Math.max.apply(Math, event.valoare);
                min = min - (max - min) * 0.2;
                max = max + (max - min) * 0.2;
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: event.data,
                        datasets: [{
                                label: 'Value ',
                                data: event.valoare,
                                borderColor: "#3e95cd",
                                borderWidth: 3,
                                fill: false,
                            }]
                    },
                    options: {
                        legend: {
                            display: false
                        },
                        responsive: true,
                        tooltips: {
                            mode: 'index',
                            intersect: false,
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        },
                        scales: {
                            xAxes: [{
                                    display: false,
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Month'
                                    }
                                }],
                            yAxes: [{
                                    display: true,
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Value'
                                    },
                                    ticks: {
                                        min: min,
                                        max: max,
                                        // forces step size to be 5 units
                                        stepSize: (max - min) / 10
                                    }
                                }]
                        }
                    }
                });
            },
            error: function (xhr, status, error) {
                //alert(status);
            },
        });
    });
});
