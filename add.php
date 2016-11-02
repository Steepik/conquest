<?php
include 'lib/DB.php';
include 'header.html';
include 'lib/Request.php';

    if(isset($_POST['submitBtn']))
    {
        $db = new DB();
        $name = Request::filtration($_POST['name']);
        $lastname = Request::filtration($_POST['lastname']);

        $userData = array(
            'name' => $name,
            'lastname' => $lastname
        );

        if($db->insert('users', $userData))
        {
            $msg = 'New user has been added';
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
            <label for="name">Name: </label>
            <input type="text" name="name" placeholder="Enter name" minlength="2" id="InptName" required><br\>
            <label for="name">Last Name: </label>
            <input type="text" name="lastname" placeholder="Enter lastname" minlength="2" id="InptLastName" required><br\>
            <input type="submit" value="Add" name="submitBtn" id="btnSubmit">
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