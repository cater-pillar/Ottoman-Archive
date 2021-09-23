
<?php
$navbar = array(
    array(
        "href" => "home",
        "text" => "Home"),
    array(
        "href" => "inputform",
        "text" => "Input Form"),
    array(
        "href" => "browsehouseholds",
        "text" => "Browse Households"),
    array(
        "href" => "lastadded",
        "text" => "Last Added"),
    array(
        "href" => "householdlist",
        "text" => "Household List")
    );
?> 

    

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <ul class="nav nav-pills">
        <?php foreach ($navbar as $nav): ?>
            <li class="nav-item">
                <a class="nav-link " href=<?= $nav["href"]; ?>><?= $nav["text"]; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>

