<?php  
 $connect = mysqli_connect("localhost", "root", "", "power_consumption");  
 $query = "SELECT userid,reading FROM distribution";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
      <link rel="stylesheet" type="text/css" href="styles.css">
           <title>Power Theft Identification and Mitigation</title>  
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  

           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['userid', 'reading'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["userid"]."', ".$row["reading"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Prcentage of power consumed by the Consumers',  
                      //is3D:true,  
                      //pieHole: 0.4  
                      curveType: 'function',
          legend: { position: 'bottom' }
                     };  
                var chart = new google.visualization.BarChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
      </head>  
      <body>  
      <ul>
          <li><a href="ind2.php">Home</a></li>
  <li><a href="ind.php">consumption</a></li>
  <li><a href="main.html">theft</a></li>
</ul>
           <br /><br />  
           <div style="width:900px;">  
                <h3 align="center">Two Consumers Database</h3>  
                <br />  
                <div id="piechart" style="width: 900px; height: 500px;"></div>  
           </div>  
      </body>  
 </html>  