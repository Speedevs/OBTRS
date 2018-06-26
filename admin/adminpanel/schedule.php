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
    <script src="./assets/js/pjAdminSchedule.js"></script>
    <script src="./assets/js/index.js"></script>
    <!--[if gte IE 9]>
  		<style type="text/css">.gradient {filter: none}</style>
		<![endif]-->
</head>

<body>
    <div id="container">
        <div id="header">
            <div id="logo"> <a href="http://www.phpjabbers.com/bus-reservation-system/" target="_blank" rel="nofollow">Bus Reservation System</a></div>
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
                    <div class="ui-tabs ui-widget ui-widget-content ui-corner-all b10">
                        <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
                            <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active"><a href="schedule.html">Daily schedule</a></li>
                            <li class="ui-state-default ui-corner-top"><a href="schedule-route-timetable.html">Route Timetable</a></li>
                        </ul>
                    </div>
                    <div class="notice-box">
                        <div class="notice-top"></div>
                        <div class="notice-middle"> <span class="notice-info">&nbsp;</span> <span class="block bold">Buses schedule</span><span class="block">Here you can see a list of buses that will departure today or the date selected by you. You can filter the list of buses by routes. You can also sort the list using the arrows into each column header. &quot;FT Tickets&quot; stands for the number of full trip tickets sold. &quot;Total Tickets&quot; stands for the total number of tickets sold for this bus / trip. You can directly add new booking for a selected bus using the &quot;Add booking&quot; button. You can view more details about the bus / trip or start some actions using the arrow next to &quot;Add booking&quot; button.</span>
                            <a href="#" class="notice-close"></a>
                        </div>
                        <div class="notice-bottom"></div>
                    </div>
                    <div class="b10">
                        <form id="frmSchedule" action="" class="pj-form frm-filter">
                            <label class="block float_left t6 r5">Buses on:</label> <a href="#" class="pj-button btn-today float_left r10 pj-button-active" data-value="03-06-2018">Today</a> <span class="pj-form-field-custom pj-form-field-custom-after float_left r5">
				<input type="text" id="schedule_date" name="schedule_date" class="pj-form-field pointer w100 datepick" readonly="readonly" rel="1" rev="dd-mm-yy" value="03-06-2018"/>
				<span class="pj-form-field-after"><abbr class="pj-form-field-icon-date"></abbr></span> </span> <span class="block float_right">
				<a id="bs_print_schedule" href="#" target="_blank" class="pj-button float_right l5">Print schedule</a>
				<select name="route_id" id="route_id" class="pj-form-field w200 float_right l5">
					<option value="">-- Choose--</option>
					<option value="3">Atlanta - Cincinnati</option><option value="11">Boston - Portsmouth</option><option value="4">NY - Cincinnati</option>				</select>
				<label class="block float_right t6">Filter by route:</label>
				<input type="hidden" id="bs_print_href" id="bs_print_href" value="/1528013160_785/index.php?controller=pjAdminSchedule&action=pjActionPrintSchedule"/>
			</span> </form>
                        <br class="clear_both" /> </div>
                    <div class="bs-loader-outer">
                        <div class="bs-loader"></div>
                        <div id="boxSchedule">
                            <table class="pj-table" cellspacing="0" cellpadding="0" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="pj-table-sort-label">Bus</div>
                                            <div class="pj-table-sort">
                                                <a href="#" class="pj-table-sort-up" data-column="route"></a>
                                                <a href="#" class="pj-table-sort-down" data-column="route"></a>
                                            </div>
                                        </th>
                                        <th style="width: 80px;">
                                            <div class="pj-table-sort-label">Departure</div>
                                            <div class="pj-table-sort">
                                                <a href="#" class="pj-table-sort-up pj-table-sort-up-active" data-column="departure"></a>
                                                <a href="#" class="pj-table-sort-down" data-column="departure"></a>
                                            </div>
                                        </th>
                                        <th style="width: 80px;">
                                            <div class="pj-table-sort-label">Arrival</div>
                                            <div class="pj-table-sort">
                                                <a href="#" class="pj-table-sort-up" data-column="arrive"></a>
                                                <a href="#" class="pj-table-sort-down" data-column="arrive"></a>
                                            </div>
                                        </th>
                                        <th style="width: 90px;">
                                            <div class="pj-table-sort-label">FT Tickets</div>
                                            <div class="pj-table-sort">
                                                <a href="#" class="pj-table-sort-up" data-column="tickets"></a>
                                                <a href="#" class="pj-table-sort-down" data-column="tickets"></a>
                                            </div>
                                        </th>
                                        <th style="width: 100px;">
                                            <div class="pj-table-sort-label">Total Tickets</div>
                                            <div class="pj-table-sort">
                                                <a href="#" class="pj-table-sort-up" data-column="total_tickets"></a>
                                                <a href="#" class="pj-table-sort-down" data-column="total_tickets"></a>
                                            </div>
                                        </th>
                                        <th style="width: 120px;">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="">NY - Cincinnati</td>
                                        <td class="">07:00</td>
                                        <td class="">15:00</td>
                                        <td class="">0</td>
                                        <td class="">0</td>
                                        <td> <a href="/1528013160_785/index.php?controller=pjAdminBookings&amp;action=pjActionCreate&amp;bus_id=6&amp;date=03-06-2018&amp;pickup_id=1&amp;return_id=8" class="pj-button pj-link">Add booking</a> <a href="#" class="pj-table-icon-menu pj-table-button"><span class="pj-button-arrow-down"></span></a> <span style="display: none;" class="pj-menu-list-wrap">
							<span class="pj-menu-list-arrow"></span>
                                            <ul class="pj-menu-list">
                                                <li><a href="index.php?controller=pjAdminSchedule&amp;action=pjActionBookings&amp;bus_id=6&amp;date=03-06-2018">Passengers List</a></li>
                                                <li><a href="index.php?controller=pjAdminSchedule&amp;action=pjActionSeats&amp;bus_id=6&amp;date=03-06-2018">Seats List</a></li>
                                                <li><a href="index.php?controller=pjAdminSchedule&amp;action=pjActionPrintBookings&amp;bus_id=6&amp;date=2018-06-03" target="_blank">Print passengers list</a></li>
                                                <li><a href="index.php?controller=pjAdminSchedule&amp;action=pjActionPrintSeats&amp;bus_id=6&amp;date=2018-06-03" target="_blank">Print seats list</a></li>
                                                <li><a href="index.php?controller=pjAdminBookings&amp;action=pjActionIndex&amp;bus_id=6">View trip bookings</a></li>
                                                <li><a href="index.php?controller=pjAdminBuses&amp;action=pjActionTime&amp;id=6">Edit bus</a></li>
                                                <li><a href="index.php?controller=pjAdminBuses&amp;action=pjActionNotOperating&amp;id=6&amp;date=03-06-2018">Cancel bus</a></li>
                                            </ul>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="">Atlanta - Cincinnati</td>
                                        <td class="">08:00</td>
                                        <td class="">15:05</td>
                                        <td class="">0</td>
                                        <td class="">0</td>
                                        <td> <a href="/1528013160_785/index.php?controller=pjAdminBookings&amp;action=pjActionCreate&amp;bus_id=1&amp;date=03-06-2018&amp;pickup_id=9&amp;return_id=8" class="pj-button pj-link">Add booking</a> <a href="#" class="pj-table-icon-menu pj-table-button"><span class="pj-button-arrow-down"></span></a> <span style="display: none;" class="pj-menu-list-wrap">
							<span class="pj-menu-list-arrow"></span>
                                            <ul class="pj-menu-list">
                                                <li><a href="index.php?controller=pjAdminSchedule&amp;action=pjActionBookings&amp;bus_id=1&amp;date=03-06-2018">Passengers List</a></li>
                                                <li><a href="index.php?controller=pjAdminSchedule&amp;action=pjActionSeats&amp;bus_id=1&amp;date=03-06-2018">Seats List</a></li>
                                                <li><a href="index.php?controller=pjAdminSchedule&amp;action=pjActionPrintBookings&amp;bus_id=1&amp;date=2018-06-03" target="_blank">Print passengers list</a></li>
                                                <li><a href="index.php?controller=pjAdminSchedule&amp;action=pjActionPrintSeats&amp;bus_id=1&amp;date=2018-06-03" target="_blank">Print seats list</a></li>
                                                <li><a href="index.php?controller=pjAdminBookings&amp;action=pjActionIndex&amp;bus_id=1">View trip bookings</a></li>
                                                <li><a href="index.php?controller=pjAdminBuses&amp;action=pjActionTime&amp;id=1">Edit bus</a></li>
                                                <li><a href="index.php?controller=pjAdminBuses&amp;action=pjActionNotOperating&amp;id=1&amp;date=03-06-2018">Cancel bus</a></li>
                                            </ul>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="">Boston - Portsmouth</td>
                                        <td class="">09:00</td>
                                        <td class="">10:25</td>
                                        <td class="">0</td>
                                        <td class="">0</td>
                                        <td> <a href="/1528013160_785/index.php?controller=pjAdminBookings&amp;action=pjActionCreate&amp;bus_id=9&amp;date=03-06-2018&amp;pickup_id=16&amp;return_id=17" class="pj-button pj-link">Add booking</a> <a href="#" class="pj-table-icon-menu pj-table-button"><span class="pj-button-arrow-down"></span></a> <span style="display: none;" class="pj-menu-list-wrap">
							<span class="pj-menu-list-arrow"></span>
                                            <ul class="pj-menu-list">
                                                <li><a href="index.php?controller=pjAdminSchedule&amp;action=pjActionBookings&amp;bus_id=9&amp;date=03-06-2018">Passengers List</a></li>
                                                <li><a href="index.php?controller=pjAdminSchedule&amp;action=pjActionSeats&amp;bus_id=9&amp;date=03-06-2018">Seats List</a></li>
                                                <li><a href="index.php?controller=pjAdminSchedule&amp;action=pjActionPrintBookings&amp;bus_id=9&amp;date=2018-06-03" target="_blank">Print passengers list</a></li>
                                                <li><a href="index.php?controller=pjAdminSchedule&amp;action=pjActionPrintSeats&amp;bus_id=9&amp;date=2018-06-03" target="_blank">Print seats list</a></li>
                                                <li><a href="index.php?controller=pjAdminBookings&amp;action=pjActionIndex&amp;bus_id=9">View trip bookings</a></li>
                                                <li><a href="index.php?controller=pjAdminBuses&amp;action=pjActionTime&amp;id=9">Edit bus</a></li>
                                                <li><a href="index.php?controller=pjAdminBuses&amp;action=pjActionNotOperating&amp;id=9&amp;date=03-06-2018">Cancel bus</a></li>
                                            </ul>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="">Boston - Portsmouth</td>
                                        <td class="">12:00</td>
                                        <td class="">13:25</td>
                                        <td class="">0</td>
                                        <td class="">0</td>
                                        <td> <a href="/1528013160_785/index.php?controller=pjAdminBookings&amp;action=pjActionCreate&amp;bus_id=10&amp;date=03-06-2018&amp;pickup_id=16&amp;return_id=17" class="pj-button pj-link">Add booking</a> <a href="#" class="pj-table-icon-menu pj-table-button"><span class="pj-button-arrow-down"></span></a> <span style="display: none;" class="pj-menu-list-wrap">
							<span class="pj-menu-list-arrow"></span>
                                            <ul class="pj-menu-list">
                                                <li><a href="index.php?controller=pjAdminSchedule&amp;action=pjActionBookings&amp;bus_id=10&amp;date=03-06-2018">Passengers List</a></li>
                                                <li><a href="index.php?controller=pjAdminSchedule&amp;action=pjActionSeats&amp;bus_id=10&amp;date=03-06-2018">Seats List</a></li>
                                                <li><a href="index.php?controller=pjAdminSchedule&amp;action=pjActionPrintBookings&amp;bus_id=10&amp;date=2018-06-03" target="_blank">Print passengers list</a></li>
                                                <li><a href="index.php?controller=pjAdminSchedule&amp;action=pjActionPrintSeats&amp;bus_id=10&amp;date=2018-06-03" target="_blank">Print seats list</a></li>
                                                <li><a href="index.php?controller=pjAdminBookings&amp;action=pjActionIndex&amp;bus_id=10">View trip bookings</a></li>
                                                <li><a href="index.php?controller=pjAdminBuses&amp;action=pjActionTime&amp;id=10">Edit bus</a></li>
                                                <li><a href="index.php?controller=pjAdminBuses&amp;action=pjActionNotOperating&amp;id=10&amp;date=03-06-2018">Cancel bus</a></li>
                                            </ul>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="">NY - Cincinnati</td>
                                        <td class="">14:00</td>
                                        <td class="">20:45</td>
                                        <td class="">0</td>
                                        <td class="">0</td>
                                        <td> <a href="/1528013160_785/index.php?controller=pjAdminBookings&amp;action=pjActionCreate&amp;bus_id=7&amp;date=03-06-2018&amp;pickup_id=1&amp;return_id=8" class="pj-button pj-link">Add booking</a> <a href="#" class="pj-table-icon-menu pj-table-button"><span class="pj-button-arrow-down"></span></a> <span style="display: none;" class="pj-menu-list-wrap">
							<span class="pj-menu-list-arrow"></span>
                                            <ul class="pj-menu-list">
                                                <li><a href="index.php?controller=pjAdminSchedule&amp;action=pjActionBookings&amp;bus_id=7&amp;date=03-06-2018">Passengers List</a></li>
                                                <li><a href="index.php?controller=pjAdminSchedule&amp;action=pjActionSeats&amp;bus_id=7&amp;date=03-06-2018">Seats List</a></li>
                                                <li><a href="index.php?controller=pjAdminSchedule&amp;action=pjActionPrintBookings&amp;bus_id=7&amp;date=2018-06-03" target="_blank">Print passengers list</a></li>
                                                <li><a href="index.php?controller=pjAdminSchedule&amp;action=pjActionPrintSeats&amp;bus_id=7&amp;date=2018-06-03" target="_blank">Print seats list</a></li>
                                                <li><a href="index.php?controller=pjAdminBookings&amp;action=pjActionIndex&amp;bus_id=7">View trip bookings</a></li>
                                                <li><a href="index.php?controller=pjAdminBuses&amp;action=pjActionTime&amp;id=7">Edit bus</a></li>
                                                <li><a href="index.php?controller=pjAdminBuses&amp;action=pjActionNotOperating&amp;id=7&amp;date=03-06-2018">Cancel bus</a></li>
                                            </ul>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="">Atlanta - Cincinnati</td>
                                        <td class="">15:00</td>
                                        <td class="">23:00</td>
                                        <td class="">0</td>
                                        <td class="">0</td>
                                        <td> <a href="/1528013160_785/index.php?controller=pjAdminBookings&amp;action=pjActionCreate&amp;bus_id=8&amp;date=03-06-2018&amp;pickup_id=9&amp;return_id=8" class="pj-button pj-link">Add booking</a> <a href="#" class="pj-table-icon-menu pj-table-button"><span class="pj-button-arrow-down"></span></a> <span style="display: none;" class="pj-menu-list-wrap">
							<span class="pj-menu-list-arrow"></span>
                                            <ul class="pj-menu-list">
                                                <li><a href="index.php?controller=pjAdminSchedule&amp;action=pjActionBookings&amp;bus_id=8&amp;date=03-06-2018">Passengers List</a></li>
                                                <li><a href="index.php?controller=pjAdminSchedule&amp;action=pjActionSeats&amp;bus_id=8&amp;date=03-06-2018">Seats List</a></li>
                                                <li><a href="index.php?controller=pjAdminSchedule&amp;action=pjActionPrintBookings&amp;bus_id=8&amp;date=2018-06-03" target="_blank">Print passengers list</a></li>
                                                <li><a href="index.php?controller=pjAdminSchedule&amp;action=pjActionPrintSeats&amp;bus_id=8&amp;date=2018-06-03" target="_blank">Print seats list</a></li>
                                                <li><a href="index.php?controller=pjAdminBookings&amp;action=pjActionIndex&amp;bus_id=8">View trip bookings</a></li>
                                                <li><a href="index.php?controller=pjAdminBuses&amp;action=pjActionTime&amp;id=8">Edit bus</a></li>
                                                <li><a href="index.php?controller=pjAdminBuses&amp;action=pjActionNotOperating&amp;id=8&amp;date=03-06-2018">Cancel bus</a></li>
                                            </ul>
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <input type="hidden" id="bs_schedule_date" name="bs_schedule_date" value="2018-06-03" />
                        </div>
                    </div>
                    <br/> </div>
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
            <p>Copyright &copy; 2018 <a href="https://www.PHPJabbers.com" target="_blank">PHPJabbers.com</a></p>
        </div>
    </div>
    <script async src="//demo.phpjabbers.com/popup/js/load.js"></script>
</body>

</html>
