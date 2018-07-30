<?php
/**
 * Created by PhpStorm.
 * User: Vishwa Priyanatha
 * Date: 7/20/2018
 * Time: 4:56 PM
 */

class Curl
{
    public function __construct()
    {
    }

    /**
     * @param $url
     * @param $post_array
     * @return mixed
     * POST using cURL
     */
    function logging($url, $post_data)
    {
        (function_exists('curl_init')) ? '' : die('cURL Must be installed for geturl function to work. Ask your host to enable it or uncomment extension=php_curl.dll in php.ini');
        $ch = curl_init();

        //send url
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);

        //post data
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);

        //create cookie file
        curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/../cookie/cookie.txt');

        //header value
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($post_data),
            )
        );

        $postResult = curl_exec($ch);

        if (curl_errno($ch)) {
            print curl_error($ch);
        }
        curl_close($ch);
        return $postResult;
    }

    /**
     * @param $url
     * @param null $header
     * GET using cURL
     */
    function getData($url)
    {
        (function_exists('curl_init')) ? '' : die('cURL Must be installed for geturl function to work. Ask your host to enable it or uncomment extension=php_curl.dll in php.ini');

//cookie path
        $cookie_file = dirname(__FILE__) . '/../cookie/cookie.txt';


//check cookie file is exists
        if (!file_exists($cookie_file)) {
            return null;
        }

        $c = curl_init($url);

        //send cookies
        curl_setopt ($c, CURLOPT_COOKIEFILE, $cookie_file);
        curl_setopt ($c, CURLOPT_RETURNTRANSFER, true);

        $page = curl_exec($c);
        if (curl_errno($c)) {
            print curl_error($c);
        }
        curl_close($c);
        return $page;


    }

function postData($url, $post_data)
{
    (function_exists('curl_init')) ? '' : die('cURL Must be installed for geturl function to work. Ask your host to enable it or uncomment extension=php_curl.dll in php.ini');
        
        //get cookie path
        $cookie_file = dirname(__FILE__) . '/../cookie/cookie.txt';

        //check cookie file is exists
        if (!file_exists($cookie_file)) {
            return null;
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);

        //send data
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        //send cookies
        curl_setopt ($c, CURLOPT_COOKIEFILE, $cookie_file);
        curl_setopt ($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($post_data),
            )
        );

        $postResult = curl_exec($ch);

        if (curl_errno($ch)) {
            print curl_error($ch);
        }
        curl_close($ch);
        return $postResult;
}
}