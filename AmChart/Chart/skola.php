<?php 

require_once '../../task1/db.php';
require_once '../../task1/constants.php';

$db = new DB();

$param = '7/1';

$sql = DB::$conn->prepare('SELECT SUM(shg.grades) / COUNT(students.id) AS prosecna_ocena, subjects.name AS predmet FROM subjects_has_grades shg
  JOIN subjects ON shg.subjects_id = subjects.id 
  JOIN subjects_has_grades_has_students shghs ON shg.id = shghs.subjects_has_grades_id 
  JOIN students ON shghs.students_id = students.id 
  JOIN class ON students.class_id = class.id 
  WHERE class.name = ? GROUP BY subjects.name');
$sql->execute([$param]);
$result = $sql->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($result);
var_dump($json);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Chart</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
    <!-- Resources -->
  <script src="https://www.amcharts.com/lib/4/core.js"></script>
  <script src="https://www.amcharts.com/lib/4/charts.js"></script>
  <script src="https://www.amcharts.com/lib/4/themes/material.js"></script>
  <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
</head>
<body>

  <div class="col-md-12 text-center">
    <h2 class="font-weight-bold">Prosecne Ocene za 7/1</h2>
  </div>
  <div id="razred"></div> 

  <!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_material);
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("razred", am4charts.XYChart);
chart.scrollbarX = new am4core.Scrollbar();

// Add data


chart.data = <?php echo $json; ?>

// chart.dataSource.url = 'index.php';
// chart.dataSource.parser = new am4core.JSONParser(<?php // echo $json ?>);

  

// Create axes
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "predmet";
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.renderer.minGridDistance = 30;
categoryAxis.renderer.labels.template.horizontalCenter = "middle";
categoryAxis.renderer.labels.template.verticalCenter = "top";
categoryAxis.renderer.labels.template.rotation = 0;
categoryAxis.tooltip.disabled = true;
categoryAxis.renderer.minHeight = 110;

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.renderer.minWidth = 50;

// Create series
var series = chart.series.push(new am4charts.ColumnSeries());
series.sequencedInterpolation = true;
series.dataFields.valueY = "prosecna_ocena";
series.dataFields.categoryX = "predmet";
series.tooltipText = "[{categoryX}: bold]{valueY}[/]";
series.columns.template.strokeWidth = 0;

series.tooltip.pointerOrientation = "vertical";

series.columns.template.column.cornerRadiusTopLeft = 10;
series.columns.template.column.cornerRadiusTopRight = 10;
series.columns.template.column.fillOpacity = 0.8;

// on hover, make corner radiuses bigger
var hoverState = series.columns.template.column.states.create("hover");
hoverState.properties.cornerRadiusTopLeft = 0;
hoverState.properties.cornerRadiusTopRight = 0;
hoverState.properties.fillOpacity = 1;

series.columns.template.adapter.add("fill", function(fill, target) {
  return chart.colors.getIndex(target.dataItem.index);
});

// Cursor
chart.cursor = new am4charts.XYCursor();

}); // end am4core.ready()
</script>





</body>
</html>

