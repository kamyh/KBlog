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
        Model::unguard();

        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10) . '@gmail.com',
            'password' => bcrypt('secret'),
        ]);

        //**********************************************************//
        DB::table('posts')->insert([
            'user_id' => 1,
            'title' => 'Haec',
            'sub_title' => 'caeli reserato tepore',
            'preview' => 'Haec dum oriens diu perferret, caeli reserato tepore Constantius consulatu suo septies et Caesaris ter egressus Arelate Valentiam petit, in Gundomadum et Vadomarium fratres Alamannorum reges arma moturus, quorum crebris excursibus vastabantur confines limitibus terrae Gallorum.',
            'content' => '<p>Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem oppressi. praediximus enim Montium sub ipso vivendi termino his vocabulis appellatos fabricarum culpasse tribunos ut adminicula futurae molitioni pollicitos.</p>',
            'published' => 1,
            'lang' => 'en',
            'img_path' => '15468.jpg',
        ]);

        DB::table('categories')->insert([
            'post_id' => 1,
            'name' => 'statuuntur',
        ]);

        DB::table('comments')->insert([
            'post_id' => 1,
            'name' => 'reserato',
            'text' => 'Gallum, quem crebro acciverat, ad Italiam properare blande hortaretur et verecunde.',
            'website' => 'acciverat.com',
        ]);

        DB::table('comments')->insert([
            'post_id' => 1,
            'name' => 'subinde',
            'text' => 'Haec subinde Constantius audiens et quaedam referente Thalassio doctus, quem eum odisse iam conpererat lege communi, scribens ad Caesarem blandius adiumenta paulatim illi subtraxit',
            'website' => 'audiens.com',
        ]);

        DB::table('comments')->insert([
            'post_id' => 1,
            'name' => 'simulans',
            'text' => 'sollicitari se simulans ne, uti est militare otium fere tumultuosum, in eius perniciem conspiraret, solisque scholis iussit esse contentum palatinis et protectorum cum ',
            'website' => 'tumultuosum.com',
        ]);

        DB::table('sub_comments')->insert([
            'comment_id_from' => 1,
            'comment_id_sub' => 3,
        ]);

        //**********************************************************//
        DB::table('posts')->insert([
            'user_id' => 1,
            'title' => 'piscatorios',
            'sub_title' => 'magnitudine angusti gurgitis',
            'preview' => 'Nam sole orto magnitudine angusti gurgitis sed profundi a transitu arcebantur et dum piscatorios quaerunt lenunculos vel innare temere contextis cratibus parant, effusae legiones, quae hiemabant tunc apud Siden, isdem impetu occurrere veloci. et signis prope ripam locatis ad manus comminus conserendas denseta scutorum conpage semet scientissime praestruebant, ausos quoque aliquos fiducia nandi vel cavatis arborum truncis amnem permeare latenter facillime trucidarunt.',
            'content' => '<p>Sed ut tum ad senem senex de senectute, sic hoc libro ad amicum amicissimus scripsi de amicitia. Tum est Cato locutus, quo erat nemo fere senior temporibus illis, nemo prudentior; nunc Laelius et sapiens (sic enim est habitus) et amicitiae gloria excellens de amicitia loquetur. Tu velim a me animum parumper avertas, Laelium loqui ipsum putes. C. Fannius et Q. Mucius ad socerum veniunt post mortem Africani; ab his sermo oritur, respondet Laelius, cuius tota disputatio est de amicitia, quam legens te ipse cognosces.</p><p>Sed ut tum ad senem senex de senectute, sic hoc libro ad amicum amicissimus scripsi de amicitia. Tum est Cato locutus, quo erat nemo fere senior temporibus illis, nemo prudentior; nunc Laelius et sapiens (sic enim est habitus) et amicitiae gloria excellens de amicitia loquetur. Tu velim a me animum parumper avertas, Laelium loqui ipsum putes. C. Fannius et Q. Mucius ad socerum veniunt post mortem Africani; ab his sermo oritur, respondet Laelius, cuius tota disputatio est de amicitia, quam legens te ipse cognosces.</p>',
            'published' => 1,
            'lang' => 'en',
            'img_path' => '15486.jpg',
        ]);

        DB::table('categories')->insert([
            'post_id' => 2,
            'name' => 'orto',
        ]);

        DB::table('comments')->insert([
            'post_id' => 2,
            'name' => 'mihi',
            'text' => 'Ardeo, mihi credite, Patres conscripti (id quod vosmet de me existimatis et facitis ipsi)',
            'website' => 'Patres.com',
        ]);

        DB::table('comments')->insert([
            'post_id' => 2,
            'name' => 'atque',
            'text' => 'atque excipere unum pro universis. Hic me meus in rem publicam animus pristinus ac perennis cum C. Caesare reducit, reconciliat, restituit in gratiam.',
            'website' => 'unum.com',
        ]);

        DB::table('comments')->insert([
            'post_id' => 2,
            'name' => 'Alexandri',
            'text' => 'cum post Alexandri Macedonis obitum successorio iure teneret regna Persidis, efficaciae inpetrabilis rex, ut indicat cognomentum.',
            'website' => 'obitum.com',
        ]);

        DB::table('sub_comments')->insert([
            'comment_id_from' => 1,
            'comment_id_sub' => 2,
        ]);
    }

}
