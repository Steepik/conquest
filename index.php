<?php
include 'lib/DB.php';
include 'header.html';

$db = new DB();
$users = $db->getRows('users', array('order_by' => 'id DESC'));

$sql = "SELECT * FROM `users` as t1 LEFT JOIN `articles` as t2 ON t1.id = t2.user_id ORDER BY t2.id DESC";
$query = $db->db->prepare($sql);
$query->execute();
$articles = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<body>
    <div id="app">
        <table border>
            <tr>
                <td><u>User's name</u></td>
                <td><u>Article's name</u></td>
            </tr>
                <?php
                    foreach ($articles as $article)
                    {
                        echo '<tr><td>'.$article['name'].' '.$article['lastname'].'</td>';
                        echo '<td>'.$article['title'].'</td></tr>';
                    }
                ?>
        </table>
    </div>
<?php
    include 'footer.html';
?>
</body>
</html>