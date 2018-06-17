<script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="js/jssor.slider-27.1.0.min.js" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {

        var jssor_1_SlideshowTransitions = [
            {
                $Duration: 800,
                x: -0.3,
                $During: {$Left: [0.3, 0.7]},
                $Easing: {$Left: $Jease$.$InCubic, $Opacity: $Jease$.$Linear},
                $Opacity: 2
            },
            {
                $Duration: 800,
                x: 0.3,
                $SlideOut: true,
                $Easing: {$Left: $Jease$.$InCubic, $Opacity: $Jease$.$Linear},
                $Opacity: 2
            }
        ];

        var jssor_1_options = {
            $LazyLoading: 1,
            $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
            },
            $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
            },
            $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $Orientation: 2,
                $NoDrag: true
            }
        };

        var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

        /*#region responsive code begin*/

        var MAX_WIDTH = 980;

        function ScaleSlider() {
            var containerElement = jssor_1_slider.$Elmt.parentNode;
            var containerWidth = containerElement.clientWidth;

            if (containerWidth) {

                var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                jssor_1_slider.$ScaleWidth(expectedWidth);
            }
            else {
                window.setTimeout(ScaleSlider, 30);
            }
        }

        ScaleSlider();

        $(window).bind("load", ScaleSlider);
        $(window).bind("resize", ScaleSlider);
        $(window).bind("orientationchange", ScaleSlider);
        /*#endregion responsive code end*/
    });
</script>
<style>
    /*jssor slider loading skin spin css*/
    .jssorl-009-spin img {
        animation-name: jssorl-009-spin;
        animation-duration: 1.6s;
        animation-iteration-count: infinite;
        animation-timing-function: linear;
    }

    @keyframes jssorl-009-spin {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(360deg);
        }
    }

    .jssora061 {
        display: block;
        position: absolute;
        cursor: pointer;
    }

    .jssora061 .a {
        fill: none;
        stroke: #fff;
        stroke-width: 360;
        stroke-linecap: round;
    }

    .jssora061:hover {
        opacity: .8;
    }

    .jssora061.jssora061dn {
        opacity: .5;
    }

    .jssora061.jssora061ds {
        opacity: .3;
        pointer-events: none;
    }
</style>
<div id="jssor_1"
     style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:380px;overflow:hidden;visibility:hidden;">
    <!-- Loading Screen -->
    <div data-u="loading" class="jssorl-009-spin"
         style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
        <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg"/>
    </div>
    <div data-u="slides"
         style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">

        <div data-p="170.00" id="2">
            <div class="relat-graph">
                <div id="chartContainer2L" data-u="loading" class="jssorl-009-spin"
                     style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                    <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg"/>
                </div>
                <div id="chartContainer2" style="height: 360px; width: 100%;"></div>
            </div>
        </div>


        <div data-p="170.00" id="3">
            <div class="relat-graph">
                <div id="chartContainer3L" data-u="loading" class="jssorl-009-spin"
                     style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                    <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg"/>
                </div>
                <div id="chartContainer3" style="height: 360px; width: 100%;"></div>
            </div>
        </div>


        <div data-p="170.00" id="4">
            <div class="relat-graph">
                <div id="chartContainer4L" data-u="loading" class="jssorl-009-spin"
                     style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                    <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg"/>
                </div>
                <div id="chartContainer4" style="height: 300px; width: 100%;"></div>
            </div>
        </div>


        <div data-p="170.00" id="5">
            <div class="relat-graph">
                <div id="chartContainer5L" data-u="loading" class="jssorl-009-spin"
                     style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                    <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg"/>
                </div>
                <div id="chartContainer5" style="height: 360px; width: 100%;"></div>
            </div>
        </div>

        <div data-p="170.00" id="6">
            <div class="relat-graph">
                <div id="chartContainer6L" data-u="loading" class="jssorl-009-spin"
                     style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                    <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg"/>
                </div>
                <div id="chartContainer6" style="height: 360px; width: 100%;"></div>
            </div>
        </div>

        <div data-p="170.00" id="7">
            <div class="relat-graph">
                <div id="chartContainer7L" data-u="loading" class="jssorl-009-spin"
                     style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                    <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg"/>
                </div>
                <div id="chartContainer7" style="height: 360px; width: 100%;"></div>
            </div>
        </div>

        <div data-p="170.00" id="8">
            <div class="relat-graph">
                <div id="chartContainer8L" data-u="loading" class="jssorl-009-spin"
                     style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                    <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg"/>
                </div>
                <div id="chartContainer8" style="height: 360px; width: 100%;"></div>
            </div>
        </div>

        <div data-p="170.00" id="9">
            <div class="relat-graph">
                <div id="chartContainer9L" data-u="loading" class="jssorl-009-spin"
                     style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                    <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg"/>
                </div>
                <div id="chartContainer9" style="height: 360px; width: 100%;"></div>
            </div>
        </div>

        <div data-p="170.00" id="10">
            <div class="relat-graph">
                <div id="chartContainer10L" data-u="loading" class="jssorl-009-spin"
                     style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                    <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg"/>
                </div>
                <div id="chartContainer10" style="height: 360px; width: 100%;"></div>
            </div>
        </div>

        <div data-p="170.00" id="11">
            <div class="relat-graph">
                <div id="chartContainer11L" data-u="loading" class="jssorl-009-spin"
                     style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                    <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg"/>
                </div>
                <div id="chartContainer11" style="height: 360px; width: 100%;"></div>
            </div>
        </div>

        <div data-p="170.00" id="12">
            <div class="relat-graph">
                <div id="chartContainer12L" data-u="loading" class="jssorl-009-spin"
                     style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                    <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg"/>
                </div>
                <div id="chartContainer12" style="height: 360px; width: 100%;"></div>
            </div>
        </div>

        <div data-p="170.00" id="13">
            <div class="relat-graph">
                <div id="chartContainer13L" data-u="loading" class="jssorl-009-spin"
                     style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                    <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg"/>
                </div>
                <div id="chartContainer13" style="height: 360px; width: 100%;"></div>
            </div>
        </div>

        <div data-p="170.00" id="14">
            <div class="relat-graph">
                <div id="chartContainer14L" data-u="loading" class="jssorl-009-spin"
                     style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                    <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg"/>
                </div>
                <div id="chartContainer14" style="height: 360px; width: 100%;"></div>
            </div>
        </div>

    </div>

    <!-- Arrow Navigator -->
    <div data-u="arrowleft" class="jssora061" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2"
         data-scale="0.75" data-scale-left="0.75">
        <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
            <path class="a" d="M11949,1919L5964.9,7771.7c-127.9,125.5-127.9,329.1,0,454.9L11949,14079"></path>
        </svg>
    </div>
    <div data-u="arrowright" class="jssora061" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2"
         data-scale="0.75" data-scale-right="0.75">
        <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
            <path class="a" d="M5869,1919l5984.1,5852.7c127.9,125.5,127.9,329.1,0,454.9L5869,14079"></path>
        </svg>
    </div>
</div>

<script src="js/jquery.js"></script>
<script>
    var prev, prox, callFunction;

    callFunction = function (direction) {

        /** DIV 2 => FORPORTANDPROTOCOL**/
        prev = document.getElementById("14").style.cssText.indexOf('transform') === -1;
        prox = document.getElementById("3").style.cssText.indexOf('transform') === -1;

        if (prev && direction === 'arrowright') {
            forPortAndProtocol()
        }

        if (prox && direction === 'arrowleft') {
            forPortAndProtocol()
        }


        /** DIV 3 => FORPCITY**/
        prev = document.getElementById("2").style.cssText.indexOf('transform') === -1;
        prox = document.getElementById("4").style.cssText.indexOf('transform') === -1;

        if (prev && direction === 'arrowright') {
            forCity()
        }

        if (prox && direction === 'arrowleft') {
            forCity()
        }


        /** DIV 4 => FORPCITY**/
        prev = document.getElementById("3").style.cssText.indexOf('transform') === -1;
        prox = document.getElementById("5").style.cssText.indexOf('transform') === -1;

        if (prev && direction === 'arrowright') {
            forCityAndPort()
        }

        if (prox && direction === 'arrowleft') {
            forCityAndPort()
        }


        /** DIV 5 => FORPCITY**/
        prev = document.getElementById("4").style.cssText.indexOf('transform') === -1;
        prox = document.getElementById("6").style.cssText.indexOf('transform') === -1;

        if (prev && direction === 'arrowright') {
            forCityAndProtocol()
        }

        if (prox && direction === 'arrowleft') {
            forCityAndProtocol()
        }

        /** DIV 6 => FORPCITY**/
        prev = document.getElementById("5").style.cssText.indexOf('transform') === -1;
        prox = document.getElementById("7").style.cssText.indexOf('transform') === -1;

        if (prev && direction === 'arrowright') {
            forCountry()
        }

        if (prox && direction === 'arrowleft') {
            forCountry()
        }

        /** DIV 7 => FORPCITY**/
        prev = document.getElementById("6").style.cssText.indexOf('transform') === -1;
        prox = document.getElementById("8").style.cssText.indexOf('transform') === -1;

        if (prev && direction === 'arrowright') {
            forCountryAndPort()
        }

        if (prox && direction === 'arrowleft') {
            forCountryAndPort()
        }


        /** DIV 8 => FORPCITY**/
        prev = document.getElementById("7").style.cssText.indexOf('transform') === -1;
        prox = document.getElementById("9").style.cssText.indexOf('transform') === -1;

        if (prev && direction === 'arrowright') {
            forCountryAndProtocol()
        }

        if (prox && direction === 'arrowleft') {
            forCountryAndProtocol()
        }


        /** DIV 9 => FORPCITY**/
        prev = document.getElementById("8").style.cssText.indexOf('transform') === -1;
        prox = document.getElementById("10").style.cssText.indexOf('transform') === -1;

        if (prev && direction === 'arrowright') {
            forIP()
        }

        if (prox && direction === 'arrowleft') {
            forIP()
        }


        /** DIV 10 => FORPCITY**/
        prev = document.getElementById("9").style.cssText.indexOf('transform') === -1;
        prox = document.getElementById("11").style.cssText.indexOf('transform') === -1;

        if (prev && direction === 'arrowright') {
            forIPAndPort()
        }

        if (prox && direction === 'arrowleft') {
            forIPAndPort()
        }


        /** DIV 11 => FORPCITY**/
        prev = document.getElementById("10").style.cssText.indexOf('transform') === -1;
        prox = document.getElementById("12").style.cssText.indexOf('transform') === -1;

        if (prev && direction === 'arrowright') {
            forIPAndProtocol()
        }

        if (prox && direction === 'arrowleft') {
            forIPAndProtocol()
        }


        /** DIV 12 => FORPCITY**/
        prev = document.getElementById("11").style.cssText.indexOf('transform') === -1;
        prox = document.getElementById("13").style.cssText.indexOf('transform') === -1;

        if (prev && direction === 'arrowright') {
            forProtocol()
        }

        if (prox && direction === 'arrowleft') {
            forProtocol()
        }


        /** DIV 13 => FORPCITY**/
        prev = document.getElementById("12").style.cssText.indexOf('transform') === -1;
        prox = document.getElementById("14").style.cssText.indexOf('transform') === -1;

        if (prev && direction === 'arrowright') {
            forCityPortAndProtocol()
        }

        if (prox && direction === 'arrowleft') {
            forCityPortAndProtocol()
        }


        /** DIV 14 => FORPCITY**/
        prev = document.getElementById("13").style.cssText.indexOf('transform') === -1;
        prox = document.getElementById("2").style.cssText.indexOf('transform') === -1;

        if (prev && direction === 'arrowright') {
            forCountryPortAndProtocol()
        }

        if (prox && direction === 'arrowleft') {
            forCountryPortAndProtocol()
        }
    };

    $(document).ready(function() {
        forPortAndProtocol();
    });

    $(document).keydown(function(e) {
        var direction;
        if(e.keyCode === 37) {
            direction = 'arrowleft'
        }//left

        if (e.keyCode === 39){
            direction = 'arrowright'
        }//right

        callFunction(direction)

    });

    $(".jssora061").click(function () {
        callFunction(this.getAttribute("data-u"))
    });



    var forPort = function() {$.post('report/for-port', {_token: "{{ csrf_token() }}"})
        .done(function (data) {
            var i;
            var object = [];

            for (i = data.length - 1; i >= 0; i--) {
                object.push({y: data[i].total, label: data[i].port})
            }

            var chart = new CanvasJS.Chart("chartContainer1", {
                animationEnabled: true,
                theme: "dark1",

                title: {
                    fontFamily: "Righteous",
                    text: "Número de Ataques por portas"
                },
                axisX: {
                    interval: 1
                },
                axisY2: {
                    interlacedColor: "rgba(58,122,94,.1)",
                    gridColor: "rgba(58,122,94,.1)",
                    title: "As 10 portas mais atacadas"
                },
                data: [{
                    indexLabelFontFamily: "Righteous",
                    type: "bar",
                    name: "companies",
                    color: "rgb(58,122,94)",
                    axisYType: "secondary",
                    dataPoints: object
                }]
            });

            chart.render();
            var loading = document.getElementById("chartContainer1L");
            if (loading) {
                loading.remove()
            }
        })};

    var forPortAndProtocol = function() {$.post('report/for-port-and-protocol', {_token: "{{ csrf_token() }}"})
        .done(function (data) {
            var i;
            var objectTCP = [];
            var objectUDP = [];
            var objectColor = [];

            for (i = data.length - 1; i >= 0; i--) {
                if (data[i].type === 'TCP') {
                    objectTCP.push({y: data[i].total, label: data[i].port});
                    objectUDP.push({y: 0});
                    objectColor.push('#ff0000');
                } else {
                    objectTCP.push({y: 0});
                    objectUDP.push({y: data[i].total, label: data[i].port});
                    objectColor.push('#0000ff');
                }
            }


            CanvasJS.addColorSet("colorArray",
                objectColor
            );

            var chart = new CanvasJS.Chart("chartContainer2", {
                animationEnabled: true,
                theme: "dark1",
                colorSet: "colorArray",
                title: {
                    fontFamily: "Righteous",
                    text: "Número de Ataques por porta e protocolo"
                },
                axisX: {
                    interval: 1
                },
                axisY2: {
                    interlacedColor: "rgba(58,122,94,.1)",
                    gridColor: "rgba(58,122,94,.1)",
                    title: "O protocolo usado nas 10 portas mais atacadas"
                },
                legend: {
                    horizontalAlign: "left", // "center" , "right"
                    verticalAlign: "center",  // "top" , "bottom"
                    fontSize: 15
                },
                data: [{
                    indexLabelFontFamily: "Righteous",
                    type: "bar",
                    name: "companies",
                    axisYType: "secondary",
                    showInLegend: true,
                    legendText: 'TCP',
                    dataPoints: objectTCP
                },{
                    indexLabelFontFamily: "Righteous",
                    type: "bar",
                    name: "companies",
                    axisYType: "secondary",
                    showInLegend: true,
                    legendText: 'UDP',
                    dataPoints: objectUDP
                }]
            });

            chart.render();
            var loading = document.getElementById("chartContainer2L");
            if (loading) {
                loading.remove()
            }

        })};

    var forCity = function() {$.post('report/for-city', {_token: "{{ csrf_token() }}"})
        .done(function (data) {
            var i;
            var object = [];

            for (i = data.length - 1; i >= 0; i--) {
                object.push({y: data[i].total, label: data[i].name})
            }

            var chart = new CanvasJS.Chart("chartContainer3", {
                animationEnabled: true,
                theme: "dark1",

                title: {
                    fontFamily: "Righteous",
                    text: "Numero de Ataques por cidades"
                },
                axisX: {
                    interval: 1
                },
                axisY2: {
                    interlacedColor: "rgba(58,122,94,.1)",
                    gridColor: "rgba(58,122,94,.1)",
                    title: "As 10 cidades mais atacadas"
                },
                data: [{
                    indexLabelFontFamily: "Righteous",
                    type: "bar",
                    name: "companies",
                    color: "rgb(58,122,94)",
                    axisYType: "secondary",
                    dataPoints: object
                }]
            });

            chart.render();
            var loading = document.getElementById("chartContainer3L");
            if (loading) {
                loading.remove()
            }

        })};

    var forCityAndPort = function() {$.post('report/for-city-and-port', {_token: "{{ csrf_token() }}"})
        .done(function (data) {
            var i;
            var object = [];

            for (i = 0; i < data.length ; i++) {
                object.push({y: data[i].total, label: data[i].name+'     '+data[i].port})
            }

            var chart = new CanvasJS.Chart("chartContainer4", {
                animationEnabled: true,
                theme: "dark1",

                title: {
                    fontFamily: "Righteous",
                    text: "Número de Ataques por cidade e porta"
                },
                axisX: {
                    interval: 1
                },
                axisY: {
                    interlacedColor: "rgba(58,122,94,.1)",
                    gridColor: "rgba(58,122,94,.1)",
                    title: "A porta mais usada nas 10 cidades mais atacadas"
                },
                data: [{
                    indexLabelFontFamily: "Righteous",
                    type: "column",
                    name: "companies",
                    color: "rgb(58,122,94)",
                    axisYType: "primary",
                    dataPoints: object
                }]
            });

            chart.render();
            var loading = document.getElementById("chartContainer4L");
            if (loading) {
                loading.remove()
            }

        })};

    var forCityAndProtocol = function() {$.post('report/for-city-and-protocol', {_token: "{{ csrf_token() }}"})
        .done(function (data) {
            var i;
            var objectTCP = [];
            var objectUDP = [];
            var objectColor = [];

            for (i = data.length - 1; i >= 0; i--) {
                if (data[i].type === 'TCP') {
                    objectTCP.push({y: data[i].total, label: data[i].name});
                    objectUDP.push({y: 0});
                    objectColor.push('#ff0000');
                } else {
                    objectTCP.push({y: 0});
                    objectUDP.push({y: data[i].total, label: data[i].name});
                    objectColor.push('#0000ff');
                }
            }


            var chart = new CanvasJS.Chart("chartContainer5", {
                animationEnabled: true,
                theme: "dark1",
                colorSet: "colorArray",
                title: {
                    fontFamily: "Righteous",
                    text: "Número de Ataques por cidade e protocolo"
                },
                axisX: {
                    interval: 1
                },
                axisY2: {
                    interlacedColor: "rgba(58,122,94,.1)",
                    gridColor: "rgba(58,122,94,.1)",
                    title: "O protocolo mais usado nas 10 cidades mais atacadas"
                },
                legend: {
                    horizontalAlign: "left", // "center" , "right"
                    verticalAlign: "center",  // "top" , "bottom"
                    fontSize: 15
                },
                data: [{
                    indexLabelFontFamily: "Righteous",
                    type: "bar",
                    name: "companies",
                    axisYType: "secondary",
                    showInLegend: true,
                    legendText: 'TCP',
                    dataPoints: objectTCP
                },{
                    indexLabelFontFamily: "Righteous",
                    type: "bar",
                    name: "companies",
                    axisYType: "secondary",
                    showInLegend: true,
                    legendText: 'UDP',
                    dataPoints: objectUDP
                }]
            });

            chart.render();
            var loading = document.getElementById("chartContainer5L");
            if (loading) {
                loading.remove()
            }

        })};

    var forCityPortAndProtocol = function() {$.post('report/for-city-port-and-protocol', {_token: "{{ csrf_token() }}"})
        .done(function (data) {
            var i;
            var objectTCP = [];
            var objectUDP = [];
            var objectColor = [];

            for (i = data.length - 1; i >= 0; i--) {
                if (data[i].type === 'TCP') {
                    objectTCP.push({y: data[i].total, label: data[i].name+' '+data[i].port});
                    objectUDP.push({y: 0});
                    objectColor.push('#ff0000');
                } else {
                    objectTCP.push({y: 0});
                    objectUDP.push({y: data[i].total, label: data[i].name+' '+data[i].port});
                    objectColor.push('#0000ff');
                }
            }


            var chart = new CanvasJS.Chart("chartContainer13", {
                animationEnabled: true,
                theme: "dark1",
                colorSet: "colorArray",
                title: {
                    fontFamily: "Righteous",
                    text: "Número de Ataques por cidade, porta e protocolo"
                },
                axisX: {
                    interval: 1
                },
                axisY: {
                    interlacedColor: "rgba(58,122,94,.1)",
                    gridColor: "rgba(58,122,94,.1)",
                    title: "A porta e o protocolo mais usados nas 10 cidades mais atacadas"
                },
                legend: {
                    horizontalAlign: "left", // "center" , "right"
                    verticalAlign: "center",  // "top" , "bottom"
                    fontSize: 15
                },
                data: [{
                    indexLabelFontFamily: "Righteous",
                    type: "column",
                    name: "companies",
                    axisYType: "primary",
                    showInLegend: true,
                    legendText: 'TCP',
                    dataPoints: objectTCP
                },{
                    indexLabelFontFamily: "Righteous",
                    type: "column",
                    name: "companies",
                    axisYType: "primary",
                    showInLegend: true,
                    legendText: 'UDP',
                    dataPoints: objectUDP
                }]
            });

            chart.render();
            var loading = document.getElementById("chartContainer13L");
            if (loading) {
                loading.remove()
            }

        })};


    var forCountry = function() {$.post('report/for-country', {_token: "{{ csrf_token() }}"})
        .done(function (data) {
            var i;
            var object = [];

            for (i = data.length - 1; i >= 0; i--) {
                object.push({y: data[i].total, label: data[i].name})
            }

            var chart = new CanvasJS.Chart("chartContainer6", {
                animationEnabled: true,
                theme: "dark1",

                title: {
                    fontFamily: "Righteous",
                    text: "Número de Ataques por países"
                },
                axisX: {
                    interval: 1
                },
                axisY2: {
                    interlacedColor: "rgba(58,122,94,.1)",
                    gridColor: "rgba(58,122,94,.1)",
                    title: "Os 10 países mais atacados"
                },
                data: [{
                    indexLabelFontFamily: "Righteous",
                    type: "bar",
                    name: "companies",
                    color: "rgb(58,122,94)",
                    axisYType: "secondary",
                    dataPoints: object
                }]
            });

            chart.render();
            var loading = document.getElementById("chartContainer6L");
            if (loading) {
                loading.remove()
            }

        })};

    var forCountryAndPort = function() {$.post('report/for-country-and-port', {_token: "{{ csrf_token() }}"})
        .done(function (data) {
            var i;
            var object = [];

            for (i = 0; i < data.length ; i++) {
                object.push({y: data[i].total, label: data[i].name+'     '+data[i].port})
            }

            var chart = new CanvasJS.Chart("chartContainer7", {
                animationEnabled: true,
                theme: "dark1",

                title: {
                    fontFamily: "Righteous",
                    text: "Número de Ataques por países e portas"
                },
                axisX: {
                    interval: 1
                },
                axisY: {
                    interlacedColor: "rgba(58,122,94,.1)",
                    gridColor: "rgba(58,122,94,.1)",
                    title: "As 10 portas mais atacas nos paises mais atacados"
                },
                data: [{
                    indexLabelFontFamily: "Righteous",
                    type: "column",
                    name: "companies",
                    color: "rgb(58,122,94)",
                    axisYType: "primary",
                    dataPoints: object
                }]
            });

            chart.render();
            var loading = document.getElementById("chartContainer7L");
            if (loading) {
                loading.remove()
            }

        })};

    var forCountryPortAndProtocol = function() {$.post('report/for-country-port-and-protocol', {_token: "{{ csrf_token() }}"})
        .done(function (data) {
            var i;
            var objectTCP = [];
            var objectUDP = [];
            var objectColor = [];

            for (i = data.length - 1; i >= 0; i--) {
                if (data[i].type === 'TCP') {
                    objectTCP.push({y: data[i].total, label: data[i].name+' '+data[i].port});
                    objectUDP.push({y: 0});
                    objectColor.push('#ff0000');
                } else {
                    objectTCP.push({y: 0});
                    objectUDP.push({y: data[i].total, label: data[i].name+' '+data[i].port});
                    objectColor.push('#0000ff');
                }
            }


            var chart = new CanvasJS.Chart("chartContainer14", {
                animationEnabled: true,
                theme: "dark1",
                colorSet: "colorArray",
                title: {
                    fontFamily: "Righteous",
                    text: "Número de Ataques por país, porta e protocolo"
                },
                axisX: {
                    interval: 1
                },
                axisY: {
                    interlacedColor: "rgba(58,122,94,.1)",
                    gridColor: "rgba(58,122,94,.1)",
                    title: "A porta e protocolo mais usados nos 10 paises mais atacados"
                },
                legend: {
                    horizontalAlign: "left", // "center" , "right"
                    verticalAlign: "center",  // "top" , "bottom"
                    fontSize: 15
                },
                data: [{
                    indexLabelFontFamily: "Righteous",
                    type: "column",
                    name: "companies",
                    axisYType: "primary",
                    showInLegend: true,
                    legendText: 'TCP',
                    dataPoints: objectTCP
                },{
                    indexLabelFontFamily: "Righteous",
                    type: "column",
                    name: "companies",
                    axisYType: "primary",
                    showInLegend: true,
                    legendText: 'UDP',
                    dataPoints: objectUDP
                }]
            });

            chart.render();
            var loading = document.getElementById("chartContainer14L");
            if (loading) {
                loading.remove()
            }

        })};

    var forCountryAndProtocol = function() {$.post('report/for-country-and-protocol', {_token: "{{ csrf_token() }}"})
        .done(function (data) {
            var i;
            var objectTCP = [];
            var objectUDP = [];
            var objectColor = [];

            for (i = data.length - 1; i >= 0; i--) {
                if (data[i].type === 'TCP') {
                    objectTCP.push({y: data[i].total, label: data[i].name});
                    objectUDP.push({y: 0});
                    objectColor.push('#ff0000');
                } else {
                    objectTCP.push({y: 0});
                    objectUDP.push({y: data[i].total, label: data[i].name});
                    objectColor.push('#0000ff');
                }
            }


            var chart = new CanvasJS.Chart("chartContainer8", {
                animationEnabled: true,
                theme: "dark1",
                colorSet: "colorArray",
                title: {
                    fontFamily: "Righteous",
                    text: "Número de Ataques por paíse e protocolo"
                },
                axisX: {
                    interval: 1
                },
                axisY2: {
                    interlacedColor: "rgba(58,122,94,.1)",
                    gridColor: "rgba(58,122,94,.1)",
                    title: "O protocolo mais usado nos 10 paises mais atacados"
                },
                legend: {
                    horizontalAlign: "left", // "center" , "right"
                    verticalAlign: "center",  // "top" , "bottom"
                    fontSize: 15
                },
                data: [{
                    indexLabelFontFamily: "Righteous",
                    type: "bar",
                    name: "companies",
                    axisYType: "secondary",
                    showInLegend: true,
                    legendText: 'TCP',
                    dataPoints: objectTCP
                },{
                    indexLabelFontFamily: "Righteous",
                    type: "bar",
                    name: "companies",
                    axisYType: "secondary",
                    showInLegend: true,
                    legendText: 'UDP',
                    dataPoints: objectUDP
                }]
            });

            chart.render();
            var loading = document.getElementById("chartContainer8L");
            if (loading) {
                loading.remove()
            }

        })};

    var forIP = function() {$.post('report/for-ip', {_token: "{{ csrf_token() }}"})
        .done(function (data) {
            var i;
            var object = [];

            for (i = data.length - 1; i >= 0; i--) {
                object.push({y: data[i].total, label: data[i].dst_ip})
            }

            var chart = new CanvasJS.Chart("chartContainer9", {
                animationEnabled: true,
                theme: "dark1",

                title: {
                    fontFamily: "Righteous",
                    text: "Número de Ataques por IP"
                },
                axisX: {
                    interval: 1
                },
                axisY2: {
                    interlacedColor: "rgba(58,122,94,.1)",
                    gridColor: "rgba(58,122,94,.1)",
                    title: "Os 10 IP's mais atacados"
                },
                data: [{
                    indexLabelFontFamily: "Righteous",
                    type: "bar",
                    name: "companies",
                    color: "rgb(58,122,94)",
                    axisYType: "secondary",
                    dataPoints: object
                }]
            });

            chart.render();
            var loading = document.getElementById("chartContainer9L");
            if (loading) {
                loading.remove()
            }

        })};

    var forIPAndPort = function() {$.post('report/for-ip-and-port', {_token: "{{ csrf_token() }}"})
        .done(function (data) {
            var i;
            var object = [];

            for (i = 0; i < data.length ; i++) {
                object.push({y: data[i].total, label: data[i].dst_ip+'     '+data[i].port})
            }

            var chart = new CanvasJS.Chart("chartContainer10", {
                animationEnabled: true,
                theme: "dark1",

                title: {
                    fontFamily: "Righteous",
                    text: "Número de Ataques por IP e portas"
                },
                axisX: {
                    interval: 1
                },
                axisY: {
                    interlacedColor: "rgba(58,122,94,.1)",
                    gridColor: "rgba(58,122,94,.1)",
                    title: "As portas mais usadas nos 10 ip's mais atacados"
                },
                data: [{
                    indexLabelFontFamily: "Righteous",
                    type: "column",
                    name: "companies",
                    color: "rgb(58,122,94)",
                    axisYType: "primary",
                    dataPoints: object
                }]
            });

            chart.render();
            var loading = document.getElementById("chartContainer10L");
            if (loading) {
                loading.remove()
            }

        })};

    var forIPAndProtocol = function() {$.post('report/for-ip-and-protocol', {_token: "{{ csrf_token() }}"})
        .done(function (data) {
            var i;
            var objectTCP = [];
            var objectUDP = [];
            var objectColor = [];

            for (i = data.length - 1; i >= 0; i--) {
                if (data[i].type === 'TCP') {
                    objectTCP.push({y: data[i].total, label: data[i].dst_ip});
                    objectUDP.push({y: 0});
                    objectColor.push('#ff0000');
                } else {
                    objectTCP.push({y: 0});
                    objectUDP.push({y: data[i].total, label: data[i].dst_ip});
                    objectColor.push('#0000ff');
                }
            }


            var chart = new CanvasJS.Chart("chartContainer11", {
                animationEnabled: true,
                theme: "dark1",
                colorSet: "colorArray",
                title: {
                    fontFamily: "Righteous",
                    text: "Número de Ataques por IP e protocolo"
                },
                axisX: {
                    interval: 1
                },
                axisY2: {
                    interlacedColor: "rgba(58,122,94,.1)",
                    gridColor: "rgba(58,122,94,.1)",
                    title: "O protocolo mais usado nos 10 ip's mais atacados"
                },
                legend: {
                    horizontalAlign: "left", // "center" , "right"
                    verticalAlign: "center",  // "top" , "bottom"
                    fontSize: 15
                },
                data: [{
                    indexLabelFontFamily: "Righteous",
                    type: "bar",
                    name: "companies",
                    axisYType: "secondary",
                    showInLegend: true,
                    legendText: 'TCP',
                    dataPoints: objectTCP
                },{
                    indexLabelFontFamily: "Righteous",
                    type: "bar",
                    name: "companies",
                    axisYType: "secondary",
                    showInLegend: true,
                    legendText: 'UDP',
                    dataPoints: objectUDP
                }]
            });

            chart.render();
            var loading = document.getElementById("chartContainer11L");
            if (loading) {
                loading.remove()
            }

        })};

    var forProtocol = function() {$.post('report/for-protocol', {_token: "{{ csrf_token() }}"})
        .done(function (data) {
            var i;
            var objectTCP = [];
            var objectUDP = [];
            var objectColor = [];

            for (i = data.length - 1; i >= 0; i--) {
                if (data[i].type === 'TCP') {
                    objectTCP.push({y: data[i].total});
                    objectUDP.push({y: 0});
                    objectColor.push('#ff0000');
                } else {
                    objectTCP.push({y: 0});
                    objectUDP.push({y: data[i].total});
                    objectColor.push('#0000ff');
                }
            }


            var chart = new CanvasJS.Chart("chartContainer12", {
                animationEnabled: true,
                theme: "dark1",
                colorSet: "colorArray",
                title: {
                    fontFamily: "Righteous",
                    text: "Número de Ataques por protocolo"
                },
                axisX: {
                    interval: 1
                },
                axisY2: {
                    interlacedColor: "rgba(58,122,94,.1)",
                    gridColor: "rgba(58,122,94,.1)",
                    title: "Quantidade de ataques por protocolo"
                },
                legend: {
                    horizontalAlign: "left", // "center" , "right"
                    verticalAlign: "center",  // "top" , "bottom"
                    fontSize: 15
                },
                data: [{
                    indexLabelFontFamily: "Righteous",
                    type: "bar",
                    name: "companies",
                    axisYType: "secondary",
                    showInLegend: true,
                    legendText: 'TCP',
                    dataPoints: objectTCP
                },{
                    indexLabelFontFamily: "Righteous",
                    type: "bar",
                    name: "companies",
                    axisYType: "secondary",
                    showInLegend: true,
                    legendText: 'UDP',
                    dataPoints: objectUDP
                }]
            });

            chart.render();

            var loading = document.getElementById("chartContainer12L");
            if (loading) {
                loading.remove()
            }

        })};

</script>