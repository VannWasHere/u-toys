<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    
    <!-- Local CSS -->
    <link rel="stylesheet" href="css/register.css">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">

</head>
<body>
    <div class="container">
        <div class="image-register">
            <img src="assets/sign_up.png" class="cover" alt="Toys Images">
        </div>
        <div class="form-register">
            <h2 id="register-header">Create Your Account</h2>
            <p id="register-messages">Find the perfect toy for every age and interest - sign up now and start exploring!</p>

            <!-- Register Form -->
            <div class="register-form">
                <form action="php/register_process.php" method="post">
                    <input type="text" name="username" class="register-input" id="username-input" placeholder="Username" required autocomplete="off"><br>
                    <input type="email" name="email" class="register-input" id="email-input" placeholder="Email" required autocomplete="off"><br>
                    <input type="password" name="password" class="register-input" id="password-input" placeholder="Password" required autocomplete="off"><br>
                    <p id="password-manager"></p>
                    <input type="password" class="register-input" id="sec-password-input" placeholder="Re-enter Password" required autocomplete="off"><br>

                    <button type="submit" id="register-button" disabled>Sign Up</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Javascript Link -->
    <script src="https://kit.fontawesome.com/e67bdeab51.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- JQuery Code -->
    <script>
        $('#password-input, #sec-password-input').on('input', function() {
            var first_password = $('#password-input').val();
            var second_password = $('#sec-password-input').val();
            var register_button = $('#register-button');

            if (first_password !== '' && second_password !== '') {
                if (first_password === second_password) {
                    $('#password-input, #sec-password-input').addClass('same');
                    $('#password-input, #sec-password-input').removeClass('different');
                    register_button.prop('disabled', false); // Enable the button
                } else {
                    $('#password-input, #sec-password-input').addClass('different');
                    $('#password-input, #sec-password-input').removeClass('same');
                    register_button.prop('disabled', true); // Disable the button
                }
            } else {
                register_button.prop('disabled', true); // Disable the button if any of the inputs is empty
            }
        });
    </script>


    <script>
        $('#password-input').on('input', function() {
            var user_password = $('#password-input').val();

            if(user_password !== '') {
                if(user_password.length < 8) {
                    $('#password-manager').text('Password at least 8 character');
                } else {
                    $('#password-manager').text('');
                }
            } else {
                $('#password-manager').text('');
            }
        });
    </script>

</body>
</html>