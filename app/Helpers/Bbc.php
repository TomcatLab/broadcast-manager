<?php

// Student.php

namespace App\Helpers;

use Mtownsend\XmlToArray\XmlToArray;

class Bbc
{
    public $xml;
    public $posts;
    public $base;
    public $status = [
        'code' => 200,
        'message' => 'ok'
    ];
    public $result;

    public function fetch($url = null)
    {
        $this->xml = $this->get($url);
        $this->posts = $this->structure($this->xml);
        $this->result = [
            'base' => $this->base,
            'posts' => $this->posts,
            'status' => $this->status
        ];
        return $this->result;
    }
    private function get($file = null)
    {
        $file_headers = @get_headers($file);
        if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
            $xml = null;
            $this->status = [
                'code' => 404,
                'message' => 'failed'
            ];
        }
        else {
            $xml = file_get_contents($file);
        }
        return $xml;
    } 
    private function structure($xml)
    {
        if($xml){
            $xml = XmlToArray::convert($xml);
            $posts = [];
            $base = [];
            $search = ['<![CDATA[',']]'];
            $replace = ['',''];
            foreach ($xml['channel']['item'] as $key => $item) {
                $posts[] = [
                    'title' => str_replace($search,$replace,$item['title']),
                    'description' => str_replace($search,$replace,$item['description']),
                    'link' => isset($item['guid']['@content']) ? $item['guid']['@content'] : null ,
                    'pub_date' => isset($item['pubDate']) ? $item['pubDate'] : null
                ];
            }
        }else{
            $posts = [];
        }
        
        return $posts;
    }
}