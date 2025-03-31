<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลพนักงาน | ระบบจัดการข้อมูลพนักงาน</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Kanit', sans-serif;
            background-color: #f0f4f8;
            padding-bottom: 60px; /* For footer space */
        }
        .navbar {
            background: linear-gradient(135deg, #259b24, #009688);
            color: white;
            padding: 15px 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 30px;
        }
        .card-header {
            background: linear-gradient(135deg, #259b24, #009688);
            color: white;
            font-weight: 500;
            padding: 15px 20px;
            border: none;
        }
        .btn {
            border-radius: 8px;
            font-weight: 500;
            padding: 8px 20px;
            transition: all 0.3s;
        }
        .btn-primary {
            background: linear-gradient(135deg, #0d6efd, #0099ff);
            border: none;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #0b5ed7, #0077cc);
            transform: translateY(-2px);
        }
        .btn-danger:hover, .btn-warning:hover {
            transform: translateY(-2px);
        }
        .form-control, .form-select {
            border-radius: 8px;
            padding: 10px 15px;
            border: 1px solid #ddd;
        }
        .form-control:focus, .form-select:focus {
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
            border-color: #86b7fe;
        }
        footer {
            background: linear-gradient(135deg, #259b24, #009688);
            color: white;
            text-align: center;
            padding: 15px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
            box-shadow: 0 -4px 12px rgba(0, 0, 0, 0.1);
        }
        .developer-credit {
            margin-top: 20px;
            color: #6c757d;
            text-align: center;
        }
        .alert {
            border-radius: 8px;
            animation: fadeIn 0.5s;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="fs-4 fw-bold">
                <i class="fas fa-chalkboard-teacher me-2"></i>
                ระบบจัดการข้อมูลพนักงาน
            </div>
            <div>
                <a href="login1.php" class="btn btn-outline-light btn-sm">
                    <i class="fas fa-sign-in-alt me-1"></i> เข้าสู่ระบบ
                </a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card">
            <div class="card-header fs-5">
                <i class="fas fa-user-plus me-2"></i>
                เพิ่มข้อมูลพนักงาน
            </div>
            <div class="card-body p-4">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="needs-validation" novalidate>
                    <div class="row mb-3">
                        <label for="teacher_id" class="col-sm-3 col-md-2 col-form-label">รหัสรองเท้า</label>
                        <div class="col-sm-9 col-md-4">
                            <input type="text" class="form-control" id="id" name="id" required>
                            <div class="invalid-feedback">
                                กรุณากรอกรหัสรองเท้า
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="brand" class="col-sm-3 col-md-2 col-form-label">เเบรนด์</label>
                        <div class="col-sm-9 col-md-4">
                            <input type="text" class="form-control" id="brand" name="brand" required>
                            <div class="invalid-feedback">
                                กรุณากรอกชื่อเเบรนด์
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="model" class="col-sm-3 col-md-2 col-form-label">เเบบจำลอง</label>
                        <div class="col-sm-9 col-md-4">
                            <input type="text" class="form-control" id="model" name="model" required>
                            <div class="invalid-feedback">
                                กรุณากรอกเเบบจำลอง
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="size" class="col-sm-3 col-md-2 col-form-label">ไซส์รองเท้า</label>
                        <div class="col-sm-9 col-md-4">
                            <select name="size" id="size" class="form-select" required>
                                <option value="" selected disabled>เลือกไซส์รองเท้า</option>
                                <option value="45.0">45.0</option>
                                <option value="44.5">44.5</option>
                                <option value="44.0">44.0</option>
                                <option value="43.5">43.5</option>
                                <option value="43.0">43.0</option>
                                <option value="42.5">42.5</option>
                                <option value="42.0">42.0</option>
                                <option value="41.5">41.5</option>
                                <option value="41.0">41.0</option>
                                <option value="40.5">40.5</option>
                                <option value="40.0">40.0</option>
                                <option value="39.5">39.5</option>
                                <option value="39.0">39.0</option>

                            </select>
                            <div class="invalid-feedback">
                                กรุณาเลือกวิชา
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="color" class="col-sm-3 col-md-2 col-form-label">สี</label>
                        <div class="col-sm-9 col-md-4">
                            <select name="color" id="color" class="form-select" required>
                                <option value="" selected disabled>เลือกสี</option>
                                <option value="Black">Black</option>
                                <option value="Black/Red">Black/Red</option>
                                <option value="Blue">Blue</option>
                                <option value="Gold">Gold</option>
                                <option value="Green">Green</option>
                                <option value="Grey">Grey</option>
                            </select>
                            <div class="invalid-feedback">
                                กรุณาเลือกสี
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="price" class="col-sm-3 col-md-2 col-form-label">ราคา</label>
                        <div class="col-sm-9 col-md-4">
                            <input type="number" class="form-control" id="price" name="price" min="1" max="10000" required>
                            <div class="invalid-feedback">
                                กรุณากรอกราคา (1-10000)
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="stock" class="col-sm-3 col-md-2 col-form-label">จำนวน</label>
                        <div class="col-sm-9 col-md-4">
                            <input type="number" class="form-control" id="stock" name="stock" min="0" required>
                            <div class="invalid-feedback">
                                กรุณากรอกจำนวน
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> บันทึกข้อมูล
                        </button>
                        <button type="reset" class="btn btn-danger">
                            <i class="fas fa-times me-1"></i> ยกเลิก
                        </button>
                        <a href="show.php" class="btn btn-warning">
                            <i class="fas fa-list me-1"></i> แสดงข้อมูล
                        </a>
                    </div>
                </form>
                
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Include database connection
                    include("conn.php");
                    
                    // Get form data and sanitize inputs
                    $id = mysqli_real_escape_string($conn, $_POST['id']);
                    
                    // Check if ID already exists
                    $check_query = "SELECT id FROM sneakers WHERE id = '$id'";
                    $result = $conn->query($check_query);
                    
                    if ($result->num_rows > 0) {
                        // ID already exists, show error
                        echo '<div class="alert alert-danger mt-3 animate__animated animate__fadeIn">
                                <i class="fas fa-exclamation-circle me-2"></i> รหัสรองเท้านี้มีอยู่ในระบบแล้ว กรุณาใช้รหัสอื่น
                              </div>';
                    } else {
                        // ID is unique, proceed with insertion
                        $brand = mysqli_real_escape_string($conn, $_POST['brand']);
                        $model = mysqli_real_escape_string($conn, $_POST['model']);
                        $size = mysqli_real_escape_string($conn, $_POST['size']);
                        $color = mysqli_real_escape_string($conn, $_POST['color']);
                        $price = mysqli_real_escape_string($conn, $_POST['price']);
                        $stock = mysqli_real_escape_string($conn, $_POST['stock']);
                        
                        // Insert data into database
                        $sql = "INSERT INTO sneakers (id, brand, model, size, color, price, stock) 
                                VALUES ('$id', '$brand', '$model', '$size', '$color', '$price', '$stock')";
                        
                        if ($conn->query($sql) === TRUE) {
                            echo '<div class="alert alert-success mt-3 animate__animated animate__fadeIn">
                                    <i class="fas fa-check-circle me-2"></i> บันทึกข้อมูลเรียบร้อยแล้ว
                                  </div>';
                        } else {
                            echo '<div class="alert alert-danger mt-3 animate__animated animate__fadeIn">
                                    <i class="fas fa-exclamation-circle me-2"></i> เกิดข้อผิดพลาด: ' . $conn->error . '
                                  </div>';
                        }
                    }
                    
                    // Close connection
                    $conn->close();
                }
                ?>
            </div>
        </div>
        
        <!-- Developer Credit -->
        <div class="developer-credit">
            <small>
                <b></i>พัฒนาโดย 664485025 นายสถาพร  ทิพย์ไปรยา</b>
            </small>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <small></small>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script>
        // Form validation
        (function() {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')
            Array.prototype.slice.call(forms).forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>
</html>