<?php
header("Content-Type: application/json");
$random_nums=[];
$random_apartments=[];


for ($i=0; $i < 5; $i++) {
  $num = rand(1,count($apartments));
  if (!in_array($num, $random_nums)) {
    $random_nums[] = $num;
  }
}
foreach ($random_nums as $number) {
$random_apartments[] = $apartments[$number] ;
}

echo json_encode($random_apartments);

 ?>
