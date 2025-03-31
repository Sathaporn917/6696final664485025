<!DOCTYPE html>
<html lang="en">
<?php
//เชื่อมต่อฐานข้อมูล
include("conn.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- เพิ่ม ส่วน Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- เพิ่มฟอนต์ -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    
    <!-- เพิ่ม Font Awesome สำหรับไอคอน -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body {
            font-family: "Kanit", sans-serif;
            background-color: #f0f8ff; /* สีพื้นหลังฟ้าอ่อน */
            margin: 0;
            padding: 0;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .header {
            background: linear-gradient(135deg, #a5d8ff 0%, #ffd1dc 100%);
            padding: 30px 0;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            text-align: center;
        }
        
        h1 {
            color: #5271ff;
            margin: 0;
            font-weight: 600;
            text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.8);
        }
        
        .edit-form {
            background-color: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        
        .btn-info {
            background-color: #5271ff;
            border-color: #5271ff;
            color: white;
            padding: 8px 20px;
            border-radius: 50px;
            box-shadow: 0 4px 6px rgba(82, 113, 255, 0.2);
            transition: all 0.3s;
        }
        
        .btn-info:hover {
            background-color: #3d5af1;
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(82, 113, 255, 0.3);
        }
        
        .alert-success {
            background-color: #d4f5d5;
            border-color: #c3e6c3;
            color: #1e7d20;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
        }
        
        .footer {
            text-align: center;
            padding: 20px 0;
            margin-top: 30px;
            color: #666;
            font-size: 14px;
            background-color: #e6f0ff;
            border-radius: 15px;
        }
        
        /* ไอคอนน่ารัก */
        .icon {
            margin-right: 8px;
            color: #ff85a2;
        }
    </style>

    <title>แก้ไขข้อมูล</title>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1><i class="fas fa-edit icon"></i>แก้ไขข้อมูลรองเท้าผ้าใบ</h1>
        </div>
        
        <div class="edit-form">
            <?php
            //เริ่มเก็บข้อมูล
            $id = $_POST['id'];
            $brand = $_POST['brand'];
            $model = $_POST['model'];
            $size = $_POST['size'];
            $color = $_POST['color'];
            $price = $_POST['price'];
            $stock= $_POST['stock'];


            //เขียนคำสั่ง SQL
            $sql = "UPDATE sneakers SET brand='$brand', model='$model', size='$size', color='$color', price='$price', stock='$stock' WHERE id=$id";

            // รับคำสั่ง sql
            if ($conn->query($sql) === TRUE) {
                echo '<div class="alert alert-success">
                <i class="fas fa-check-circle icon"></i>ยินดีด้วยครับ! คุณได้ทำการแก้ไขข้อมูลเรียบร้อยแล้ว</div>';

                echo '<a type="button" href="show.php" class="btn btn-info btn-sm"><i class="fas fa-arrow-left icon"></i>กลับหน้าแสดงข้อมูล</a>';
            } else {
                echo '<div class="alert alert-danger"><i class="fas fa-exclamation-triangle icon"></i>มีข้อผิดพลาด: ' . $sql . '<br>' . $conn->error . '</div>';
            }
            // ปิดการเชื่อมต่อ
            $conn->close();
            ?>
        </div>
        
        <div class="footer">
            <i class="fas fa-code icon"></i>พัฒนาโดย 664485025 นายสถาพร ทิพย์ไปรยา หมู่เรียน 66/96
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>