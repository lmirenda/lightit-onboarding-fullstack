<?php namespace Acme;

use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;

class ShowCommand extends Command {

    public function configure()
    {
        $this->setName('show')
             ->setDescription('Show movie information.')
             ->addArgument('movieName', InputArgument::REQUIRED, 'Show information for this movie.')
             ->addOption('fullPlot',null,InputOption::VALUE_NONE,'Show the movie plot.');
    }

    public function exectute(InputInterface $input, OutputInterface $output)
    {
        $this->movieDetails($output);


        return 0;
    }

    private function movieDetails(OutputInterface $output)
    {
        $table = new Table($output);

        // TO DO: variable llamada msj formada por el obj title - obj year

        $table->setHeaders(['Movie title placeholder - year placeholder']);
    }

    private function moviePlot(OutputInterface $output)
    {
        $fullPlot = 'Full plot placeholder';

        // TO DO: buscar con guzzle usando el obj ID el fullplot.

        $output->writeln("{$fullPlot}");

    }
}