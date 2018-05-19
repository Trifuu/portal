/* 
 * Creata de Marius Trifu
 * Pentru intrebari trifumarius01@gmail.com  * 
 */

$(document).ready(function () {
    if (screen.height < ($(window).scrollTop() + 180)) {
        $(".afisare").css("display", "");
    } else {
        $(".afisare").css("display", "none");
    }
    $(window).scroll(function () {
        if (screen.height < ($(window).scrollTop() + 180)) {
            console.log("merge");
            $(".afisare").css("display", "");
        } else {
            $(".afisare").css("display", "none");
        }
    });
});
