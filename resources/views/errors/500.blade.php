<!DOCTYPE html>
<html lang="en">

<?php $primary_color = \App\Models\Setting::find(1)->primary_color; ?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        body {
            padding: 0;
            margin: 0;
        }

        #notfound {
            position: relative;
            height: 100vh;
        }

        #notfound .notfound {
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .notfound {
            max-width: 767px;
            width: 100%;
            line-height: 1.4;
            text-align: center;
            padding: 15px;
        }

        .notfound .notfound-404 {
            position: relative;
            height: 220px;
        }

        .notfound .notfound-404 h1 {
            font-family: 'Kanit', sans-serif;
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            font-size: 186px;
            font-weight: 200;
            margin: 0px;
            background: linear-gradient(130deg, white, {{ $primary_color }});
            color: transparent;
            -webkit-background-clip: text;
            background-clip: text;
            text-transform: uppercase;
        }

        .notfound h2 {
            font-family: 'Kanit', sans-serif;
            font-size: 33px;
            font-weight: 200;
            text-transform: uppercase;
            margin-top: 0px;
            margin-bottom: 25px;
            letter-spacing: 3px;
        }


        .notfound p {
            font-family: 'Kanit', sans-serif;
            font-size: 16px;
            font-weight: 200;
            margin-top: 0px;
            margin-bottom: 25px;
        }


        .notfound a {
            font-family: 'Kanit', sans-serif;
            color: {{ $primary_color }};
            font-weight: 200;
            text-decoration: none;
            border-bottom: 1px dashed #ff6f68;
            border-radius: 2px;
        }

        .notfound-social>a {
            display: inline-block;
            height: 40px;
            line-height: 40px;
            width: 40px;
            font-size: 14px;
            color: #ff6f68;
            border: 1px solid #efefef;
            border-radius: 50%;
            margin: 3px;
            -webkit-transition: 0.2s all;
            transition: 0.2s all;
        }

        .notfound-social>a:hover {
            color: #fff;
            background-color: #ff6f68;
            border-color: #ff6f68;
        }

        @media only screen and (max-width: 480px) {
            .notfound .notfound-404 {
                position: relative;
                height: 168px;
            }

            .notfound .notfound-404 h1 {
                font-size: 142px;
            }

            .notfound h2 {
                font-size: 22px;
            }
        }
    </style>
    <style id="" media="all">
        /* thai */
        @font-face {
            font-family: 'Kanit';
            font-style: normal;
            font-weight: 200;
            font-display: swap;
            src: url(/fonts.gstatic.com/s/kanit/v12/nKKU-Go6G5tXcr5aOhWzVaF5NQ.woff2) format('woff2');
            unicode-range: U+0E01-0E5B, U+200C-200D, U+25CC;
        }

        /* vietnamese */
        @font-face {
            font-family: 'Kanit';
            font-style: normal;
            font-weight: 200;
            font-display: swap;
            src: url(/fonts.gstatic.com/s/kanit/v12/nKKU-Go6G5tXcr5aOhWoVaF5NQ.woff2) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
        }

        /* latin-ext */
        @font-face {
            font-family: 'Kanit';
            font-style: normal;
            font-weight: 200;
            font-display: swap;
            src: url(/fonts.gstatic.com/s/kanit/v12/nKKU-Go6G5tXcr5aOhWpVaF5NQ.woff2) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }

        /* latin */
        @font-face {
            font-family: 'Kanit';
            font-style: normal;
            font-weight: 200;
            font-display: swap;
            src: url(/fonts.gstatic.com/s/kanit/v12/nKKU-Go6G5tXcr5aOhWnVaE.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
    </style>

    <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css" />

    <link type="text/css" rel="stylesheet" href="css/error.css" />


    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <meta name="robots" content="noindex, follow">
    <script nonce="ea03ec7b-055a-4d5b-814c-be7d80a176fb">
        (function(w, d) {
            ! function(bv, bw, bx, by) {
                bv[bx] = bv[bx] || {};
                bv[bx].executed = [];
                bv.zaraz = {
                    deferred: [],
                    listeners: []
                };
                bv.zaraz.q = [];
                bv.zaraz._f = function(bz) {
                    return function() {
                        var bA = Array.prototype.slice.call(arguments);
                        bv.zaraz.q.push({
                            m: bz,
                            a: bA
                        })
                    }
                };
                for (const bB of ["track", "set", "debug"]) bv.zaraz[bB] = bv.zaraz._f(bB);
                bv.zaraz.init = () => {
                    var bC = bw.getElementsByTagName(by)[0],
                        bD = bw.createElement(by),
                        bE = bw.getElementsByTagName("title")[0];
                    bE && (bv[bx].t = bw.getElementsByTagName("title")[0].text);
                    bv[bx].x = Math.random();
                    bv[bx].w = bv.screen.width;
                    bv[bx].h = bv.screen.height;
                    bv[bx].j = bv.innerHeight;
                    bv[bx].e = bv.innerWidth;
                    bv[bx].l = bv.location.href;
                    bv[bx].r = bw.referrer;
                    bv[bx].k = bv.screen.colorDepth;
                    bv[bx].n = bw.characterSet;
                    bv[bx].o = (new Date).getTimezoneOffset();
                    if (bv.dataLayer)
                        for (const bI of Object.entries(Object.entries(dataLayer).reduce(((bJ, bK) => ({
                                ...bJ[1],
                                ...bK[1]
                            }))))) zaraz.set(bI[0], bI[1], {
                            scope: "page"
                        });
                    bv[bx].q = [];
                    for (; bv.zaraz.q.length;) {
                        const bL = bv.zaraz.q.shift();
                        bv[bx].q.push(bL)
                    }
                    bD.defer = !0;
                    for (const bM of [localStorage, sessionStorage]) Object.keys(bM || {}).filter((bO => bO
                        .startsWith("_zaraz_"))).forEach((bN => {
                        try {
                            bv[bx]["z_" + bN.slice(7)] = JSON.parse(bM.getItem(bN))
                        } catch {
                            bv[bx]["z_" + bN.slice(7)] = bM.getItem(bN)
                        }
                    }));
                    bD.referrerPolicy = "origin";
                    bD.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(bv[bx])));
                    bC.parentNode.insertBefore(bD, bC)
                };
                ["complete", "interactive"].includes(bw.readyState) ? zaraz.init() : bv.addEventListener(
                    "DOMContentLoaded", zaraz.init)
            }(w, d, "zarazData", "script");
        })(window, document);
    </script>
</head>

<body>
    <div id="notfound">
        <div class="notfound">
            <div class="notfound-404">
                <h1>500</h1>
            </div>
            <p>Oops! Something went wrong and we're having trouble loading the page you requested.
                <a href="{{ url('/') }}">Return to homepage</a>
            </p>

        </div>
    </div>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993"
        integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA=="
        data-cf-beacon='{"rayId":"7aac2010583b0e0c","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2023.2.0","si":100}'
        crossorigin="anonymous"></script>
</body>

</html>
