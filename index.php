<?php

$server='localhost';
$username='root';
$password='';
$database='todo_masters';

$conn = mysqli_connect($server,$username,$password,$database);

if($conn -> connect_errno){
    die('Connection to MySQL failed : ' .$conn ->connect_error);
}

//Creating ITEM
//var_dump($_POST);
if(isset($_POST['add'])){
    $item=$_POST['item'];
    if(!empty($item)){
        $query="INSERT INTO todo(naame) VALUES('$item')";
        if(mysqli_query($conn,$query)){
            echo'
            <center>
    <div class="alert alert-success" role="alert">
        Item Added Succesfully
    </div>
    </center>
            ';
        } else{
            echo mysqli_error($conn);
        }



    }

    }

    //Checking I f action parameter is filled

    if(isset($_GET['action'])){
        $itemId=$_GET['item'];
        if($_GET['action']=='done'){
            $query="UPDATE todo SET status = 1 WHERE id='$itemId'";
            if(mysqli_query($conn,$query)){
                echo'
                <center>
        <div class="alert alert-info" role="alert">
            Item Marked Done
        </div>
        </center>
                ';
            } else{
                echo mysqli_error($conn);
            }
    
    
        } else if($_GET['action']=='delete'){
            $query=" DELETE FROM todo WHERE id= '$itemId' ";
            if(mysqli_query($conn,$query)){
                echo'
                <center>
                <div class="alert alert-danger" role="alert">
                Item Deleted Succesfully
                 </div>
            </center>
                ';
            } else{
                echo mysqli_error($conn);
            }
            
        } 
    }
    
    




?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TO DO list Appllication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <style>
        .done{
            text-decoration: line-through;
        }
    </style>
</head>
<body>
    <main>
<!-- <center>
   <div class="alert alert-success" role="alert">
        Item Added Succesfully
    </div>
    <div class="alert alert-info" role="alert">
        Item Marked as Done
    </div>
    <div class="alert alert-danger" role="alert">
        Item Deleted Succesfully
    </div>
</center>
-->


    <div class="container pt-5">
        <div class="row">
            <div class="col-sm-12 col-md-3"></div>
            <div class="col-sm-12 col-md-6">
        <div class="card">
            <div class="card-header">
                <p>TODO List</p>
             </div>
             <div class="card-body">

             <form method="post" action="<?= $_SERVER['PHP_SELF']?>">
        <div class="mb-3">
            <input type="text" class="form-control" name="item" placeholder="Add a TO DO Item">
        </div>
        <input type="submit" class="btn-dark" name="add" value="Add Item">

</form>
     

<?php 
            $query= "SELECT * FROM todo";
           $result= mysqli_query($conn, $query);
           if($result->num_rows>0){
                $i=1;
            while($row=$result->fetch_assoc())
            {
                $done=$row['status']==1 ? "done": "";
                echo '<br>
                            <div class="row mt-4">
                            <div class="col-sm-12 col-md-1"><h4>'.$i.'.</h4></div>
                           <div class="col-sm-12 col-md-6"><h5  class="'.$done.'">'.$row['naame'].'</h5></div>
                           <div class="col-sm-12 col-md-5">

                               <a href="?action=done&item='.$row['id'].'" class="btn btn-outline-dark">Mark as Done</a>
                               <a href="?action=delete&item='.$row['id'].'"  class="btn btn-outline-danger">Delete</a>
                           </div>
                           </div> ';
                           $i++;
            }
} else{
    echo'
    <center>
           <img src="folder.png" width="50px" alt="Empty List"><br> <span>Your List is Empty</span>
        </center>
    ';
}

        
        
        ?>

            
        

    </div>
    </div>
        </div>
        </div>
        </div>
    </div>

    </main>
    



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $(".alert").fadeTo(5000,500).slideUp(500,function(){
                $('.alert').slideUp(500)


            })

        })
    </script>
</body>
</html>