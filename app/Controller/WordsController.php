<?php
App::uses('AppController', 'Controller');

class WordsController extends AppController {

    var $uses = array('Word');
    
    /**
    * word meaning 
    *
    * @return void
    */
	public function meaning($word){
        $this->autoRender = false;
        $this->response->type('json');

        if($this->Word->if_exists($word)){
            if(language_check($word) == 'en'){
                $options['conditions'] = array(
                    'Word.en_word' => $word
                );
                $options['fields'] = 'en_lemma, bn_word';
                $data = $this->Word->find('all', $options); 
                $data = Set::extract('/Word/.', $data);
                $this->response->statusCode(200);  
            }elseif(language_check($word) == 'bn'){
                $options['conditions'] = array(
                    'Word.bn_word' => $word
                );
                $options['fields'] = 'bn_pronunciation, en_word';
                $data = $this->Word->find('all', $options); 
                $data = Set::extract('/Word/.', $data);
                $this->response->statusCode(200);
            }
        }else{
            $this->response->statusCode(409);
        }
        $json = json_encode($data, JSON_UNESCAPED_UNICODE );
        header('Access-Control-Allow-Origin: *');
        $this->response->body($json);
	}
}
