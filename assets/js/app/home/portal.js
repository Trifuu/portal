/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
    var db = "demo";
    function updateMax() {
        var query = "select max(value) from temperature";
        $.ajax({
            type: "POST",
            url: _SITE_BASE + "includes/ajax/max_influx.php",
            data: {
                db: db,
                query: query
            },
            success: function (event) {
                if (event != "eroare") {
                    $('#max').html(event);
                }
            },
            error: function (xhr, status, error) {
                //alert(status);
            },
        });
    }
    function updateMin() {
        var query = "select min(value) from temperature";
        $.ajax({
            type: "POST",
            url: _SITE_BASE + "includes/ajax/max_influx.php",
            data: {
                db: db,
                query: query
            },
            success: function (event) {
                if (event != "eroare") {
                    $('#min').html(event);
                }
            },
            error: function (xhr, status, error) {
                //alert(status);
            },
        });
    }

    window.setInterval(function () {
        updateMax();
        updateMin();
    }, 5000);
});