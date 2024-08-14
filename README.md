<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<h1>Torneo de Tenis</h1>

<p>Este proyecto implementa un sistema para simular torneos de tenis utilizando Laravel 10. Los jugadores pueden participar en torneos masculinos o femeninos, y el sistema selecciona un ganador basado en una combinación de azar, nivel de habilidad, fuerza, velocidad, y tiempo de reacción.</p>

<h2>Requisitos Previos</h2>
<ul>
    <li>PHP 8.1 o superior</li>
    <li>Composer</li>
    <li>SQLite (o cualquier otra base de datos configurada)</li>
    <li>Node.js (para compilar assets si es necesario)</li>
    <li>Git</li>
</ul>

<h2>Instalación</h2>
<ol>
    <li><strong>Clonar el repositorio:</strong>
        <pre><code>git clone https://github.com/alanleonelfernandez/torneotenis.git
cd torneotenis
        </code></pre>
    </li>
    <li><strong>Instalar dependencias de PHP:</strong>
        <pre><code>composer install
        </code></pre>
    </li>
    <li><strong>Configurar las variables de entorno:</strong>
        <p>Copia el archivo <code>.env.example</code> a <code>.env</code>:</p>
        <pre><code>cp .env.example .env
        </code></pre>
        <p>Luego, genera una clave de aplicación:</p>
        <pre><code>php artisan key:generate
        </code></pre>
    </li>
    <li><strong>Configurar la base de datos:</strong>
        <p>En el archivo <code>.env</code>, configura la conexión a la base de datos. Si usas SQLite, puedes simplemente crear un archivo de base de datos:</p>
        <pre><code>touch database/database.sqlite
        </code></pre>
        <p>Luego, corre las migraciones y los seeders:</p>
        <pre><code>php artisan migrate --seed
        </code></pre>
        <p>Esto llenará la base de datos con 16 jugadores predefinidos.</p>
        <p>En caso de tener problemas de conexion de base de datos, podemos optar por configurar la ruta de database.sqlite manualmente en el .env. Por ejemplo:</p>
        <pre><code>DB_CONNECTION=sqlite
DB_DATABASE={ruta local hacia el proyecto}/torneotenis/database/database.sqlite
        </code></pre>
    </li>
    <li><strong>Compilar assets (si aplica):</strong>
        <pre><code>npm install && npm run dev
        </code></pre>
    </li>
    <li><strong>Iniciar el servidor:</strong>
        <pre><code>php artisan serve
        </code></pre>
        <p>La aplicación estará disponible en <a href="http://localhost:8000">http://localhost:8000</a>.(puede variar segun configuracion local)</p>
    </li>
</ol>

<h2>Uso</h2>

<h3>Rutas de la API</h3>
<ul>
    <li><strong>Simular Torneo Masculino:</strong>
        <pre><code>GET /api/simular-torneo-masculino
        </code></pre>
    </li>
    <li><strong>Simular Torneo Femenino:</strong>
        <pre><code>GET /api/simular-torneo-femenino
        </code></pre>
    </li>
    <li><strong>Listar Jugadores:</strong>
        <pre><code>GET /api/jugadores
        </code></pre>
    </li>
    <li><strong>Ver Historial de Torneos:</strong>
        <pre><code>GET /api/historial-torneos
        </code></pre>
    </li>
</ul>

<h3>Documentación de la API</h3>
<p>La API está documentada usando Swagger. Puedes generar la documentación utilizando el siguiente comando:</p>
<pre><code>php artisan l5-swagger:generate
</code></pre>
<p>La documentación estará disponible en <a href="http://localhost:8000/api/documentation">http://localhost:8000/api/documentation</a>.</p>

<h3>Agregar Jugadores desde la Consola</h3>
<p>Puedes agregar jugadores directamente desde la consola utilizando Tinker. Ejemplo:</p>
<pre><code>php artisan tinker
</code></pre>
<p>En el entorno interactivo de Tinker:</p>
<pre><code>$jugador = new App\Models\Jugador;
$jugador->nombre = 'Nuevo Jugador';
$jugador->nivel_habilidad = 75;
$jugador->genero = 'Masculino';
$jugador->fuerza = 80;
$jugador->velocidad = 70;
$jugador->tiempo_reaccion = 65;
$jugador->save();
</code></pre>

</body>
</html>
