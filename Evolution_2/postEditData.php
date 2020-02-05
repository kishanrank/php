<?php 


$conn = mysqli_connect('localhost', 'root', '', 'login_session');
function prepareBlogData(){
    if(isset($_POST['blog'])){
        $data = $_POST['blog'];
        $preparedData = [];
        foreach ($data as $key => $value) {
            switch ($key) {
                case 'title':
                    $preparedData['title'] = $value;
                break;

                case 'content':
                    $preparedData['content'] = $value;
                break;

                case 'url':
                    $preparedData['url'] = $value;
                break;

                case 'published':
                    $preparedData['published_at'] = $value;
                break;

                case 'category':
                    //$cat = implode(",",$_POST['blog']['category']);
                    $preparedData['category'] = $value;
                                
            }
        }
    }   
}

if(isset($_POST['update'])){
    $blog = prepareBlogData();
    $id = $_GET['id'];
    //updateRecord($conn,"blog_post",$blog,"b_id = '$id' ");
}

?>