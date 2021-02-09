<div>
<?php 
    if(isLoggedIn()): ?>
    <a class='btn green' href="<?php echo URLROOT; ?>/posts/create">Create Post</a>
    <?php endif; ?>
    <div>
    <?php if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == $post->$user_id):?>
    <?php 
    if(isLoggedIn()): ?>
    <a class="btn orrange" href="<?php echo URLROOT . "/posts/update" .  $post->id ?>">Update</a>
    <?php endif; ?>
    <?php endif; ?>
    <?php 
    if(isLoggedIn()): ?>
    <a class="btn orrange" href="<?php echo URLROOT . "/posts/delete" .  $post->id ?>">Delete</a>
    <?php endif; ?>
        <h2>
            <?php echo $post->title; ?>
        </h2>
        <h3>
            <?php echo "Created on: " .date('F j h:m' , strtotime( $post->created_at)) ?>
        </h3>
        <p>
            <?php echo $post->body; ?>
        </p>
    </div>
</div>