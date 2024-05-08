<?php
$uploadDir = 'uploads/';
$uploadFile = $uploadDir . basename($_FILES['videoFile']['name']);
$uploadOk = 1;
$videoFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));

// Kiểm tra xem tệp đã tồn tại chưa
if (file_exists($uploadFile)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Kiểm tra kích thước của file
if ($_FILES['videoFile']['size'] > 50000000) { // 50 MB
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Chỉ chấp nhận một số định dạng video nhất định (ví dụ: mp4)
if ($videoFileType != "mp4") {
    echo "Sorry, only MP4 files are allowed.";
    $uploadOk = 0;
}

// Nếu có lỗi, thông báo cho người dùng
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// Nếu mọi thứ đều ok, thử tải lên tệp
} else {
    if (move_uploaded_file($_FILES['videoFile']['tmp_name'], $uploadFile)) {
        echo "The file ". basename($_FILES['videoFile']['name']). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
