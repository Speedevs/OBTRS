<div class="sidebar-wrapper ps-container">
    <ul class="nav">
        <li>
            <a href="index.php">
                Dashboard
            </a>
        </li>
        <!-- <li>
            <a href="schedule.php">
                Schedule
            </a>
        </li> -->
        <li>
            <a href="booking.php">
                Booking
            </a>
        </li>
        <li>
            <a href="time-table.php">
                Time-table
            </a>
        </li>
        <li>
            <a href="routes.php">
                Routes
            </a>
        </li>
        <li>
            <a href="bus-type.php">
                Bus-type
            </a>
        </li>
        <!-- <li>
            <a href="setting.php">
                Settings
            </a>
        </li> -->
        <li>
            <a href="users.php">
                Users
            </a>
        </li>
    <?php  if (isset($_SESSION['usr_id'])) {?>
        <li>
            <a href="../logout.php">
                <p>Logout</p>
            </a>
        </li>
    <?php }?>    
    </ul>
</div>