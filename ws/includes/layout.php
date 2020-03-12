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
        "text" => "Get OpenWebRX",
        "dropdown" => [
            [
                "id" => "debian",
                "text" => "Debian repository",
                "href" => "/download/debian.php"
            ],
            [
                "id" => "docker",
                "text" => "Docker images",
                "href" => "https://hub.docker.com/r/jketterl/openwebrx"
            ],
            [
                "id" => "rpi",
                "text" => "Raspberry Pi images",
                "href" => "/download/rpi.php"
            ],
            "|",
            [
                "id" => "source",
                "text" => "Source code",
                "href" => "https://github.com/jketterl/openwebrx"
            ]
        ]
    ]
];

function layout(string $menu_id, string $title, callable $content_generator) {
    global $menu;
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>OpenWebRX web-based software defined radio | <?php echo $title; ?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="theme-color" content="#222" />
    <meta name="description" content="OpenWebRX web-based software defined radio receiver" />
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
                                <?php foreach($item["dropdown"] as $dropdown_item) {
                                    if (is_array($dropdown_item)) { ?>
                                        <a class="dropdown-item" href="<?php echo $dropdown_item["href"]; ?>">
                                            <?php echo $dropdown_item["text"]; ?>
                                        </a>
                                    <?php } elseif ($dropdown_item == "|") { ?>
                                        <div class="dropdown-divider"></div>
                                    <?php }
                                } ?>
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
        <span><a href="https://bootswatch.com/darkly/">Darkly theme by Thomas Park</a></span> |
        <span><a class="footer-item" href="/impressum.php">Impressum</a></span> |
        <span class="twitter-button"><a href="https://twitter.com/dd5jfk?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-count="false">Follow @dd5jfk</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script></span>
    </footer>
    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
    <?php
}