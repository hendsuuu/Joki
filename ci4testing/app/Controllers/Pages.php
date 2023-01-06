<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | Webcodeigniter4',
            'tes' => ['satu','dua','tiga']
        ];
        
        return view('pages/home',$data);
        
    }
    public function about()
    {
        $data = [
            'title' => 'About Me!'
        ];
        
        return view('pages/about',$data);
       
    }
    public function contact()
    {
        $data = [
            'title' => 'Contact us',
            'alamat'=> [
                [
                    'tipe'=>'rumah',
                    'kota' => 'semarang'
                ],
                [
                    'tipe'=>'kos',
                    'kota'=>'pati'
                ]
            ]

        ];
        return view('pages/contact',$data);
        
    }
}
