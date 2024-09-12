<?php
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Absen</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="assets/img/icon.ico" type="image/x-icon" />
    
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Open+Sans:300,400,600,700"]
			},
			custom: {
				"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],
				urls: ['assets/css/fonts.css']
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

   

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/azzara.min.css">


</head>

<body>
    <div class="wrapper">

        <!-- header -->
        <?= include "layout/header.php"; ?>
        <!-- sidebar -->
        <?= include "layout/sidebar.php"; ?>


        <!-- content  -->
        <div class="main-panel">
            <div class="content">
                <div style="margin-top:15px">
                    <center>
                        <div id="qr-reader" witdh="600px" height="600px" class="col-lg-6 col-md-6"></div>
                        <div id="qr-reader-results"></div>
                        <form action="insert.php" method="post">
                            <label for="">Scan QRCode</label>
                            <div class="col-lg-2 col-md-2">
                                <input type="text" class="form-control form-control-xs" name="siswa" id="id_siswa" aria-describedby="helpId" readonly>
                            </div>
                        </form>

                    </center>
                </div>

            </div>
            <!-- end content  -->

        </div>
    </div>

    <script>
        function docReady(fn) {
            // see if DOM is already available
            if (document.readyState === "complete" ||
                document.readyState === "interactive") {
                // call on next available tick
                setTimeout(fn, 1);
            } else {
                document.addEventListener("DOMContentLoaded", fn);
            }
        }

        docReady(function() {
            var resultContainer = document.getElementById('qr-reader-results');
            var lastResult, countResults = 0;

            function onScanSuccess(decodedText, decodedResult) {
                if (decodedText !== lastResult) {
                    ++countResults;
                    lastResult = decodedText;
                    // Handle on success condition with the decoded message.
                    document.getElementById("id_siswa").value = decodedText;
                    document.forms[0].submit();
                }
            }



            var html5QrcodeScanner = new Html5QrcodeScanner(
                "qr-reader", {
                    fps: 20,
                    qrbox: 400
                });
            html5QrcodeScanner.render(onScanSuccess);
        });
    </script>
    <!-- script  -->
    <?= include "layout/script.php"; ?>

</body>

</html>