<?php require_once("includes/initialize.php"); ?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title></title>

    <link rel="stylesheet" href="style.css" />
    <script src="script.js"></script>
    <script src="bootbox.min.js"></script>

</head>
<body>

<div data-role="page" id="page1">
    <div data-theme="a" data-role="header">
        <h1>
            Where's My BB
        </h1>
    </div>
    <div data-role="content">
        <div data-role="fieldcontain">
            <label for="code">
                Secret Trigger Code
            </label>
            <input name="" id="code" placeholder="" value="" type="password" data-mini="true">
        </div>
        <div data-role="fieldcontain">
            <label for="email">
                Lost Phone's Email
            </label>
            <input name="" id="email" placeholder="ex: nemoryoliver@gmail.com" value=""
            type="email" data-mini="true">
        </div>
        <div data-role="collapsible-set">
            <div data-role="collapsible">
                <h3>
                    Advanced Options
                </h3>
                <div data-role="fieldcontain">
                    <label for="displayMessage">
                        Message To Display
                    </label>
                    <textarea name="" id="displayMessage" placeholder="ex: Please leave the phone"
                    data-mini="true"></textarea>
                </div>
                <div id="checkboxes2" data-role="fieldcontain">
                    <fieldset data-role="controlgroup" data-type="vertical" data-mini="true">
                        <legend>
                            Receive
                        </legend>
                        <input id="getLocationInfo" name="" type="checkbox">
                        <label for="getLocationInfo">
                            Lost Phone's Location
                        </label>
                    </fieldset>
                </div>
                <div id="checkboxes2" data-role="fieldcontain">
                    <fieldset data-role="controlgroup" data-type="vertical" data-mini="true">
                        <legend>
                            Receive
                        </legend>
                        <input id="getBatteryInfo" name="" type="checkbox">
                        <label for="getBatteryInfo">
                            Lost Phone's Battery Info
                        </label>
                    </fieldset>
                </div>
                <div id="checkboxes2" data-role="fieldcontain">
                    <fieldset data-role="controlgroup" data-type="vertical" data-mini="true">
                        <legend>
                            Receive
                        </legend>
                        <input id="getSDCardInfo" name="" type="checkbox">
                        <label for="getSDCardInfo">
                            Lost Phone's SD Card Info
                        </label>
                    </fieldset>
                </div>
                <div id="checkboxes2" data-role="fieldcontain">
                    <fieldset data-role="controlgroup" data-type="vertical" data-mini="true">
                        <legend>
                            Receive
                        </legend>
                        <input id="getSimInfo" name="" type="checkbox">
                        <label for="getSimInfo">
                            Lost Phone's Sim Card Info
                        </label>
                    </fieldset>
                </div>
                <div data-role="fieldcontain">
                    <label for="replyNumber">
                        Reply To Phone Number
                    </label>
                    <input name="" id="replyNumber" placeholder="ex: 09467595887" value=""
                    type="tel" data-mini="true">
                </div>
                <div data-role="fieldcontain">
                    <label for="replyEmail">
                        Reply To Email
                    </label>
                    <input name="" id="replyEmail" placeholder="ex: nemoryoliver@gmail.com"
                    value="" type="email" data-mini="true">
                </div>
            </div>
        </div>
        <a data-role="button" data-theme="b" id="btnSend">
            Send
        </a>
    </div>
    <div data-theme="a" data-role="footer" data-position="fixed">
        <h3>
            By: Nemory Development Studios
        </h3>
    </div>
</div>

<script>

    $("#btnSend").click(function()
    {
        var thecode                 = $("#code").val();
        var theemail                = $("#email").val();
        var thedisplayMessage       = $("#displayMessage").val();
        var thegetLocationInfo      = $("#getLocationInfo").is(":checked");
        var thegetBatteryInfo       = $("#getBatteryInfo").is(":checked");
        var thegetSDCardInfo        = $("#getSDCardInfo").is(":checked");
        var thegetSimInfo           = $("#getSimInfo").is(":checked");
        var thereplyNumber          = $("#replyNumber").val();
        var thereplyEmail           = $("#replyEmail").val();

        var errorMessage = "";

        if(thecode.length == 0)
        {
            errorMessage += "*Secret Code is required\n\n";
        }

        if(theemail.length == 0)
        {
            errorMessage += "*Email Recipient is required\n\n";
        }

        if(errorMessage.length == 0)
        {
            $("#btnSend").text("Sending...");
            $("#btnSend").attr("disabled", "disabled");

            $.post( "send.php", 
                { 
                    code:thecode, 
                    email:theemail, 
                    displayMessage:thedisplayMessage, 
                    getLocationInfo:thegetLocationInfo, 
                    getBatteryInfo:thegetBatteryInfo, 
                    getSDCardInfo:thegetSDCardInfo, 
                    getSimInfo:thegetSimInfo, 
                    replyNumber:thereplyNumber, 
                    replyEmail:thereplyEmail 

                }).done(function( result ) 
            {
                alert(result);

                $("#btnSend").text("Send");
                $("#btnSend").attr("disabled", "enabled");
            });
        }
        else
        {
            alert(errorMessage);
        }

        return false;
    });

    //bootbox.alert("ddddd");

</script>

</body>
</html>
