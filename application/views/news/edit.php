<h2><?php echo $title ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('news/edit') ?>

    <label for="title">Title</label>
    <input type="input" name="title" value=" <?php echo $editable_news['title'] ?> " /><br />

    <label for="text">Text</label>
    <textarea name="text" value=" <?php echo $editable_news['text'] ?> "></textarea><br />

    <input type="submit" name="submit" value="Edit news item" />

</form>