<?

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

    public function add(UploadedFile $picture, ?string $folder ='', ?int
    $width = 1130, ?int $height = 752)
    {
        // stocker au format mp
        $fichier = md5(uniqid(rand(), true)) . '.webp';

        // On récupère les infos de l'image
        $pitctureInfos = getimagesize($picture);

        if($pitctureInfos === false){
            throw new Exception('Format d\'image incorrect');
        }

        // On vérifie le format de l'image
        switch($pitctureInfos){
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
        
        // On recadre l'image
        $imageWidth = $pitctureInfos[0];
        $imageHeigth = $pitctureInfos[1];

        // On verifire l'orientation de l'image
        switch($imageWidth <=> $imageHeigth){
            case -1: // portrait
                $squareSize = $imageWidth;
                $srcX = 0;
                $srcY = ($imageHeigth - $squareSize) / 2;
                break;
            case 0: // carré
                $squareSize = $imageWidth;
                $srcX = 0;
                $srcY = 0;
                break;
            case 1: // paysage
                $squareSize = $imageHeigth;
                $srcX = ($imageWidth - $squareSize) / 2;
                $srcY = 0;
                break;
        }

        // On crée une nouvelle image vierge
        $resizedPicture = imagecreatetruecolor($width, $height);

        imagecopyresampled($resizedPicture, $pictureSource, 0, 0, $srcX, $srcY,
        $width, $height, $squareSize, $squareSize);

        $path = $this->params->get('image_directory') . $folder;

        // On stocke l'image recadré
        imagewebp($resizedPicture, $path, $fichier);
        /*
        imagewebp($resizedPicture, $path, $width . 'x' .
        $height . '-' . $fichier);
        */
        // $picture->move($path . '/', $fichier);

        return $fichier;
    }

    public function delete(string $fichier, ?string $folder = '', ?int
    $width = 250, ?int $height = 250){
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