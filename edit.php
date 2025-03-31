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

    <!-- Font Awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- เพิ่มฟอนต์ -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: "Kanit", sans-serif;
            background: linear-gradient(135deg, #a1c4fd, #fbc2eb); /* ฟ้าพาสเทลไปชมพูพาสเทล */
            min-height: 100vh;
            padding: 30px;
            margin: 0;
        }

        .container-custom {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            box-shadow: 0 8px 15px rgba(149, 157, 239, 0.2);
            padding: 30px;
            border: 1px solid #e2d1f9;
            max-width: 800px;
            margin: 30px auto;
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

        .form-control, .form-select {
            border-radius: 10px;
            border: 1px solid #c4d7ff;
            padding: 10px 15px;
            transition: all 0.3s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: #a5b4fe;
            box-shadow: 0 0 0 0.25rem rgba(165, 180, 254, 0.25);
        }

        .form-label {
            color: #6a70c7;
            font-weight: 500;
        }

        .btn-primary {
            background-color: #79caff;
            border-color: #79caff;
            border-radius: 10px;
            padding: 8px 20px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #56b6ff;
            border-color: #56b6ff;
            transform: translateY(-2px);
            box-shadow: 0 5px 10px rgba(86, 182, 255, 0.3);
        }

        .btn-danger {
            background-color: #ff9ed2;
            border-color: #ff9ed2;
            border-radius: 10px;
            padding: 8px 20px;
            transition: all 0.3s ease;
        }

        .btn-danger:hover {
            background-color: #ff7bbb;
            border-color: #ff7bbb;
            transform: translateY(-2px);
            box-shadow: 0 5px 10px rgba(255, 123, 187, 0.3);
        }

        .form-section {
            background-color: #f0f4ff;
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 25px;
            border: 1px solid #d6e0ff;
        }

        .form-section-title {
            color: #7e7fc8;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .form-section-title i {
            margin-right: 10px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #8e97cd;
            font-style: italic;
            padding: 10px;
            border-top: 1px dashed #c1bbeb;
        }

        .btn-icon {
            margin-right: 8px;
        }

        /* เพิ่มลูกเล่นเล็กๆ น้อยๆ */
        .cute-icon {
            animation: bounce 2s infinite;
        }
        
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        
        .back-link {
            display: inline-flex;
            align-items: center;
            color: #7e7fc8;
            text-decoration: none;
            margin-bottom: 15px;
            transition: all 0.3s ease;
        }
        
        .back-link:hover {
            color: #6a70c7;
            transform: translateX(-3px);
        }
        
        .back-link i {
            margin-right: 5px;
        }
        
        .form-floating label {
            color: #8e97cd;
        }
    </style>

    <title>แก้ไขข้อมูลรองเท้า</title>
</head>

<body>
    <div class="container container-custom">
        <?php
        if(isset($_GET['action_even'])=='edit'){
            $id=$_GET['id'];
            $sql="SELECT * FROM sneakers WHERE id=$id";
            $result=$conn->query($sql);
            if($result->num_rows>0){
                $row=$result->fetch_assoc();
            }else{
                echo "<div class='alert alert-danger'><i class='fas fa-exclamation-circle me-2'></i>ไม่พบข้อมูลที่ต้องการแก้ไข กรุณาตรวจสอบ</div>";
            }
            //$conn->close();
        }
        ?>
        
        <a href="show.php" class="back-link">
            <i class="fas fa-arrow-left"></i> กลับไปหน้าแสดงข้อมูล
        </a>

        <div class="page-header">
            <i class="fas fa-shoe-prints fa-3x cute-icon" style="color: #8a9af8;"></i>
            <h1>แก้ไขข้อมูลรองเท้า</h1>
        </div>
        
        <form action="edit_1.php" method="POST">
            <input type="hidden" name="id" value="<?php echo$row['id']; ?>">
            
            <div class="form-section">
                <h4 class="form-section-title"><i class="fas fa-info-circle" style="color: #95a4ff;"></i> ข้อมูลพื้นฐาน</h4>
                
                <div class="row mb-4">
                    <label class="col-sm-3 col-form-label"> <i class="fas fa-hashtag me-2"></i>รหัสรองเท้า </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="<?php echo$row['id']; ?>" disabled>
                    </div>
                </div>
                
                <div class="row mb-4">
                    <label class="col-sm-3 col-form-label"> <i class="fas fa-copyright me-2"></i>แบรนด์ </label>
                    <div class="col-sm-9">
                        <input type="text" name="brand" class="form-control" maxlength="50" value="<?php echo$row['brand']; ?>" required>
                    </div>
                </div>
                
                <div class="row mb-4">
                    <label class="col-sm-3 col-form-label"> <i class="fas fa-shoe-prints me-2"></i>โมเดล </label>
                    <div class="col-sm-9">
                        <input type="text" name="model" class="form-control" maxlength="50" value="<?php echo$row['model']; ?>" required>
                    </div>
                </div>
            </div>
            
            <div class="form-section">
                <h4 class="form-section-title"><i class="fas fa-tags" style="color: #95a4ff;"></i> รายละเอียดสินค้า</h4>
                
                <div class="row mb-4">
                    <label class="col-sm-3 col-form-label"> <i class="fas fa-ruler me-2"></i>ไซส์รองเท้า </label>
                    <div class="col-sm-9">
                        <select name="size" class="form-select" aria-label="Default select example" required>
                            <option value="">กรุณาระบุไซส์รองเท้า</option>
                            <option value="45.0"<?php if ($row['size']=='45.0'){ echo "selected";} ?>>45.0</option>
                            <option value="44.5"<?php if ($row['size']=='44.5'){ echo "selected";} ?>>44.5</option>
                            <option value="44.0"<?php if ($row['size']=='44.0'){ echo "selected";} ?>>44.0</option>
                            <option value="43.5"<?php if ($row['size']=='43.5'){ echo "selected";} ?>>43.5</option>
                            <option value="43.0"<?php if ($row['size']=='43.0'){ echo "selected";} ?>>43.0</option>
                            <option value="42.5"<?php if ($row['size']=='42.5'){ echo "selected";} ?>>42.5</option>
                            <option value="42.0"<?php if ($row['size']=='42.0'){ echo "selected";} ?>>42.0</option>
                            <option value="41.5"<?php if ($row['size']=='41.5'){ echo "selected";} ?>>41.5</option>
                            <option value="41.0"<?php if ($row['size']=='41.0'){ echo "selected";} ?>>41.0</option>
                            <option value="40.5"<?php if ($row['size']=='40.5'){ echo "selected";} ?>>40.5</option>
                            <option value="40.0"<?php if ($row['size']=='40.0'){ echo "selected";} ?>>40.0</option>
                            <option value="39.5"<?php if ($row['size']=='39.5'){ echo "selected";} ?>>39.5</option>
                            <option value="39.0"<?php if ($row['size']=='39.0'){ echo "selected";} ?>>39.0</option>
                        </select> 
                    </div>
                </div>
                
                <div class="row mb-4">
                    <label class="col-sm-3 col-form-label"> <i class="fas fa-palette me-2"></i>สี </label>
                    <div class="col-sm-9">
                        <select name="color" class="form-select" aria-label="Default select example" required>
                            <option value="">กรุณาระบุสี</option>
                            <option value="Black"<?php if ($row['color']=='Black'){ echo "selected";} ?>>Black</option>
                            <option value="Black/Red"<?php if ($row['color']=='Black/Red'){ echo "selected";} ?>>Black/Red</option>
                            <option value="Blue"<?php if ($row['color']=='Blue'){ echo "selected";} ?>>Blue</option>
                            <option value="Gold"<?php if ($row['color']=='Gold'){ echo "selected";} ?>>Gold</option>
                            <option value="Green"<?php if ($row['color']=='Green'){ echo "selected";} ?>>Green</option>
                            <option value="Grey"<?php if ($row['color']=='Grey'){ echo "selected";} ?>>Grey</option>
                        </select> 
                    </div>
                </div>
                
                <div class="row mb-4">
                    <label class="col-sm-3 col-form-label"> <i class="fas fa-tag me-2"></i>ราคา </label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="number" name="price" class="form-control" value="<?php echo$row['price']; ?>" required>
                            <span class="input-group-text">บาท</span>
                        </div>
                    </div>
                </div>
                
                <div class="row mb-4">
                    <label class="col-sm-3 col-form-label"> <i class="fas fa-cubes me-2"></i>จำนวน </label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="number" name="stock" class="form-control" value="<?php echo$row['stock']; ?>" required>
                            <span class="input-group-text">คู่</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="d-flex justify-content-center mt-4 mb-3">
                <button type="submit" class="btn btn-primary me-3">
                    <i class="fas fa-save btn-icon"></i>บันทึกข้อมูล
                </button>
                <button type="reset" class="btn btn-danger">
                    <i class="fas fa-undo btn-icon"></i>ยกเลิก
                </button>
            </div>
        </form>
        
        <div class="footer">
            <div class="d-flex justify-content-center align-items-center">
                <i class="fas fa-heart me-2" style="color: #ff9dd6;"></i>
                <b>พัฒนาโดย 664485025 นายสถาพร ทิพย์ไปรยา</b>
                <i class="fas fa-heart ms-2" style="color: #ff9dd6;"></i>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <!-- Custom script -->
    <script>
        // เพิ่มเอฟเฟกต์น่ารักๆ
        document.addEventListener('DOMContentLoaded', function() {
            const cuteIcon = document.querySelector('.cute-icon');
            cuteIcon.addEventListener('mouseenter', function() {
                this.style.transform = 'rotate(20deg)';
            });
            cuteIcon.addEventListener('mouseleave', function() {
                this.style.transform = 'rotate(0deg)';
            });
        });
    </script>
</body>
</html>