<?php

namespace App\Service;

use App\Entity\Champion;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader
{

    private $championFolder;

    // public function __construct($championFolder)
    // {
    //     $this->championFolder = $championFolder;
    // }

    /**
     * Et la j'ai la meme fonctionnalité dédiée à un cas particulier
     *
     * @param UploadedFile|null $image on autorise le null si jamais aucune image n'a été fournie
     * @return string|null
     */
    function moveImage(?UploadedFile $image, $prefix = ''): ?string
    {
        $newFilename = null;

        if ($image !== null) {
            // on a décidé d'appeler notre fichier
            $newFilename = $prefix . uniqid() . '.' . $image->guessExtension();

            // Move the file to the directory where brochures are stored
            $image->move(
                $newFilename
            );
        }
        return $newFilename;
    }

    function movechampionImage(?UploadedFile $image, champion $champion)
    {
        $imageName = $this->moveImage($image, $this->championFolder, 'champion-');
        if ($imageName !== null) {
            $champion->setImage($imageName);
        }
    }

}