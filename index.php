
<!DOCTYPE html>
<html>
  <head>
    <style>
      .carousel-inner > .item > img,
      .carousel-inner > .item > a > img {
        display: block;
        max-width: 100%;
        height: 300px !important;
      }
      .carousel-control {
        &.left, &.right {
          background-image: none;
          @include reset-filter();
        }
      }
    </style>
    <title>EXchange
    </title>
    <link href="site.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
    </script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js">
    </script>
  </head>
    
  <body>
    <?php  
include("connection.php");
$query=mysqli_query($conn,"SELECT username, qid, title, sum(votes) v from vote,question,asker WHERE vtype = 'q' and quesid=qid and question.uid=asker.uid GROUP by quesid ORDER BY v desc limit 5");
function answer_count($id){
    global $conn;
$query1="SELECT COUNT(qid) cnt FROM answer WHERE qid='$id' ";
$q=mysqli_query($conn,$query1);
$result=mysqli_fetch_assoc($q);
$count=$result['cnt'];
    return $count;
}
function vote_count($id,$type){
global $conn;
$qq="SELECT SUM(votes) as vsum from vote where quesid='$id' and vtype='$type'";
//echo $qq;
$query3=mysqli_query($conn,$qq);
$result=mysqli_fetch_assoc($query3);
$sum=$result['vsum'];
    return $sum;
} 
?>
    <br> <div class="container">
    <br><div class="row">
             <div class="col-sm-6">
   
                 <img class="img-responsive" src="images/exchange.PNG " style=width:400px;height:100px alt= "image" ></div><br>
      <br>

      <div id="menu"><div class="col-sm-6">
          
        <nav id="nav01">
          <ul id='menu1'>
            <li>
              <a href='index.php'>Home
              </a>
            </li>
            <li>
              <a href='registerrr.php'>Sign up
              </a>
            </li>
            <li>
              <a href='login.php'>Log in
              </a>
            </li>
              <li>
              <a href='help.html'> Help
              </a>
            </li>
          </ul>
        </nav>
         </div></div>
      <br>
      <br>
      <br>
      <br>
      
         
        <h3> Questions
          </h3></div>
        
      <div class="container">
	     <div class="table-responsive">
		  <table class="table table-striped" >
        <?php 
        while($row = mysqli_fetch_array($query)){
        echo" <tr> ";
        echo" <td> ";
        echo"<div class='row'>";
         echo "<div class='col-sm-1'>";
         if(vote_count($row['qid'],'q')==0)
               echo"<p id='vote'>0</p>";
            else
        echo "<p id=''>".vote_count($row['qid'],'q')."</p>";
        echo"<p>votes</p>";
        echo"</div>";
         echo "<div class='col-sm-1'>";
         if(answer_count($row['qid'])==0)
               echo"<p id='answer'>0</p>";
            else
        echo "<p id='answer'>".answer_count($row['qid'])."</p>";
        echo"<p>answers</p>";
        echo"</div>";
        echo "<div class='col-sm-10'>";
        echo"<h4>".$row['title']."</h4></a><br>";
        echo"<div class='col-sm-2' style='float:right' color='red'>";
            echo "<p class=rytsydcenter> Asked by:".$row['username'];
             ?>
             <img width='15' height='20' src='./profile_pictures/<?php echo $row['username']; ?>' onerror='this.src="./profile_pictures/defaultpic.png";'/>
        <?php
            
        echo"</div>";
        echo "</td></tr>";
             echo"</div>";
         }
        
       
       echo"</table>" ;
      echo"</div>" ;
mysqli_close($conn);
?>
      <center>
        <footer id="foot01">
        </footer>
      </center>
              </div></div></div></div>
    <script src="footer.js">
    </script> 
  </body
    </html>
