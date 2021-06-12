<?php
    namespace app\Models;

    use Illuminate\Database\Eloquent\Model;

    class Alunno extends Model{

        protected $table="alunno";
        
        protected $primaryKey="Cf";
        
        protected $autoIncrement=false;

        protected $keyType="string";

        public $timestamps=false;

        public function scuola(){
            return $this->belongsTo("Scuola", "id_scuola");
        }

        public function classe(){
            return $this->belongsTo("Classe", "id_classe");
        }
    }
?>