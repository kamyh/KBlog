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

        //**********************************************************//
        DB::table('posts')->insert([
            'user_id' => 1,
            'title' => 'piscatorios',
            'sub_title' => 'magnitudine angusti gurgitis',
            'preview' => 'Exsistit autem hoc loco quaedam quaestio subdifficilis, num quando amici novi, digni amicitia, veteribus sint anteponendi, ut equis vetulis teneros anteponere solemus. Indigna homine dubitatio! Non enim debent esse amicitiarum sicut aliarum rerum satietates; veterrima quaeque, ut ea vina, quae vetustatem ferunt, esse debet suavissima; verumque illud est, quod dicitur, multos modios salis simul edendos esse, ut amicitiae munus expletum sit.',
            'content' => '<p>Alii summum decus in carruchis solito altioribus et ambitioso vestium cultu ponentes sudant sub ponderibus lacernarum, quas in collis insertas cingulis ipsis adnectunt nimia subtegminum tenuitate perflabiles, expandentes eas crebris agitationibus maximeque sinistra, ut longiores fimbriae tunicaeque perspicue luceant varietate liciorum effigiatae in species animalium multiformes.</p><p>Quam ob rem circumspecta cautela observatum est deinceps et cum edita montium petere coeperint grassatores, loci iniquitati milites cedunt. ubi autem in planitie potuerint reperiri, quod contingit adsidue, nec exsertare lacertos nec crispare permissi tela, quae vehunt bina vel terna, pecudum ritu inertium trucidantur.</p>',
            'published' => 1,
            'lang' => 'en',
            'img_path' => '15946.jpg',
        ]);

        DB::table('categories')->insert([
            'post_id' => 3,
            'name' => 'autem',
        ]);

        DB::table('comments')->insert([
            'post_id' => 3,
            'name' => 'clausis',
            'text' => 'clausis organa fabricantur hydraulica, et lyrae ad speciem carpentorum ingentes tibiaeque et histrionici gestus instrumenta non levia.',
            'website' => 'fabricantur.com',
        ]);

        DB::table('comments')->insert([
            'post_id' => 3,
            'name' => 'resultantes',
            'text' => 'resultantes. denique pro philosopho cantor et in locum oratoris doctor artium ludicrarum accitur et bybliothecis sepulcrorum ritu in perpetuum',
            'website' => 'denique.com',
        ]);

        DB::table('comments')->insert([
            'post_id' => 3,
            'name' => 'numeremus',
            'text' => 'numeremus, Paulos, Catones, Galos, Scipiones, Philos; his communis vita contenta est; eos autem omittamus, qui omnino nusquam reperiuntur.',
            'website' => 'Catones.com',
        ]);

        DB::table('sub_comments')->insert([
            'comment_id_from' => 1,
            'comment_id_sub' => 2,
        ]);

        //**********************************************************//
        DB::table('posts')->insert([
            'user_id' => 1,
            'title' => 'nunc',
            'sub_title' => 'aliquem bene nummatum',
            'preview' => 'At nunc si ad aliquem bene nummatum tumentemque ideo honestus advena salutatum introieris, primitus tamquam exoptatus suscipieris et interrogatus multa coactusque mentiri, miraberis numquam antea visus summatem virum tenuem te sic enixius observantem, ut paeniteat ob haec bona tamquam praecipua non vidisse ante decennium Romam.',
            'content' => '<p>Paphius quin etiam et Cornelius senatores, ambo venenorum artibus pravis se polluisse confessi, eodem pronuntiante Maximino sunt interfecti. pari sorte etiam procurator monetae extinctus est. Sericum enim et Asbolium supra dictos, quoniam cum hortaretur passim nominare, quos vellent, adiecta religione firmarat, nullum igni vel ferro se puniri iussurum, plumbi validis ictibus interemit. et post hoe flammis Campensem aruspicem dedit, in negotio eius nullo sacramento constrictus.</p><p>Quam ob rem circumspecta cautela observatum est deinceps et cum edita montium petere coeperint grassatores, loci iniquitati milites cedunt. ubi autem in planitie potuerint reperiri, quod contingit adsidue, nec exsertare lacertos nec crispare permissi tela, quae vehunt bina vel terna, pecudum ritu inertium trucidantur.</p>',
            'published' => 1,
            'lang' => 'en',
            'img_path' => '36596.jpg',
        ]);

        DB::table('categories')->insert([
            'post_id' => 4,
            'name' => 'paeniteat',
        ]);

        DB::table('comments')->insert([
            'post_id' => 4,
            'name' => 'observantem',
            'text' => 'observantem, ut paeniteat ob haec bona tamquam praecipua non vidisse ante decennium Romam.',
            'website' => 'fabricantur.com',
        ]);

        DB::table('comments')->insert([
            'post_id' => 4,
            'name' => 'tamquam',
            'text' => 'tamquam exoptatus suscipieris et interrogatus multa coactusque mentiri, miraberis numquam antea visus summatem virum tenuem te sic enixius',
            'website' => 'suscipieris.com',
        ]);

        DB::table('comments')->insert([
            'post_id' => 4,
            'name' => 'nunc',
            'text' => 'At nunc si ad aliquem bene nummatum tumentemque ideo honestus advena salutatum introieris, primitus',
            'website' => 'aliquem.com',
        ]);

        DB::table('sub_comments')->insert([
            'comment_id_from' => 1,
            'comment_id_sub' => 2,
        ]);

        //**********************************************************//
        DB::table('posts')->insert([
            'user_id' => 1,
            'title' => 'tractibus',
            'sub_title' => 'dicta finierat, multitudo omnis ad',
            'preview' => 'Mox dicta finierat, multitudo omnis ad, quae imperator voluit, promptior laudato consilio consensit in pacem ea ratione maxime percita, quod norat expeditionibus crebris fortunam eius in malis tantum civilibus vigilasse, cum autem bella moverentur externa, accidisse plerumque luctuosa, icto post haec foedere gentium ritu perfectaque sollemnitate imperator Mediolanum ad hiberna discessit.',
            'content' => '<p>In his tractibus navigerum nusquam visitur flumen sed in locis plurimis aquae suapte natura calentes emergunt ad usus aptae multiplicium medelarum. verum has quoque regiones pari sorte Pompeius Iudaeis domitis et Hierosolymis captis in provinciae speciem delata iuris dictione formavit.</p><p>Quam ob rem circumspecta cautela observatum est deinceps et cum edita montium petere coeperint grassatores, loci iniquitati milites cedunt. ubi autem in planitie potuerint reperiri, quod contingit adsidue, nec exsertare lacertos nec crispare permissi tela, quae vehunt bina vel terna, pecudum ritu inertium trucidantur.</p>',
            'published' => 1,
            'lang' => 'fr',
            'img_path' => '55883.jpg',
        ]);

        DB::table('categories')->insert([
            'post_id' => 5,
            'name' => 'omnis',
        ]);

        DB::table('comments')->insert([
            'post_id' => 5,
            'name' => 'delatus',
            'text' => 'delatus aut postulatus, capite vel multatione bonorum aut insulari solitudine damnabatur.',
            'website' => 'postulatus.com',
        ]);

        DB::table('comments')->insert([
            'post_id' => 5,
            'name' => 'partes',
            'text' => 'fovisse partes hostiles, iniecto onere catenarum in modum beluae trahebatur et inimico urgente vel nullo, quasi sufficiente hoc solo, quod nominatus esset aut',
            'website' => 'fovisse.com',
        ]);

        DB::table('comments')->insert([
            'post_id' => 5,
            'name' => 'enim',
            'text' => 'Siquis enim militarium vel honoratorum aut nobilis inter suos rumore tenus esset insimulatus',
            'website' => 'Siquis.com',
        ]);

        DB::table('sub_comments')->insert([
            'comment_id_from' => 1,
            'comment_id_sub' => 2,
        ]);

        //**********************************************************//
        DB::table('posts')->insert([
            'user_id' => 1,
            'title' => 'penetrali',
            'sub_title' => 'interdum acciderat',
            'preview' => 'Et interdum acciderat, ut siquid in penetrali secreto nullo citerioris vitae ministro praesente paterfamilias uxori susurrasset in aurem, velut Amphiarao referente aut Marcio, quondam vatibus inclitis, postridie disceret imperator. ideoque etiam parietes arcanorum soli conscii timebantur.',
            'content' => '<p>Et quia Montius inter dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat, qui sint hi magna quaerebatur industria, et nequid intepesceret, Epigonus e Lycia philosophus ducitur et Eusebius ab Emissa Pittacas cognomento, concitatus orator, cum quaestor non hos sed tribunos fabricarum insimulasset promittentes armorum si novas res agitari conperissent.</p><p>Latius iam disseminata licentia onerosus bonis omnibus Caesar nullum post haec adhibens modum orientis latera cuncta vexabat nec honoratis parcens nec urbium primatibus nec plebeiis.</p>',
            'published' => 1,
            'lang' => 'fr',
            'img_path' => '55885.jpg',
        ]);

        DB::table('categories')->insert([
            'post_id' => 6,
            'name' => 'Montius',
        ]);

        DB::table('comments')->insert([
            'post_id' => 6,
            'name' => 'Constantinopolim',
            'text' => 'Constantinopolim petit exindeque per protectores retractus artissime tenebatur.',
            'website' => 'exindeque.com',
        ]);

        DB::table('comments')->insert([
            'post_id' => 6,
            'name' => 'Caesaris',
            'text' => 'Caesaris curam, ad Mesopotamiam missus a socero per militares numeros immodice scrutabatur, an quaedam altiora meditantis iam Galli secreta susceperint scripta, qui conpertis Antiochiae gestis per minorem Armeniam lapsu',
            'website' => 'Mesopotamiam.com',
        ]);

        DB::table('comments')->insert([
            'post_id' => 6,
            'name' => 'vero',
            'text' => 'Nunc vero inanes flatus quorundam vile esse quicquid extra urbis ',
            'website' => 'flatus.com',
        ]);

        DB::table('sub_comments')->insert([
            'comment_id_from' => 1,
            'comment_id_sub' => 2,
        ]);

        //**********************************************************//
        DB::table('posts')->insert([
            'user_id' => 1,
            'title' => 'quam',
            'sub_title' => 'prima post Osdroenam quam',
            'preview' => 'Et prima post Osdroenam quam, ut dictum est, ab hac descriptione discrevimus, Commagena, nunc Euphratensis, clementer adsurgit, Hierapoli, vetere Nino et Samosata civitatibus amplis inlustris.',
            'content' => '<p>Iamque lituis cladium concrepantibus internarum non celate ut antea turbidum saeviebat ingenium a veri consideratione detortum et nullo inpositorum vel conpositorum fidem sollemniter inquirente nec discernente a societate noxiorum insontes velut exturbatum e iudiciis fas omne discessit, et causarum legitima silente defensione carnifex rapinarum sequester et obductio capitum et bonorum ubique multatio versabatur per orientales provincias, quas recensere puto nunc oportunum absque Mesopotamia digesta, cum bella Parthica dicerentur, et Aegypto, quam necessario aliud reieci ad tempus.</p><p>Latius iam disseminata licentia onerosus bonis omnibus Caesar nullum post haec adhibens modum orientis latera cuncta vexabat nec honoratis parcens nec urbium primatibus nec plebeiis.</p>',
            'published' => 1,
            'lang' => 'fr',
            'img_path' => '78467.jpg',
        ]);

        DB::table('categories')->insert([
            'post_id' => 7,
            'name' => 'cladium',
        ]);

        DB::table('comments')->insert([
            'post_id' => 7,
            'name' => 'dicerentur',
            'text' => 'Parthica dicerentur, et Aegypto, quam necessario aliud reieci ad tempus.',
            'website' => 'Aegypto.com',
        ]);

        DB::table('comments')->insert([
            'post_id' => 7,
            'name' => 'recensere',
            'text' => 'quas recensere puto nunc oportunum absque Mesopotamia digesta, cum bella',
            'website' => 'puto.com',
        ]);

        DB::table('comments')->insert([
            'post_id' => 7,
            'name' => 'silente',
            'text' => 'causarum legitima silente defensione carnifex rapinarum sequester et obductio capitum et bonorum ubique multatio versabatur per orientales provincia',
            'website' => 'rapinarum.com',
        ]);

        DB::table('sub_comments')->insert([
            'comment_id_from' => 1,
            'comment_id_sub' => 2,
        ]);

        //**********************************************************//
        DB::table('posts')->insert([
            'user_id' => 1,
            'title' => 'prima',
            'sub_title' => 'prima post Osdroenam quam',
            'preview' => 'Quanta autem vis amicitiae sit, ex hoc intellegi maxime potest, quod ex infinita societate generis humani, quam conciliavit ipsa natura, ita contracta res est et adducta in angustum ut omnis caritas aut inter duos aut inter paucos iungeretur.',
            'content' => '<p>Quare hoc quidem praeceptum, cuiuscumque est, ad tollendam amicitiam valet; illud potius praecipiendum fuit, ut eam diligentiam adhiberemus in amicitiis comparandis, ut ne quando amare inciperemus eum, quem aliquando odisse possemus. Quin etiam si minus felices in diligendo fuissemus, ferendum id Scipio potius quam inimicitiarum tempus cogitandum putabat.</p><p>Latius iam disseminata licentia onerosus bonis omnibus Caesar nullum post haec adhibens modum orientis latera cuncta vexabat nec honoratis parcens nec urbium primatibus nec plebeiis.</p>',
            'published' => 1,
            'lang' => 'fr',
            'img_path' => '86596.jpg',
        ]);

        DB::table('categories')->insert([
            'post_id' => 8,
            'name' => 'cladium',
        ]);

        DB::table('comments')->insert([
            'post_id' => 7,
            'name' => 'angustum',
            'text' => 'adducta in angustum ut omnis caritas aut inter duos aut inter paucos iungeretu',
            'website' => 'omnis.com',
        ]);

        DB::table('comments')->insert([
            'post_id' => 8,
            'name' => 'Quanta',
            'text' => 'Quanta autem vis amicitiae sit, ex hoc intellegi maxime potest, quod ex infinita societate generis humani, quam conciliavit ipsa natura, ita contracta res est',
            'website' => 'autem.com',
        ]);

        DB::table('comments')->insert([
            'post_id' => 8,
            'name' => 'Laelius',
            'text' => 'Laelius, cuius tota disputatio est de amicitia, quam legens te ipse cognosces.',
            'website' => 'cuius.com',
        ]);

        DB::table('sub_comments')->insert([
            'comment_id_from' => 2,
            'comment_id_sub' => 3,
        ]);
    }

}
