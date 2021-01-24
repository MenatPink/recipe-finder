<body>
    <h1 class="text-center">More Search Results</h1>
    <?php if(isset($searchresults)): ?>
    <table class = "mx-auto mt-5" border = "1px">
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
        <p class="text-center mt-4"><a href="?">New search</a></p>
</body>
</html>