<?php
// Connect to the database (replace with your actual database connection code)
$conn = new mysqli("localhost", "root", "", "quanlybds");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process the form data and insert into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_name = $_POST["customer_name"];
    $year_of_birth = $_POST["year_of_birth"];
    $ssn = $_POST["ssn"];
    $customer_address = $_POST["customer_address"];
    $mobile = $_POST["mobile"];
    $property_id = $_POST["property_id"];
    $date_of_contract = $_POST["date_of_contract"];
    $price = $_POST["price"];
    $deposit = $_POST["deposit"];
    $remain = $_POST["remain"];
    $status = $_POST["status"];

    // You may want to perform additional validation on the input data

    $sql = "INSERT INTO full_contractg 
            (Customer_Name, Year_Of_Birth, SSN, Customer_Address, Mobile, Property_ID, Date_Of_Contract, Price, Deposit, Remain, Status, Full_Contract_Code) 
            VALUES 
            ('$customer_name', '$year_of_birth', '$ssn', '$customer_address', '$mobile', '$property_id', '$date_of_contract', '$price', '$deposit', '$remain', '$status', '')";

    $result = $conn->query($sql);

    if ($result === TRUE) {
        // Redirect to the contract list page after saving
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
