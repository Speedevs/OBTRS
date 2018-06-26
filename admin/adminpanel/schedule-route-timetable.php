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
                            <li class="ui-state-default ui-corner-top"><a href="schedule.html">Daily schedule</a></li>
                            <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active"><a href="schedule-route-timetable.html">Route Timetable</a></li>
                        </ul>
                    </div>
                    <div class="notice-box">
                        <div class="notice-top"></div>
                        <div class="notice-middle"> <span class="notice-info">&nbsp;</span> <span class="block bold">Route timetable</span><span class="block">Here you can see a departure timetable of all buses of a specific route. Use the "Select route" drop-down to choose the route you wish to display. It is weekly timetable and you can browse weeks by the "previous" and "next" links above the timetable. You can also jump to a chosen date / week timetable using the calendar date picker. To view the seats list of a bus trip click on its departure time. On mouse over you will see the number of passengers (total tickets sold) for this trip.</span>
                            <a href="#" class="notice-close"></a>
                        </div>
                        <div class="notice-bottom"></div>
                    </div>
                    <div class="b10">
                        <form id="frmTimetable" action="" class="pj-form frm-filter"> <span class="block float_left">
				<label>Select route:</label>
				<select name="route_id" id="route_id" class="pj-form-field w200 r5">
					<option value="3">Atlanta - Cincinnati</option><option value="11">Boston - Portsmouth</option><option value="4">NY - Cincinnati</option>				</select>
			</span> <span class="pj-form-field-custom pj-form-field-custom-after float_left r5">
				<input type="text" id="selected_date" name="selected_date" class="pj-form-field pointer w100 datepick" readonly="readonly" rel="1" rev="dd-mm-yy" value="03-06-2018">
				<span class="pj-form-field-after"><abbr class="pj-form-field-icon-date"></abbr></span> </span>
                        </form>
                        <br class="clear_both"> </div>
                    <div class="bs-loader-outer">
                        <div class="bs-loader"></div>
                        <div id="boxTimetable">
                            <div class="b5 overflow"> <a class="float_left block bs-navigator-week" id="bs_prev_week" href="javascript:void(0);" data-week_start="2018-05-27" data-week_end="2018-06-03">Previous week</a> <a class="float_right block bs-navigator-week" id="bs_next_week" href="javascript:void(0);" data-week_start="2018-06-11" data-week_end="2018-06-17">Next week</a> </div>
                            <div class="clear_both"></div>
                            <table class="pj-table" cellspacing="0" cellpadding="0" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <td>Bus</td>
                                        <td class="bs-bold-date">Sunday
                                            <br>03-06-2018</td>
                                        <td>Monday
                                            <br>04-06-2018</td>
                                        <td>Tuesday
                                            <br>05-06-2018</td>
                                        <td>Wednesday
                                            <br>06-06-2018</td>
                                        <td>Thursday
                                            <br>07-06-2018</td>
                                        <td>Friday
                                            <br>08-06-2018</td>
                                        <td>Saturday
                                            <br>09-06-2018</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="/1528013160_785/index.php?controller=pjAdminBuses&amp;action=pjActionTime&amp;id=1">Atlanta - Cincinnati</a></td>
                                        <td><a class="timetable-tip" href="/1528013160_785/index.php?controller=pjAdminSchedule&amp;action=pjActionSeats&amp;bus_id=1&amp;date=03-06-2018" original-title="0: passengers">08:00</a></td>
                                        <td><a class="timetable-tip" href="/1528013160_785/index.php?controller=pjAdminSchedule&amp;action=pjActionSeats&amp;bus_id=1&amp;date=04-06-2018" original-title="0: passengers">08:00</a></td>
                                        <td><a class="timetable-tip" href="/1528013160_785/index.php?controller=pjAdminSchedule&amp;action=pjActionSeats&amp;bus_id=1&amp;date=05-06-2018" original-title="0: passengers">08:00</a></td>
                                        <td><a class="timetable-tip" href="/1528013160_785/index.php?controller=pjAdminSchedule&amp;action=pjActionSeats&amp;bus_id=1&amp;date=06-06-2018" original-title="0: passengers">08:00</a></td>
                                        <td><a class="timetable-tip" href="/1528013160_785/index.php?controller=pjAdminSchedule&amp;action=pjActionSeats&amp;bus_id=1&amp;date=07-06-2018" original-title="0: passengers">08:00</a></td>
                                        <td><a class="timetable-tip" href="/1528013160_785/index.php?controller=pjAdminSchedule&amp;action=pjActionSeats&amp;bus_id=1&amp;date=08-06-2018" original-title="0: passengers">08:00</a></td>
                                        <td><a class="timetable-tip" href="/1528013160_785/index.php?controller=pjAdminSchedule&amp;action=pjActionSeats&amp;bus_id=1&amp;date=09-06-2018" original-title="0: passengers">08:00</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="/1528013160_785/index.php?controller=pjAdminBuses&amp;action=pjActionTime&amp;id=2">Atlanta - Cincinnati</a></td>
                                        <td>&nbsp;</td>
                                        <td><a class="timetable-tip" href="/1528013160_785/index.php?controller=pjAdminSchedule&amp;action=pjActionSeats&amp;bus_id=2&amp;date=04-06-2018" original-title="0: passengers">13:00</a></td>
                                        <td><a class="timetable-tip" href="/1528013160_785/index.php?controller=pjAdminSchedule&amp;action=pjActionSeats&amp;bus_id=2&amp;date=05-06-2018" original-title="0: passengers">13:00</a></td>
                                        <td><a class="timetable-tip" href="/1528013160_785/index.php?controller=pjAdminSchedule&amp;action=pjActionSeats&amp;bus_id=2&amp;date=06-06-2018" original-title="0: passengers">13:00</a></td>
                                        <td><a class="timetable-tip" href="/1528013160_785/index.php?controller=pjAdminSchedule&amp;action=pjActionSeats&amp;bus_id=2&amp;date=07-06-2018" original-title="0: passengers">13:00</a></td>
                                        <td><a class="timetable-tip" href="/1528013160_785/index.php?controller=pjAdminSchedule&amp;action=pjActionSeats&amp;bus_id=2&amp;date=08-06-2018" original-title="0: passengers">13:00</a></td>
                                        <td><a class="timetable-tip" href="/1528013160_785/index.php?controller=pjAdminSchedule&amp;action=pjActionSeats&amp;bus_id=2&amp;date=09-06-2018" original-title="0: passengers">13:00</a></td>
                                    </tr>
                                    <tr class="">
                                        <td><a href="/1528013160_785/index.php?controller=pjAdminBuses&amp;action=pjActionTime&amp;id=8">Atlanta - Cincinnati</a></td>
                                        <td><a class="timetable-tip" href="/1528013160_785/index.php?controller=pjAdminSchedule&amp;action=pjActionSeats&amp;bus_id=8&amp;date=03-06-2018" original-title="0: passengers">15:00</a></td>
                                        <td><a class="timetable-tip" href="/1528013160_785/index.php?controller=pjAdminSchedule&amp;action=pjActionSeats&amp;bus_id=8&amp;date=04-06-2018" original-title="0: passengers">15:00</a></td>
                                        <td>&nbsp;</td>
                                        <td><a class="timetable-tip" href="/1528013160_785/index.php?controller=pjAdminSchedule&amp;action=pjActionSeats&amp;bus_id=8&amp;date=06-06-2018" original-title="0: passengers">15:00</a></td>
                                        <td>&nbsp;</td>
                                        <td><a class="timetable-tip" href="/1528013160_785/index.php?controller=pjAdminSchedule&amp;action=pjActionSeats&amp;bus_id=8&amp;date=08-06-2018" original-title="0: passengers">15:00</a></td>
                                        <td>&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br> </div>
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
