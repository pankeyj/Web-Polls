<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  <link rel="stylesheet" href="skeleton.css">
  <link rel="stylesheet" href="normalize.css">  
  <link rel="stylesheet" href="style.css">
  <title> Jake's Web Polls </title>
  <meta name="description" content="A simple polling service created by Jacob Pankey to expand upon web development skills complete an honors senior project">
  <meta name="keywords" content="Grand Valley, Polls, Poll, Jacob Pankey, Jake's
eb Polls, Simple Polls, Jake's Web Polls, Simple, cis, gvsu, edu, computer science">
<script>

// Function to add Polls to the database
$ (document).ready(function(){
  $("#addPoll").submit(function(event) {
    event.preventDefault();
    var $form = $( this ),
    url = $form.attr( 'action' );
    var user = "Anonymous";
    if(!(localStorage.user === undefined)){
      user = localStorage.user;
    }
    document.getElementById("user").value = user;



    /* Send the data using post with form fields */
    var posting = $.post( url,
    {
      title: $('#title').val(), 
      option1: $('#option1').val(),
      option2: $('#option2').val(), 
      option3: $('#option3').val(), 
      option4: $('#option4').val(),
      user: $('#user').val()
    } );

    posting.done(function( data ) {
      alert('success');
    });
  event.preventDefault();
  });
});


// Verify user logins
$ (document).ready(function(){
    $("#login").submit(function(event) {
    event.preventDefault();
    var $form = $( this ),
    url = $form.attr( 'action' );

    /* Send the data using post with form fields */
    var posting = $.post( url,
    {
      username: $('#username').val(), 
      password: $('#password').val(),
    } );

    posting.done(function( data ) {
      var response = JSON.parse(data);
      if(response['success'])
      {
        alert("successful login");
        localStorage.setItem("user", $('#username').val());
 	document.getElementById("userID").innerHTML = "You are signed in as " + localStorage.user;
      }else{
        alert("invalid credentials");
      }

    });

    posting.fail(function() {
      alert('failure');
    });
    event.preventDefault();
  });
});


$ (document).ready(function(){
  $("#logout").click(function(event) {
    localStorage.clear();
    if(!(localStorage.user === undefined)){
      document.getElementById("userID").innerHTML = "You are signed in as " + localStorage.user;
      alert("Unable to log out");
    }else{
      document.getElementById("userID").innerHTML = "Anonymous";
      alert("Successful Logout");
    }
  });
});
// Create a new user in the database
$ (document).ready(function(){
  $("#createUser").submit(function(event) {
    event.preventDefault();
    var $form = $( this ),
    url = $form.attr( 'action' );

    /* Send the data using post with form fields */
    var posting = $.post( url,
    {
      username: $('#newusername').val(), 
      password: $('#newpassword').val(),
    } );

    posting.done(function( data ) {
      alert('New User Created');
    });
  event.preventDefault();
  });
});


$ (document).ready(function(){
    if(!(localStorage.user === undefined)){
      document.getElementById("userID").innerHTML = "You are signed in as " + localStorage.user;
    }else{
      document.getElementById("userID").innerHTML = "Anonymous"
    }
});

</script>







</head>

<body>

  <div class="title">
    <h1> <b> Jake's Web Polls </b> </h1>
    <h2> Simple Polling For Simple People </h2>
  </div>


  <ul class="topnav
" id="myNav">
    <li><a href='home.php'>HOME</a></li>
    <li><a href="search.php">SEARCH</a></li>
    <li><a href="profile.php">PROFILE</a></li>
    <li><a href="help.php">HELP</a></li>
    <li><a href="login.php">LOGIN</a></li>
    <li><a id="userID"href="profile.php">You are not signed in</a></li>
  </ul>

    <div class="row">
    <div class="five columns">
    <div id="build">
       <h2> Build A Poll </h2>
  
      <form id="addPoll" action="addPoll.php" method="POST">
      <p>
      <label><b>Poll Title</b></label> 
      <input id="title" name="title" type="text" required></p>
      <p>
      <label><b>Option1</b></label>
      <input id="option1" name="option1" type="text" required></p>
      <p>
      <label><b>Option2</b></label>
      <input  id="option2" name="option2" type="text" required></p>
      <p>
      <label><b>Option3</b></label>
      <input id="option3" name="option3" type="text"</p>
      <p>
      <label><b>Option4</b></label>
      <input id="option4" name="option4" type="text"</p>
      </p>
      <button class="button-primary" id="submitPoll"> SUBMIT </button>
      <input id="user" name="user" type="hidden" value="">
      </form>
    </div>
    </div>
   

    <div class="five columns"> 
    <h1> Login </h1>
    <p style="font-size:16px; margin-right:25%; text-align:justify;"> Logging in allows you to see the results of the polls that you create. In addition, users can search polls by your username to answer your polls specifically. <p>
     <form id="login" action="verifyUser.php" method="POST">
     <p>
     <label><b>Username</b></label>
     <input id="username" type="text" required></p>
     <label><b>Password</b></label>
     <input id="password" type="text" required></p>
     <input class="button-primary" type="submit" value="Login">
     </form>


     <p id="loginstatus"> </p>
     <br>
     <h1> Create User </h1>
     <p style="font-size:16px; margin-right:25%; text-align:justify;">If you don't already have a username, use this form to create one. Once you login we will keep track of all the polls that you have created and allow you to view the results from your polls. <p>
   
     <form id="createUser" action="addUser.php" method="POST">
     <p>
     <label><b>Username</b></label>
     <input id="newusername" type="text" name="username" required></p>
     <label><b>Password</b></label>
     <input id="newpassword" type="text" name="password" required></p>
     <input class="button-primary" type="submit" value="Create User">
     </form>
     <button id="logout"> LOGOUT </button>
    </div>
   </div>
 </body>

</html>
