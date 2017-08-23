<?php
include_once 'partials/headers.php';
include_once 'resource/Database.php';
include_once 'resource/utilities.php';
?>

<html>
    <body>
    
<div class="container-fluid text-center">   
  <div class="col-sm-8">
    <div class="row content">
     

  <div class="container text-center">
    <h1>My Portfolio</h1>      
    <p>Some text that represents "Me"...</p>
  </div>


<form action="create.event.php" method="post" enctype="multipart/form-data">

			<tr>
				<td align="right"><b>Event Title:</b></td>
				<td><input type="text" name="event_title" /></td>
			</tr>
        <br>
			<tr>
                <td><b>Event Link:</b><input type="text" name="event_link"/></td>
			</tr>
            <br>
			<tr>
                <td><b>Keyword: </b><input type="text" name="event_keywords"/></td>
			
			<br>
			<tr>
                <td><b>Discription</b><textarea cols="18" rows="8" name="event_desc"></textarea></td>
			</tr>
            <br>
			<tr>
                <td><b>Add Image:</b><input type="file" name="avatar" style="padding-left: 200px"/></td>
			</tr>
                <br>
			<tr>
				<td align="center" colspan="5"><input type="submit" name="submit" value="Add Site Now"/></td>
			</tr>
    </form>

<tr>
        <b>Location</b><input id="pac-input" class="controls" type="text" placeholder="Search Box">
                <div id="map"></div>
		</tr>
        </div>
  </div>
</div>
   
    <style>
     
		input[type=text],
select,
textarea {
    width: 50%;
    padding: 10px 10px;
    margin: 10px 20px;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    border-radius: 3px;
    border: 1px solid #ccc;
}


      #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
      }

      #infowindow-content .title {
        font-weight: bold;
      }

      #infowindow-content {
        display: none;
      }

      #map #infowindow-content {
        display: inline;
      }

      .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
      }

      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
      }

      .pac-controls {
        display: inline-block;
        padding: 5px 11px;
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 15px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
      }
      #target {
        width: 345px;
      }
        


 #map {
        height: 25%;
        width: 75%;
        margin-left: 18%;
        margin-right: 18%;
      }
        </style>
<script src="https://maps.googleapis.com/maps/api/js?key=
AIzaSyCxfM6b06f0StQWJH8L0H6h9IChOuDfdpk&libraries=places&callback=initAutocomplete"
         async defer></script>
    <script src="js/search.js"></script>

</body>
</html>

<?php

   if (isset($_POST['submit'])){
       $event_title = $_POST['event_title'];
       $event_link = $_POST['event_link'];
       $event_keywords = $_POST['event_keywords'];
       $event_desc = $_POST['event_desc'];
       $event_image = $_FILES['event_image'];
       $event_image_tmp = $_FILES['event_image']['tmp_name'];
       
       if($event_title=='' OR $event_link=='' OR $event_keywords== '' OR $event_desc=='') {
           echo "<script>alert('please fill all the fiels!')</script>";
      
		exit();
		}
		else {
       
       $insert_query = "insert into sites (event_name,event_title,event_link,event_keywords,event_desc,event_image) values ('$event_title','$event_link',' $event_keywords','$event_desc','$event_image')";
       
       move_uploaded_file($event_image_tmp,"uploads/{event_image}");
       
       if(mysql_query($insert_query)){
           
           echo "<script>alert('Data inserted into table')</script>";
       }
   }
   }
