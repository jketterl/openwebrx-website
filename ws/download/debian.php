<?php
require_once(__DIR__ . "/../includes/layout.php");
require_once(__DIR__ . "/../includes/repository.php");

layout("repo", "Debian Repository", function(){
    repository("debian", "buster", "experimental");
});