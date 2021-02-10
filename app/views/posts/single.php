<div>

    <div>
    
        <h2>
            <?php echo $pdata['post']->title; ?>
        </h2>
        <h3>
            <?php echo "Created on: " .date('F j h:m' , strtotime( $pdata['post']->created_at)) ?>
        </h3>
        <p>
            <?php echo $pdata['post']->body; ?>
        </p>

    </div>

</div>