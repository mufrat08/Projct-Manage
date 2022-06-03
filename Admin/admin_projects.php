Project Portal
About Us	Sign Out


Notifications

Projects

Search

Manage Users

Source Code Requests

'; // Establish connection to the database projects with 'root' as username and ''(nothing) as password $con=mysqli_connect("localhost","root","","projects"); // Defensive technique : To check whether the connection to the database is actually established, before we // access the contents of the database if (mysqli_connect_errno($con)) { echo "Failed to connect to MySQL: " . mysqli_connect_error(); } // Basic sql query to get all the projects from the database which are approved/reviewed $result = mysqli_query($con,"SELECT * FROM project WHERE review='1'"); if (mysqli_error($con)) { die(mysqli_error($con)); } $i = 1; // fetch one by one and also provided an option to delete the project from the database while(($row = mysqli_fetch_array($result)) && ($i<4) ) { $name = $row['Name']; $path = "project_description.php?id=".$row['id'].""; $id = $row['id']; echo "$name"; echo "

"; $file=fopen("../info".$id.".txt","r") or exit("Unable to open file!"); echo "
"; while(!feof($file)) { echo fgets($file). "
"; } echo "
"; echo "

"; $delete = "delete_project.php?id=".$row['id'].""; echo ""; echo "

"; $i = $i + 1; echo "

________________________________________"; } // Close databse connection mysqli_close($con); echo '
'; ?>
