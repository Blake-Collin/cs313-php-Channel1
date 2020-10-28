<?php
function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];
    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }
    return $ip;
}

$user_ip = getUserIP(); ?>

<footer>
    <div class="container">
        <p>&copy; <?php echo(date("Y")); ?> - Collin Blake - <a href="#">Back to Top</a> - <?php echo(date("m/d/Y")); ?> - Your IP Address: <?php echo($user_ip) ?>
        </p>
    </div>
</footer>
<script src="./js/hamburger.js"></script>