<?php
try {
    $handle = fopen("data", "r");
    if ($handle) {
        $line = fgets($handle);
        $lines = explode("*", $line);
    }
    fclose($handle);

    if (isset($_POST) && $_POST['action'] != '' && $handle) {
        switch ($_POST['action']) {
            case 'new':
                $lines[0] = $_POST['habit'];
                $lines[1] = '0';
                break;
            case 'done':
                $n = intval($lines[1]);
                $lines[1] = $n + 1;
                break;
            case 'reset':
                $lines[1] = '0';
                break;

            default:
                # code...
                break;
        }
        $handle = fopen("./data", "w+");
        fwrite($handle, $lines[0] . "*" . $lines[1]);
        fclose($handle);
    }
} catch (Exception $e) {
    print $e->getMessage();
}
?>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habit Reminder - Administrace</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <header>
        <h1>Administrace</h1>
    </header>
    <main>
        <section>
            <form action="maminka.php" method="post">
                <label for="habit">Nový návyk:</label>
                <input type="hidden" name="action" value="new">
                <input type="text" id="habit" name="habit" required>
                <br><br>
                <button type="submit" class="grey">Uložit</button>
            </form>
            <br>
            <h3>Aktuální návyk</h3>
            <form action="maminka.php" method="post">
                <input type="hidden" name="action" value="done">
                <button type="submit" class="green">Splněno</button>
            </form>
            <form action="maminka.php" method="post">
                <input type="hidden" name="action" value="reset">
                <button type="submit" class="red">Reset</button>
            </form>
        </section>
    </main>
</body>

</html>