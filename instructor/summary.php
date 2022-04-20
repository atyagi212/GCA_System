<?php session_start(); 
        require_once "../connection.php";
        
          
             $gme_error = "";
             $gme_success = "";
          
            if(isset($_GET['id'])){
                $gme_id = $_GET["id"];
                $group_id = $_GET["groupid"];
                $submission_id = "";
                $query = "SELECT * FROM FinalSubmission_tbl WHERE GME_id = '$gme_id' AND group_id = '$group_id'";
                $query_run = mysqli_query($con, $query);      
                if(mysqli_num_rows($query_run) > 0)        
                {
                    while($row = mysqli_fetch_assoc($query_run))
                    { 
                        $submission_id = $row['submission_id'];
                    }
                   
                }
                else{

                }
               
            }
            else{
                $gme_error = "Unable to fetch data, contact admin";
            }
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Summary</title>
    <link rel="stylesheet" href="../style.scss">
    <link rel="stylesheet" href="../includes/styles.scss">   
  <link rel="stylesheet" href="../admin/admin.scss">
    <link rel="stylesheet" href="../instructor/instructor.scss">
    <script src="https://kit.fontawesome.com/57c0ab8bd6.js" crossorigin="anonymous"></script>
 
</head>
<body>
<?php include('../includes/header.php'); ?>
    <?php include('../includes/sidebar.php'); ?>

    <div class="create--course">
    <a href="../student/download-solution.php?file_id=<?=$submission_id?>">
    <button class="create--btn" id="btn"><i class="fa-solid fa-plus"></i> Download file</button>
    </a>
        
     </div>
    <div class="admin--welcome">
         <h2>
         Summary
         </h2>
     </div>
     <?php 
     
        if(!empty($gme_error)){
            echo '<div class="alert alert-danger">' . $gme_error . '</div>';
        }  
        elseif(!empty($gme_success)){
            echo '<div class="success">' . $gme_success . '</div>';
        }  
            
        ?>
         <div class="information--student"> 
     <?php
                // query statement to get marked entities in a course
                $query = "SELECT * from GroupMarked_tbl g where g.course_id = 163781;
                ";
                $query_run = mysqli_query($con, $query);
              
                if(mysqli_num_rows($query_run) > 0)        
                {
                    while($row = mysqli_fetch_assoc($query_run))
                    {  
                        
                ?>
                        <div class="student" >
                           
                        <div class="name"> 
                        <label class="entity-info">Entity name</label>
                            <?=$row["entity_name"]; ?> 
                        </div>
                    
                         <div class="email">
                         <label class="entity-info">File name</label>
                         <?=$row["file_name"]; ?>
                        </div> 
                         <div class="email deadline">
                         <label class="entity-info">Dealine</label>
                         <?=$row["deadline"]; ?>
                        </div> 
                         <div class="email submissions">
                         <a href="entity_submissions.php?id=<?=$row["GME_id"]; ?>">View submissions</a>
                        </div> 
                        <div class="delete">
                        <a href="edit_markedEntity.php?id=<?=$row["GME_id"]; ?>">
                                <i class='fa-solid fa-pencil'></i>
                            </a>
                          <form action="updategroup_groupmember.php" method="post"> 
                             
                          <button class="delete--group-btn" name="entity_delete" value="<?=$row["GME_id"];?>" >
                            <i class='fa-solid fa-trash-can'></i>
                            </button>
                          </form>  
                       
                      
                      </div>
                      </div>
                    <?php  
                    } 
                    
                }
                else {
                    echo "There are no groups added, please click button above to add groups";
                }
            ?>
        </div>
            </div>
      <!-- last two divs are for the sidebar and content -->
      </div>
</div>

</body>
</html>