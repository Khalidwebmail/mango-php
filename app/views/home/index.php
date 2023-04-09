 

<?php require APPROOT . '/views/inc/header.php'; ?>
    <h1><?php echo $data['title']; ?></h1>

    <form action="<?php echo URLROOT . '/home/submitForm'?>" method="post">
        <input type="hidden" name="_token" value="<?php generateToken() ?>">
        <input type="text" name="my_name">
        <input type="submit" name="submit" value="Submit">
    </form>
<?php require APPROOT . '/views/inc/footer.php'; ?>

