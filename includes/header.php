          <nav class="navbar">
            <div class="systemName">
                GCA Portal
            </div>
            <div class="userName">
                <div class="user-details">
                    <i class="fa-solid fa-circle-user"></i>
                    <?= $_SESSION['username'] ?>
                    <i class="fa-solid fa-caret-down"></i>
                </div>
          
                <div class="dropdown__content">
                <p class="dropdown--item"> 
                    <a href=""><i class="fa-solid fa-key"></i> Change Password</a>
                 </p>
                <p class="dropdown--item">
                     <a href="../logout.php"><i class="fa-solid fa-power-off"></i> Logout</a>
                    </p>
                </div>
            </div>
        </nav>