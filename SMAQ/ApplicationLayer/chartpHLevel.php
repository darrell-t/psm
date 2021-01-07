<?php
    include "../libs/config.php";
    displayChartInc();
?>
<script type="text/javascript">
	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart);

	function drawChart(){
	    var data = new google.visualization.DataTable(<?php echo $jsonTable = displayChartpH(); ?>);
	    var options = {
	        title:'pH Level',
	        legend:{position:'bottom'},
	        chartArea:{width:'80%', height:'65%'},
	        hAxis: {
	        	format: 'd MMM HH:mm'
	        }
	    };
	    var chart = new google.visualization.LineChart(document.getElementById('line_chart_airHum'));
	    chart.draw(data, options);
	}
</script>
<style>
	.page-wrapper{
	    width:1000px;
	    margin:0 auto;
	}
</style>
<script src="jquery-1.11.3.min.js"></script>
<div id="line_chart_airHum" style="width: 100%; height: 350px"></div>
