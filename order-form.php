<?php

/**********************************************
 *       order-form.php
 *       Skriptet hanterar en GET-request
 *       och visar ett beställningsformulär
 **********************************************/

// Om id saknas i URLen, gå till startsidan 
if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
    // Make sure that code below does not get executed when we redirect. 
    // http://php.net/manual/en/function.header.php
}

// Infoga sidhuvud (header.php)
include_once 'header.php';

// Sök filmen i databasen med hjälp av dess id
// OBS! Vi måste rensa id för bättre säkerhet
$id = htmlspecialchars($_GET['id']);
require_once 'db.php';
$sql  = "SELECT * FROM films WHERE id=:id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

// Hämta info om filmen
$film  = $stmt->fetch();
/*
echo "<pre>";
print_r($film);
die;
*/
$title = $film['title'];
$price = $film['price'];

?>

<h2 class="text-center">Beställningsformulär</h2>
<h3 class="text-center">
<?php echo $title; ?>
<br>
Pris: 
<?php echo $price; ?>
kr</h3>

<form action="order-process.php" method="post" class="row">
    <div class="col-md-2"></div>
    <div class="col-md-4">
        <input type="number" name="customer_id" required class="col-6 form-control my-2" placeholder="Ange ditt kundnummer">
    </div>
    <div class="col-md-4">
        <input type="submit" class="col-6 form-control my-2 btn btn-outline-success" value="Skicka beställningen">
    </div>
    <div class="col-md-2"></div>
    <input type="hidden" name="film_id" value="<?php echo $id ?>">
</form>

<?php
require_once 'footer.php';