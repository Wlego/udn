<?php 
$CONNECT = mysqli_connect('localhost', 'root', '', 'udn1');
$data = file_get_contents ("posts.json");
        $json = json_decode($data, true);
        foreach ($json as $key => $value) {
             mysqli_query($CONNECT,"INSERT INTO `posts` (`userId`, `id`, `title`, `body`) VALUES ('".$value['userId']."', '".$value['id']."', '".$value['title']."', '".$value['body']."')");
             $sposts=$value['id'];
//            if (!is_array($value)) {
//                echo $key . '=>' . $value . '<br/>';
//            } else {
//                foreach ($value as $key => $val) {
//                    echo $key . '=>' . $val . '<br/>';
//                }            
        }
        
        
    $data1 = file_get_contents ("comments.json");
    $json1 = json_decode($data1, true);
        //print_r($json1);                   
            foreach ($json1 as $key => $value) {
                   mysqli_query($CONNECT,"INSERT INTO `comments` (`postId`, `id`, `name`, `body`) VALUES ('".$value['postId']."', '".$value['id']."', '".$value['name']."', '".$value['body']."')");
                   $scomments=$value['id'];
            } 
            
     echo "<script>console.log('загружено  " . $sposts . " записей, " . $scomments . " комминтариев' );</script>";        
?>

