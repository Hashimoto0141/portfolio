<?php
session_start();

// 入力画面からのアクセスでなければ、戻す
if (!isset($_SESSION['form'])) {
    header('Location: index.php');
    exit();
} else {
    $post = $_SESSION['form'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // メールを送信する
    $to = 'tomcatgsx0141@gmail.com';
    $from = $post['email'];
    $subject = 'お問い合わせが届きました';
    $body = <<<EOT
名前： {$post['name']}
メールアドレス： {$post['email']}
内容：
{$post['contents']}
EOT;
    mb_send_mail($to, $subject, $body, "From: {$from}");

    // セッションを消してお礼画面へ
    unset($_SESSION['form']);
    header('Location: complete.html');
    exit();
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles_confirm.css">
    <title>Confirm</title>
</head>

<body>

    <section class="confirm section">
        <h2 class="section-title">お問い合わせ内容確認</h2>

        <div class="confirm__container bd-grid">
            <form action="" method="POST" class="confirm-form">

                <div class="item">
                    <p class="label">名前</p>
                    <p class="contents"><?php echo htmlspecialchars($post['name']); ?></p>
                </div>

                <div class="item">
                    <p class="label">メール</p>
                    <p class="contents"><?php echo htmlspecialchars($post['email']); ?></p>
                </div>

                <div class="item">
                    <p class="label">お問い合わせ内容</p>
                    <p class="contents"><?php echo nl2br(htmlspecialchars($post['contents'])); ?></p>
                </div>

                <div class="confirm__button">
                    <input type="button" class="button" onclick="history.back()" value="戻る">
                    <input type="submit" class="button" value="送信">
                </div>
            </form>
        </div>
    </section>
</body>
</html>