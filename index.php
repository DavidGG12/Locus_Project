<!DOCTYPE html>
<html>
<head>
	<title>Menú Hamburguesa</title>
	<style>
		/* Estilo para el menú */
		nav {
			background-color: #333;
			overflow: hidden;
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			z-index: 1;
		}

		/* Estilo para los enlaces del menú */
		nav a {
			float: left;
			display: block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}

		/* Estilo para el botón de hamburguesa */
		.menu-icon {
			display: none;
			cursor: pointer;
			padding: 10px;
			position: absolute;
			top: 0;
			right: 0;
			background-color: #333;
			color: white;
			font-size: 18px;
		}

		/* Estilo para los enlaces del menú cuando el mouse está sobre ellos */
		nav a:hover {
			background-color: #ddd;
			color: black;
		}

		/* Estilo para el menú cuando se muestra en dispositivos móviles */
		@media screen and (max-width: 600px) {
			nav a:not(:first-child) {
				display: none;
			}

			nav a.menu-icon {
				display: block;
			}

			/* Estilo para los enlaces del menú cuando se muestra en dispositivos móviles */
			nav.responsive a {
				float: none;
				display: block;
				text-align: left;
			}
		}
	</style>
</head>
<body>

	<!-- Menú -->
	<nav>
		<a href="#">Inicio</a>
		<a href="#">Acerca de</a>
		<a href="#">Contacto</a>
		<a class="menu-icon" onclick="toggleMenu()">☰</a>
	</nav>

	<script>
		function toggleMenu() {
			var x = document.getElementsByTagName("nav")[0];
			if (x.className === "") {
				x.className = "responsive";
			} else {
				x.className = "";
			}
		}
	</script>

</body>
</html>
