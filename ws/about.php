<?php
require_once(__DIR__ . "/includes/layout.php");

layout("about", "About OpenWebRX", function(){ ?>
    <div class="container">
        <div class="col-12">
            <h1>About OpenWebRX</h1>
        </div>
        <div class="col-12 mt-5">
            <h2>What is OpenWebRX?</h2>
            <div>
                OpenWebRX is an open source web-based software defined radio application that allows users to share
                access to one ore more SDR devices using a browser.
            </div>
            <ul class="mt-2">
                <li>
                    "Software defined radio": All processing is done in software, using digital signal processing
                    ("DSP") technology.
                </li>
                <li>
                    "Web-based": Users do not need to install anything on their PC; all that's required to be able to
                    use OpenWebRX is an HTML5 capable browser.
                </li>
                <li>
                    "Shared access": Multiple users can use the same receiver at the same time, and can listen to
                    different frequencies and modes (some restrictions apply).
                </li>
                <li>
                    "Open source": The code for all parts of OpenWebRX is available under free and open source ("FOSS")
                    licenses.
                </li>
            </ul>
        </div>
        <div class="col-12 mt-5">
            <h2>What is the purpose of OpenWebRX?</h2>
            <div>
                OpenWebRX is designed to be deployed in locations with interesting receiving conditions. This could be
                a site with low-noise long-, medium- or shortwave reception, elevated locations for VHF, UHF or higher
                bands, or sites with special directional antennas for special purposes. Any site that would be able to
                receive something of interest for others.
            </div>
            <div>
                OpenWebRX is designed for public shared access. The main purpose of this application is to allow users
                to receive signals remotely that they wouldn't otherwise be able to receive on their own.
            </div>
        </div>
        <div class="col-12 mt-5">
            <h2>What are the goals of the OpenWebRX project?</h2>
            <ul class="mt-2">
                <li>
                    <h3>Focus on publicly shared receivers</h3>
                    <div>
                        The project focuses on features that benefit shared, multi-user access. Any features that are
                        not in line with this are low priority. Features that interfere with this must be implemented
                        in a way that allows the operator to fully disable them.
                    </div>
                    <div>
                        The aim of the project is to treat all users as fairly as possible. As such, any features that
                        give elevated privileges to selected groups of users have no place in this project. Exceptions
                        to this rule will only be given to operators, and only for functionality needed to fulfill
                        the operator role.
                    </div>
                </li>
                <li>
                    <h3>Multi-user support</h3>
                    <div>
                        Any feature added to OpenWebRX should be designed in such a way that multiple users do not
                        interfere with each other.
                    </div>
                </li>
                <li>
                    <h3>Ease of use over sophistication</h3>
                    <div>
                        The user interface of OpenWebRX should be kept as simple as possible, with focus on newcomers
                        with very little background in radio operation. Any advanced features that are not immediately
                        useful to a beginner user must be presented in a way as to not deter, distract, or confuse said
                        users.
                    </div>
                    <div>
                        The user interface should guide the user to make correct decisions wherever applicable. The user
                        interface should be context sensitive and try to present the user with the controls they need.
                    </div>
                </li>
                <li>
                    <h3>Integrating decoders over client-side decoding support</h3>
                    <div>
                        The goal of OpenWebRX is to allow decoding of various radio signals directly in the browser. Any
                        use case that requires third-party applications to decode signals on the client is of no
                        interest to this project, and features that serve no other purpose have no place in this
                        project. The main focus should be to integrate modes directly into OpenWebRX so that they become
                        available in the browser, eliminating the need for third-party software on the client.
                    </div>
                </li>
                <li>
                    <h3>Code quality and longevity over multitude of features</h3>
                    <div>
                        The application code shall be written following common best practises and guides, with the goal
                        that it may run for a long time, stable, and without the need for constant adaptation or
                        maintenance.
                    </div>
                </li>
                <li>
                    <h3>Focus on availability and accessibility</h3>
                    <div>
                        The installation and setup procedure of OpenWebRX should be made as simple as possible.
                    </div>
                    <div>
                        The application shall provide guidance for operators where possible, and support operators
                        with the maintenance of their receivers where applicable. Operator's tasks should be performable
                        using a browser whenever applicable.
                    </div>
                </li>
                <li>
                    <h3>Make use of idle resources</h3>
                    <div>
                        Any resources that are not currently in use by any users can be made available for automated
                        background tasks (background decoding, spotting, reporting). These background tasks should
                        not interfere with the interaction of actual users.
                    <div>
                </li>
            </ul>
        </div>
    </div>
<?php });