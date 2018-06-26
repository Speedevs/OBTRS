<!DOCTYPE html>
<html lang="en">

<head>
    <title>Redirecting</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> </head>

<body>
    <h1>! Location Changed !</h1>
    <br/>
    <p>Please note the new location changed
        <br/> This page will automatically redirect in 2 seconds.
        <br/> If this does not work for any reason use the link below:
        <br/> </p>
	<a HREF="http://localhost/obtrs/admin/adminpanel">http://localhost/obtrs/admin/adminpanel</a>
    
        <?php

        //Sleep for two seconds.
        sleep(2);

        //Redirect using the Location header.
        header('Location: ./adminpanel/');

        //exit to prevent the rest of the script from executing
        exit;

    ?>
</body>

</html>