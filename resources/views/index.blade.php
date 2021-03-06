@extends('layouts.master')

@section('content')
<script src="//www.amcharts.com/lib/3/amcharts.js"></script>
<script src="//www.amcharts.com/lib/3/serial.js"></script>
<script src="//www.amcharts.com/lib/3/themes/light.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOKAG57YPhE9w_R_ZNL1SCCf_BPJDFcx0&libraries=visualization"></script>

<style type="text/css">
#chartdiv {
    width: 100%;
    height: 500px;
}
#map {
    width: 100%;
    height: 450px;
}
.modal.bottom-sheet {
    max-height: 90%;
}
</style>

<div class="col s12 m6">
    <div id="chartdiv"></div>
</div>
<div class="col s12 m6">
    <div id="map"></div>
</div>

<div class="col s12 m12">
    <table>
        <thead>
            <tr>
                <th data-field="created_at">시간</th>
                <th data-field="location">지역</th>
                <th data-field="animal_name">동물</th>
                <th data-field="is_crash">사고여부</th>
                <th data-field="photo_view">사진보기</th>
                
            </tr>
        </thead>

        <tbody>
            @foreach($device_datas as $device_data)
            <tr>
                <td>{{$device_data->created_at->diffForHumans()}}</td>
                <td>서울 서초구 양재동 엘타워</td>
                <td>{{$device_data->animal_name}}</td>
                <td>&times;</td>

                <td>
                    <a class="modal-trigger waves-effect waves-light" href="#modal1">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Structure -->
<div id="modal1" class="modal bottom-sheet">
    <div class="modal-content">
        {{-- <h4>Modal Header</h4> --}}
        <p style="text-align: center;">
            <img width="70%" src="{{url('photos/2.jpg')}}" />
        </p>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
</div>

<script type="text/javascript">
$(function() {
    $('.modal').modal({
        ready: function(modal, trigger) {
            console.log(modal, trigger);
        }
    })
});
/** Google maps */
var map, heatmap;

function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 16,
    center: {lat: 37.482424, lng: 127.035411},
    mapTypeId: google.maps.MapTypeId.HYBRID
  });

  heatmap = new google.maps.visualization.HeatmapLayer({
    data: getPoints(),
    map: map,
    radius: 50
  });
}

initMap();

// Heatmap data: 500 Points
function getPoints() {
    return [
        {location: new google.maps.LatLng(37.484306, 127.034081), weight: 10},
        {location: new google.maps.LatLng(37.483267, 127.035121), weight: 8},
        {location: new google.maps.LatLng(37.482799, 127.034456), weight: 9},
        {location: new google.maps.LatLng(37.481777, 127.035304), weight: 4},
        {location: new google.maps.LatLng(37.482262, 127.036087), weight: 5},
        {location: new google.maps.LatLng(37.481632, 127.036795), weight: 8},
    ];
}


/**
 * Init some variables for demo purposes
 */
var minute = 0;
var firstDate = new Date();
firstDate.setMinutes( firstDate.getMinutes() - 30 );

/**
 * Function that generates random data
 */
function generateChartData() {
  var chartData = [];
  for ( minute = 0; minute <= 30; minute++ ) {
    var newDate = new Date( firstDate );
    newDate.setMinutes( newDate.getMinutes() + minute );

    var rand_animals = Math.round( Math.random() * 10 );
    var rand_cars = Math.round( Math.random() * 10 );
    var animals = 0;
    var cars = 0;

    if(rand_animals >= 8) {
        animals = Math.round( Math.random() * 2 );
    }

    if(rand_cars >= 5) {
        cars = Math.round( Math.random() * 5 );
    }

    chartData.push( {
      "date": newDate,
      "animals": animals,
      "cars": cars,
    } );
  }

  return chartData;
}

/**
 * Create the chart
 */
var chart = AmCharts.makeChart( "chartdiv", {
  "type": "serial",
  "theme": "light",
  "zoomOutButton": {
    "backgroundColor": '#000000',
    "backgroundAlpha": 0.15
  },
  "export": {
    "enabled": true
  },
  "dataProvider": generateChartData(),
  "categoryField": "date",
  "categoryAxis": {
    "parseDates": true,
    "minPeriod": "mm",
    "dashLength": 1,
    "gridAlpha": 0.15,
    "axisColor": "#DADADA"
  },
  "graphs": [
    {
        "id": "g1",
        "title": "Animals",
        "valueField": "animals",
        "bullet": "round",
        "bulletBorderColor": "#FFFFFF",
        "bulletBorderThickness": 2,
        "lineThickness": 2,
        "lineColor": "#ff6961",
        "min": 0,
        "hideBulletsCount": 50
    },
    {
        "id": "g2",
        "title": "Cars",
        "valueField": "cars",
        "bullet": "round",
        "bulletBorderColor": "#FFFFFF",
        "bulletBorderThickness": 2,
        "lineThickness": 2,
        "lineColor": "#aec6cf",
        "min": 0,
        "hideBulletsCount": 50
    }
  ],
  "legend": {
      "maxColumns": 2,
      "position": "bottom",
      "useGraphSettings": true,
      "markerSize": 10,
    },
  "chartCursor": {
    "cursorPosition": "mouse",
    "categoryBalloonDateFormat": "JJ:NN, DD MMMM"
  }
} )

/**
 * Set interval to push new data points periodically
 */
// set up the chart to update every second
setInterval( function() {
  // normally you would load new datapoints here,
  // but we will just generate some random values
  // and remove the value from the beginning so that
  // we get nice sliding graph feeling

  // remove datapoint from the beginning
  chart.dataProvider.shift();

  // add new one at the end
  minute++;
  var newDate = new Date( firstDate );
  newDate.setMinutes( newDate.getMinutes() + minute );
  
  var rand_animals = Math.round( Math.random() * 10 );
  var rand_cars = Math.round( Math.random() * 10 );
  var animals = 0;
  var cars = 0;

  if(rand_animals >= 8) {
      animals = Math.round( Math.random() * 2 );
  }

  if(rand_cars >= 5) {
      cars = Math.round( Math.random() * 5 );
  }

  chart.dataProvider.push( {
    date: newDate,
    animals: animals,
    cars: cars
  } );
  chart.validateData();
}, 10000 );
</script>
@endsection