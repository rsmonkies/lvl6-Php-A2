<?php 
    session_start(); 
    require_once 'inc/functions.php';

    if (!isset($_SESSION['user']))
    {
        redirect('login', ["error" => "You need to be logged in to view this page"]);
    }

    $title = 'Member Page'; 
    require __DIR__ . "/inc/header.php"; 
?>

<h1>Welcome <?= $_SESSION['user']['firstname'] ?? 'Member' ?>!</h1>
<p><?php echo $_SESSION['user_type'];?></p>

<?php require __DIR__ . "/inc/footer.php"; ?>