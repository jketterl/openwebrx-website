<?php
require_once(__DIR__ . "/../includes/layout.php");
require_once(__DIR__ . "/../../php/aws-sdk/aws-autoloader.php");

use Aws\S3\S3Client;

layout("repo", function(){
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

    foreach ($objects as $o) {
        $p = explode("/", $o["Key"]);
        if (count($p) > 1 && !in_array($p[0], $paths)) {
            $paths[] = $p[0];
        }

        $path = implode("/", array_slice($p, 0, count($p) - 1));
        if ($path == $searchPath) {
            $matched[] = $o;
        }
    }

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
                                    <a href="<?php echo $s3->getObjectUrl($bucket, $o["Key"]); ?>">
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
                                    <a href="?path=<?php echo $p; ?>">
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