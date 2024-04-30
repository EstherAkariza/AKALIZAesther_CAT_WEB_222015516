    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Healthy System</span>
                    </a>
                </li>

                 <li>
                    <a href="./">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <?php if($_SESSION['role']=='nurse'){ ?>       <li>
                    <a href="./?page=nurses">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Nurses</span>
                    </a>
                </li>
 
                <li>
                    <a href="./?page=patients">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Patients</span>
                    </a>
                </li>
                <li>
                    <a href="./?page=medecine">
                        <span class="icon">
                            <ion-icon name="help-outline"></ion-icon>
                        </span>
                        <span class="title">Vaccines</span>
                    </a>
                </li>
                <li>
                    <a href="./?page=medecine">
                        <span class="icon">
                            <ion-icon name="help-outline"></ion-icon>
                        </span>
                        <span class="title">Medecines</span>
                    </a>
                </li>
           <?php } ?>    <li>
                    <a href="./?page=appointments">
                        <span class="icon">
                            <ion-icon name="help-outline"></ion-icon>
                        </span>
                        <span class="title">Appointments</span>
                    </a>
                </li>
         
                 <?php if($_SESSION['role']=='nurse'){ ?>       <li>
                    <a href="./?page=payments">
                        <span class="icon">
                            <ion-icon name="person-outline"></ion-icon>
                        </span>
                        <span class="title">Payments</span>
                    </a>
                </li><?php } ?>

                <li>
                    
             
                

                <li>
                    <a href="logout.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>
