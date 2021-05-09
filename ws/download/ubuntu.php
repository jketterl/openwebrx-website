<?php
require_once(__DIR__ . "/../includes/layout.php");
require_once(__DIR__ . "/../includes/repository.php");

layout("repo", "Ubuntu Repository", function(){
    repository("Ubuntu Hirute Hippo", "ubuntu", "hirsute", "unstable");
});