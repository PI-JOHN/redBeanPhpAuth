
<?php require_once __DIR__.'/../../libs/rb.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <?php
    $title = "Новости обо всем";
    require_once __DIR__.'/../head.php';

    ?>
    <?php
    $data = $_POST;
    if (isset($data['do_signup'])){
        //здесб регистрируем
        $errors = [];
        if (trim($data['login']) == ''){
            $errors[] = 'Введите Логин';
        }
        if (trim($data['email']) == ''){
            $errors[] = 'Введите email';
        }
        if ($data['password'] == ''){
            $errors[] = 'Введите Пароль';
        }
        if ($data['password_2'] != $data['password']){
            $errors[] = 'Пароли не совпадают';
        }
        if (R::count('users', "login = ? ", array(
            $data['login'])) > 0 ) {
            $errors[] = 'Пользователь с таким логином уже существует';
        }
        if(R::count('users', "email = ?", array($data['email'])) > 0){
            $errors[] = 'Пользоветль с таким Email уже зарегистрирован';
        }

        if(empty($errors)){
            //Все хорошо, регистрируем
            $user = R::dispense('users');
            $user->login = $data['login'];
            $user->email = $data['email'];
            $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
            R::store($user);
            echo '<div style="color: green">Вы успешно зарегистрированы</div><hr>';
        } else {
            echo '<div style="color: red">'.array_shift($errors).'</div><hr>';
        }
    }
    ?>
</head>
<body>

    <?php require_once __DIR__.'/../header.php'; ?>
    <div id="wrapper">
        <div id="leftCol">
            <form action="/templates/forms/reg.php" method="post">
                <p>
                    <input type="text" name="login" value="<?php echo @$data['login']; ?>" placeholder="Логин">
                </p>
                <p>
                    <input type="email" name="email" value="<?php echo @$data['email']; ?>" placeholder="Введите Email">
                </p>
                    <input type="password" name="password" value="<?php echo @$data['password']; ?>" placeholder="Введите пароль">
                </p>
                    <input type="password" name="password_2" value="<?php echo @$data['password_2']; ?>" placeholder="Введите еще раз пароль">
                </p>
                <p>
                    <input type="submit" name="do_signup" id="do_signup" value="Зарегистрироваться">
                </p>
            </form>
        </div>
    <?php require_once __DIR__.'/../rightCol.php'; ?>
    </div>


    <?php require_once __DIR__.'/../footer.php'; ?>
</body>
</html>
