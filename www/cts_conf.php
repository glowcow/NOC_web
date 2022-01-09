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
											<p>Настроенные скриптом каналы на CTS</p>
										</header>
										<div class="table-wrapper">
										<table class="alt">
										<thead><tr><td>ID включения</td><td>Дата</td><td>IP</td><td>VLAN</td><td>EoIP</td><td>Описание</td><td>Token</td></tr></thead>
										<tbody>
										<?php
										$dbconn = pg_connect("host=176.213.132.105 dbname=pw_rings user=auto_script password=wnqJEyWkLVWuZj4p")
											or die('Не удалось соединиться: ' . pg_last_error());
										$query = 'SELECT * FROM cts_token OFFSET (SELECT CASE WHEN count(*)>300 THEN count(*)-300 END FROM cts_token)';
										$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
										while ($row = pg_fetch_assoc($result)) {
											printf("<tr><td><b>%s</b></td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>\n", $row["id"], $row["date"], $row["ip"], $row["vlan"], $row["eoip"], $row["descr"], $row["token"]);
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
