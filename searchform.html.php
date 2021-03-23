<?php include_once './admin/includes/helpers.inc.html.php';?>
    <form action="?search" method="get">
        <h2 class = "text-center top-buffer">Search for more recipes</h2>
        <div class="text-center top-buffer">
            <label for="author">By author:</label>
            <select name="author" id="author">
                <option value="">Any author</option>
                <?php foreach ($authors as $author): ?>
                    <option value="<?php html($author['id']);?>"><?php html($author['name']);?></option>
                <?php endforeach;?>
                </select>
        </div>
        <div class="text-center mt-2">
            <label for="category">By category:</label>
            <select name="category" id="category">
                <option value="">Any category</option>
                <?php foreach ($categories as $category): ?>
                <option value="<?php html($category['id']);?>"><?php html($category['name']);?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="text-center mt-2">
            <label for="text">Containing text:</label>
            <input type="text" name="text" id="text">
        </div>
        <button class="btn d-block mx-auto mt-5 mb-5 btn-outline-primary text-center" type="submit" name="action" value="search">Search now!</button>
            <!-- <input type="submit" name="action" value="search"> -->
                </form>