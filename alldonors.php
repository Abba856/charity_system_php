<?php 
session_start();
include 'db_Connect.php';

// Check if user is logged in and is admin
if(!isset($_SESSION['username']) || $_SESSION['rank'] != 'Admin'){
    header("location: index.php");
    exit();
}

// Fetch all donors
$stmt = $con->prepare("SELECT * FROM donor ORDER BY donationdate DESC");
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Donors | Charity Donation System</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/modern-style.css">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <img src="image/icon.jpg" alt="Charity Logo">
                    <h1>MSSN SOT CHAPTER</h1>
                </div>
                <div class="nav-links">
                    <a href="dashboad.php">Dashboard</a>
                    <a href="logout.php" class="logout-btn">Logout</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <div class="card">
                <h2 class="card-title">All Donors</h2>
                
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Category</th>
                                <th>Amount (₦)</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $sn = 1;
                            while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo htmlspecialchars($row['fullname']); ?></td>
                                <td><?php echo htmlspecialchars($row['gender']); ?></td>
                                <td><?php echo htmlspecialchars($row['phone']); ?></td>
                                <td><?php echo htmlspecialchars($row['email']); ?></td>
                                <td><?php echo htmlspecialchars($row['category']); ?></td>
                                <td><?php echo number_format($row['amount']); ?></td>
                                <td><?php echo date('M d, Y', strtotime($row['donationdate'])); ?></td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; <?php echo date("Y"); ?> MSSN SOT CHAPTER. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>