<?php

    use Imagine\Image\Box;
    use Imagine\Image\Point;
    use Imagine\Image\ImageInterface;

    use ColorThief\ColorThief;

    use WideImage\WideImage;


    /**
     * Class des images et des couleurs
     */
    class img
    {

        function __construct()
        {

        }



        public function hex2rgb($hex) {
           $hex = str_replace("#", "", $hex);

           if(strlen($hex) == 3) {
              $r = hexdec(substr($hex,0,1).substr($hex,0,1));
              $g = hexdec(substr($hex,1,1).substr($hex,1,1));
              $b = hexdec(substr($hex,2,1).substr($hex,2,1));
           } else {
              $r = hexdec(substr($hex,0,2));
              $g = hexdec(substr($hex,2,2));
              $b = hexdec(substr($hex,4,2));
           }
           $rgb = array($r, $g, $b);
           //return implode(",", $rgb); // returns the rgb values separated by commas
           return $rgb; // returns an array with the rgb values
        }



        public function rgb2hex($rgb) {
           $hex = "#";
           $hex .= str_pad(dechex($rgb[0]), 2, "0", STR_PAD_LEFT);
           $hex .= str_pad(dechex($rgb[1]), 2, "0", STR_PAD_LEFT);
           $hex .= str_pad(dechex($rgb[2]), 2, "0", STR_PAD_LEFT);

           return $hex; // returns the hex value including the number sign (#)
        }



        /**
         * Lighten ou Darken RGB Color
         * @param  array  $rgb   couleur rbb
         * @param  integer $light x<0 = darken w>0 = lighten
         * @return array $rgb
         */
        public function light($rgb, $light = 0) {
            $light = round($light/100,2);
            if(is_array($rgb)) {
                $r = $rgb[0] - (round($rgb["0"])*$light);
                $g = $rgb[1] - (round($rgb["1"])*$light);
                $b = $rgb[2] - (round($rgb["2"])*$light);

                return array("r"=> round(max(0,min(255,$r))),
                    "g"=> round(max(0,min(255,$g))),
                    "b"=> round(max(0,min(255,$b))));
            }
            else if(preg_match("/#/",$color_code)) {
                $hex = str_replace("#","",$color_code);
                $r = (strlen($hex) == 3)? hexdec(substr($hex,0,1).substr($hex,0,1)):hexdec(substr($hex,0,2));
                $g = (strlen($hex) == 3)? hexdec(substr($hex,1,1).substr($hex,1,1)):hexdec(substr($hex,2,2));
                $b = (strlen($hex) == 3)? hexdec(substr($hex,2,1).substr($hex,2,1)):hexdec(substr($hex,4,2));
                $r = round($r - ($r*$light));
                $g = round($g - ($g*$light));
                $b = round($b - ($b*$light));

                return "#".str_pad(dechex( max(0,min(255,$r)) ),2,"0",STR_PAD_LEFT)
                    .str_pad(dechex( max(0,min(255,$g)) ),2,"0",STR_PAD_LEFT)
                    .str_pad(dechex( max(0,min(255,$b)) ),2,"0",STR_PAD_LEFT);
            }
        }



        /**
         * Image ratio
         */
        public function ratio($img)
        {
            $size = getimagesize($img);

            return ($size[0]/$size[1]);
        }



        /**
         * source : https://manu.ninja/dominant-colors-for-lazy-loading-images
         * Find dominante colors
         */
        public function info($img)
        {
            $ratio   = $this->ratio($img);

            $color   = ColorThief::getColor($img);
            $palette = ColorThief::getPalette($img, 9);

            return [
                'ratio'   => $ratio,
                'palette' => $palette,
                'color'   => $color
            ];
        }

        /**
        * TODO : Creer un system de détourage par mask avec gestion du negatif et/ou couleur de fond dominante
        **/
        /**
         * Resize une image et l'enregistre en different format en vue de post traitement
         * @param  [type]  $img  [description]
         * @param  integer $size taille de la vignette
         * @return array        la liste des noms de fichiers créer.
         */
        public function aphaColor($img, $size = 250)
        {

            $names             = [];
            $info              = pathinfo($img);
            extract($info);

            if(!file_exists($dirname.'/normal/'))
                mkdir($dirname.'/normal/');
            if(!file_exists($dirname.'/grey/'))
                mkdir($dirname.'/grey/');
            if(!file_exists($dirname.'/negative/'))
                mkdir($dirname.'/negative/');




            $names['normal']   = 'normal/'.$filename.'.png';
            $names['grey']     = 'grey/'.$filename.'.png';
            $names['negative'] = 'negative/'.$filename.'.png';

            $infoColor         = $this->info($img);
            $ratio             = $infoColor['ratio'];


            $imagine           = new Imagine\Gd\Imagine();
            $palette           = new Imagine\Image\Palette\RGB();

            $image             = $imagine->open($img);
            $image->resize(new Box($size, $size/$ratio));

            $image->save($dirname.'/'.$names['normal'], array('png_quality' => 100));

            $image->effects()
                ->grayscale();
            $image->save($dirname.'/'.$names['grey'], array('png_quality' => 100));


            $image->effects()
                ->negative();
            $image->save($dirname.'/'.$names['negative'], array('png_quality' => 100));

            return $names;
        }

    }


?>
