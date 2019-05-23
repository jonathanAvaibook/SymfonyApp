<?php


namespace App\Command;
use App\Controller\TagController;
use App\Entity\Tag;
use App\Manager\IncidenciaManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TagCommand extends Command
{
    protected static $defaultName = 'tag:crear';

    protected function configure()
    {
        $this
            ->setDescription('Comando para creacion unitaria de entidades TAG.')
            /*
            ->addArgument('Titulo', InputArgument::REQUIRED, '¿Titulo?')
            ->addArgument('Descripcion', InputArgument::OPTIONAL, '¿Descripcion?')
            ->addArgument('FCreacion', InputArgument::OPTIONAL, '¿fecha creacion?')
            ->addArgument('Resuelta', InputArgument::REQUIRED, '¿Resuelta?')
            ->addArgument('FResolucion', InputArgument::OPTIONAL, '¿Fecha resolucion?')
            ->addArgument('Categoria', InputArgument::OPTIONAL, '¿Categoria?')
            ->addArgument('Tags', InputArgument::OPTIONAL, '¿Tags?')
            */
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /*
        $titulo = $input->getArgument('Titulo');
        $descripcion = $input->getArgument('Descripcion');
        $fcreacion = $input->getArgument('FCreacion');
        $resuelta = $input->getArgument('Resuelta');
        $fresolucion = $input->getArgument('FResolucion');
        $categoria = $input->getArgument('Categoria');
        $tags = $input->getArgument('Tags');
        */
        $tag = new Tag();
        $tag->setDescripcion('Prueba');
        $tag->setNombre('Prueba');
        /*
        $incidencia->setTitulo($titulo);
        $incidencia->setDescripcion($descripcion);
        $incidencia->setFechaCreacion($fcreacion) ;
        $incidencia->setResuelta($resuelta) ;
        $incidencia->setFechaResolucion($fresolucion) ;
        */
        $tagController = new TagController();
        $tagController->newConsole($tag);
    }
}