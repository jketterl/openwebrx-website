<?php
require_once(__DIR__ . "/includes/layout.php");

layout("news", "News", function() { ?>
    <div class="container">
        <div class="col-12">
            <h1>Latest Release News</h1>
            <div>This page lists the latest releases of OpenWebRX including a summary of the most significant changes.</div>
        </div>
        <div class="col-12 mt-5">
            <h2>OpenWebRX 0.19.1</h2>
            <div>Releaseed on June 13, 2020 <span class="badge badge-success">Current Release</span></div>
            <ul class="mt-2">
                <li>Added ability to authenticate receivers with listing sites using "receiver id" tokens</li>
            </ul>
        </div>
        <div class="col-12 mt-5">
            <h2>OpenWebRX 0.19.0</h2>
            <div>Releaseed on June 02, 2020</div>
            <ul class="mt-2">
                <li>The JS8Call digimode can now be decoded if the JS8Call software is installed</li>
                <li>Many parts of the frontend have been restructured and rewritten for better integrity</li>
                <li>Added support for Perseus-SDR devices</li>
                <li>Added support for RadioBerry 2</li>
                <li>HackRF support has been migrated to SoapySDR</li>
                <li>Improved direct sampling mode handling for RTL-SDR Blog V.3 devices</li>
                <li>Various parameters added for device control across all SDR types</li>
                <li>Automatic fallback to OSM for the map when Google Maps has not been configured</li>
                <li>Docker builds are now based on Debian "slim" images for improved portability</li>
            </ul>
        </div>
        <div class="col-12 mt-5">
            <h2>OpenWebRX 0.18.0</h2>
            <div>Released on February 22, 2020</div>
            <ul class="mt-2">
                <li>Most of the server code has been rewritten for better flexibility, stability and performance. The project is now fully based on Python 3.</li>
                <li>Large parts of the frontend code have been updated or polished.</li>
                <li>The new core now supports multiple SDR devices simultaneously, as well as switching between multiple profiles per SDR, allowing users to navigate between multiple bands or frequencies.</li>
                <li>Added support for demodulation of digital voice modes (DMR, D-Star, YSF, NXDN).</li>
                <li>Added support for digital modes of the WSJT-X suite (FT8, FT4, WSPR, JT65, JT9).</li>
                <li>Added support for APRS.</li>
                <li>Added support for Pocsag.</li>
                <li>Bookmarks allow easy navigation between known stations.</li>
                <li>Background decoding can transform your receiver into an automatic reporting station, including automatic band scheduling.</li>
                <li>The integrated map shows digimode spots as well as APRS and YSF positions.</li>
            </ul>
        </div>
    </div>
<?php } );