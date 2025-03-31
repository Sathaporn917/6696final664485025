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

    <style>
        body {
            font-family: "Kanit", sans-serif;
            margin-left: 100px;
            margin-top: 50px;
        }

        h1 {
            /* อันนี้กำหนดส่วนย่อหน้าด้านซ้าย */
   
            /* อันนี้กำหนดส่วนย่อหน้าด้านบน */
            margin-top: 50px;
        }
    </style>
    

    <title>เเก้ไขข้อมูลพนักงาน</title>
</head>

<?php
if(isset($_GET['action_even'])=='edit'){
    $id=$_GET['id'];
    $sql="SELECT * FROM sneakers WHERE id=$id";
    $result=$conn->query($sql);
    if($result->num_rows>0){
        $row=$result->fetch_assoc();
    }else{
        echo"ไม่พบข้อมูลที่ต้องการแก้ไข กรุณาตรวจสอบ";
    }
    //$conn->close();
}
?>
<h1>แก้ไขข้อมูลพนักงาน</h1>


<form action="edit_1.php" method="POST">
    <input type="hidden"name="id" value="<?php echo$row['id']; ?>">
    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> รหัสรองเท้า </label>
        <div class="col-sm-2">
        <label class="col-sm-1 col-form-label"> <?php echo$row['id']; ?> </label>
        </div>
    </div>
   
    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> เเบรนด์ </label>
        <div class="col-sm-2">
        <input type="text" name="brand" class="form-control" maxlength="50" value="<?php echo$row['brand']; ?>" required>
        </div>
    </div>

  
    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> เเบบจำลอง </label>
        <div class="col-sm-2">
        <input type="text" name="model" class="form-control" maxlength="50" value="<?php echo$row['model']; ?>" required>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> ไซส์รองเท้า </label>
        <div class="col-sm-2">
        <select name="size" class="form-select" aria-label="Default select example">
            <option >กรุณาระบุไซส์รองเท้า</option>
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

    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> สี </label>
        <div class="col-sm-2">
        <select name="color" class="form-select" aria-label="Default select example">
            <option >กรุณาระบุสี</option>
            <option value="Black"<?php if ($row['color']=='Black'){ echo "selected";} ?>>Black</option>
            <option value="Black/Red"<?php if ($row['color']=='Black/Red'){ echo "selected";} ?>>Black/Red</option>
            <option value="Blue"<?php if ($row['color']=='Blue'){ echo "selected";} ?>>Blue</option>
            <option value="Gold"<?php if ($row['color']=='Gold'){ echo "selected";} ?>>Gold</option>
            <option value="Green"<?php if ($row['color']=='Green'){ echo "selected";} ?>>Green</option>
            <option value="Grey"<?php if ($row['color']=='Grey'){ echo "selected";} ?>>Grey</option>
        </select> 
        </div>
    </div>
   
    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> ราคา </label>
        <div class="col-sm-2">
        <input type="text" name="price" class="form-control" maxlength="50" value="<?php echo$row['price']; ?>" required>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> จำนวน </label>
        <div class="col-sm-2">
        <input type="text" name="stock" class="form-control" maxlength="50" value="<?php echo$row['stock']; ?>" required>
        </div>
    </div>
   
    <button type="submit" class="btn btn-primary"> บันทึกข้อมูล</button>
    <button type="reset" class="btn btn-danger"> ยกเลิก</button>

</form>
<br>
    พัฒนาโดย 664485025 นายสถาพร ทิพย์ไปรยา  หมู่เรียน 66/96 <br>
</head>

</html>