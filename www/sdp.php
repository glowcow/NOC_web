<!DOCTYPE HTML>
<html>
	<head>
		<title>ГУТС Инфо</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
									<a href="index.php" class="logo">ГУТС Инфо</a>
									</ul>
								</header>

							<!-- Content -->
								<section>
										<header>
											<p>Информация о парах MKU</p>
										</header>
										<h4>Таблица пар MKU</h4>
										<div class="table-wrapper">
										<table class="alt">
										<thead><tr><td>Номер пары MKU (SDP)</td><td>Основная MKU</td><td>Резервная MKU</td><td>Комментарий</td><td>Дата создания</td></tr></thead>
										<tbody>
										<?php
										$db_host = getenv('DB_HOST');
										$db_name = getenv('DB_NAME');
										$db_user = getenv('DB_USER');
										$db_passw = getenv('DB_PASSW');
										$dbconn = pg_connect("host=$db_host dbname=$db_name user=$db_user password=$db_passw")
											or die('Не удалось соединиться: ' . pg_last_error());
										$query = 'SELECT * FROM mku_ring ORDER BY mku_ring ASC';
										$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
										while ($row = pg_fetch_assoc($result)) {
											printf("<tr><td><b>SDP-5%s</b></td><td>MKU-%s</td><td>MKU-%s</td><td>%s</td><td>%s</td></tr>\n", $row["mku_ring"],  $row["active_mku"], $row["backup_mku"], $row["comment"], $row["date"]);
										}
										pg_free_result($result);
										pg_close($dbconn);
										?>
										</tbody>
										</table>
										</div>
								</section>

						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">

							<!-- Menu -->
								<nav id="menu">
									<header class="major">
										<h2>Меню</h2>
									</header>
									<ul>
										<li><a href="index.php">Главная</a></li>
										<li><a href="pw.php">PW-Полукольца Радио</a></li>
										<li><a href="pwg.php">PW-Полукольца ГУТС</a></li>
										<li><a href="sdp.php">Пары MKU</a></li>
										<li><a href="bsa.php">BSA/MKU</a></li>
										<li>
											<span class="opener">Автоконфигуратор</span>
											<ul>
											<li><a href="l2vpn.php">L2VPN</a></li>
											<li><a href="cts_conf.php">CTS</a></li>
											</ul>
										</li>
									</ul>
								</nav>

							<!-- Footer -->
								<footer id="footer">
									<p class="copyright">&copy; 2022 | ЭР-Телеком, Москва. </a></p>
								</footer>

						</div>
					</div>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
