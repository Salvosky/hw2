<?php
    namespace app\Models;

    use Illuminate\Database\Eloquent\Model;

    class Valutazione extends Model{
        
        protected $table="valutazione";

        protected $fillable=[
            "Cf_Alunno",
            "Cf_Insegnante",
            "NomeMateria",
            "Voto",
            "Data"
        ];    

        public $timestamps=false;
    }
?>