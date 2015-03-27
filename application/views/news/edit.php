<h2><?php echo $title ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('news/edit', $id) ?>

    <label for="title">Title</label>
    <input type="input" name="title" value="<?php echo $news_title ?>" /><br />

    <label for="text">Text</label>
    <textarea name="text"><?php echo $news_text ?></textarea><br />

    <input type="submit" name="submit" value="Edit news item" />

</form>