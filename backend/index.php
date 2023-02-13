<?php 
session_start();
    if($_SESSION["role"] != 'admin'){
        header('location:../frontend/login.php');
    }
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>TL | Admin</title>
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Modernize Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
        Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta Tags -->

    <!-- Style-sheets -->
    <!-- Bootstrap Css -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Bootstrap Css -->
    <!-- Bars Css -->
    <link rel="stylesheet" href="css/bar.css">
    <!--// Bars Css -->
    <!-- Common Css -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!--// Common Css -->
    <!-- Nav Css -->
    <link rel="stylesheet" href="css/style4.css">
    <!--// Nav Css -->
    <!-- Fontawesome Css -->
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <!--// Fontawesome Css -->
    <!--// Style-sheets -->

    <!--web-fonts-->
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!--//web-fonts-->
</head>

<body>
    <div class="se-pre-con"></div>

    <div class="wrapper">
        <?php include 'nav.php' ?>
        <div id="content">
            <!-- top-bar -->
            <nav class="navbar navbar-default mb-xl-5 mb-4">
                <div class="container-fluid">

                    <div class="navbar-header">
                        <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                    <form action="#" method="post" class="form-inline mx-auto search-form">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" required="">
                        <button class="btn btn-style my-2 my-sm-0" type="submit">Search</button>
                    </form>
                    <ul class="top-icons-agileits-w3layouts float-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-bell"></i>
                                <span class="badge">0</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown mx-3">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-spinner"></i>
                            </a>
                            <div class="dropdown-menu top-grid-scroll drop-2">
                                <h3 class="sub-title-w3-agileits">Shortcuts</h3>
                                <a href="#" class="dropdown-item mt-3">
                                    <h4>
                                        <i class="fas fa-chart-pie mr-3"></i>Sed feugiat</h4>
                                </a>
                                <a href="#" class="dropdown-item mt-3">
                                    <h4>
                                        <i class="fab fa-connectdevelop mr-3"></i>Aliquam sed</h4>
                                </a>
                                <a href="#" class="dropdown-item mt-3">
                                    <h4>
                                        <i class="fas fa-tasks mr-3"></i>Lorem ipsum</h4>
                                </a>
                                <a href="#" class="dropdown-item mt-3">
                                    <h4>
                                        <i class="fab fa-superpowers mr-3"></i>Cras rutrum</h4>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-user"></i>
                            </a>
                            <div class="dropdown-menu drop-3">
                                <div class="profile d-flex mr-o">
                                    <div class="profile-l align-self-center">
                                        <img src="images/profile.jpg" class="img-fluid mb-3" alt="Responsive image">
                                    </div>
                                    <div class="profile-r align-self-center">
                                        <h3 class="sub-title-w3-agileits">Nttl</h3>
                                        <a href="mailto:info@example.com">info@example.com</a>
                                    </div>
                                </div>
                                <a href="#" class="dropdown-item mt-3">
                                    <h4>
                                        <i class="far fa-user mr-3"></i>My Profile</h4>
                                </a>
                                <a href="#" class="dropdown-item mt-3">
                                    <h4>
                                        <i class="fas fa-link mr-3"></i>Activity</h4>
                                </a>
                                <a href="#" class="dropdown-item mt-3">
                                    <h4>
                                        <i class="far fa-envelope mr-3"></i>Messages</h4>
                                </a>
                                <a href="#" class="dropdown-item mt-3">
                                    <h4>
                                        <i class="far fa-question-circle mr-3"></i>Faq</h4>
                                </a>
                                <a href="#" class="dropdown-item mt-3">
                                    <h4>
                                        <i class="far fa-thumbs-up mr-3"></i>Support</h4>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="login.html">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="outer-w3-agile mt-3">

                <h4 class="tittle-w3-agileits mb-4">Circle Bar Chart</h4>
                <div class="c-bars d-lg-flex justify-content-around">
                    <div class="circle-1-w3">
                        <svg class="circular-bars" x="0px" y="0px" xml:space="preserve">

                            <g id="circleBarCharts">

                                <!-- Web Circle Bar Chart -->
                                <g id="circleBar-web-group">
                                    <text id="circleBar-web-text" opacity="0" x="200" y="143">WEB</text>
                                    <g id="circleBar-web-chart" transform="translate(215,150)"></g>
                                    <clippath id="circleBar-web-clipPath">
                                        <rect id="circleBar-web-clipLabels" x="205" y="215" width="180" height="0"></rect>
                                    </clippath>
                                    <g id="circleBar-web-legend" clip-path="url(#circleBar-web-clipPath)">
                                        <text id="circleBar-web-values" transform="translate(222,225)"></text>
                                        <text id="circleBar-web-labels" transform="translate(277,225)"></text>
                                    </g>
                                </g>
                                <!-- END: Web Circle Bar Chart -->

                            </g>

                        </svg>

                    </div>
                    <div class="circle-2-w3">
                        <svg class="circular-bars" x="0px" y="0px" xml:space="preserve">

                            <g id="circleBarCharts">

                                <!-- Mobile Circle Bar Chart -->
                                <g id="circleBar-mobile-group">
                                    <text id="circleBar-mobile-text" opacity="0" x="187" y="155">MOBILE</text>
                                    <g id="circleBar-mobile-chart" transform="translate(215,150)"></g>
                                    <clippath id="circleBar-mobile-clipPath">
                                        <rect id="circleBar-mobile-clipLabels" x="205" y="215" width="150" height="0"></rect>
                                    </clippath>
                                    <g id="circleBar-mobile-legend" clip-path="url(#circleBar-mobile-clipPath)">
                                        <text id="circleBar-mobile-values" transform="translate(222,225)"></text>
                                        <text id="circleBar-mobile-labels" transform="translate(277,225)"></text>
                                    </g>
                                </g>
                                <!-- END: Mobile Circle Bar Chart -->
                            </g>

                        </svg>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Required common Js -->
    <script src='js/jquery-2.2.3.min.js'></script>
    <!-- cirular-bar Js -->
    <script src='js/circle_bar.js'></script>
    <script>
        var chartData = {
            "barCircleMobile": [{
                    "index": 0.3,
                    "value": 17436920,
                    "fill": "#202e66",
                    "label": "WebMd Health"
                },
                {
                    "index": 0.4,
                    "value": 10884799,
                    "fill": "#283874",
                    "label": "Livestrong.com"
                },
                {
                    "index": 0.5,
                    "value": 10257432,
                    "fill": "#2e3e7e",
                    "label": "Everyday Health"
                },
                {
                    "index": 0.6,
                    "value": 6110024,
                    "fill": "#394b91",
                    "label": "About.com"
                },
                {
                    "index": 0.7,
                    "value": 3895612,
                    "fill": "#4a5da6",
                    "label": "Drugs.com"
                },
                {
                    "index": 0.8,
                    "value": 3414585,
                    "fill": "#6273b9",
                    "label": "Alliance Health"
                },
                {
                    "index": 0.9,
                    "value": 3099372,
                    "fill": "#6d7fc7",
                    "label": "Lifescript.com"
                }
            ],
            "barCircleWeb": [{
                    "index": 0.3,
                    "value": 31588490,
                    "fill": "#e04646",
                    "label": "WebMD Health"
                },
                {
                    "index": 0.4,
                    "value": 26260662,
                    "fill": "#e65252",
                    "label": "Everyday Health"
                },
                {
                    "index": 0.5,
                    "value": 24263463,
                    "fill": "#ee6f6f",
                    "label": "Livestrong.com"
                },
                {
                    "index": 0.6,
                    "value": 12795112,
                    "fill": "#5573ea",
                    "label": "About.com Health Section"
                },
                {
                    "index": 0.7,
                    "value": 11959167,
                    "fill": "#4c6ef5",
                    "label": "Healthline"
                },
                {
                    "index": 0.8,
                    "value": 10408917,
                    "fill": "#4263e6",
                    "label": "HealthGrades"
                }
            ]
        };

        function drawBarCircleChart(data, target, values, labels) {
            var w = 362,
                h = 362,
                size = data[0].value * 1.15,
                radius = 200,
                sectorWidth = .1,
                radScale = 25,
                sectorScale = 1.45,
                target = d3.select(target),
                valueText = d3.select(values),
                labelText = d3.select(labels);


            var arc = d3.svg.arc()
                .innerRadius(function(d, i) {
                    return (d.index / sectorScale) * radius + radScale;
                })
                .outerRadius(function(d, i) {
                    return ((d.index / sectorScale) + (sectorWidth / sectorScale)) * radius + radScale;
                })
                .startAngle(Math.PI)
                .endAngle(function(d) {
                    return Math.PI + (d.value / size) * 2 * Math.PI;
                });

            var path = target.selectAll("path")
                .data(data);

            //TODO: seperate color and index from data object, make it a pain to update object order
            path.enter().append("svg:path")
                .attr("fill", function(d, i) {
                    return d.fill
                })
                .attr("stroke", "#D1D3D4")
                .transition()
                .ease("elastic")
                .duration(1000)
                .delay(function(d, i) {
                    return i * 100
                })
                .attrTween("d", arcTween);

            valueText.selectAll("tspan").data(data).enter()
                .append("tspan")
                .attr({
                    x: 50,
                    y: function(d, i) {
                        return i * 14
                    },
                    "text-anchor": "end"
                })
                .text(function(d, i) {
                    return data[i].value
                });

            labelText.selectAll("tspan").data(data).enter()
                .append("tspan")
                .attr({
                    x: 0,
                    y: function(d, i) {
                        return i * 14
                    }
                })
                .text(function(d, i) {
                    return data[i].label
                });

            function arcTween(b) {
                var i = d3.interpolate({
                    value: 0
                }, b);
                return function(t) {
                    return arc(i(t));
                };
            }
        }

        // Animation Queue
        setTimeout(function() {
            drawBarCircleChart(chartData.barCircleWeb, "#circleBar-web-chart", "#circleBar-web-values",
                "#circleBar-web-labels")
        }, 500);
        setTimeout(function() {
            drawBarCircleChart(chartData.barCircleMobile, "#circleBar-mobile-chart", "#circleBar-mobile-values",
                "#circleBar-mobile-labels")
        }, 800);

        d3.select("#circleBar-web-icon")
            .transition()
            .delay(500)
            .duration(500)
            .attr("opacity", "1");
        d3.select("#circleBar-web-text")
            .transition()
            .delay(750)
            .duration(500)
            .attr("opacity", "1");

        d3.select("#circleBar-web-clipLabels")
            .transition()
            .delay(600)
            .duration(1250)
            .attr("height", "150");

        d3.select("#circleBar-mobile-icon")
            .transition()
            .delay(800)
            .duration(500)
            .attr("opacity", "1");
        d3.select("#circleBar-mobile-text")
            .transition()
            .delay(1050)
            .duration(500)
            .attr("opacity", "1");
        d3.select("#circleBar-mobile-clipLabels")
            .transition()
            .delay(900)
            .duration(1250)
            .attr("height", "150");
    </script>
    <!--// cirular-bar Js -->
    <!-- dropdown nav -->
    <script>
        $(document).ready(function() {
            $(".dropdown").hover(
                function() {
                    $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                    $(this).toggleClass('open');
                },
                function() {
                    $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                    $(this).toggleClass('open');
                }
            );
        });
    </script>
    <!-- //dropdown nav-->
    <!-- loading-gif Js -->
    <script src="js/modernizr.js"></script>
    <script>
        //paste this code under head tag or in a seperate js file.
        // Wait for window load
        $(window).load(function() {
            // Animate loader off screen
            $(".se-pre-con").fadeOut("slow");;
        });
    </script>
    <!--// loading-gif Js -->
    <!-- Sidebar-nav Js -->
    <script>
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    <!--// Sidebar-nav Js -->
    <!-- Js for bootstrap working-->
    <script src="js/bootstrap.min.js"></script>
    <!-- //Js for bootstrap working -->
</body>

</html>