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
        <p><a href="?action=edit&id=<?= $quote["id"] ?>">Edit</a>
    <?php endforeach; ?>
</ul>

<form action="?action=create" method="POST">
    <section class="quote-section">
        <label for="quote">Quotes:</label>
        <input type="text" id="quote" name="quote">
    </section>

    <input type="submit" name="submit">
</form>

</body>
</html>