<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCH SW - Software de Kiosco y Control de Stock</title>
    <style>
        /* Reset y estilos generales */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        header {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
        }
        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #6b46c1;
        }
        .nav-links a {
            margin-left: 1rem;
            text-decoration: none;
            color: #333;
        }
        .nav-links a:hover {
            color: #6b46c1;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(45deg, #6b46c1, #3b82f6);
            color: #fff;
            padding: 4rem 0;
            text-align: center;
        }
        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }
        .btn {
            display: inline-block;
            padding: 0.8rem 1.5rem;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        .btn-primary {
            background-color: #fff;
            color: #6b46c1;
        }
        .btn-secondary {
            background-color: transparent;
            color: #fff;
            border: 2px solid #fff;
            margin-left: 1rem;
        }
        .btn-primary:hover {
            background-color: #f0f0f0;
        }
        .btn-secondary:hover {
            background-color: rgba(255,255,255,0.1);
        }

        /* Features Section */
        .features {
            padding: 4rem 0;
            background-color: #f8f9fa;
        }
        .features h2 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 2rem;
            color: #6b46c1;
        }
        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }
        .feature-item {
            text-align: center;
            padding: 1.5rem;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .feature-icon {
            font-size: 2.5rem;
            color: #6b46c1;
            margin-bottom: 1rem;
        }

        /* Benefits Section */
        .benefits {
            padding: 4rem 0;
        }
        .benefits h2 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 2rem;
            color: #6b46c1;
        }
        .benefit-list {
            list-style-type: none;
        }
        .benefit-item {
            margin-bottom: 1rem;
            padding-left: 2rem;
            position: relative;
        }
        .benefit-item::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: #6b46c1;
            font-weight: bold;
        }

        /* Contact Section */
        .contact {
            background: linear-gradient(45deg, #6b46c1, #3b82f6);
            color: #fff;
            padding: 4rem 0;
            text-align: center;
        }
        .contact h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }
        .contact form {
            max-width: 500px;
            margin: 0 auto;
        }
        .contact input {
            width: 100%;
            padding: 0.8rem;
            margin-bottom: 1rem;
            border: none;
            border-radius: 5px;
        }
        .contact button {
            width: 100%;
            padding: 0.8rem;
            background-color: #fff;
            color: #6b46c1;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        .contact button:hover {
            background-color: #f0f0f0;
        }

        /* Footer */
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1rem 0;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2rem;
            }
            .hero p {
                font-size: 1rem;
            }
            .btn {
                display: block;
                margin-bottom: 1rem;
            }
            .btn-secondary {
                margin-left: 0;
            }
            .feature-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <header>
        <nav class="container">
            <div class="logo"><img src="logo.svg" alt=""></div>
            <div class="nav-links">
                <a href="#features">Características</a>
                <a href="#benefits">Beneficios</a>
                <a href="#contact">Contacto</a>
            </div>
        </nav>
    </header>

    <main>
        <section class="hero">
            <div class="container">
                <h1>Revoluciona tu Negocio</h1>
                <p>Software integral para kioscos y control de inventario. Potencia tu eficiencia y maximiza tus ganancias.</p>
                <a href="#" class="btn btn-primary">Prueba Gratis</a>
                <a href="#" class="btn btn-secondary">Ver Demo</a>
            </div>
        </section>

        <section id="features" class="features">
            <div class="container">
                <h2>Características Principales</h2>
                <div class="feature-grid">
                    <?php
                    $features = [
                        ['icon' => '🛒', 'title' => 'Gestión de Ventas', 'description' => 'Procesa transacciones rápidamente y mantén un registro detallado de todas las ventas.'],
                        ['icon' => '📊', 'title' => 'Control de Inventario', 'description' => 'Gestiona tu stock en tiempo real, con alertas automáticas y reportes detallados.'],
                        ['icon' => '🌐', 'title' => 'Acceso en la Nube', 'description' => 'Accede a tu información desde cualquier lugar y en cualquier momento.'],
                        ['icon' => '📱', 'title' => 'Diseño Responsivo', 'description' => 'Interfaz adaptable a cualquier dispositivo, ya sea ordenador, tablet o smartphone.'],
                        ['icon' => '👥', 'title' => 'Multi-Usuario', 'description' => 'Sistema con diferentes niveles de acceso para una gestión eficiente y segura.'],
                        ['icon' => '✅', 'title' => 'Fácil de Usar', 'description' => 'Interfaz intuitiva que no requiere conocimientos técnicos avanzados.']
                    ];

                    foreach ($features as $feature) {
                        echo "<div class='feature-item'>";
                        echo "<div class='feature-icon'>{$feature['icon']}</div>";
                        echo "<h3>{$feature['title']}</h3>";
                        echo "<p>{$feature['description']}</p>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
        </section>

        <section id="benefits" class="benefits">
            <div class="container">
                <h2>Beneficios para tu Negocio</h2>
                <ul class="benefit-list">
                    <?php
                    $benefits = [
                        "Aumenta la eficiencia operativa",
                        "Reduce errores en inventario",
                        "Mejora la experiencia del cliente",
                        "Toma decisiones basadas en datos",
                        "Ahorra tiempo en tareas administrativas",
                        "Escala tu negocio con facilidad"
                    ];

                    foreach ($benefits as $benefit) {
                        echo "<li class='benefit-item'>$benefit</li>";
                    }
                    ?>
                </ul>
            </div>
        </section>

        <section id="contact" class="contact">
            <div class="container">
                <h2>¿Listo para Transformar tu Negocio?</h2>
                <p>Contáctanos hoy para una demostración gratuita y descubre cómo SCH SW puede impulsar tu éxito.</p>
                <form action="procesar_formulario.php" method="POST">
                    <input type="text" name="nombre" placeholder="Tu nombre" required>
                    <input type="email" name="email" placeholder="Tu email" required>
                    <button type="submit">Solicitar Demo</button>
                </form>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2024 SCH SW. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>