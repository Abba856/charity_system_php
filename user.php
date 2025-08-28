<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User | Charity Donation System</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/modern-style.css">
</head>
<body>
    <?php 
    session_start();
    
    // Check if user is admin
    if(!isset($_SESSION['username']) || $_SESSION['rank'] != 'Admin'){
        header("location: index.php");
        exit();
    }
    
    include 'db_Connect.php';
    
    $message = "";
    $error = "";
    
    if(isset($_POST['register'])){
        $name = $_POST['fullname'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $rank = $_POST['rank'];
        
        // Check if username already exists
        $check_stmt = $con->prepare("SELECT username FROM user WHERE username = ?");
        $check_stmt->bind_param("s", $username);
        $check_stmt->execute();
        $check_result = $check_stmt->get_result();
        
        if($check_result->num_rows > 0) {
            $error = "Username already exists. Please choose another one.";
        } else {
            $stmt = $con->prepare("INSERT INTO user (fullname, username, password, rank) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $username, $password, $rank);
            
            if($stmt->execute()){
                $message = "Account for $name has been created with username $username.";
            } else {
                $error = "Something went wrong: " . $stmt->error;
            }
        }
    }
    ?>
    
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
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <div class="card form-container">
                <h2 class="card-title text-center">Add New User</h2>
                
                <?php if(!empty($message)): ?>
                    <div class="alert alert-success"><?php echo $message; ?></div>
                <?php endif; ?>
                
                <?php if(!empty($error)): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>
                
                <form method="POST" action="user.php">
                    <div class="form-group">
                        <label for="fullname" class="form-label">Full Name</label>
                        <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Enter Full Name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="rank" class="form-label">Rank</label>
                        <select name="rank" id="rank" class="form-control" required>
                            <option value="">Select user rank</option>
                            <option value="Admin">Admin</option>
                            <option value="User" selected>User</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" name="register" class="btn btn-block btn-secondary">Create User</button>
                    </div>
                </form>
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