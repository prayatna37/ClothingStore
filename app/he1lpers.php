<?php



// function presentPrice($price)
// {
//     return money_format('Rs%i', $price);
// }
// <?php


function presentPrice($price)
{
    return 'Rs' . number_format($price);
}
