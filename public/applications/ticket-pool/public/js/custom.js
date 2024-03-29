"use strict";
$(document).ready(function () {
    $(".select2").select2();
    $(".categoriesClass").mouseleave(function () {
        $(".categoriesClass").hide();
    });

    $(".language").mouseenter(function () {
        $(".languageClass").show();
    });
    $(".languageClass").mouseleave(function () {
        $(".languageClass").hide();
    });
    $("#dropdownMenuButton").on("click", function () {
        $(".dropdownClass").toggle();
    });

    $(".dropdownScreenButton").on("click", function () {
        $(".dropdownMenuClass").toggle();
    });
    $(".nav-toggle").on("click", function () {
        $(".nav-content").slideToggle(500);
    });
    $(".categories").on("click", function () {
        $(".categoriesClass").slideToggle(500);
    });
});
