<?php

if($_SESSION['EMPLOYEE_ID'] != '2020877832')
{
echo '<nav class="mt-2">
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <li class="nav-item">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-edit"></i>
      <p>
        Parcel Utilities
      <i class="fas fa-angle-left right"></i>
      </p>
    </a>

    <ul class="nav nav-treeview">
    
        <li class="nav-item">
        <a href="parcel.php" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Parcel List</p>
        </a>
      </li>

      <li class="nav-item">
        <a href="register.php" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Register</p>
        </a>
      </li>

      <li class="nav-item">
        <a href="claim.php" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Claim</p>
        </a>
      </li>
    </ul>

  <li class="nav-item">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-arrow-circle-right"></i>
      <p>
        Parcel Status
        <i class="fas fa-angle-left right"></i>
      </p>
    </a>

    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="arrived.php" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>New Arrived</p>
        </a>
      </li>

      <li class="nav-item">
        <a href="collected.php" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Collected</p>
        </a>
      </li>

      <li class="nav-item">
        <a href="pending.php" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Pending</p>
        </a>
      </li>';
}
else 
{
    echo '<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-user"></i>
          <p>
            SPARK Member Utilities
          <i class="fas fa-angle-left right"></i>
          </p>
        </a>

        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="register_user.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Add New Member</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="remove_user.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Remove Member Access</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="userlist.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Member List</p>
            </a>
          </li>
        </ul>    
      
        <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-edit"></i>
          <p>
            Parcel Utilities
          <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        

        <ul class="nav nav-treeview">
        
          <li class="nav-item">
          <a href="parcel.php" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Parcel List</p>
          </a>
        </li>
          <li class="nav-item">
            <a href="register.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Register</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="claim.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Claim</p>
            </a>
          </li>
        </ul>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-arrow-circle-right"></i>
          <p>
            Parcel Status
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>

        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="arrived.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>New Arrived</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="collected.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Collected</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="pending.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Pending</p>
            </a>
          </li>';
  }
?>