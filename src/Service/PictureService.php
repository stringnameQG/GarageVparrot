<?php

namespace App\Service;

use Exception;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class PictureService
{
    private $params;

    public function __construct(ParameterBagInterface $params)
    {
        $this->params = $params;
    }

    public function add(UploadedFile $picture, ?string $folder ='')
    {
        // stocker au format mp
        $fichier = md5(uniqid(rand(), true)) . '.webp';

        // On récupère les infos de l'image
        $pitctureInfos = getimagesize($picture);

        if($pitctureInfos === false){
            throw new Exception('Format d\'image incorrect');
        }

        // On vérifie le format de l'image
        switch($pitctureInfos['mime']){
            case 'image/png':
                $pictureSource = imagecreatefrompng($picture);
                break;
            case 'image/jpeg':
                $pictureSource = imagecreatefromjpeg($picture);
                break;
            case 'image/webp':
                $pictureSource = imagecreatefromwebp($picture);
                break;
            default:
                throw new Exception('Format d\'image incorrect');
        }      

        $path = $this->params->get('images_directory') . $folder;

        // On stocke l'image recadré
        imagewebp($pictureSource, $path . $fichier);

        return $fichier;
    }

    public function delete(string $fichier, ?string $folder = '', ?int
    $width = 1130, ?int $height = 752){
        if($fichier !== 'default.webp'){
            $succes = false;
            $path = $this->params->get('image_directory') . $folder;

            $mini = $path . $width . 'x' . $height . '-' . $fichier;

            if(file_exists($mini)){
                unlink($mini);
                $sucess = true;
            }

            $original = $path . '/' . $fichier;

            if(file_exists($original)){
                unlink($mini);
                $sucess = true;
            }

            return $succes;
        }
        return false;
    }
}