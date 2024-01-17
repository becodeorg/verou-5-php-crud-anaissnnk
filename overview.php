<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Goodcard - track your collection of Favourite Songs Cover</title>
</head>
<body>

<h1>Track your collection of Favourite quotes</h1>

<ul>
    <?php foreach ($quotes as $quote) : ?>
        <li><?= $quote['Quote'] ?></li>
    <?php endforeach; ?>
</ul>

<form action="?action=create" method="POST">
    <section class="quote-section">
        <label for="quote">Quotes:</label>
        <input type="text" id="quote" name="quote">
    </section>

    <!-- <section class="artist-section">
        <label for="artist">Artist Name:</label>
        <input type="text" id="artist" name="artist">
    </section> -->

    <input type="submit" name="submit">
</form>

</body>
</html>