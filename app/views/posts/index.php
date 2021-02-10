<div class="container">

  <?php if(isLoggedIn()): ?>
    <a href="<?php echo URLROOT; ?>/posts/create">Create Post</a>
  <?php endif; ?>

  <?php foreach($data['posts'] as $post):?>

    <div>

      <?php //if(isLoggedIn()): ?>

        <a class="btn red" href="<?php echo URLROOT . "/posts/update" . "/" . $post->id ?>">Update</a>
        <form action="<?php echo URLROOT . "/posts/delete" . "/" . $post->id ?>" method="POST">
          <input type="submit" name="delete" value="delete" class="btn red" />
        </form>
        <form action="<?php echo URLROOT . "/posts/single/" . $post->id ?>" method="POST">
          <input type="submit" name="view" value="View" class="btn red" />
        </form>
        
      <?php //endif; ?>

      <h2>
          <?php echo $post->title; ?>
      </h2>
      <h3>
          <?php echo "Created on: " .date('F j h:m' , strtotime( $post->created_at)) ?>
      </h3>
      <p>
          <?php echo $post->body; ?>
      </p>

    <div>

    <h4>Add Comment</h4>

    <form action="<?php echo URLROOT; ?>/posts/createComment" class="reply_form clearfix" id="<?php echo $comment['user_id '] ?>" data-id="<?php echo $comment['post_id ']; ?>" method="POST">
        <textarea class="form-control" name="reply_text" type="comment" cols="30" rows="2" placeholder="Leave a Comment" style="width: 400px; height: 200px;"></textarea>
        <input type="hidden" id="post_id " name="post_id"value="<?php echo $comment['post_id '] ?>"/>

        <button class="btn btn-primary btn-xs pull-right submit-reply">Submit reply</button>
    </form>

  <?php endforeach; ?>

</div>

<div class="container">

  <?php foreach($data["comment"] as $com):?>
    <div>
      <h2>
        <?php echo $com->comment; ?>
      </h2>
    </div>
  <?php endforeach; ?>

</div>