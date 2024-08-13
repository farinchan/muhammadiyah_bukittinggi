<?php

namespace Database\Seeders;

use App\Models\Kajian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KajianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kajian::create([
            'title' => 'Azab yang Menimpa Orang yang tidak membayar hutang',
            'content' => 'Dari Abu Hurairah radhiyallahu anhu, Rasulullah shallallahu alaihi wa sallam bersabda, “Tidaklah seorang muslim meninggal dunia, sedang dia memiliki hutang yang wajib dibayar, kecuali Allah menghalanginya dari masuk surga.” (HR. Muslim no. 1599).',
            'tags' => 'hutang, azab, surga',
            'slug' => 'azab-yang-menimpa-orang-yang-tidak-membayar-hutang',
            'thumbnail' => 'kajian/example.png',
            'status' => 'published',
            'meta_title' => 'Azab yang Menimpa Orang yang tidak membayar hutang',
            'meta_description' => 'Dari Abu Hurairah radhiyallahu anhu, Rasulullah shallallahu alaihi wa sallam bersabda, “Tidaklah seorang muslim meninggal dunia, sedang dia memiliki hutang yang wajib dibayar, kecuali Allah menghalanginya dari masuk surga.”',
            'meta_keywords' => 'hutang, azab, surga',
            'user_id' => 1,
        ]);

        Kajian::create([
            'title' => 'Begini Cara Rasulullah Menyikapi Orang yang Berbuat Dzalim',
            'content' => 'Dari Abu Hurairah radhiyallahu anhu, Rasulullah shallallahu alaihi wa sallam bersabda, “Janganlah kalian membantu seseorang dalam berbuat dzalim dan janganlah kalian membantu seseorang dalam berbuat maksiat. Jika kalian melihat orang yang berbuat dzalim, maka tolonglah dia.”',
            'tags' => 'dzalim, maksiat, tolong',
            'slug' => 'begini-cara-rasulullah-menyikapi-orang-yang-berbuat-dzalim',
            'thumbnail' => 'kajian/example.png',
            'status' => 'published',
            'meta_title' => 'Begini Cara Rasulullah Menyikapi Orang yang Berbuat Dzalim',
            'meta_description' => 'Dari Abu Hurairah radhiyallahu anhu, Rasulullah shallallahu alaihi wa sallam bersabda, “Janganlah kalian membantu seseorang dalam berbuat dzalim dan janganlah kalian membantu seseorang dalam berbuat maksiat. Jika kalian melihat orang yang berbuat dzalim, maka tolonglah dia.”',
            'meta_keywords' => 'dzalim, maksiat, tolong',
            'user_id' => 1,
        ]);
    }
}
