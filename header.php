<?php if (! defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap Core CSS -->
    <link href='<?php echo base_url() ."Admin/bower_components/bootstrap/dist/css/bootstrap.min.css" ?>' rel="stylesheet">
    

    <!-- MetisMenu CSS -->
    <link href='<?php echo base_url() ."Admin/bower_components/metisMenu/dist/metisMenu.min.css" ?>' rel="stylesheet">

    <!-- Custom CSS -->
    <link href='<?php echo base_url() ."Admin/dist/css/timeline.css" ?>' rel="stylesheet">

    <link href='<?php echo base_url() ."Admin/dist/css/sb-admin-2.css" ?>' rel="stylesheet">

    <link href='<?php //echo base_url() ."Admin/dist/css/rate.css" ?>' rel="stylesheet">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

    <!-- Custom Fonts -->
    <link href='<?php echo base_url() ."Admin/bower_components/font-awesome/css/font-awesome.min.css" ?>' rel="stylesheet" type="text/css">

    <link href='<?php echo base_url() ."Admin/src/rateit.css" ?>' rel="stylesheet" type="text/css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <title>Admin Page</title>
    <script>
    function doconfirm(){
        job=confirm("Are you sure to delete permanently?");
        if(job!=true){
            return false;
        }
    }
    </script>
</head>
<body>