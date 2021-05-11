<div class="websitename">
    <header>W.T.Laptop</header>     
</div>
<?php if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
 ?>
    <div class="head">
        <body>
        <nav>
                <ul>
                    <li class="sub">
                        <a href="/301COS/kadenadlington/301COSKadenAdlington/index.php">Home</a>
                        <ul>
                            <li><a href="/301COS/kadenadlington/301COSKadenAdlington/Details.php">Details</a></li>
                        </ul>
                    </li>
                    <li><a href="/301COS/kadenadlington/301COSKadenAdlington/submit.php">Search</a></li>
                    <li><a href="/301COS/kadenadlington/301COSKadenAdlington/login.php">Login</a></li>
                    <li><a href="/301COS/kadenadlington/301COSKadenAdlington/register.php">Register</a></li>
                </ul>
            </nav>    
<?php } else { ?>
    <div class="head">
        <body>
        <nav>
                <ul>
                    <li class="sub">
                        <a href="/301COS/kadenadlington/301COSKadenAdlington/index.php">Home</a>
                        <ul>
                            <li><a href="/301COS/kadenadlington/301COSKadenAdlington/Details.php">Details</a></li>
                        </ul>
                    </li>
                    <li><a href="/301COS/kadenadlington/301COSKadenAdlington/submit.php">Search</a></li>
                    <li><a href="/301COS/kadenadlington/301COSKadenAdlington/welcome.php">Account</a></li>
                    <li><a href="/301COS/kadenadlington/301COSKadenAdlington/logout.php">Logout</a></li>

                </ul>
            </nav>    
<?php } ?>
      </div>