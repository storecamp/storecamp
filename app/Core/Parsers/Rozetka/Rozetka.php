<?php

namespace App\Core\Parsers\Rozetka;

use App\Core\Logic\MediaSystem;
use App\Core\Models\Folder;
use App\Core\Support\Media\MediaUploader;
use GuzzleHttp\Client;
use League\Csv\Writer;
use Masterminds\HTML5;

/**
 * Parser for rozetka.com.ua.
 *
 * Class Rozetka
 */
class Rozetka
{
    /**
     * @var is         limit of pages for parsing.
     * @var $searchURL is url to parse.
     * @var $request   to create an object of class Request.
     * @var $model     to create an object of class Model.
     */
    public $pagesLimit;
    private $searchURL;
    private $request;
    private $model;
    private $csvItems;
    private $client;

    /**
     * Rozetka constructor.
     *
     * @param $model
     * @param int  $pagesLimit
     * @param null $url
     */
    public function __construct($model, $pagesLimit = 20, $url = null)
    {
        $this->pagesLimit = $pagesLimit;
        $this->searchURL = $url ? $url : $model->url.$model->search_url;
        $this->model = $model;
        $this->client = new Client([
            // Base URI is used with relative requests
            'base_uri' => $this->searchURL,
            // You can set any number of default request options.
            'timeout' => 2.0,
        ]);
    }

    /**
     * @param $keyword
     * @param \Closure|null $handler
     *
     * @return mixed
     */
    public function parse($keyword, \Closure $handler = null)
    {
        $this->searchURL .= 'search/?text={text}&p={page}';
        $URL = str_replace('{text}', urlencode($keyword), $this->searchURL);
        $resultItems = [];
        $pageNum = 0;
        $this->request = new Request();
        while ($pageNum < $this->pagesLimit) {
            $currentURL = str_replace('{page}', $pageNum, $URL);
            $pageNum++;
            $htmlpage = $this->request->make_request($currentURL);

            if (!$htmlpage) {
                // This is a sign that it was the last page.
                if ($this->request->lastHTTPCode == 404 ||
                    $this->request->lastHTTPCode == 301) {
                    echo 'All pages parsed.';
                    break;
                }
                if ($this->request->lastErrorCode) {
                    echo 'ERROR CODE: '.$this->request->lastErrorCode;

                    return;
                }
                if ($this->request->lastHTTPCode != 200) {
                    echo 'HTTP CODE: '.$this->request->lastHTTPCode;

                    return;
                }
            }
            $items = $this->parse_items_list($htmlpage);

            if (is_array($items)) {
                echo 'Parsed '.count($items).' items from page '.$pageNum."\n";
                /**
                 * Save everything in a single array.
                 */
                $resultItems = array_merge($resultItems, $items);
            } else {
                break;
            }
        }
        /**
         * Now we have array $resultItems with all items from search.
         * sorting by price.
         * price is array to sort.
         */
        foreach ($resultItems as $key => $row) {
            $price[$key] = $row['price_usd'];
        }

        $mediaSystem = app(MediaSystem::class);
        $obj = new \stdClass();
        $obj->new_path = 'parsers';
        $obj->folder = Folder::where('name', '')->where('disk', 'local')->first()->unique_id;
        $folder = $mediaSystem->makeFolder($obj, 'local');
        $filename = '\\'.date('Y-m-d').'-'.'-rozetka.csv';
        $filePath = public_path('uploads/parsers').$filename;

        if (!\File::exists($filePath)) {
            $writer = Writer::createFromPath($filePath, 'w+');
            //we insert the CSV header
            $writer->insertOne(['name', 'detail', 'link', 'image', 'price_uah', 'price_usd']);
        } else {
            $writer = Writer::createFromPath($filePath, 'w+');
        }

        // The PDOStatement Object implements the Traversable Interface
        // that's why Writer::insertAll can directly insert
        // the data into the CSV
        foreach ($resultItems as $item) {
            $writer->insertone($item);
        }
        // Because you are providing the filename you don't have to
        // set the HTTP headers Writer::output can
        // directly set them for you
        // The file is downloadable

//        $file = \Storage::disk('local')->url($filePath);

        $media = app(MediaUploader::class)->importPath('local', 'parsers/'.$filename);
        $media->directory_id = $folder->id;
        $media->save();

        if ($handler) {
            $handler($resultItems);
        }

        return !empty($media->filename) ? $media->filename : '';
    }

    /**
     * Converts an array into a single CSV line.
     *
     * @param array $array .
     *
     * @return string $csv_string.
     */
    public function array_to_csv($array)
    {
        $csv_arr = [];
        foreach ($array as $value) {
            $csv_arr[] = '"'.preg_replace('/"/', '""', $value).'"';
        }
        $csv_string = implode(',', $csv_arr);
        $csv_string .= "\r\n";

        return $csv_string;
    }

    /**
     * Using regular expressions to find and analyze needed fields.
     *
     * @param string $html Variable containing html code of current search results page.
     *
     * @return array $onPageItems is array of items per page.
     */
    protected function parse_items_list($html)
    {
        echo 'html dom: '."\n";
        $onPageItems = [];
        $currentItem = [];

        // Parse the document. $dom is a DOMDocument.
        $html5 = new HTML5();
        $dom = $html5->loadHTML($html);
        $finder = new \DOMXPath($dom);
        $classname = 'g-i-tile-i-box';
        $nodes = $finder->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $classname ')]");
        for ($i = $nodes->length - 1; $i > -1; $i--) {
            $nodeValue = $nodes->item($i);
            $titleClass = 'g-i-tile-i-title';
            $titleBlock = $finder->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $titleClass ')]");
            $currentItem['name'] = $titleBlock->item($i)->nodeValue;
            $detailClass = 'g-i-tile-short-detail';
            $detailBlock = $finder->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $detailClass ')]");
            $currentItem['detail'] = $detailBlock->item($i)->getElementsByTagName('li')->item(0)->nodeValue;

            $linkClass = 'g-i-tile-i-image';
            $linkBlock = $finder->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $linkClass ')]");
            $currentItem['link'] = $linkBlock->item($i)->getElementsByTagName('a')->item(0)->getAttributeNode('href')->nodeValue;

            $linkClass = 'g-i-tile-i-image';
            $linkBlock = $finder->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $linkClass ')]");
            $currentItem['image'] = $linkBlock->item($i)->getElementsByTagName('img')->item(0)->getAttributeNode('src')->nodeValue;

            $scriptClass = 'inline';
            $scriptBlock = $nodeValue->getElementsByTagName('script')->item(0)->nodeValue;

            preg_match('#var pricerawjson = (.*?);\s*$#m', $scriptBlock, $matches);

            if (empty($matches[1])) {
                $currentItem['price_uah'] = 0;
                $currentItem['price_usd'] = 0;
            } else {
                $priceUrl = urldecode($matches[1]);
                $priceObj = json_decode(substr($priceUrl, 1, -1));

                $currentItem['price_uah'] = !empty($priceObj->price) ? $priceObj->price : 0;
                $currentItem['price_usd'] = !empty($priceObj->usd_price) ? $priceObj->usd_price : 0;
            }
            // Collect items on page to $onPageItems.
            array_push($onPageItems, $currentItem);
        }

        return $onPageItems;
    }
}
