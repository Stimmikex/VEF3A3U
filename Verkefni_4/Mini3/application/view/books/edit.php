<div class="container">
    <!-- edit book form -->
    <div>
        <h3>Edit a book</h3>
        <form action="<?php echo URL; ?>books/updatebook" method="POST">
            <label>Name</label>
            <input autofocus type="text" name="name" value="<?php echo htmlspecialchars($book->name, ENT_QUOTES, 'UTF-8'); ?>" required />
            <label>Author</label>
            <input type="text" name="author" value="<?php echo htmlspecialchars($book->author, ENT_QUOTES, 'UTF-8'); ?>" required />
            <label>Pages</label>
            <input type="text" name="pages" value="<?php echo htmlspecialchars($book->pages, ENT_QUOTES, 'UTF-8'); ?>" /><br>
            <label>Description</label><br>
            <textarea name="description" cols="50" rows="20"><?php echo htmlspecialchars($book->description, ENT_QUOTES, 'UTF-8'); ?></textarea><br>
            <input type="hidden" name="book_id" value="<?php echo htmlspecialchars($book->id, ENT_QUOTES, 'UTF-8'); ?>" />
            <input type="submit" name="submit_update_book" value="Update" />
        </form>
    </div>
</div>

