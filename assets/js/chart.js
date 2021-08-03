$(function () {
  /* ChartJS
   * -------
   * Data and config for chartjs
   */
  'use strict';
  
    var kamarierat = []; 
    var shuma =[];
    
   
                 $(document).ready(function(){
                    $.get("<?php DOMAIN ?>services/barazimi.php", function(data,status){
                        var items = JSON.parse(data);
                        for(var i=0;i<items.length;i++){
                           kamarierat.push(items[i].emri);
                           shuma.push(items[i].Shuma);
                            document.write((items[i].emri));
                            
                        }
                    }); 
                 });
 
   var doughnutPieData = {
    datasets: [{
      data: [],
      backgroundColor: [
        'rgba(255, 99, 132, 0.5)',
        'rgba(54, 162, 235, 0.5)',
        'rgba(255, 206, 86, 0.5)',
        'rgba(75, 192, 192, 0.5)',
        'rgba(153, 102, 255, 0.5)',
        'rgba(255, 159, 64, 0.5)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
    }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels: []
  };
  var doughnutPieOptions = {
    responsive: true,
    animation: {
      animateScale: true,
      animateRotate: true
    }
  };

for (var i = 0; i < shuma.length; i++) {
  doughnutPieData.datasets.push(
    {
      label: kamarierat[i],
      backgroundColor: shuma[i]
    }
  )
}

  if ($("#pieChart").length) {
    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: doughnutPieData,
      options: doughnutPieOptions
    });
  }


});