<?php
    namespace app\Models;

    use Illuminate\Database\Eloquent\Model;

    class Impiegato extends Model{

        protected $table="impiegato";
        
        protected $primaryKey="Cf";
        
        protected $autoIncrement=false;

        protected $keyType="string";

        public $timestamps=false;
    }
?>