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
            background: linear-gradient(135deg, #a1c4fd, #fbc2eb); /* ฟ้าพาสเทลไปชมพูพาสเทล */
            margin: 0;
            padding: 20px;
        }
        .container-custom {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            box-shadow: 0 8px 15px rgba(149, 157, 239, 0.2);
            padding: 30px;
            border: 1px solid #e2d1f9;
        }
        .page-header {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px dashed #c1bbeb;
        }
        .page-header h1 {
            margin-left: 15px;
            color: #6a70c7;
            font-weight: 600;
        }
        .table-container {
            background-color: #FFFFFF;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(207, 186, 240, 0.15);
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #8e97cd;
            font-style: italic;
        }
        .btn-success {
            background-color: #a5b4fe;
            border-color: #a5b4fe;
        }
        .btn-success:hover {
            background-color: #8496fe;
            border-color: #8496fe;
        }
        .btn-danger {
            background-color: #ff9ed2;
            border-color: #ff9ed2;
        }
        .btn-danger:hover {
            background-color: #ff7bbb;
            border-color: #ff7bbb;
        }
        .btn-primary {
            background-color: #79caff;
            border-color: #79caff;
        }
        .btn-primary:hover {
            background-color: #56b6ff;
            border-color: #56b6ff;
        }
        .table {
            border-collapse: separate;
            border-spacing: 0 5px;
        }
        .table thead th {
            background-color: #bbd0ff;
            color: #5a5f9f;
            border-bottom: none;
            padding: 12px;
            font-weight: 500;
        }
        .table tbody tr {
            box-shadow: 0 2px 5px rgba(160, 174, 255, 0.1);
            border-radius: 10px;
            transition: transform 0.2s;
        }
        .table tbody tr:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 10px rgba(160, 174, 255, 0.2);
        }
        .table tbody td {
            vertical-align: middle;
            padding: 12px;
            border-top: none;
            background-color: #f8f9ff;
        }
        .user-info {
            background-color: #f0f4ff;
            padding: 15px;
            border-radius: 15px;
            margin-bottom: 20px;
            border: 1px solid #d6e0ff;
        }
        .user-info h4 {
            color: #7e7fc8;
            margin-bottom: 10px;
        }
        .user-info p {
            color: #6d7094;
        }
        .alert-success {
            background-color: #d4f8e8;
            border-color: #b9f0d4;
            color: #3c9d70;
        }
        .alert-danger {
            background-color: #ffe1ec;
            border-color: #ffbdd6;
            color: #e95a8c;
        }
        /* เพิ่มลูกเล่นเล็กๆ น้อยๆ */
        .cute-icon {
            animation: bounce 2s infinite;
        }
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #c4d7ff !important;
            border-color: #a1b8ff !important;
            color: #5a5f9f !important;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #d8e3ff !important;
            border-color: #bfc9ff !important;
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
                    echo "<div class='alert alert-success'><i class='fas fa-check-circle me-2'></i>ลบข้อมูลสำเร็จ</div>";
                } else {
                    echo "<div class='alert alert-danger'><i class='fas fa-exclamation-triangle me-2'></i>ลบข้อมูลมีข้อผิดพลาด กรุณาตรวจสอบ !!! </div>" . $conn->error;
                }
            } else {
                echo "<div class='alert alert-danger'><i class='fas fa-exclamation-circle me-2'></i>ไม่พบข้อมูล กรุณาตรวจสอบ</div>";
            }
        }
        ?>
        
        <div class="page-header">
            <i class="fas fa-shoe-prints fa-3x cute-icon" style="color: #8a9af8;"></i>
            <b><h1>ข้อมูลรองเท้า</h1></b>
        </div>
      
        <div class="user-info">
            <div class="row">
                <div class="col-md-12">
                    <h4><i class="fas fa-tags me-2" style="color: #95a4ff;"></i>ข้อมูลสินค้า</h4>
                    <p>
                        <strong>รหัสรองเท้า:</strong> <?php echo isset($_SESSION["id"]) ? $_SESSION["id"] : "ไม่พบข้อมูล"; ?> | 
                        <strong>รุ่น:</strong> <?php echo isset($_SESSION["brand"]) ? $_SESSION["brand"] : "ไม่พบข้อมูล"; ?> | 
                        <strong>รองเท้า:</strong> <?php echo isset($_SESSION["model"]) ? $_SESSION["model"] : "ไม่พบข้อมูล"; ?>
                    </p>
                </div>
                <div class="col-md-12 text-end">
                    <a href="add.php" class="btn btn-success"><i class="fas fa-plus-circle me-2"></i>เพิ่มข้อมูลรองเท้า</a>
                </div>
            </div>
        </div>
   
        <div class="table-container">
            <table id="example" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th><i class="fas fa-hashtag me-2"></i>รหัสรองเท้า</th>
                        <th><i class="fas fa-copyright me-2"></i>รุ่น</th>
                        <th><i class="fas fa-shoe-prints me-2"></i>รองเท้า</th>
                        <th><i class="fas fa-ruler me-2"></i>ไซส์รองเท้า</th>
                        <th><i class="fas fa-palette me-2"></i>สี</th>
                        <th><i class="fas fa-tag me-2"></i>ราคา</th>
                        <th><i class="fas fa-cubes me-2"></i>จำนวน</th>
                        <th><i class="fas fa-tools me-2"></i>จัดการ</th>
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
                        echo "<td>" . $row["price"] . " บาท</td>";
                        echo "<td>" . $row["stock"] . " คู่</td>";
                        echo '<td>
                            <a type="button" href="show.php?action_even=del&id=' . $row['id'] . '" 
                            title="ลบข้อมูล" onclick="return confirm(\'ต้องการจะลบข้อมูลรองเท้า ' . $row['id'] . ' ' . $row['brand'] .
                            ' ' . $row['model'] . '?\')" class="btn btn-danger btn-sm me-2"> 
                            <i class="fas fa-trash-alt"></i> ลบ </a>  
                            
                            <a type="button" href="edit.php?action_even=edit&id=' . $row['id'] . '" 
                            title="แก้ไขข้อมูล" onclick="return confirm(\'ต้องการจะแก้ไขข้อมูลรองเท้า ' .
                            $row['id'] . ' ' . $row['brand'] . ' ' . $row['model'] . '?\')" class="btn btn-primary btn-sm"> 
                            <i class="fas fa-edit"></i> แก้ไข </a> 
                        </td>';
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8' class='text-center'>ไม่พบข้อมูล</td></tr>";
                }
                $conn->close();
                ?>
                </tbody>
            </table>
        </div>

        <div class="footer mt-4">
            <div class="d-flex justify-content-center align-items-center">
                <i class="fas fa-heart me-2" style="color: #ff9dd6;"></i>
                <b>พัฒนาโดย 664485025 นายสถาพร ทิพย์ไปรยา</b>
                <i class="fas fa-heart ms-2" style="color: #ff9dd6;"></i>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/th.json',
                },
                "dom": '<"top"lf>rt<"bottom"ip>',
                "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "ทั้งหมด"]]
            });
            
            // เพิ่มเอฟเฟกต์น่ารักๆ
            $('.cute-icon').hover(
                function() { $(this).css('transform', 'rotate(20deg)'); },
                function() { $(this).css('transform', 'rotate(0deg)'); }
            );
        });
    </script>
</body>
</html>