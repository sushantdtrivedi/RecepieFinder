<?php

// checking for the valid inputs
if(isset($_REQUEST['fridge'])) $fridge = $_REQUEST['fridge'];
if(isset($_REQUEST['recepies'])) $recepies = $_REQUEST['recepies'];

if($fridge==null || $recepies==null || $fridge=="" || $recepies==""){
	echo "hehe";
	exit();
} 

//storing the items in an array
$availableitems = array();
foreach(preg_split('/\r\n?|\n/', $fridge) as $line){
	$availableitems[] = str_getcsv($line);
}

//checking for expired items and save the unexpired items in an array
$usefulitems = array();
foreach ($availableitems as $item){
	$date = $item[3];
	$item[3] = $newdate = str_replace("/", "-", $date); //converting the date to european format
	if(time() < strtotime($newdate)){
		$item[4] = strtotime($newdate);
		$usefulitems[] = $item;
	}
}

//sorting the items as per the expiry date
for ($i=0;$i<count($usefulitems)-1;$i++) {
	for($j=$i+1;$j<count($usefulitems);$j++){
		if($usefulitems[$i][4]>$usefulitems[$j][4]){
			$tempItem = $usefulitems[$i];
			$usefulitems[$i] = $usefulitems[$j];
			$usefulitems[$j] = $tempItem;
		}
	}
}

//decoding recepies json and storing it in an array
$recepies_json = json_decode($recepies,true);

//array for storing all te possible recepies
$usefulrecepies = array();

// looping through all the recepies
foreach($recepies_json as $recepie){
	$allIngredients = true; // variable to determine if the recepie can be carried out
	
	// loop through all the ingredients of the recepie
	foreach($recepie['ingredients'] as $ingredient){
		$ingredientAvailable = false; // asume the ingredient is unavailable untill found
	
		// loop through all the items in the fridge to see if the ingredient is available
		foreach($usefulitems as $item){
	
			//check if the ingredient is available
			if($item['0']==$ingredient['item'] && $item['1']>=$ingredient['amount'])
			{
				$ingredientAvailable = true;
			}
		}

		//if an ingredient is not found, exit the loop to find the rest of the ingredients of the recepie
		if(!$ingredientAvailable){
			$allIngredients=false;
			break;
		}
		
	}
	
	// store the recepie in the useful recepies array if all the required ingredients are found
	if($allIngredients) $usefulrecepies[] = $recepie;
}

$theRecepie = array();
if(count($usefulrecepies)<=0){ //if no recepies can be made
	$theRecepie['name'] = "Please order takeout";
	$theRecepie['ingredients'] = array();
}elseif(count($usefulrecepies)==1){
	$theRecepie['name'] = $usefulrecepies[0]['name'];
	$theRecepie['ingredients'] = $usefulrecepies[0]['ingredients'];
}

echo $theRecepie['name'] . "<br />\n";
foreach ($theRecepie['ingredients'] as $ing) {
	echo "&nbsp;&nbsp;" . $ing['item'] . " - " . $ing['amount'] . " " . $ing['unit'] . "<br />\n";
}

?>