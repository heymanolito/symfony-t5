<?php

namespace App\Service;

use App\Entity\Articulo;
use App\Repository\ArticuloRepository;
use JetBrains\PhpStorm\Pure;

class ArticuloService
{
    private ?array $listaArticulos = null;
    private ArticuloRepository $repository;


    #[Pure] public function __construct()
    {
        $this->repository = new ArticuloRepository($this->listaArticulos);
    }


    /**
     * @param Articulo $art
     * @return void
     */
    public function save(Articulo $art)
    {
        $this->listaArticulos[] = $art;
    }

    /**
     * @return array|null
     */
    public function read()
    {
        return $this->listaArticulos;
    }

    public function findElementById($id)
    {
        return $this->listaArticulos[$id];
    }

    public function generateSugerencias()
    {
        return array(
            array(
                "usuario" => "Jose",
                "sugerencia" => "Me gustaría tener más variedad de periféricos"),
            array(
                "usuario" => "María",
                "sugerencia" => "La web es horrible"),
            array(
                "usuario" => "Juan",
                "sugerencia" => "Esta web es una copia de la tarea del profe. Buuuuu!")
        );
    }

    public function generateFormFields()
    {
        return array(
            ['Observación: ', 'text', 'observ', ''],
            ['', 'submit', 'valorar', 'Valorar']
        );
    }
}