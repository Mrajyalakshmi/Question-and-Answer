
<?php
include("navbar.php");
if(isset($_SESSION["username"])) {
}
else {
header("location: index.php");
}
?>
<html>
<body>
      <div class="container">
<div class="col-md-6">
        <div class="form-group">
    <form name="myForm" action="ques.php" onsubmit="return validate_askForm()" method="post"><br>
        <h3> Ask a Question</h3>
        <label for="content">Title:</label>&nbsp; <input type= "text " name="title" ><br><br>
         <label for="content">Content:</label>&nbsp;
        
            <textarea id="summernote" name="textbox"></textarea>
            <label for="tags">Tags:</label>&nbsp; <input type= "text " name="tags" ><br><br>
        
        <input type="submit" value="submit" name="submit">
            </form></div></div></div>  </body>
        </html>

  <script src="validate.js"></script>
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
  height: 170,                 // set editor height
  minHeight: null,             // set minimum height of editor
  maxHeight: null,             // set maximum height of editor
  focus: true                  // set focus to editable area after initializing summernote
});
    });
  </script>
        
       