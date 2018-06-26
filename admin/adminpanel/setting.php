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
                    <div class="ui-tabs ui-widget ui-widget-content ui-corner-all b10">
                        <ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
                            <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active"><a href="setting.html">General</a></li>
                        </ul>
                    </div>
                    <form action="/1528013160_785/index.php?controller=pjAdminOptions&amp;action=pjActionUpdate" method="post" class="form pj-form">
                        <input type="hidden" name="options_update" value="1">
                        <input type="hidden" name="next_action" value="pjActionIndex">
                        <table class="pj-table" cellpadding="0" cellspacing="0" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Option</th>
                                    <th>Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="pj-table-row-odd" style="">
                                    <td>Date format</td>
                                    <td>
                                        <select name="value-enum-o_date_format" class="pj-form-field">
                                            <option value="d.m.Y|m.d.Y|Y.m.d|j.n.Y|n.j.Y|Y.n.j|d/m/Y|m/d/Y|Y/m/d|j/n/Y|n/j/Y|Y/n/j|d-m-Y|m-d-Y|Y-m-d|j-n-Y|n-j-Y|Y-n-j::d.m.Y">d.m.Y (25.09.2012)</option>
                                            <option value="d.m.Y|m.d.Y|Y.m.d|j.n.Y|n.j.Y|Y.n.j|d/m/Y|m/d/Y|Y/m/d|j/n/Y|n/j/Y|Y/n/j|d-m-Y|m-d-Y|Y-m-d|j-n-Y|n-j-Y|Y-n-j::m.d.Y">m.d.Y (09.25.2012)</option>
                                            <option value="d.m.Y|m.d.Y|Y.m.d|j.n.Y|n.j.Y|Y.n.j|d/m/Y|m/d/Y|Y/m/d|j/n/Y|n/j/Y|Y/n/j|d-m-Y|m-d-Y|Y-m-d|j-n-Y|n-j-Y|Y-n-j::Y.m.d">Y.m.d (2012.09.25)</option>
                                            <option value="d.m.Y|m.d.Y|Y.m.d|j.n.Y|n.j.Y|Y.n.j|d/m/Y|m/d/Y|Y/m/d|j/n/Y|n/j/Y|Y/n/j|d-m-Y|m-d-Y|Y-m-d|j-n-Y|n-j-Y|Y-n-j::j.n.Y">j.n.Y (25.9.2012)</option>
                                            <option value="d.m.Y|m.d.Y|Y.m.d|j.n.Y|n.j.Y|Y.n.j|d/m/Y|m/d/Y|Y/m/d|j/n/Y|n/j/Y|Y/n/j|d-m-Y|m-d-Y|Y-m-d|j-n-Y|n-j-Y|Y-n-j::n.j.Y">n.j.Y (9.25.2012)</option>
                                            <option value="d.m.Y|m.d.Y|Y.m.d|j.n.Y|n.j.Y|Y.n.j|d/m/Y|m/d/Y|Y/m/d|j/n/Y|n/j/Y|Y/n/j|d-m-Y|m-d-Y|Y-m-d|j-n-Y|n-j-Y|Y-n-j::Y.n.j">Y.n.j (2012.9.25)</option>
                                            <option value="d.m.Y|m.d.Y|Y.m.d|j.n.Y|n.j.Y|Y.n.j|d/m/Y|m/d/Y|Y/m/d|j/n/Y|n/j/Y|Y/n/j|d-m-Y|m-d-Y|Y-m-d|j-n-Y|n-j-Y|Y-n-j::d/m/Y">d/m/Y (25/09/2012)</option>
                                            <option value="d.m.Y|m.d.Y|Y.m.d|j.n.Y|n.j.Y|Y.n.j|d/m/Y|m/d/Y|Y/m/d|j/n/Y|n/j/Y|Y/n/j|d-m-Y|m-d-Y|Y-m-d|j-n-Y|n-j-Y|Y-n-j::m/d/Y">m/d/Y (09/25/2012)</option>
                                            <option value="d.m.Y|m.d.Y|Y.m.d|j.n.Y|n.j.Y|Y.n.j|d/m/Y|m/d/Y|Y/m/d|j/n/Y|n/j/Y|Y/n/j|d-m-Y|m-d-Y|Y-m-d|j-n-Y|n-j-Y|Y-n-j::Y/m/d">Y/m/d (2012/09/25)</option>
                                            <option value="d.m.Y|m.d.Y|Y.m.d|j.n.Y|n.j.Y|Y.n.j|d/m/Y|m/d/Y|Y/m/d|j/n/Y|n/j/Y|Y/n/j|d-m-Y|m-d-Y|Y-m-d|j-n-Y|n-j-Y|Y-n-j::j/n/Y">j/n/Y (25/9/2012)</option>
                                            <option value="d.m.Y|m.d.Y|Y.m.d|j.n.Y|n.j.Y|Y.n.j|d/m/Y|m/d/Y|Y/m/d|j/n/Y|n/j/Y|Y/n/j|d-m-Y|m-d-Y|Y-m-d|j-n-Y|n-j-Y|Y-n-j::n/j/Y">n/j/Y (9/25/2012)</option>
                                            <option value="d.m.Y|m.d.Y|Y.m.d|j.n.Y|n.j.Y|Y.n.j|d/m/Y|m/d/Y|Y/m/d|j/n/Y|n/j/Y|Y/n/j|d-m-Y|m-d-Y|Y-m-d|j-n-Y|n-j-Y|Y-n-j::Y/n/j">Y/n/j (2012/9/25)</option>
                                            <option value="d.m.Y|m.d.Y|Y.m.d|j.n.Y|n.j.Y|Y.n.j|d/m/Y|m/d/Y|Y/m/d|j/n/Y|n/j/Y|Y/n/j|d-m-Y|m-d-Y|Y-m-d|j-n-Y|n-j-Y|Y-n-j::d-m-Y" selected="selected">d-m-Y (25-09-2012)</option>
                                            <option value="d.m.Y|m.d.Y|Y.m.d|j.n.Y|n.j.Y|Y.n.j|d/m/Y|m/d/Y|Y/m/d|j/n/Y|n/j/Y|Y/n/j|d-m-Y|m-d-Y|Y-m-d|j-n-Y|n-j-Y|Y-n-j::m-d-Y">m-d-Y (09-25-2012)</option>
                                            <option value="d.m.Y|m.d.Y|Y.m.d|j.n.Y|n.j.Y|Y.n.j|d/m/Y|m/d/Y|Y/m/d|j/n/Y|n/j/Y|Y/n/j|d-m-Y|m-d-Y|Y-m-d|j-n-Y|n-j-Y|Y-n-j::Y-m-d">Y-m-d (2012-09-25)</option>
                                            <option value="d.m.Y|m.d.Y|Y.m.d|j.n.Y|n.j.Y|Y.n.j|d/m/Y|m/d/Y|Y/m/d|j/n/Y|n/j/Y|Y/n/j|d-m-Y|m-d-Y|Y-m-d|j-n-Y|n-j-Y|Y-n-j::j-n-Y">j-n-Y (25-9-2012)</option>
                                            <option value="d.m.Y|m.d.Y|Y.m.d|j.n.Y|n.j.Y|Y.n.j|d/m/Y|m/d/Y|Y/m/d|j/n/Y|n/j/Y|Y/n/j|d-m-Y|m-d-Y|Y-m-d|j-n-Y|n-j-Y|Y-n-j::n-j-Y">n-j-Y (9-25-2012)</option>
                                            <option value="d.m.Y|m.d.Y|Y.m.d|j.n.Y|n.j.Y|Y.n.j|d/m/Y|m/d/Y|Y/m/d|j/n/Y|n/j/Y|Y/n/j|d-m-Y|m-d-Y|Y-m-d|j-n-Y|n-j-Y|Y-n-j::Y-n-j">Y-n-j (2012-9-25)</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr class="pj-table-row-odd" style="">
                                    <td>Time format</td>
                                    <td>
                                        <select name="value-enum-o_time_format" class="pj-form-field">
                                            <option value="H:i|G:i|h:i|h:i a|h:i A|g:i|g:i a|g:i A::H:i" selected="selected">H:i (09:45)</option>
                                            <option value="H:i|G:i|h:i|h:i a|h:i A|g:i|g:i a|g:i A::G:i">G:i (9:45)</option>
                                            <option value="H:i|G:i|h:i|h:i a|h:i A|g:i|g:i a|g:i A::h:i">h:i (09:45)</option>
                                            <option value="H:i|G:i|h:i|h:i a|h:i A|g:i|g:i a|g:i A::h:i a">h:i a (09:45 am)</option>
                                            <option value="H:i|G:i|h:i|h:i a|h:i A|g:i|g:i a|g:i A::h:i A">h:i A (09:45 AM)</option>
                                            <option value="H:i|G:i|h:i|h:i a|h:i A|g:i|g:i a|g:i A::g:i">g:i (9:45)</option>
                                            <option value="H:i|G:i|h:i|h:i a|h:i A|g:i|g:i a|g:i A::g:i a">g:i a (9:45 am)</option>
                                            <option value="H:i|G:i|h:i|h:i a|h:i A|g:i|g:i a|g:i A::g:i A">g:i A (9:45 AM)</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr class="pj-table-row-odd" style="">
                                    <td>Timezone</td>
                                    <td>
                                        <select name="value-enum-o_timezone" class="pj-form-field">
                                            <option value="-43200|-39600|-36000|-32400|-28800|-25200|-21600|-18000|-14400|-10800|-7200|-3600|0|3600|7200|10800|14400|18000|21600|25200|28800|32400|36000|39600|43200|46800::-43200">GMT-12:00</option>
                                            <option value="-43200|-39600|-36000|-32400|-28800|-25200|-21600|-18000|-14400|-10800|-7200|-3600|0|3600|7200|10800|14400|18000|21600|25200|28800|32400|36000|39600|43200|46800::-39600">GMT-11:00</option>
                                            <option value="-43200|-39600|-36000|-32400|-28800|-25200|-21600|-18000|-14400|-10800|-7200|-3600|0|3600|7200|10800|14400|18000|21600|25200|28800|32400|36000|39600|43200|46800::-36000">GMT-10:00</option>
                                            <option value="-43200|-39600|-36000|-32400|-28800|-25200|-21600|-18000|-14400|-10800|-7200|-3600|0|3600|7200|10800|14400|18000|21600|25200|28800|32400|36000|39600|43200|46800::-32400">GMT-09:00</option>
                                            <option value="-43200|-39600|-36000|-32400|-28800|-25200|-21600|-18000|-14400|-10800|-7200|-3600|0|3600|7200|10800|14400|18000|21600|25200|28800|32400|36000|39600|43200|46800::-28800">GMT-08:00</option>
                                            <option value="-43200|-39600|-36000|-32400|-28800|-25200|-21600|-18000|-14400|-10800|-7200|-3600|0|3600|7200|10800|14400|18000|21600|25200|28800|32400|36000|39600|43200|46800::-25200">GMT-07:00</option>
                                            <option value="-43200|-39600|-36000|-32400|-28800|-25200|-21600|-18000|-14400|-10800|-7200|-3600|0|3600|7200|10800|14400|18000|21600|25200|28800|32400|36000|39600|43200|46800::-21600">GMT-06:00</option>
                                            <option value="-43200|-39600|-36000|-32400|-28800|-25200|-21600|-18000|-14400|-10800|-7200|-3600|0|3600|7200|10800|14400|18000|21600|25200|28800|32400|36000|39600|43200|46800::-18000">GMT-05:00</option>
                                            <option value="-43200|-39600|-36000|-32400|-28800|-25200|-21600|-18000|-14400|-10800|-7200|-3600|0|3600|7200|10800|14400|18000|21600|25200|28800|32400|36000|39600|43200|46800::-14400">GMT-04:00</option>
                                            <option value="-43200|-39600|-36000|-32400|-28800|-25200|-21600|-18000|-14400|-10800|-7200|-3600|0|3600|7200|10800|14400|18000|21600|25200|28800|32400|36000|39600|43200|46800::-10800">GMT-03:00</option>
                                            <option value="-43200|-39600|-36000|-32400|-28800|-25200|-21600|-18000|-14400|-10800|-7200|-3600|0|3600|7200|10800|14400|18000|21600|25200|28800|32400|36000|39600|43200|46800::-7200">GMT-02:00</option>
                                            <option value="-43200|-39600|-36000|-32400|-28800|-25200|-21600|-18000|-14400|-10800|-7200|-3600|0|3600|7200|10800|14400|18000|21600|25200|28800|32400|36000|39600|43200|46800::-3600">GMT-01:00</option>
                                            <option value="-43200|-39600|-36000|-32400|-28800|-25200|-21600|-18000|-14400|-10800|-7200|-3600|0|3600|7200|10800|14400|18000|21600|25200|28800|32400|36000|39600|43200|46800::0" selected="selected">GMT</option>
                                            <option value="-43200|-39600|-36000|-32400|-28800|-25200|-21600|-18000|-14400|-10800|-7200|-3600|0|3600|7200|10800|14400|18000|21600|25200|28800|32400|36000|39600|43200|46800::3600">GMT+01:00</option>
                                            <option value="-43200|-39600|-36000|-32400|-28800|-25200|-21600|-18000|-14400|-10800|-7200|-3600|0|3600|7200|10800|14400|18000|21600|25200|28800|32400|36000|39600|43200|46800::7200">GMT+02:00</option>
                                            <option value="-43200|-39600|-36000|-32400|-28800|-25200|-21600|-18000|-14400|-10800|-7200|-3600|0|3600|7200|10800|14400|18000|21600|25200|28800|32400|36000|39600|43200|46800::10800">GMT+03:00</option>
                                            <option value="-43200|-39600|-36000|-32400|-28800|-25200|-21600|-18000|-14400|-10800|-7200|-3600|0|3600|7200|10800|14400|18000|21600|25200|28800|32400|36000|39600|43200|46800::14400">GMT+04:00</option>
                                            <option value="-43200|-39600|-36000|-32400|-28800|-25200|-21600|-18000|-14400|-10800|-7200|-3600|0|3600|7200|10800|14400|18000|21600|25200|28800|32400|36000|39600|43200|46800::18000">GMT+05:00</option>
                                            <option value="-43200|-39600|-36000|-32400|-28800|-25200|-21600|-18000|-14400|-10800|-7200|-3600|0|3600|7200|10800|14400|18000|21600|25200|28800|32400|36000|39600|43200|46800::21600">GMT+06:00</option>
                                            <option value="-43200|-39600|-36000|-32400|-28800|-25200|-21600|-18000|-14400|-10800|-7200|-3600|0|3600|7200|10800|14400|18000|21600|25200|28800|32400|36000|39600|43200|46800::25200">GMT+07:00</option>
                                            <option value="-43200|-39600|-36000|-32400|-28800|-25200|-21600|-18000|-14400|-10800|-7200|-3600|0|3600|7200|10800|14400|18000|21600|25200|28800|32400|36000|39600|43200|46800::28800">GMT+08:00</option>
                                            <option value="-43200|-39600|-36000|-32400|-28800|-25200|-21600|-18000|-14400|-10800|-7200|-3600|0|3600|7200|10800|14400|18000|21600|25200|28800|32400|36000|39600|43200|46800::32400">GMT+09:00</option>
                                            <option value="-43200|-39600|-36000|-32400|-28800|-25200|-21600|-18000|-14400|-10800|-7200|-3600|0|3600|7200|10800|14400|18000|21600|25200|28800|32400|36000|39600|43200|46800::36000">GMT+10:00</option>
                                            <option value="-43200|-39600|-36000|-32400|-28800|-25200|-21600|-18000|-14400|-10800|-7200|-3600|0|3600|7200|10800|14400|18000|21600|25200|28800|32400|36000|39600|43200|46800::39600">GMT+11:00</option>
                                            <option value="-43200|-39600|-36000|-32400|-28800|-25200|-21600|-18000|-14400|-10800|-7200|-3600|0|3600|7200|10800|14400|18000|21600|25200|28800|32400|36000|39600|43200|46800::43200">GMT+12:00</option>
                                            <option value="-43200|-39600|-36000|-32400|-28800|-25200|-21600|-18000|-14400|-10800|-7200|-3600|0|3600|7200|10800|14400|18000|21600|25200|28800|32400|36000|39600|43200|46800::46800">GMT+13:00</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr class="pj-table-row-odd" style="">
                                    <td>First day of the week</td>
                                    <td>
                                        <select name="value-enum-o_week_start" class="pj-form-field">
                                            <option value="0|1|2|3|4|5|6::0">Sunday</option>
                                            <option value="0|1|2|3|4|5|6::1" selected="selected">Monday</option>
                                            <option value="0|1|2|3|4|5|6::2">Tuesday</option>
                                            <option value="0|1|2|3|4|5|6::3">Wednesday</option>
                                            <option value="0|1|2|3|4|5|6::4">Thursday</option>
                                            <option value="0|1|2|3|4|5|6::5">Friday</option>
                                            <option value="0|1|2|3|4|5|6::6">Saturday</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr class="pj-table-row-odd" style="">
                                    <td>Send email</td>
                                    <td>
                                        <select name="value-enum-o_send_email" class="pj-form-field">
                                            <option value="mail|smtp::mail" selected="selected">PHP mail()</option>
                                            <option value="mail|smtp::smtp">SMTP</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr class="pj-table-row-odd boxSmtp" style="display: none">
                                    <td>SMTP Host</td>
                                    <td>
                                        <input type="text" name="value-string-o_smtp_host" class="pj-form-field w200" value=""> </td>
                                </tr>
                                <tr class="pj-table-row-odd boxSmtp" style="display: none">
                                    <td>SMTP Password</td>
                                    <td>
                                        <input type="text" name="value-string-o_smtp_pass" class="pj-form-field w200" value=""> </td>
                                </tr>
                                <tr class="pj-table-row-odd boxSmtp" style="display: none">
                                    <td>SMTP Port</td>
                                    <td> <span class="ui-spinner ui-widget ui-widget-content ui-corner-all"><input type="text" name="value-int-o_smtp_port" class="pj-form-field field-int w60 ui-spinner-input" value="25" aria-valuemin="0" aria-valuenow="25" autocomplete="off" role="spinbutton"><a class="ui-spinner-button ui-spinner-up ui-corner-tr ui-button ui-widget ui-state-default ui-button-text-only" tabindex="-1" role="button" aria-disabled="false"><span class="ui-button-text"><span class="ui-icon ui-icon-triangle-1-n">▲</span></span>
                                        </a><a class="ui-spinner-button ui-spinner-down ui-corner-br ui-button ui-widget ui-state-default ui-button-text-only" tabindex="-1" role="button" aria-disabled="false"><span class="ui-button-text"><span class="ui-icon ui-icon-triangle-1-s">▼</span></span></a></span>
                                    </td>
                                </tr>
                                <tr class="pj-table-row-odd boxSmtp" style="display: none">
                                    <td>SMTP Username</td>
                                    <td>
                                        <input type="text" name="value-string-o_smtp_user" class="pj-form-field w200" value=""> </td>
                                </tr>
                                <tr class="pj-table-row-odd" style="">
                                    <td>Sender email (for email notifications)</td>
                                    <td>
                                        <input type="text" name="value-string-o_sender_email" class="pj-form-field w200" value="admin@admin.com"> </td>
                                </tr>
                            </tbody>
                        </table>
                        <p>
                            <input type="submit" value="Save" class="pj-button">
                        </p>
                    </form>
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
