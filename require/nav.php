
<?php
$navbar = array(
    array(
        "href" => "index.php",
        "text" => "Home"),
    array(
        "href" => "input_form.php",
        "text" => "Input Form"),
    array(
        "href" => "browse_households.php",
        "text" => "Browse Households"),
    array(
        "href" => "last_added.php",
        "text" => "Last Added"),
    array(
        "href" => "edit_form.php",
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

