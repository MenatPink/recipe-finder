<?php include_once '../recipes/admin/includes/helpers.inc.html.php';?>
    <form action="?search" method="get">
        <p>View Recipes satisfying the following criteria</p>
        <div>
            <label for="author">By author:</label>
            <select name="author" id="author">
                <option value="">Any author</option>
                <?php foreach ($authors as $author): ?>
                    <option value="<?php html($author['id']);?>"><?php html($author['name']);?></option>
                <?php endforeach;?>
                </select>
        </div>
        <div>
            <label for="category">By category:</label>
            <select name="category" id="category">
                <option value="">Any category</option>
                <?php foreach ($categories as $category): ?>
                <option value="<?php html($category['id']);?>"><?php html($category['name']);?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div>
            <label for="text">Containing text:</label>
            <input type="text" name="text" id="text">
        </div>
        <div>
            <input type="submit" name="action" value="search">
        </div>
                </form>