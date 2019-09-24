
  <div class="col-md-12 text-center my-3">
    <h1 class="font-weight-bold">Prosek ocena za <span class="text-black">7/1</span></h1>
  </div>



<div class="row mt-2 tabela" style="height:80vh">
    <div class="col-md-11 mx-auto mb-3" id="razred"></div>
</div>  

  <!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("razred", am4charts.XYChart);

// Add data
<<<<<<< HEAD
chart.data = [{"prosecna_ocena":"3.5000","predmet":"biologija"},{"prosecna_ocena":"4.2500","predmet":"engleski jezik"},{"prosecna_ocena":"5.0000","predmet":"fizi\u010dko vaspitanje"},{"prosecna_ocena":"3.0000","predmet":"fizika"},{"prosecna_ocena":"4.5000","predmet":"geografija"},{"prosecna_ocena":"3.2222","predmet":"hemija"},{"prosecna_ocena":"4.7500","predmet":"likovno vaspitanje"},{"prosecna_ocena":"3.6000","predmet":"matematika"},{"prosecna_ocena":"4.4000","predmet":"muzi\u010dko vaspitanje"},{"prosecna_ocena":"3.5000","predmet":"srpski jezik"}]
=======
chart.data = [{"prosecna_ocena":"4.2500","predmet":"Biologija"},{"prosecna_ocena":"4.5000","predmet":"Engleski"},{"prosecna_ocena":"4.7500","predmet":"Fizicko"},{"prosecna_ocena":"3.0000","predmet":"Fizika"},{"prosecna_ocena":"3.7500","predmet":"Geografija"},{"prosecna_ocena":"3.2500","predmet":"Hemija"},{"prosecna_ocena":"4.0000","predmet":"Istorija"},{"prosecna_ocena":"4.5000","predmet":"Likovno"},{"prosecna_ocena":"3.2500","predmet":"Matematika"},{"prosecna_ocena":"4.0000","predmet":"Srpski"}]
>>>>>>> 5479b2508d32371a2c323d3105103930cafce03e
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


