<?php
require_once(__DIR__ . "/../includes/layout.php");
require_once(__DIR__ . "/../includes/repository.php");

$repo = [
    [
        "version" => 2004,
        "codename" => "focal",
        "name" => "Ubuntu Focal Fossa"
    ],
    [
        "version" => 2204,
        "codename" => "jammy",
        "name" => "Ubuntu Jammy Jellyfish"
    ],
    [
        "version" => 2310,
        "codename" => "mantic",
        "name" => "Ubuntu Mantic Minotaur"
    ]
];

layout("repo", "Ubuntu Repository", function() use ($repo) {
    repository("ubuntu", $repo, 2204, 2310, "unstable");
});