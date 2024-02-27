<?php
function repository($dist, $repo, $stableVersion, $experimentalVersion, $experimentalComponent) {
    $selectedVersion = isset($_GET["version"]) ? (int) $_GET["version"] : $stableVersion;
    $selected = current(array_filter($repo, function($r) use ($selectedVersion) { return $r["version"] === $selectedVersion; }));

    ?>
        <div class="container">
            <div class="col-12">
                <h1>OpenWebRX <?php echo ucfirst($dist); ?> Repository</h1>
            </div>
            <div class="col-12 version-select">
                <form>
                    <div class="form-group">
                        <label for="version">Please select your version of <?php echo ucfirst($dist); ?>:</label>
                        <select name="version" id="version" class="form-control">
                            <?php foreach($repo as $v) { ?>
                                <option value="<?php echo $v["version"]; ?>" <?php if ($selectedVersion == $v["version"]) echo "selected"; ?>>
                                    <?php echo $v["name"]; ?>
                                    <?php
                                        if ($v["version"] == $stableVersion) {
                                            echo "(Recommended)";
                                        } elseif ($v["version"] == $experimentalVersion) {
                                            echo "(Experimental)";
                                        }
                                    ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </form>
            </div>
            <?php if ($selectedVersion <= $stableVersion) { ?>
                <div class="col-12">
                    <h3>OpenWebRX official stable releases for <?php echo $selected["name"]; ?></h3>
                    <p>
                        The following instructions will set your system up to install OpenWebRX and its dependencies from the package repository.
                    </p>
                    <div class="alert alert-warning">
                        All commands must be run as root. If you're using sudo, please use <pre style="display:inline;">sudo su -</pre> before executing the commands below.
                    </div>
                    <pre class="block">
wget -O /usr/share/keyrings/openwebrx.gpg https://repo.openwebrx.de/openwebrx.gpg
echo "deb [signed-by=/usr/share/keyrings/openwebrx.gpg] https://repo.openwebrx.de/<?php echo $dist; ?>/ <?php echo $selected["codename"]; ?> main" > /etc/apt/sources.list.d/openwebrx.list
apt-get update
apt-get install openwebrx</pre>
                </div>
            <?php } else { ?>
                <div class="col-12">
                    <div class="alert alert-info">
                        There is no stable release for <?php echo $selected["name"]; ?> available yet. You can chose an earlier version of <?php echo ucfirst($dist); ?> from the dropdown, or help us out by testing the current experimental builds.
                    </div>
                </div>
            <?php } ?>
            <?php if ($selectedVersion == $experimentalVersion) { ?>
                <div class="col-12">
                    <h3>OpenWebRX experimental builds for <?php echo $selected["name"]; ?> (bleeding edge packages straight from the build machine)</h3>
                    <p>
                        The following instructions will set your system up to install OpenWebRX and its dependencies from the package repository.
                    </p>
                    <div class="alert alert-warning">
                        All commands must be run as root. If you're using sudo, please use <pre style="display:inline;">sudo su -</pre> before executing the commands below.
                    </div>
                    <div class="alert alert-danger">
                        The experimental repository is not recommended for general use, and should only be included for development and testing. Experimental packages may be broken, unstable or in the worst case even harmful.
                    </div>
                    <pre class="block">
wget -O /usr/share/keyrings/openwebrx.gpg https://repo.openwebrx.de/openwebrx.gpg
echo "deb [signed-by=/usr/share/keyrings/openwebrx.gpg] https://repo.openwebrx.de/<?php echo $dist; ?>/ <?php echo $experimentalComponent; ?> main" > /etc/apt/sources.list.d/openwebrx-<?php echo $experimentalComponent; ?>.list
apt-get update
apt-get install openwebrx</pre>
                </div>
            <?php } ?>
        </div>
        <script type="text/javascript">
            $('.version-select select').on('change', function(){
                this.form.submit();
            });
        </script>
    <?php
}
