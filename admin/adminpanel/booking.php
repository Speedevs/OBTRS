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
                        <div class="notice-middle"> <span class="notice-info">&nbsp;</span> <span class="block bold">Manage Bookings</span><span class="block">Below is a list of all ticket bookings made. By default the new bookings stay on top. You will find some brief data about each booking and you can view details and/or edit booking by clicking on the Edit button at the end of each booking row. You can filter booking by their status. You can also search bookings using the search bar or the advanced search (click on the arrow button next to search bar).</span>
                            <a href="#" class="notice-close"></a>
                        </div>
                        <div class="notice-bottom"></div>
                    </div>
                    <div class="b10">
                        <form action="/1528013160_785/index.php" method="get" class="float_left r5">
                            <input type="hidden" name="controller" value="pjAdminBookings">
                            <input type="hidden" name="action" value="pjActionCreate">
                            <input type="submit" class="pj-button" value="+ Add booking"> </form>
                        <form action="" method="get" class="float_left pj-form frm-filter">
                            <input type="text" name="q" class="pj-form-field pj-form-field-search w250" placeholder="Search by ID, client name or email">
                            <button type="button" class="pj-button pj-button-detailed"><span class="pj-button-detailed-arrow"></span></button>
                        </form>
                        <div class="float_right t5"> <a href="#" class="pj-button btn-all pj-button-active">All</a> <a href="#" class="pj-button btn-filter btn-status" data-column="status" data-value="confirmed">Confirmed</a> <a href="#" class="pj-button btn-filter btn-status" data-column="status" data-value="pending">Pending</a> <a href="#" class="pj-button btn-filter btn-status" data-column="status" data-value="cancelled">Cancelled</a> </div>
                        <br class="clear_both"> </div>
                    <div class="pj-form-filter-advanced" style="display: block"> <span class="pj-menu-list-arrow"></span>
                        <form action="" method="get" class="form pj-form pj-form-search frm-filter-advanced">
                            <div class="overflow float_left w350">
                                <p>
                                    <label class="title">From</label> <span class="pj-form-field-custom pj-form-field-custom-after">
						<input type="text" name="date_from" class="pj-form-field pointer w80 datepick" readonly="readonly" rel="1" rev="dd-mm-yy">
						<span class="pj-form-field-after"><abbr class="pj-form-field-icon-date"></abbr></span> </span>
                                </p>
                            </div>
                            <div class="overflow float_left w350">
                                <p>
                                    <label class="title">To</label> <span class="pj-form-field-custom pj-form-field-custom-after">
						<input type="text" name="date_to" class="pj-form-field pointer w80 datepick" readonly="readonly" rel="1" rev="dd-mm-yy">
						<span class="pj-form-field-after"><abbr class="pj-form-field-icon-date"></abbr></span> </span>
                                </p>
                            </div>
                            <div class="overflow float_left">
                                <p>
                                    <label class="title">Route</label> <span class="inline-block">
						<select name="route_id" id="route_id" class="pj-form-field w300">
							<option value="">-- Choose--</option>
							<option value="3">Atlanta - Cincinnati</option><option value="11">Boston - Portsmouth</option><option value="4">NY - Cincinnati</option>						</select>
					</span> </p>
                                <p>
                                    <label class="title">Bus</label> <span class="inline-block">
						<select name="bus_id" id="filter_bus_id" class="pj-form-field w300">
							<option value="">-- Choose--</option>
							<option value="1">Atlanta - Cincinnati, 08:00 - 15:05</option><option value="2">Atlanta - Cincinnati, 13:00 - 20:55</option><option value="8">Atlanta - Cincinnati, 15:00 - 23:00</option><option value="9">Boston - Portsmouth, 09:00 - 10:25</option><option value="10">Boston - Portsmouth, 12:00 - 13:25</option><option value="11">Boston - Portsmouth, 10:00 - 11:25</option><option value="6">NY - Cincinnati, 07:00 - 15:00</option><option value="7">NY - Cincinnati, 14:00 - 20:45</option>						</select>
					</span> </p>
                                <p>
                                    <label class="title">&nbsp;</label>
                                    <input type="submit" value="Search" class="pj-button">
                                    <input type="reset" value="Cancel" class="pj-button"> </p>
                            </div>
                            <br class="clear_both"> </form>
                    </div>
                    <div id="grid" class="pj-grid">
                        <table cellpadding="0" cellspacing="0" class="pj-table" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" class="pj-table-toggle-rows"> </th>
                                    <th style="width: 140px;">Client</th>
                                    <th style="width: 130px;">Date / time</th>
                                    <th>Bus / Route</th>
                                    <th style="width: 100px;">
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
                                <tr class="pj-table-row-odd" data-id="id_9">
                                    <td>
                                        <input type="checkbox" name="record[]" value="9" class="pj-table-select-row"> </td>
                                    <td><span class="pj-table-cell-label">Joe Jameson<br>jj@email.com</span></td>
                                    <td><span class="pj-table-cell-label">23-02-2017<br>13:00 - 13:55</span></td>
                                    <td><span class="pj-table-cell-label">Atlanta - Cincinnati, 13:00 - 20:55<br>from Atlanta to Charlotte</span></td>
                                    <td class="pj-table-cell-editable"><span class="pj-table-cell-label pj-status pj-status-confirmed">Confirmed</span>
                                        <select data-name="status" class="pj-form-field pj-form-select pj-selector-editable" style="display: none;">
                                            <option value="pending">Pending</option>
                                            <option value="confirmed">Confirmed</option>
                                            <option value="cancelled">Cancelled</option>
                                        </select>
                                    </td>
                                    <td>
                                        <a href="index.php?controller=pjAdminBookings&amp;action=pjActionUpdate&amp;id=9" class="pj-table-icon-edit"></a>
                                        <a href="index.php?controller=pjAdminBookings&amp;action=pjActionDeleteBooking&amp;id=9" class="pj-table-icon-delete"></a>
                                    </td>
                                </tr>
                                <tr class="pj-table-row-even" data-id="id_8">
                                    <td>
                                        <input type="checkbox" name="record[]" value="8" class="pj-table-select-row"> </td>
                                    <td><span class="pj-table-cell-label">Kevin Johnson<br>kevin@email.com</span></td>
                                    <td><span class="pj-table-cell-label">03-04-2017<br>11:20 - 13:00</span></td>
                                    <td><span class="pj-table-cell-label">NY - Cincinnati, 07:00 - 15:00<br>from Norfolk to Richmond</span></td>
                                    <td class="pj-table-cell-editable"><span class="pj-table-cell-label pj-status pj-status-pending">Pending</span>
                                        <select data-name="status" class="pj-form-field pj-form-select pj-selector-editable" style="display: none;">
                                            <option value="pending">Pending</option>
                                            <option value="confirmed">Confirmed</option>
                                            <option value="cancelled">Cancelled</option>
                                        </select>
                                    </td>
                                    <td>
                                        <a href="index.php?controller=pjAdminBookings&amp;action=pjActionUpdate&amp;id=8" class="pj-table-icon-edit"></a>
                                        <a href="index.php?controller=pjAdminBookings&amp;action=pjActionDeleteBooking&amp;id=8" class="pj-table-icon-delete"></a>
                                    </td>
                                </tr>
                                <tr class="pj-table-row-odd" data-id="id_7">
                                    <td>
                                        <input type="checkbox" name="record[]" value="7" class="pj-table-select-row"> </td>
                                    <td><span class="pj-table-cell-label">Melissa Johnson<br>melissa@email.com</span></td>
                                    <td><span class="pj-table-cell-label">24-03-2017<br>07:00 - 15:00</span></td>
                                    <td><span class="pj-table-cell-label">NY - Cincinnati, 07:00 - 15:00<br>from New York to Cincinnati</span></td>
                                    <td class="pj-table-cell-editable"><span class="pj-table-cell-label pj-status pj-status-confirmed">Confirmed</span>
                                        <select data-name="status" class="pj-form-field pj-form-select pj-selector-editable" style="display: none;">
                                            <option value="pending">Pending</option>
                                            <option value="confirmed">Confirmed</option>
                                            <option value="cancelled">Cancelled</option>
                                        </select>
                                    </td>
                                    <td>
                                        <a href="index.php?controller=pjAdminBookings&amp;action=pjActionUpdate&amp;id=7" class="pj-table-icon-edit"></a>
                                        <a href="index.php?controller=pjAdminBookings&amp;action=pjActionDeleteBooking&amp;id=7" class="pj-table-icon-delete"></a>
                                    </td>
                                </tr>
                                <tr class="pj-table-row-even" data-id="id_6">
                                    <td>
                                        <input type="checkbox" name="record[]" value="6" class="pj-table-select-row"> </td>
                                    <td><span class="pj-table-cell-label">John Smith<br>j.smith@email.com</span></td>
                                    <td><span class="pj-table-cell-label">10-03-2017<br>08:00 - 13:40</span></td>
                                    <td><span class="pj-table-cell-label">Atlanta - Cincinnati, 08:00 - 15:05<br>from Atlanta to Baltimore</span></td>
                                    <td class="pj-table-cell-editable"><span class="pj-table-cell-label pj-status pj-status-pending">Pending</span>
                                        <select data-name="status" class="pj-form-field pj-form-select pj-selector-editable" style="display: none;">
                                            <option value="pending">Pending</option>
                                            <option value="confirmed">Confirmed</option>
                                            <option value="cancelled">Cancelled</option>
                                        </select>
                                    </td>
                                    <td>
                                        <a href="index.php?controller=pjAdminBookings&amp;action=pjActionUpdate&amp;id=6" class="pj-table-icon-edit"></a>
                                        <a href="index.php?controller=pjAdminBookings&amp;action=pjActionDeleteBooking&amp;id=6" class="pj-table-icon-delete"></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="pj-paginator" style="width: 100%;"><a href="#" class="pj-button pj-paginator-button-actions">Choose Action<span class="pj-button-arrow-down"></span></a><span class="pj-menu-list-wrap" style="top: 582px; left: 436.5px; width: 114px; display: none;"><span class="pj-menu-list-arrow"></span>
                            <ul class="pj-menu-list">
                                <li><a href="index.php?controller=pjAdminBookings&amp;action=pjActionDeleteBookingBulk" class="pj-paginator-action">Delete selected</a></li>
                                <li><a href="index.php?controller=pjAdminBookings&amp;action=pjActionExportBooking" class="pj-paginator-action">Export</a></li>
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
                    <div class="pj-preloader" style="display: none; left: 432.5px; top: 312px; width: 742px; height: 180px;"></div>
                    <script type="text/javascript">
                        var pjGrid = pjGrid || {};
                        pjGrid.queryString = "";
                        var myLabel = myLabel || {};
                        myLabel.client = "Client";
                        myLabel.date_time = "Date / time";
                        myLabel.bus_route = "Bus / Route";
                        myLabel.email = "Email";
                        myLabel.status = "Status";
                        myLabel.exported = "Export";
                        myLabel.delete_selected = "Delete selected";
                        myLabel.delete_confirmation = "Are you sure that you want to delete selected record(s)?";
                        myLabel.pending = "Pending";
                        myLabel.confirmed = "Confirmed";
                        myLabel.cancelled = "Cancelled";
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
