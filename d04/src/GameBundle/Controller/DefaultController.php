<?php

namespace GameBundle\Controller;

use GameBundle\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

require_once __DIR__.'/getapi.php';

class DefaultController extends Controller
{
    public function firstAction($filename)
    {
        moviemon();
        $json_string = file_get_contents($filename);
        $game_data = json_decode($json_string, true);
        return ($game_data);
    }
    public function defineAction($filename)
    {
        $json_string = file_get_contents($filename);
        $game_data = json_decode($json_string, true);
        return ($game_data);
    }
    public function returnAction($data_file)
    {
        $json = json_encode($data_file);
        file_put_contents("develop/myfile.json", $json);
    }
    public function returnsaveAction($data_file)
    {
        $json = json_encode($data_file);
        file_put_contents("develop/save.json", $json);
    }
    /**
     * @Route("/save/{slag}")
     */
    public function loadAction(string $slag)
    {
        $re_data = $this->defineAction("develop/save.json");
        if (in_array($slag, $re_data['savefile'])) {
            $game_data = $this->defineAction("save/".$slag.".json");
            $this->returnAction($game_data);
            return $this->redirectToRoute('worldmap');
        }
        else {
            echo "<script>alert('There is no data with this name');</script>";
            return $this->redirectToRoute('task_success');
        }
    }
    /**
     * @Route("/")
     */
    public function loginAction(Request $request)
    {
        if (!file_exists("develop/save.json")) {
            save();
        }
        $save_data = $this->defineAction("develop/save.json");
        $task = new Task();
        $task->setMessage('');
        $form = $this->createFormBuilder($task)
            ->add('Message', TextType::class, array(
                'label' => ' ',
                'attr' => ['autocomplete' => 'off']
                ))
            ->add('new', SubmitType::class)
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $i = 0;
            $checkname = str_split("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789\n");
            $playername = str_split($task->getMessage());
            while ($i < count($playername)) {
                if (!in_array($playername[$i], $checkname)) {
                    echo "<script>alert('Please enter only English or numbers');</script>";
                    return $this->redirectToRoute('task_success');
                }
                $i++;
			}
			if (count($playername) > 8) {
				echo "<script>alert('Please write in 8 characters or less');</script>";
				return $this->redirectToRoute('task_success');
			}
            $game_data = $this->firstAction("develop/myfile.json");
            $game_data['player'] = $task->getMessage();
            $this->returnAction($game_data);
            return $this->redirectToRoute('worldmap');
        }
        return $this->render('GameBundle::login.html.twig', array(
            'form' => $form->createView(),
            'save' => $save_data['save'],
        ));
    }
    /**
     * @Route("/battle")
     */
    public function indexAction(Request $request)
    {
        $game_data = $this->defineAction("develop/myfile.json");
        $rand = $game_data['rand'];
        $title = $game_data[$rand]['title'];
        $post = $game_data[$rand]['post'];
        $player = $game_data['playerhp'];
        $str = $game_data['str'];
        $en_str = $game_data[$rand]['enemystr'];
        $task = new Task();
        $form = $this->createFormBuilder($task)
            ->add('attack', SubmitType::class)
            ->add('cancel', SubmitType::class)
            ->getForm();
        $form->handleRequest($request);
        if ($player <= 0) {
            echo "<script>alert('Game Over');</script>";
            return $this->redirectToRoute('task_success');
        }
        if ($game_data[$rand]['health'] <= 0) {
            $game_data['str'] = (int)($game_data['str'] * 1.5);
            $game_data['playerhp'] = $game_data['max_playerhp'];
            if (!in_array($rand, $game_data['collection'])) {
                array_push($game_data['collection'], $rand);
            }
            $game_data[$rand]['health'] = $game_data[$rand]['max_health'];
            $this->returnAction($game_data);
            return $this->redirectToRoute('worldmap');
        }
        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->get('attack')->isClicked()) {
                if (rand(0, 9) > 3) {
                    $game_data[$rand]['health'] -= $str;
                    $this->returnAction($game_data);
                    return $this->redirectToRoute('muffin time');
                }
                else {
                    $player -= $en_str;
                    $game_data['playerhp'] = $player;
                    $this->returnAction($game_data);
                    return $this->redirectToRoute('muffin time');
                }
            }
            if ($form->get('cancel')->isClicked()) {
                $game_data[$rand]['health'] = $game_data[$rand]['max_health'];
                $game_data['playerhp'] = $game_data['max_playerhp'];
                $this->returnAction($game_data);
                return $this->redirectToRoute('worldmap');
            }
        }
         return $this->render('GameBundle::Battle.html.twig', array(
             'form' => $form->createView(),
             'title' => $title,
             'post' => $post,
             'mon_health' => $game_data[$rand]['health'],
             'player_health' => $player,
             'str' => $str,
             'mon_str' => $en_str,
             'max_mon' => $game_data[$rand]['max_health'],
             'max_player' => $game_data['max_playerhp'],
         ));
    }
    /**
     * @Route("/worldmap")
     */
    public function worldAction(Request $request)
    {
        $game_data = $this->defineAction("develop/myfile.json");
        if (count($game_data['collection']) == 10) {
            echo "<script>alert('You have captured all the monsters. You will be taken to a new game.');</script>";
            $name = $game_data['player'];
            moviemon();
            $new_data = $this->firstAction("develop/myfile.json");
            $new_data['player'] = $name;
            $this->returnAction($new_data);
            return $this->redirectToRoute('worldmap');
        }
        $task = new Task();
        $form = $this->createFormBuilder($task)
            ->add('back', SubmitType::class)
            ->add('save', SubmitType::class)
            ->add('MovieDex', SubmitType::class)
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->get('back')->isClicked()) {
                return $this->redirectToRoute('task_success');
            }
            if ($form->get('save')->isClicked()) {
                $this->saveAction($game_data);
            }
            if ($form->get('MovieDex')->isClicked()) {
                return $this->redirectToRoute('moviedex');
            }
        }
        $i = 0;
        $capture = array();
        while ($i < 10) {
            if (in_array($i ,$game_data['collection'])) {
                $capture[$i] = 0;
            }
            else {
                $capture[$i] = 0.7;
            }
            $post[$i] = $game_data[$i]['post'];
            $i++;
        }
        return $this->render('GameBundle::WorldMap.html.twig', array(
            'location' => $game_data['location'],
            'form' => $form->createView(),
            'post' => $post,
            'capture' => $capture,
            ));
    }
    /**
     * @Route("/worldmap/next")
     */
    public function worldnextAction(Request $request)
    {
        $game_data = $this->defineAction("develop/myfile.json");
        $task = new Task();
        $form = $this->createFormBuilder($task)
            ->add('save', SubmitType::class)
            ->add('back', SubmitType::class)
            ->add('MovieDex', SubmitType::class)
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->get('back')->isClicked()) {
                return $this->redirectToRoute('task_success');
            }
            if ($form->get('save')->isClicked()) {
                $this->saveAction($game_data);
            }
            if ($form->get('MovieDex')->isClicked()) {
                return $this->redirectToRoute('moviedex');
            }
        }
        if (rand(0, 9) <= 2) {
            $price = array();
            for ($i=0; $i<10; $i++){
                if (!in_array($i, $game_data['collection'])) {
                    array_push($price, $i);
                }
            }
            $rand = rand(0, count($price) - 1);
            $game_data['rand'] = $price[$rand];
            $this->returnAction($game_data);
            return $this->redirectToRoute('muffin time');
        }
        else {
            return $this->redirectToRoute('worldmap');
        }
        $i = 0;
        $capture = array();
        while ($i < 10) {
            if (in_array($i ,$game_data['collection'])) {
                $capture[$i] = 0;
            }
            else {
                $capture[$i] = 0.7;
            }
            $post[$i] = $game_data[$i]['post'];
            $i++;
        }
        return $this->render('GameBundle::WorldMap.html.twig', array(
            'location' => $game_data['location'],
            'form' => $form->createView(),
            'post' => $post,
            'capture' => $capture,
        ));
    }
    /**
     * @Route("/worldmap/left")
     */
    public function leftAction()
    {
        $game_data = $this->defineAction("develop/myfile.json");
        if ($game_data['location'][1] - 1 < 0) {
            $game_data['location'][1] = 4;
        }
        else {
            $game_data['location'][1] -= 1;
        }
        $this->returnAction($game_data);
        return $this->redirectToRoute('worldmapnext');
    }
    /**
     * @Route("/worldmap/up")
     */
    public function upAction()
    {
        $game_data = $this->defineAction("develop/myfile.json");
        if ($game_data['location'][0] - 1 < 0) {
            $game_data['location'][0] = 4;
        }
        else {
            $game_data['location'][0] -= 1;
        }
        $this->returnAction($game_data);
        return $this->redirectToRoute('worldmapnext');
    }
    /**
     * @Route("/worldmap/right")
     */
    public function rightAction()
    {
        $game_data = $this->defineAction("develop/myfile.json");
        if ($game_data['location'][1] + 1 > 4) {
            $game_data['location'][1] = 0;
        }
        else {
            $game_data['location'][1] += 1;
        }
        $this->returnAction($game_data);
        return $this->redirectToRoute('worldmapnext');
    }
    /**
     * @Route("/worldmap/down")
     */
    public function downAction()
    {
        $game_data = $this->defineAction("develop/myfile.json");
        if ($game_data['location'][0] + 1 > 4) {
            $game_data['location'][0] = 0;
        }
        else {
            $game_data['location'][0] += 1;
        }
        $this->returnAction($game_data);
        return $this->redirectToRoute('worldmapnext');
    }
    /**
     * @Route("/save")
     */
    public function saveAction($data) {
        $save_data = $this->defineAction("develop/save.json");
        if (in_array($data['player'], $save_data['save'])) {
            array_splice($save_data['save'], array_search($data['player'], $save_data['save']), 1);
        }
        if (in_array($data['player'], $save_data['savefile'])) {
            array_splice($save_data['savefile'], array_search($data['player'], $save_data['savefile']), 1);
        }
        array_unshift($save_data['savefile'], $data['player']);
        array_unshift($save_data['save'], $data['player']);
        if (count($save_data['save']) >= 4 ) {
            array_pop($save_data['save']);
        }
        $this->returnsaveAction($save_data);
        $json = json_encode($data);
        file_put_contents("save/".$data['player'].".json", $json);
        return $this->redirectToRoute('worldmap');
    }
    /**
     * @Route("/moviedex")
     */
    public function moviedexAction(Request $request) {
        $game_data = $this->defineAction("develop/myfile.json");
        $task = new Task();
        $form = $this->createFormBuilder($task)
            ->add('↩', SubmitType::class)
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            return $this->redirectToRoute('worldmap');
        }
        $i = 0;
        $capture = array();
        while ($i < 10) {
            if (in_array($i ,$game_data['collection'])) {
                $capture[$i] = 0;
                $signal[$i] = 1;
            }
            else {
                $capture[$i] = 0.7;
                $signal[$i] = 0;
            }
            $post[$i] = $game_data[$i]['post'];
            $rating[$i] = $game_data[$i]['Rating'];
            $year[$i] = $game_data[$i]['Year'];
            $director[$i] = $game_data[$i]['Director'];
            $plot[$i] = $game_data[$i]['Plot'];
            $title[$i] = $game_data[$i]['title'];
            $plot[$i] = str_replace("'", "\\'", $plot[$i]);
            $title[$i] = str_replace("'", "\\'", $title[$i]);
            $director[$i] = str_replace("'", "\\'", $director[$i]);
            $i++;
        }
        $count = count($game_data['collection']);
        return $this->render('GameBundle::capture.html.twig', array(
            'capture' => $capture,
            'post' => $post,
            'count' => $count,
            'form' => $form->createView(),
            'year' => $year,
            'rating' => $rating,
            'director' => $director,
            'plot' => $plot,
            'title' => $title,
            'signal' => $signal,
        ));
    }
}
