<?php 

// var_dump(__DIR__);
require_once __DIR__ . '/header.php'; 

?>

    <main>
        <?php 
    if (isset($viewFile) && !empty($viewFile)) {
        require $viewFile; 
    } else {
        echo "Error: View file path is missing.";
    }
    ?>
    </main>

<?php 
require_once __DIR__ . '/footer.php'; 
?>