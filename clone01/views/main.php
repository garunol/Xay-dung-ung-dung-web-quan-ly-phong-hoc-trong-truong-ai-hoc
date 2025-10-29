<?php
session_start();

// Kiểm tra đã đăng nhập chưa
if (!isset($_SESSION['user_id'])) {
    header('Location: ../views/auth/login.php');
    exit();
}

$role = $_SESSION['role'];
$username = $_SESSION['username'];
?>

<?php include('../menu.php'); ?>

<div class="container">
    <h2>Xin chào, <?= htmlspecialchars($username) ?>!</h2>
    <p>Vai trò của bạn: <strong><?= strtoupper($role) ?></strong></p>
    <hr>

    <?php if ($role === 'admin'): ?>
        <h3>Chức năng dành cho Admin</h3>
        <ul>
            <li><a href="manage_rooms.php">Quản lý phòng học</a></li>
            <li><a href="manage_users.php">Quản lý người dùng</a></li>
            <li><a href="reports.php">Báo cáo thống kê</a></li>
        </ul>

    <?php elseif ($role === 'teacher'): ?>
        <h3>Chức năng dành cho Giảng viên</h3>
        <ul>
            <li><a href="booking_form.php">Đặt phòng</a></li>
            <li><a href="booking_list.php">Lịch sử đặt phòng</a></li>
            <li><a href="maintenance_request.php">Yêu cầu bảo trì</a></li>
        </ul>

    <?php elseif ($role === 'student'): ?>
        <h3>Chức năng dành cho Sinh viên</h3>
        <ul>
            <li><a href="view_schedule.php">Xem lịch học</a></li>
            <li><a href="room_info.php">Tra cứu phòng</a></li>
        </ul>

    <?php else: ?>
        <p>Không xác định vai trò. Vui lòng liên hệ quản trị viên.</p>
    <?php endif; ?>
</div>

<?php include('../menu.php'); ?>
