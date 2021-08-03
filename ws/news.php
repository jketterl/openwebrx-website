<?php
require_once(__DIR__ . "/includes/layout.php");

layout("news", "News", function() { ?>
    <div class="container">
        <div class="col-12">
            <h1>Latest Release News</h1>
            <div>This page lists the latest releases of OpenWebRX including a summary of the most significant changes.</div>
        </div>
        <div class="col-12 mt-5">
            <h2>OpenWebRX 1.1.0</h2>
            <div>Released on August 03, 2021 <span class="badge badge-success">Current Release</span></div>
            <ul class="mt-2">
                <li>Introduces the new "codecserver" component to decode AMBE voice data</li>
                <li>New decoders and metadata displays for NXDN and D-Star</li>
                <li>Most graphical elements have been replaced with SVGs for crisper images and faster load times</li>
            </ul>
        </div>
        <div class="col-12 mt-5">
            <h2>OpenWebRX 1.0.0</h2>
            <div>Released on May 09, 2021</div>
            <ul class="mt-2">
                <li>Introduces the new web configuration interface and backend storage system</li>
                <li>Introduces a new user management system to facilitate web config authorization</li>
                <li>Now supports the new WSJT-X modes FST4, FST4W and Q65</li>
                <li>Added support for the new <a href="https://m17project.org/" target="_blank" rel="noopener">M17 digital voice mode</a></li>
                <li>Added support for uploading spots to <a href="http://www.wsprnet.org/" target="_blank" rel="noopener">WSPRnet</a></li>
                <li>New devices: Added support for Hermes HPSDR devices (thanks to Jim Ancona) and R&S network devices using the EB200 or Ammos protocols</li>
            </ul>
        </div>
        <div class="col-12 mt-5">
            <h2>OpenWebRX 0.20.3</h2>
            <div>Released on January 26, 2021</div>
            <ul class="mt-2">
                <li>Fixes an incompatibility issue with python versions <= 3.6</li>
            </ul>
        </div>
        <div class="col-12 mt-5">
            <h2>OpenWebRX 0.20.2</h2>
            <div>Released on January 25, 2021 <span class="badge badge-danger">Security Hotfix</span></div>
            <ul class="mt-2">
                <li>Fixes an arbitrary code execution vulnerability</li>
            </ul>
        </div>
        <div class="col-12 mt-5">
            <h2>OpenWebRX 0.20.1</h2>
            <div>Released on November 30, 2020</div>
            <ul class="mt-2">
                <li>Remove broken OSM map fallback</li>
            </ul>
        </div>
        <div class="col-12 mt-5">
            <h2>OpenWebRX 0.20.0</h2>
            <div>Released on October 11, 2020</div>
            <ul class="mt-2">
                <li>Added support for decoding the FreeDV mode. Please see the <a href="https://github.com/jketterl/openwebrx/wiki/FreeDV-demodulator-notes" target="_blank" rel="noopener">FreeDV notes on the wiki</a> for more information about the installation of codec2 since this requires some extra steps.</li>
                <li>Added support for wideband FM (aka broadcast FM) so you can now listen to FM radio stations (or other similar broadcasts). This comes along a new audio delivery pipeline that, for the first time, allows higher sample rate audio to be delivered to the client (up to 48kHz).</li>
                <li>Added support for decoding DRM broadcasts using the dream decoder. Please see the <a href="https://github.com/jketterl/openwebrx/wiki/DRM-demodulator-notes" target="_blank" rel="noopener">DRM notes on the wiki</a> for installation instructions since this requires the compilation of a version of dream without its GUI.</li>
                <li>The audio AGC has been reworked and should now produce better results for AM and SSB modes. NFM now has an AGC (again), too.</li>
                <li>The waterfall now features the <a href="https://ai.googleblog.com/2019/08/turbo-improved-rainbow-colormap-for.html" target="_blank" rel="noopener">"Turbo"</a> colormap by default. Please note that you will need to merge this part of the configuration if you are on an existing installation.</li>
                <li>There's now a new, experimental "continuous automatic waterfall calibration" available. Right-click the "auto-adjust waterfall colors" button to give it a try. Feedback welcome!</li>
                <li>New devices: added support for the FunCube Dongle Pro+ and added a new connector for remote devices available through "rtl_tcp".</li>
                <li>Many fixes for filedescriptor and thread leaks to prevent "too many open files" errors that made OpenWebRX unusable after some time (depending on traffic).</li>
                <li>Fixed an error where the connectors wouldn't accept new connections after some time (depending on traffic).</li>
            </ul>
        </div>
        <div class="col-12 mt-5">
            <h2>OpenWebRX 0.19.1</h2>
            <div>Releaseed on June 13, 2020</div>
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