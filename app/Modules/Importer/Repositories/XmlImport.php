<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 05/06/2018
 * Time: 06:44
 */

namespace App\Modules\Importer\Repositories;

use GuzzleHttp\Client;

use Prewk\XmlStringStreamer;

class XmlImport
{

    /**
     * Import Products
     *
     * @param $url
     */
    public function importProducts($url)
    {
        $CHUNK_SIZE = 1024;

        $stream = new Stream\Guzzle($url, $CHUNK_SIZE);
        $parser = new Parser\StringWalker([
            "extractContainer" => true,
        ]);

        $streamer = new XmlStringStreamer($parser, $stream);

        while ($node = $streamer->getNode()) {
            $xml = simplexml_load_string($node);
            $rootNode = $xml->getName();
        }
    }
}