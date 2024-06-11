<?php
session_start();

function alert($sessionName, $inputType, $inputName, $placeholder, $labelContent, $validIconClass, $invalidIconClass, $invalidText)
{
    session_start();
    
    if (isset($_SESSION[$sessionName])) {
        echo '
            <div class="field">
                <label class="label">' . htmlspecialchars($labelContent) . '</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input is-danger" name="' . htmlspecialchars($inputName) . '" type="' . htmlspecialchars($inputType) . '" placeholder="' . htmlspecialchars($placeholder) . '"value="' . $_SESSION[$sessionName] . '">
                    <span class="icon is-small is-left">
                        <i class="' . htmlspecialchars($validIconClass) . '"></i>
                    </span>
                    <span class="icon is-small is-right">
                        <i class="' . htmlspecialchars($invalidIconClass) . '"></i>
                    </span>
                </div>
                <p class="help is-danger">' . htmlspecialchars($invalidText) . '</p>
            </div>';
    } else {
        echo '
        <div class="field">
            <label class="label">' . htmlspecialchars($labelContent) . '</label>
            <div class="control has-icons-left">
                <input class="input" type="' . htmlspecialchars($inputType) . '" name="' . htmlspecialchars($inputName) . '" placeholder="' . htmlspecialchars($placeholder) . '">
                <span class="icon is-small is-left">
                    <i class="' . htmlspecialchars($validIconClass) . '"></i>
                </span>
            </div>
        </div>';
    }
}

?>
<!DOCTYPE html>
<html data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello Bulma!</title>
    <link rel="stylesheet" href="/assets/css/styles.css">
    <script defer src="https://kit.fontawesome.com/d8438e7f2f.js" crossorigin="anonymous"></script>
</head>

<body>
    <section class="hero is-primary is-small">
        <!-- Hero head: will stick at the top -->
        <div class="hero-head">
            <nav class="navbar">
                <div class="container">
                    <div class="navbar-brand">

                        <img src="assets/logo/hackers-poulette-logo.png" width="150px" height="150px" alt="Logo" />

                        <span class="navbar-burger" data-target="navbarMenuHeroA">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </div>
                    <div id="navbarMenuHeroA" class="navbar-menu">
                        <div class="navbar-end">
                            <a class="navbar-item is-active"> Home </a>
                            <a class="navbar-item"> Examples </a>
                            <a class="navbar-item"> Documentation </a>
                            <span class="navbar-item">
                                <a class="button is-primary is-inverted">
                                    <span class="icon">
                                        <i class="fab fa-github"></i>
                                    </span>
                                    <span>Download</span>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <!-- Hero content: will be in the middle -->
        <div class="hero-body is-justify-content-center is-align-items-center">
            <div class="container has-text-centered">
                <p class="title">Contact us</p>
                <form class="box has-text-centered" action="controller/contactController.php" method="post" data-theme="light">

                    <?php
    if (isset($_POST['alertMiel'])) {
        echo '
            <div class="notification is-danger">
            <button class="delete"></button>
            Spam detected.
            </div>
            ';
    }

                    alert(
                        'alertFirstname',
                        'text',
                        'firstname',
                        'Jhon',
                        'Firstname',
                        'fas fa-user',
                        'fas fa-exclamation-triangle',
                        'This firstname is invalid must be less than 50 characters and only letters and white space allowed in firstname'
                    );
                    alert(
                        'alertLastname',
                        'text',
                        'lastname',
                        'Doe',
                        'Lastname',
                        'fas fa-user',
                        'fas fa-exclamation-triangle',
                        'This laststname is invalid must be less than 50 characters and only letters and white space allowed in lastname'
                    );

                    if (isset($_SESSION['alertgender'])) {
                        echo '<div class="field">
                        <label class="label">Gender</label>
                        <div class="control">
                            <div class="select">
                                <select name="gender" class="input is-danger">
                                    <option value="Male" selected>'.$_SESSION['alertgender'].'</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Other</option>
                                    <option>Hélicoptère de combat AC 130</option>
                                </select>
                            </div>
                        </div>
                        <p class="help is-danger">This field is required</p>
                    </div>';
                    }else {
                        echo '<div class="field">
                        <label class="label">Gender</label>
                        <div class="control">
                            <div class="select">
                                <select name="gender">
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Other</option>
                                    <option>Hélicoptère de combat AC 130</option>
                                </select>
                            </div>
                        </div>
                    </div>';
                    }

                    alert(
                        'alertmail',
                        'email',
                        'mail',
                        'e.g. alexsmith@gmail.com',
                        'Email',
                        'fas fa-envelope',
                        'fas fa-exclamation-triangle',
                        'This email is invalid'
                    );

                    if (isset($_SESSION['alertcountry'])) {
                        echo '
                        <div class="field">
                        <label class="label">Country</label>
                        <p class="control has-icons-left">
                            <span class="icon is-small is-right">
                                <i class="fas fa-globe"></i>
                            </span>
                            <span class="select">
                                <select name="country" class="input is-danger">
                                    <option value="Venezuela">Other</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="Chile">Chile</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="Guyana">Guyana</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Peru">Peru</option>
                                    <option value="Suriname">Suriname</option>
                                    <option value="Uruguay">Uruguay</option>
                                    <option value="Venezuela">Venezuela</option>
                                </select>
                            </span>
                        </p>
                        <p class="help is-danger">This field is required</p>
                    </div>';
                    }else {
                        echo '
                        <div class="field">
                        <label class="label">Country</label>
                        <p class="control has-icons-left">
                            <span class="icon is-small is-right">
                                <i class="fas fa-globe"></i>
                            </span>
                            <span class="select">
                                <select name="country">
                                    <option value="Venezuela">Other</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="Chile">Chile</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="Guyana">Guyana</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Peru">Peru</option>
                                    <option value="Suriname">Suriname</option>
                                    <option value="Uruguay">Uruguay</option>
                                    <option value="Venezuela">Venezuela</option>
                                </select>
                            </span>
                        </p>
                    </div>';
                    }


                    if (isset($_SESSION['alertsubject'])) {
                        echo '
                        <div class="field">
                        <label class="label">Subject</label>
                        <div class="control">
                            <div class="select">
                                <select id="subject" name="subject" class="input is-danger">
                                    <option value="support">Support</option>
                                    <option value="sales">Sales</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                        <p class="help is-danger">This fild is required</p>
                    </div>';
                    }else {
                        echo '
                        <div class="field">
                        <label class="label">Subject</label>
                        <div class="control">
                            <div class="select">
                                <select id="subject" name="subject">
                                    <option value="support">Support</option>
                                    <option value="sales">Sales</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                    </div>
                        ';
                    }

                    if (isset($_SESSION['alertMessage'])) {
                        echo '
                        <div class="field">
                        <label class="label">Message</label>
                        <div class="control">
                            <textarea class="textarea is-danger" name="message" placeholder="Textarea"></textarea>
                            <p class="help is-danger">Message is required or must be less than 500 characters.</p>
                        </div>
                    </div>';
                    }else {
                        echo '
                        <div class="field">
                        <label class="label">Message</label>
                        <div class="control">
                            <textarea class="textarea" name="message" placeholder="Textarea"></textarea>
                        </div>
                    </div>';
                    }

                    if(isset($_SESSION['alertagree'])) {
                        echo '
                        <div class="field">
                        <div class="control">
                            <label class="checkbox">
                                <input type="checkbox" name="agree">
                                I agree to the <a href="#" style="color:'."red".'">terms and conditions</a>
                            </label>
                        </div>
                        <p class="help is-danger">Need accept this for submit</p>
                    </div>';
                    }else {
                        echo '
                        <div class="field">
                        <div class="control">
                            <label class="checkbox">
                                <input type="checkbox" name="agree">
                                I agree to the <a href="#" style="color:'."teal".'">terms and conditions</a>
                            </label>
                        </div>
                    </div>';
                    }
                    ?>

                    
                    <input type="text" name="mielPops" style="visibility: hidden;">
                    <div class="field is-grouped is-grouped-right">
                        <p class="control">
                            <input type="submit" name="submit" value="Submit" class="button is-primary">
                        </p>
                    </div>
                </form>
            </div>
        </div>

        <!-- Hero footer: will stick at the bottom -->
        <div class="hero-foot">
            <nav class="tabs">
                <div class="container">
                    <ul>
                        <li class="is-active"><a>Overview</a></li>
                        <li><a>Modifiers</a></li>
                        <li><a>Grid</a></li>
                        <li><a>Elements</a></li>
                        <li><a>Components</a></li>
                        <li><a>Layout</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </section>


</body>

</html>