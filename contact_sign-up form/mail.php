<link rel='stylesheet' href = 'style.css'>
<?php
    if(isset($_POST["submit"])){
        //the fields filled by the user
        $name = $_POST["name"];
        $email = $_POST["email"];
        $pass1 = $_POST["pass1"];
        $pass2 = $_POST["pass2"];
        $message = $_POST["message"];
        //
        $eEmail = false;
        $ePass = false;
        //validation
        if (empty($name) || empty($email) || empty($pass1) || empty($pass2)){
            echo "<span class='form-error'>Please Fill Out Required Fields. </span>";
        } 
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "<span class='form-error'>Please Enter a Correct Email. </span>";
            $eEmail = true;
        }
        elseif($pass1 != $pass2){
            echo "<span class='form-error'>Please Reconfirm your password. </span>";
            $ePass = true;
        }
        else{
            echo "<span class='success'>Success!</span>";
        }
    }

?>

<script>
    var eEmail = "<?php echo $eEmail; ?>";
    var ePass = "<?php echo $ePass; ?>";
    if(eEmail == true){
        $('#email-address').addClass("input-error");
    }
    if(ePass == true){
        $('#pass1').addClass("input-error");
        $('#pass2').addClass("input-error");
    }
</script>