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

$ (document).ready(function(){
    if(!(localStorage.user === undefined)){
      document.getElementById("userID").innerHTML = "You are signed in as " + localStorage.user;
    }else{
      document.getElementById("userID").innerHTML = "You are not signed in"
    }



  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status ==200) {
      document.getElementById("results").innerHTML = xhttp.responseText + "<button> REFRESH </button>";
    }
  };
  xhttp.open("GET", "loadPolls.php", true);
  xhttp.send();
});

$ (document).ready(function(){
  $("#addPoll").submit(function(event) {
    event.preventDefault();
    var $form = $( this ),
    url = $form.attr( 'action' );

    /* Send the data using post with form fields */
    var posting = $.post( url,
    {
      title: $('#title').val(), 
      option1: $('#option1').val(),
      option2: $('#option2').val(), 
      option3: $('#option3').val(), 
      option4: $('#option4').val() 
    } );

    posting.done(function( data ) {
      alert('success');
    });
  event.preventDefault();
  });
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
    <li><a id="userID"href="profile.php">You re not signed in</a></li>

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
      </form>
    </div>
    </div>
  
</body>

</html>
