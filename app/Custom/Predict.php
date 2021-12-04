<?php
namespace App\Custom;
class Predict{
    	
private $ability;
private $billed	;
private $paid	;
private $outstanding;	

    function __construct($ability,$billed,$paid) {
         $this->ability=$ability;
         $this->billed=$billed;
         $this->paid=$paid;
         $this->outstanding=$billed-$paid;
     }
    public function  scoreCalculator()
    {
        if($this->outstanding!=0)
        {
            switch($this->outstanding)
            {
                case $this->outstanding>0 && $this->outstanding<=5000:
                    if($this->ability==1)
                      {
                          return 3;
                      }
                      elseif($this->ability==2){
                        return 2;
                      }
                    else{
                        return 1;
                    }
                    break;
                case $this->outstanding>5000 && $this->outstanding<=10000:
                        if($this->ability==1)
                          {
                              return 6;
                          }
                          elseif($this->ability==2){
                            return 5;
                          }
                        else{
                            return 4;
                        }
                        break;
                case $this->outstanding>=10000 && $this->outstanding<=20000:
                            if($this->ability==1)
                              {
                                  return 9;
                              }
                              elseif($this->ability==2){
                                return 8;
                              }
                            else{
                                return 7;
                            }
                            break;
                    default:
                      return 10;
            }
           

        }
        else{
            return 0;
        }

    }
}