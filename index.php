<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script defer src="https://cdn.tailwindcss.com"></script>
  <script defer src="./js/main.js"></script>
  <link rel="stylesheet" href="styles/styles.css">
  <title>YerbaMate Viajes y Turismo</title>
</head>

<body class="mx-4 md:mx-0">
  <nav class="bg-opacity-90 bg-green-900 fixed py-1 w-full z-20 top-0 left-0">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto mx-2">
      <a href="/" class="flex items-center">
        <img id="headerImg" src="images/ymvt.webp" class="transition-all duration-300 h-20 ml-3 mr-3" alt="YerbaMate">
        <span class="self-center text-3xl whitespace-nowrap text-white">
          <h1>YerbaMate</h1>
        </span>
      </a>
      <div class="flex md:order-2">
        <!-- button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Get started
      </button -->
        <button id="navbar-toggle" data-collapse-toggle="navbar-sticky" type="button"
          class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
          aria-controls="navbar-sticky" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M1 1h15M1 7h15M1 13h15" />
          </svg>
        </button>
      </div>
      <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
        <ul class="flex flex-col text-2xl md:text-base md:flex-row md:space-x-8 md:mt-0">
          <li class="md:py-3 py-5">
            <a href="#" class="p-3 text-white hover:bg-opacity-70 hover:bg-green-900 transition hover:duration-300">
              Home</a>
          </li>
          <li class="md:py-3 py-5">
            <a href="#" class="p-3 text-white hover:bg-opacity-70 hover:bg-green-900 transition hover:duration-300">
              Nosotros</a>
          </li>
          <li class="md:py-3 py-5">
            <a href="#" class="p-3 text-white hover:bg-opacity-70 hover:bg-green-900 transition hover:duration-300">
              Destinos</a>
          </li>
          <li class="md:py-3 py-5">
            <a href="#contacts"
              class="p-3 text-white hover:bg-opacity-70 hover:bg-green-900 transition hover:duration-300">
              Contactos</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section id="hero-section" class="mt-20">
    <img src="images/header.webp" class="w-full">
  </section>

  <?php
$popularDestinations=[
  "YM-0000"=> [
    "Hero"=> "https://www.argentina.gob.ar/sites/default/files/corrientes-pora-2.jpg",
  "Destination"=> "Corrientes",
  "Province"=> "Corrientes",
  "PriceOld"=> "$ 0,00",
  "Price"=> "$ 0,00",
  "DateFrom"=> "01-01-2023",
  "DateTo"=> "01-01-2023",
  "Description"=> "El clima predominante es subtropical sin estación seca, con precipitaciones abundantes y temperaturas elevadas de escasas variaciones diarias y estacionales, sobre todo en el NO. El sur provincial presenta un clima más asociado al templado pampeano."
  ],
  "YM-0001"=> [
    "Hero"=> "https://www.argentina.gob.ar/sites/default/files/cataratas_2.jpg",
  "Destination"=> "Cataratas",
  "Province"=> "Misiones",
  "PriceOld"=> "$ 0,00",
  "Price"=> "$ 0,00",
  "DateFrom"=> "01-01-2023",
  "DateTo"=> "01-01-2023",
  "Description"=> "La conformación de nuestra sociedad ha sido fruto de un largo y enriquecedor proceso de construcción sociocultural, debido al entrecruzamiento de guaraníes, jesuitas, inmigrantes y criollos, lo que dio forma a lo que es hoy un pueblo respetuoso de la diversidad y pluralidad."
  ],
  "YM-0002"=> [
    "Hero"=> "https://www.argentina.gob.ar/sites/default/files/jujuy_13.jpg",
    "Destination"=> "San Salvador de Jujuy",
    "Province"=> "Jujuy",
    "PriceOld"=> "$ 0,00",
    "Price"=> "$ 0,00",
    "DateFrom"=> "01-01-2023",
    "DateTo"=> "01-01-2023",
    "Description"=> "Este valle y sus aldeas quechuas se ubican en el norte de la capital provincial y el acceso regional, San Salvador de Jujuy. En el sur del valle, las laderas rocosas del icónico Cerro de los Siete Colores sobresalen de la villa colonial Purmamarca."
    ],
  
  ];

?>

  <section id="legal" class="container my-6 mx-auto">
    <h2 class="text-3xl mb-6 font-bold">Legales</h2>
    <div class="grid md:grid-cols-3 gap-4 grid-cols-1 place-content-center">
      <a href="https://www.argentina.gob.ar/servicio/presentar-una-denuncia-contra-una-agencia-de-viajes"
        target="_blank"
        class="text-center w-full bg-green-700 hover:bg-green-800 text-gray-100 font-semibold hover:text-white py-2 px-4 rounded">
        <img class="w-[70%] mx-auto"
          src="https://www.argentina.gob.ar/profiles/argentinagobar/themes/argentinagobar/argentinagobar_theme/logo_argentina-blanco.svg">
        Denuncia contra una Agencia
      </a>
      <a href="./documents/PROVIDENCIA PREMISO PRECARIO PV-2023-77830349-APN-DRAV-MTYD RENOVACION PRECARIO.pdf"
        target="_blank"
        class="text-center w-full bg-green-700 hover:bg-green-800 text-gray-100 font-semibold hover:text-white py-2 px-4 rounded">
        <small>Providencia de Permiso Precario</small><br />PV-2023-77830349-APN-DRAV#MTYD
      </a>
      <a href="#contacts"
        class="text-center w-full bg-green-700 hover:bg-green-800 text-gray-100 font-semibold hover:text-white py-2 px-4 rounded">
        <small>Razón Social</small><br />FABIOLA GRISELL PITTANA
      </a>
    </div>
  </section>
  <section id="trip-cards" class="container my-6 mx-auto">
    <h2 class="text-3xl mb-6 font-bold">Destinos Populares</h2>
    <div class="grid md:grid-cols-3 gap-4 grid-cols-1">
      <?php foreach ($popularDestinations as $key => $value) : ?>
      <!-- Card -->
      <div class="w-full rounded overflow-hidden shadow-lg bg-gray-100">
        <!--img class="w-full" src="https://source.unsplash.com/600x400/?nature" /-->
        <img class="w-full aspect-video" src="<?= $value["Hero"] ?>" />
        <div class="px-4 py-3">
          <div class="font-bold text-base mb-2">
            <?= $value["Destination"] ?>
            <span class="text-gray-400 text-xs font-light">» <?= $value["Province"] ?></span>
          </div>
          <div class="grid md:grid-cols-2 gap-2 grid-cols-1 text-center text-2xl md:text-base">
            <del><small><?= $value["PriceOld"]?></small></del>
            <strong>🏷️<?= $value["Price"]?></strong>
            <p class="font-light"><small>🛫 <?= $value["DateFrom"]?></small></p>
            <p class="font-light"><small>🛬 <?= $value["DateTo"]?></small></p>
          </div>

          <hr class="my-2" />
          <p class="text-gray-900 text-2xl md:text-base">
            <small><?= $value["Description"] ?></small>
          </p>
          <button class="mt-4 w-full text-base md:text-xs bg-green-700 hover:bg-green-800 text-gray-100 shover:text-white py-2 px-4 rounded">
            INFORMACIÓN
          </button>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

  </section>
  <section id="contacts" class="w-full bg-green-700 text-white px-10 py-4">
    <h2 class="text-3xl mb-6 font-bold">Contactos</h2>
    <?php $svgClass="w-10 h-10 mr-1 text-white"; ?>
    <div class="grid md:grid-cols-5 gap-2 grid-cols-1">
      <div id="social" class="border-r-2">
        <a class="flex p-1 hover:text-yellow-100 hover:bg-green-600 rounded transition-all transition-duration: 300ms"
          href="https://www.facebook.com/profile.php?id=100090200229296&mibextid=ZbWKwL" target="_blank">
          <?php include"./images/social/icons8-facebook.svg"; ?> facebook
        </a>
        <a class="flex p-1 hover:text-yellow-100 hover:bg-green-600 rounded transition-all transition-duration: 300ms"
          href="https://instagram.com/yerbamateviajesyturismo?igshid=NzZlODBkYWE4Ng==" target="_blank">
          <?php include"./images/social/icons8-instagram.svg"; ?> instagram
        </a>
        <a class="flex p-1 hover:text-yellow-100 hover:bg-green-600 rounded transition-all transition-duration: 300ms"
          href="https://www.tiktok.com/@yerbamateviajesyturismo?_t=8gtRIijsjqP&_r=1" target="_blank">
          <?php include"./images/social/icons8-tik-tok.svg"; ?> tiktok
        </a>
      </div>
      <!-- PERSONAL CONTACT -->
      <div id="personal" class="border-r-2 md:col-span-2">
        <a class="flex flex-wrap p-1 hover:text-yellow-100 hover:bg-green-600 rounded transition-all transition-duration: 300ms"
          href="https://wa.me/5493764526072" target="_blank">
          <?php include"./images/social/icons8-whatsapp.svg"; ?> +54 9 3764 526072
        </a>
        <a class="flex flex-wrap p-1 hover:text-yellow-100 hover:bg-green-600 rounded transition-all transition-duration: 300ms"
          href="tel:+5493764526072" target="_blank">
          <?php include"./images/social/icons8-phone.svg"; ?> +54 9 3764 526072
        </a>
        <a class="flex flex-wrap p-1 hover:text-yellow-100 hover:bg-green-600 rounded transition-all transition-duration: 300ms"
          href="mailto:yerbamateviajesyturismo@gmail.com" target="_blank">
          <?php include"./images/social/email-svgrepo-com.svg"; ?> yerbamateviajesyturismo@gmail.com
        </a>
        <button data-filename="reclamos-sugerencias.html"
          class="openDialog flex w-full hover:bg-green-600 text-gray-100 font-semibold hover:text-white py-2 px-1 rounded">
        <?php include"./images/svg/chat-circle-dots.svg"; ?><span class="pt-2 mr-1">RECLAMOS o SUGERENCIAS</span>
        </button>
      </div>
      <!-- CONTACT FORM -->
      <div id="contact-form" class="md:col-span-2 mx-2">
        <p class="font-bold text-lg">Consultas</p>
        <form action="/" method="post">
          <div class="mb-3">
            <input type="text" class="form-control w-full rounded px-3 py-2 text-gray-900" id="apellido-nombre"
              name="apellido-nombre" placeholder="Tu nombre completo">
          </div>
          <div class="mb-3">
            <input type="email" class="form-control w-full rounded px-3 py-2 text-gray-900" id="email" name="email"
              placeholder="Tu correo electrónico">
          </div>
          <div class="mb-1">
            <textarea class="form-control w-full rounded px-2 py-1 text-gray-900" id="consulta" name="consulta"
              placeholder="Tu consulta"></textarea>
          </div>
          <button type="submit"
            class="btn w-full text-base md:text-xs bg-green-800 hover:bg-green-600 text-gray-100 hover:font-bold py-2 px-4 rounded">
            ENVIAR</button>
        </form>
      </div>
    </div>
  </section>

  <dialog class="modal animate-this" id="customDialog">
    <p class="float-right flex">
      <button id="closeDialog" class="closeDialog bg-red-700 px-3 py-2"> 
        <?php include"./images/svg/x.svg"; ?>
      </button>
    </p>
    <h2 class="ml-6 mt-4 text-2xl font-bold">Reclamos y Sugerencias</h2>
    <div id="docLinks">
      <!-- Put Your Content Here -->
    </div>
  </dialog>
</body>

</html>