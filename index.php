<?php
$handle = fopen("data", "r");
if ($handle) {
    $line = fgets($handle);
    $lines = explode("*", $line);
}
fclose($handle);
?>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habit Reminder</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <header>
        <h1>♥️ Janička ♥️</h1>
    </header>
    <main>
        <section>
            <h2><?php print $lines[0]; ?></h2>
            <?php
            if ($lines[1] == 21) {
                print "<div class='box'><span><h3>Počet dnů v řadě:</h3>21</span></div>";
            } else {
                print "<h3>Počet dnů v řadě:</h3><p>" . $lines[1] . "</p>";
            }
            ?>
        </section>
        <section>
            <table>
                <?php
                $n = 1; // Cislo dne
                for ($i = 1; $i <= 3; $i++) { // 3 radky
                    print "<tr>";
                    for ($j = 1; $j <= 7; $j++) { // 7 sloupcu
                        if ($n <= $lines[1]) { // Zvyrazneni jiz splnenych
                            print "<td class='done'>" . $n . "</td>";;
                        } else {
                            if ($n == 21) {
                                print "<td><strong>" . $n . "</strong></td>";;
                            } else {
                                print "<td>" . $n . "</td>";;
                            }
                        }
                        $n++;
                    }
                    print "</tr>";
                }
                ?>
            </table>
            <?php
            if ($lines[1] == 21) {
                print "<div class='pyro'>";
                print "<div class='before'></div>";
                print "<div class='after></div>";
                print "</div>";
            }
            ?>
        </section>
    </main>
</body>

</html>