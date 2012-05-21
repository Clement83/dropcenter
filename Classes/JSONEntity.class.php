<?php

/*
	@nom: JSONEntity
	@auteur: Valentin CARRUESCO 
	@description: Classe parent de tous les mod�les (classe entit�es) li�es a la base de donn�e,
	 cette classe est configur� pour agir avec une base Texte plain type JSON, mais il est possible de redefinir ses codes SQL pour l'adapter � un autre SGBD sans affecter 
	 le reste du code du projet.

*/

class JSONEntity
{
	
	private $debug = false;
	

	function __construct(){
		$this->fileName = '/Uploads/.dc/'.$this->TABLE_NAME.'.json';
		$this->create();
	}

	function __destruct(){
		 $this->close();
	}



	public function closeDatabase(){
		$this->close();
	}


	// GESTION SQL



	/**
	* Methode de creation de l'entit�
	* @author Valentin CARRUESCO
	* @category manipulation SQL
	* @param <String> $debug='false' active le debug mode (0 ou 1)
	* @return Aucun retour
	*/
	public function create(){
		touch($this->fileName);
	}

	/**
	* Methode d'insertion ou de modifications d'elements de l'entit�
	* @author Valentin CARRUESCO
	* @category manipulation SQL
	* @param  Aucun
	* @return Aucun retour
	*/
	public function save(){
	/*
		if(isset($this->id)){
			$query = 'UPDATE `'.$this->TABLE_NAME.'`';
			$query .= ' SET ';

			$end = end(array_keys($this->object_fields));
			foreach($this->object_fields as $field=>$type){
				$id = eval('return htmlentities($this->'.$field.');');
				$query .= '`'.$field.'`="'.$id.'"';
				if($field != $end)$query .=',';
			}

			$query .= ' WHERE `id`="'.$this->id.'";';
		}else{
			$query = 'INSERT INTO `'.$this->TABLE_NAME.'`(';
			$end = end(array_keys($this->object_fields));
			foreach($this->object_fields as $field=>$type){
				if($type!='key'){
					$query .='`'.$field.'`';
					if($field != $end)$query .=',';
				}
			}
			$query .=')VALUES(';
			$end = end(array_keys($this->object_fields));
			foreach($this->object_fields as $field=>$type){
				if($type!='key'){
					$query .='"'.eval('return htmlentities($this->'.$field.');').'"';
					if($field != $end)$query .=',';
				}
			}

			$query .=');';
		}
		if($this->debug)echo '<i>'.$this->CLASS_NAME.' ('.__METHOD__ .') : Requete --> '.$query.'<br>';
		//var_dump ($query);
		if(!$this->exec($query)) echo $this->lastErrorMsg().'</i>';
		$this->id =  (!isset($this->id)?$this->lastInsertRowID():$this->id);
		*/
	}

	/**
	* M�thode de modification d'�l�ments de l'entit�
	* @author Valentin CARRUESCO
	* @category manipulation SQL
	* @param <Array> $colonnes=>$valeurs
	* @param <Array> $colonnes (WHERE) =>$valeurs (WHERE)
	* @param <String> $operation="=" definis le type d'operateur pour la requete select
	* @param <String> $debug='false' active le debug mode (0 ou 1)
	* @return Aucun retour
	*/
	public function change($columns,$columns2=null,$operation='=',$debug='false'){
		/*$query = 'UPDATE `'.$this->TABLE_NAME.'` SET ';
		$end = end(array_keys($columns));
		foreach ($columns as $column=>$value){
			$query .= '`'.$column.'`="'.$value.'" ';
			if($column != $end)$query .=',';
		}

		if($columns2!=null){
			$query .=' WHERE '; 
			$end = end(array_keys($columns2));
			foreach ($columns2 as $column=>$value){
				$query .= '`'.$column.'`'.$operation.'"'.$value.'" ';
				if($column != $end)$query .='AND ';
			}
		}

		if($this->debug)echo '<hr>'.$this->CLASS_NAME.' ('.__METHOD__ .') : Requete --> '.$query.'<br>';
		if(!$this->exec($query)) echo $this->lastErrorMsg();
		*/
	}

	/**
	* M�thode de selection de tous les elements de l'entit�
	* @author Valentin CARRUESCO
	* @category manipulation SQL
	* @param <String> $ordre=null
	* @param <String> $limite=null
	* @param <String> $debug='false' active le debug mode (0 ou 1)
	* @return <Array<Entity>> $Entity
	*/
	public function populate($order='null',$limit='null',$debug='false'){
		/*eval('$results = '.$this->CLASS_NAME.'::loadAll(array(),\''.$order.'\','.$limit.',\'=\','.$debug.');');
		return $results;
		*/
	}

	/**
	* M�thode de selection multiple d'elements de l'entit�
	* @author Valentin CARRUESCO
	* @category manipulation SQL
	* @param <Array> $colonnes (WHERE)
	* @param <Array> $valeurs (WHERE)
	* @param <String> $ordre=null
	* @param <String> $limite=null
	* @param <String> $operation="=" definis le type d'operateur pour la requete select
	* @param <String> $debug='false' active le debug mode (0 ou 1)
	* @return <Array<Entity>> $Entity
	*/
	public function loadAll($columns,$order=null,$limit=null,$operation="=",$debug='false'){
		
		$lines = File::get($this->fileName);
		$objects = array();
		foreach($lines as $line){
			$result = true;
			$object = json_decode($line);
			foreach($columns as $key=>$value){
				if($object[$key]!=$value) $result = false;
			}
			if($result) $objects[] = $object;
		}
		return $objects ;
	}

	/**
	* M�thode de selection unique d'�lements de l'entit�
	* @author Valentin CARRUESCO
	* @category manipulation SQL
	* @param <Array> $colonnes (WHERE)
	* @param <Array> $valeurs (WHERE)
	* @param <String> $operation="=" definis le type d'operateur pour la requete select
	* @param <String> $debug='false' active le debug mode (0 ou 1)
	* @return <Entity> $Entity ou false si aucun objet n'est trouv� en base
	*/
	public function load($columns,$operation='=',$debug='false'){
		eval('$objects = $this->loadAll($columns,null,\'1\',\''.$operation.'\',\''.$debug.'\');');
		if(!isset($objects[0]))$objects[0] = false;
		return $objects[0];
	}

	/**
	* M�thode de selection unique d'�lements de l'entit�
	* @author Valentin CARRUESCO
	* @category manipulation SQL
	* @param <Array> $colonnes (WHERE)
	* @param <Array> $valeurs (WHERE)
	* @param <String> $operation="=" definis le type d'operateur pour la requete select
	* @param <String> $debug='false' active le debug mode (0 ou 1)
	* @return <Entity> $Entity ou false si aucun objet n'est trouv� en base
	*/
	public function getById($id,$operation='=',$debug='false'){
		return $this->load(array('id'=>$id),$operation,$debug);
	}

	/**
	* Methode de comptage des �l�ments de l'entit�
	* @author Valentin CARRUESCO
	* @category manipulation SQL
	* @param <String> $debug='false' active le debug mode (0 ou 1)
	* @return<Integer> nombre de ligne dans l'entit�'
	*/
	public function rowCount($columns=null)
	{
		/*$whereClause ='';
		if($columns!=null){
			$whereClause = ' WHERE ';
			$start = reset(array_keys($columns));
			foreach($columns as $column=>$value){
					if($column != $start)$whereClause .= ' AND ';
					$whereClause .= '`'.$column.'`="'.$value.'"';
			}
		}
		$query = 'SELECT COUNT(id) FROM '.$this->TABLE_NAME.$whereClause;
		//echo '<hr>'.$this->CLASS_NAME.' ('.__METHOD__ .') : Requete --> '.$query.'<br>';
		$execQuery = $this->querySingle($query);
		//echo $this->lastErrorMsg();
		return (!$execQuery?0:$execQuery);
		*/
		return 0;
	}	
	
	/**
	* M�thode de supression d'elements de l'entit�
	* @author Valentin CARRUESCO
	* @category manipulation SQL
	* @param <Array> $colonnes (WHERE)
	* @param <Array> $valeurs (WHERE)
	* @param <String> $operation="=" definis le type d'operateur pour la requete select
	* @param <String> $debug='false' active le debug mode (0 ou 1)
	* @return Aucun retour
	*/
	public function delete($columns,$operation='=',$debug='false'){
		// $whereClause = '';

		// 	$start = reset(array_keys($columns));
		// 	foreach($columns as $column=>$value){
		// 		if($column != $start)$whereClause .= ' AND ';
		// 		$whereClause .= '`'.$column.'`'.$operation.'"'.$value.'"';
		// 	}
		// 	$query = 'DELETE FROM `'.$this->TABLE_NAME.'` WHERE '.$whereClause.' ;';
		// 	if($this->debug)echo '<hr>'.$this->CLASS_NAME.' ('.__METHOD__ .') : Requete --> '.$query.'<br>';
		// 	if(!$this->exec($query)) echo $this->lastErrorMsg();
	}
	

	// ACCESSEURS
		/**
	* M�thode de r�cuperation de l'attribut debug de l'entit�
	* @author Valentin CARRUESCO
	* @category Accesseur
	* @param Aucun
	* @return <Attribute> debug
	*/
	
	public function getDebug(){
		return $this->debug;
	}
	
	/**
	* M�thode de d�finition de l'attribut debug de l'entit�
	* @author Valentin CARRUESCO
	* @category Accesseur
	* @param <boolean> $debug 
	*/

	public function setDebug($debug){
		$this->debug = $debug;
	}

}
?>
