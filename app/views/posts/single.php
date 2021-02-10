<div>

    <div>
    
        <h2>
            <?php echo $data['post']->title; ?>

        </h2>
        <h3>
            <?php echo "Created on: " .date('F j h:m' , strtotime( $data['post']->created_at)) ?>
        </h3>
        <p>
            <?php echo $data['post']->body; ?>
        </p>

    </div>

</div>