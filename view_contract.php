<!-- index.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="style.css" /> 
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View list of FullContract</title>
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
            <?php
            // Check if the contract ID is provided in the URL
            if (isset($_GET['id'])) {
                $contract_id = $_GET['id'];

                // Connect to the database (replace with your actual database connection code)
                $conn = new mysqli("localhost", "root", "", "quanlybds");

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch contract details based on the provided ID
                $sql = "SELECT * FROM full_contractg WHERE ID = $contract_id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    // Display contract details
                    echo "<h1>Chi tiết hợp đồng</h1>";
                    echo "<p><strong>Mã hợp đồng:</strong> {$row['Full_Contract_Code']}</p>";
                    echo "<p><strong>Họ tên người mua:</strong> {$row['Customer_Name']}</p>";
                    echo "<p><strong>Năm sinh:</strong> {$row['Year_Of_Birth']}</p>";
                    echo "<p><strong>SSN:</strong> {$row['SSN']}</p>";
                    echo "<p><strong>Địa chỉ:</strong> {$row['Customer_Address']}</p>";
                    echo "<p><strong>Số điện thoại:</strong> {$row['Mobile']}</p>";
                    echo "<p><strong>Mã Bất động sản:</strong> {$row['Property_ID']}</p>";
                    echo "<p><strong>Ngày lập Hợp đồng:</strong> {$row['Date_Of_Contract']}</p>";
                    echo "<p><strong>Giá trị HĐ:</strong> {$row['Price']}</p>";
                    echo "<p><strong>Số tiền đã cọc:</strong> {$row['Price']}</p>";
                    echo "<p><strong>Số tiền còn lại:</strong> {$row['Deposit']}</p>";
                    echo "<p><strong>Trạng thái:</strong> {$row['Status']}</p>";
                    // Add other details as needed
                } else {
                    echo "<p>No contract found with the provided ID</p>";
                }

                // Close the database connection
                $conn->close();
            } else {
                echo "<p>Contract ID not provided in the URL</p>";
            }
            ?>
        </main>
    </div>

    <footer>
        <h3>Copyright by team 8</h3>
    </footer>
</body>
</html>
