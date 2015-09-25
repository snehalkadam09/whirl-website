<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="cache-control" content="no-cache" />
        <meta http-equiv="expires" content="0" />
        <meta http-equiv="pragma" content="no-cache" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MDD</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="css/custom.css"/>
        <script src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/custom.js"></script>
        <style>
            .error{
                color:#F73B07;
            }
        </style>
    </head>

    <body>
        <div class="container-fluid topSection">
            <div class="container">
                <div class="col-md-12 colsm-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-5 col-sm-5 col-xs-12 topSectionImg">
                            <img src="images/homeTopMobile.png"/>
                        </div>
                        <div class="col-md-7 col-sm-7 col-xs-12 topSectionRight">
                            <h1 class="text-uppercase">Whirl</h1>
                            <span>on-demand parking and valet</span>
                            <p>
                                We are revolutionizing parking with a smartphone app that provides on-demand parking and valet services.
                            </p>
                            <a href="#"><img src="images/appstoreBtn.png"/></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid howItWorks">
            <div class="container">
                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                    <h1 class="text-uppercase">How it works</h1>
                    <p>
                        Whirl is a booking platform for on-demand parking and valet services. Our end-to-end solution links consumers, valets, and garages on one platform.
                    </p>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 howItWorksInner">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                            <img src="images/signUpMobile.png"/>
                            <p>
                                Signing up is easy!
                            </p>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                            <img src="images/mapMobile.png"/>
                            <p>
                                Make parking easier. Tell us where and when you need to park, and a Whirl valet will meet you there.
                            </p>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                            <img src="images/safeMapMobile.png"/>
                            <p>
                                Your car is in good hands.We'll park your car in a secure lot and bring it back to you at your convenience.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                    <span class="text-uppercase">
                        WHIRL IS AVAILABLE IN BETA; SERVICING LIMITED MARKETS
                    </span>
                </div>
            </div>
        </div>
        <div class="container-fluid contactUs">
            <div class="container">
                <h1 class="text-uppercase text-center">Contact us</h1>
                <form id="form">
                    <p id="returnmessage"></p>
                    <div id="validation_error_login" class="error" style="display:none"> </div>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="name" name="name" placeholder="Name*" onclick="remove_error_class('name')">
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="email" name="email" placeholder="Email Address*" onclick="remove_error_class('email');">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="subject" name="subject" placeholder="Subject*" onclick="remove_error_class('subject')">
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="tel" maxlength="12" autocomplete="off" name="phone" id="phone" placeholder="Cell Phone*" onclick="remove_error_class('phone')">
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="zip" id="zip" maxlength="5" placeholder="Zip Code*" onclick="remove_error_class('zip')">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <textarea placeholder="Message*" id="message" name="message" onclick="remove_error_class('message')"></textarea>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                        <button type="button" onclick="send_contact()">Submit</button>
                    </div>
                </form>
                <script type="text/javascript">
                    $(function () {
                        $('#phone').keyup(function ()
                        {
                            this.value = this.value.replace(/(\d{3})\-?(\d{3})\-?(\d{4})/, '$1-$2-$3');

                        });

                        $("#name").focusout(function () {
                            if (this.value == '') {
                                add_error_class('name', 'Please enter name');
                            }
                        });

                        $("#email").focusout(function () {
                            if (this.value == '') {
                                add_error_class('email', 'Please enter email address');
                            }

                        });

                        $("#subject").focusout(function () {
                            if (this.value == '') {
                                add_error_class('subject', 'Please enter subject');
                            }
                        });

                        $("#phone").focusout(function () {
                            if (this.value == '') {
                                add_error_class('phone', 'Please enter phone number');
                            }
                        });

                        $("#zip").focusout(function () {
                            if (this.value == '') {
                                add_error_class('zip', 'Please enter zip code');
                            }
                        });

                        $("#message").focusout(function () {
                            if (this.value == '') {
                                add_error_class('message', 'Please enter message');
                            }
                        });

                    });

                </script>
                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                    <address>
                        Whirl
                        <br>
                        69 Charlton Street  |  New York  |  NY 10014
                        <br>
                        O: 917.834.3847
                    </address>
                </div>
            </div>
        </div>
        <div class="container-fluid footer">
            <div class="container">
                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                    Whirl is a division and trademark of MDD Valet, LLC &copy; 2015 MDD Valet, LLC a Delaware Limited Liability Company.
                </div>
            </div>
        </div>
    </body>
</html>
