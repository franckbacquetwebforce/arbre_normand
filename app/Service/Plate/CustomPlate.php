<?php

namespace Service\Plate;

use League\Plates\Engine;
use League\Plates\Extension\ExtensionInterface;

/**
 * @link http://platesphp.com/engine/extensions/ Documentation Plates
 */
class CustomPlate implements ExtensionInterface
{

	/**
	 * Enregistre les nouvelles fonctions dans Plates
     * @param \League\Plates\Engine $engine L'instance du moteur de template
	 */
    public function register(Engine $engine)
    {
        $engine->registerFunction('affiche', [$this, 'affichagedunnom']);

    }

    public function affichagedunnom($nom)
    {
      return '<strong>' .$nom . '<strong>';
    }

    public function isloged($user)
    {
      
    }
}
