<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Let's update our quotes</title>
</head>
<body>

<form method="POST">
    <section class="quote-section">
        <label for="quote">Quotes:</label>
        <input type="text" id="quote" name="quote" value="<?= $quote["Quote"] ?>">
    </section>

    <input type="submit" name="submit">
</form>
    
</body>
</html>