<div class="side__container">
<aside class="sidebar">
        <?php if($_SESSION['role'] == 'admin') : ?>
        <!-- <div class="sidebar--links">  
            <a href="../admin/new_course.php">Set up Course</a>
        </div> -->
        <div class="sidebar--links">  
            <a href="../admin/courses.php">View Courses</a>
        </div>
        <?php elseif($_SESSION['role'] == 'ta') : ?>
        <div class="sidebar--links">
            ta Course
        </div>
        <?php elseif($_SESSION['role'] == 'instructor') : ?>
        <div class="sidebar--links">
         View Courses
        </div>
        <div class="sidebar--links">
         Discussions
        </div>
        <?php else : ?>
        <div class="sidebar--links">
        Student Course
        </div>
        <?php endif; ?>
    </aside>
    <div class="content">  

            