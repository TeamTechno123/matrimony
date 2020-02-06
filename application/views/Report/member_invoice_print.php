<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Tax Invoice</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="<?php echo base_url('files/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('files/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('files/bower_components/Ionicons/css/ionicons.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('files/dist/css/AdminLTE.min.css'); ?>">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body >
<div class="wrapper">
  <!-- Main content -->
  <div class="row">
    <p style="text-align:center; font-size:17px; margin-top: 3px; margin-bottom: 5px;text-transform: uppercase;"> <b>Tax Invoice</b>  </p>
  </div>
  <table class="table table-bordered mb-0 invoice-table" Width="100%">
    <style media="print">
    table{
      border-collapse: collapse;
    }
    table, td, th{
    border :1px solid #000;
    padding-left: 10px;
    }

      .invoice-table tr, td, th{
          border: 1px solid #000!important;
      }
      .invoice-table{
        margin-bottom:0px!important;
        border: 1px solid #000!important;
        padding-bottom:0px!important;
      }
      .invoice-table p{
        line-height: 15px;
      }
      .pull-right{
        float: right!important;
      }
      hr{
          border-top: 1px solid #000!important;
      }
      p{
        margin-top: 3px;
        margin-bottom: 5px;
      }
    </style>
    <style media="screen">
    table{
      border-collapse: collapse;
    }

      .invoice-table tr, td, th{
          border: 1px solid #000!important;
            padding-left: 10px;
      }
      .invoice-table{
        margin-bottom:0px!important;
        border: 1px solid #000!important;
        padding-bottom:0px!important;
      }
      .invoice-table p{
        line-height: 15px;
      }
      .pull-right{
        float: right!important;
      }
      hr{
          border-top: 1px solid #000!important;
      }
      p{
        margin-top: 3px;
        margin-bottom: 5px;
      }
    </style>
    <?php foreach ($member_invoice_info as $invoice_info) {
      // code...
    } ?>
    <tr >

      <!-- <td   colspan="6" >
        <?php if($comp_id == 1){ ?>
          <img style="padding-top:12px;" src="<?php echo base_url() ?>assets/images/LLP.jpg" alt="" width="100%">
        <?php } else{ ?>
          <img style="padding-top:12px;" src="<?php echo base_url() ?>assets/images/lp.jpg" alt="" width="100%">
        <?php } ?>
      </td> -->

      <!-- <td   colspan="6" >

    <div class="" style="text-align:center;">
    <h3 style="font-family: 'Arial Black', 'Arial Bold', Gadget, sans-serif; font-size:28px; font-weight:bold; text-transform:uppercase; margin-top:5px; margin-bottom:3px;" > <?php echo $company_name; ?></h3>
    <p style="margin-bottom:5px; line-height:20px; font-family: Calibri, Candara, Segoe, 'Segoe UI'; font-size: 16px; margin-top:5px;" > <b> <?php echo $company_address; ?></p>
    <p  style="margin-bottom:5px; font-family: Calibri, Candara, Segoe, 'Segoe UI'; font-size: 16px;">Mobile No: <?php echo $company_mob1; ?> &nbsp; | &nbsp; Email : <?php echo $company_email; ?></p>
    <p  style="margin-bottom:5px; font-family: Calibri, Candara, Segoe, 'Segoe UI'; font-size: 16px;"> GST No: <?php echo $company_gst_no; ?> &nbsp; | &nbsp; Website : <?php echo $company_website; ?> </p>

    </div>
      </td> -->
    </tr>
    <tr >
      <td colspan="6" style="padding:10px;">
        <p style=" text-align: center; font-family: 'Arial Black', 'Arial Bold', Gadget, sans-serif; font-size:17px; font-weight:bold; text-transform:uppercase; margin-top:5px; margin-bottom:3px;" > <?php echo $company_name; ?></p>
        <p style="text-align: center; margin-bottom:5px; line-height:20px; font-family: Calibri, Candara, Segoe, 'Segoe UI'; font-size: 16px; margin-top:5px;" ><b>Address </b>: <b> <?php echo $company_address; ?></p>
        <!-- <p  style="margin-bottom:5px; font-family: Calibri, Candara, Segoe, 'Segoe UI'; font-size: 16px;">Mobile No: <?php echo $company_mob1; ?> &nbsp; | &nbsp; Email : <?php echo $company_email; ?></p> -->
        <p  style="text-align: center; margin-bottom:5px; font-family: Calibri, Candara, Segoe, 'Segoe UI'; font-size: 16px;"> GST No: <?php echo $company_gst_no; ?> </p>
      </td>
    </tr>
    <tr>
      <td colspan="4" Width="60%" style="padding-top:10px;padding-bottom:10px;">


        <p style="text-align:center;"> <b> Billing details</b></p>
          <hr style="margin-left:-10px;">
        <p> <b>Name : <?php echo $invoice_info->member_name; ?></b>  </p>
        <p> <b>Mobile : <?php echo $invoice_info->member_mobile; ?></b>  </p>
        <p> <b>Address</b> : <?php echo  $invoice_info->member_address; ?></p>
        <!-- <p> <b>GSTIN</b> : <?php echo $party_gst_no; ?> </p> -->
      </td>
      <td colspan="2" Width="40%" valign="top">
        <p style="padding-top:8px;"> <b>Invoice No</b> : <?php echo $invoice_info->member_payment_id; ?></p>
        <p style="padding-top:8px;"> <b>Date </b> : <?php echo $invoice_info->member_payment_date;; ?></p>
      </td>
    </tr>

  </table>

  <table class="table table-bordered invoice-tbl-2"  width="100%">
    <style media="print">
    /* @media print {
        table{
          margin: 0px;
        }
     } */
      .invoice-tbl-2{
      margin-top:0px;
      padding-top:0px;
      border-top:0px;
      border: 1px solid #000!important;
      border-top: 0px!important;
      margin-top: 0px!important;
      padding-top: 0px!important;
      vertical-align: top;
      }
      hr{
          border-top: 1px solid #000!important;
      }
        .invoice-tbl-2 tr, th, td{
          border: 1px solid #000!important;
          border-top: 0px!important;
        }
        .pull-right{
          float: right!important;
        }
    </style>
    <style media="screen">
    /* @media print {
        table{
          margin: 0px;
        }
     } */
      .invoice-tbl-2{
      margin-top:0px;
      padding-top:0px;
      border-top:0px;
      border: 1px solid #000!important;
      border-top: 0px!important;
      margin-top: 0px!important;
      padding-top: 0px!important;
      vertical-align: top;
      }
      hr{
          border-top: 1px solid #000!important;
      }
        .invoice-tbl-2 tr, th, td{
          border: 1px solid #000!important;
          border-top: 0px!important;
        }
        .pull-right{
          float: right!important;
        }
    </style>
    <tr  style="padding:10px;">
      <th style="padding:10px; width: 10px; text-align:center;">Sr.No.</th>
      <th style="padding:10px; text-align:center;"> DESCRIPTION</th>
      <th style="padding:10px; text-align:center;">HSN/SAC</th>
      <th style="padding:10px; text-align:center;" width="12%">GST %</th>
      <th style="padding:10px; text-align:center;" Width="9%" >QTY </th>
      <th style="padding:10px; text-align:center;" >RATE</th>
      <th style="padding:10px; text-align:center;" >AMOUNT</th>
    </tr>

    <tr  style="padding:10px; padding:10px;">
      <td style="padding:10px; text-align:center;">1</td>
      <td style="padding:10px; text-align:center;">Membership</td>
      <td style="padding:10px; text-align:center;" > </td>
      <td style="padding:10px; text-align:center;" > 18%</td>
      <td style="padding:10px; text-align:center;">1</td>
      <td style="padding:10px; text-align:center;"><?php echo $invoice_info->member_payment_amt - 270; ?></td>
      <td style="padding:10px; text-align:center;"><?php echo $invoice_info->member_payment_amt - 270; ?></td>
    </tr>
  <!-- <?php
  $k=5-$i;
  for ($j=0; $j < $k ; $j++) { ?>
    <tr>
      <td style="text-align:center; height:15px;"></td>
      <td style="text-align:center;"></td>
      <td style="text-align:center;" ></td>
      <td style="text-align:center;" ></td>
      <td style="text-align:center;"></td>
      <td style="text-align:center;"></td>
      <td style="text-align:center;"></td>
    </tr>
  <?php } ?> -->
    <tr>
      <td colspan="4" rowspan="" valign="top">
        <p style="margin-top:10px;"><b>GST Amount : <?php echo $this->numbertowords->convert_number(270); ?> Only</b> </p><hr style="margin-left:-10px;">
        <p><b>Net Amount : <?php echo $this->numbertowords->convert_number($invoice_info->member_payment_amt); ?> Only</b> </p>

      </td>
      <td colspan="2" Width="25%" valign="top">
        <p><b>Basic Amount</b> : </p> <hr style="margin-left:-10px;">

        <?php if($invoice_info->state_name = 'Maharashtra'){ ?>
          <p><b>CGST Amount</b> : </p> <hr style="margin-left:-10px;">
          <p><b>SGST Amount</b> : </p> <hr style="margin-left:-10px;">
        <?php } else{ ?>
          <p><b>IGST Amount</b> : </p> <hr style="margin-left:-10px;">
        <?php } ?>

        <p><b>Grand Total</b> :  </p>
      </td>
      <td colspan="1" Width="15%" valign="top">
        <p style="text-align:right; padding-right:15px;"><?php echo number_format($invoice_info->member_payment_amt - 270,2); ?> </p> <hr style="margin-left:-10px;">

        <?php if($company_statecode == $invoice_info->state_code){ ?>
          <p style="text-align:right; padding-right:15px;"><?php echo number_format(270/2,2); ?> </p> <hr style="margin-left:-10px;">
          <p style="text-align:right; padding-right:15px;"><?php echo number_format(270/2,2); ?> </p> <hr style="margin-left:-10px;">
        <?php } else{ ?>
          <p style="text-align:right; padding-right:15px;"><?php echo number_format(270,2); ?> </p> <hr style="margin-left:-10px;">
        <?php } ?>
        <p style="text-align:right; padding-right:15px;"> <?php echo round($invoice_info->member_payment_amt); ?> </p>
      </td>

    </tr>
    <!-- <tr>
      <td colspan="5">
          <p> <b>Bank Name</b> : &nbsp; <?php echo $branch_bank; ?></p>
          <p> <b>Account No</b> :  &nbsp; <?php echo $branch_acc_no; ?> </p>
          <p> <b>IFSC Code </b>&nbsp; : &nbsp; <?php echo $branch_ifsc; ?> </p>
          <p> <b>Declaration </b> : We declare that the invoice shows the actual price of the goods described and that all particulars are true and correct. </p>
      </td>
      <td colspan="2">
        <img src="<?php echo base_url() ?>assets/images/<?php echo $company_seal; ?>" alt="">
      </td>
    </tr> -->
  </table>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<script src="<?php echo base_url('files/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
<script type="text/javascript">
  window.print();
</script>
</body>
</html>
