<div class="container">
    <div align="center">
      <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Concluídas em venda',      <?php echo $results['vendida'] ?>],
          ['Concluídas em não venda',      <?php echo $results['nao_vendida'] ?>],
          ['Recusadas',      <?php echo $results['recusada'] ?>]
          
        ]);

        var options = {
          title: 'Viabilidades',
          colors: ['green','#FACC2E','red']
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
    
    <h6>Total de Viabilidades solicitadas neste período <?php echo $results['total'] ?>  </h6>
        <font size="1px">*As viabilidades RECUSADAS, são viabilidades onde não há condições de atender o cliente.</font>
        <font size="1px">**As viabilidades Concluídas em NÃO VENDA, são viabilidades que foram aprovadas, mas por alguma motivo o cliente não contratou.</font>
    </div>
</div>
<hr>
 