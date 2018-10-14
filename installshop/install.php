<?php

/************************************
*   @author         JinanIT         *
*   @package        SHOP            *
*   @subpackage     install         *
************************************/

$installFile = "../SHOP";
$smaConfig = "../app/config/database.php";

if (is_file($installFile) && file_exists($smaConfig)) {

    $step = isset($_GET['step']) ? $_GET['step'] : '';
    switch ($step) {
        default: ?>
        <ul class="steps">
            <li class="active pk">Checklist</li>
            <li class="last">Done!</li>
        </ul>
        <h3>Pre-update Checklist</h3>
        <?php
        $error = FALSE;
        if(phpversion() < "5.4") { $error = TRUE; echo "<div class='alert alert-error'><i class='icon-remove'></i> Your PHP version is ".phpversion()."! PHP 5.4 or higher required!</div>"; } else { echo "<div class='alert alert-success'><i class='icon-ok'></i> You are running PHP ".phpversion()."</div>"; }
        // if(!extension_loaded('mcrypt')) { $error = TRUE; echo "<div class='alert alert-error'><i class='icon-remove'></i> Mcrypt PHP extension missing!</div>"; } else { echo "<div class='alert alert-success'><i class='icon-ok'></i> Mcrypt PHP extension loaded!</div>"; }
        if(!extension_loaded('mysqli')) { $error = TRUE; echo "<div class='alert alert-error'><i class='icon-remove'></i> Mysqli PHP extension missing!</div>"; } else { echo "<div class='alert alert-success'><i class='icon-ok'></i> Mysqli PHP extension loaded!</div>"; }
        if(!extension_loaded('mbstring')) { $error = TRUE; echo "<div class='alert alert-error'><i class='icon-remove'></i> MBString PHP extension missing!</div>"; } else { echo "<div class='alert alert-success'><i class='icon-ok'></i> MBString PHP extension loaded!</div>"; }
        if(!extension_loaded('gd')) { $error = TRUE; echo "<div class='alert alert-error'><i class='icon-remove'></i> GD PHP extension missing!</div>"; } else { echo "<div class='alert alert-success'><i class='icon-ok'></i> GD PHP extension loaded!</div>"; }
        if(!extension_loaded('curl')) { $error = TRUE; echo "<div class='alert alert-error'><i class='icon-remove'></i> CURL PHP extension missing!</div>"; } else { echo "<div class='alert alert-success'><i class='icon-ok'></i> CURL PHP extension loaded!</div>"; }
        ?>
        <div class="bottom">
            <?php if($error) { ?>
            <a href="#" class="btn btn-primary disabled">Next Step</a>
            <?php } else { ?>
            <a href="index.php?step=1" class="btn btn-primary">Next Step</a>
            <?php } ?>
        </div>
        
        <?php
        break;
        case "1": ?>
        <ul class="steps">
            <li class="ok"><i class="icon icon-ok"></i>Checklist</li>
            <li class="active">Done!</li>
        </ul>

        <?php
        $finished = TRUE;
        if(!@unlink('../SHOP')) {
            echo "<div class='alert alert-warning'><i class='icon-warning'></i> Please remove the SHOP file from the main folder in order to lock the installer.</div>";
        }

        if($finished) { ?>

            <h3><i class='icon-ok'></i> Installation Completed!</h3>
            <div class="alert alert-warning"><i class='icon-warning-sign'></i> You can proceed to login now.</div>
            <div class="bottom">
                <a href="<?php echo "http://".$_SERVER["SERVER_NAME"].substr($_SERVER["REQUEST_URI"], 0, -28); ?>" class="btn btn-primary">Go to Login</a>
            </div>

        <?php
        }
    }

} else {
    echo "<div style='width: 100%; font-size: 10em; color: #757575; text-shadow: 0 0 2px #333, 0 0 2px #333, 0 0 2px #333; text-align: center;'><i class='icon-lock'></i></div><h3 class='alert-text text-center'>Installer is locked due to missing files OR Stock Manager Advance is not installed.<br><small style='color:#666;'>Please contact your developer/support.</small></h3>";
} ?>

<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></button>
        <h3 id="myModalLabel">How to find your purchase code</h3>
    </div>
    <div class="modal-body">
        <img src="img/purchaseCode.png">
    </div>
</div>
