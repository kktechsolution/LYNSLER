<?php

$x = 7;
$i=0;

while($x>=1)
{
    if($x%2==0)
    {
        $x= $x/2;

    }else
    {
        $x = ((3*$x) + 1);
    }

    $i = $i+1;
}

echo $i;

?>
