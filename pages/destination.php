<style>
  .image-item {
    width: 100%;
    height: auto;
    object-fit: cover;
  }

  .destination-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin: 8rem 4rem 2rem 4rem;
    border-radius: 1rem;
    overflow: hidden;
    /*shadow*/
    box-shadow: 0px 0.5rem 0.5rem rgba(0, 0, 0, 0.25);
    background-color: #fff;
  }

  h1 {
    text-align: left;
    font-size: 3rem;
    font-weight: bold;
    margin-top: 2rem;
    margin-bottom: 1rem;
  }

  h2 {
    text-align: left;
    font-size: 1.6rem;
    font-weight: bold;
    margin-top: 2rem;
    margin-bottom: 0.4rem;
  }
  .destination-description {
    display: block;
    text-align: left; font-size: 1.2rem; margin-bottom: 1rem;
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
  <div class="swiffy-slider slider-item-helper slider-nav-autoplay " data-slider-nav-autoplay-interval="4000"
    style="--swiffy-slider-item-reveal:10%;">
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

  <div style="padding: 2rem;">
  <span class="destination-description" >
    <?= $description ?></span><hr>
  <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom:2rem;">
    <h2>Información del Viaje</h2>
    <ul>
      <li>
        Salimos: <strong><?= date('d-m-Y', strtotime($departure)) ?>
        </strong> »
        Llegamos: <strong><?= date('d-m-Y', strtotime($arrival)) ?>
        </strong>
      </li>
      <li>Precio: <?= $price ?></li>
      <li>Precio Promocional: <?= $promo_price ?></li>
      <li>Tags: <?= $tags ?></li>
    </ul>
  </div>
  </div>

</section>