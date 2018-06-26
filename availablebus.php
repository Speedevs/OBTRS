<!DOCTYPE html>
<html dir="">

<head>
    <title>Bus Reservation System</title>
    <meta charset="utf-8">
    <meta name="fragment" content="!">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="assets/css/index.css" type="text/css" rel="stylesheet" />

</head>

<body>
    <div id="pagewrapper">
        <div id="topbg"></div>
        <div id="systemName">
            <h1>Bus Booking</h1>
        </div>
        <div id="header">
            <div id="mainmenu">
                <header>
                    <ul>
                        <li><a href="http://localhost/SLTB/index">Home</a></li>
                        <li><a href="http://localhost/SLTB/login">Login</a></li>


                    </ul>
                </header>
            </div>
        </div>
        <div></div>
        <div></div>
        <div></div>

        <div id="content">


            <div>
                <div id="bodyhead">
                    <h1>Available Buses</h1>
                </div>
                <form action="http://localhost/SLTB/booker/booking/" method="post" class="has-validation-callback">
                    <div class="busdataarea">
                        <label><b>Booking Date :</b></label><label>2018-05-20</label>
                    </div>
                    <div id="tSize">
                        <div class="demo_jui">
                            <input type="hidden" name="book_date" id="book_date" value="2018-05-20">
                            <input type="hidden" name="book_journeyFrom" id="book_journeyFrom" value="Colombo">
                            <input type="hidden" name="book_journeyTo" id="book_journeyTo" value="Jaffna">
                            <input type="hidden" name="book_busNo" id="book_busNo" value="">
                            <input type="hidden" name="book_numberOfSeat" id="book_numberOfSeat" value="">
                            <input type="hidden" name="book_price" id="book_price" value="">
                            <div id="exampleBooker_wrapper" class="dataTables_wrapper" role="grid">
                                <div class="fg-toolbar ui-toolbar ui-widget-header ui-corner-tl ui-corner-tr ui-helper-clearfix"></div>
                                <table cellpadding="0" cellspacing="0" border="0" class="display dataTable" id="exampleBooker">
                                    <thead>
                                        <tr role="row">
                                            <th class="ui-state-default" role="columnheader" tabindex="0" aria-controls="exampleBooker" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Bus No: activate to sort column descending" style="width: 86px;">
                                                <div class="DataTables_sort_wrapper">Bus No<span class="DataTables_sort_icon css_right ui-icon ui-icon-triangle-1-n"></span></div>
                                            </th>
                                            <th class="ui-state-default" role="columnheader" tabindex="0" aria-controls="exampleBooker" rowspan="1" colspan="1" aria-label="No. of Seat: activate to sort column ascending" style="width: 116px;">
                                                <div class="DataTables_sort_wrapper">No. of Seat<span class="DataTables_sort_icon css_right ui-icon ui-icon-carat-2-n-s"></span></div>
                                            </th>
                                            <th class="ui-state-default" role="columnheader" tabindex="0" aria-controls="exampleBooker" rowspan="1" colspan="1" aria-label="Route No: activate to sort column ascending" style="width: 104px;">
                                                <div class="DataTables_sort_wrapper">Route No<span class="DataTables_sort_icon css_right ui-icon ui-icon-carat-2-n-s"></span></div>
                                            </th>
                                            <th class="ui-state-default" role="columnheader" tabindex="0" aria-controls="exampleBooker" rowspan="1" colspan="1" aria-label="Dep. Time: activate to sort column ascending" style="width: 111px;">
                                                <div class="DataTables_sort_wrapper">Dep. Time<span class="DataTables_sort_icon css_right ui-icon ui-icon-carat-2-n-s"></span></div>
                                            </th>
                                            <th class="ui-state-default" role="columnheader" tabindex="0" aria-controls="exampleBooker" rowspan="1" colspan="1" aria-label="Arr. Time: activate to sort column ascending" style="width: 108px;">
                                                <div class="DataTables_sort_wrapper">Arr. Time<span class="DataTables_sort_icon css_right ui-icon ui-icon-carat-2-n-s"></span></div>
                                            </th>
                                            <th class="ui-state-default" role="columnheader" tabindex="0" aria-controls="exampleBooker" rowspan="1" colspan="1" aria-label="Entry Point: activate to sort column ascending" style="width: 130px;">
                                                <div class="DataTables_sort_wrapper">Entry Point<span class="DataTables_sort_icon css_right ui-icon ui-icon-carat-2-n-s"></span></div>
                                            </th>
                                            <th class="ui-state-default" role="columnheader" tabindex="0" aria-controls="exampleBooker" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 69px;">
                                                <div class="DataTables_sort_wrapper">Price<span class="DataTables_sort_icon css_right ui-icon ui-icon-carat-2-n-s"></span></div>
                                            </th>
                                            <th class="ui-state-default" role="columnheader" tabindex="0" aria-controls="exampleBooker" rowspan="1" colspan="1" aria-label=": activate to sort column ascending" style="width: 99px;">
                                                <div class="DataTables_sort_wrapper"><span class="DataTables_sort_icon css_right ui-icon ui-icon-carat-2-n-s"></span></div>
                                            </th>
                                        </tr>
                                    </thead>


                                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                                        <tr class="busData odd">
                                            <td class="  sorting_1">NB6079</td>
                                            <td class=" ">49</td>
                                            <td class=" ">57</td>
                                            <td class=" ">20:00:00</td>
                                            <td class=" ">03:45:00</td>
                                            <td class=" "><select><option>Entry Point</option><option>Anuradhapu</option><option>Colombo</option><option>Kurunagala</option></select></td>
                                            <td class=" ">1300</td>
                                            <td class=" "><input type="submit" name="bookNow" value="Book Now"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="fg-toolbar ui-toolbar ui-widget-header ui-corner-bl ui-corner-br ui-helper-clearfix"></div>
                            </div>
                        </div>
                        <div class="spacer"></div>
                    </div>
                </form>
            </div>

        </div>
        <!--#contentwrapper-->
        <div class="clear"></div>
        <div id="footer">
            Copyright © 2018.<br> All Rights Reserved.
        </div>
    </div>
</body>

</html>
