<?php 
session_start();
	include( "Awskomfunction/connecttodatabase.php" );
        include ( "Awskomfunction/Awskom.php" );
	if ( isset( $_SESSION['user_email'] ) ) {
	header( "location: home.php" );
	}else {
              include ('style/header.php'); 
?>
  <!DOCTYPE html>
<html lang="en-US">
      <head>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<style>
input:hover,
.btn:hover {
  opacity: 1;
}
.col {
  float: left;
  width: 50%;
  margin: auto;
  padding: 0 50px;
  margin-top: 6px;
}
.row:after {
  content: "";
  display: table;
  clear: both;
}
.vl {
  position: absolute;
  left: 50%;
  transform: translate(-50%);
  border: 2px solid #ddd;
  height: 175px;
}
.vl-innertext {
  position: absolute;
  top: 50%;
  transform: translate(-50%, -50%);
  background-color: #f1f1f1;
  border: 1px solid #ccc;
  border-radius: 50%;
  padding: 8px 10px;
}
.hide-md-lg {
  display: none;
}
.bottom-container {
  text-align: center;
  background-color: #666;
  border-radius: 0px 0px 4px 4px;
}
@media screen and (max-width: 650px) {
  .col {
    width: 100%;
    margin-top: 0;
  }
  .vl {
    display: none;
  }
  .hide-md-lg {
    display: block;
    text-align: center;
  }}
   </style> <div class='panel panel-secondary'>
   <div class='panel-body'>
        <div class="well">
        <div class="row clearfix">
        <div class="col-md-12 column">
        <h4 class="text-center">Cheap Flight and Hotel deals </a><br><a href="index.php">Log In</a> or <a href="index.php">Register</a> To use <a  href="index.php"><img src ="img/awskom01.png" width="60px" alt="userpic" height="57px"> </a> and post comments.</h4>
        </div></div></div>
   <div class="col-xs-12 col-sm-6 col-md-7"> 
  
<div class = "panel panel-danger">
   <div class = "panel-heading">
      <h3 class = "panel-title">We help our customers find best Flight and Hotel deals without any extra fees .</h3>
   </div>
   </div>     
</div>
   <div class="col-xs-12 col-sm-6 col-md-5"><div class="well">
        <div class="row clearfix">
        <div class="col-md-12 column">            
   <?php include( "head/header/registration_form.php" ); ?>
</div>
</div></div></div></div></div>
<h4 class="text-center"><img src="img/boeing.png" alt="airplane" style="width:70%;"></h4>
 <hr>
 <style>
 .card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}
.title {
  color: grey;
  font-size: 18px;
}
.collapsible {
  background-color: #777;
  color: white;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
}
.active, .collapsible:hover {
  background-color: #555;
}
.content {
  padding: 0 18px;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
  background-color: #f1f1f1;
}
 </style>
 <div class='panel panel-secondary'>
   <div class='panel-body'>
  <div class="col-sm-3">
  <div class="card">
  <img src="userimage/83young-woman-1745173_1920.jpg" alt="John" style="width:100%">
  <h1>Loveawskom</h1>
  <p class="title">Feel the vacation</p>
  <p>Home University</p>
  <div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-dribbble"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> 
  </div>
  </div></div>
  <div class="clearfix visible-xs-block"></div>
  <div class="col-sm-3">
  <div class="card">
  <img src="userimage/86man.jpg" alt="John" style="width:100%">
  <h1>Vidaloca</h1>
  <p class="title">Traveller</p>
  <p>Member on Awskom</p>
  <div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-dribbble"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> 
  </div>
  </div></div>
  <div class="col-sm-3"><div class="card">
  <img src="userimage/photo4.jpg" alt="John" style="width:100%">
  <h1>lool</h1>
  <p class="title">Germoniya tardiness</p>
  <p>Still waiting in the airport</p>
  <div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-dribbble"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> 
  </div>
  </div></div>
<div class="col-sm-3"><button class="collapsible"><i class="fa fa-plus" style="font-size:20px;"> Summertime ...</i>
</button>
<div class="content">
<p>Summertime . Feel the vacation in the best beach destinations in the World island fish fry , Bali , Maui and more . #beach #family #friends #adventure #destinations #tropicalvacation.</p>
</div>
<button class="collapsible"><i class="fa fa-plus" style="font-size:20px;"> Trip with friends ...</i></button>
<div class="content">
<p>Do you want to plan a Trip with friends ? You will be spending a lof of time with your travel companions, so think to discuss a budget early and everything you need is on the Officiel website www.awskom.com #Budget #famousplaces #adventure #flight #trip #friends</p>
</div>
<button class="collapsible"><i class="fa fa-plus" style="font-size:20px;"> Travel destinations ...</i></button>
<div class="content">
<p>Time to choose one of the best Travel destinations : #puebla #agra #budapest #buenosaires #balkanpeninsula #sanantonio #texas . which one you prefer most ?</p>
</div>
<button class="collapsible"><i class="fa fa-plus" style="font-size:20px;"> Somewhere ...</i></button>
<div class="content">
<p>Somewhere you have never been before ? It is time to explore new places. #Voyage #adventure #explore</p>
</div>
<script>
var coll = document.getElementsByClassName("collapsible");
var i;
for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });}
</script></div>
</div> </div> 
<div class="well">
<div class="row clearfix">
<div class="col-md-12 column"> <h4 class="text-center"><?php  include ("footer.php"); ?></h4> 
<?php    
  } ?>
