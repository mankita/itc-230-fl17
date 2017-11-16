<?php include 'includes/config.php' ?>
<?php
    if(isset($_GET['day'])){  
        $day = $_GET['day'];
    } else{
        $day = date('l');
    }

// $day = 'Wednesday';

switch($day){
    case 'Saturday':
        $special = 'Weather App';
        $color = '#8B4513';
        break;  

    case 'Sunday':
        $special = 'DigiClock';
        $color = '#A52A2A';
        break;  

    case 'Monday':
        $special = 'Traffic Control';
        $color = '#D2691E';
        break;  

    case 'Tuesday':
        $special = 'CPU Meter';
        $color = '#FF4500';
        break;  

    case 'Wednesday':
        $special = 'Calendar';
        $color = '#F4A460';
        break;  

    case 'Thursday':
        $special = 'Desktop Feed';
        $color = '#DAA520';
        break;  

    case 'Friday':
        $special = 'Currency Meter';
        $color = '#99FFFF';
        break; 

    case 'default':
        $special = 'Clipboarder';
        $color = 'black';
        break;
}
?>
<?php include 'includes/header.php' ?>
<div style="background-color:<?=$color?>;">
    <h3>Daily Page</h3>
    <p>Today is <strong> <?=$day?></strong></p>
    <p>Yay, You have got special widget for <?=$day?> : Explore the all new <strong><?=$special?></strong> for your Device.</p>

    <p>Check more about special widgets on other days:</p>
    <p><a href="?day=Monday">Monday</a> <a href="?day=Tuesday">Tuesday</a> <a href="?day=Wednesday">Wednesday</a></p>
    <p><a href="?day=Thursday">Thursday</a> <a href="?day=Friday">Friday</a> <a href="?day=Saturday">Saturday</a></p> 
    <p><a href="?day=Sunday">Sunday</a></p>

</div>
<?php include 'includes/footer.php' ?>