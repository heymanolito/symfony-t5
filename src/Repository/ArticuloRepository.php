<?php

namespace App\Repository;

class ArticuloRepository
{

    private ?array $listaArticulos;

    /**
     * @param ?array $listaArticulos
     */
    public function __construct(?array $listaArticulos)
    {
        $this->listaArticulos = $listaArticulos;
    }

    /**
     * @return array
     */
    public function getListaArticulos(): array
    {
        return $this->listaArticulos;
    }

    /**
     * @param array $listaArticulos
     */
    public function setListaArticulos(array $listaArticulos): void
    {
        $this->listaArticulos = $listaArticulos;
    }




}