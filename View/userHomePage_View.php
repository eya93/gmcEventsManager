<?php
/**
 * Created by PhpStorm.
 * User: Eya'sPC
 * Date: 02/09/2018
 * Time: 16:47
 */
require_once '../functions.php';
require_once '../autoload.php';
if (!isset($_SESSION['member_id'])) {
    redirect ( 'signin_Controller');
    exit();
}

$title = "HomePage_GoMyCodeEvents";

ob_start();

if (isset($_SESSION['msg'])) {
    $msg=$_SESSION['msg'];
    ?>
    <div class="Msg alert alert-danger col-lg-3 offset-lg-4" style="margin-top: 20px;text-align: center;font-size: 18px;"   role="alert">
        <?php echo "$msg";?>
    </div>
    <?php
    unset ($_SESSION['msg']);
}

//$event = new Events();
//$events= $event->findAllEvents();
include_once 'events_View1.php';
if ($_SESSION['member_role'] == 1){
    include_once 'demands_View.php';
}
?>


<?php $content = ob_get_clean();
require('templateConnected.php');