<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลรองเท้าผ้าใบ | ระบบจัดการข้อมูลรองเท้าผ้าใบ</title>
    
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
            background-color: #f0f8ff;
            padding-bottom: 60px; /* For footer space */
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23d8e6ff' fill-opacity='0.4'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        .navbar {
            background: linear-gradient(135deg, #7fbcff, #ffa7d1);
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
            background-color: rgba(255, 255, 255, 0.9);
        }
        .card-header {
            background: linear-gradient(135deg, #7fbcff, #ffa7d1);
            color: white;
            font-weight: 500;
            padding: 15px 20px;
            border: none;
        }
        .btn {
            border-radius: 50px;
            font-weight: 500;
            padding: 8px 20px;
            transition: all 0.3s;
        }
        .btn-primary {
            background: linear-gradient(135deg, #7fbcff, #a4c4ff);
            border: none;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #5a9bff, #84b0ff);
            transform: translateY(-2px);
        }
        .btn-danger {
            background: linear-gradient(135deg, #ff8fa3, #ffb3c0);
            border: none;
        }
        .btn-danger:hover {
            background: linear-gradient(135deg, #ff7089, #ff96a8);
            transform: translateY(-2px);
        }
        .btn-warning {
            background: linear-gradient(135deg, #90e0ef, #a5d8ff);
            border: none;
            color: white;
        }
        .btn-warning:hover {
            background: linear-gradient(135deg, #70d1e6, #8ecbff);
            transform: translateY(-2px);
            color: white;
        }
        .btn-outline-light {
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
        }
        .btn-outline-light:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.4);
        }
        .form-control, .form-select {
            border-radius: 50px;
            padding: 10px 15px;
            border: 1px solid #e0e9ff;
            background-color: #f8fbff;
        }
        .form-control:focus, .form-select:focus {
            box-shadow: 0 0 0 0.25rem rgba(164, 196, 255, 0.25);
            border-color: #a4c4ff;
            background-color: white;
        }
        .invalid-feedback {
            margin-left: 15px;
        }
        .form-label {
            color: #5a7cb6;
            font-weight: 500;
        }
        footer {
            background: linear-gradient(135deg, #7fbcff, #ffa7d1);
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
            color: #5a7cb6;
            text-align: center;
            padding: 10px;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 50px;
            display: inline-block;
        }
        .alert {
            border-radius: 50px;
            animation: fadeIn 0.5s;
            padding: 15px 20px;
        }
        .alert-success {
            background-color: #d4f8e8;
            border-color: #bfebd7;
            color: #1d7d5c;
        }
        .alert-danger {
            background-color: #ffe4e8;
            border-color: #ffd0d9;
            color: #d63456;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .form-group-icon {
            position: relative;
        }
        .form-group-icon i {
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            color: #ffa7d1;
        }
        .form-floating-label {
            position: relative;
        }
        .floating-label {
            position: absolute;
            top: -10px;
            left: 15px;
            background-color: white;
            padding: 0 5px;
            font-size: 0.8em;
            color: #5a7cb6;
            font-weight: 500;
        }
        .cute-icon {
            color: #ffa7d1;
            margin-right: 5px;
            font-size: 1.2em;
        }
        .cute-icon-flip {
            transform: scaleX(-1);
        }
        .custom-shadow {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }
        .bounce-effect {
            animation: bounce 1s infinite alternate;
        }
        @keyframes bounce {
            from { transform: translateY(0); }
            to { transform: translateY(-5px); }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="fs-4 fw-bold">
                <i class="fas fa-shoe-prints me-2 cute-icon"></i>
                <i class="fas fa-shoe-prints me-2 cute-icon cute-icon-flip"></i>
                ระบบจัดการข้อมูลรองเท้าผ้าใบ
            </div>
            <div>
                <a href="login1.php" class="btn btn-outline-light btn-sm">
                    <i class="fas fa-user-circle me-1"></i> เข้าสู่ระบบ
                </a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card custom-shadow">
            <div class="card-header fs-5">
                <i class="fas fa-plus-circle me-2 cute-icon bounce-effect"></i>
                เพิ่มข้อมูลรองเท้าผ้าใบ
            </div>
            <div class="card-body p-4">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="needs-validation" novalidate>
                    <div class="row mb-4">
                        <label for="teacher_id" class="col-sm-3 col-md-2 col-form-label form-label">
                            <i class="fas fa-hashtag cute-icon"></i> รหัสรองเท้า
                        </label>
                        <div class="col-sm-9 col-md-4">
                            <div class="form-group-icon">
                                <input type="text" class="form-control" id="id" name="id" required>
                                <i class="fas fa-tag"></i>
                            </div>
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle me-1"></i> กรุณากรอกรหัสรองเท้า
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-4">
                        <label for="brand" class="col-sm-3 col-md-2 col-form-label form-label">
                            <i class="fas fa-copyright cute-icon"></i> แบรนด์
                        </label>
                        <div class="col-sm-9 col-md-4">
                            <div class="form-group-icon">
                                <input type="text" class="form-control" id="brand" name="brand" required>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle me-1"></i> กรุณากรอกชื่อแบรนด์
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-4">
                        <label for="model" class="col-sm-3 col-md-2 col-form-label form-label">
                            <i class="fas fa-edit cute-icon"></i> แบบจำลอง
                        </label>
                        <div class="col-sm-9 col-md-4">
                            <div class="form-group-icon">
                                <input type="text" class="form-control" id="model" name="model" required>
                                <i class="fas fa-socks"></i>
                            </div>
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle me-1"></i> กรุณากรอกแบบจำลอง
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-4">
                        <label for="size" class="col-sm-3 col-md-2 col-form-label form-label">
                            <i class="fas fa-ruler cute-icon"></i> ไซส์รองเท้า
                        </label>
                        <div class="col-sm-9 col-md-4">
                            <div class="form-group-icon">
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
                                <i class="fas fa-shoe-prints"></i>
                            </div>
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle me-1"></i> กรุณาเลือกไซส์รองเท้า
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-4">
                        <label for="color" class="col-sm-3 col-md-2 col-form-label form-label">
                            <i class="fas fa-palette cute-icon"></i> สี
                        </label>
                        <div class="col-sm-9 col-md-4">
                            <div class="form-group-icon">
                                <select name="color" id="color" class="form-select" required>
                                    <option value="" selected disabled>เลือกสี</option>
                                    <option value="Black">Black</option>
                                    <option value="Black/Red">Black/Red</option>
                                    <option value="Blue">Blue</option>
                                    <option value="Gold">Gold</option>
                                    <option value="Green">Green</option>
                                    <option value="Grey">Grey</option>
                                </select>
                                <i class="fas fa-paint-brush"></i>
                            </div>
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle me-1"></i> กรุณาเลือกสี
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-4">
                        <label for="price" class="col-sm-3 col-md-2 col-form-label form-label">
                            <i class="fas fa-tag cute-icon"></i> ราคา
                        </label>
                        <div class="col-sm-9 col-md-4">
                            <div class="form-group-icon">
                                <input type="number" class="form-control" id="price" name="price" min="1" max="10000" required>
                                <i class="fas fa-coins"></i>
                            </div>
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle me-1"></i> กรุณากรอกราคา (1-10000)
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-4">
                        <label for="stock" class="col-sm-3 col-md-2 col-form-label form-label">
                            <i class="fas fa-cubes cute-icon"></i> จำนวน
                        </label>
                        <div class="col-sm-9 col-md-4">
                            <div class="form-group-icon">
                                <input type="number" class="form-control" id="stock" name="stock" min="0" required>
                                <i class="fas fa-boxes"></i>
                            </div>
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle me-1"></i> กรุณากรอกจำนวน
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4 d-flex flex-wrap gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-heart me-1"></i> บันทึกข้อมูล
                        </button>
                        <button type="reset" class="btn btn-danger">
                            <i class="fas fa-eraser me-1"></i> ยกเลิก
                        </button>
                        <a href="show.php" class="btn btn-warning">
                            <i class="fas fa-list-alt me-1"></i> แสดงข้อมูล
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
        <div class="text-center">
            <div class="developer-credit">
                <i class="fas fa-code cute-icon"></i>
                <small>
                    <b>พัฒนาโดย 664485025 นายสถาพร ทิพย์ไปรยา</b>
                </small>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <i class="fas fa-shoe-prints me-2 cute-icon"></i>
            <i class="fas fa-shoe-prints me-2 cute-icon cute-icon-flip"></i>
            <small>ระบบจัดการข้อมูลรองเท้าผ้าใบ</small>
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