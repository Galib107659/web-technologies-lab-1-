<!DOCTYPE html>

<html>
<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Registration</title>

</head>

<body>

    <?php 

    $firstname = $lastname = $gender = $email = $mobileno = $address1 = $country =  "";

    $firstnameErrMsg = $lastnameErrMsg = $genderErrMsg = $emailErrMsg = $mobileErrMsg = $address1ErrMsg = $countryErrMsg = "";


        if ($_SERVER['REQUEST_METHOD'] === "POST") {

            function test_input($data) {

                $data = trim($data);

                $data = stripcslashes($data);

                $data = htmlspecialchars($data);

                return $data;

            }

         $firstname = test_input($_POST['firstname']);

        $lastname = test_input($_POST['lastname']);

        $gender = isset($_POST['gender']) ? test_input($_POST['gender']) : NULL;

        $email = test_input($_POST['email']);

        $mobileno = test_input($_POST['mobileno']);

        $address1 = test_input($_POST['address1']);

        $country = isset($_POST['country']) ? test_input($_POST['country']) : NULL;


        $message = "";

        if (empty($firstname)) {



            $firstnameErrMsg = "First Name is Empty";

        }

        else {

            if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname)) {
            $firstnameErrMsg = "Only letters and spaces";
         }

        }

        if (empty($lastname)) {

               $lastnameErrMsg = "Last Name is Empty";

        }

        else {

            if (!preg_match("/^[a-zA-Z-' ]*$/",$lastname)) {

                $lastnameErrMsg = "Only letters and spaces";

            }

        }

        if (empty($gender)) {

            $genderErrMsg = "Gender is not Selected";

        }

        if (empty($email)) {

            $emailErrMsg .= "Email is Empty";   

        }
        else {

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $emailErrMsg .= "Please correct your email";

            }

        }

        if (empty($mobileno)) {

            $mobileErrMsg .= "Mobileno is Empty";  

        }

        if (empty($address1)) {

            $address1ErrMsg .= "Street/House/Road is Empty";  

        }

        if (!isset($country) or empty($country)) {

            $countryErrMsg .= "Country not Seletect";

        }

        if ($message === "") {

            echo "Please Fil up all field";

        }

        if($message){

            echo "Registration Successful";

        }

        else {

            echo $message;

        }

    }

?>
 <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" novalidate>

        <fieldset>

            <legend>General</legend>



            <label for="fname">First Name</label>

            <input type="text" name="firstname" id="fname" >

            <span style="color: red"><?php echo $firstnameErrMsg; ?></span>



            <br><br> <label for="lname">Last Name</label>

            <input type="text" name="lastname" id="lname">

            <span style="color: red"><?php echo $lastnameErrMsg; ?></span>


            <br><br>


            <label>Gender</label>

            <input type="radio" name="gender" id="male">

            <label for="male">Male</label>

            <input type="radio" name="gender" id="female">

            <label for="female">Female</label>

            <span style="color: red"><?php echo $genderErrMsg; ?></span>


            <br><br>

        </fieldset>



        <fieldset>

            <legend>Contact</legend>

            <label for="email">Email</label>

            <input type="email" name="email" id="email">

            <span style="color: red"><?php echo $emailErrMsg; ?></span>


            <br><br>

            <label for="mobileno">Mobile No</label>

            <input type="text" name="mobileno" id="mobileno">

            <span style="color: red"><?php echo $mobileErrMsg; ?></span>
            
            <br><br>


        </fieldset>

        <fieldset>

            <legend>Address</legend>

            <label for="address1">Street/House/Road</label>

            <input type="text" name="address1" id="address1">

            <span style="color: red"><?php echo $address1ErrMsg; ?></span>

            <br><br>

            <label for="country">Country</label>

            <select name="country" id="country">

                <option value="bd">Bangladesh</option>

                <option value="ind">INDIA</option>
                
                <option value="usa">USA</option>

                 <option value="nep">Nepal</option>


            </select>

            <span style="color: red"><?php echo $countryErrMsg; ?></span>


            <br><br>

        </fieldset>

        <input type="submit" name="submit" value="Register">

    </form>

</body>

</html>