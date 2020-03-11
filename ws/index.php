<?php
require_once(__DIR__ . "/includes/layout.php");

layout("home", "Homepage", function(){ ?>
    <div class="container">
        <div class="col-12 openwebrx-background">
            <div class="image-fadeout">
                <img src="/gfx/openwebrx-screenshot.png" alt="OpenWebRX screenshot" />
            </div>
            <h1>OpenWebRX web-based SDR receiver</h1>
        </div>
        <div class="col-12 mt-5">
            <p>
                OpenWebRX is a multi-user SDR receiver that can be operated from any web browser without the need for any additional client software. It is the ideal solution to provide access to the HF spectrum at your location of choice to a wide audience. All you need is a computer, an SDR device and network access.
            </p>
            <p>
                OpenWebRX aims to support as many modulations and encodings as possible, while still focusing on an easy-to-use interface, so that even inexperienced users can explore the HF spectrum without the need to buy expensive radio equipment.
            </p>
        </div>
    </div>
<?php });