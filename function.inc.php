<?php
function getsafe($con,$arg){
    return mysqli_real_escape_string($con,$arg);
}
?>