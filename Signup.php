
<?php
session_start();
include("connections.php");
$query="SELECT * FROM user ORDER BY user_id DESC limit 1";
$result=mysqli_query($connections,$query);
$row=mysqli_fetch_array($result);

    $first_name = $middle_name = $last_name = $gender = $address = $contact_number = $user_name = $pass ="";
     $first_nameErr = $middle_nameErr = $last_nameErr = $genderErr = $addressErr = $contact_numberErr = $user_nameErr = $passErr = 
     "";

    


 if(isset($_POST["submit"])){
        if(empty($_POST["first_name"])){
            $first_nameErr = "First Name is Required!";
        }

         if(empty($_POST["middle_name"])){
            $middle_nameErr = "Middle Name is Required!";
        }

        if(empty($_POST["last_name"])){
            $last_nameErr = "Last Name is Required!";
        }

        if(empty($_POST["gender"])){
            $genderErr = "Gender is Required!";
        }

        if(empty($_POST["address"])){
            $addressErr = "Address is Required!";
        }

        if(empty($_POST["contact_number"])){
            $contact_numberErr = "Contact Number is Required!";
        }

        if(empty($_POST["user_name"])){
            $user_nameErr = "Username is Required!";
        }

        if(empty($_POST["pass"])){
            $passErr = "Password is Required!";
        }

       
           
else{
        $first_name = $_POST["first_name"];
        $middle_name = $_POST["middle_name"];
        $last_name = $_POST["last_name"];
        $gender = $_POST["gender"];
        $address = $_POST["address"];
        $contact_number = $_POST["contact_number"];
        $user_name = $_POST["user_name"];
        $pass = $_POST["pass"];

        

        
          

       

mysqli_query($connections,"INSERT INTO user(first_name,middle_name,last_name,gender,address,contact_number,user_name,password) VALUES('$first_name','$middle_name', '$last_name','$gender', '$address', '$contact_number', '$user_name', '$pass')");

    header("Location: Login.php");


}

}


?>




<html>
<head>
    <title>SIGN UP</title>
        <script type="text/javascript">
function blockSpecialChar(e){
    var k;
    document.all ? k = e.keyCode : k = e.which;
    return ((k > 64 && k <91 ) || (k > 96 && k < 123) || k == 8 || k == 32 || (k >= 48 && k <+ 57));

}
</script>
<script type="text/javascript">
    function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : even.keyCode
        if (charCode > 31 && (charCode >57))
            return false;
    }


    function val()
    {
        var letters = /^[A-Za-z]+$/;
        if(frm.first_name.value.match(letters) && frm.last_name.value.match(letters))
        {

        }
        else{
            alert('Names must be not empty and contain letters only');

        }

        {

            var phoneno = /^\d{11}$/;
            if(frm.contact_number.value.match(phoneno))
            {

            }
            else
            {
                alert("Contact Number should be 11 numbers");
                return false;
            }
        }

{
    var passw = /^[A-Za-z0-9]{7,14}$/;
    if(frm.pass.value.match(passw))
    {

    }
    else
    {
        alert('Password should be 7 to 16 characters');
        return false;

    }
}
  {
    if(frm.pass.value == frm.pass2.value)
    {
        
    }
    else{
        alert("Password are not same");
        return false;
    }
}
}
</script>
              
<style>
  .error{
    color:red;
}  


</style>

<link rel="stylesheet" type="text/css" href="css/signup.css">
<body>
	<div class="signupbox">
    <center>
    <h1>Sign Up</h1>
        <form name="frm" method="post" action="Signup.php" onsubmit="return myFun();">
            <table>

            <tr>
            <td><b>User ID</b></td>
            <td><input type="text" name="user_id" readonly value="<?php echo ++$row[0]?>"></td>
            </tr>

            <tr>
            <td><b>First Name </b></td>
            <td><input type="text" name="first_name"  value="<?php echo $first_name; ?>" required> <span class="error" > <?php echo $first_nameErr; ?></span> </td>
            </tr>
            
            <tr>
            <td><b>Middle Name</b></td>
            <td><input type="text" name="middle_name"  value="<?php echo $middle_name; ?>"><span class="error"> <?php echo $middle_nameErr; ?></span></td>
            </tr>
            
            <tr>
            <td><b>Last Name</b></td>
            <td><input type="text" name="last_name"  value="<?php echo $last_name; ?>" required> <span class="error"> <?php echo $last_nameErr; ?></span></td>
            </tr>

            <tr>
            <td><b>Gender</b></td>
             <td>   <select name="gender">
                 <option name="gender" value="">Select Gender</option>
                 <option name="gender" <?php if($gender == "Male") {echo "selected";} ?>value="Male">Male</option>
                 <option name="gender" <?php if($gender == "Female") {echo "selected";} ?> value="Female">Female</option>   
                </select><span class="error"> <?php echo $genderErr; ?> </span></td>
            </tr>
            
            <tr>
            <td><b>Address</b></td>
            <td><input type="text" name="address" value="<?php echo $address; ?>" required> <span class="error"> <?php echo $addressErr; ?> </span></td>
            </tr>
            
            <tr>
            <td><b>Contact Number</b></td>
            <td><input type="text" onkeypress="return isNumberKey(event);" name="contact_number" value="<?php echo $contact_number; ?>" required> <span class="error"> <?php echo $contact_numberErr;?> </span> </td>
            </tr>

            <tr>
            <td><b>Username</b></td>
            <td><input type="text" name="user_name"  value="<?php echo $user_name; ?>" required> <span class="error"> <?php echo $user_nameErr; ?> </span> </td>
            </tr>

            <tr>
            <td><b>Password</b></td>
            <td><input type="password" name="pass" value="<?php echo $pass; ?>" required> <span class="error"> <?php echo $passErr; ?> </span> </td> 
            </tr> <br>
            <tr>
            <td><b>Confirm Password</b></td>
            <td><input type="password" name="pass2"  required> </td> 
            </tr> <br>

           
 </table><br>
            <input type="submit" onclick="return val();" name="submit" value="Register" ><br>
            <a href="Login.php"> <b> Do you have an account? </b> </a>
        



        </form>
        </center>
    </body>
</head>
</html>
