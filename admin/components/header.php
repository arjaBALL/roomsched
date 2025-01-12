<html>

<head>
        <title>Room Assignment System</title>
        <link href="img/logo.png" rel="icon" type="image">
        <script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
        <link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="screen">
        <link href="css/style.css" rel="stylesheet" type="text/css" media="screen">
        <!-- bootstrap -->


        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/bootstrap-transition.js"></script>
        <script type="text/javascript" src="js/bootstrap-typeahead.js"></script>
        <script type="text/javascript" src="js/application.js"></script>

        <script type="text/javascript" src="js/bootstrap-tooltip.js"></script>
        <script type="text/javascript" src="js/bootstrap-popover.js"></script>
        <!-- notify -->
        <link href="css/notify/jquery_notification.css" type="text/css" rel="stylesheet" media="screen, projection" />
        <script type="text/javascript" src="js/notify/jquery_notification_v.1.js"></script>
        <!-- notify end -->



        <script type="text/javascript" src="scripts/swfobject/swfobject.js"></script>

        <script type="text/javascript">
                var flashvars = {};
                flashvars.cssSource = "piecemaker.css";
                flashvars.xmlSource = "piecemaker.xml";

                var params = {};
                params.play = "true";
                params.menu = "false";
                params.scale = "showall";
                params.wmode = "transparent";
                params.allowfullscreen = "true";
                params.allowscriptaccess = "always";
                params.allownetworking = "all";

                swfobject.embedSWF('piecemaker.swf', 'piecemaker', '1000', '434', '10', null, flashvars,
                        params, null);

        </script>



        <script language="JavaScript" type="text/javascript" src="js/jTPS.js"></script>
        <link rel="stylesheet" type="text/css" href="css/jTPS.css">

        <style type="text/css" title="currentStyle">
                @import "css/datatable/demo_page.css";
                @import "css/datatable/demo_table_jui.css";
                @import "css/datatable/jquery-ui-1.8.4.custom.css";
        </style>

        <script type="text/javascript" language="javascript" src="js/dataTables/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf-8">
                jQuery(document).ready(function () {
                        oTable = jQuery('#log').dataTable({
                                "bJQueryUI": true,
                                "sPaginationType": "full_numbers"
                        });
                        oTable = jQuery('#attendance').dataTable({
                                "bJQueryUI": true,
                                "sPaginationType": "full_numbers"
                        });
                        oTable = jQuery('#record').dataTable({
                                "bJQueryUI": true,
                                "sPaginationType": "full_numbers"
                        });
                        oTable = jQuery('#cadet_list').dataTable({
                                "bJQueryUI": true,
                                "sPaginationType": "full_numbers"
                        });
                        oTable = jQuery('#passed').dataTable({
                                "bJQueryUI": true,
                                "sPaginationType": "full_numbers"
                        });


                });		
        </script>



        <script>

                $(document).ready(function () {

                        $('#demoTable').jTPS({
                                perPages: [10, 30, 45, 60, 'ALL'], scrollStep: 1, scrollDelay: 30,
                                clickCallback: function () {
                                        // target table selector
                                        var table = '#demoTable';
                                        // store pagination + sort in cookie
                                        document.cookie = 'jTPS=sortasc:' + $(table + ' .sortableHeader').index($(table + ' .sortAsc')) + ',' +
                                                'sortdesc:' + $(table + ' .sortableHeader').index($(table + ' .sortDesc')) + ',' +
                                                'page:' + $(table + ' .pageSelector').index($(table + ' .hilightPageSelector')) + ';';
                                }
                        });

                        // reinstate sort and pagination if cookie exists
                        var cookies = document.cookie.split(';');
                        for (var ci = 0, cie = cookies.length; ci < cie; ci++) {
                                var cookie = cookies[ci].split('=');
                                if (cookie[0] == 'jTPS') {
                                        var commands = cookie[1].split(',');
                                        for (var cm = 0, cme = commands.length; cm < cme; cm++) {
                                                var command = commands[cm].split(':');
                                                if (command[0] == 'sortasc' && parseInt(command[1]) >= 0) {
                                                        $('#demoTable .sortableHeader:eq(' + parseInt(command[1]) + ')').click();
                                                } else if (command[0] == 'sortdesc' && parseInt(command[1]) >= 0) {
                                                        $('#demoTable .sortableHeader:eq(' + parseInt(command[1]) + ')').click().click();
                                                } else if (command[0] == 'page' && parseInt(command[1]) >= 0) {
                                                        $('#demoTable .pageSelector:eq(' + parseInt(command[1]) + ')').click();
                                                }
                                        }
                                }
                        }
                        // bind mouseover for each tbody row and change cell (td) hover style
                        $('#demoTable tbody tr:not(.stubCell)').bind('mouseover mouseout',
                                function (e) {
                                        // hilight the row
                                        e.type == 'mouseover' ? $(this).children('td').addClass('hilightRow') : $(this).children('td').removeClass('hilightRow');
                                }
                        );
                });
        </script>
</head>