<?php

require_once 'includes/header.php';

// get toy id from URL
$toy_id = $_GET['toynum'] ?? null;

/*
 * Get toy + manufacturer info
 */

function get_toy(PDO $pdo, string $id) {
    $sql = "
        SELECT 
            toy.*,
            manuf.name AS man_name,
            manuf.street,
            manuf.city,
            manuf.state,
            manuf.zip,
            manuf.phone,
            manuf.contact
        FROM toy
        JOIN manuf ON toy.manID = manuf.manID
        WHERE toy.toyID = :id;
    ";

    return pdo($pdo, $sql, ['id' => $id])->fetch();
}

$toy = get_toy($pdo, $toy_id);
?>

<section class="toy-details-page container">
    <div class="toy-details-container">
        <div class="toy-image">

            <img src="<?= $toy['img_src'] ?>" alt="<?= $toy['name'] ?>">

        </div>

        <div class="toy-details">

            <h1><?= $toy['name'] ?></h1>

            <h3>Toy Information</h3>

            <p><strong>Description:</strong> <?= $toy['description'] ?></p>

            <p><strong>Price:</strong> $<?= $toy['price'] ?></p>

            <p><strong>Age Range:</strong> <?= $toy['age_range'] ?></p>

            <p><strong>Number In Stock:</strong> <?= $toy['in_stock'] ?></p>

            <br />

            <h3>Manufacturer Information</h3>

            <p><strong>Name:</strong> <?= $toy['man_name'] ?></p>

            <p><strong>Address:</strong>
                <?= $toy['street'] ?>,
                <?= $toy['city'] ?>,
                <?= $toy['state'] ?>
                <?= $toy['zip'] ?>
            </p>

            <p><strong>Phone:</strong> <?= $toy['phone'] ?></p>

            <p><strong>Contact:</strong> <?= $toy['contact'] ?></p>

        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>