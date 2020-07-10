<?php require_once __DIR__.'/../../App/Db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <?php
    $title = "Новости обо всем";
    require_once __DIR__.'/../head.php';


    $data = $_POST;
    if (isset($data['do_login'])){
        $errors=[];
        $user = R::findOne('users', 'login = ?', array($data['login']));
        if ($user){
            //Логин существует
            if (password_verify($data['password'], $user->password)){
                //Все хорошо, выполняем вход
                $_SESSION['logged_user'] = $user;
                echo '<div style="color: green"><br>
                Можете перейти на <a href="/">Главную</a> страницу</div><hr>';
            } else {
                $errors[] = 'Неверный пароль';
            }
        } else {
            $errors[] = 'Пользователь с таким логином не найден';
        }
        if(!empty($errors)){
            echo '<div style="color: red">'.array_shift($errors).'</div><hr>';
        }
    }
    ?>
</head>
<body>

<?php require_once __DIR__.'/../header.php'; ?>
    <div id="wrapper">
        <div id="leftCol">
            <?php if (isset($_SESSION['logged_user'])): ?>
            <p>Вы уже авторизованы!</p>
            <?php else: ?>
            <form action="/templates/forms/auth.php" method="post">
                <p>
                    <input type="text" name="login" value="<?php echo @$data['login']; ?>" placeholder="Логин">
                </p>
                <p>
                    <input type="password" name="password" value="<?php echo @$data['password']; ?>" placeholder="Введите пароль">
                </p>
                <p>
                    <input type="submit" name="do_login" id="do_login" value="Войти">
                </p>
            </form>
            <?php endif; ?>
        </div>
        <?php require_once __DIR__.'/../rightCol.php'; ?>
    </div>


<?php require_once __DIR__.'/../footer.php'; ?>
</body>
</html>








<form action="/templates/forms/auth.php"></form>
