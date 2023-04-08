 

<?php require APPROOT . '/views/inc/header.php'; ?>
    <h1><?php echo $data['title']; ?></h1>
    <?php 
        print_r($data['posts'])
    ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>

