 

<?php require APPROOT . '/views/inc/header.php'; ?>
    <h1><?php echo $data['title']; ?></h1>

    <?php 
        form_open( URLROOT."/home/index", 'post', 'form form-control');
            input( 'text', 'my-name' );
        form_close();
    ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>

