
<canvas class="line-chart"></canvas>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>

<script>

var ctx = document.getElementsByClassName("line-chart");

//type, data e options

var chartGraph = new Chart(ctx,{
    type: 'line',
    data: {
        labels:["Jan","Fev","Mar","Abr","Mai","Jun","Jul","Ago","Set","Out","Nov","Dez"],
        datasets:[
            {
                label:"Viabilidades Concluida em Venda - 2018",
                data:[<?php echo $results['vendida'] ?>,10,5,14,20,15,6,14,8,12,15,5],
                dorderWidth:6,
                borderColor: 'rgba(6,204,6,0.85)',
                backgroundColor: 'transparent'
            },
            {
                label:"Viabilidades concluída em não venda - 2018",
                data:[<?php echo $results['nao_vendida'] ?>,15,4,12,5,16,4,18,2,5,15],
                dorderWidth:6,
                borderColor: 'rgba(255, 255, 0, 1)',
                backgroundColor: 'transparent'
            },
            {
                label:"Viabilidades Recusadas - 2018",
                data:[<?php echo $results['recusada'] ?>,6,10,12,2,1,10,10,3,8,10,11],
                dorderWidth:6,
                borderColor: 'rgba(255, 0, 1, 1)',
                backgroundColor: 'transparent'
            }
        ]
    },
   
     options: {
        title: {
            display: true,
            fontSize: 20,
            text: "RELATÓRIO ANUAL DE VIABILIDADES "
        },
        labels:{
            fontStyle: "bold"
        }
    }
    
});



</script>
<br><br