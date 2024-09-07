<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data["title"] ?></title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        h1 {
            font-family: arial;
            font-size: 128px;
        }
    </style>
</head>
<body>
    <h1>
        <?= $data["pesan"] ?>
    </h1>
</body>
</html>