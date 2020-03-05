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
        "text" => "Repositories",
        "dropdown" => [
            [
                "id" => "debian",
                "text" => "Debian",
                "href" => "/repositories/debian.php"
            ]
        ]
    ]
];

function layout(string $menu_id, callable $content_generator) {
    global $menu;
    ?>
<!DOCTYPE html>
<html>
<head>
    <title>OpenWebRX</title>
    <link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/openwebrx.css" />
    <link rel="stylesheet" type="text/css" href="/css/sticky-footer.css" />
    <script src="/jquery/jquery.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="navbar-brand">
            <a href="https://www.openwebrx.de">
                <img src="/gfx/openwebrx-logo-big.png" alt="OpenWebRX" />
            </a>
        </div>
        <div class="collapse navbar-collapse">
            <div class="navbar-nav">
                <?php foreach($menu as $item) {
                    if (array_key_exists("dropdown", $item)) { ?>
                        <div class="nav-item dropdown<?php if($item["id"] == $menu_id) echo " active"; ?>">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $item["text"]; ?>
                            </a>
                            <div class="dropdown-menu">
                                <?php foreach($item["dropdown"] as $dropdown_item) { ?>
                                    <a class="dropdown-item" href="<?php echo $dropdown_item["href"]; ?>">
                                        <?php echo $dropdown_item["text"]; ?>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="nav-item<?php if($item["id"] == $menu_id) echo " active"; ?>">
                            <a class="nav-link" href="<?php echo $item["href"]; ?>">
                                <?php echo $item["text"]; ?>
                            </a>
                        </div>
                    <?php }
                } ?>
            </div>
        </div>
    </nav>
    <?php echo $content_generator(); ?>
    <footer class="footer">
        <a class="footer-item" href="/impressum.php">Impressum</a>
    </footer>
    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
    <?php
}