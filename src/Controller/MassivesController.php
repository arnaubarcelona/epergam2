<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Massives Controller
 *
 * @property \App\Model\Table\MassivesTable $Massives
 *
 * @method \App\Model\Entity\Massife[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MassivesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function return()
    {		
        $massife = $this->Massives->newEntity();
        if ($this->request->is('post')) {
            $massife = $this->Massives->patchEntity($massife, $this->request->getData());
            $massiveTable = \Cake\ORM\TableRegistry::get('MassiveErrors', array('table' => 'massive_errors'));
			$lines = preg_split('/\r\n|\r|\n/',$massife->data);
			$documents = $this->loadModel('Documents');
			$massiveTable->deleteAll('1 = 1', false);
            foreach($lines as $line){
				if(is_numeric($line)){
				if(strlen($line) > 10){					
					if (preg_match('/^\d{3}(\d{9})\d$/', $line, $m)) {
						$sequence = $m[1];
						$sum = 0;
						$mul = 10;
						for ($i = 0; $i < 9; $i++) {
							$sum = $sum + ($mul * (int) $sequence{$i});
							$mul--;
						}
						$mod = 11 - ($sum%11);
						if ($mod == 10) {
							$mod = "X";
						}
						else if ($mod == 11) {
							$mod = 0;
						}
						$isbn10 = $sequence.$mod;
						$isbn13 = "No";
					}
					
				}
				if(strlen($line) == 10){
				   $nouisbn = trim($line);
				   if(strlen($nouisbn) == 12){ // if number is UPC just add zero
					  $isbn13 = '0'.$nouisbn;}
				   else
				   {
					  $isbn2 = substr("978" . trim($nouisbn), 0, -1);
					  
					   $nouisbn = trim($isbn2);
					   $tb = 0;
					   for ($i = 0; $i <= 12; $i++)
					   {
						  $tc = substr($nouisbn, -1, 1);
						  $nouisbn = substr($nouisbn, 0, -1);
						  $ta = ($tc*3);
						  $tci = substr($nouisbn, -1, 1);
						  $nouisbn = substr($nouisbn, 0, -1);
						  $tb = $tb + $ta + $tci;
					   }
					   
					   $tg = ($tb / 10);
					   $tint = intval($tg);
					   if ($tint == $tg) { $sum13 = 0; }
					   $ts = substr($tg, -1, 1);
					   $sum13 = (10 - $ts);
					  
					  $isbn13 = "$isbn2$sum13";
					  $isbn10 = "No";
				   }
				}
			}
			else {$isbn10 = 'No'; $isbn13 = 'No';}
				$document = $documents->find('all')->where(['OR' => [['isbn' => $line], ['isbn' => $isbn10], ['isbn' => $isbn13]]]);
				if($massife->ignore_duplicate == 0 && $document->count()>1){
					$row = $document->first();
					$massiveError = $massiveTable->newEntity();
					$massiveError->document_id = $row->id;
					$massiveError->error = 'No s\'ha fet el retorn perquè hi ha més d\'un document amb aquest ISBN';
					$massiveTable->save($massiveError);
					}
				elseif($massife->ignore_duplicate == 1 && $document->count()>1){
					foreach($document as $row){
					$row->lending_state_id = 1;
					$documents->save($row);
					$lendingfives = $lendings->find('all')->where(['AND' => [['document_id' => $row->id], ['lending_state_id !=' => 5]]]);
					foreach($lendingfives as $lending){
						$now = Time::now();
						$lending->date_real_return = $now;
						$lendingtaken = $lending->date_taken->day . $lending->date_taken->month . $lending->date_taken->year;
						$lendingreturn = $now->day . $now->month . $now->year;
						$lending->set_return_user_id = $this->Auth->user('id');
						if($lendingtaken == $lendingreturn )
						{				
							if ($this->Lendings->delete($lending))
								{
								/*$this->Flash->success(__('Aquest préstec no constarà a l\'historial de préstecs.'));*/
								}}
						else
							{
							$lending->lending_state_id = 5;
							if ($this->Lendings->save($lending))
								{/*
								$this->Flash->success(__('El document s\'ha retornat.'));*/
								}
							}
						}
					
					}
					}
				elseif($document->count()<1){
					$massiveError = $massiveTable->newEntity();
					$massiveError->document_id = 0;
					$massiveError->error = 'No s\'ha fet el retorn perquè no hi ha cap document amb aquest ISBN: ' . $line;
					$massiveTable->save($massiveError);
					}
				else{
					$lendings = $this->loadModel('Lendings');
					$row = $document->first();
					$row->lending_state_id = 1;
					$documents->save($row);	
					$lendingfives = $lendings->find('all')->where(['AND' => [['document_id' => $row->id], ['lending_state_id !=' => 5]]]);
					foreach($lendingfives as $lending){
						$now = Time::now();
						$lending->date_real_return = $now;
						$lendingtaken = $lending->date_taken->day . $lending->date_taken->month . $lending->date_taken->year;
						$lendingreturn = $now->day . $now->month . $now->year;
						$lending->set_return_user_id = $this->Auth->user('id');
						if($lendingtaken == $lendingreturn )
						{				
							if ($this->Lendings->delete($lending))
								{
								/*$this->Flash->success(__('Aquest préstec no constarà a l\'historial de préstecs.'));*/
								}}
						else
							{
							$lending->lending_state_id = 5;
							if ($this->Lendings->save($lending))
								{/*
								$this->Flash->success(__('El document s\'ha retornat.'));*/
								}
							}
						}
				}
				}
				return $this->redirect(['controller' => 'massiveErrors', 'action' => 'index']);
			}
        $locations = $this->Massives->Locations->find('list', ['limit' => 200]);
        $this->set(compact('massife', 'locations'));
		
	}
    public function location()
    {
        $massife = $this->Massives->newEntity();
        if ($this->request->is('post')) {
            $massife = $this->Massives->patchEntity($massife, $this->request->getData());
            $massiveTable = \Cake\ORM\TableRegistry::get('MassiveErrors', array('table' => 'massive_errors'));
			$lines = preg_split('/\r\n|\r|\n/',$massife->data);
			$documents = $this->loadModel('Documents');
			$massiveTable->deleteAll('1 = 1', false);
            foreach($lines as $line){
				if(is_numeric($line)){
				if(strlen($line) > 10){					
					if (preg_match('/^\d{3}(\d{9})\d$/', $line, $m)) {
						$sequence = $m[1];
						$sum = 0;
						$mul = 10;
						for ($i = 0; $i < 9; $i++) {
							$sum = $sum + ($mul * (int) $sequence{$i});
							$mul--;
						}
						$mod = 11 - ($sum%11);
						if ($mod == 10) {
							$mod = "X";
						}
						else if ($mod == 11) {
							$mod = 0;
						}
						$isbn10 = $sequence.$mod;
						$isbn13 = "No";
					}
					
				}
				if(strlen($line) == 10){
				   $nouisbn = trim($line);
				   if(strlen($nouisbn) == 12){ // if number is UPC just add zero
					  $isbn13 = '0'.$nouisbn;}
				   else
				   {
					  $isbn2 = substr("978" . trim($nouisbn), 0, -1);
					  
					   $nouisbn = trim($isbn2);
					   $tb = 0;
					   for ($i = 0; $i <= 12; $i++)
					   {
						  $tc = substr($nouisbn, -1, 1);
						  $nouisbn = substr($nouisbn, 0, -1);
						  $ta = ($tc*3);
						  $tci = substr($nouisbn, -1, 1);
						  $nouisbn = substr($nouisbn, 0, -1);
						  $tb = $tb + $ta + $tci;
					   }
					   
					   $tg = ($tb / 10);
					   $tint = intval($tg);
					   if ($tint == $tg) { $sum13 = 0; }
					   $ts = substr($tg, -1, 1);
					   $sum13 = (10 - $ts);
					  
					  $isbn13 = "$isbn2$sum13";
					  $isbn10 = "No";
				   }
				}
			}
			else {$isbn10 = 'No'; $isbn13 = 'No';}
				$document = $documents->find('all')->where(['OR' => [['isbn' => $line], ['isbn' => $isbn10], ['isbn' => $isbn13]]]);
				if($massife->ignore_duplicate == 0 && $document->count()>1){
					$row = $document->first();
					$massiveError = $massiveTable->newEntity();
					$massiveError->document_id = $row->id;
					$massiveError->error = 'No s\'ha fet el canvi perquè hi ha més d\'un document amb aquest ISBN';
					$massiveTable->save($massiveError);
					}
				elseif($massife->ignore_duplicate == 1 && $document->count()>1){
					foreach($document as $row){
					$row->location_id = $massife->location_id;
					$documents->save($row);
					}
					}
				elseif($document->count()<1){
					$massiveError = $massiveTable->newEntity();
					$massiveError->document_id = 0;
					$massiveError->error = 'No s\'ha fet el canvi perquè no hi ha cap document amb aquest ISBN: ' . $line;
					$massiveTable->save($massiveError);
					}
				else{
					$row = $document->first();
					$row->location_id = $massife->location_id;
					$documents->save($row);					
				}
				}
				return $this->redirect(['controller' => 'massiveErrors', 'action' => 'index']);
			}
        $locations = $this->Massives->Locations->find('list', ['limit' => 200]);
        $this->set(compact('massife', 'locations'));
		
	}
	
	
	public function labels()
    {
        $massife = $this->Massives->newEntity();
        if ($this->request->is('post')) {
            $massife = $this->Massives->patchEntity($massife, $this->request->getData());
            $massiveTable = \Cake\ORM\TableRegistry::get('MassiveErrors', array('table' => 'massive_errors'));
			$lines = preg_split('/\r\n|\r|\n/',$massife->data);
			$documents = $this->loadModel('Documents');
			$labels = $this->loadModel('Labels');
			$massiveTable->deleteAll('1 = 1', false);
			$labels->deleteAll('1 = 1', false);
            foreach($lines as $line){
				if(is_numeric($line)){
				if(strlen($line) > 10){					
					if (preg_match('/^\d{3}(\d{9})\d$/', $line, $m)) {
						$sequence = $m[1];
						$sum = 0;
						$mul = 10;
						for ($i = 0; $i < 9; $i++) {
							$sum = $sum + ($mul * (int) $sequence{$i});
							$mul--;
						}
						$mod = 11 - ($sum%11);
						if ($mod == 10) {
							$mod = "X";
						}
						else if ($mod == 11) {
							$mod = 0;
						}
						$isbn10 = $sequence.$mod;
						$isbn13 = "No";
					}
					
				}
				if(strlen($line) == 10){
				   $nouisbn = trim($line);
				   if(strlen($nouisbn) == 12){ // if number is UPC just add zero
					  $isbn13 = '0'.$nouisbn;}
				   else
				   {
					  $isbn2 = substr("978" . trim($nouisbn), 0, -1);
					  
					   $nouisbn = trim($isbn2);
					   $tb = 0;
					   for ($i = 0; $i <= 12; $i++)
					   {
						  $tc = substr($nouisbn, -1, 1);
						  $nouisbn = substr($nouisbn, 0, -1);
						  $ta = ($tc*3);
						  $tci = substr($nouisbn, -1, 1);
						  $nouisbn = substr($nouisbn, 0, -1);
						  $tb = $tb + $ta + $tci;
					   }
					   
					   $tg = ($tb / 10);
					   $tint = intval($tg);
					   if ($tint == $tg) { $sum13 = 0; }
					   $ts = substr($tg, -1, 1);
					   $sum13 = (10 - $ts);
					  
					  $isbn13 = "$isbn2$sum13";
					  $isbn10 = "No";
				   }
				}
			}
			else {$isbn10 = 'No'; $isbn13 = 'No';}
				$document = $documents->find('all')->where(['OR' => [['isbn' => $line], ['isbn' => $isbn10], ['isbn' => $isbn13]]]);
				if($massife->ignore_duplicate == 0 && $document->count()>1){
					$row = $document->first();
					$massiveError = $massiveTable->newEntity();
					$massiveError->document_id = $row->id;
					$massiveError->error = 'No s\'ha generat etiqueta perquè hi ha més d\'un document amb aquest ISBN';
					$massiveTable->save($massiveError);
					}
				elseif($massife->ignore_duplicate == 1 && $document->count()>1){
					foreach($document as $row){
					$label = $labels->newEntity();
					$label->document_id = $row->id;
					$labels->save($label);
					}
					}
				elseif($document->count()<1){
					$massiveError = $massiveTable->newEntity();
					$massiveError->document_id = 0;
					$massiveError->error = 'No s\'ha generat etiqueta perquè no hi ha cap document amb aquest ISBN: ' . $line;
					$massiveTable->save($massiveError);
					}
				else{
					$row = $document->first();
					$label = $labels->newEntity();
					$label->document_id = $row->id;
					$labels->save($label);				
				}
				}
				return $this->redirect(['controller' => 'massiveErrors', 'action' => 'labelindex']);
			}
        $locations = $this->Massives->Locations->find('list', ['limit' => 200]);
        $this->set(compact('massife', 'locations'));
		
	}
}
