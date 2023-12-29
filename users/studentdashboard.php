<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
    body {
      width: 100vw;
      background: linear-gradient(90deg, rgba(241,241,241,0.17054744260985644) 0%, rgba(0,235,255,0.845617470621061) 81%);
      margin: 0;
      font-family: rockwell;
    }

  .wrapper {
   width: 100vw;
   margin: 0 auto;
   height: 400px;
   display: flex;
   justify-content: center;
   align-items: center;
   position: relative;
   transition: all 0.3s ease;
  }

@media screen and (max-width: 767px) {
   .wrapper {
      height: 700px;
   }
}

.content {
   max-width: 1024px;
   display:grid;
     grid-template-columns: auto auto auto auto;
   width: 100%;
   padding: 0 4%;
   padding-top: 250px;
   margin: 0 auto;
   display: flex;
   justify-content: center;
   align-items: center;
}

@media screen and (max-width: 767px) {
   .content {
      padding-top: 300px;
      flex-direction: column;
   }
}

.card {
   width: 100%;
   max-width: 300px;
   min-width: 200px;
   height: 250px;
   background-color: #292929;
   margin: 10px;
   border-radius: 10px;
   box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.24);
   border: 2px solid rgba(7, 7, 7, 0.12);
   font-size: 16px;
   transition: all 0.3s ease;
   position: relative;
   display: flex;
   justify-content: center;
   align-items: center;
   flex-direction: column;
   cursor: pointer;
   transition: all 0.3s ease;
}

.icon {
   margin: 0 auto;
   width: 100%;
   height: 80px;
   max-width:80px;
   background: linear-gradient(90deg, #FF7E7E 0%, #FF4848 40%, rgba(0, 0, 0, 0.28) 60%);
   border-radius: 100%;
   display: flex;
   justify-content: center;
   align-items: center;
   color: white;
   transition: all 0.8s ease;
   background-position: 0px;
   background-size: 200px;
}

.material-icons.md-18 { font-size: 18px; }
.material-icons.md-24 { font-size: 24px; }
.material-icons.md-36 { font-size: 36px; }
.material-icons.md-48 { font-size: 48px; }

.card .title {
   width: 100%;
   margin: 0;
   text-align: center;
   margin-top: 30px;
   color: white;
   font-weight: 600;
   text-transform: uppercase;
   letter-spacing: 4px;
}

.card .text {
   width: 80%;
   margin: 0 auto;
   font-size: 13px;
   text-align: center;
   margin-top: 20px;
   color: white;
   font-weight: 200;
   letter-spacing: 2px;
   opacity: 0;
   max-height:0;
   transition: all 0.3s ease;
}

.card:hover {
   height: 270px;
}

.card:hover .info {
   height: 90%;
}

.card:hover .text {
   transition: all 0.3s ease;
   opacity: 1;
   max-height:40px;
}

.card:hover .icon {
   background-position: -120px;
   transition: all 0.3s ease;
}

.card:hover .icon i {
   background: linear-gradient(90deg, #FF7E7E, #FF4848);
   /* -webkit-background-clip: ; */
	-webkit-text-fill-color: transparent;
   opacity: 1;
   transition: all 0.3s ease;
}
    </style>
    <script type="text/javascript">
      function Candidate(){
        window.location.href ="applycandidate.php";
      }
      // function candidate_details() {
      //    window.location.href ="candidate.php";
      // }
      
      function checkVotedAndRedirect() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "check_vote_status.php", true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    if (xhr.responseText === "voted") {
                        window.location.href = 'success.php';
                    } else {
                        window.location.href = 'candidate.php';
                    }
                }
            };
            xhr.send();
      }

      function profile() {
        window.location.href ="profile.php";
      }
    </script>
  </head>
  
  <body>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<?php include 'header.php';?>

<div class="wrapper">

   <div class="content">
      <div class="card" onclick="profile()">
         <div class="icon"><i class="material-icons md-36">description</i></div>
         <p class="title">Profile</p>
         <p class="text">View your profile</p>
      </div>
   
      <div class="card" onclick="checkVotedAndRedirect()">
            <div class="icon"><i class="material-icons md-36">search</i></div>
            <p class="title">Candidates</p>
            <p class="text">Vote for a candidate</p>
      </div>

      <div class="card"  onclick="Candidate()">
            <div class="icon"><i class="material-icons md-36">add</i></div>
            <p class="title">Apply Candidate</p>
            <p class="text">Apply for a candidate</p>
      </div>

   </div>

</div>
</body>
</html>
