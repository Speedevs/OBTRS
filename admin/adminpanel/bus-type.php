<!doctype html>
<html>

<head>
    <title>OBTRS</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <link type="text/css" rel="stylesheet" href="./assets/css/reset.css" />
    <link type="text/css" rel="stylesheet" href="./assets/css/jquery-ui.min.css" />
    <link type="text/css" rel="stylesheet" href="./assets/css/pj-all.css" />
    <link type="text/css" rel="stylesheet" href="./assets/css/admin.css" />
    <script src="./assets/js/jquery.min.js"></script>
    <script src="./assets/js/jquery-migrate.min.js"></script>
    <script src="./assets/js/pjAdminCore.js"></script>
    <script src="./assets/js/jquery-ui.custom.min.js"></script>
    <!--[if gte IE 9]>
  		<style type="text/css">.gradient {filter: none}</style>
		<![endif]-->
</head>

<body>
    <div id="container">
        <div id="header">
            <div id="logo"> <a href="#" target="_blank" rel="nofollow">Bus Reservation System</a></div>
        </div>
        <div id="middle">
            <div id="leftmenu">
                <div class="leftmenu-top"></div>
                <div class="leftmenu-middle">
                    <ul class="menu">
                        <li><a href="index.php"><span class="menu-dashboard">&nbsp;</span>Dashboard</a></li>
                        <li><a href="schedule.php"><span class="menu-schedule">&nbsp;</span>Schedule</a></li>
                        <li><a href="booking.php"><span class="menu-reservations">&nbsp;</span>Bookings</a></li>
                        <li><a href="buses.php"><span class="menu-buses">&nbsp;</span>Buses</a></li>
                        <li><a href="routes.php"><span class="menu-routes">&nbsp;</span>Routes</a></li>
                        <li><a href="bus-type.php"><span class="menu-bus-types">&nbsp;</span>Bus Types</a></li>
                        <li><a href="#"><span class="menu-options">&nbsp;</span>Settings</a></li>
                        <li><a href="#"><span class="menu-users">&nbsp;</span>Users</a></li>
                        <li><a href="#"><span class="menu-logout">&nbsp;</span>Logout</a></li>
                    </ul>
                </div>
                <div class="leftmenu-bottom"></div>
            </div>
            <div id="right">
                <div class="content-top"></div>
                <div class="content-middle" id="content">
                    <div class="notice-box">
                        <div class="notice-top"></div>
                        <div class="notice-middle"> <span class="notice-info">&nbsp;</span> <span class="block bold">Bus Types list</span><span class="block">Below is a list of all bus types. Each bus you create has to have bus type defined. Trough bus types you can define the number of seats and the seats map of each bus. This will let customers make bookings and reserve their seats and tickets.</span>
                            <a href="#" class="notice-close"></a>
                        </div>
                        <div class="notice-bottom"></div>
                    </div>
                    <div class="b10">
                        <form action="/1528013160_785/index.php" method="get" class="float_left r5">
                            <input type="hidden" name="controller" value="pjAdminBusTypes">
                            <input type="hidden" name="action" value="pjActionCreate">
                            <input type="submit" class="pj-button" value="+ Add bus type"> </form>
                        <form action="" method="get" class="float_left pj-form frm-filter">
                            <input type="text" name="q" class="pj-form-field pj-form-field-search w150" placeholder="Search"> </form>
                        <div class="float_right t5"> <a href="#" class="pj-button btn-all">All</a> <a href="#" class="pj-button btn-filter btn-status" data-column="status" data-value="T">Active</a> <a href="#" class="pj-button btn-filter btn-status" data-column="status" data-value="F">Inactive</a> </div>
                        <br class="clear_both"> </div>
                    <div id="grid" class="pj-grid">
                        <table cellpadding="0" cellspacing="0" class="pj-table" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" class="pj-table-toggle-rows">
                                    </th>
                                    <th style="width: 280px;">
                                        <div class="pj-table-sort-label">Name</div>
                                        <div class="pj-table-sort">
                                            <a href="#" class="pj-table-sort-up pj-table-sort-up-active"></a>
                                            <a href="#" class="pj-table-sort-down"></a>
                                        </div>
                                    </th>
                                    <th style="width: 100px;">Map</th>
                                    <th style="width: 120px;">
                                        <div class="pj-table-sort-label">Seat(s)</div>
                                        <div class="pj-table-sort">
                                            <a href="#" class="pj-table-sort-up"></a>
                                            <a href="#" class="pj-table-sort-down"></a>
                                        </div>
                                    </th>
                                    <th style="width: 90px;">
                                        <div class="pj-table-sort-label">Status</div>
                                        <div class="pj-table-sort">
                                            <a href="#" class="pj-table-sort-up"></a>
                                            <a href="#" class="pj-table-sort-down"></a>
                                        </div>
                                    </th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="pj-table-row-odd" data-id="id_10">
                                    <td>
                                        <input type="checkbox" name="record[]" value="10" class="pj-table-select-row">
                                    </td>
                                    <td><span class="pj-table-cell-label"> Scania K113TRBL</span></td>
                                    <td><span class="pj-table-cell-label">Yes</span></td>
                                    <td><span class="pj-table-cell-label">14</span></td>
                                    <td class="pj-table-cell-editable"><span class="pj-table-cell-label pj-status pj-status-T">Active</span>
                                        <select data-name="status" class="pj-form-field pj-form-select pj-selector-editable" style="display: none;">
                                            <option value="T">Active</option>
                                            <option value="F">Inactive</option>
                                        </select>
                                    </td>
                                    <td>
                                        <a href="index.php?controller=pjAdminBusTypes&amp;action=pjActionUpdate&amp;id=10" class="pj-table-icon-edit"></a>
                                        <a href="index.php?controller=pjAdminBusTypes&amp;action=pjActionDeleteBusType&amp;id=10" class="pj-table-icon-delete"></a>
                                    </td>
                                </tr>
                                <tr class="pj-table-row-even" data-id="id_1">
                                    <td>
                                        <input type="checkbox" name="record[]" value="1" class="pj-table-select-row">
                                    </td>
                                    <td><span class="pj-table-cell-label">16 seats</span></td>
                                    <td><span class="pj-table-cell-label">Yes</span></td>
                                    <td><span class="pj-table-cell-label">16</span></td>
                                    <td class="pj-table-cell-editable"><span class="pj-table-cell-label pj-status pj-status-T">Active</span>
                                        <select data-name="status" class="pj-form-field pj-form-select pj-selector-editable" style="display: none;">
                                            <option value="T">Active</option>
                                            <option value="F">Inactive</option>
                                        </select>
                                    </td>
                                    <td>
                                        <a href="index.php?controller=pjAdminBusTypes&amp;action=pjActionUpdate&amp;id=1" class="pj-table-icon-edit"></a>
                                        <a href="index.php?controller=pjAdminBusTypes&amp;action=pjActionDeleteBusType&amp;id=1" class="pj-table-icon-delete"></a>
                                    </td>
                                </tr>
                                <tr class="pj-table-row-odd" data-id="id_2">
                                    <td>
                                        <input type="checkbox" name="record[]" value="2" class="pj-table-select-row">
                                    </td>
                                    <td><span class="pj-table-cell-label">55 seats</span></td>
                                    <td><span class="pj-table-cell-label">Yes</span></td>
                                    <td><span class="pj-table-cell-label">55</span></td>
                                    <td class="pj-table-cell-editable"><span class="pj-table-cell-label pj-status pj-status-T">Active</span>
                                        <select data-name="status" class="pj-form-field pj-form-select pj-selector-editable" style="display: none;">
                                            <option value="T">Active</option>
                                            <option value="F">Inactive</option>
                                        </select>
                                    </td>
                                    <td>
                                        <a href="index.php?controller=pjAdminBusTypes&amp;action=pjActionUpdate&amp;id=2" class="pj-table-icon-edit"></a>
                                        <a href="index.php?controller=pjAdminBusTypes&amp;action=pjActionDeleteBusType&amp;id=2" class="pj-table-icon-delete"></a>
                                    </td>
                                </tr>
                                <tr class="pj-table-row-even" data-id="id_3">
                                    <td>
                                        <input type="checkbox" name="record[]" value="3" class="pj-table-select-row">
                                    </td>
                                    <td><span class="pj-table-cell-label">61 seats</span></td>
                                    <td><span class="pj-table-cell-label">Yes</span></td>
                                    <td><span class="pj-table-cell-label">61</span></td>
                                    <td class="pj-table-cell-editable"><span class="pj-table-cell-label pj-status pj-status-T">Active</span>
                                        <select data-name="status" class="pj-form-field pj-form-select pj-selector-editable" style="display: none;">
                                            <option value="T">Active</option>
                                            <option value="F">Inactive</option>
                                        </select>
                                    </td>
                                    <td>
                                        <a href="index.php?controller=pjAdminBusTypes&amp;action=pjActionUpdate&amp;id=3" class="pj-table-icon-edit"></a>
                                        <a href="index.php?controller=pjAdminBusTypes&amp;action=pjActionDeleteBusType&amp;id=3" class="pj-table-icon-delete"></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="pj-paginator" style="width: 100%;"><a href="#" class="pj-button pj-paginator-button-actions">Choose Action<span class="pj-button-arrow-down"></span></a><span class="pj-menu-list-wrap" style="display: none;"><span class="pj-menu-list-arrow"></span>
                            <ul class="pj-menu-list">
                                <li><a href="index.php?controller=pjAdminBusTypes&amp;action=pjActionDeleteBusTypeBulk" class="pj-paginator-action">Delete selected</a></li>
                                <li>
                                    <a href="index.php?controller=pjAdminBusTypes&amp;action=pjActionStatusBusType" class="pj-paginator-action"></a>
                                </li>
                                <li>
                                    <a href="index.php?controller=pjAdminBusTypes&amp;action=pjActionExportBusType" class="pj-paginator-action"></a>
                                </li>
                            </ul>
                            </span><span class="pj-paginator-goto">Go to page: <input type="text" name="goto" value="1" class="pj-form-field pj-form-text pj-selector-goto" style="width: 20px;"></span>
                            <ul class="pj-paginator-list"><a href="#" title="Go to page: 1" data-page="1" class="pj-paginator-list-paginate pj-paginator-list-active">1</a></ul><span class="pj-paginator-total">Total items: 4 / <a href="#" class="pj-button pj-paginator-row-count">10</a><span class="pj-menu-list-wrap" style="display: none;"><span class="pj-menu-list-arrow"></span>
                            <ul class="pj-menu-list">
                                <li><span style="font-size: 11px;">Items per page</span></li>
                                <li><a href="#" data-rowcount="10" class="pj-selector-row-count">10</a></li>
                                <li><a href="#" data-rowcount="20" class="pj-selector-row-count">20</a></li>
                                <li><a href="#" data-rowcount="50" class="pj-selector-row-count">50</a></li>
                                <li><a href="#" data-rowcount="100" class="pj-selector-row-count">100</a></li>
                                <li><a href="#" data-rowcount="200" class="pj-selector-row-count">200</a></li>
                                <li><a href="#" data-rowcount="500" class="pj-selector-row-count">500</a></li>
                            </ul>
                            </span>
                            </span><span style="clear: both;"></span></div>
                    </div>
                    <div class="pj-preloader" style="display: none; left: 432.5px; top: 284px; width: 742px; height: 260px;"></div>
                    <script type="text/javascript">
                        var myLabel = myLabel || {};
                        myLabel.name = "Name";
                        myLabel.map = "Map";
                        myLabel.seats = "Seat(s)";
                        myLabel.yes = "Yes";
                        myLabel.no = "No";
                        myLabel.delete_selected = "Delete selected";
                        myLabel.delete_confirmation = "Are you sure that you want to delete selected record(s)?";
                        myLabel.active = "Active";
                        myLabel.inactive = "Inactive";
                        myLabel.status = "Status";
                    </script>
                </div>
                <div class="content-bottom"></div>
            </div>
            <!-- content -->
            <div class="clear_both"></div>
        </div>
        <!-- middle -->
    </div>
    <!-- container -->
    <div id="footer-wrap">
        <div id="footer">
            <p>Copyright &copy; 2018 <a href="#" target="_blank">OBTRS</a></p>
        </div>
    </div>
    <script async src="./assets/load.js"></script>
</body>

</html>
