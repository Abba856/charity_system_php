<?php 
    session_start(); 
    include 'db_Connect.php';
    
    if(!isset($_SESSION['username'])){
        header("location: index.php");
        exit();
    }
    
    $uname = $_SESSION['username'];
    $stmt = $con->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->bind_param("s", $uname);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Charity Donation System</title>
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
                    <span>Welcome, <?php echo htmlspecialchars($user['fullname']); ?>!</span>
                    <a href="logout.php" class="logout-btn">Logout</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <div class="welcome-section">
                <h1 class="welcome-title">Dashboard</h1>
                <p class="welcome-subtitle">Thanks You Very Much Your Donations Would Impact The Lives of Many</p>
            </div>
            
            <div class="card text-center">
                <h2 class="card-title">Welcome, <?php echo htmlspecialchars($user['fullname']); ?>!</h2>
                <p class="mb-4">Select an option below to continue</p>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <a href="donates.php" class="btn btn-success btn-block">Donate Now</a>
                    </div>
                    
                    <?php if($_SESSION["rank"] == "Admin"): ?>
                    <div class="col-md-6 mb-3">
                        <a href="user.php" class="btn btn-secondary btn-block">Add User</a>
                    </div>
                    <div class="col-md-6 mb-3">
                        <a href="alldonors.php" class="btn btn-info btn-block">View All Donors</a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <h2 class="text-center mt-5 mb-4">Total Donations Summary</h2>
            
            <div class="stats-container">
                <?php
                // Total Zakat
                $st = $con->prepare("SELECT sum(amount) as total FROM donor WHERE category='Zakat'");
                $st->execute();
                $strow = $st->get_result()->fetch_assoc();
                $zakat_total = $strow['total'] ?? 0;
                ?>
                <div class="stat-card">
                    <div class="stat-title">Total Zakat</div>
                    <div class="stat-value">₦<?php echo number_format($zakat_total); ?></div>
                </div>
                
                <?php
                // Total Sadaqat
                $st = $con->prepare("SELECT sum(amount) as total FROM donor WHERE category='Sadaqat'");
                $st->execute();
                $strow = $st->get_result()->fetch_assoc();
                $sadaqat_total = $strow['total'] ?? 0;
                ?>
                <div class="stat-card">
                    <div class="stat-title">Total Sadaqat</div>
                    <div class="stat-value">₦<?php echo number_format($sadaqat_total); ?></div>
                </div>
                
                <?php
                // Total Gift
                $st = $con->prepare("SELECT sum(amount) as total FROM donor WHERE category='Gift'");
                $st->execute();
                $strow = $st->get_result()->fetch_assoc();
                $gift_total = $strow['total'] ?? 0;
                ?>
                <div class="stat-card">
                    <div class="stat-title">Total Gift</div>
                    <div class="stat-value">₦<?php echo number_format($gift_total); ?></div>
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