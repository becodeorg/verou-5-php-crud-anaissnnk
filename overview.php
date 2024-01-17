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

<h1>Track your collection of Favourite Songs Cover</h1>

<ul>
    <?php foreach ($songs as $song) : ?>
        <li><?= $song['Title'] ?></li>
    <?php endforeach; ?>
</ul>

<form action="?action=create" method="POST">
    <section class="song-section">
        <label for="title">Song Title:</label>
        <input type="text" id="title" name="title">
    </section>

    <!-- <section class="artist-section">
        <label for="artist">Artist Name:</label>
        <input type="text" id="artist" name="artist">
    </section> -->

    <input type="submit" name="submit">
</form>

</body>
</html>