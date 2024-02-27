<?php

$menu = [
    [
        "id" => "home",
        "text" => "Home",
        "href" => "/"
    ],
    [
        "id" => "about",
        "text" => "About",
        "href" => "/about.php"
    ],
    [
        "id" => "news",
        "text" => "News",
        "href" => "/news.php"
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
        "id" => "receiverbook",
        "text" => "Receiverbook",
        "href" => "https://www.receiverbook.de"
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
                "id" => "ubuntu",
                "text" => "Ubuntu repository",
                "href" => "/download/ubuntu.php"
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
    <meta name="description" content="OpenWebRX web-based software defined radio receiver, remote HF spectrum monitoring with a wide variety of demodulators." />
    <link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/openwebrx.css" />
    <link rel="icon" type="image/vnd.microsoft.icon" href="/favicon.ico" sizes="16x16 32x32" />
    <link rel="icon" type="image/png" sizes="32x32" href="/gfx/favicon32.png" />
    <link rel="icon" type="image/png" sizes="44x44" href="/gfx/favicon44.png" />
    <link rel="icon" type="image/png" sizes="64x64" href="/gfx/favicon64.png" />
    <link rel="icon" type="image/png" sizes="96x96" href="/gfx/favicon96.png" />
    <link rel="icon" type="image/png" sizes="128x128" href="/gfx/favicon128.png" />
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <meta name="msapplication-TileImage" content="mstile-144x144.png">
    <script src="/jquery/jquery.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="navbar-brand">
            <a href="https://www.openwebrx.de">
                <img src="/gfx/openwebrx-logo.svg" alt="OpenWebRX" width="236" height="40"/>
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
        <span>Built with <a href="https://getbootstrap.com/" target="_blank" rel="noopener">Bootstrap</a></span> |
        <span><a href="https://bootswatch.com/darkly/" target="_blank" rel="noopener">Darkly theme by Thomas Park</a></span> |
        <span><a class="footer-item" href="/impressum.php">Impressum</a></span>
    </footer>
    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
    <?php
}