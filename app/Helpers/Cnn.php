<?php

// Student.php

namespace App\Helpers;

use Mtownsend\XmlToArray\XmlToArray;

class Cnn
{
    public $xml;
    public $posts;
    public $base;
    public $status = [
        'code' => 200,
        'message' => 'ok'
    ];
    public $result;
    public $medias;

    // 
    public $provider;
    public $category;
    public $pCategory;

    public function fetch($param_1 = null,
        $param_2 = null,
        $param_3 = null,
        $param_4 = null,
        $param_5 = null,
        $param_6 = null,
        $param_7 = null,
        $param_8 = null,
        $param_9 = null)
    {
        $this->provider = $param_2;
        $this->category = $param_3;
        $this->pCategory = $param_1;
        $this->xml = $this->get($param_4);
        $this->posts = $this->structure($this->xml);
        $this->result = [
            'base' => $this->base,
            'posts' => $this->posts,
            'status' => $this->status,
            'medias' => $this->medias
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
                if(isset($item['title'])){
                    $title = $item['title'] ? $item['title'] : null;
                    $description = isset($item['description']) ? $item['description'] : null;
                    $image_url = isset($item['media:group']['media:content'][0]['@attributes']['url']) ? $item['media:group']['media:content'][0]['@attributes']['url'] : null;
                    $image_width = isset($item['media:group']['media:content'][0]['@attributes']['width']) ? $item['media:group']['media:content'][0]['@attributes']['width'] : null;
                    $image_height = isset($item['media:group']['media:content'][0]['@attributes']['height']) ? $item['media:group']['media:content'][0]['@attributes']['height'] : null;

                    $post = [
                        'title' => $title,
                        'description' => $description,
                        'key' => $this->generateKey($title),
                        'ext_link' => $item['guid']['@content'] ? $item['guid']['@content'] : "",
                        'pub_date' => isset($item['pubDate']) ? $item['pubDate'] : null,
                        'image' => $image_url,
                        'width' => $image_width,
                        'height' => $image_height,
                        'provider' => $this->provider,
                        'category' => $this->category,
                        'p_category' => $this->pCategory,
                        'og' => $image_url ? 1 : 0,
                        'created_at' => now(),
                        'updated_at' => now()
                    ];
                    if($this->validatePost($post)){
                        $posts[$key] = $post;
                    }
                    // if(isset($item['media:group'])){
                    //     foreach ($item['media:group']['media:content'] as $content_value) {
                    //         $this->medias[$key][] = [
                    //             'url' => $content_value['@attributes']['url'],
                    //             'type' => 'image/jpeg',
                    //             'medium' => $content_value['@attributes']['medium'],
                    //             'height' => $content_value['@attributes']['height'],
                    //             'width' => $content_value['@attributes']['width']
                    //        ];
                    //     }
                    // }
                }
            }
        }else{
            $posts = [];
        }
        
        return $posts;
    }

    private function generateKey($key)
    {
        $search = [' ','  '];
        $replace = ['_','_'];
        $key = strtolower(str_replace($search,$replace,$key));
        return preg_replace('/[^A-Za-z0-9\-_]/', '', $key);
    }

    private function validatePost($post = null)
    {
        if($post){
            if($post['ext_link']){
                if(strpos($post['ext_link'], "cnn") !== false){
                    return true;
                }else{
                    return false;
                }    
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}