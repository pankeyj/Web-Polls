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
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status ==200) {
      document.getElementById("results").innerHTML = xhttp.responseText + "<button> REFRESH </button>";
    }
  };
  xhttp.open("GET", "loadPolls.php", true);
  xhttp.send();
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
  </ul>

    <div class="row">
    <div class="two columns">
    <br>
    </div>
    <div id="help" class="eight columns">
      <h1 id="hdr" ><b> Welcome </b> </h1>
      <p class="help"> The purpose of this web site is to provide an easy way for students to survey others. The polls on this web site can be used for a variety of purposes. Polls may be created to help users complete surveys for classes, gauge public opinion for personal insights or as a form of social media that is used for entertainment. Anybody is welcome to post polls and answers to this website so long as they are appropriate. Whether it's a non sense questions or a serious concern, I hope that people find some usefulness or entertainment from exploring this web site.<p>
      <br>
      <h1><b> Instructions</b> </h1>
      <p class="help">
      Before using the Jake's Web Polls it is recommended that you first create an account. Create an account by first clicking on the login tab. At the bottom of the page there is a form titled "Create A User". Fill out this form with your preffered user name and login. After you have successfully created a user navigate to the login form at the top of the page and enter the credentials of the account you just created.
      <br><br>
      If you prefer to post a poll anonymously you may skip the login step. If you choose to navigate anonymously you will miss out on some of the other features that Jake's Web Polls offers.
      <br><br>
After you have(or haven't) logged in, you can begin to post and answer Polls. Navigate to the home page by clicking on the home tab near the top of the screen. On the left hand side of the screen you will notice a form title "Build a Poll." Here you can create your own poll. The Poll requires a question and between two and four possible answers. The maximum length for the questions and answers is 100 characters.
      <br><br>
      On the home page you will also see the current polls that have been created. You have the option to answer any of these polls. Click a radio button option then submit the poll to record your response. After you submit a vote, the results of the poll will be displayed in terms of percentage of votes for each of the options.
      </p>
      <h1><b> Known Bugs</b> </h1>
      <p class="help"> When creating a poll do not use any apostrophes or quotes. The strings have not been cleaned in the php script so doing so will result in an error.</p>
      <br>
      <h1><b> Credit </b> </h1>
      <p class="help">This web site was designed and developed by Jacob Pankey for his Honors Senior Project at Grand Valley State University under the supervision of Professor Jerry Scripps.</p>
    </div>
    </div>
</body>

</html>
