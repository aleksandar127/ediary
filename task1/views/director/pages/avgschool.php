<?php 

 $cacheFile = sprintf("views/director/pages/cache/avgschool_cache%s.php", date("Ymd"));


ob_start();

?>

<div class="col-md-12 text-center my-4 d-flex justify-content-center">
    <h1 class="font-weight-bold">Prosek ocena na nivou skole</h1>
    <div class="">
    <!-- <form action="exportSchoolGrades" method="POST">
    <input class="btn btn-outline-dark btn-lg mt-1 ml-3" name="export" type="submit" value="Export Data">
  </form> -->
  <button class="btn btn-dark btn-lg mt-1 ml-3" onclick="location.href='exportSchoolGrades'">Sačuvaj kao .xlsx</button>
 
  </div>
</div>

<div class="row mt-3 tabela" style="height:80vh">
    <div class="col-md-11 mx-auto mb-4 rounded" id="school"></div>
</div> 

  <!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("school", am4charts.XYChart);

// Add data
chart.data = <?php echo $this->data['grades']; ?>

//console.log(chart.data)

// Create axes

let categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "predmet";
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.renderer.minGridDistance = 30;
categoryAxis.title.text = "Predmeti";



// categoryAxis.renderer.labels.template.adapter.add("dy", function(dy, target) {
//   if (target.dataItem && target.dataItem.index & 2 == 2) {
//     return dy + 25;
//   }
//   return dy;
// });

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.min = 0;
valueAxis.max = 5;
valueAxis.renderer.minGridDistance = 100;
valueAxis.title.text = "Prosek ocena";


valueAxis.numberFormatter.numberFormat = "#.00";

// Create series
var series = chart.series.push(new am4charts.ColumnSeries());

series.dataFields.valueY = "prosecna_ocena";
series.dataFields.categoryX = "predmet";
//series.name = "Visits";
series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
series.columns.template.fillOpacity = .8;
series.columns.template.column.cornerRadiusTopLeft = 10;
series.columns.template.column.cornerRadiusTopRight = 10;
series.columns.template.column.fillOpacity = 0.8;

var hoverState = series.columns.template.column.states.create("hover");
hoverState.properties.cornerRadiusTopLeft = 0;
hoverState.properties.cornerRadiusTopRight = 0;
hoverState.properties.fillOpacity = 1;

var columnTemplate = series.columns.template;
columnTemplate.strokeWidth = 2;
columnTemplate.strokeOpacity = 1;
series.columns.template.adapter.add("fill", function(fill, target) {
  return chart.colors.getIndex(target.dataItem.index);
});
}); // end am4core.ready()
</script>

<?php 

$content = ob_get_contents();
ob_end_clean();

$handle = fopen($cacheFile, "w");
fwrite($handle, $content);
fclose($handle);

echo $content;

?>