<?php
   
   // hier laden we boot.php in
    require "../boot.php";

    // ALS de server methode gelijk is aan POST voeren we de onderstaande code uit
    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        // hier maken we variabelen aan voor elke persoon gegeven en geven we validations
        $variables = [
            'first_name' => ['required', 'name', 'min:2', 'max:100'],
            'suffix_name' => ['name', 'max:25'],
            'last_name' => ['required', 'name', 'min:2', 'max:100' ],
            'country' => ['required', 'name', 'min:2', 'max:6'],
            'city' => ['required', 'name',  'min:2', 'max:100'],
            'street' => ['required', 'name', 'min:2', 'max:100'],
            'street_number' => ['required', 'number', 'min:1', 'max:5'],
            'street_suffix' => ['max:100'],
            'zipcode' => ['required', 'postcode', 'min:6', 'max:7'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'confirmed']
        ];

        // hier laden we validation.php in
        require "../app/validation/validation.php";

        // hier laden we new.php in ALS er geen errors gevonden zijn
        if(count($errors) == 0) {
            require "../app/payment/new.php";
        }
    }

    function value($key)
    {
        return @$_POST[$key];
    }

?>

<!DOCTYPE html>
<html>
   
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="ShoppingcartFORM.css">

</head>
<body>

    <ul>
        <li><a href="index.php">Home</a></li>
    </ul>

    <div class="row">
    <div class="col-75">
    <div class="container">
    <form action="" method="post">
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
                <div>   
                    <label for="first_name"><i class="fa fa-user"></i> Full Name</label>
                    <input type="text" id="first_name" name="first_name" placeholder="Your fullname" value="<?php echo value('first_name'); ?>">
                    <!-- hier zorgen we ervoor dat er restrictions komen op de invoervelden  -->
                    <?php echo (@$errors['first_name']) ? '<p class="text-danger">'.$errors['first_name'][0].'</p>' : ''; ?>
                </div>
                <div>
                    <label for="suffix_name"><i class="fa fa-user"></i> Suffix Name</label>
                    <input type="text" id="suffix_name" name="suffix_name" placeholder="Your suffixname" value="<?php echo value('suffix_name'); ?>">
                    <!-- hier zorgen we ervoor dat er restrictions komen op de invoervelden  -->
                    <?php echo (@$errors['suffix_name']) ? '<p class="text-danger">'.$errors['suffix_name'][0].'</p>' : ''; ?>
                </div>
                <div>
                    <label for="last_name"><i class="fa fa-user"></i> Last Name</label>
                    <input type="text" id="last_name" name="last_name" placeholder="Your lastname" value="<?php echo value('last_name'); ?>">
                    <!-- hier zorgen we ervoor dat er restrictions komen op de invoervelden  -->
                    <?php echo (@$errors['last_name']) ? '<p class="text-danger">'.$errors['last_name'][0].'</p>' : ''; ?>
                </div>
                <div>
                    <label for="country"><i class="fa fa-globe"></i> Country</label>
                    <select name="country">
                        <option >Select country:</option>
                        <option value="NL">NL</option>
                        <option value="BE">BE</option>
                        <option value="DE">DE</option>
                    </select>
                    <!-- hier zorgen we ervoor dat er restrictions komen op de invoervelden  -->
                    <?php echo (@$errors['country']) ? '<p class="text-danger">'.$errors['country'][0].'</p>' : ''; ?>
                </div>
                <div>
                    <label for="city"><i class="fa fa-institution"></i> City</label>
                    <input type="text" id="city" name="city" placeholder="Your city" value="<?php echo value('city'); ?>">
                    <!-- hier zorgen we ervoor dat er restrictions komen op de invoervelden  -->
                    <?php echo (@$errors['city']) ? '<p class="text-danger">'.$errors['city'][0].'</p>' : ''; ?>
                </div>
                <div>
                    <label for="street"><i class="fa fa-street-view"></i> Street</label>
                    <input type="text" id="street" name="street" placeholder="Your streetname" value="<?php echo value('street'); ?>">
                    <!-- hier zorgen we ervoor dat er restrictions komen op de invoervelden  -->
                    <?php echo (@$errors['street']) ? '<p class="text-danger">'.$errors['street'][0].'</p>' : ''; ?>
                </div>
                <div>
                    <label for="street_number"><i class="fa fa-street-view"></i> Streetnumber</label>
                    <input type="text" id="street_number" name="street_number" placeholder="Your streetnumber" value="<?php echo value('street_number'); ?>">
                    <!-- hier zorgen we ervoor dat er restrictions komen op de invoervelden  -->
                    <?php echo (@$errors['street_number']) ? '<p class="text-danger">'.$errors['street_number'][0].'</p>' : ''; ?>
                </div>
                <div>
                    <label for="street_suffix"><i class="fa fa-street-view"></i> Streetsuffix</label>
                    <input type="text" id="street_suffix" name="street_suffix" placeholder="Your streetsuffix" value="<?php echo value('street_suffix'); ?>">
                    <!-- hier zorgen we ervoor dat er restrictions komen op de invoervelden  -->
                    <?php echo (@$errors['street_suffix']) ? '<p class="text-danger">'.$errors['street_suffix'][0].'</p>' : ''; ?>
                </div>
                <div>
                    <label for="zipcode"><i class="fa fa-street-view"></i> Zipcoce</label>
                    <input type="text" id="zipcode" name="zipcode" placeholder="Your zipcode" value="<?php echo value('zipcode'); ?>">
                    <!-- hier zorgen we ervoor dat er restrictions komen op de invoervelden  -->
                    <?php echo (@$errors['zipcode']) ? '<p class="text-danger">'.$errors['zipcode'][0].'</p>' : ''; ?>
                </div>
                <div>
                    <label for="email"><i class="fa fa-envelope"></i> Email</label>
                    <input type="text" id="email" name="email" placeholder="name@example.com" value="<?php echo value('email'); ?>">
                    <!-- hier zorgen we ervoor dat er restrictions komen op de invoervelden  -->
                    <?php echo (@$errors['email']) ? '<p class="text-danger">'.$errors['email'][0].'</p>' : ''; ?>
                </div>
                <div>
                    <label for="password"><i class="fa fa-key"></i> Password</label>
                    <input type="password" id="p" name="password" placeholder="Your password">
                    <!-- hier zorgen we ervoor dat er restrictions komen op de invoervelden  -->
                    <?php echo (@$errors['password']) ? '<p class="text-danger">'.$errors['password'][0].'</p>' : ''; ?>
                </div>
                <div>
                    <label for="password"><i class="fa fa-key"></i> Password</label>
                    <input type="password" id="p" name="password_confirmed" placeholder="Your password again">
                </div>
                <button id="submitb" type="submit">Submit!</button>
    </form>
</html>
