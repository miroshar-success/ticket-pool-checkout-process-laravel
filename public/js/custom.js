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

  $.get("https://restcountries.com/v3.1/all", function (data) {
    data.forEach(function (country) {
      $("#country").append(
        $("<option>", {
          value: country.cca2,
          text: country.name.common,
        })
      );
    });
  });

  // Handle country change event
  $("#country").on("change", function () {
    const selectedCountryCode = $(this).val();
    $("#city")
      .empty()
      .append(
        $("<option>", {
          value: "",
          text: "Loading cities...",
        })
      );

    // Fetch cities based on selected country code using Geonames API
    $.getJSON(
      "http://api.geonames.org/searchJSON",
      {
        country: selectedCountryCode,
        featureClass: "P",
        maxRows: 10,
        username: "oskarmast", // Replace 'demo' with your Geonames API username
      },
      function (data) {
        $("#city")
          .empty()
          .append(
            $("<option>", {
              value: "",
              text: "Select a city",
            })
          );

        if (data.geonames) {
          data.geonames.forEach(function (city) {
            $("#city").append(
              $("<option>", {
                value: city.name,
                text: city.name,
              })
            );
          });
        } else {
          $("#city").append(
            $("<option>", {
              value: "",
              text: "No cities found",
            })
          );
        }
      }
    );
  });
});
