<h4>Relatórios</h4>
<hr>
<div class="container">
    <div class="row">
      <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Aprovadas',     <?php echo $quantidade[0] ?> ],
          ['Negadas',      <?php echo $quantidade[1] ?>],
          ['Vendidas',      <?php echo $quantidade[3] ?>],
          ['Não Vendidas',      <?php echo $quantidade[4] ?>]
          
        ]);

        var options = {
          title: 'Todas as viabilidades'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
    </div>
</div>
<hr>