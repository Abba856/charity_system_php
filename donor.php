<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate | Charity Donation System</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/modern-style.css">
</head>
<body>
    <?php 
    include 'db_Connect.php';
    
    $message = "";
    $error = "";
    
    if(isset($_POST['submit'])){
        $fullname = $_POST['fullname'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $category = $_POST['category'];
        $amount = $_POST['amount'];
        
        // Fix the SQL query (missing comma between phone and email)
        $stmt = $con->prepare("INSERT INTO donor (fullname, gender, phone, email, category, amount) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $fullname, $gender, $phone, $email, $category, $amount);
        
        if($stmt->execute()){
            $message = "Thank you $fullname, your donation has been received. May Almighty Allah reward you with your desire.";
        } else {
            $error = "Something went wrong: " . $stmt->error;
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
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <div class="card form-container">
                <h2 class="card-title text-center">Make a Donation</h2>
                
                <?php if(!empty($message)): ?>
                    <div class="alert alert-success"><?php echo $message; ?></div>
                <?php endif; ?>
                
                <?php if(!empty($error)): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>
                
                <form method="POST" action="donor.php">
                    <div class="form-group">
                        <label for="fullname" class="form-label">Full Name</label>
                        <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Enter Full Name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="gender" class="form-label">Gender</label>
                        <select name="gender" id="gender" class="form-control" required>
                            <option value="">Select your gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter Phone Number" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="category" class="form-label">Donation Category</label>
                        <select name="category" id="category" class="form-control" required>
                            <option value="">Select category</option>
                            <option value="Zakat">Zakat</option>
                            <option value="Sadaqat">Sadaqat</option>
                            <option value="Gift">Gift</option>
                            <option value="Zakatul fidr">Zakatul fidr</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="amount" class="form-label">Donation Amount (₦)</label>
                        <input type="number" name="amount" id="amount" class="form-control" placeholder="Enter Amount" min="1" required>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-block btn-success">Donate Now</button>
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