<?php namespace Acme;

use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use GuzzleHttp\Client;


class ShowCommand extends Command {

   
    
    public function configure()
    {
        $this->setName('show')
             ->setDescription('Show movie information.')
             ->addArgument('movie', InputArgument::OPTIONAL, 'Show information for this movie.')
             ->addOption('fullPlot',null,InputOption::VALUE_NONE,'Show the movie plot.');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->showMovieDetails($input, $output);

        if ($input->getOption('fullPlot')){
            $this->showMoviePlot($input, $output);
        }
        
        return 0;
    }

    private function showMovieDetails(InputInterface $input, OutputInterface $output)
    {   
        $movieDetails = $this->getMovieDetails($input);
        $table = new Table($output);
        $table->setHeaders([$movieDetails[0][1] . " - " . $movieDetails[1][1]])
              ->setRows($movieDetails)
              ->render();
    }

    private function showMoviePlot(InputInterface $input, OutputInterface $output)
    {
        $fullPlot = $this->getMoviePlot($input);

        $output->writeln("{$fullPlot}");

    }

    private function getMovieDetails(InputInterface $input) 
    {
        $movie = $input->getArgument('movie');

        $client = new Client([
            'base_uri'=>'http://www.omdbapi.com/',
        ]);

        $titleResponse = $client->request('GET','', [
            'query' => [
                't' => $movie,
                'apikey' => '78e88e5e'
            ]
        ]);
        
        $titleBody = $titleResponse->getBody();
        $arr_titleBody = json_decode($titleBody,true); // TODO: corregir ,true
        unset($arr_titleBody["Ratings"]);

        $newArr = $this->arrangeArray($arr_titleBody);
        return $newArr;
    }

    private function getMoviePlot(InputInterface $input)
    {
        $arr_titleBody = $this->getMovieDetails($input);

        $client = new Client([
            'base_uri'=>'http://www.omdbapi.com/',
        ]);

        $idResponse = $client->request('GET','', [
            'query' => [
                'i' => $arr_titleBody["imdbID"],
                'plot' => 'full',
                'apikey' => '78e88e5e'
            ]
        ]);
        
        $idBody = $idResponse->getBody();
        $arr_idBody = json_decode($idBody,true);
        return $arr_idBody["Plot"];
    }

    public function arrangeArray(array $arr){
        $newArr = [];
        foreach ($arr as $key => $value)
        {
            array_push($newArr, [$key,$value]);
        }
        return $newArr;
    }
}