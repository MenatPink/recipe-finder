<body>
    <h1 class="text-center">More Search Results</h1>
    <?php if(isset($searchresults)): ?>
    <table class = "mx-auto mt-5">
        <tr>
            <th class = "text-center">Recipe Name</th>
            <th class = "text-center">Recipe Instructions</th>
        </tr>
        <?php foreach ($searchresults as $searchresult): ?>
        <tr>
            <td class = "text-center"><?php html($searchresult['name']); ?></td>
            <td class = "text-center"><?php html($searchresult['text']); ?></td>
        </tr>
<?php endforeach;?>
    </table>
        <?php endif; ?>
        <p class="text-center mt-4"><a href="?">New search</a></p>
</body>
</html>