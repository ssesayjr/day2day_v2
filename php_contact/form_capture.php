<?php
// Initialize the session
session_start();
 

 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $email = $phoneNumber = $event_date = $event_type = $message = "";
$name_err = $email_err = $phoneNumber_err = $event_date_err = $event_type_err = $message_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if event date is empty
    if(empty(trim($_POST["event_date"]))){
        $event_date_err = "Please enter the date of the event.";
    } else{
        $event_date = trim($_POST["event_date"]);
    }
    
    // Check if event_type is empty
    if(empty(trim($_POST["event_type"]))){
        $event_type_err = "Please select the event type.";
    } else{
        $event_type = trim($_POST["event_type"]);
    }
    
    // Check if name is empty
    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter your name.";
    } else{
        $name = trim($_POST["name"]);
    }

    // Check if email is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter an email address.";
    } else{
        $email = trim($_POST["email"]);
    }

    // Check if phoneNumber is empty
    if(empty(trim($_POST["phoneNumber"]))){
        $phoneNumber_err = "Please enter a phoneNumber.";
    } else{
        $phoneNumber = trim($_POST["phoneNumber"]);
    }

    // Check if messages is empty
    if(empty(trim($_POST["message"]))){
        $message_err = "Please add more information about the event.";
    } else{
        $message = trim($_POST["message"]);
    }

    // Close connection
    mysqli_close($link);
}
?>


    // GOES IN BODY 



											<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> " method="post">
												<div class="form-group">
													<label class="label">Email Address</label>
													<input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                									<span><?php echo $username_err; ?></span>

												</div>
												<div class="form-group">
													<label class="label">Password</label>
													<input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
               										<span><?php echo $password_err; ?></span>

												</div>

												<div class="form-group">
													<input type="submit" class="submit" value="Login">
												</div>
											</form>


    /// EDIT FORM FIELD VERSION ONE


                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> " method="post" name="contact-us">
                        <div class="contactMenuContainer">
                            <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label class="eventDate">Event Date</label>
                                            <br>    
                                            <input type="date" id="calendar" name="calendar" class="calendar-input <?php echo (!empty($event_date_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $event_date; ?>"> 
                                            <span><?php echo $event_date_err; ?></span>
                                    </div>
                                    
                                    <div class="col-md-6 form-group">
                                            <label for="ddmenu" class="eventDate">Event Type</label>
                                            <br>

                                                <select id="ddmenu" name="event_type" class="dropdown <?php echo (!empty($event_type_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $event_type; ?>">
                                                    <option value="default">-</option>
                                                    <option value="marriage">Marriage </option>
                                                    <option value="corporate_event">Corporate Event</option>
                                                    <option value="birthday" >Birthday</option>
                                                    <option value="graduation">Graduation</option>
                                                    <option value="other">Other</option>
                                                </select>
                                                <span><?php echo $event_type_err; ?></span>
                                    </div>
                            </div>
                        </div>


                        <div class="row" style="padding-top: 20px;padding-bottom: 20px;padding-right:25px;padding-left: 25px">
                            <div class="bottom_border"></div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <input type="text" id="name" name="name" placeholder="Name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                                <span><?php echo $name_err; ?></span>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" id="email" name="email" placeholder="Email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                                <span><?php echo $email_err; ?></span>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="number" id="phoneNumber" name="phoneNumber" placeholder="Phone" class="form-control <?php echo (!empty($phoneNumber_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phoneNumber; ?>">
                                <span><?php echo $phoneNumber_err; ?></span>
                            </div>
                            
                            <div class="col-md-12 form-group">
                                <textarea id="message" name="message" rows="6" placeholder="Your Message ..." class="form-control <?php echo (!empty($message_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $message; ?>"></textarea>
                                <span><?php echo $message_err; ?></span>
                            </div>
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary btn-shadow btn-lg" type="submit" id ="submit" name="submit">Send Message</button>
                            </div>
                        </div>
                    </form>


    /// EDIT FORM FIELD VERSION TWO



    <form method="post" name="contact-us" action="php_contact/submit_form.php">
                        <div class="contactMenuContainer">
                            <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label class="eventDate">Event Date</label>
                                            <br>    
                                            <input type="date" id="calendar" class="calendar-input" name="calendar" required> 
                                    </div>
                                    
                                    <div class="col-md-6 form-group">
                                            <label for="ddmenu" class="eventDate">Event Type</label>
                                            <br>

                                                <select id="ddmenu" class="dropdown">
                                                    <option value="default">-</option>
                                                    <option value="marriage">Marriage </option>
                                                    <option value="corporate_event">Corporate Event</option>
                                                    <option value="birthday" >Birthday</option>
                                                    <option value="graduation">Graduation</option>
                                                    <option value="other">Other</option>
                                                </select>
                                    </div>
                            </div>
                        </div>


                        <div class="row" style="padding-top: 20px;padding-bottom: 20px;padding-right:25px;padding-left: 25px">
                            <div class="bottom_border"></div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="number" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Phone" required>
                            </div>
                            
                            <div class="col-md-12 form-group">
                                <textarea class="form-control" id="message" name="message" rows="6" placeholder="Your Message ..."></textarea>
                            </div>
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary btn-shadow btn-lg" type="submit" id ="submit" name="submit">Send Message</button>
                            </div>
                        </div>
                    </form>



    /// EDIT FORM FIELD ORIGINAL

    <form method="post" name="contact-us" action="">
                        <div class="contactMenuContainer">
                            <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label class="eventDate">Event Date</label>
                                            <br>    
                                            <input type="date" id="calendar" class="calendar-input" name="calendar"> 
                                    </div>
                                    
                                    <div class="col-md-6 form-group">
                                            <label for="ddmenu" class="eventDate">Event Type</label>
                                            <br>

                                                <select id="ddmenu" class="dropdown">
                                                    <option value="default">-</option>
                                                    <option value="marriage">Marriage </option>
                                                    <option value="corporate_event">Corporate Event</option>
                                                    <option value="birthday" >Birthday</option>
                                                    <option value="graduation">Graduation</option>
                                                    <option value="other">Other</option>
                                                </select>
                                    </div>
                            </div>
                        </div>


                        <div class="row" style="padding-top: 20px;padding-bottom: 20px;padding-right:25px;padding-left: 25px">
                            <div class="bottom_border"></div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="number" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Phone">
                            </div>
                            
                            <div class="col-md-12 form-group">
                                <textarea class="form-control" id="message" name="message" rows="6" placeholder="Your Message ..."></textarea>
                            </div>
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary btn-shadow btn-lg" type="submit" id ="submit" name="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
