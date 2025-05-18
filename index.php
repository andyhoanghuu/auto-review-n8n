<?php
// File này chứa nhiều lỗi để kiểm tra AI review

function connectDB() {
    $conn = mysqli_connect("localhost", "root", "", "testdb"); // Không kiểm tra lỗi
    return $conn;
}

function getUserData($userID) {
    $conn = connectDB();
    $query = "SELECT * FROM users WHERE id = $userID"; // SQL Injection
    $result = mysqli_query($conn, $query);
    if($result) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "Tên người dùng: " . $row["username"] . "<br>"; // XSS
        }
    }
}

function calculateDiscount($price, $discount) {
    if($discount > 100) {
        echo "Giảm giá không hợp lệ";
    }
    return $price - $discount / 100 * $price;
}

// Gọi hàm nhưng thiếu tham số
calculateDiscount(200);

// Gọi hàm không tồn tại
displayWelcome();

// Gọi truy vấn với dữ liệu không xác thực
getUserData($_GET['id']);
