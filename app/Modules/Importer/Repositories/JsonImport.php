<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 05/06/2018
 * Time: 06:56
 */

namespace App\Modules\Importer\Repositories;

use File;
use League\Csv\Reader;

use Illuminate\Console\Command;

class JsonDataImport
{


    public function importfeed(Productfeed $feed, Command $command)
    {
        $fileLocation = storage_path() . '/' . $feed->program->id . '.' . $feed->id . '.csv';
    }

    /**
     * Download Feed and save as CSV
     *
     * @param $url
     * @param $fileLocation
     * @param $command
     *
     * @return mixed
     * @throws \Exception
     */
    public function downloadFeed($url, $fileLocation, $command)
    {
        $file = fopen($fileLocation, 'w+');
        $curl = curl_init($url);

        curl_setopt_array($curl, array(
            CURLOPT_URL            => $url,
            CURLOPT_BINARYTRANSFER => 1,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_FILE           => $file,
            CURLOPT_TIMEOUT        => 600,
            CURLOPT_USERAGENT      => 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)'
        ));

        $command->info(sprintf("Saving '%s' to '%s'", $url, $fileLocation));
        $response = curl_exec($curl);

        if ($response === false) {
            throw new \Exception('Curl error: ' . curl_error($curl));
        }

        return $response;
    }
}