<?php
$x = 7;
$i=0;
echo "Start No = " .$x ."<br>";
do
{
    if($x%2==0)
    {
        $x= $x/2;

    }else
    {
        $x = ((3*$x) + 1);
    }
    echo $x."<br>";

    $i = $i+1;

}while($x!=1);
echo "Total Itrations = ".$i;
?>
