<h2><?php echo $title ?></h2>

<?php foreach ($news as $news_item): ?>

        <h3><?php echo $news_item['title'] ?></h3>
        <div class="main">
                <?php echo $news_item['text'] ?>
        </div>
        <p>
			<a href="news/<?php echo $news_item['slug'] ?>">View article</a>
			<a href="">Edit</a>
			<?php echo anchor('news/delete/'.$news_item['id'], 'delete', array('class'=>'delete', 'onclick'=>"return confirm('Are you sure you want to delete this person?')")); ?>
		</p>

<?php endforeach ?>