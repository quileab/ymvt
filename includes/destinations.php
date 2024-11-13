<?php
require_once 'app/conn.php';

$query = "
SELECT 
    d.id,
    d.destination AS Destination,
    d.description AS Description,
    d.price AS Price,
    d.promo_price AS PriceOld,
    d.departure AS DateFrom,
    d.arrival AS DateTo,
    CONCAT('/uploads/destinations/', d.id, '-001.jpg') AS Hero
FROM 
    destinations d
ORDER BY 
    d.departure ASC
LIMIT 10
";

$result = $conn->query($query);

$popularDestinations = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $popularDestinations[] = $row;
    }
}
?>
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