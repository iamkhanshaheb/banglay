<?php
App::uses('AppModel', 'Model');
/**
 * Word Model
 *
 */
class Word extends AppModel {

    public $useTable = 'words';

    public function if_exists($word){
        $query = "SELECT 
                    EXISTS(
                            SELECT *
                            FROM words
                            WHERE en_word = '$word');";         
        if($this->query($query)){
            return true;
        }else{
            return false;
        }
    }

}