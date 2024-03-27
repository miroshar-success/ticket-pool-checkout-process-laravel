"use strict";
var events,revenue,a,location_marker;
$(document).ready(function() 
{
    
    // event map
    a = {  gray: {
        100: "#f6f9fc",
        200: "#e9ecef",
        300: "#dee2e6",
        400: "#ced4da",
        500: "#adb5bd" 
        
    }              
    };
    location_marker = [];
    loadMap();
    if($('#events').val()){
        events = JSON.parse($('#events').val()); 
    }

    if(events){ 
    }
});

function loadMap() {
    $('#eventMap').vectorMap(
    {
        map: 'world_mill',
        zoomOnScroll: !1,
        scaleColors: ["#f00", "#0071A4"],
        normalizeFunction: "polynomial",
        hoverOpacity: .7,
        hoverColor: !1,
        backgroundColor: "transparent",
        regionStyle: {
            initial: {
                fill: a.gray[200],
                "fill-opacity": .8,
                stroke: "none",
                "stroke-width": 0,
                "stroke-opacity": 1
            },
            hover: {
                fill: a.gray[300],
                "fill-opacity": .8,
                cursor: "pointer"
            },              
        },
        markerStyle: {
            initial: {
                fill: "#fb6340",
                "stroke-width": 0
            },
            hover: {
                fill: "#5e72e4",
                "stroke-width": 0
            }
        },
        markers: location_marker,
        series: {
            regions: [{
                values: {
                    AU: 760,
                    BR: 550,
                    CA: 120,
                    DE: 1300,
                    FR: 540,
                    GB: 690,
                    GE: 200,
                    IN: 200,
                    RO: 600,
                    RU: 300,
                    US: 2920
                },
                scale: [a.gray[400], a.gray[500]],
                normalizeFunction: "polynomial"
            }]
        }
    });
}