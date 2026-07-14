<?php
include 'dbconn.php';

SESSION_START();

 $connect = mysqli_connect("localhost", "root", "", "raffbs");
 $sql = "SELECT * FROM payment";
 $result = mysqli_query($connect, $sql);
//echo "Welcome, ".$_SESSION ['name']."";

//export buttn
if (isset($_GET['export'])) {
    $from_date = isset($_GET['from_date']) ? $_GET['from_date'] : '';
    $to_date = isset($_GET['to_date']) ? $_GET['to_date'] : '';
    $export_sql = "SELECT * FROM payment";
    $total_sql = "SELECT SUM(total_rate) AS value_sum FROM payment";
    if (!empty($from_date) && !empty($to_date)) {
        $export_sql .= " WHERE payment_time BETWEEN '$from_date' AND '$to_date'";
        $total_sql .= " WHERE payment_time BETWEEN '$from_date' AND '$to_date'";
    }
    $export_result = mysqli_query($connect, $export_sql);
    $total_result = mysqli_query($connect, $total_sql);
    $total_row = mysqli_fetch_assoc($total_result);
    $total_value = round($total_row['value_sum'], 2);

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=filtered_payments.csv');
    $output = fopen('php://output', 'w');
    // Add total as the first row
    fputcsv($output, array("Total Sales Received : RM $total_value"));
    // Add a blank row for spacing
    fputcsv($output, array());
    // Add table headers
    fputcsv($output, array('Payment ID', 'Booking ID', 'Customer ID', 'Total Fee (RM)', 'Payment Date'));

    while ($row = mysqli_fetch_assoc($export_result)) {
        fputcsv($output, array(
            $row['id'],
            $row['booking_id'],
            $row['student_id'],
            $row['total_rate'],
            $row['payment_time']
        ));
    }
    fclose($output);
    exit();
}

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #0000FF;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #0000FF;
  color: white;
}
</style>
</head>
<body>
<!--href='up_car.php?id=" . $row["id"]-->


</body>
</html>

<html>
<head><title>Sales Report</title>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
           <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
           <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

<?php include_once('includes/header_s1.php');?>

</head>
<body>
<div class="container">
			<br />
			<br />
			<br />
			<!-- <a href="home_s.php">
                             <center>   <img src="image/bdmntn logo only.png" alt="CoolAdmin"> <center>
                            </a> -->
<br><br><br><br><br><meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

<h2>Report sales
</h2>
 <h3 align="center">Order Data</h3><br />
 <form class="" action="" method="get">
   <div class="col-md-3">
        <input type="datetime-local" name="from_date" id="from_date" class="form-control" placeholder="From Date"
        value="<?php echo isset($_GET['from_date']) ? $_GET['from_date'] : ''; ?>" />
   </div>
   <div class="col-md-3">
        <input type="datetime-local" name="to_date" id="to_date" class="form-control" placeholder="To Date"
        value="<?php echo isset($_GET['to_date']) ? $_GET['to_date'] : ''; ?>" />
   </div>
   <div class="col-md-5">
        <input type="submit" name="filter" id="filter" value="Filter" class="btn btn-info" />
        <a href="commision.php" class="btn btn-warning">Clear</a>
        <input type="submit" name="export" id="export" value="Export CSV" class="btn btn-success" />
   </div>
   <div style="clear:both"></div>
 </form>


<?php
if(isset($_GET['filter'])){
$from_date = $_GET['from_date'];
$to_date = $_GET['to_date'];
$sql = "SELECT * FROM payment WHERE payment_time BETWEEN '".$from_date."' AND '".$to_date."'";
$result = mysqli_query($connect, $sql);
}
$sql1 = "SELECT SUM(total_rate) AS value_sum FROM payment   ";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
        echo "Total Sales Received : RM " . (round($row["value_sum"],2));
    }
  }
?>
                <br />


                <div id="order_table">
                     <table class="table table-bordered">
                          <tr>
                                <th >Payment ID</th>
    <th >Booking ID</th>
    <th >Customer ID</th>
    <th >Total Fee (RM)</th>
    <th >Payment Date</th>
                          </tr>
                     <?php
               while($row = mysqli_fetch_assoc($result)){

                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["booking_id"] . "</td>";
                    echo "<td>" . $row["student_id"] . "</td>";

                    echo "<td>" . $row["total_rate"] . "</td>";
                    echo "<td>" . $row["payment_time"] . "</td>";

                    echo "</tr>";
               }


                     ?>
                     </table>
                </div>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

  $(document).ready(function(){
           $.datepicker.setDefaults({
                dateFormat: 'yy-mm-dd'
           });
           $(function(){
                $("#from_date").datepicker();
                $("#to_date").datepicker();
           });
           $('#filter').click(function(){
                var from_date = $('#from_date').val();
                var to_date = $('#to_date').val();
                if(from_date != '' && to_date != '')
                {
                     $.ajax({
                          url:"filter.php",
                          method:"POST",
                          data:{from_date:from_date, to_date:to_date},
                          success:function(data)
                          {
                               $('#order_table').html(data);
                          }
                     });
                }
                else
                {
                     alert("Please Select Date");
                }
           });
      });
</script>

</body>
</html>








<!-- Jquery JS-->



</body>
</html>
