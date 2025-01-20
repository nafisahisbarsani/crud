<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ContactController extends Controller
{
    public function index(){
        return view('Contact', [
            'title' => "Contact",
            'nama' => "Nafisah",
            'alamat' => "NTB",
            'akunGithub' => "https://github.com/nafisahisbarsani",
            'akunLinkedin' => "https://www.linkedin.com/in/nafisah-isbarsani-27638a298/",
    ]);
    }
}
