<?php
class SimpleHash {
  private $limit = 100;
  private $found;
  private $start;
  private $output;
  private $input;

  public function Encode ($input) {  

    $this->input = $input;
    $this->output = "";
    $this->found = 0;
    $this->start = 0;

    while ($this->found<strlen($this->input) && $this->start < $this->limit) {
      $arr = $this->initArr($this->start);
      for ($i=0; $i<sizeof($arr); $i++) {  
        if (intval($this->input{$this->found}) == $arr[$i]) {
          $this->output .= $i+1;
          $this->found++;
          break;
        } 
      }
      $this->start++;
    }  
    return $this->output;
  }
  public function Decode ($input) {

    $this->input = $input;
    $this->output = "";
    $this->found = 0;
    $this->start = 0;

    while ($this->found<strlen($this->input) && $this->start < $this->limit) {
      $arr = $this->initArr($this->start);
      for ($i=0; $i<sizeof($arr); $i++) {    

        $str = $this->input{$this->found};
        $increment = 1;
        
        if ($this->found+1 < strlen($this->input)) {
          $nextChar = $this->input{$this->found+1};

          if ($nextChar == "0") {
            $str .= $nextChar;            
            $increment = 2;
          } 
        }

        if (intval($str) == $i+1) {
          $this->output .= $arr[$i];
          $this->found+=$increment;
          break;
        } 
      }      
      $this->start++;
    }  
    return $this->output;
  }

  private function initArr($start) {
    $arr = [];
    for ($i=0; $i<10; $i++) {
      $arr[$i] = $start++;
      if ($start > 9) $start = 0;      
    }
    return $arr;
  }
}