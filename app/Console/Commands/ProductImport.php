<?php

namespace App\Console\Commands;

use App\Cms\Imports\Models\Import;
use App\Cms\Imports\Interfaces\ImportRepositoryInterface;
use App\Cms\Imports\Repositories\ImportRepository;

use Illuminate\Console\Command;

class ProductImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'importer:products {company?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    private $importRepo;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ImportRepositoryInterface $importRepository)
    {
        parent::__construct();
        $this->importRepo = $importRepository;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $company = $this->argument('company');

        if (!empty($company)) {
            $this->info('Importing products for company ' . $company);

//            Import::where('company', '=', $company)->first();

            $imports = $this->importRepo->findImportById($company);

        } else {
            $this->info('Importing products for all companies');
            $imports = $this->importRepo->listImports();
        }
        dd($imports);

        $imports->get()->each(function($import) {

            if ( ! $import->feed_url) {
                $this->info('No productfeeds for ' . $import->company);
                return;
            }
            $this->data->import($import, $this);
        });
    }
}
