<?php

namespace App\Controller;

use App\Entity\Articulo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use App\Service\ArticuloService;

/**
 * Controlador de la tienda.
 *
 * @author: Manuel Gallardo Fuentes.
 */
class TiendaController extends AbstractController
{

    private ArticuloService $articuloService;
    public const EN_CONTROLADOR = true;

    /**
     * @param $articuloService
     * El constructor inyecta el servicio ArticuloService.
     * También instancia tres objetos Artículo.
     * Esto no es buena práctica, pero son tan solo datos de prueba.
     */
    public function __construct(ArticuloService $articuloService)
    {
        $this->articuloService = $articuloService;
        $this->articuloService->save(new Articulo(0, "Altavoz Speaker 3000", "altavoz.jpg", 30));
        $this->articuloService->save(new Articulo(1, "Auriculares Skullcandy", "auriculares.jpg", 70));
        $this->articuloService->save(new Articulo(2, "Raton Razor 2400m", "raton.jpg", 40));
    }



    /**
     * @Route('/', name="index")
     */
    public function index(): Response
    {
        $articulos = $this->articuloService->read();
        return $this->render('articulos.twig', array('articulos' => $articulos));
    }

    /**
     * @Route("/articulo/{id}", name="articulo")
     */
    public function articulo($id): Response
    {
        $articulo = $this->articuloService->findElementById($id);
        return $this->render('detalles_articulo.twig', array('articulo' => $articulo));
    }

    /**
     * @Route("/registro", name="registro")
     */
    public function registro(Request $request)
    {
        $form = $this->createFormBuilder()
            ->add('Nombre', TextType::class)
            ->add('Apellidos', TextType::class)
            ->add('Direccion', TextType::class)
            ->add('Email', TextType::class)
            ->add('Contrasena', TextType::class)
            ->add('Enviar', SubmitType::class, array('label' => 'Enviar'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $datos = $form->getData();
            $nombre = $datos['Nombre'];
            return $this->render('registro_correcto.twig', array('nombre'=>$nombre));
        }
        return $this->render('registro.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/sugerencias", name="sugerencias")
     * @
     */
    public function sugerencias(Request $request)
    {
        $sugerencias = $this->articuloService->generateSugerencias();

        $formulario = $this->articuloService->generateFormFields();

        if ($request->query->get('observ'))
        {
            return new Response(sprintf("<html><body>Se ha guardado su sugerencia: %s</body></html>", $request->query->get('observ')));
        }

        return $this->render('sugerencias.twig', array(
            'sugerencias' => $sugerencias, 'formulario' => $formulario
        ));
    }
}