<footer>
    <nav id="bottomNav" class="row">
        <div class="col">
            <img class="logo" src="./images/BetsRUs_Logo.png" alt="Logo for bets r us">
        </div>
        <div class="col">
            <?php if(isset($userID)){ ?>
                <div class="btn">
                    <a class="username" href="user_profile.php" type="button"><?= $username ?></a>
                    <a class="profileBtn" href="logout.php" type="button">Logout</a>
                </div>
                <?php } else { ?>
                <div class="btn">
                    <a href="login.php" class="profileBtn" type="button">Login</a>
                    <a href="register.php" class="profileBtn" type="button">Register</a>
                </div>
            <?php } ?>
            <div>
                <ul id="bottomNavLinks">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="#">Directors</a>
                    </li>
                    <li>
                        <a href="Rules/list_rules.php">Rules</a>
                    </li>
                    <li>
                        <a href="Users/list_users.php">Users</a>
                    </li>
                    <li>
                        <a href="#">Actors</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="separator"></div>
    <div class="row">
        <div class="col-sm">
            <p class="footerTxt">2021 &copy - This is a website for class HTTP5202 Web Application Development 2</p>
        </div>
        <div class="col-sm">
            <ul class="socialLinks">
                <li><p class="footerTxt">Follow Us!</p></li>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Instagram</a></li>
                <li><a href="Blogs/list_blog.php">Blogs</a></li>
            </ul>
        </div>
    </div>
</footer>