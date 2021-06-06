<?php


require_once __DIR__.'/../../../vendor/autoload.php';

function moviemon() {
    $moviemon_max = array();
    $moviemon = array();
    $api = new RestClient;
    $index = 1;
    $monrand = rand(30, 50);
    while ($index <= 5) {
        $api->set_option('base_url', "http://www.omdbapi.com");
        $result = $api->get("/", [
            's' => 'School',
            'apikey' => 'e496f800',
            'page' => $index,
        ]);
        $test = json_decode($result->response);
        $i = 0;
        $page = 10;
        while ($i < $page) {
            $total['title'] = $test->Search[$i]->Title;
            $total['post'] = $test->Search[$i]->Poster;
            $total['moviekey'] = $test->Search[$i]->imdbID;
            $total['number'] = $i;
            array_push($moviemon_max, $total);
            $i++;
        }
        $index++;
    }
    $i = 0;
    $rand_array = array();
    while ($i < $page) {
        $rand = rand(0, 49);
        if (in_array($rand, $rand_array)) {
            continue;
        }
        $moviemon[$i] = $moviemon_max[$rand];
        $moviekey = $moviemon_max[$rand]['moviekey'];
        $api_sub = new RestClient;
        $api_sub->set_option('base_url', "http://www.omdbapi.com");
        $result_sub = $api_sub->get("/", [
            'apikey' => 'e496f800',
            'i' => $moviekey,
        ]);
        $test_sub = json_decode($result_sub->response);
        $Rating = explode("/", $test_sub->Ratings[0]->Value)[0];
        $moviemon[$i]['Rating'] = $Rating."/10";
        $moviemon[$i]['Year'] = $test_sub->Year;
        $moviemon[$i]['Director'] = $test_sub->Director;
        $moviemon[$i]['Plot'] = $test_sub->Plot;
        $moviemon[$i]['health'] = (int)(50 + $monrand * ($Rating + 1));
        $moviemon[$i]['max_health'] = $moviemon[$i]['health'];
        $moviemon[$i]['enemystr'] = (int)($monrand / 5 * ($Rating + 1));
        array_push($rand_array, $rand);
        $i++;
    }
    $location = array(2, 2);
    $moviemon['location'] = $location;
    $moviemon['playerhp'] = rand(300, 500);
    $moviemon['str'] = rand(40, 60);
    $moviemon['max_playerhp'] = $moviemon['playerhp'];
    $moviemon['collection'] = array();
    $json = json_encode($moviemon);
    file_put_contents("develop/myfile.json", $json);
}

function save() {
    $moviemon['save'] = array();
    $moviemon['savefile'] = array();
    $json = json_encode($moviemon);
    file_put_contents("develop/save.json", $json);
}
?>
