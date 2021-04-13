<?php

/**********************************************
 *       show-movies.php
 *       Skriptet visar alla filmer  
 *       i en Bootstrap-grid
 **********************************************/

// Hämta alla filmer
require_once 'db.php';
$stmt = $db->prepare("SELECT * FROM films");
$stmt->execute();
$films = $stmt->fetchAll();

/*
echo "<pre>";
print_r($films);
die();
*/

// Iterera över alla filmer
foreach ($films as $film) :

  // Hämta data om varje film
  $id    = $film['id'];
  $title = $film['title'];
  $price = $film['price'];
  $image = $film['image'];

  // Hämta src till en bild från mappen images
  if (empty($image)) $image = "images/no-poster.png";
  else $image = "images/$image";

?>
  <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 col-xxl-2">
    <!-- Skapa en GET-Länk till en beställningssida (skicka id) t.ex. order-form.php?id=1 -->
    <a href="order-form.php?id=<?php echo $id ?>">
      <div class="card m-1">
        <img class="card-img-top" src="<?php echo $image  ?>" alt="<?php echo $title; ?>">
        <div class="card-body">
          <h4 class="card-title text-center">
            <?php echo "$title <br>$price kr"; ?>
          </h4>
        </div>
      </div>
    </a>
  </div>

<?php
  endforeach;
?>