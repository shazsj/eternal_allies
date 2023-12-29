<?php 
include_once "../config/dbconnect.php";

function get_total_sales_multi_order($conn){
    $del = 'D';
    $sql_get_sales = "SELECT SUM(o.total_amount) AS sales
                     FROM orders o
                     WHERE o.order_status = '$del';";
    
    $sales_result = mysqli_query($conn, $sql_get_sales);
    $row = mysqli_fetch_array($sales_result);

    return "Php " . number_format($row['sales'], 2);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
            text-align: left;
        }

        th, td {
            padding: 15px;
        }
    </style>
</head>
<body>
    <!-- Sales -->
    <div class="container">
        <div class="row">
            <div class="col-6 pt-5">
                <h1>Sales</h1><br>
                <div>
                    <table>
                        <tr>
                            <th>Total Sales</th>
                        </tr>
                        <tr>
                            <td><?php echo get_total_sales_multi_order($conn); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
