    <!-- User Interface -->
    <?php
        include 'not_error.php';
        $user_q = mysqli_query($conn, "SELECT username FROM user WHERE user_id = '$_SESSION[user_id]'");
        $user_rows = mysqli_fetch_assoc($user_q);
    ?>
    <div class="user-header">
        <div class="section1-header">
            <h3 id="user-hello">Hello, <?php 
            if ($_SESSION['user_id'] === NULL) {
                echo "....";
            } else {
                echo $user_rows['username'];
            }
            ?>!</h3>
        </div>
        <div class="section2-header">
            <img src="assets/toys.png" id="utoys-logo-header" alt="u-toys-logo">
        </div>
        <div class="section3-header">
            <div class="user-nav" id="userLogged">
                <div class="user-login">
                    <a href="cart.html" style="margin-right: 10%;"><img src="saved-icon/cart-shopping-solid.svg" id="shopping-cart" alt="shopping-cart"></a>
                    <a href="account.html"><img src="https://cdn0-production-images-kly.akamaized.net/dRlCPAybKFVW0XiDmLuO4RJriE4=/1200x1200/smart/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/4119862/original/065226400_1660189533-i_m_Groot.jpg" id="user-photos" alt="userprofile"></a>
                </div>
            </div>
            <div class="user-action" id="userNotLogged">
                <div class="user-login-not">
                    <button type="button" class="user-method" onclick="location.href = 'login.php'">Sign In</button>
                    <button type="button" class="user-method" onclick="location.href = 'register.php'">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
