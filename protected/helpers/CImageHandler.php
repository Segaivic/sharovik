<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Sega
 * Date: 20.09.12
 * Time: 9:02
  */
class CImageHandler {

    /**
     * Returns image.
     * @param string $img uploaded image.
     * @param string $path path to save file with name like '/uploads/images/'.$img.
     * @return void
     */
    public static function upload($img , $path , $watermark = false) {
        $img->saveAs(Yii::getPathOfAlias('webroot').$path);
        if($watermark === true){
            self::addWatermark($path);
        }
    }

    /**
     * Saves resized copy of image.
     * @param string $img (alreaady uploaded).
     * @param string $path path to save file with name like '/uploads/images/'.$img.
     * @param string $resizeType - resize to width or height. Default - width.
     * @param int $size Value to resize.
     * @return void
     */
    public static function resizeAndSave($img , $path , $resizeType = 'width' , $size) {

        $image = Yii::app()->simpleImage->load(Yii::getPathOfAlias('webroot').$img);

        if($resizeType === 'width') {
            $image->resizeToWidth($size);
        }
        elseif($resizeType === 'height') {
            $image->resizeToHeight($size);
        }
        $image->save(Yii::getPathOfAlias('webroot').$path);
    }

    /**
     * Deletes image if it exists
     * @param $img like '/uploads/images/'.$img
     */
    public static function delete($img) {
        if( is_file(Yii::getPathOfAlias('webroot').$img) ) {
            unlink(Yii::getPathOfAlias('webroot').$img);
        }
    }

    public static function addWatermark($file){

        $properties = getimagesize(Yii::getPathOfAlias('webroot').$file);

        switch($properties['mime']) {
            case 'image/png':
                $w_image =  imagecreatefrompng(Yii::getPathOfAlias('webroot').$file);
                break;
            case 'image/jpeg':
                $w_image =  imagecreatefromjpeg(Yii::getPathOfAlias('webroot').$file);
                break;
            case 'image/gif':
                $w_image =  imagecreatefromgif(Yii::getPathOfAlias('webroot').$file);
                break;
        }
        //Создаем джипег, выдираем длину и ширину

        $w_width = imagesx($w_image);
        $w_height = imagesy($w_image);


        // Получение штампа + высоты/ширины штампа
        $watermark = imagecreatefrompng(Yii::getPathOfAlias('webroot').'/images/watermark.png');
        $sx = imagesx($watermark);
        $sy = imagesy($watermark);



        //Лепим
        $img_paste_x = 0;
        while($img_paste_x < $w_width){
            $img_paste_y = 0;
            while($img_paste_y < $w_height){
                imagecopy($w_image , $watermark ,$img_paste_x ,$img_paste_y , 0 , 0 , $sx , $sy);
                $img_paste_y += $sy;
            }
            $img_paste_x += $sx;
        }
        //Сохраняем
        imagepng($w_image , Yii::getPathOfAlias('webroot').$file);

        //Удаляем всю эту тему
        imagedestroy($w_image);
        imagedestroy($watermark);

    }
}
?>

