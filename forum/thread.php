<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to discuss coding</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
  <?php require '_header.php';
    ?>
    <?php require '_dbconnect.php';
    ?>
<?php
     $id=$_GET['threadid']; 
?> 
<?php
$showalert=false;
$method=$_SERVER['REQUEST_METHOD'];
if($method=='POST'){
  $comment=$_POST['comment']; 
  $sql="INSERT INTO `comments` (`comment_id`, `comment_text`, `thread_id`, `dt`) VALUES (NULL, '$comment', '$id', current_timestamp());";
  $result=mysqli_query($conn,$sql);       
  $showalert=true;
}
if($showalert==true){
  echo'<div class="alert alert-success" role="alert">
  success!Your thread has been added.
</div>'; 
}
?>


    <?php
     $id=$_GET['threadid'];  
 $sql="SELECT * FROM `threads` WHERE threads_id=$id"; 
    $result=mysqli_query($conn,$sql); 
    while($row=mysqli_fetch_assoc($result)){  
   echo' <div class="cantainer my-4" style="background-color: #00803b57; margin-right: 164px;margin-left: 164px;"> 
    <div class="jumbotron">
  <h1 class="display-4">'. $row['threads_title'] .'</h1>
  <p class="lead">'.$row['threads_desc'].'</p>  
  <hr class="my-4">  
  <p>This is peer to peer share a knowledge.</p>
  <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
</div>
    </div>';
      } 
?> 

<div class="cantainer"style="margin-right: 164px;margin-left: 164px;">
<h1>post a comment</h1>
<form action="<?php $_SERVER['REQUEST_URI']?>" method="post">  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">type your comment</label> 
    <textarea class="form-control" id="desc"name="comment" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-success my-2">post comment</button>
</form>
</div>


<h1 style="margin-right: 164px;margin-left: 164px;">Discussions</h1>
    <div class="cantainer"style="margin-right: 164px;margin-left: 164px;">
        <?php
     $id=$_GET['threadid'];  
 $sql="SELECT * FROM `comments` WHERE thread_id=$id";     
    $result=mysqli_query($conn,$sql); 
    $noresult=true;
    while($row=mysqli_fetch_assoc($result)){  
      $noresult=false;
   echo' <div class="media my-3">
   <div class="media-body my-3">
     <h5 class="mt-0"><img src="150-1503945_transparent-user-png-default-user-image-png-png.png" width="34px"class="mr-3" alt="...">anonymous user '.$row['dt'].'</h5> 
     '.$row['comment_text'].'
   </div>
 </div>';
      }
      if($noresult){
        echo'<div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">No Result found</h1>
          <p class="lead">be the first person write a answer.</p> 
        </div>
      </div>';
      }
?>  
</div>

    <?php require '_footer.php'
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>