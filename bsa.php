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
											<p>Подробная информация о BSA/MKU </p>
										</header>
										<div class="table-wrapper">
										<table class="alt">
										<thead><tr><td>Номер</td><td>IP Base</td><td>IP VPRN 100</td><td>IP VPRN 140</td><td>IP r1.BS | AN</td><td>Расположение</td></tr></thead>
										<tbody>
										<?php
										$dbconn = pg_connect("host=localhost dbname=pw_rings user=auto_script password=wnqJEyWkLVWuZj4p")
											or die('Не удалось соединиться: ' . pg_last_error());
										$query = 'SELECT * FROM bsa ORDER BY id ASC';
										$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
										while ($row = pg_fetch_assoc($result)) {
											printf("<tr><td><b>%s</b></td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>\n", $row[bsa], $row[ip_base], $row[ip_vprn100], $row[ip_vprn140], $row[arp_r1_bs], $row[location]);
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
									<p class="copyright">&copy; 2021. ЭР-Телеком Москва. </a></p>
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
