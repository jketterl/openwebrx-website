<?php
function repository($fullname, $dist, $codename, $experimentalComponent) { ?>
    <div class="container">
        <div class="col-12">
            <h1>OpenWebRX Repository</h1>
            <p>
                The following instructions will set your system up to install OpenWebRX and its dependencies from the package repository.
            </p>
            <div class="alert alert-warning">
                All commands must be run as root. If you're using sudo, please use <pre style="display:inline;">sudo su -</pre> before executing the commands below.
            </div>
        </div>
        <div class="col-12">
            <h3>OpenWebRX official releases for <?php echo $fullname; ?></h3>
            <pre class="block">
wget -O - https://repo.openwebrx.de/debian/key.gpg.txt | gpg --dearmor -o /usr/share/keyrings/openwebrx.gpg
echo "deb [signed-by=/usr/share/keyrings/openwebrx.gpg] https://repo.openwebrx.de/<?php echo $dist; ?>/ <?php echo $codename; ?> main" > /etc/apt/sources.list.d/openwebrx.list
apt-get update
apt-get install openwebrx</pre>
        </div>
        <div class="col-12">
            <h3>OpenWebRX experimental for <?php echo ucfirst($dist); ?> (bleeding edge packages straight from the build machine)</h3>
            <div class="alert alert-danger">
                This is not recommended for general use, and should only be included for development and testing. Experimental packages may be broken, unstable or in the worst case even harmful.
            </div>
            <p>Please run this additionally to the commands above:</p>
            <pre class="block">
echo "deb [signed-by=/usr/share/keyrings/openwebrx.gpg] https://repo.openwebrx.de/<?php echo $dist; ?>/ <?php echo $experimentalComponent; ?> main" > /etc/apt/sources.list.d/openwebrx-<?php echo $experimentalComponent; ?>.list
apt-get update
apt-get install openwebrx</pre>
        </div>
    </div>
<?php }
