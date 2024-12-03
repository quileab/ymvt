<style>
  .image-item {
    width: 100%;
    height: auto;
    object-fit: cover;
  }

  .destination-container {
    display: flex;
    overflow: auto;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin: 8rem 2rem 2rem 2rem;
    border-radius: 1rem;
    /*shadow*/
    box-shadow: 0px 0.5rem 0.5rem rgba(0, 0, 0, 0.25);
    background-color: #fff;
  }

  h1 {
    text-align: left;
    font-size: calc(1.2rem + (2 - 1) * ((100vw - 20rem) / (48 - 20)));
    font-weight: bold;
    margin-top: 2rem;
    margin-bottom: 1rem;
    line-height: 0.7;
  }

  h2 {
    text-align: left;
    font-size: calc(1rem + (2 - 1) * ((100vw - 20rem) / (48 - 20)));
    font-weight: bold;
    margin-top: 2rem;
    margin-bottom: 0.4rem;
  }
  .destination-description {
    display: block;
    width: 100%;
    text-align: left; 
    font-size: calc(1rem + (2 - 1) * ((100vw - 20rem) / (48 - 20)));
    font-size-adjust: 0.5;
    margin-bottom: 1rem;
    overflow: auto;
    text-wrap: wrap;
  }
</style>

<?php // destination details and carousel
require_once 'app/conn.php';
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT destination, description, departure, arrival, price, promo_price, tags FROM destinations WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($destination, $description, $departure, $arrival, $price, $promo_price, $tags);
$stmt->fetch();
$stmt->close();
// load images
$images = [];
$imageDir = "./uploads/destinations";
$imagePattern = sprintf('%d-*.jpg', $id); // Formato {id}-00n.jpg
$images = glob("$imageDir/$imagePattern"); // Buscar imágenes que coincidan con el patrón
?>
<section id="destination" class="destination-container">
  <h1><?= $destination ?></h1>
  <div class="swiffy-slider slider-item-helper slider-nav-autoplay " data-slider-nav-autoplay-interval="4000">
    <!--style="--swiffy-slider-item-reveal:10%;"-->
    <ul class="slider-container">
      <?php foreach ($images as $image) { 
        if($image == "./uploads/destinations/$id-featured.jpg") {
          continue;
        }
        ?>
      <li><img class="image-item" src="<?= $image ?>" alt="<?= $image ?>" /></li>
      <?php } ?>
    </ul>

    <button type="button" class="slider-nav"></button>
    <button type="button" class="slider-nav slider-nav-next"></button>

    <div class="slider-indicators">
      <?php foreach ($images as $image) { 
        if($image == "./uploads/destinations/$id-featured.jpg") {
          continue;
        }
        ?>
      <button></button>
      <?php } ?>
    </div>
  </div>

  <div style="padding: calc(1rem + (2 - 1) * ((100vw - 20rem) / (48 - 20))); width: 100%;">
  <span class="destination-description" >
    <?= $description ?></span><hr>
  <div style="margin-bottom:2rem;">
    <h2>Información del Viaje</h2>
    <ul>
      <li>
        Salimos: <strong><?= date('d-m-Y', strtotime($departure)) ?>
        </strong> »
        Llegamos: <strong><?= date('d-m-Y', strtotime($arrival)) ?>
        </strong>
      </li>
      <li>Precio: <strong><?= $price ?></strong></li>
      <li>Precio Promocional: <strong><?= $promo_price ?></strong></li>
      <li>Tags: <strong><?= $tags ?></strong></li>
    </ul>
  </div>
  </div>

</section>