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
        <div data-p="170.00">
            <img data-u="image"
                 src="http://img.ibxk.com.br/ns/rexposta/2016/07/27/27230226628816.jpg?watermark=neaki&w=600"/>
        </div>
        <div data-p="170.00" id="forPort">
            <div class="relat-graph">
                <div id="chartContainer" style="height: 360px; width: 100%;"></div>
            </div>

        </div>
        <div data-p="170.00">
            <img data-u="image" src="https://pm1.narvii.com/6612/f8df77563735e0bd149d899116dcfd38e18b3cc5_hq.jpg"/>
        </div>
        <div data-p="170.00">
            <img data-u="image"
                 src="https://scontent-atl3-1.cdninstagram.com/vp/873714451820826712106971ccb30f3b/5BC1FE7D/t51.2885-15/e35/33210118_148097136047300_3612369294697955328_n.jpg"/>
        </div>
        <div data-p="170.00">
            <img data-u="image" data-src2="img/048.jpg"/>
        </div>
        <div data-p="170.00">
            <img data-u="image" data-src2="img/044.jpg"/>
            <div u="thumb">Slide Description 006</div>
        </div>
        <div data-p="170.00">
            <img data-u="image" data-src2="img/050.jpg"/>
            <div u="thumb">Slide Description 007</div>
        </div>
        <div data-p="170.00">
            <img data-u="image" data-src2="img/049.jpg"/>
            <div u="thumb">Slide Description 008</div>
        </div>
        <div data-p="170.00">
            <img data-u="image" data-src2="img/052.jpg"/>
            <div u="thumb">Slide Description 009</div>
        </div>
        <div data-p="170.00">
            <img data-u="image" data-src2="img/051.jpg"/>
            <div u="thumb">Slide Description 010</div>
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
    $(".jssora061").click(function () {

        $.post('report/for-port', {_token: "{{ csrf_token() }}"})
            .done(function (data) {
                var i;
                var object = [];
                var table = document.getElementById("tablePort");

                for (i = data.length - 1; i >= 0; i--) {
                    object.push({y: data[i].total, label: data[i].port})
                    var row = table.insertRow(0);
                    var cell1 = row.insertCell(0);
                    cell1.innerHTML = data[i].port;
                }

                var chart = new CanvasJS.Chart("chartContainer", {
                    animationEnabled: true,
                    theme: "dark1",

                    title: {
                        fontFamily: "Righteous",
                        text: "Numero de Ataques por portas"
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

            });
    });

</script>