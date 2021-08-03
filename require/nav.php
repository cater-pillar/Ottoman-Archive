
<?php
$navbar = array(
    array(
        "href" => "index.php",
        "text" => "Home"),
    array(
        "href" => "unos_podataka_ajax.php",
        "text" => "Input Form"),
    array(
        "href" => "pregled_domacinstava.php",
        "text" => "Browse Households"),
    array(
        "href" => "uspesno_dodato.php",
        "text" => "Poslednje Dodato"),
    array(
        "href" => "edit_unosa.php",
        "text" => "Edit")
    );
?> 

    

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <ul class="nav nav-pills">
        <?php foreach ($navbar as $nav): ?>
            <li class="nav-item">
                <a class="nav-link " href=<?php echo $nav["href"]; ?>><?php echo $nav["text"]; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>

