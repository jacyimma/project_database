
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
       
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">      
       
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
 
        <style>
        body{
          overflow-x:hidden;
        }
        .nav{
          margin:70px 0px 100px 0px;
        }
          .body{
                font-family: 'Nunito', sans-serif;
                display:flex;
                padding-left:10%;
                flex-direction:row;
                font-size:16px;
                margin-top:100px;
                background:#e8e8e8;
            }
            .card{
              width:100%;
              height:350px;
              margin:10px 10px;
            }
            img{
              width:100%;
              height:auto;
            }
            .close,.open{
              cursor: pointer;
            }
            .group-cards{
              margin-left:10%;
            }
            .tags{
              display:inline-block;
              margin: 20px 10% 20px 50%;
            }
            .browser-default{
                border-radius:5px;
        
            }
            .logo{
              height:60px;
              width:130px;
              margin-left:50px;
            }
            .navbar{
              position: fixed;
              top:0;
              left:0;
              z-index:99;
            }
            .links{
              color:black;
              font-size:15px;
            }
        </style>
    </head>

    <?php     
          $conn = oci_connect('System', 'omsnyh2001', 'localhost/XE','AL32UTF8');
          if (!$conn) {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
           } 

?>
<div class="row">
<div class="col s12">
<nav class='navbar white'>
    <div class="nav-wrapper">
        <img src="{{asset('images/logo.jpg')}}" alt="" class='logo'>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li> 
          <form action="{{route('login')}}" method="get">
              <input type="submit" value="Log in">
          </form>
        </li>
      </ul>
    </div>
  </nav>
</div>
</div>
<?php
    $curs1 = oci_new_cursor($conn);
    $stid1 = oci_parse($conn, "begin  top_1.top1(:cursbv); end;");
    oci_bind_by_name($stid1, ":cursbv", $curs1, -1, OCI_B_CURSOR);
    oci_execute($stid1);
    oci_execute($curs1); 
    while (($row = oci_fetch_array($curs1, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                $id = $row['ID'];
                $name =  $row['TITLE'];
                $jname =  $row['PRICE'];
                $size =  $row['PRODUCT_VARIATION_SIZE_ID'];
                $rating =  $row['RATING'];
   ?>
<div class="row">
<div class="col s6"></div>
 <div class="col s4">
 <nav class='nav'>
    <div class="nav-wrapper blue">
      <form action="{{  route('search')}}" method="GET">
      {{ csrf_field() }}
        <div class="input-field search">
          <input id="text" type="search" name="search" required>
          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
           <input type="submit" class="btn blue" value="search">
        </div>
      </form>
    </div>
  </nav>
 </div>
</div>

         
<form action="{{  route('select')}}" method="GET">
{{ csrf_field() }}
<div class="row">
<div class="col s4">
</div>
<div class="col s2">
<span>Sort by price</span>
</div>
<div class="col s3">
<select class="browser-default blue lighten-5" name="byprice">
    <option value="" disabled selected>Choose your option</option>
    <option value="ASC">Increasing</option>
    <option value="DESC">Decreasing</option>
  </select>
</div>
<div class="col s3"></div>
</div>
<div class="row">
<div class="col s4">
</div>
<div class="col s2">
<span>Sort by rating</span>
</div>
<div class="col s3">
<select class="browser-default blue lighten-5" name="byrating">
    <option value="" disabled selected>Choose your option</option>
    <option value="ASC">Increasing</option>
    <option value="DESC">Decreasing</option>
  </select>
</div>
<div class="col s3"></div>
</div>
<div class="row">
<div class="col s4">
</div>
<div class="col s2">
<span>Sort by size</span>
</div>
<div class="col s3">
<select class="browser-default blue lighten-5" name="bysize">
    <option value="" disabled selected>Choose your option</option>
    <option value="1">M</option>
    <option value="2">S</option>
    <option value="3">L</option>
  </select>
</div>
<div class="col s3"></div>
</div>
<input type="submit" class="btn" value="select">

</form>
<?php
}
?>
   <div class="main" id="TOP-18_pop">
 <div class="row group-cards">
    <?php
    $curs1 = oci_new_cursor($conn);
    $stid1 = oci_parse($conn, "begin  top_anime1.top_anime_181(:cursbv); end;");
    oci_bind_by_name($stid1, ":cursbv", $curs1, -1, OCI_B_CURSOR);
    oci_execute($stid1);
    oci_execute($curs1); 
    while (($row = oci_fetch_array($curs1, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
    $id = $row['ID'];
                $name =  $row['TITLE'];
                $jname =  $row['PRICE'];
                $jimage =  $row['PRODUCT_PICTURE'];
         ?>
  
 <div class="col m2 card z-depth-3">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="<?php echo $jimage?>">
    </div>
    <div class="card-content">
      <span class=" activator grey-text text-darken-4"><?php echo substr($name,0,50) ?><i class="material-icons right open">more_vert</i></span>
      <p><?php echo $jname ?></p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4"><i class="material-icons right close">close</i></span>
      <p>Here is some more information about this product that is only revealed once clicked on.</p>
      <p><?php echo $id ?></p>
      <form action="{{ route('enter')}}" method = "get"> 
                {{ csrf_field() }}
                <input type="text"  name="anime_s" style="display: none;" value="<?php echo $id ?>" required>
                <button type="submit" class="btn indigo lighten-1" style="float: right;">Enter</button> </form>
    </div>
  </div>

  <?php
    }
    oci_free_statement($stid1);
    oci_free_statement($curs1);
  ?>
</div>
