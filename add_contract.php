<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="styleadd.css" /> 
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Full Contract</title>

</head>
<body>
    <header>
        <div class="logo-container">
            <img src="PPCLogo-128-128.png" alt="Logo của bạn">
        </div>
    </header>

    <div class="content">
        <aside>
            <ul>
                <li>Quản lý bất động sản</li>
                <li>Quản lý hợp đồng</li>
            </ul>
        </aside>
        <main>
        <h1>THÊM HỢP ĐỒNG THANH TOÁN MỘT LẦN</h1>
        <!-- Form to add a new contract -->
        <form action="save_contract.php" method="post">
            <label for="customer_name">Tên người mua:</label>
            <input type="text" id="customer_name" name="customer_name" required>

            <label for="year_of_birth">Năm sinh:</label>
            <input type="text" id="year_of_birth" name="year_of_birth" required>

            <label for="ssn">CMND:</label>
            <input type="text" id="ssn" name="ssn" required>

            <label for="customer_address">Địa chỉ:</label>
            <input type="text" id="customer_address" name="customer_address" required>

            <label for="mobile">Số điện thoại:</label>
            <input type="text" id="mobile" name="mobile" required>

            <label for="property_id">Mã BĐS:</label>
            <input type="text" id="property_id" name="property_id" required>

            <label for="date_of_contract">Ngày lập Hợp đồng:</label>
            <input type="date" id="date_of_contract" name="date_of_contract" required>

            <label for="price">Giá trị HĐ:</label>
            <input type="text" id="price" name="price" required>

            <label for="deposit">Số tiền đã cọc:</label>
            <input type="text" id="deposit" name="deposit" required>

            <label for="remain">Số tiền còn lại:</label>
            <input type="text" id="remain" name="remain" required>

            <label for="status">Trạng thái:</label>
            <select id="status" name="status" required>
                <option value="Đã thanh toán">Đã thanh toán</option>
                <option value="Chưa thanh toán">Chưa thanh toán</option>
            </select>
            <div class="button-container">
                    <a class="button cancel-button" href="index.php">Huỷ</a> <!-- Cancel button -->
                    <button class="button save-button" type="submit">Lưu</button> <!-- Save button -->
            </div>
        </form>
        </main>
    </div>
    <footer>
        <h3>Copyright by team 8</h3>
    </footer>
</body>
</html>
