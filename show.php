<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include("conn.php");
    ?>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&family=Kanit:ital,wght@0,200;0,300;1,100;1,200&family=Prompt:ital,wght@0,200;0,300;1,300&display=swap" rel="stylesheet">

    <!-- Font Awesome for cute icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            font-family: 'Kanit', sans-serif;
            background: linear-gradient(135deg, #ff5722, #ff9800); /* Soft pink background */
            margin: 0;
            padding: 20px;
        }
        .container-custom {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(255, 1, 1, 0.1);
            padding: 30px;
        }
        .page-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .page-header h1 {
            margin-left: 15px;
            color:hsl(0, 0.00%, 0.00%);
        }
        .table-container {
            background-color: #FFFFFF;
            border-radius: 10px;
            padding: 20px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #888;
            font-style: italic;
        }
    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลรองเท้า</title>
</head>

<body>
    <div class="container container-custom">
        <?php
        if (isset($_GET['action_even']) == 'delete') {
            $id = $_GET['id'];
            $sql = "SELECT * FROM sneakers WHERE id=$id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $sql = "DELETE FROM sneakers WHERE id =$id";

                if ($conn->query($sql) === TRUE) {
                    echo "<div class='alert alert-success'>ลบข้อมูลสำเร็จ</div>";
                } else {
                    echo "<div class='alert alert-danger'>ลบข้อมูลมีข้อผิดพลาด กรุณาตรวจสอบ !!! </div>" . $conn->error;
                }
            } else {
                echo 'ไม่พบข้อมูล กรุณาตรวจสอบ';
            }
        }
        ?>
        
        <div class="page-header">
            <i class="fas fa-users fa-3x" style="color: #9c27b0;"></i>
            <b><h1>ข้อมูลรองเท้า</h1></b>
        </div>
      
        <div class="user-info">
            <div class="row">
                <div class="col-md-12">
                    <h4><i class="fas fa-user-circle me-2"></i>ข้อมูลผู้ใช้งาน</h4>
                    <p>
                        <strong>รหัสรองเท้า:</strong> <?php echo isset($_SESSION["id"]) ? $_SESSION["id"] : "ไม่พบข้อมูล"; ?> | 
                        <strong>รุ่น:</strong> <?php echo isset($_SESSION["brand"]) ? $_SESSION["brand"] : "ไม่พบข้อมูล"; ?> | 
                        <strong>รองเท้า:</strong> <?php echo isset($_SESSION["model"]) ? $_SESSION["model"] : "ไม่พบข้อมูล"; ?>
                    </p>
                </div>
                <div class="col-md-12 text-end">
                    <a href="add.php" class="btn btn-success"><i class="fas fa-plus-circle me-2"></i>เพิ่มข้อมูลพนักงาน</a>
                </div>
   
        <div class="table-container">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>รหัสรองเท้า</th>
                        <th>รุ่น</th>
                        <th>รองเท้า</th>
                        <th>ไซส์รองเท้า</th>
                        <th>สี</th>
                        <th>ราคา</th>
                        <th>จำนวน</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php
                $sql = "SELECT * FROM sneakers";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["brand"] . "</td>";
                        echo "<td>" . $row["model"] . "</td>";
                        echo "<td>" . $row["size"] . "</td>";
                        echo "<td>" . $row["color"] . "</td>";
                        echo "<td>" . $row["price"] . "</td>";
                        echo "<td>" . $row["stock"] . "</td>";
                        echo '<td>
                            <a type="button" href="show.php?action_even=del&id=' . $row['id'] . '" 
                            title="ลบข้อมูล" onclick="return confirm(\'ต้องการจะลบข้อมูลรายชื่อ ' . $row['id'] . ' ' . $row['brand'] .
                            ' ' . $row['model'] . '?\')" class="btn btn-danger btn-sm me-2"> 
                            <i class="fas fa-trash-alt"></i> ลบข้อมูล </a>  
                            
                            <a type="button" href="edit.php?action_even=edit&id=' . $row['id'] . '" 
                            title="แก้ไขข้อมูล" onclick="return confirm(\'ต้องการจะแก้ไขข้อมูลรายชื่อ ' .
                            $row['id'] . ' ' . $row['brand'] . ' ' . $row['model'] . '?\')" class="btn btn-primary btn-sm"> 
                            <i class="fas fa-edit"></i> แก้ไขข้อมูล </a> 
                        </td>';
                        echo "</tr>";
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
                </tbody>
            </table>
        </div>
            <b><center>พัฒนาโดย 664485025 นายสถาพร ทิพย์ไปรยา</center><b>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        new DataTable('#example');
    </script>
</body>
</html>