<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //TODO seed more en/fr
        Model::unguard();

        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10) . '@gmail.com',
            'password' => bcrypt('secret'),
        ]);

        DB::table('posts')->insert([
            'user_id' => 1,
            'title' => 'Haec',
            'sub_title' => 'caeli reserato tepore',
            'preview' => 'Haec dum oriens diu perferret, caeli reserato tepore Constantius consulatu suo septies et Caesaris ter egressus Arelate Valentiam petit, in Gundomadum et Vadomarium fratres Alamannorum reges arma moturus, quorum crebris excursibus vastabantur confines limitibus terrae Gallorum.',
            'content' => '<p>Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem oppressi. praediximus enim Montium sub ipso vivendi termino his vocabulis appellatos fabricarum culpasse tribunos ut adminicula futurae molitioni pollicitos.</p>',
            'published' => 1,
            'lang' => 'en',
            'img_path' => '86597.jpg',
        ]);

        DB::table('categories')->insert([
            'post_id' => 1,
            'name' => 'statuuntur',
        ]);
    }

}
