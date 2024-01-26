<?php
//require_once 'yourbookings.php';
session_start();
include 'partials/_dbconnect.php';


$refid = $_GET['reciept'];
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}

if ($_SESSION['username'] == 'admin') {
    header("location: login.php");
    exit;
}
?>

<html>

<head>
    <style>
        body {
            font-family: sans-serif;
            font-size: 10pt;
        }

        p {
            margin: 0pt;
        }

        table.items {
            border: 0.1mm solid #e7e7e7;
        }

        td {
            vertical-align: top;
        }

        .items td {
            border-left: 0.1mm solid #e7e7e7;
            border-right: 0.1mm solid #e7e7e7;
        }

        table thead td {
            text-align: center;
            border: 0.1mm solid #e7e7e7;
        }

        .items td.blanktotal {
            background-color: #EEEEEE;
            border: 0.1mm solid #e7e7e7;
            background-color: #FFFFFF;
            border: 0mm none #e7e7e7;
            border-top: 0.1mm solid #e7e7e7;
            border-right: 0.1mm solid #e7e7e7;
        }

        .items td.totals {
            text-align: right;
            border: 0.1mm solid #e7e7e7;
        }

        .items td.cost {
            text-align: "." center;
        }

        span {
            content: "\20B9";
        }

        #print {
            align-items: center;
            margin-left: 650px;
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <table width="100%" style="font-family: sans-serif;" cellpadding="10">
        <tr><br><br>
            <td width="100%" style="text-align: center; font-size: 20px; font-weight: bold; padding: 0px;">
                Booking Invoice
            </td>
        </tr>
        <tr>
            <td height="10" style="font-size: 0px; line-height: 10px; height: 10px; padding: 0px;">&nbsp;</td>
        </tr>
    </table>
    <table width="90%" align="right" style="font-family: sans-serif;" cellpadding="10">
        <tr>
            <td width="49%" border-collapse: collapse; align="right" ;"><strong>Bike Showroom</strong><br>Hubtown Sunmist Solaris,<br>Andheri East, Mumbai<br>India<br>400053<br><br><strong>Telephone:</strong> +91 123 456 6789<br><a href="#" target="_blank" style="color: #000; text-decoration: none;">bikeshowroom.com</a><br></td>

        </tr>
    </table>
    <br>
    <table width="100%" style="font-family: sans-serif; font-size: 14px;">
        <tr>
            <td>

                <table width="40%" align="right" style="font-family: sans-serif; font-size: 14px;">
                    <tr>
                        <td style="border: 1px #eee solid; padding: 0px 8px; line-height: 20px;"><strong>Booking ID : </strong>

                            <?php
                            $username = $_SESSION['username'];
                            $bookingid = $_GET['reciept'];
                            $sql = "SELECT * FROM `bookings` WHERE `booking_id`='$bookingid'";
                            $result = mysqli_query($conn, $sql);
                            while ($fet = mysqli_fetch_assoc($result)) {
                                echo  $fet['booking_id'];
                            }
                            // $generate = false;
                            // if (isset($_GET['generate'])) {
                            //     $bookingid = $_GET['reciept'];
                            //     $uname =  $_SESSION['username'];
                            //     $sql = "SELECT * FROM `bookings` WHERE `booking_id`='$bookingid'";
                            //     $result = mysqli_query($conn, $sql);
                            //     if ($result) {
                            //         $generate = true;
                            //         echo  $fet['booking_id'];
                            //     }
                            // }
                            ?>

                        </td>
                    </tr>
                    <tr>
                        <td style="border: 1px #eee solid; padding: 0px 8px; line-height: 20px;"><strong>Customer Name : </strong>

                            <?php
                            $username = $_SESSION['username'];
                            $bookingid = $_GET['reciept'];
                            $sql = "SELECT * FROM `bookings` WHERE `booking_id`='$bookingid'";
                            $result = mysqli_query($conn, $sql);
                            while ($fet = mysqli_fetch_assoc($result)) {
                                echo  $fet['c_username'];
                            }
                            ?>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <br>
    <table class="items" width="90%" align="right" style="font-size: 14px; border-collapse: collapse;" cellpadding="8">
        <thead>
            <tr>
                <td width="15%" style="text-align: left;"><strong>Bike No.</strong></td>
                <td width="22.52%" style="text-align: left;"><strong>Bike Name</strong></td>
                <td width="30%" style="text-align: left;"><strong>Amount</strong></td>
            </tr>
        </thead>
        <tbody>
            <!-- ITEMS HERE -->
            <tr>
                <td style="padding: 0px 7px; line-height: 20px;">

                    <?php
                    $username = $_SESSION['username'];
                    $bookingid = $_GET['reciept'];
                    $sql = "SELECT * FROM `bookings` WHERE `booking_id`='$bookingid'";
                    $result = mysqli_query($conn, $sql);
                    while ($fet = mysqli_fetch_assoc($result)) {
                        echo  $fet['bike_no'];
                    }
                    ?>

                </td>

                <td style="padding: 0px 7px; line-height: 20px;">

                    <?php
                    $username = $_SESSION['username'];
                    $bookingid = $_GET['reciept'];
                    $sql = "SELECT * FROM `bookings` WHERE `booking_id`='$bookingid'";
                    $result = mysqli_query($conn, $sql);
                    while ($fet = mysqli_fetch_assoc($result)) {
                        echo  $fet['bike_name'];
                    }
                    ?>

                </td>
                <td style="padding: 0px 7px; line-height: 20px;"><span>&#8377;</span> 1,00,000 </td>
            </tr>
        </tbody>
    </table>
    <br>
    <table width="100%" style="font-family: sans-serif; font-size: 14px;">
        <tr>
            <td>
                <table width="60%" align="left" style="font-family: sans-serif; font-size: 14px;">
                    <tr>
                        <td style="padding: 0px; line-height: 20px;">&nbsp;</td>
                    </tr>
                </table>
                <br>
                <table width="40%" align="right" style="font-family: sans-serif; font-size: 14px;">
                    <tr>
                        <td style="border: 1px #eee solid; padding: 0px 8px; line-height: 20px;"><strong>Total Amount</strong></td>
                        <td style="border: 1px #eee solid; padding: 0px 8px; line-height: 20px;"><span>&#8377;</span> 1,00,000</td>
                    </tr>
                    <tr>
                        <td style="border: 1px #eee solid; padding: 0px 8px; line-height: 20px;"><strong>Remaining Balance</strong></td>
                        <td style="border: 1px #eee solid; padding: 0px 8px; line-height: 20px;"><span>&#8377;</span> 0 </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <br>
    <table width="100%" style="font-family: sans-serif; font-size: 14px;">
        <br>
        <tr>
            <td>
                <table width="50%" align="center" style="font-family: sans-serif; font-size: 13px; text-align: center;">
                    <tr>
                        <td style="padding: 0px; line-height: 20px;">
                            <strong>BIKE SHOWROOM</strong>
                            <br>
                            Hubtown Sunmist Solaris, Andheri East, Mumbai,India,400053
                            <br>
                            Tel: +91 123 456 6789 | Email: bikeshowroom.com
                            <br>
                            India. Company Reg. 125343552.
                            <br>
                            VAT Registration No. 021021021 | ATOL No. 1234
                        </td>
                    </tr>
                </table>

            </td>
        </tr>
        <br>
    </table>

    &nbsp;&nbsp;&nbsp;<button id="print" onclick="window.print()">Print</button>

</body>

</html>