<?php 
class Posts extends Controller
{
    public function __construct()
    {
        $this->postModel = $this->model("Post");
    }

    public function index()
    {
        $posts = $this->postModel->findAllPosts();
        $data = [
            'posts' => $posts,
            'comment' => $this->allcomments()
        ];
        $this->view('posts/index', $data);
    }

    public function create()
    {
        if (!isLoggedIn()) {
            header("Location: " . URLROOT . "/posts");
        }
        $data=[            
            "title"=> "",
            "body" => "",
        ];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data=[
                "user_id"=> $_SESSION['user_id'],
                "title"=> trim($_POST['title']),
                "body" => trim($_POST['body'])
            ];
            if ($this->postModel->addPost($data)) {
                header("Location: " . URLROOT . "/posts");
            }
        }
        $this->view("posts/create", $data);
    }

    public function single($id)
    {
        
        $sposts = $this->postModel->singlePost($id);
        
        $data = [
            'post' => $sposts
            // 'comments'=> $comments
        ];
        $this->view('posts/single', $data);
        
    }

    public function update($id)
    {
        $post = $this->postModel->findPostById($id);

        $data=[
                'post'=> $post,
                "title"=> '',
                "body"=> '',
            ];
        $this->view('posts/update', $data);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data=[
                "id" => $id,
                'post' => $post,
                "user_id"=> $_SESSION['user_id'],
                "title"=> trim($_POST['title']),
                "body" => trim($_POST['body'])
            ];
            if ($this->postModel->updatePost($data)) {
                header("Location: " . URLROOT . "/posts");
            }
        }
        $this->view("posts/update", $data);
    }


    public function delete($id)
    {
        if ($this->postModel->deletePost($id)) {
            header("Location: " . URLROOT . "/posts");
        }
        
    }
    public function createComment()
    {

        if (!isLoggedIn()) {
            header("Location: " . URLROOT . "/posts");
        }
        $data=[      
            "user_id"=> "",
            "post_id"=> "",      
            "comment"=> ""
        ];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // print_r($_POST);
            $data=[
                "user_id"=> $_SESSION['user_id'],
                // "post_id"=> trim($_POST['post_id']),
                "post_id"=> 4,
                "comment" => trim($_POST['reply_text'])
            ];
            if ($this->postModel->addComment($data)) {
                header("Location: " . URLROOT . "/posts");
            }
        }
        // $this->view("posts/createComment", $data);
    }
    public function allcomments()
    {
        // print("aallcomment");
        $comments = $this->postModel->allcomment();
        return $comments;      
    }
}

    
?>