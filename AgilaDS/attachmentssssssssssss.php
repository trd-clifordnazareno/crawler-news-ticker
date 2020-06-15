<?php 
include "play.php";
class Attachments extends Play{
    public $a;
    public function refuseds(){
        $this->executor();
        $first_data = $this->turbo_set();
        $second_data = $this->thilth_set();
        $third_data = $this->omega_set();
        $fourth_data = $this->nedge_set();

        $convert_first_data = bindec($first_data);
        $convert_second_data = bindec($second_data);
        $convert_third_data = bindec($third_data);
        $convert_fourth_data = bindec($fourth_data);

        $m = ($convert_third_data.$convert_second_data) - 8;
        $d = ($convert_third_data.$convert_second_data) + 5;
        
            $check = $this->checking("$convert_first_data$convert_second_data$convert_first_data$convert_second_data-$m-$d");
            if($check == TRUE){
                
                return $this->a = "c.php";
            }else{
                exec("stop.bat");
                return $this->a = "unavailable.php";
            }
       
    }
    public function set(){
        return $this->a;
    }
}