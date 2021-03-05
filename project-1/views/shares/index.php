<div>
    </br></br>
    <?php if(isset($_SESSION['is_logged_in'])) : ?>
        <a class="btn btn-success btn-share" href="<?php echo ROOT_PATH; ?>shares/add">Share something</a>
    <?php endif; ?>
    </br></br>
    <?php foreach($viewModel as $item) : ?>
        <div class="well">
        <h3><?php echo $item['title']; ?></h3>
        <small><?php echo $item['create_date']; ?></small>
        </div>
        </hr>
        <p><?php echo $item['body']; ?></p>
        <a class="btn btn-default" href="<?php echo $item['link']; ?>" target="_blank">Go to website</a>
    <?php endforeach; ?>
</div>
