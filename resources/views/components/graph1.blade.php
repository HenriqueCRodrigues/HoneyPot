<div class="relat-graph">
    <div id="chartContainer" style="height: 360px; width: 100%;"></div>
</div>

<script src="js/jquery.js"></script>
<script>
    $(".jssora061").click(function(){
        alert('pulei');
    });
    $.post('report/for-port', { _token: "{{ csrf_token() }}"})
        .done(function( data ) {
            var i;
            var object = [];
            var table = document.getElementById("tablePort");

            for (i = data.length-1; i >= 0; i--) {
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

</script>