<?php include_once '../includes/helpers.inc.html.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm delete Authors</title>
</head>
<body>
    <h1>Confirm Delete?</h1>
    <form action="" method="post">
        <div>
            Do you really want to delete: <b><?php html($name); ?></b> and all of his jokes?
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="action" value="Yes">
            <input type="submit" name="action" value="No">
        </div>
    </form>
</body>
</html>