<?php include_once '../admin/includes/helpers.inc.html.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;1,600&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/main.css">
        <title>Menat's Recipes</title>
    </head>
<body>
    <h1>Confirm Delete?</h1>
    <form action="" method="post">
        <div>
            Do you really want to delete: <b><?php html($name); ?></b> and all of his recipes?
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="action" value="Yes">
            <input type="submit" name="action" value="No">
        </div>
    </form>
</body>
</html>