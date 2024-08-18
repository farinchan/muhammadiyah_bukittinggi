<?php

namespace Database\Seeders;

use App\Models\Kajian;
use App\Models\KajianComment;
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
            'user_id' => 2,
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
            'user_id' => 2,
        ]);

        for ($i = 1; $i <= 10; $i++) {
            Kajian::create([
                'title' => 'Data Dummy Kajian ke-'.$i . 'yang dibuat oleh faker',
                'content' => 'Data Dummy Kajian ke-'.$i . 'yang dibuat oleh faker',
                'tags' => 'dummy',
                'slug' => 'data-dummy-kajian-ke-'.$i . '-yang-dibuat-oleh-faker',
                'thumbnail' => 'kajian/example.png',
                'status' => 'published',
                'meta_title' => 'Data Dummy Kajian ke-'.$i . 'yang dibuat oleh faker',
                'meta_description' => 'Data Dummy Kajian ke-'.$i . 'yang dibuat oleh faker',
                'meta_keywords' => 'dummy',
                'user_id' => 2,
            ]);
        }


        KajianComment::create([
            'kajian_id' => 1,
            'name' => 'Umar',
            'email' => 'umar@example.com',
            'comment' => 'Alhamdulillah, artikel yang sangat bermanfaat.',
            'status' => 'approved',
        ]);

    }
}
