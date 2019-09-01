
am4core.useTheme(am4themes_animated);

var chart = am4core.createFromConfig({
  // Reduce saturation of colors to make them appear as toned down
  "colors": {
    "saturation": 0.4
  },

 
  // Setting data
  "data": [{
    "predmet": "Srpski jezik",
    "prosecna_ocena": 3.9
  }, {
    "predmet": "Matematika",
    "prosecna_ocena": 3.7
  }, {
    "predmet": "Fizicko",
    "prosecna_ocena": 5
  }, {
    "predmet": "Hemija",
    "prosecna_ocena": 3.1
  }, {
    "predmet": "Likovno",
    "prosecna_ocena": 4.4
  }, {
    "predmet": "Fizika",
    "prosecna_ocena": 2.6
  }, {
    "predmet": "Geografija",
    "prosecna_ocena": 3.9
  }, {
    "predmet": "Biologija",
    "prosecna_ocena": 4.1
  }, {
    "predmet": "Istorija",
    "prosecna_ocena": 3.0
  }],

  // Add Y axis
  "yAxes": [{
    "type": "ValueAxis",
    "renderer": {
      "maxLabelPosition": 0.98
    }
  }],

  // Add X axis
  "xAxes": [{
    "type": "CategoryAxis",
    "renderer": {
      "minGridDistance": 20,
      "grid": {
        "location": 0
      }
    },
    "dataFields": {
      "category": "predmet"
    }
  }],

  // Add series
  "series": [{
    // Set type
    "type": "ColumnSeries",

    // Define data fields
    "dataFields": {
      "categoryX": "predmet",
      "valueY": "prosecna_ocena"
    },

    // Modify default state
    "defaultState": {
      "transitionDuration": 1500
    },

    // Set animation options
    "sequencedInterpolation": true,
    "sequencedInterpolationDelay": 100,

    // Modify color appearance
    "columns": {
      // Disable outline
      "strokeOpacity": 0,

      // Add adapter to apply different colors for each column
      "adapter": {
        "fill": function (fill, target) {
          return chart.colors.getIndex(target.dataItem.index);
        }
      }
    }
  }],

  // Enable chart cursor
  "cursor": {
    "type": "XYCursor",
    "behavior": "zoomX"
  }
}, "chartdiv", "XYChart");


//-------------------------------------------------------

// am4core.useTheme(am4themes_animated);

// var chart = am4core.createFromConfig({
//   // Reduce saturation of colors to make them appear as toned down
//   "colors": {
//     "saturation": 0.4
//   },

//   // Setting data
//   "data": [{
//     "country": "USA",
//     "visits": 3025
//   }, {
//     "country": "China",
//     "visits": 1882
//   }, {
//     "country": "Japan",
//     "visits": 1809
//   }, {
//     "country": "Germany",
//     "visits": 1322
//   }, {
//     "country": "UK",
//     "visits": 1122
//   }, {
//     "country": "France",
//     "visits": 1114
//   }, {
//     "country": "India",
//     "visits": 984
//   }, {
//     "country": "Spain",
//     "visits": 711
//   }, {
//     "country": "Netherlands",
//     "visits": 665
//   }, {
//     "country": "Russia",
//     "visits": 580
//   }, {
//     "country": "South Korea",
//     "visits": 443
//   }, {
//     "country": "Canada",
//     "visits": 441
//   }],

//   // Add Y axis
//   "yAxes": [{
//     "type": "ValueAxis",
//     "renderer": {
//       "maxLabelPosition": 0.98
//     }
//   }],

//   // Add X axis
//   "xAxes": [{
//     "type": "CategoryAxis",
//     "renderer": {
//       "minGridDistance": 20,
//       "grid": {
//         "location": 0
//       }
//     },
//     "dataFields": {
//       "category": "country"
//     }
//   }],

//   // Add series
//   "series": [{
//     // Set type
//     "type": "ColumnSeries",

//     // Define data fields
//     "dataFields": {
//       "categoryX": "country",
//       "valueY": "visits"
//     },

//     // Modify default state
//     "defaultState": {
//       "transitionDuration": 1000
//     },

//     // Set animation options
//     "sequencedInterpolation": true,
//     "sequencedInterpolationDelay": 100,

//     // Modify color appearance
//     "columns": {
//       // Disable outline
//       "strokeOpacity": 0,

//       // Add adapter to apply different colors for each column
//       "adapter": {
//         "fill": function (fill, target) {
//           return chart.colors.getIndex(target.dataItem.index);
//         }
//       }
//     }
//   }],

//   // Enable chart cursor
//   "cursor": {
//     "type": "XYCursor",
//     "behavior": "zoomX"
//   }
// }, "chartdiv", "XYChart");