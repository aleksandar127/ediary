
  <div class="col-md-12 text-center my-4 d-flex justify-content-center">
    <h1 class="font-weight-bold">Prosek ocena za <span class="text-black">1/1</span></h1>
    <div class="">
    <form action="exportClassGrades?class=1/1&high_low=0" method="POST">
    <input class="btn btn-outline-dark btn-lg mt-1 ml-3" name="exportClass" type="submit" value="Export Data">
  </form>
  </div>
  </div>




<div class="row mt-3 tabela" style="height:80vh">
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
chart.data = [{"prosecna_ocena":"5.0","predmet":"fizi\u010dko vaspitanje"},{"prosecna_ocena":"4.0","predmet":"likovno vaspitanje"},{"prosecna_ocena":"3.3","predmet":"matematika"},{"prosecna_ocena":"3.7","predmet":"muzi\u010dko vaspitanje"},{"prosecna_ocena":"3.3","predmet":"srpski jezik"},{"prosecna_ocena":"4.0","predmet":"Svet oko nas"}]
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


