<!DOCTYPE html>
<html>
<head>
    <title>My PHP Project</title>
</head>
<body>
    <?php
    // Process form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        
        // Validate form data
        $errors = [];
        if (empty($name)) {
            $errors[] = 'Name is required.';
        }
        if (empty($email)) {
            $errors[] = 'Email is required.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Invalid email format.';
        }
        
        // Display errors or success message
        if (!empty($errors)) {
            echo '<div class="errors">';
            foreach ($errors as $error) {
                echo '<p>' . $error . '</p>';
            }
            echo '</div>';
        } else {
            echo '<div class="success">';
            echo '<p>Thank you, ' . $name . '! We received your submission.</p>';
            echo '</div>';
        }
    }
    ?>
    
    <h1>Welcome to My PHP Project</h1>
    
    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>
