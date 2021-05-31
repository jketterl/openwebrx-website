<?php
require_once(__DIR__ . "/../includes/layout.php");
require_once(__DIR__ . "/../../php/aws-sdk/aws-autoloader.php");

use Aws\S3\S3Client;

layout("repo", "Raspberry Pi downloads", function(){
    $bucket = "de.dd5jfk.openwebrx";

    $s3 = new Aws\S3\S3Client([
        "region" => "eu-central-1",
        "version" => "latest",
        "credentials" => false
    ]);

    $result = $s3->listObjects([
        "Bucket" => $bucket
    ]);

    $objects = $result["Contents"];

    $paths = [];
    $searchPath = isset($_GET["path"]) ? $_GET["path"] : "";
    $matched = [];

    $filterDate = new DateTime("2021-05-31 19:46:00");

    foreach ($objects as $o) {
        if ($o["LastModified"] < $filterDate) {
            continue;
        }
        if (substr($o["Key"], 0, strlen($searchPath)) == $searchPath) {
            $remaining = substr($o["Key"], strlen($searchPath));
            if (strlen($remaining) > 0) {
                $p = explode("/", $remaining);
                $path = implode("/", array_slice($p, 0, count($p) - 1));
                if (count($p) > 1) {
                    $paths[] = $p[0];
                } else {
                    $matched[] = $o;
                }
            }
        }
    }

    $paths = array_unique($paths);

    usort($matched, function($a, $b){
        return $b["LastModified"]->getTimestamp() - $a["LastModified"]->getTimestamp();
    });

    $formatter = new IntlDateFormatter("de_DE", IntlDateFormatter::MEDIUM, IntlDateFormatter::SHORT);

    ?>
        <div class="container">
            <div class="col-12">
                <h1>OpenWebRX Raspberry Pi SD card images</h1>
                    <table class="table">
                        <tr>
                            <th>File name</th>
                            <th>Last modified</th>
                        </tr>
                        <?php foreach($matched as $o) { ?>
                            <tr>
                                <td>
                                    <a href="https://www.openwebrx.de/images/<?php echo $o["Key"]; ?>">
                                        <?php echo $o["Key"]; ?>
                                    </a>
                                </td>
                                <td>
                                    <?php echo $formatter->format($o["LastModified"]); ?>
                                </td>
                            </tr>
                        <?php } ?>
                        <?php foreach($paths as $p) { ?>
                            <tr>
                                <td colspan="2">
                                    <a href="?path=<?php echo $p; ?>/">
                                        <?php echo $p; ?>/
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </h1>
            </div>
        </div>
    <?php
});