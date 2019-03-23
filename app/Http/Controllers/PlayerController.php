<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Player;

class PlayerController extends Controller
{
    public function index($letter)
    {
    	$players = Player::where(DB::raw('SUBSTRING_INDEX(TRIM(name), " " , -1)'), 'LIKE', $letter.'%')->get();

    	return view('index-letter',compact('players'));
    }

    public function show(Player $player)
    {
    	return view('player',compact('player'));
    }

    public function importCsv($filePath)
	{
	    
		// Reading file
		$file = fopen($filePath,"r");

		$importData_arr = array();
		$i = 0;

		while (($filedata = fgetcsv($file, 1000, ";")) !== FALSE) {
			$num = count($filedata );
			 // Skip first row (Remove below comment if you want to skip the first row)
			 /*if($i == 0){
			    $i++;
			    continue; 
			 }*/
			 for ($c=0; $c < $num; $c++) {
			    $importData_arr[$i][] = $filedata [$c];
			 }
			 $i++;
		}
		fclose($file);



		foreach($importData_arr as $importData){
			$insertData = array(
               "name"=>$importData[0],
               "position"=>$importData[1],
               "birthday"=>$importData[2],
               "birthday_place"=>$importData[3],
			   "img_URL"=>$importData[4]);

			Player::create($insertData);

		}
	    
    }   
}
