<?php include '../components/header.php'; 

$states = array( 'AL'=>'Alabama', 'AK'=>'Alaska', 'AZ'=>'Arizona', 'AR'=>'Arkansas', 'CA'=>'California', 'CO'=>'Colorado', 'CT'=>'Connecticut', 'DE'=>'Delaware', 'DC'=>'District of Columbia', 'FL'=>'Florida', 'GA'=>'Georgia', 'HI'=>'Hawaii', 'ID'=>'Idaho', 'IL'=>'Illinois', 'IN'=>'Indiana', 'IA'=>'Iowa', 'KS'=>'Kansas', 'KY'=>'Kentucky', 'LA'=>'Louisiana', 'ME'=>'Maine', 'MD'=>'Maryland', 'MA'=>'Massachusetts', 'MI'=>'Michigan', 'MN'=>'Minnesota', 'MS'=>'Mississippi', 'MO'=>'Missouri', 'MT'=>'Montana', 'NE'=>'Nebraska', 'NV'=>'Nevada', 'NH'=>'New Hampshire', 'NJ'=>'New Jersey', 'NM'=>'New Mexico', 'NY'=>'New York', 'NC'=>'North Carolina', 'ND'=>'North Dakota', 'OH'=>'Ohio', 'OK'=>'Oklahoma', 'OR'=>'Oregon', 'PA'=>'Pennsylvania', 'RI'=>'Rhode Island', 'SC'=>'South Carolina', 'SD'=>'South Dakota', 'TN'=>'Tennessee', 'TX'=>'Texas', 'UT'=>'Utah', 'VT'=>'Vermont', 'VA'=>'Virginia', 'WA'=>'Washington', 'WV'=>'West Virginia', 'WI'=>'Wisconsin', 'WY'=>'Wyoming');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h1>Registration Form</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <form action="registration_process.php" method="POST" id="registerForm">
                    <div class="form-group">
                        <input type="text" name="firstname" placeholder="First Name" class="form-control"> 
                    </div>
                    <div class="form-group">
                        <input type="text" name="lastname" placeholder="Last Name" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Email" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" placeholder="Phone Number" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" name="street_address" placeholder="Street Address" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" name="city" placeholder="City" class="form-control">
                    </div>
                    <div class="form-group">
                        <select name="state" class="form-control">
                                <?php
                                foreach ($states as $k => $v) {
                                        echo "<option value='$v'>$v</option>";
                                    }
                                ?>        
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="zipcode" placeholder="zipcode" class="form-control">
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="gender" value="male" id="gender1">
                        <label for="gender1">Male</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="gender" value="female" id="gender2">
                        <label for="gender2">Female</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="gender" value="private" id="gender3">
                        <label for="gender3">Prefer not to say</label>
                    </div>
                    <div class="form-group">
                        <textarea name="special_needs" cols="30" rows="10" class="form-control" placeholder="Special Needs"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="password" name="createPassword" placeholder="Create Password" class="form-control" id="createPassword">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Confirm Password" class="form-control" id="confirmPassword">
                    </div>
                    <div style="display: none;" id="passwordError" class="text-danger form-group text-center">Passwords do not match</div>
                    <div class="formgroup">
                        <button type="submit" class="btn btn-primary btn-block" id="registerBtn">Register</button>
                    </div>
                </form> 
            </div>
            <div class="col"></div>
        </div>
    </div>
    <script src="index.js"></script>
</body>
</html>