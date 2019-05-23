<?php

namespace App\Controller;

use App\Entity\Incidencia;
use App\Form\IncidenciaType;
use App\Manager\IncidenciaManager;
use App\Repository\IncidenciaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Helpers\Aviso;
use App\Form\BusqIncidenciaType;
use Symfony\Component\HttpFoundation\File\Exception\FileException;



/**
 * @Route("/incidencia")
 */
class IncidenciaController extends AbstractController
{
    /**
     * @Route("/", name="incidencia_index", methods={"GET","POST"})
     */
    public function index(IncidenciaRepository $incidenciaRepository, Request $request): Response
    {
        $formSearch = $form = $this->createForm(BusqIncidenciaType::class);
        $formSearch->handleRequest($request);
        if($formSearch->isSubmitted()){
            $categorySearch = $formSearch->getData()['categorySearch'];
            $titleSearch = $formSearch->getData()['titleSearch'];
            $incidencias = $incidenciaRepository->findByCategoryAndTitle($categorySearch, $titleSearch);
        } else {
            $incidencias = $incidenciaRepository->findAll();
        }

        return $this->render('incidencia/index.html.twig', [
            'formSearch' => $formSearch->createView(),
            'incidencias' => $incidencias,
        ]);
    }

    /**
     * @Route("/new", name="incidencia_new", methods={"GET","POST"})
     */
    public function new(Request $request, IncidenciaManager $incidenciaManager): Response
    {
        $incidencia = $incidenciaManager->newObject();
        $form = $this->createForm(IncidenciaType::class, $incidencia);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if($form->isValid()){
                $incidenciaManager->create($incidencia);
                $this->addFlash('success', 'El nuevo se ha creado correctamente');
                return $this->redirectToRoute('incidencia_index');
            }else{
                //mensaje de error
            }
        }

        return $this->render('incidencia/new.html.twig', [
            'incidencia' => $incidencia,
            'form' => $form->createView(),
        ]);

    }

    /**
     * @Route("/{id}", name="incidencia_show", methods={"GET"})
     */
    public function show(Incidencia $incidencia, Aviso $aviso): Response
    {
        $texto = $incidencia->getTitulo();

        if($aviso->notifyIncidence($texto)){
            $this->addFlash('success', 'Incidencia importante');
        }
        ;

        $this->denyAccessUnlessGranted('view', $incidencia);

        return $this->render('incidencia/show.html.twig', [
            'incidencia' => $incidencia,
        ]);

    }

    /**
     * @Route("/{id}/edit", name="incidencia_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Incidencia $incidencia): Response
    {
        $form = $this->createForm(IncidenciaType::class, $incidencia);
        $form->handleRequest($request);

        $this->denyAccessUnlessGranted('edit', $incidencia);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('incidencia_index', [
                'id' => $incidencia->getId(),
            ]);
        }

        return $this->render('incidencia/edit.html.twig', [
            'incidencia' => $incidencia,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/delete", name="incidencia_delete", methods={"GET"})
     */
    public function delete(Request $request, Incidencia $incidencia): Response
    {
        $id = $request->query->get('id');
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($incidencia);
        $entityManager->flush();

        return $this->redirectToRoute('incidencia_index');
    }

    public function comprobar(Aviso $aviso, String $texto)
    {
        return $comprobacion = $aviso->notifyIncidence($texto);
    }
}