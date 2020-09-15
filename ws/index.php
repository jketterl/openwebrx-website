<?php
require_once(__DIR__ . "/includes/layout.php");

layout("home", "Homepage", function(){ ?>
    <div class="container">
        <div class="col-12 openwebrx-background">
            <div class="image-fadeout">
                <img
                    src="/gfx/openwebrx-screenshot.webp"
                    alt="OpenWebRX screenshot"
                    srcset="/gfx/openwebrx-screenshot-480.webp 480w,
                            /gfx/openwebrx-screenshot-660.webp 660w,
                            /gfx/openwebrx-screenshot-900.webp 900w,
                            /gfx/openwebrx-screenshot-1080.webp 1080w,
                            /gfx/openwebrx-screenshot.webp 1920w"
                    sizes="(min-width: 1200px) 1080px,
                           (min-width: 992px) 900px,
                           (min-width: 768px) 660px,
                           (min-width: 576px) 480px,
                           calc(100vw - 60px)"
                />
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
            <p>
                <a href="https://www.receiverbook.de" target="_blank" rel="noopener">Receiverbook</a> is a free directory service listing online SDR receivers from your area or all around the world. Why don't you try it out?
            </p>
        </div>
    </div>
<?php });