<?php namespace App\Repository;


abstract class BaseRepository {

	abstract public function getModel();

	public function newQuery()
	{

		return $this->getModel()->newQuery();
	}


	public function search($id)
	{

		return $this->newQuery()->find($id);
	}

	public function showMaterias()
	{

		return $this->newQuery()->lists('creditos', 'id');
	}

	public function searchList()
	{

		return $this->newQuery()->lists('name', 'id');
	}

	public function listSemestres($id)
	{

		return  $this->search($id)->semestres()->orderBy('created_at','DESC')->lists('name', 'id');
	}

	public function listMaterias($id)
	{

		return $this->search($id)->materias()->lists('name', 'id');
	}

	public function getMaterias($id)
	{

		return $this->search($id)->materias()->paginate(100);
	}

	public function getSemestres($id)
	{

		return $this->search($id)->semestres()->orderBy('created_at','DESC')->get();
	}

	public function getActividades($id)
	{

		return $this->search($id)->actividades()->paginate(5);
	}

	public function getUnidades($id)
	{

		return $this->search($id)->unidades()->paginate(5);
	}


	public function getRubricas($id)
	{

		return $this->search($id)->rubricas()->lists('name', 'id');
	}

	public function getPlaneaciones($id)
	{

		return $this->search($id)->planeaciones()->orderBy('created_at', 'DESC')->paginate(5);
	}

	public function getVideos($id)
	{

		return $this->search($id)->videos()->orderBy('created_at', 'DESC')->paginate(5);
	}

	public function getArchivos($id)
	{

		return $this->search($id)->fileentries()->orderBy('created_at', 'DESC')->paginate(5);

	}

	public function verMaterias($id)
	{

		 return  $this->search($id)->materias()->orderBy('created_at','DESC')->get();
	}

	public function getApoyos($id)
	{

		return $this->search($id)->apoyos()->orderBy('created_at','DESC')->get();
	}

	public function getExamen($id)
	{

		return $this->search($id)->examenes()->orderBy('created_at', 'DESC')->paginate(5);
	}

	public function getPreguntas($id)
	{
		return $this->search($id)->preguntas()->get();
	}
	
}


