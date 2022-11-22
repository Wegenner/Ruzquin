 
<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_header.php";

?>

<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">PHP Tutorial</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="label label-pill label-danger count" style="border-radius:10px;"></span> 
                        <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span>
                    </a>
                    <div class="dropdown" aria-labelledby="navbarDropdownMenuLink">

                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="label label-pill label-danger count" style="border-radius:10px;"></span> 
                        <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span>
                    Dropdown link
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <?php echo "<div class='notification-item'>" .
                            "<div class='notification-subject'>". "IAN" . " - <span>". "10-03-2022" . "</span> </div>" . 
                            "<div class='notification-comment'>" . "Las cosas como son xv"  . "</div>" .
                            "</div>"; ?>
                    </div>
                </li>
                <li>
                    <span class="count" style="border-radius:10px;"></span> 
                    <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span>
                </li>
            </ul>
        </div>
    </nav>
    <br />

<form name="comment_form" id="comment_form" method="post" >
   <div class="form-group">
       <label for="autor">Autor </label>
       <input type="text" class="form-control" name="autor" id="autor" placeholder="Ingresa Autor" required>
   </div>
   <div class="form-group">
       <label for="mensaje">Mensaje </label>
       <textarea class="form-control" name="mensaje" id="mensaje" rows="3" placeholder="Mensaje" required></textarea>
   </div>
   <div class="form-group">
       <input type="submit" name="Post" id="btn-info" value="Post">
   </div>
</form>

<div class="container ejemplo">

</div>

<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_footer.php";
?>