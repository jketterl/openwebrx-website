<?php

$menu = [
    [
        "id" => "home",
        "text" => "Home",
        "href" => "/"
    ],
    [
        "id" => "wiki",
        "text" => "Documentation",
        "href" => "https://github.com/jketterl/openwebrx/wiki"
    ],
    [
        "id" => "community",
        "text" => "Community",
        "href" => "https://groups.io/g/openwebrx"
    ],
    [
        "id" => "repo",
        "text" => "Repositories",
        "dropdown" => [
            [
                "id" => "debian",
                "text" => "Debian",
                "href" => "/repositories/debian.php"
            ],
            [
                "id" => "docker",
                "text" => "Docker",
                "href" => "https://hub.docker.com/r/jketterl/openwebrx"
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
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="navbar-brand">
            <a href="https://www.openwebrx.de">
                <img src="/gfx/openwebrx-logo-big.png" alt="OpenWebRX" />
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
        <span>Built with <a href="https://getbootstrap.com/">Bootstrap</a></span> |
        <span>Darkly Theme by Thomas Park <a href="https://bootswatch.com/darkly/">bootswatch.com</a></span> |
        <a class="footer-item" href="/impressum.php">Impressum</a>
    </footer>
    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
    <?php
}