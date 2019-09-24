<?php

$class = str_replace('/', '-', $_GET['class']);

$cacheFile = sprintf("views/director/pages/cache/avgclass_cache%s-%s.php", 
			$class, date("Ymd"));


ob_start();

?>

  <div class="col-md-12 text-center my-3">
    <h1 class="font-weight-bold">Prosek ocena za <span class="text-black"><?php echo isset($this->data['class']) ? $this->data['class'] : null; ?></span></h1>
  </div>

<?php if($this->data['grades'] == '[]'): ?>
  <div class="col mt-3">
    <h2 class="text-danger font-weight-bold text-center">Ovaj razred jos nema ocena!</h2>
  </div>
<?php else: ?>


<div class="row mt-2 tabela" style="height:80vh">
    <div class="col-md-11 mx-auto mb-3" id="class"></div>
</div>  

  <!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("class", am4charts.XYChart);

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
<?php endif; ?>


<?php 

$content = ob_get_contents();
ob_end_clean();

$handle = fopen($cacheFile, "w");
fwrite($handle, $content);
fclose($handle);

echo $content;

?>