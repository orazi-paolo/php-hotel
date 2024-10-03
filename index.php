<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-hotel</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header class="container text-center mb-3">
        <h1 class="fw-bold p-4">
            Php Hotel
        </h1>
        <!-- faccio una chiamata get sulla stessa pagina -->
        <form method="GET">
            <label for="parking">Mostra solo hotel con parcheggio:</label>
            <!-- controllo se parking c'è se c'è lascio il checked -->
            <input type="checkbox" id="parking" name="parking" class="me-3"
                <?php if (isset($_GET['parking'])) echo 'checked'; ?>>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>
    </header>
    <main class="container">
        <!-- se nella chiamata c'è parking -->
        <?php if (isset($_GET['parking'])) {
            // funzione globale array_filter che restituisce i singoli hotel con il parcheggio
            $hotels = array_filter($hotels, function ($hotel) {
                return $hotel['parking'] === true;
            });
        }
        ?>
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Parking</th>
                    <th scope="col">Vote</th>
                    <th scope="col">Distance to center</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($hotels as $hotel) { ?>
                    <tr>
                        <th scope="row"><?php echo $hotel['name'] ?></th>
                        <td> <?php echo $hotel['description'] ?></td>
                        <td> <?php echo $hotel['parking'] ? 'Yes' : 'No' ?></td>
                        <td><?php echo $hotel['vote'] ?></td>
                        <td><?php echo $hotel['distance_to_center'] . ' km' ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
</body>

</html>