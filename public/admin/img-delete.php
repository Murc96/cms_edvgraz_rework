<?php
require '../../src/bootstrap.php';

$id = filter_input( INPUT_GET, 'id', FILTER_VALIDATE_INT );
if ( ! $id ) {
	redirect( 'articles.php', [ 'error' => 'Article not found (id)' ] );
}

$article = $cms->getArticle()->fetch( $id );
if ( ! $article ) {
	redirect( 'articles.php', [ 'error' => 'Article not found' ] );
}

if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
	try {
        
		$cms->getImage()->delete( $article['image_id'] );
		unlink( UPLOAD_DIR . $article['filename'] );
		
		redirect( 'article.php', [ 'success' => 'Article deleted' ] );
	} catch ( PDOException $e ) {
		redirect( 'article.php', [ 'error' => 'Article could not be deleted' ] );
	}
}
?>

<?php include '../includes/header-admin.php' ?>
<main class="container mx-auto p-10 flex flex-col items-center">
    <form method="post" action="img-delete.php?id=<?= $article['image_id'] ?>">
        <input type="hidden" name="id" value="<?= $article['image_id'] ?>">
        <p class="text-blue-600 text-2xl mb-4">Are you sure you want to delete this Picture?</p>
        <button type="submit" class="bg-pink-600 text-white p-3 rounded-md w-1/3">Yes</button>
        <button type="submit" formaction="article.php" class="bg-blue-500 text-white p-3 rounded-md w-1/3">No</button>
    </form>
</main>
<?php include '../includes/footer-admin.php' ?>