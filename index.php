<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<style>
    .error{
        color:red;
    }
    input{
        padding: 22px;
    }
    textarea{
        padding:50px;
    }
    label{
        color:#020202;
        font-size: 18px;
    }
    </style>
<body>



<?php
$nameErr = $emailErr = $genderErr = $grpErr = $agreeErr = "";
$name = $email = $gender = $grp = $msg = $subj = "";
$gender = "";

if (isset($_POST['submit'])) {
  //name

    if (!empty($_REQUEST["name"])) {
        $nameErr = "invalid name and name should be alpha";
    } elseif (preg_match("/[^A-Za-z]/", $_REQUEST['name'])) {
        $nameErr = "Name is required";
    }

    //email
    if (!empty($_REQUEST["email"])) {
        $emailErr = "please provide correct email format ";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "please provide correct email format ";
    }

    if (!empty($_REQUEST["grp"])) {
        $grpErr = "Group number is required";

    } elseif (preg_replace('/[^0-9]/', $_REQUEST['grp'])) {
        $grpErr = "please provide Group number";
    }

    //gender
    if (empty($_REQUEST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = input_data($_POST["gender"]);
    }

    //multiple-selection
    if (empty($_REQUEST['ary'])) {
        $values = $_POST['ary'];
        foreach ($values as $a) {
            echo $a;
        }
    }
    //Checkbox agree
    if (!isset($_POST['agree'])) {
        $agreeErr = "Accept terms is required";
    } else {
        $agree = input_data($_POST["agree"]);
    }
    exit();
}

?>

    <h2>Registration Form</h2>


    <form action= "<?php $_PHP_SELF?>" method = "POST" required>
<label for="name">Name : </label>
<input type="text" name="name" placeholder=" enter your name" required><span class="error">*<?php echo $nameErr; ?></span><br>

<label for="email">Email : </label>
<input type="email"  id="email" name="email"  placeholder=" enter your email" required><span class="error">*<?php echo $emailErr; ?></span><br>

<label for="grp">Group Number : </label>
<input type="number"  id="grp" name="grp"  placeholder=" enter your group number" required><br><span class="error">*<?php echo $grpErr; ?></span><br>


<label for="msg">Class Details : </label>
<textarea id="msg" name="msg" placeholder="Say whatever you want....."></textarea><br><br><br>


<label for="gender" >Gender</label>
<input type="radio" name="gender" value="male"> <label for="male">Male  </label>
<input type="radio" name="gender" value="female"> <label for="female">Female  </label><span class="error">*<?php echo $genderErr; ?></span><br>

<br><br><br>
<label for="subj">Choose subjects :</label>

<select name="ary[]" id="subj" multiple>
  <option value="java">Java</option>
  <option value="html">Html</option>
  <option value="css">Css</option>
  <option value="php">Php</option>
  <span ><?php echo $a; ?> </span>
</select> <br>


<label>Agree to Terms & Conditions </label>
    <input type="checkbox" name="agree">
    <span class="error">* <?php echo $agreeErr; ?> </span>
    <br><br>

<input type="submit" name="submit" value="Submit">



</form>




<?php
if (isset($_POST['submit'])) {
    if ($nameErr == "" && $emailErr == "" && $grpErr == "" && $genderErr == "" && $agreeErr == "") {
        echo "YOUR Name :" . $name . "<br />";
        echo "YOUR Email:" . $email . "<br />";
        echo "YOUR Group Number :" . $grp . "<br />";
        echo "Class Details:" . $_REQUEST['msg'] . "<br />";
        echo "Your Gender Type:" . $gender . "<br />";
        echo "Your Selected Subjects :" . $a . "<br />";

    } else {
        echo "<h3> <b>You didn't filled up the form correctly.</b> </h3>";
    }
}
?>


</body>
</html>
