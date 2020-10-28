<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <input type="file" accept="audio/*;capture=microphone">
    <?php
    $output = shell_exec('python3 /opt/lampp/htdocs/speechtotext/stt.py');
    echo $output;
    ?>
</body>

</html>