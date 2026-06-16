<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredHotels = Hotel::orderBy('rating', 'desc')->take(3)->get();
        $featuredDrivers = Driver::where('status', 'available')->orderBy('rating', 'desc')->take(3)->get();

        $landmarks = [
            [
                'name' => 'قلعة صيرة',
                'description' => 'حصن دفاعي تاريخي يقع على جزيرة صيرة البركانية، يطل على ميناء عدن القديم ويشهد على صمود المدينة عبر العصور.',
                'image' => 'images/landmarks/sira.png',
            ],
            [
                'name' => 'صهاريج عدن',
                'description' => 'صهاريج الطويلة التاريخية المنحوتة في الصخر تحت هضبة عدن، وهي تحفة هندسية قديمة لتجميع مياه الأمطار وحماية المدينة.',
                'image' => 'images/landmarks/cisterns.png',
            ],
            [
                'name' => 'منارة عدن',
                'description' => 'منارة تاريخية يرجح أنها مئذنة لجامع قديم اندثر، وتعد من أبرز المعالم الأثرية لمدينة عدن في كريتر.',
                'image' => 'images/landmarks/lighthouse.png',
            ],
            [
                'name' => 'ساحل أبين وجولدموهور',
                'description' => 'شواطئ رملية ساحرة تمتاز بمياهها الفيروزية وجبالها البركانية المحيطة، وتعتبر المتنفس الرئيسي للعائلات والزوار.',
                'image' => 'images/landmarks/coast.png',
            ]
        ];

        return view('home', compact('featuredHotels', 'featuredDrivers', 'landmarks'));
    }
}
