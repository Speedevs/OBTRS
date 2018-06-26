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
                        <div class="notice-middle"> <span class="notice-info">&nbsp;</span> <span class="block bold">Buses List</span><span class="block">Below is a list of all buses you operate. Customers can book tickets for a specific bus trip. We call "a trip" a bus traveling on a specific date. Each bus has defined route, bus type, tickets price, departure and arrival times for each route location (bus stop), weekly schedule and a time period while it operates. If you operate several trips of one route per day, you need to set them as separate buses with their own departure and arrival time.</span>
                            <a href="#" class="notice-close"></a>
                        </div>
                        <div class="notice-bottom"></div>
                    </div>
                    <div class="b10">
                        <form action="/1528013160_785/index.php" method="get" class="float_left r5">
                            <input type="hidden" name="controller" value="pjAdminBuses">
                            <input type="hidden" name="action" value="pjActionCreate">
                            <input type="submit" class="pj-button" value="+ Add Bus"> </form>
                        <form action="" method="get" class="pj-form frm-filter">
                            <input type="text" name="q" class="pj-form-field pj-form-field-search w150 float_left" placeholder="Search"> <span class="block float_right">
				<label>Filter by route:</label>
				<select name="route_id" id="filter_route_id" class="pj-form-field w200">
					<option value="">-- Choose--</option>
					<option value="3">Atlanta - Cincinnati</option><option value="11">Boston - Portsmouth</option><option value="4">NY - Cincinnati</option>				</select>
			</span> </form>
                        <br class="clear_both"> </div>
                    <div id="grid" class="pj-grid">
                        <table cellpadding="0" cellspacing="0" class="pj-table" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" class="pj-table-toggle-rows"> </th>
                                    <th style="width: 300px;">
                                        <div class="pj-table-sort-label">Route</div>
                                        <div class="pj-table-sort">
                                            <a href="#" class="pj-table-sort-up pj-table-sort-up-active"></a>
                                            <a href="#" class="pj-table-sort-down"></a>
                                        </div>
                                    </th>
                                    <th style="width: 120px;">
                                        <div class="pj-table-sort-label">Depart - Arrive</div>
                                        <div class="pj-table-sort">
                                            <a href="#" class="pj-table-sort-up"></a>
                                            <a href="#" class="pj-table-sort-down"></a>
                                        </div>
                                    </th>
                                    <th style="width: 180px;">
                                        <div class="pj-table-sort-label">Operates From - To (dates)</div>
                                        <div class="pj-table-sort">
                                            <a href="#" class="pj-table-sort-up"></a>
                                            <a href="#" class="pj-table-sort-down"></a>
                                        </div>
                                    </th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="pj-table-row-odd" data-id="id_1">
                                    <td>
                                        <input type="checkbox" name="record[]" value="1" class="pj-table-select-row"> </td>
                                    <td><span class="pj-table-cell-label">Atlanta - Cincinnati</span></td>
                                    <td><span class="pj-table-cell-label">08:00 - 15:05</span></td>
                                    <td><span class="pj-table-cell-label">01-01-2017 - 31-12-2019</span></td>
                                    <td>
                                        <a href="index.php?controller=pjAdminBuses&amp;action=pjActionTime&amp;id=1" class="pj-table-icon-edit"></a>
                                        <a href="index.php?controller=pjAdminBuses&amp;action=pjActionDeleteBus&amp;id=1" class="pj-table-icon-delete"></a>
                                    </td>
                                </tr>
                                <tr class="pj-table-row-even" data-id="id_2">
                                    <td>
                                        <input type="checkbox" name="record[]" value="2" class="pj-table-select-row"> </td>
                                    <td><span class="pj-table-cell-label">Atlanta - Cincinnati</span></td>
                                    <td><span class="pj-table-cell-label">13:00 - 20:55</span></td>
                                    <td><span class="pj-table-cell-label">01-01-2017 - 31-12-2019</span></td>
                                    <td>
                                        <a href="index.php?controller=pjAdminBuses&amp;action=pjActionTime&amp;id=2" class="pj-table-icon-edit"></a>
                                        <a href="index.php?controller=pjAdminBuses&amp;action=pjActionDeleteBus&amp;id=2" class="pj-table-icon-delete"></a>
                                    </td>
                                </tr>
                                <tr class="pj-table-row-odd" data-id="id_8">
                                    <td>
                                        <input type="checkbox" name="record[]" value="8" class="pj-table-select-row"> </td>
                                    <td><span class="pj-table-cell-label">Atlanta - Cincinnati</span></td>
                                    <td><span class="pj-table-cell-label">15:00 - 23:00</span></td>
                                    <td><span class="pj-table-cell-label">01-01-2017 - 31-12-2019</span></td>
                                    <td>
                                        <a href="index.php?controller=pjAdminBuses&amp;action=pjActionTime&amp;id=8" class="pj-table-icon-edit"></a>
                                        <a href="index.php?controller=pjAdminBuses&amp;action=pjActionDeleteBus&amp;id=8" class="pj-table-icon-delete"></a>
                                    </td>
                                </tr>
                                <tr class="pj-table-row-even" data-id="id_9">
                                    <td>
                                        <input type="checkbox" name="record[]" value="9" class="pj-table-select-row"> </td>
                                    <td><span class="pj-table-cell-label">Boston - Portsmouth</span></td>
                                    <td><span class="pj-table-cell-label">09:00 - 10:25</span></td>
                                    <td><span class="pj-table-cell-label">01-01-2017 - 31-12-2019</span></td>
                                    <td>
                                        <a href="index.php?controller=pjAdminBuses&amp;action=pjActionTime&amp;id=9" class="pj-table-icon-edit"></a>
                                        <a href="index.php?controller=pjAdminBuses&amp;action=pjActionDeleteBus&amp;id=9" class="pj-table-icon-delete"></a>
                                    </td>
                                </tr>
                                <tr class="pj-table-row-odd" data-id="id_10">
                                    <td>
                                        <input type="checkbox" name="record[]" value="10" class="pj-table-select-row"> </td>
                                    <td><span class="pj-table-cell-label">Boston - Portsmouth</span></td>
                                    <td><span class="pj-table-cell-label">12:00 - 13:25</span></td>
                                    <td><span class="pj-table-cell-label">01-01-2017 - 31-12-2019</span></td>
                                    <td>
                                        <a href="index.php?controller=pjAdminBuses&amp;action=pjActionTime&amp;id=10" class="pj-table-icon-edit"></a>
                                        <a href="index.php?controller=pjAdminBuses&amp;action=pjActionDeleteBus&amp;id=10" class="pj-table-icon-delete"></a>
                                    </td>
                                </tr>
                                <tr class="pj-table-row-even" data-id="id_11">
                                    <td>
                                        <input type="checkbox" name="record[]" value="11" class="pj-table-select-row"> </td>
                                    <td><span class="pj-table-cell-label">Boston - Portsmouth</span></td>
                                    <td><span class="pj-table-cell-label">10:00 - 11:25</span></td>
                                    <td><span class="pj-table-cell-label">01-01-2017 - 31-12-2019</span></td>
                                    <td>
                                        <a href="index.php?controller=pjAdminBuses&amp;action=pjActionTime&amp;id=11" class="pj-table-icon-edit"></a>
                                        <a href="index.php?controller=pjAdminBuses&amp;action=pjActionDeleteBus&amp;id=11" class="pj-table-icon-delete"></a>
                                    </td>
                                </tr>
                                <tr class="pj-table-row-odd" data-id="id_6">
                                    <td>
                                        <input type="checkbox" name="record[]" value="6" class="pj-table-select-row"> </td>
                                    <td><span class="pj-table-cell-label">NY - Cincinnati</span></td>
                                    <td><span class="pj-table-cell-label">07:00 - 15:00</span></td>
                                    <td><span class="pj-table-cell-label">01-01-2017 - 31-12-2019</span></td>
                                    <td>
                                        <a href="index.php?controller=pjAdminBuses&amp;action=pjActionTime&amp;id=6" class="pj-table-icon-edit"></a>
                                        <a href="index.php?controller=pjAdminBuses&amp;action=pjActionDeleteBus&amp;id=6" class="pj-table-icon-delete"></a>
                                    </td>
                                </tr>
                                <tr class="pj-table-row-even" data-id="id_7">
                                    <td>
                                        <input type="checkbox" name="record[]" value="7" class="pj-table-select-row"> </td>
                                    <td><span class="pj-table-cell-label">NY - Cincinnati</span></td>
                                    <td><span class="pj-table-cell-label">14:00 - 20:45</span></td>
                                    <td><span class="pj-table-cell-label">01-01-2017 - 31-12-2019</span></td>
                                    <td>
                                        <a href="index.php?controller=pjAdminBuses&amp;action=pjActionTime&amp;id=7" class="pj-table-icon-edit"></a>
                                        <a href="index.php?controller=pjAdminBuses&amp;action=pjActionDeleteBus&amp;id=7" class="pj-table-icon-delete"></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="pj-paginator" style="width: 100%;"><a href="#" class="pj-button pj-paginator-button-actions">Choose Action<span class="pj-button-arrow-down"></span></a><span class="pj-menu-list-wrap" style="display: none;"><span class="pj-menu-list-arrow"></span>
                            <ul class="pj-menu-list">
                                <li><a href="index.php?controller=pjAdminBuses&amp;action=pjActionDeleteBusBulk" class="pj-paginator-action">Delete selected</a></li>
                            </ul>
                            </span><span class="pj-paginator-goto">Go to page: <input type="text" name="goto" value="1" class="pj-form-field pj-form-text pj-selector-goto" style="width: 20px;"></span>
                            <ul class="pj-paginator-list"><a href="#" title="Go to page: 1" data-page="1" class="pj-paginator-list-paginate pj-paginator-list-active">1</a></ul><span class="pj-paginator-total">Total items: 8 / <a href="#" class="pj-button pj-paginator-row-count">10</a><span class="pj-menu-list-wrap" style="display: none;"><span class="pj-menu-list-arrow"></span>
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
                    <div class="pj-preloader" style="display: none; left: 432.5px; top: 315px; width: 742px; height: 436px;"></div>
                    <script type="text/javascript">
                        var pjGrid = pjGrid || {};
                        pjGrid.jqDateFormat = "dd-mm-yy";
                        pjGrid.jsDateFormat = "dd-MM-yyyy";
                        var myLabel = myLabel || {};
                        myLabel.route = "Route";
                        myLabel.from_to = "Operates From - To (dates)";
                        myLabel.depart_arrive = "Depart - Arrive";
                        myLabel.delete_selected = "Delete selected";
                        myLabel.delete_confirmation = "Are you sure that you want to delete selected record(s)?";
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
