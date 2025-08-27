<?php
// Club Registration Form Processing
// TODO: Add your PHP processing code here starting in Step 3

/* 
Step 3 Requirements:
- Process form data using $_POST
- Display submitted information back to user
- Handle name, email, and club fields

Step 4 Requirements:
- Add validation for all fields
- Check for empty fields
- Validate email format
- Display appropriate error messages

Step 5 Requirements:
- Store registration data in arrays
- Display list of all registrations
- Use loops to process array data

Step 6 Requirements:
- Add enhanced features like:
  - File storage for persistence
  - Additional form fields
  - Better error handling
  - Search functionality
*/


// Step 3

  // Step 3 & 4: Process form data and validate

  $name = trim($_POST["name"] ?? '');
  $email = trim($_POST["email"] ?? '');
  $club = trim($_POST["club"] ?? '');

  $errors = [];

  if ($name === '') {
    $errors[] = "Name is required.";
  }
  if ($email === '') {
    $errors[] = "Email is required.";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format.";
  }
  if ($club === '') {
    $errors[] = "Club is required.";
  }

  if (!empty($errors)) {
    echo "<h2>Registration Error</h2>";
    foreach ($errors as $error) {
      echo "<p style='color:red;'>$error</p>";
    }
  } else {
    echo "<h2>Registration Successful!</h2>";
    echo "<p>Name: $name</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Club: $club</p>";
  }

?>
