<?php
/**
 * Created by PhpStorm.
 * User: marci
 * Date: 21/08/2017
 * Time: 15:57
 */

namespace controller;

use model\Video;
use view\View;


/**
 * Class VideoController
 * @deprecated
 * @package controller
 */
class VideoController implements IController
{

    public function post()
    {
        $video = new Video();
        $video->cadastrar();
        // TODO: Implement post() method.
    }

    public function get($params = [])
    {
        $video = new Video();

        if (isset($params['id'])) $video->setId($params['id']);
        if (isset($params['nome'])) $video->setNome($params['nome']);
        if (isset($params['genero'])) $video->setGenero($params['genero']);
        $data = ["SQL" => "" . $video->listar() . ""];
        if (isset($_GET['stream']) and $_GET['stream'] == "true") {
            $video->setId($_GET['id']);
            $video->stream();
        }

        if($_GET['deleteItemLista'] == "true"){
           $data = $video->deleteItemLista();
        }
        View::render($data);
    }

    public function put($params = [])
    {
        // TODO: Implement put() method.
    }

    public function delete($params = [])
    {
        // TODO: Implement delede() method.
    }
}