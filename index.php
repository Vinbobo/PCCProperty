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
        <button class="add-button" onclick="location.href='add_contract.php'" >Thêm</button>
        <?php
        // Connect to the database (replace with your actual database connection code)
        $conn = new mysqli("localhost", "root", "", "quanlybds");


        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch and display the list of contracts
        $sql = "SELECT * FROM full_contractg ORDER BY ID DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table class='table'>";
            echo "<tr>
                    <th>Mã hợp đồng</th>
                    <th>Họ tên người mua</th>
                    <th>Địa chỉ</th>
                    <th></th>
                  </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['Full_Contract_Code']}</td>
                        <td>{$row['Customer_Name']}</td>
                        <td>{$row['Customer_Address']}</td>
                        <td>
                        <a href='view_contract.php?id={$row['ID']}'>Xem</a> |
                        Sửa | In
                        </td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No contracts available</p>";
        }

        // Close the database connection
        $conn->close();
        ?>
        </main>
    </div>

    <footer>
        <h3>Copyright by team 8</h3>
    </footer>
</body>
</html>