<?php
// require_once '../lb_helper.php'; // Include LicenseBox external/client api helper file/
$api = new LicenseBoxExternalAPI(); // Initialize a new LicenseBoxExternalAPI object
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>EventRight</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style type="text/css">
        body,
        html {
            /* background-image: linear-gradient(to left bottom,#add100,#7b920a); */
            /* background: radial-gradient(circle at 20% 90%, #e39f73 0%, #e37376 5%, #d34f86 30%,#9850ab 60%,#6776a1 90%); */
            /* background: radial-gradient(circle at 30% 107%, #fdc07d 5%, #fd5949 33%,#d6249f 60%,#4b587f 90%); */
            background: #eee;
            height: 100%;
        }

        .title {
            color: #172b4d;
        }

        .box {
            box-shadow: 2px 7px 12px 2px #6f6e714f;
            border: none;
        }

        .button.is-link {
            background-color: #172b4d;
        }

        .button.is-link.is-hovered,
        .button.is-link:hover {
            background-color: #172b4d;
        }

        .tabs li.is-active a {
            border-bottom-color: #172b4d;
            color: #172b4d;
        }

        .Preloader {
            position: absolute;
            width: 150px;
            height: 150px;
            z-index: 15;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        .Preloader img {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 10px;
            height: 150px;
            width: 200px;
            max-width: 200px;
        }

        .locaderoverlay {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 10;
        }

        #main_loader {
            display: none;
        }

        .alert {
            padding: 18px;
            background-color: #f4d369;
            color: black;
        }

        .closebtn:hover {
            color: black;
        }
    </style>
</head>

<body>

    <div id="main_loader">
        <div class="locaderoverlay"></div>
        <div class="Preloader">
            <img src="{{asset('/images/timer.gif')}}" alt="Preloader">
        </div>
    </div>
    <?php
    $errors = false;
    $step = isset($_GET['step']) ? $_GET['step'] : '';
    ?>

    <div class="container">
        <div class="section">
            <div class="column is-6 is-offset-3">
                <center>
                    <h1 class="title" style="padding-top: 20px">EventRight Pro Installation</h1><br>
                </center>
                <div class="box">
                    <?php
switch ($step) {
    default: ?>
                    <div class="tabs is-fullwidth">
                        <ul>
                            <li class="is-active">
                                <a>
                                    <span><b>Requirements</b></span>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <span>Verify</span>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <span>Database</span>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <span>Finish</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <?php
                    // Add or remove your script's requirements below
                    if (phpversion() < '7.1') {
                        $errors = true;
                        echo "<div class='notification is-danger' style='padding:12px;'><i class='fa fa-times'></i> Current PHP version is " . phpversion() . '! minimum PHP 7.2 or higher required.</div>';
                    } else {
                        echo "<div class='notification is-success' style='padding:12px;'><i class='fa fa-check'></i> You are running PHP version " . phpversion() . '</div>';
                    }
                    if (!extension_loaded('mysqli')) {
                        $errors = true;
                        echo "<div class='notification is-danger' style='padding:12px;'><i class='fa fa-times'></i> MySQLi PHP extension missing!</div>";
                    } else {
                        echo "<div class='notification is-success' style='padding:12px;'><i class='fa fa-check'></i> MySQLi PHP extension available</div>";
                    } ?>
                    <div class='notification is-light ' style='padding:12px;'><i class="fa fa-question">&nbsp;</i>Before you
                        proceed ahead, make sure this step is completed 👉
                        <a href="https://docs.saasmonks.in/.env-file-permission/" target="_blank" class=""
                            rel="noopener noreferrer">
                            Click Here. 
                        </a>
                    </div>
                    <div style='text-align: right;'>
                        <?php if ($errors == true) {?>
                        <a href="javascript:void(0)" class="button is-link" disabled>Next</a>
                        <?php } else {?>
                        <a href="{{ url('installer') }}?step=0" class="button is-link">Next</a>
                        @csrf
                        <?php }?>
                    </div><?php
    break;
    case "0": ?>
                    <div class="tabs is-fullwidth">
                        <ul>
                            <li>
                                <a>
                                    <span><i class="fa fa-check-circle"></i> Requirements</span>
                                </a>
                            </li>
                            <li class="is-active">
                                <a>
                                    <span><b>Verify</b></span>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <span>Database</span>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <span>Finish</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <?php
        $license_code = null;
        $client_name = null;
        if (!empty($_POST['license']) && !empty($_POST['client'])) {
            $license_code = strip_tags(trim($_POST["license"]));
            $client_name = strip_tags(trim($_POST["client"]));
            /* Once we have the license code and client's name we can use LicenseBoxExternalAPI's activate_license() function for activating/installing the license, if the third parameter is empty a local license file will be created which can be used for background license checks. */

            $activate_response = $api->activate_license($license_code, $client_name);
            if (empty($activate_response)) {
                $msg = 'Server is unavailable.';
            } else {
                $msg = $activate_response['message'];
            }
            if ($activate_response['status'] != true) {?>
                    <form action="{{ url('installer') }}?step=0" method="POST">
                        @csrf
                        <div class="notification is-danger"><?php echo ucfirst($msg); ?></div>
                        <div class="field">
                            <input type="hidden" name="license_code" id="license_code" value="<?php echo $license_code; ?>">
                            <input type="hidden" name="client_name" id="client_name" value="<?php echo $client_name; ?>">
                            <label class="label">License code</label>
                            <div class="control">
                                <input class="input" type="text" placeholder="enter your purchase/license code"
                                    name="license" required>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">your envato username</label>
                            <div class="control">
                                <input class="input" type="text" placeholder="enter your envato username"
                                    name="client" required>
                            </div>
                        </div>
                        <div style='text-align: right;'>
                            <button type="submit" class="button is-link">Verify</button>
                        </div>
                    </form><?php
                } else {?>
                    <form action="{{ url('installer') }}?step=1" method="POST">
                        @csrf
                        <div class="notification is-success"><?php echo ucfirst($msg); ?></div>
                        <input type="hidden" name="lcscs" id="lcscs" value="<?php echo ucfirst($activate_response['status']); ?>">
                        <input type="hidden" name="license_code" id="license_code" value="<?php echo $license_code; ?>">
                        <input type="hidden" name="client_name" id="client_name" value="<?php echo $client_name; ?>">
                        <div style='text-align: right;'>
                            <button type="submit" class="button is-link">Next</button>
                        </div>
                    </form><?php
                }
                } else {?>
                    <form action="{{ url('installer') }}?step=0" method="POST">
                        @csrf
                        <div class="field">
                            <label class="label">License code</label>
                            <div class="control">
                                <input class="input" type="text" placeholder="enter your purchase/license code"
                                    name="license" required>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Your envato username</label>
                            <div class="control">
                                <input class="input" type="text" placeholder="envato username"
                                    name="client" required>
                            </div>
                        </div>
                        <div style='text-align: right;'>
                            <button type="submit" class="button is-link">Verify</button>
                        </div>
                    </form>
                    <?php }
        break;
    case "1": ?>
                    <div class="tabs is-fullwidth">
                        <ul>
                            <li>
                                <a>
                                    <span><i class="fa fa-check-circle"></i> Requirements</span>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <span><i class="fa fa-check-circle"></i> Verify</span>
                                </a>
                            </li>
                            <li class="is-active">
                                <a>
                                    <span><b>Database</b></span>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <span>Finish</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <?php
        if ($_POST && isset($_POST["lcscs"])) {
            $valid = strip_tags(trim($_POST["lcscs"]));
            $license_code = strip_tags(trim($_POST["license_code"]));
            $client_name = strip_tags(trim($_POST["client_name"]));
            if(isset($_POST["host"])){
                $db_host = strip_tags(trim($_POST["host"]));
                $db_user = strip_tags(trim($_POST["user"]));
                $db_pass = strip_tags(trim($_POST["pass"]));
                $db_name = strip_tags(trim($_POST["name"]));
            }
            // Let's import the sql file into the given database
            if (!empty($db_host)) {
                $con = @mysqli_connect($db_host, $db_user, $db_pass, $db_name);
                if (mysqli_connect_errno()) {?>
                    <form action="{{ url('installer') }}?step=1" method="POST">
                        @csrf
                        <div class='notification is-danger'>Failed to connect to MySQL: <?php echo mysqli_connect_error(); ?></div>
                        <input type="hidden" name="lcscs" id="lcscs" value="<?php echo $valid; ?>">
                        <input type="hidden" name="license_code" id="license_code" value="<?php echo $license_code; ?>">
                        <input type="hidden" name="client_name" id="client_name" value="<?php echo $client_name; ?>">
                        <div class="field">
                            <label class="label">Database Host</label>
                            <div class="control">
                                <input class="input" type="text" id="host"
                                    placeholder="enter your database host" name="host" required>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Database Username</label>
                            <div class="control">
                                <input class="input" type="text" id="user"
                                    placeholder="enter your database username" name="user" required>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Database Password</label>
                            <div class="control">
                                <input class="input" type="text" id="pass"
                                    placeholder="enter your database password" name="pass">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Database Name</label>
                            <div class="control">
                                <input class="input" type="text" id="name"
                                    placeholder="enter your database name" name="name" required>
                            </div>
                        </div>
                        <div style='text-align: right;'>
                            <button type="submit" class="button db-import is-link">Import</button>
                        </div>
                    </form><?php
              exit;
                }
                $templine = '';
                $filename = "../installer/eventright.sql";
                $lines = file($filename);
                foreach ($lines as $line) {
                    if (substr($line, 0, 2) == '--' || $line == '') {
                        continue;
                    }

                    $templine .= $line;
                    $query = false;
                    if (substr(trim($line), -1, 1) == ';') {
                        $query = mysqli_query($con, $templine);
                        $templine = '';
                    }
                }?>
                    <form action="{{ url('installer') }}?step=2" method="POST">
                        @csrf
                        <div class='notification is-success'> Database was successfully imported.</div>
                        <input type="hidden" name="dbscs" id="dbscs" value="true">
                        <input type="hidden" name="db_host" id="db_host" value="<?php echo $db_host; ?>">
                        <input type="hidden" name="db_user" id="db_user" value="<?php echo $db_user; ?>">
                        <input type="hidden" name="db_pass" id="db_pass" value="<?php echo $db_pass; ?>">
                        <input type="hidden" name="db_name" id="db_name" value="<?php echo $db_name; ?>">
                        <input type="hidden" name="license_code" id="license_code" value="<?php echo $license_code; ?>">
                        <input type="hidden" name="client_name" id="client_name" value="<?php echo $client_name; ?>">
                        <div style='text-align: right;'>
                            <button type="submit" id="openLogin" class="button is-link">Next</button>
                        </div>
                    </form>
                    <?php
                    } else {?>

                    <label class="label">It's take some time to import, Please Wait.</label>
                    <form action="{{ url('installer') }}?step=1" method="POST">
                        @csrf
                        <input type="hidden" name="lcscs" id="lcscs" value="<?php echo $valid; ?>">
                        <input type="hidden" name="license_code" id="license_code" value="<?php echo $license_code; ?>">
                        <input type="hidden" name="client_name" id="client_name" value="<?php echo $client_name; ?>">
                        <div class="field">
                            <label class="label">Database Host</label>
                            <div class="control">
                                <input class="input" type="text" id="host"
                                    placeholder="enter your database host" name="host" required>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Database Username</label>
                            <div class="control">
                                <input class="input" type="text" id="user"
                                    placeholder="enter your database username" name="user" required>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Database Password</label>
                            <div class="control">
                                <input class="input" type="text" id="pass"
                                    placeholder="enter your database password" name="pass">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Database Name</label>
                            <div class="control">
                                <input class="input" type="text" id="name"
                                    placeholder="enter your database name" name="name" required>
                            </div>
                        </div>
                        <div style='text-align: right;'>

                            <button type="submit" class="button db-import is-link">Import</button>
                        </div>
                    </form><?php
}
        } else {?>
                    <div class='notification is-danger'>Sorry, something went wrong.</div><?php
}
        break;
    case "2": ?>
                    <div class="tabs is-fullwidth">
                        <ul>
                            <li>
                                <a>
                                    <span><i class="fa fa-check-circle"></i> Requirements</span>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <span><i class="fa fa-check-circle"></i> Verify</span>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <span><i class="fa fa-check-circle"></i> Database</span>
                                </a>
                            </li>
                            <li class="is-active">
                                <a>
                                    <span><b>Finish</b></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <?php
      if ($_POST && isset($_POST["dbscs"])) {
            $valid = $_POST["dbscs"];
            $db_host = strip_tags(trim($_POST["db_host"]));
            $db_user = strip_tags(trim($_POST["db_user"]));
            $db_pass = strip_tags(trim($_POST["db_pass"]));
            $db_name = strip_tags(trim($_POST["db_name"]));
            $license_code = strip_tags(trim($_POST["license_code"]));
            $client_name = strip_tags(trim($_POST["client_name"]));

            ?>
                    <center>
                        <p><strong>your Admin Credential.</strong></p><br>
                    </center>
                    <form action="#" id="admin-detail-form" method="POST">
                        <div class="field">
                            <label class="label">Admin Email</label>
                            <div class="control">
                                <input class="input" type="email" id="email"
                                    placeholder="Enter your admin email" required name="email">
                                <p class="email" style='color:#f74416;'></p>
                            </div>
                        </div>
                        <input type="hidden" name="db_host" class="db_host" value="<?php echo $db_host; ?>">
                        <input type="hidden" name="db_user" class="db_user" value="<?php echo $db_user; ?>">
                        <input type="hidden" name="db_pass" class="db_pass" value="<?php echo $db_pass; ?>">
                        <input type="hidden" name="db_name" class="db_name" value="<?php echo $db_name; ?>">
                        <input type="hidden" name="license_code" class="license_code" value="<?php echo $license_code; ?>">
                        <input type="hidden" name="client_name" class="client_name" value="<?php echo $client_name; ?>">

                        <div class="field">
                            <label class="label">Admin Password</label>
                            <div class="control">
                                <input class="input" type="text" id="password" class=""
                                    placeholder="Enter your admin password" required name="password">
                                <p class="password" style='color:#f74416;'></p>
                            </div>
                        </div>
                        <div style='text-align: right;'>
                            <button type="button" id="admin-login-btn" class="button is-link">Proceed to
                                Login</button>
                        </div>
                     
                    </form>
                    <?php
                } else {?>
                    <div class='notification is-danger'>Sorry, something went wrong.</div><?php
                }
        break;
}?>
                </div>
            </div>
        </div>
    </div>
    <div class="content has-text-centered">
        <p>© <?php echo date('Y'); ?> Copyright by EventRight.</p><br>
    </div>
</body>
<script>
    jQuery(document).ready(function($) {
        $(".db-import").on('click', function(event) {
            $("#main_loader").show();
        });
    });

    jQuery(document).on("click", "#admin-login-btn", function() {
        var name = "{{ url('') }}" + '/';
        url = window.location.origin + window.location.pathname
        url = url.slice(0, -1)
        // var name = url.substring(0, url.lastIndexOf("installer"));
        console.log(name + "saveEnvData");
        var formData = new FormData($('#admin-detail-form')[0]);
        $.ajax({
            type: "POST",
            url: name + "saveEnvData",
            data: formData,
            cache: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            contentType: false,
            processData: false,
            beforeSend: function() {
                $("#main_loader").show();
            },
            success: function(result) {
                if (result.success == true) {
                    setTimeout(function() {
                        $.ajax({
                            type: "POST",
                            url: name + "saveAdminData",
                            data: formData,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                    'content')
                            },
                            cache: false,
                            contentType: false,
                            processData: false,
                            beforeSend: function() {
                              
                            },
                            success: function(result) {
                                console.log("data", result.data);
                                if (result.success == true) {
                                    window.location.replace(result.data);
                                }
                                if (result.success == false) {
                                    console.log(result.success.e);
                                    alert(
                                        "Don't have enough permission for .env file to be written."
                                        );
                                }
                            },
                            complete: function() {
                                $("#main_loader")
                                    .hide(); 
                            },
                            error: function(xhr, status, error) {
                                console.log(xhr); // log entire xhr object
                                console.log(xhr.responseJSON
                                    .error); // log error message
                            }
                        });
                    }, 5000);
                }
            },
            complete: function() {
                // Don't hide the loader here
            },
            error: function(err) {
                console.log('errors', err)
                for (let v1 of Object.keys(err.responseJSON.errors)) {
                    $(".field ." + v1).html(Object.values(err.responseJSON.errors[v1]));
                }
                $("#main_loader").hide();
            }
        });
    });
</script>

</html>
