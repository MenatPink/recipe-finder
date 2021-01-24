<?php include_once '../recipes/admin/includes/helpers.inc.html.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Recipes: Search Results</title>
</head>
<body>
    <h1>Search Results</h1>
    <?php if(isset($searchresults)): ?>
    <table border = "1px">
        <tr>
            <th>Recipe Name</th>
            <th>Recipe Text</th>
        </tr>
        <?php foreach ($searchresults as $searchresult): ?>
        <tr>
            <td><?php html($searchresult['name']); ?></td>
            <td><?php html($searchresult['text']); ?></td>
        </tr>
<?php endforeach;?>
    </table>
        <?php endif; ?>
        <p><a href="?">New search</a></p>
</body>
</html>