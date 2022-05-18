<?php
session_start();
$error = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    // フォームの送信時にエラーをチェックする
    if ($post['name'] === '') {
        $error['name'] = 'blank';
    }
    if ($post['email'] === '') {
        $error['email'] = 'blank';
    } else if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
        $error['email'] = 'email';
    }
    if ($post['contents'] === '') {
        $error['contents'] = 'blank';
    }

    if (count($error) === 0) {
        // エラーがないので確認画面に移動
        $_SESSION['form'] = $post;
        header('Location: confirm.php');
        exit();
    }
} else {
    if (isset($_SESSION['form'])) {
        $post = $_SESSION['form'];
    }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets/css/styles.css">
	
	<link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

	<title>Portfolio website</title>
</head>
<body>


	<!--===== HEADER =====-->
	<header class="l-header">
		<nav class="nav bd-grid">
			<div>
				<a href="#" class="nav__logo">Tomohiro</a>
			</div>
			<div class="nav__menu" id="nav-menu">
				<ul class="nav__list">
					<li class="nav__item"><a href="#home" class="nav__link active">Home</a></li>
					<li class="nav__item"><a href="#about" class="nav__link">About</a></li>
					<li class="nav__item"><a href="#work" class="nav__link">Works</a></li>
					<li class="nav__item"><a href="#hobby" class="nav__link">Hobbies</a></li>
					<li class="nav__item"><a href="#contact" class="nav__link">Contact</a></li>
				</ul>
			</div>

			<div class="nav__toggle" id="nav-toggle">
				<i class='bx bx-menu'></i>
			</div>
		</nav>
	</header>


	<main class="l-main">
		
		<!-- HOME -->
		<section class="home bd-grid" id="home">
			<div class="home__data">
				<h1 class="home__title">Hi, <br><span class="home__title-text">I'm</span> <span class="home__title-color">Tomohiro Hashimoto</span><br><span class="home__title-text">University Student</span></h1>
				<a href="#contact" class="contact_button button">Contact</a>
			</div>

			<div class="home__social">
				<a href="https://www.instagram.com/tomop__o/" class="home__social-icon"><i class='bx bxl-instagram' ></i></a>
				<a href="https://github.com/Hashimoto0141" class="home__social-icon"><i class='bx bxl-github'></i></a>
			</div>

			<div class="home__img">
				<img src="assets/img/1.png" alt="">
			</div>
		</section>


		<!--===== ABOUT =====-->
		<section class="about section" id="about">
			<h2 class="section-title">About</h2>

			<div class="about__container bd-grid">
				<div class="about__img">
					<img src="assets/img/about.jpg" alt="">
				</div>
				
				<div>
					<h2 class="about__subtitle">橋本智浩(Tomohiro Hashimoto)</h2>
					<p class="about__text">福島県・本宮市出身、2000年生まれ。<br>中学時代はやりたいことが決まっていなかったため、<br>なんとなくで工業系の高校(電気科)に入学。<br>卒研で簡単なプログラミングを行い、大学でプログラミングをやってみたいと思い、地元の日本大学工学部情報工学科に進学。HTMLやCSS、JavaScriptを扱ったWebサイトの作成に興味をもつ。</p>
				</div>
			</div>
		</section>



		<!--===== WORK =====-->
		<section class="work section" id="work">
			<h2 class="section-title">Works</h2>
			

			<div class="work__container bd-grid">
				<div class="work__img">
					<a href="https://tomcatgsx.com/"><img src="assets/img/work1.jpg" alt=""></a>
				</div>
				<div class="work__img">
					<img src="assets/img/work2.jpg" alt="">
				</div>
				<div class="work__img">
					<img src="assets/img/work3.jpg" alt="">
				</div>
				<div class="work__img">
					<img src="assets/img/work4.jpg" alt="">
				</div>
				<div class="work__img">
					<img src="assets/img/work5.jpg" alt="">
				</div>
				<div class="work__img">
					<img src="assets/img/work6.jpg" alt="">
				</div>
			</div>
		</section>



		<!--===== HOBBY =====-->
		<section class="hobby section" id="hobby">
			<h2 class="section-title">Hobbies</h2>
			<div class="hobbies__container bd-grid">
				<div>
					<h2 class="hobbies__subtitle">My Hobby</h2>
					<p class="hobbies__text">アウトドアは、主にバイクでツーリングに行ったり、一眼を持っているので写真を撮ったりします。<br>インドアは、主にPCでFPS系のゲームをやったりNetflixで映画やドラマを見たりしています。</p>
					
					<!--===== hobby1 =====-->
					<div class="hobbies__data">
						<div class="hobbies__names">
							<img src="assets/img/icon1.png" class="hobbies__icon" alt="">
							<span class="hobbies__name">Touring</span>
						</div>
						<div>
							<span class="hobbies__percentage">90%</span>
						</div>

						<div class="hobbies__bar hobbies__tour"></div>
					</div>

					<!--===== hobby2 =====-->
					<div class="hobbies__data">
						<div class="hobbies__names">
							<img src="assets/img/icon2.png" class="hobbies__icon" alt="">
							<span class="hobbies__name">Photography</span>
						</div>
						<div>
							<span class="hobbies__percentage">80%</span>
						</div>
						
						<div class="hobbies__bar hobbies__photo"></div>
					</div>

					<!--===== hobby3 =====-->
					<div class="hobbies__data">
						<div class="hobbies__names">
							<img src="assets/img/icon3.png" class="hobbies__icon" alt="">
							<span class="hobbies__name">Game</span>
						</div>
						<div>
							<span class="hobbies__percentage">85%</span>
						</div>
						
						<div class="hobbies__bar hobbies__game"></div>
					</div>

					<!--===== hobby4 =====-->
					<div class="hobbies__data">
						<div class="hobbies__names">
							<img src="assets/img/icon4.png" class="hobbies__icon" alt="">
							<span class="hobbies__name">Movie</span>
						</div>
						<div>
							<span class="hobbies__percentage">40%</span>
						</div>
						
						<div class="hobbies__bar hobbies__movie"></div>
					</div>
				</div>

				<div>
					<img src="assets/img/hobby.jpg" alt="" class="hobbies__img">
				</div>
			</div>
		</section>



		<!--===== CONTACT =====-->
		<section class="contact section" id="contact">
			<h2 class="section-title">Contact</h2>

			<div class="contact__container bd-grid">
				<form action="" class="contact__form" method="POST" novalidate>
					
					<input type="text" name="name" placeholder="名前" class="contact__input" value="<?php echo htmlspecialchars($post['name']); ?>">
					<?php if($error['name'] === 'blank'): ?>
						<p class="error_msg">※お名前をご記入ください</p>
					<?php endif; ?>
					

					<input type="email" name="email" placeholder="メール" class="contact__input" value="<?php echo htmlspecialchars($post['email']); ?>">
					<?php if($error['email'] === 'blank'): ?>
						<p class="error_msg">※メールアドレスをご記入ください</p>
					<?php endif; ?>
					<?php if($error['email'] === 'email'): ?>
						<p class="error_msg">※メールアドレスを正しくご記入ください</p>
					<?php endif; ?>
					

					<textarea name="contents" rows="10" placeholder="お問い合わせ内容" class="contact__input"><?php echo htmlspecialchars($post['contents']); ?></textarea>
					<?php if($error['contents'] === 'blank'): ?>
						<p class="error_msg">※お問い合わせ内容をご記入ください</p>
					<?php endif; ?>


					<input type="submit" class="enter__button button" value="Enter">
				</form>
			</div>

		</section>
	</main>



	<!--===== FOOTER =====-->
	<footer class="footer">
		<p class="footer__title">Tomohiro</p>

		<div class="footer__social">
			<a href="https://www.instagram.com/tomop__o/" class="footer__icon"><i class='bx bxl-instagram' ></i></a>
			<a href="https://github.com/Hashimoto0141" class="footer__icon"><i class='bx bxl-github'></i></a>
		</div>
		<p>&#169; 2022 copylight all right reserved</p>
	</footer>


	<!--===== SCROLL REVEAL =====-->
	<script src="https://unpkg.com/scrollreveal"></script>

	<!--===== MAIN JS =====-->
	<script id="script" src="assets/js/main.js"></script>

</body>
</html>