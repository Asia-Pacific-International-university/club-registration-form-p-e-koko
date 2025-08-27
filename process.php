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



  session_start();

  // Initialize registrations array in session if not exists
  if (!isset($_SESSION['registrations'])) {
    $_SESSION['registrations'] = [];
  }

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
    // Store registration data in array
    $registration = [
      'name' => $name,
      'email' => $email,
      'club' => $club,
      'timestamp' => date('Y-m-d H:i:s')
    ];
    
    $_SESSION['registrations'][] = $registration;
    
    echo "<h2>Registration Successful!</h2>";
    echo "<p>Name: $name</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Club: $club</p>";
  }

  // Display all registrations
  echo "<h2>All Registrations</h2>";
  if (empty($_SESSION['registrations'])) {
    echo "<p>No registrations yet.</p>";
  } else {
    echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
    echo "<tr><th>Name</th><th>Email</th><th>Club</th><th>Registration Time</th></tr>";
    
    foreach ($_SESSION['registrations'] as $reg) {
      echo "<tr>";
      echo "<td>" . htmlspecialchars($reg['name']) . "</td>";
      echo "<td>" . htmlspecialchars($reg['email']) . "</td>";
      echo "<td>" . htmlspecialchars($reg['club']) . "</td>";
      echo "<td>" . htmlspecialchars($reg['timestamp']) . "</td>";
      echo "</tr>";
    }
    
    echo "</table>";
    echo "<p>Total registrations: " . count($_SESSION['registrations']) . "</p>";
  }

?>
