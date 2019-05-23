<?php


namespace App\Command;
use App\Manager\IncidenciaManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class IncidenciaCommand extends Command
{
    protected static $defaultName = 'incidencia:crear';

    protected function configure()
    {
        $this
            ->setDescription('Comando para creacion unitaria de entidades INCIDENCIA.')
            ->addArgument('Titulo', InputArgument::REQUIRED, '¿Titulo?')
            /*
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
        $titulo = $input->getArgument('Titulo');
        $descripcion = $input->getArgument('Descripcion');
        $fcreacion = $input->getArgument('FCreacion');
        $resuelta = $input->getArgument('Resuelta');
        $fresolucion = $input->getArgument('FResolucion');
        $categoria = $input->getArgument('Categoria');
        $tags = $input->getArgument('Tags');

        $incidenciaManager = new IncidenciaManager();
        $incidencia = $incidenciaManager->newObject();
        $incidencia->setTitulo('Prueba');
        $incidencia->setResuelta('N');
        /*
        $incidencia->setTitulo($titulo);
        $incidencia->setDescripcion($descripcion);
        $incidencia->setFechaCreacion($fcreacion) ;
        $incidencia->setResuelta($resuelta) ;
        $incidencia->setFechaResolucion($fresolucion) ;
        */
        $incidenciaManager->create($incidencia);
    }
}