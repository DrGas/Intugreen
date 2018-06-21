<?php if ( ! defined( 'ABSPATH' ) ) exit;
include(ULPB_PLUGIN_PATH.'admin/views/UI/tabs/form-analytics-function.php');
?>
<script type="text/javascript" src="<?php echo(ULPB_PLUGIN_URL.'/js/Chart.js'); ?>"></script>


<div id="pluginops_analytics" style="margin:0 auto; padding:1% 12.5%; background: #E7E7E7;">
    <div class="analytics-card">
        <h3> Unique Impressions </h3>
        <p> <?php echo "$uniqueImpressions"; ?> </p>    
    </div>
    <div class="analytics-card">
        <h3> All Impressions </h3>
        <p> <?php echo "$allImpressions"; ?> </p>
    </div>
    <div class="analytics-card">
        <h3> Conversion Rate </h3>
        <p> <?php  echo "$conversionRate" ?> % </p>
    </div>
    <div class="analytics-card" >
        <h3> Total Conversions </h3>
        <p> <?php  echo "$totalConversions" ?> </p>
    </div>
    <div class="analytics-card" style="">
        <canvas id="sevenDayConversionImpressions" width="250" height="250"></canvas>      
    </div>
    <div class="analytics-card" style="">
        <canvas id="sevenDayConversionRate" width="250" height="250"></canvas>      
    </div>
</div>

<!--
<div id="resetAnalyticsBtn"> Reset Analytics </div>

<p class="analyticsDeleted"></p>
-->

<script>

var lastSevenDates = [<?php for ($i=0; $i <7 ; $i++) { echo "'".$lastThirtyDatesForChart[$i]."',";} ?>];
lastSevenDates.reverse();
var lastSevenData = [<?php for ($i=0; $i <7 ; $i++) { echo "'".$numberOfConversions[$i]."',";} ?>];
lastSevenData.reverse();

var lastSevenDataImpressions = [<?php for ($i=0; $i <7 ; $i++) { 
    if ($lastThirtyDaysImpressions[$i] > 0) {
        $impression = $lastThirtyDaysImpressions[$i];
    }else{
        $impression = 0;
    }
    echo "'".$impression."',";} ?>];
lastSevenDataImpressions.reverse();

var lastSevenDataConversionRate = [ <?php for ($i=0; $i <7 ; $i++) {
    $Noc = $numberOfConversions[$i];
    $Ltdi = $lastThirtyDaysImpressions[$i];
    if ($numberOfConversions[$i] > 0 && $lastThirtyDaysImpressions[$i] > 0) {
    $conversionRate = ((int)$numberOfConversions[$i] / $lastThirtyDaysImpressions[$i])*100;
    $conversionRate =  round( $conversionRate, 1, PHP_ROUND_HALF_UP);
    } else{
        $conversionRate = 0;
    }
    echo "'".$conversionRate."',";} ?>];
lastSevenDataConversionRate.reverse();


var lineChartData = {
    labels: lastSevenDates,
    datasets: [{
        label: "Conversions",
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1.5,
        backgroundColor: 'rgba(54, 162, 235, 0.4)',
        fill: true,
        data:lastSevenData ,
        yAxisID: "y-axis-1",
    }, {
        label: "Impressions",
        borderColor: '#ee2c47',
        borderWidth: 1.5,
        backgroundColor: 'rgba(232, 81, 101, 0.4)',
        fill: true,
        data: lastSevenDataImpressions,
        yAxisID: "y-axis-2"
    }]
};
window.onload = function () {
    var ctx = document.getElementById("sevenDayConversionImpressions").getContext("2d");
    window.myLine = Chart.Line(ctx, {
        data: lineChartData,
        options: {
            responsive: true,
            hoverMode: 'index',
            stacked: false,
            title: {
                display: true,
                text: 'Last 7 Days Conversions & Impressions'
            },
            scales: {
                yAxes: [{
                    type: "linear", 
                    display: true,
                    position: "left",
                    id: "y-axis-1",
                }, {
                    type: "linear", 
                    display: true,
                    position: "right",
                    id: "y-axis-2",
                    gridLines: {
                        drawOnChartArea: false,
                    },
                }],
            }
        }
    });


    var ctxtwo = document.getElementById("sevenDayConversionRate").getContext('2d');
    var sevenDayConversionRate = new Chart(ctxtwo, {
        type: 'line',
        data: {
            labels: lastSevenDates,
            datasets: [{
                label: 'Conversion Rate %',
                data: lastSevenDataConversionRate,
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                ],
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
};


</script>