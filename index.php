<?php
session_start();
if (isset($_SESSION["user_id"])) {
    $PDO = require __DIR__ . "/db.php";
    $sql = "SELECT * FROM user WHERE user_id = ?";
    $stmt = $PDO->prepare($sql);
    $stmt->execute([$_SESSION["user_id"]]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}
require_once("partials/nav.php");
require_once("partials/head.php");
?>

<html>
<body>
    <div class="welcome">
<?php if (isset($user)) : ?>
Welcome back <?= htmlspecialchars($user["username"]) ?>
<?php else : ?>
    <?php endif; ?>
</div>
    <div class="containerbox">
        <div class="box">
            <div class="icon">01</div>
            <div class="content">
                <h3>Speel</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae aspernatur facere quaerat debitis
                    laboriosam aut doloribus voluptatibus dolor veniam, reiciendis quo</p>
                <a class="boxbtn" href="#">Read more</a>
            </div>
        </div>
        <div class="box">
        <div class="icon">02</div>
            <div class="content">
                <h3>Speel</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae aspernatur facere quaerat debitis
                    laboriosam aut doloribus voluptatibus dolor veniam, reiciendis quo</p>
                <a class="boxbtn" href="#">Read more</a>
            </div>
        </div>
        <div class="box">
            <div class="icon">03</div>
            <div class="content">
                <h3>Speel</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae aspernatur facere quaerat debitis
                    laboriosam aut doloribus voluptatibus dolor veniam, reiciendis quo</p>
                <a class="boxbtn" href="#">Read more</a>
            </div>
        </div>
        <div class="box">
            <div class="icon">03</div>
            <div class="content">
                <h3>Speel</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae aspernatur facere quaerat debitis
                    laboriosam aut doloribus voluptatibus dolor veniam, reiciendis quo</p>
                <a class="boxbtn" href="#">Read more</a>
            </div>
        </div>
        <div class="box">
            <div class="icon">03</div>
            <div class="content">
                <h3>Speel</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae aspernatur facere quaerat debitis
                    laboriosam aut doloribus voluptatibus dolor veniam, reiciendis quo</p>
                <a class="boxbtn" href="#">Read more</a>
            </div>
        </div>
        <div class="box">
            <div class="icon">03</div>
            <div class="content">
                <h3>Speel</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae aspernatur facere quaerat debitis
                    laboriosam aut doloribus voluptatibus dolor veniam, reiciendis quo</p>
                <a class="boxbtn" href="#">Read more</a>
            </div>
        </div>
        <div class="box">
            <div class="icon">03</div>
            <div class="content">
                <h3>Speel</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae aspernatur facere quaerat debitis
                    laboriosam aut doloribus voluptatibus dolor veniam, reiciendis quo</p>
                <a class="boxbtn" href="#">Read more</a>
            </div>
        </div>
        <div class="box">
            <div class="icon">03</div>
            <div class="content">
                <h3>Speel</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae aspernatur facere quaerat debitis
                    laboriosam aut doloribus voluptatibus dolor veniam, reiciendis quo</p>
                <a class="boxbtn" href="#">Read more</a>
            </div>
        </div>
        <div class="box">
            <div class="icon">03</div>
            <div class="content">
                <h3>Speel</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae aspernatur facere quaerat debitis
                    laboriosam aut doloribus voluptatibus dolor veniam, reiciendis quo</p>
                <a class="boxbtn" href="#">Read more</a>
            </div>
        </div>
         <div class="box">
            <div class="icon">03</div>
            <div class="content">
                <h3>Speel</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae aspernatur facere quaerat debitis
                    laboriosam aut doloribus voluptatibus dolor veniam, reiciendis quo</p>
                <a class="boxbtn" href="#">Read more</a>
            </div>
        </div>
    </div>
</body>
<?php
require_once("partials/footer.php");
?>
</html>