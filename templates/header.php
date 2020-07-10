
<header>
    <div id="logo">
        <a href="/" title="Перейти на главную"><span>Н</span>овости</a>
    </div>
    <div id="menuHead">
        <?php if ($_SERVER['REQUEST_URI'] == "/about.php") : ?>
        <a href="/">
            <div style="margin-right: 5%">
                Назад
            </div>
        </a>
        <?php else: ?>
        <a href="/about.php">
            <div style="margin-right: 5%">
                О нас
            </div>
        </a>
         <?php endif; ?>
        <a href="/templates/forms/feedback.php">
            <div>
                Обратная связь
            </div>
        </a>
    </div>
    <div id="regAuth">
        <?php if (isset($_SESSION['logged_user'])): ?>
        <a href="/templates/logout.php">Выйти</a>
        <?php else: ?>
        <a href="/templates/forms/reg.php">Регистрация</a> |
        <a href="/templates/forms/auth.php">Авторизация</a>
        <?php endif; ?>
    </div>
</header>
