<?php

/**********************************************
 *       order-process.php
 *       Skriptet hanterar formulärdata från
 *       order-form.php
 **********************************************/

// Om POST saknas, gå till startsidan 
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: index.php');
    exit;
}

/*
echo "<pre>";
print_r($_POST);
die();
*/

// Hämta och rensa data från POST
$film_id     = htmlspecialchars($_POST['film_id']);
$customer_id = htmlspecialchars($_POST['customer_id']);

// Kolla om kunden finns i databasen
require_once 'db.php';
$sql = "SELECT * FROM customers WHERE id=:id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $customer_id);
$stmt->execute();

//  Om kunden saknas, skapa ett felmeddelande
if ($stmt->rowCount() == 0) {
    $message = "
        <div class='alert alert-warning mx-5'>
        <p> OBS! Felaktigt kundnummer! </p>
		</div>";
} else {
    // Ja kunden finns i databasen. Hämta info om kunden.
    $customer = $stmt->fetch();
    $message = "
        <div class='alert alert-success mx-5'>
			<p>Tack $customer[name]</p>
        </div>";

    // TODO: (OBS! Kräver en epost-server)
    // Skicka bekräftelse via e-post till kunden
    // Skicka beställningen till butiken via e-post
    // Extra övning: Spara beställningen i databasen!

}

include_once 'header.php';
echo $message;
include_once 'footer.php';
