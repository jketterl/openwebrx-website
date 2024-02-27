<?php
require_once(__DIR__ . "/../includes/layout.php");
require_once(__DIR__ . "/../includes/repository.php");

$repo = [
    [
        "version" => 10,
        "codename" => "buster",
        "name" => "Debian Buster"
    ],
    [
        "version" => 11,
        "codename" => "bullseye",
        "name" => "Debian Bullseye"
    ],
    [
        "version" => 12,
        "codename" => "bookworm",
        "name" => "Debian Bookworm"
    ]
];

layout("repo", "Debian Repository", function() use ($repo) {
    repository("debian", $repo, 11, 12, "experimental");
});