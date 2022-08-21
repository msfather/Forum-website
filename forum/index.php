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
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://source.unsplash.com/2400x700/?coding, water" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://source.unsplash.com/2400x700/?programmer, water" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://source.unsplash.com/2400x700/?coding, water" class="d-block w-100" alt="...">
    </div>
  </div>
</div>
    <h2 class="cantainer text-center">discuss-Categories</h2>
    <div class="row">

    <?php
    $sql="SELECT * FROM `categories`";
    $result=mysqli_query($conn,$sql); 
    while($row=mysqli_fetch_assoc($result)){
        $id=$row['category_id'];
       echo' <div class="card" style="width: 18rem;margin:100px">
       <img src="https://source.unsplash.com/500x400/?'. $row['category_name'] .' programmer" class="card-img-top" alt="...">
       <div class="card-body">
         <h5 class="card-title">'.$row['category_name'].'</h5>
         <p class="card-text">'.substr($row['category_description'],0,50).'....</p> 
         <a href="threadlist.php?catid='.$id.'" class="btn btn-primary">Go somewhere</a> 
       </div>
     </div>';
    } 
    ?>





    <?php require '_footer.php'
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>