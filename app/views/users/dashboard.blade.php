<?php
/**
 * Created by PhpStorm.
 * User: shaunhare
 * Date: 30/11/2013
 * Time: 15:15
 */ ?>
<section>
    <header><h2>Feedback Results</h2></header>

<div class="row">
    <div class="col-xs-6">
    <h3>Ratings</h3>
    <div id="chartdiv" style="width: 100%; height: 462px;"></div>
    </div>
    <div class="col-xs-6">
        <h3># Pages commented on</h3>
        <p class="pages">{{$pages}}</p>
    </div>
</div>
</section>
<div class="table-responsive">
    <table class="table table-bordered table-hover tablesorter">
        <thead>
        <tr>
            <th>Page <i class="fa fa-sort"></i></th>
            <th>What were you trying to do? <i class="fa fa-sort"></i></th>
            <th>What happened? <i class="fa fa-sort"></i></th>
            <th>Rating <i class="fa fa-sort"></i></th>
            <th> User <i class="fa fa-sort"></i></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($feedback as $item)
        <tr>
            <td>{{$item->page}}</td>
            <td>{{$item->doing}}</td>
            <td>{{$item->happened}}</td>
            <td>{{$item->rating}}</td>
            <td>{{$item->user}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>

</div>
<script src="{{ URL::asset('packages/amcharts_3.3.2/amcharts/amcharts.js') }}" type="text/javascript" ></script>
<script src="{{ URL::asset('packages/amcharts_3.3.2/amcharts/pie.js') }}" type="text/javascript" ></script>
<script>
    var chart;
    var legend;

    var chartData = {{$rating}};

    AmCharts.ready(function () {
        // PIE CHART
        chart = new AmCharts.AmPieChart();
        chart.dataProvider = chartData;
        chart.titleField = "label";
        chart.valueField = "value";
        chart.outlineColor = "#FFFFFF";
        chart.outlineAlpha = 0.8;
        chart.outlineThickness = 2;
        chart.balloonText = "[[title]]<br><span style='font-size:14px'><b>[[value]]</b>";
        chart.depth3D = 15;
        chart.angle = 30;
        // LEGEND
        legend = new AmCharts.AmLegend();
        legend.align = "center";
        legend.markerType = "circle";
        chart.addLegend(legend);
        // WRITE
        chart.write("chartdiv");


    });

</script>
<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('js/feedback.js') }}"></script>
<script src="{{ URL::asset('js/tablesorter.js') }}"></script>

<script>

        jQuery(".tablesorter").tablesorter();


</script>