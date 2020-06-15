<?php 
class Play{
    public $omega_;
    public $turbo_;
    public $thera_;
    public $kurtex_;
    public $lime_;
    public $sion_;
    public $sinda_;
    public $egima_;
    public $nedge_;
    public $thilth_;

    public function omega_get(){
        return $this->omega_ = "00000001";
    }
    public function turbo_get(){
        return $this->turbo_ = "00000010";
    }
    public function thera_get(){
        return $this->thera_ = "00000011";
    }
    public function kurtex_get(){
        return $this->kurtex_ = "00000400";
    }
    public function lime_get(){
        return $this->lime_ = "00000101";
    }
    public function sion_get(){
        return $this->sion_ = "00000110";
    }
    public function sinda_get(){
        return $this->sinda_ = "00000111";
    }
    public function egima_get(){
        return $this->egima_ = "00001000";
    }
    public function nedge_get(){
        return $this->nedge_ = "00001001";
    }
    public function thilth_get(){
        return $this->thilth_ = "00000000";
    }


    public function omega_set(){
        return $this->omega_;
    }
    public function turbo_set(){
        return $this->turbo_;
    }
    public function thera_set(){
        return $this->thera_;
    }
    public function kurtex_set(){
        return $this->kurtex_;
    }
    public function lime_set(){
        return $this->lime_;
    }
    public function sion_set(){
        return $this->sion_;
    }
    public function sinda_set(){
        return $this->sinda_;
    }
    public function egima_set(){
        return $this->egima_;
    }
    public function nedge_set(){
        return $this->nedge_;
    }
    public function thilth_set(){
        return $this->thilth_;
    }


    public function executor(){
        self::turbo_get();
        self::thilth_get();
        self::omega_get();
        self::nedge_get();
    }
    public function checking($data){
        if(date("Y-m-d") > "$data"){
            return FALSE;
        }else{
            return TRUE;
        }
    }
}