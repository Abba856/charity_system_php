<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account | Charity Donation System</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/modern-style.css">
</head>
<body>
    <?php 
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
                $message = "Account for $name has been created with username $username. You can login now.";
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
                    <img src="image/ll.png" alt="Charity Logo">
                    <h1>MSSN SOT CHAPTER</h1>
                </div>
                <div class="nav-links">
                    <a href="index.php">Login</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Marquee Section -->
    <section class="marquee-section">
        <div class="container">
            <div class="marquee-text">
                Thank You Very Much For Your Donations, <span>It Would Impact The Lives of Many</span>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <div class="card form-container">
                <h2 class="card-title text-center">Create Account</h2>
                
                <?php if(!empty($message)): ?>
                    <div class="alert alert-success"><?php echo $message; ?></div>
                <?php endif; ?>
                
                <?php if(!empty($error)): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>
                
                <form method="POST" action="register.php">
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
                        <button type="submit" name="register" class="btn btn-block btn-secondary">Register</button>
                    </div>
                    
                    <div class="text-center">
                        <p>Already have an account? <a href="index.php">Login</a></p>
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