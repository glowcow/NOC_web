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
											<p>Информация об активной и резервной BSA в полукольце</p>
										</header>
										<div class="box">
											<p>
											<font color='green'>Зеленым</font> - отмечены доступные по SNMP BSA<br>
											<font color='red'>Красным</font> - отмечены недоступные по SNMP BSA<br>
											Опрос производится раз в 10 минут.
											</p>
										</div>
										 	<h4>Суммарная информация о BSA</h4>
											<div class="row">
												<div>
														<ul>
														<?php
														$dbconn = pg_connect("host=176.213.132.105 dbname=pw_rings user=auto_script password=wnqJEyWkLVWuZj4p")
															or die('Не удалось соединиться: ' . pg_last_error());
														$query = 'SELECT * FROM bsa_poller_stat ORDER BY id DESC LIMIT 1';
														$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
														while ($row = pg_fetch_assoc($result)) {
															printf("<li>Всего / Доступных / Недоступных: %s / <font color=green>%s</font> / <font color=red>%s</font></li><li>Список недоступных BSA: %s </li><li>Дата последней проверки: %s </li>\n", $row["bsa_cnt"], $row["up_cnt"], $row["down_cnt"], $row["bsa_down"], $row["date"]);
														}
														pg_free_result($result);
														pg_close($dbconn);
														?>
														</ul>
												</div>
											</div>
										<h4>Таблица полуколец</h4>
										<div class="table-wrapper">
										<table class="alt">
										<thead><tr><td>Номер полукольца PW</td><td>Основная BSA / Тип</td><td>Резервная BSA / Тип</td><td>Комментарий</td></tr></thead>
										<tbody>
										<?php
										$dbconn = pg_connect("host=176.213.132.105 dbname=pw_rings user=auto_script password=wnqJEyWkLVWuZj4p")
											or die('Не удалось соединиться: ' . pg_last_error());
										$query = 'SELECT * FROM rings ORDER BY pw_ring ASC';
										$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());
										while ($row = pg_fetch_assoc($result)) {
											printf("<tr><td><b>PW-%s</b></td><td><font color=%s>BSA-%s / %s</font></td><td><font color=%s>BSA-%s / %s</font></td><td>%s</td></tr>\n", $row["pw_ring"], $row["act_state"], $row["active_bsa"], $row["active_type"], $row["bkp_state"], $row["backup_bsa"], $row["backup_type"], $row["comment"]);
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
