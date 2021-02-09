<div>
    <h1>Update Post</h1>
    <div>
        <form action="<?php echo URLROOT; ?>/posts/update/<?php echo $data['post']->id ?>" method="POST">
        <div class="form-item">
        <textarea type="text" name="title" value='<?php echo $data['post']->title ?>'><?php echo $data['post']->title ?></textarea>
        </div>
        <div class="form-item">
            <textarea type="text" name="body" value='<?php echo $data['post']->body ?>'><?php echo $data['post']->body ?></textarea>
        </div>
        <button class="btn green" name="submit" , type="submit">Submit</button>
        </form>
    </div>
</div>
