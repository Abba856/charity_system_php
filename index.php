<?php 
session_start();
if(isset($_SESSION["username"])){
    header("location: dashboad.php");
    exit();
}
include("db_Connect.php");

$error = "";
$message = "";

// Check for logout message
if(isset($_GET['message']) && $_GET['message'] == 'logged_out') {
    $message = "You have been successfully logged out.";
}

if(isset ($_POST['login'])){
    $uname = $_POST['username'];
    $password = $_POST['password'];
    
    if(!empty($uname) && !empty($password)) {
        // Using prepared statement to prevent SQL injection
        $stmt = $con->prepare("SELECT * FROM user WHERE username = ?");
        $stmt->bind_param("s", $uname);
        $stmt->execute();
        $result = $stmt->get_result();
        $sql = $result->fetch_assoc();
        
        if($sql && password_verify($password, $sql['password'])){
            $_SESSION["password"] = $sql['password'];
            $_SESSION["username"] = $uname;
            $_SESSION["rank"] =  $sql['rank'];
            header("location: dashboad.php");
            exit();
        } else {
            $error = "Wrong Username or Password";
        }
    } else {
        $error = "Username or Password is Empty";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Charity Donation System</title>
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
                    <a href="register.php">Create Account</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Marquee Section -->
    <section class="marquee-section">
        <div class="container">
            <div class="marquee-text">
                When You Learn, Teach. <span>When You Get, Give.</span>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <div class="card form-container">
                <h2 class="card-title text-center">Sign in to Continue</h2>
                
                <?php if(!empty($message)): ?>
                    <div class="alert alert-success"><?php echo $message; ?></div>
                <?php endif; ?>
                
                <?php if(!empty($error)): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>
                
                <form method="POST" action="index.php">
                    <div class="form-group">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required>
                    </div>
                    
                    <div class="form-group">
                        <input type="submit" value="Login" name="login" class="btn btn-block">
                    </div>
                    
                    <div class="text-center">
                        <p>Don't have an account? <a href="register.php">Create Account</a></p>
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