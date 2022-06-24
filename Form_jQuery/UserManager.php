<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "user_manager";

// create connection

$con = mysqli_connect($serverName, $userName, $password, $dbName);
// echo $_POST['email'];
if (mysqli_connect_errno()) {
    echo "Failed to connect!";
    exit();
}
echo "Connection success!";

// GET
// if ($_SERVER["REQUEST_METHOD"] == "GET") {
//     $name = $_GET['name'];
//     $email = $_GET['email'];
//     $address = $_GET['address'];
//     $phone_number = $_GET['phone_number'];
//     $birthday = $_GET['birthday'];
//     $gender = $_GET['gender'];

//     if (empty($name) || empty($email) || empty($address) || empty($phone_number) || empty($birthday) || empty($gender)) {
//         echo "is empty";
//     } else {
//         echo $name, $email, $address, $phone_number, $birthday, $gender;
//     }
// }

// POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];

    if (empty($name) || empty($email) || empty($address) || empty($phone_number) || empty($birthday) || empty($gender)) {
        echo "is empty";
    } else {
        echo $name, $email, $address, $phone_number, $birthday, $gender;
    }
}

// createUser($name, $email, $address, $phone_number, $birthday, $gender);
updateData($name, $email, $address, $phone_number, $birthday, $gender);
// deleteData($name, $email, $address, $phone_number, $birthday, $gender);
//----------------------------------------------------------------------------------------------------------------------------------

// sql Create
function createUser($name, $email, $address, $phone_number, $birthday, $gender) {

    global $con;
    $sql = "INSERT INTO `users` (name, email, address, phone_number, birthday, gender) 
            VALUES ('$name', '$email', '$address', '$phone_number', '$birthday', '$gender')";

    if ($con->query($sql) == TRUE) {
        echo "Record create successfully";
    } else {
        echo "Error updating record: " . $con->error;
    }

    // $con->close();
}


// sql UPDATE
function updateData($name, $email, $address, $phone_number, $birthday, $gender) {
    global $con;
    $sql = "UPDATE users SET name='$name', email='$email' WHERE id='1'";

    if ($con->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $con->error;
    }

    $con->close();
}

// updateData();

//sql DELETE
function deleteData($name, $email, $address, $phone_number, $birthday, $gender) {
    global $con;
    $sql = "DELETE FROM users WHERE name='$name'";

    if ($con->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting recording: " . $con->error;
    }

    $con->close();
}
// deleteData();

// sql list
function listUser($name, $email, $address, $phone_number, $birthday, $gender) {
    global $con;
    $sql = "SELECT * FROM users";
    $result = $con->query($sql);

    $users = [];
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            // thêm từng phầN tử vào biến users
            $users[] = $row;
        }
    }

    $con->close();
    return $users;
}
 

// createTable();

// $sql = "CREATE TABLE MyGuests (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     firstname VARCHAR(30) NOT NULL,
//     lastname VARCHAR(30) NOT NULL,
//     email VARCHAR(50),
//     reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
//     )";
    
//     if ($con->query($sql) === TRUE) {
//       echo "Table MyGuests created successfully";
//     } else {
//       echo "Error creating table: " . $con->error;
//     }

// $con->close();

//--------------------------------------------------------------------------
// sql to insert data
// $sql = "INSERT INTO `MyGuests` (firstname, lastname, email)
// VALUES ('John', 'Doe', 'john@example.com')";

// if ($con->query($sql) === TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

// $con->close();
//--------------------------------------------------------------------------
// sql WHERE
// $sql = "SELECT id, firstname, lastname FROM `MyGuests` WHERE lastname='Puthippong'";
// $result = $con->query($sql);

// if ($result->num_rows > 0) {
//   // output data of each row
//     while($row = $result->fetch_assoc()) {
//         echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
//     }
// } else {
//     echo "0 results";
// }

// $con->close();
//--------------------------------------------------------------------------
// sql to insert data
// $sql = "INSERT INTO `MyGuests` (firstname, lastname, email)
// VALUES ('Billkin', 'Puthippong', 'billkin@example.com')";

// if ($con->query($sql) === TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

// $con->close();

?>