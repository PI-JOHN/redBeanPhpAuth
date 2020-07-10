<!DOCTYPE html>
<html>
<head>
    <?php
    $title = "Обратная связь";
    require_once __DIR__.'/../head.php';
    ?>
    <script
            src="https://code.jquery.com/jquery-2.2.4.min.js"
            integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
            crossorigin="anonymous"></script>
    <script>
        $(document).ready (function () {
           $("#done").click (function (){
               $('#messageShow').hide ();
              let name = $("#name").val ();
              let email = $("#email").val ();
              let subject = $("#subject").val ();
              let message = $("#message").val ();
              let fail = "";
              if (name.length < 2) fail = "Имя должно быть не короче 2х символов";
              else if (email.split ('@').length - 1 === 0 || email.split ('.').length - 1 === 0)
                  fail = "Некорректный Email";
              else if (subject.length < 5)
                  fail = "Тема сообщения не менее 5ти символов";
              else if (message.length < 20)
                  fail = "Текст сообщения не может быть короче 20ти символов";
              if (fail !== "") {
                  $('#messageShow').html (fail + "<div class='clear'<br></div>");
                  $('#messageShow').show ();
                  return false;
              }
              $.ajax ({
                url: '/ajax/feedback.php',
                type: 'POST',
                cache: false,
                data: {'name': name, 'email': email, 'subject': subject, 'message': message},
                dataType: 'html',
                success: function (data) {
                    if(data === 'Сообщение отправлено') {
                        $('#messageShow').html (data + "<div class='clear'<br></div>");
                        $('#messageShow').show ();
                    }
                }
              });
           });
        });
    </script>
</head>
<body>

    <?php require_once __DIR__.'/../header.php'; ?>

    <div id="wrapper">
        <div id="leftCol">
            <input type="text" placeholder="Имя" id="name" name="name"><br>
            <input type="text" placeholder="Email" id="email" name="email"><br>
            <input type="text" placeholder="Тема сообщения" id="subject" name="subject"><br>
            <textarea name="message" id="message" placeholder="Введите сообщение"></textarea><br>
            <div id="messageShow" ></div>
            <input type="button" name="done" id="done" value="Отправить">
        </div>
        <?php require_once __DIR__.'/../rightCol.php'; ?>
    </div>
    <?php require_once __DIR__.'/../footer.php'; ?>
</body>
</html>

