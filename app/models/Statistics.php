<?php
/**
 * Created by PhpStorm.
 * User: shaunhare
 * Date: 02/12/2013
 * Time: 22:11
 */

class Statistics {

        private $hex_values = array();

        public function __construct()
        {

        }

        public function showRatings()
        {
           $values = array();

           $ratings = $this->array_flatten(Feedback::all(array("rating")),array());

           $ratings = array_filter($ratings,function($i){return !is_null($i);});

            foreach(array_unique($ratings) as $value)
            {
                $tmp = array_count_values($ratings);
                $values[]=array("value"=>$tmp[$value],"label"=>$value,"colour"=>'#'.$this->random_color());
            }
            return json_encode($values);
        }

    private function array_flatten($array,$return)
    {
        foreach($array as $rating)
        {
            $return[]=$rating->rating;
        }
        return $return;
    }

    private function random_color_part() {
        return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
    }

    private function random_color() {

        $hex = $this->random_color_part() . $this->random_color_part() . $this->random_color_part();

        if(!in_array($hex,$this->hex_values))
        {
            $this->hex_values[]=$hex;
            return $hex;
        }
        else
        {
            return $this->random_color();
        }

    }

} 