<html>
    <head>
        <title>Add an Member</title>
        <link rel="stylesheet" href="../../assets/style.css">
        <style>
            input[type=text], select {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }

            input[type=submit] {
                width: 100%;
                background-color: #800080;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            input[type=submit]:hover {
                background-color: #D8BFD8;
            }

            div {
                border-radius: 5px;
                background-color: #D8BFD8;
                padding: 20px;
            }
        </style>
    <body>
        <div>
            <!-- super global variable that returns the filename of the currently executing script.-->
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" >
                <h2>Add Contact Details</h2>
                <!--Link to allow the user to go back to the home page-->
                <p><a href="<?php echo base_url(); ?>index.php/GG/index/" class="back"><-Back to Home Menu</a></p>

                <p><strong>First Name:</strong><br/>
                    <!-- echos and sets the value of fname to the input-->
                    <input type="text" name="fName" value="<?php echo set_value('fName'); ?>" placeholder="Enter First Name" id="special"/>
                    <!-- echos the error form for the fname from the validation rules -->
                    <?php echo form_error('fName'); ?>
                <p><strong>Last Name:</strong><br/>
                    <!-- echos and sets the value of lname to the input-->
                    <input type="text" name="lName" value="<?php echo set_value('lName'); ?>"  placeholder="Enter Last Name" id="special"></p>
                <!--echos the error form for the lName from the validation rules -->
                <?php echo form_error('lName'); ?>
                <p><strong>Password:</strong><br/>
                    <!-- echos and sets the value of password to the input-->
                    <input type="text" name="password" value="<?php echo set_value('password'); ?>"  placeholder="Enter Password" id="special"></p>
                <!-- echos the error form for the password from the validation rules -->
                <?php echo form_error('password'); ?>
                <p><strong>Phone:</strong><br/>
                    <!-- echos and sets the value of phone to the input-->
                    <input type="text" name="phone" value="<?php echo set_value('phone'); ?>"  placeholder="Enter Phone" id="special"></p>
                <!-- echos the error form for the phone from the validation rules -->
                <?php echo form_error('phone'); ?>
                <p><strong>Email:</strong><br/>
                    <!-- echos and sets the value of emailAddress to the input-->
                    <input type="text" name="emailAddress" value="<?php echo set_value('emailAddress'); ?>"  placeholder="Enter Email" id="special"></p>
                <!-- echos the error form for the emailAddress from the validation rules -->
                <?php echo form_error('emailAddress'); ?>
                <p><strong>Address Line 1:</strong><br/>
                    <!-- echos and sets the value of addressLine1 to the input-->
                    <input type="text" name="addressLine1" value="<?php echo set_value('addressLine1'); ?>"  placeholder="Enter Address Line 1" id="special"></p>
                <!-- echos the error form for the addressLine1 from the validation rules -->
                <?php echo form_error('addressLine1'); ?>
                <p><strong>Address Line 2:</strong><br/>
                    <!-- echos and sets the value of addressLine2 to the input-->
                    <input type="text" name="addressLine2" value="<?php echo set_value('addressLine2'); ?>"  placeholder="Enter Address Line 2" id="special"></p>
                <!-- echos the error form for the addressLine2 from the validation rules -->
                <?php echo form_error('addressLine2'); ?>
                <p><strong>Address Line 3:</strong><br/>
                    <!-- echos and sets the value of addressLine3 to the input-->
                    <input type="text" name="addressLine3" value="<?php echo set_value('addressLine3'); ?>"  placeholder="Enter Address Line 3" id="special"></p>
                <!-- echos the error form for the addressLine3 from the validation rules -->
                <?php echo form_error('addressLine3'); ?>
                <p><strong>City:</strong><br/>
                    <!-- echos and sets the value of city to the input-->
                    <input type="text" name="city" value="<?php echo set_value('city'); ?>"  placeholder="Enter City" id="special"></p>
                <!-- echos the error form for the city from the validation rules -->
                <?php echo form_error('city'); ?>
                <p><strong>County:</strong><br/>
                    <!-- echos and sets the value of county to the input-->
                    <input type="text" name="county" value="<?php echo set_value('county'); ?>"  placeholder="Enter County" id="special"></p>
                <!-- echos the error form for the county from the validation rules -->
                <?php echo form_error('county'); ?>
                <p><strong>Country:</strong><br/>
                    <!-- echos and sets the value of country to the input-->
                    <input type="text" name="country" value="<?php echo set_value('country'); ?>"  placeholder="Enter Country" id="special"></p>
                <!-- echos the error form for the country from the validation rules -->
                <?php echo form_error('country'); ?>
                <p><strong>Subscribe:</strong><br/>
                    <!-- echos and sets the value of subscribe to the input-->
                    <input type="text" name="subscribe" value="<?php echo set_value('subscribe'); ?>"  placeholder="Enter Subscribe Y/N" id="special"></p>
                <!-- echos the error form for the subscribe from the validation rules -->
                <?php echo form_error('subscribe'); ?>
                <!--submit button -->
                <p><input type="submit" name="submit" value="Add Member"></p>
            </form>
        </div>

    </body>
</html>