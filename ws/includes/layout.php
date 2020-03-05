<?php

$menu = [
    [
        "id" => "home",
        "text" => "Home",
        "href" => "/"
    ],
    [
        "id" => "wiki",
        "text" => "Wiki",
        "href" => "https://github.com/jketterl/openwebrx/wiki"
    ],
    [
        "id" => "repo",
        "text" => "Repository",
        "href" => "/repo.php"
    ]
];

function layout(string $menu_id, callable $content_generator) {
    global $menu;
    ?>
<!DOCTYPE html>
<html>
<head>
    <title>OpenWebRX</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/sticky-footer.css" />
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="navbar-brand">OpenWebRX</div>
        <div class="collapse navbar-collapse">
            <div class="navbar-nav">
                <?php foreach($menu as $item) { ?>
                    <a class="nav-item nav-link<?php if($item["id"] == $menu_id) echo " active"; ?>" href="<?php echo $item["href"]; ?>"><?php echo $item["text"]; ?></a>
                <?php } ?>
            </div>
        </div>
    </nav>
    <?php echo $content_generator(); ?>
    <footer class="footer">
        <a class="footer-item" href="impressum.php">Impressum</a>
    </footer>
</body>
</html>
    <?php
}