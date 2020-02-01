<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="Acme/Acme-Regular.ttf">

</head>

<body>
    <?php
    // define variables and set to empty values
    $nameErr = $emailErr = $phoneErr = $imageErr = "";
    $fname = $lname =  $email = $phone = $image = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["fname"])) {
        $nameErr = "Name is required";
      } else {
        $fname = test_input($_POST["fname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
          $nameErr = "Only letters and white space allowed";
        }
      }
      
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["lname"])) {
          $nameErr = "Name is required";
        } else {
          $lname = test_input($_POST["lname"]);
          // check if name only contains letters and whitespace
          if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
            $nameErr = "Only letters and white space allowed";
          }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["phone"])) {
              $phoneErr= "phone is required";
            } else {
              $lname = test_input($_POST["phone"]);
              // check if name only contains letters and whitespace
              if (!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/',$phone)) {
                $phoneErr = "Only 11 number allowed";
              }
            }

        if (empty($_POST["email"])) {
        $emailErr = "Email is required";
      } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
        }
      }
      
    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    ?> 
    <form class="form" method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <h1>Form Registeration</h1>
       <div>
           <label>First Name:</label><br>
           <input type="text"  name="fname" class="fname" value="<?php echo $fname;?>" placeholder="enter name"  required> 
       </div>
       <div>
        <label>Last Name:</label><br>
        <input type="text" name="lname" class="lname" placeholder="enter name" value="<?php echo $lname;?>" required>
    </div>
    <div>
        <label>Phone:</label><br>
        <input type="tel" maxlength="11" minlength="11" class="phone" placeholder="enter number" value="<?php echo $phone;?>" name="phone" required> 
    </div>
    <div>
        <label>Email:</label><br>
        <input type="email" class="email" name="email" value="<?php echo $email;?>" placeholder="enter email" required>
    </div>
    <div class="image">
        <label>image:</label><br>
        <input type="file" name="fileToUpload" id="fileToUpload"value="<?php echo $image;?>"  required>
    </div>

    <button type="submit"  value="submit" > Submit</button>
    </form>

    <form  class="show">
        <?php
        echo "<h1>Your Input:</h1>";<br>
        echo $fname;
        echo "<br>";
        echo $lname;
        echo "<br>";
        echo $email;
        echo "<br>";
        echo $phone;
        echo "<br>";
        echo $image;
        echo "<br>";
        ?>
    </form>
</body>
</html>