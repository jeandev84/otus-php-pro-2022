<?php
namespace App\Infrastructure\Command;

use App\Application\Contract\FindLeadInterface;
use App\Application\Contract\LeadServiceInterface;
use App\Application\DTO\FindLeadRequest;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * $ php bin/console app:lead:find 12
 */
class FindLeadCommand extends Command
{

     protected static $defaultName = "app:lead:find";

     private FindLeadInterface $leadService;


     public function __construct(FindLeadInterface $leadService)
     {
         parent::__construct(self::$defaultName);
         $this->leadService = $leadService;
     }





      /**
       * @return void
      */
      protected function configure()
      {
           $this->addArgument('id', InputArgument::REQUIRED, 'The Lead ID');
      }




    /**
      * @param InputInterface $input
      *
      * @param OutputInterface $output
      *
      * @return int|void
     */
     protected function execute(InputInterface $input, OutputInterface $output)
     {
           $id = $input->getArgument('id');

           $findRequest  = new FindLeadRequest($id);
           $findResponse = $this->leadService->findLead($findRequest);

           $output->writeln($findResponse->getName());
           $output->writeln($findResponse->getPhone());
           $output->writeln($findResponse->getDescription());

           return Command::SUCCESS;
     }
}