google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);



function drawBasic() {

      var data = google.visualization.arrayToDataTable([
        ['City', '2010 Population',{role: 'style'}],
        ['New York City, NY', 8175000, '#b81865'],
        ['Los Angeles, CA', 3792000, '#9865db'],
        ['Chicago, IL', 2695000, '#9c1774'],
        ['Houston, TX', 2099000, '#9fab1b'],
        ['Philadelphia, PA', 1526000, '#04c91e']
      ]);

      var options = {
        title: 'Gráfico Teste',
        chartArea: {width: '50%'},
        hAxis: {
          title: 'Total Population',
          minValue: 0
        },
        vAxis: {
          title: 'City'
        }
      };

      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

      chart.draw(data, options);
    }