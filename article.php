<?php
include 'lib/DB.php';
include 'header.html';
include 'lib/Request.php';

$db = new DB();

$users = $db->getRows('users',array('order_by'=>'id ASC'));

    if(isset($_POST['submitBtn']))
    {
        //filtering data
        $title = Request::filtration($_POST['title']);
        $user_id = Request::filtration($_POST['user_id']);
        $desc = Request::filtration($_POST['desc']);

        $articleData = array(
            'user_id' => $user_id,
            'title' => $title,
        );

        if($db->insert('articles', $articleData))
        {
            $msg = 'New article has been added';
        }
        else
        {
            $msg = 'Something went wrong';
        }

    }
?>
<div id="app">
    <div class="msg success"><?php echo $msg;?></div>
    <div id="formBlock">
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
            <label for="name">Title: </label>
            <input type="text" name="title" placeholder="Enter title" minlength="5" id="InptTitle" required><br/>
            <label for="name">User: </label>
            <select name="user_id">
               <?php
                   foreach($users as $user)
                   {
                       echo '<option value="'.$user['id'].'">'.$user['name'].' '.$user['lastname'].'</option>';
                   }
               ?>
            </select>
            </br>
            </br>
            <input type="submit" value="Add article" name="submitBtn" id="btnSubmit">
        </form>
    </div>
</div>

<?php
include 'footer.html';
?>

<script>
    $(function(){
        var msg = "<?php echo $msg?>";
        if(msg != '')
        {
            $('.msg').slideDown().delay(3000).slideUp();
        }
    });
</script>