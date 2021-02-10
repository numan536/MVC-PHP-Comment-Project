
<div class='container'>
    <h1>Create New Post</h1>
    <form action="<?php echo URLROOT; ?>/posts/create" method="POST">
        <div class='form-item'>
            <input type="text" name="title" placeholder="Title..." />

            <textarea name="body" placeholder="Body"></textarea>
        </div>
        <button class='btn green' name="submit " type="submit">Submit</button>
    </form>
</div>

