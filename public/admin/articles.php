<?php
require '../../src/bootstrap.php';



$articles = $cms->getArticle()->getAll();
?>

<?php include '../includes/header-admin.php'; ?>
<main class="container mx-auto p-5">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl text-blue-500">Article Overview</h1>
        <a href="article.php" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add New Article</a>
    </div>
    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2">Image</th>
                <th class="border border-gray-300 px-4 py-2">Title</th>
                <th class="border border-gray-300 px-4 py-2">Created</th>
                <th class="border border-gray-300 px-4 py-2">Published</th>
                <th class="border border-gray-300 px-4 py-2">Category</th>
                <th class="border border-gray-300 px-4 py-2">User</th>
                <th class="border border-gray-300 px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articles as $article): ?>
            <tr class="hover:bg-gray-100">
                <td class="border border-gray-300 px-4 py-2">
                    <?php if ($article['image_file']): ?>
                        <img src="../uploads/<?= e($article['image_file']) ?>" alt="<?= e($article['image_alt']) ?>" class="h-16 w-16 object-cover">
                    <?php else: ?>
                        No Image
                    <?php endif; ?>
                </td>
                <td class="border border-gray-300 px-4 py-2"><?= e($article['title']) ?></td>
                <td class="border border-gray-300 px-4 py-2"><?= e($article['created']) ?></td>
                <td class="border border-gray-300 px-4 py-2"><?= $article['published'] ? 'Yes' : 'No' ?></td>
                <td class="border border-gray-300 px-4 py-2"><?= e($article['category']) ?></td>
                <td class="border border-gray-300 px-4 py-2"><?= e($article['author']) ?></td>
                <td class="border border-gray-300 px-4 py-2">
                    <a href="article.php?id=<?= $article['id'] ?>" class="text-blue-500 hover:underline">Edit</a>
                    <a href="article-delete.php?id=<?= $article['id'] ?>" class="text-red-500 hover:underline">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>
<?php include '../includes/footer-admin.php'; ?>



