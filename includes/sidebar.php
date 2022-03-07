<?php
?>
 <nav class="sidebar close">
 <header>

   <div class="image-text">
     <span class="image">
       <img src="../images/L_logo.png" alt="logo">
     </span>

     <div class="text logo-text">
       <span class="name">Next Gen</span>
       <span class="profession">Learning</span>
     </div>
   </div>

   <i class='bx bx-chevron-right toggle'></i>
 </header>

 <div class="menu-bar">
   <div class="menu">
     <li class="">
       <a href="#">
         <i class='bx bx-home-alt icon'></i>
         <span class="text nav-text">Home</span>
       </a>
     </li>

     <!-- <li class="">
       <a href="#">
         <i class='bx bx-bar-chart-alt-2 icon'></i>
         <span class="text nav-text">Status</span>
       </a>
     </li> -->

     <li class="">
       <a href="#">
         <i class='bx bx-bell icon'></i>
         <span class="text nav-text">Assigment</span>
       </a>
     </li>

     <li class="">
       <a href="#">
         <i class='bx bx-pie-chart-alt icon'></i>
         <span class="text nav-text">Progress</span>
       </a>
     </li>
     <?php if($role=="teacher"):?>
        <li class="">
        <a  data-bs-toggle="modal" data-bs-target="#modal1" href="#modal1">
            <i class='bx bx-plus-medical icon'></i>
            <span class="text nav-text">Add Material</span>
        </a>
        </li>
     <?php endif;?>
   </div>

   <div class="bottom-content">
     <li class="">
       <a href="../login.php">
         <i class='bx bx-log-out icon'></i>
         <span class="text nav-text">Logout</span>
       </a>
     </li>

     <li class="mode">
       <div class="sun-moon">
         <i class='bx bx-moon icon moon'></i>
         <i class='bx bx-sun icon sun'></i>
       </div>
       <span class="mode-text text">Dark mode</span>

       <div class="toggle-switch">
         <span class="switch"></span>
       </div>
     </li>

   </div>
 </div>

</nav>