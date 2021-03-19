<?php

namespace App\Form\Step;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints as Assert;

class StepThreeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('favoriteChampion',ChoiceType::class,[
            'label' => 'Vos champions favoris *',
            'constraints' => [
                new NotBlank(['message'=> 'Vous devez indiquer quel sont vos champions favoris.']),
                new Assert\Count([
                    'min' => 1,
                    'max' => 3,
                    'minMessage' => 'Vous devez indiquer au minimum 1 champion',
                    'maxMessage' => 'Vous devez indiquer au maximum 3 champions'
                ])
            ],
            
            'multiple' => true,
            'expanded' => true,
            'choices' => [
                'aatrox'=>"aatrox",'ahri'=>"ahri",'akali'=>"akali",'alistar' =>"alistar",'amumus'=>"amumu",'anivia'=>"anivia",'annie'=>"annie",'aphelios'=>"aphelios",'ashe'=>"ashe",'aurelion Sol'=>"aurelion Sol",'azir'=>"azir",

                'bard'=>"bard",'blitzcrank'=>"blitzcrank",'brand'=>"brand",'braum'=>"braum",

                'caitlyn'=>"caitlyn",'camille'=>"camille",'cassiopeia'=>"cassiopeia",'cho\'Gath'=>"cho'Gath",'corki'=>"corki",
                
                'darius'=>"darius",'diana'=>"diana",'dr mundo'=>"dr mundo",'draven'=>"draven",

                'ekko'=>"ekko",'elise'=>"elise",'evelynn'=>"evelynn",'ezreal'=>"ezreal",

                'fiddlesticks'=>"fiddlesticks",'fiora'=>"fiora",'fizz'=>"fizz",

                'galio'=>"galio",'gangplank'=>"gangplank",'garen'=>"garen",'gnar'=>"gnar",'gragas'=>"gragas",'graves'=>"graves",

                'hecarim'=>"hecarim",'heimerdinger'=>"heimerdinger",

                'illaoi'=>"illaoi",'irelia'=>"irelia",'ivern'=>"ivern",

                'janna'=>"janna",'jarvan iV'=>"jarvan iV",'jax'=>"jax",'jayce'=>"jayce",'jhin'=>"jhin",'jinx'=>"jinx",

                'kai\'Sa'=>"kai'Sa",'kalista'=>"kalista",'karma'=>"karma",'karthus'=>"karthus",'kassadin'=>"kassadin",'katarina'=>"katarina",'kayle'=>"kayle",'kayn'=>"kayn",'kennen'=>"kennen",'kha\'Zix'=>"kha'Zix",'kindred'=>"kindred",'kled'=>"kled",'kog\'Maw'=>"kog'Maw",

                'leBlanc'=>"leBlanc",'lee sin'=>"lee sin",'leona'=>"leona",'lillia'=>"lillia",'lissandra'=>"lissandra",'lucian'=>"lucian",'lulu'=>"lulu",'lux'=>"lux",

                'malphite'=>"malphite",'malzahar'=>"malzahar",'maokai'=>"maokai",'maître yi'=>"maître yi",'miss Fortune'=>"miss Fortune",'Mordekaiser'=>"Mordekaiser",'Morgana'=>"Morgana",

                'nami'=>"nami",'nasus'=>"nasus",'nautilus'=>"nautilus",'neeko'=>"neeko",'nidalee'=>"nidalee",'nocturne'=>"nocturne",'nunu & willump'=>'nunu & willump',

                'olaf'=>"olaf",'orianna'=>"orianna",'ornn'=>"ornn",

                'pantheon'=>"pantheon",'poppy'=>"poppy",'pyke'=>"pyke",

                'qiyana'=>"qiyana",'quinn'=>"quinn",

                'rakan'=>"rakan",'rammus'=>"rammus",'rek\'Sai'=>"rek'Sai",'rell'=>"rell",'renekton'=>"renekton",'rengar'=>"rengar",'riven'=>"riven",'rumble'=>"rumble",'ryze'=>"ryze",

                'samira'=>"samira",'sejuani'=>"sejuani",'senna'=>"senna",'sett'=>"sett",'shaco'=>"shaco",'shen'=>"shen",'shyvana'=>"shyvana",'singed'=>"singed",'sion'=>"sion",'sivir'=>"sivir",'skarner'=>"skarner",'sona'=>"sona",'soraka'=>"soraka",'swain'=>"swain",'sylas'=>"sylas",'syndra'=>"syndra",'séraphine'=>"séraphine",

                'tahm kench'=>"tahm kench",'taliyah'=>"taliyah",'talon'=>"talon",'taric'=>"taric",'teemo'=>"teemo",'thresh'=>"thresh",'tristana'=>"tristana",'trundle'=>"trundle",'tryndamere'=>"tryndamere",'twisted fate'=>"twisted fate",'twitch'=>"twitch",

                'udyr'=>"udyr",'urgot'=>"urgot",

                'varus'=>"varus",'vayne'=>"vayne",'veigar'=>"veigar",'vel\'Koz'=>"vel'Koz",'vi'=>"vi",'viego'=>"viego",'viktor'=>"viktor",'vladimir'=>"vladimir",'volibear'=>"volibear",

                'warwick'=>"warwick",'wukong'=>"wukong",

                'xayah'=>"xayah",'xerath'=>"xerath",'xin zhao'=>"xin zhao",

                'yasuo'=>"yasuo",'yone'=>"yone",'yorick'=>"yorick",'yuumi'=>"yuumi",

                'zac'=>"zac",'zed'=>"zed",'ziggs'=>"ziggs",'zilean'=>"zilean",'zoé'=>"zoé",'zyra'=>"zyra"

            ]
         ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
