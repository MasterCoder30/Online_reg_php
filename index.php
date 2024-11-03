<?php
session_start();
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <title>Online Registration</title>
 </head>
 <body>
    <h1>Online Registration</h1>

    <?php
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //display error message
    $lastnameErr = $firstnameErr = $ageErr = $contactnumErr = $emailErr =$addressErr = "";
    $isFormValid = true;

    //instantiation
    $formInfo = new FormInfoClass();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST["lastname"])) {
            $formInfo->set_lastname(test_input($_POST["lastname"]));
            $_SESSION["lastname"] = $formInfo->get_lastname();
        } else {
            $lastnameErr = "Last Name is required!";
            $isFormValid = false;
        }
        if (!empty($_POST["firstname"])) {
            $formInfo->set_firstname(test_input($_POST["firstname"]));
            $_SESSION["firstname"] = $formInfo->get_firstname();
        } else {
            $firstnameErr = "First Name is required!";
            $isFormValid = false;
        }
        if (!empty($_POST["middleInitial"])) {
            $formInfo->set_middleInitial(test_input($_POST["middleInitial"]));
            $_SESSION["middleInitial"] = $formInfo->get_middleInitial();
        } 
        if (!empty($_POST["age"])) {
            $formInfo->set_age(test_input($_POST["age"]));
            $_SESSION["age"] = $formInfo->get_age();
        } else {
            $ageErr = "Age is required!";
            $isFormValid = false;
        }
        if (!empty($_POST["contactnum"])) {
            $formInfo->set_contactnum(test_input($_POST["contactnum"]));
            $_SESSION["contactnum"] = $formInfo->get_contactnum();
        } else {
            $contactnumErr = "Contact No. is required!";
            $isFormValid = false;
        }
        if (!empty($_POST["email"])) {
            $formInfo->set_email(test_input($_POST["email"]));
            $_SESSION["email"] = $formInfo->get_email();
        } else {
            $emailErr = "E-mail is required!";
            $isFormValid = false;
        }
        if (!empty($_POST["address"])) {
            $formInfo->set_address(test_input($_POST["address"]));
            $_SESSION["address"] = $formInfo->get_address();
        } else {
            $addressErr = "Address is required!";
            $isFormValid = false;
        }

        if ($isFormValid) {
            header ("Location: display.php");
            exit();
        }
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="lastname">Last Name</label><span class="error">* <?php echo $lastnameErr;?> </span> <br>
        <input id="lastname" type="text" name="lastname"> <br>
        <label for="firstname">First Name</label><span class="error">* <?php echo $firstnameErr;?> </span> <br>
        <input id="firstname" type="text" name="firstname"> <br>
        <label for="middleInitial">Middle Initial</label> <br>
        <input id="middleInitial" type="text" name="middleInitial"> <br>
        <label for="age">Age</label><span class="error">* <?php echo $ageErr;?> </span> <br>
        <input id="age" type="number" name="age"> <br>
        <label for="contactnum">Contact No.</label><span class="error">* <?php echo $contactnumErr;?> </span> <br>
        <input id="contactnum" type="text" name="contactnum"> <br>
        <label for="email">E-mail</label><span class="error">* <?php echo $emailErr;?> </span> <br>
        <input id="email" type="email" name="email"> <br>
        <label for="address">Address</label><span class="error">* <?php echo $addressErr;?> </span> <br>
        <input id="address" type="text" name="address"> <br><br>

        <button id="submit-btn" type="submit">Submit</button>

    </form>

    <?php
    class FormInfoClass {
        private $lastname, $firstname, $middleInitial, $age, $contactnum, $email, $address;

        public function set_lastname($lastname) {
            $this->lastname = $lastname;
        }
        public function get_lastname() {
            return $this->lastname;
        }
        public function set_firstname($firstname) {
            $this->firstname = $firstname;
        }
        public function get_firstname() {
            return $this->firstname;
        }
        public function set_middleInitial($middleInitial) {
            $this->middleInitial = $middleInitial;
        }
        public function get_middleInitial() {
            return $this->middleInitial;
        }
        public function set_age($age) {
            $this->age = $age;
        }
        public function get_age() {
            return $this->age;
        }
        public function set_contactnum($contactnum) {
            $this->contactnum = $contactnum;
        }
        public function get_contactnum() {
            return $this->contactnum;
        }
        public function set_email($email) {
            $this->email = $email;
        }
        public function get_email() {
            return $this->email;
        }
        public function set_address($address) {
            $this->address = $address;
        }
        public function get_address() {
            return $this->address;
        }
    }
     ?>
    
 </body>
 </html>