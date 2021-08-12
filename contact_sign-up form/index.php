<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src = '../jquery.min.js'></script>
    <link rel='stylesheet' href = 'style.css'>
    <title>Contact Form</title>
</head>
<body>
    <div id="container">
        <form method="post" id="validation">
            <label for="full-name">Name</label>
            <input type="text" name="name" id="full-name" class="in" placeholder="your full name">

            <label for="email-address">Email</label>
            <input type="text" name="email" id="email-address" class="in" placeholder="your email address">

            <label for="gender">Gender</label>
            <select name="gender" id="gender">
                <option value="" disabled selected></option>
                <option value='male'>Male</option>
                <option value='female'>Female</option>
                <option value='other'>Other</option>
            </select>

            <label for ="pass1">Password</label>
            <input type="text" name="pass1" id="pass1" class ="in" placeholder = "enter your password">

            <label for ="pass2">Confirm Password</label>
            <input type="text" name="pass2" id="pass2" class = "in" placeholder = "confirm your password">

            <textarea id="mail-message" name="message" rows='8'cols='80' placeholder="enter your message"></textarea>

            <button id = "submit" type="submit" name="submit">OK</button>
            <div id = "error"></div>
        </form>
    </div>  
    <script type='text/javascript'>
        $('#validation').submit(function(e){
            //remove after implementation
            e.preventDefault();
            //
            var name = $('#full-name').val();
            var email = $('#email-address').val();
            var gender = $('#gender').val();
            var pass1 = $('#pass1').val();
            var pass2 = $('#pass2').val();
            var message = $('#mail-message').val();
            var submit = $('#submit').val();
            //
            $("#error").load("mail.php",{
                name: name,
                email: email,
                pass1: pass1,
                pass2: pass2,
                message: message,
                submit: submit,
            });
        });
    </script>
</body>
</html>