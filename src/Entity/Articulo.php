<?php

namespace App\Entity;

class Articulo
{
    private ?int $id;

    private ?string $titulo;

    private ?string $imagen;

    private ?int $precio;

    /**
     * @param int|null $id
     * @param string|null $titulo
     * @param string|null $imagen
     * @param int|null $precio
     */
    public function __construct(?int $id, ?string $titulo, ?string $imagen, ?int $precio)
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->imagen = $imagen;
        $this->precio = $precio;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    /**
     * @param string|null $titulo
     */
    public function setTitulo(?string $titulo): void
    {
        $this->titulo = $titulo;
    }

    /**
     * @return string|null
     */
    public function getImagen(): ?string
    {
        return $this->imagen;
    }

    /**
     * @param string|null $imagen
     */
    public function setImagen(?string $imagen): void
    {
        $this->imagen = $imagen;
    }

    /**
     * @return int|null
     */
    public function getPrecio(): ?int
    {
        return $this->precio;
    }

    /**
     * @param int|null $precio
     */
    public function setPrecio(?int $precio): void
    {
        $this->precio = $precio;
    }




}