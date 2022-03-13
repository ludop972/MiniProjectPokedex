<?php 
    class PokemonsManager 
    {
        private PDO $db;

        public function __construct()
        {
            $dbName = 'pokedex';
            $port = 3306;
            $username = 'root';
            $password = '';
            try {
                $this->db = new PDO("mysql:host=localhost;dbname=$dbName;port=$port",$username,$password);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function create(Pokemon $pokemon)
        {
            $query = $this->db->prepare("INSERT INTO 'pokemon' (numero, nom, description, type1, type2) VALUES (:numero, :nom, :description, :type1, :type2)");
            $query->bindValue(":numero", $pokemon->getNumero(), PDO::PARAM_INT);
            $query->bindValue(":nom", $pokemon->getNom(), PDO::PARAM_STR);
            $query->bindValue(":description", $pokemon->getDescription(), PDO::PARAM_INT);
            $query->bindValue(":type1", $pokemon->getType1(), PDO::PARAM_INT);
            $query->bindValue(":type2", $pokemon->getType2(), PDO::PARAM_INT);

            $query->execute();
        }

        public function getPokemon(int $id)
        {
            $query = $this->db->prepare("SELECT * FROM 'pokemon' WHERE id= :id");
            $query->bindvalue(":id",$id, PDO::PARAM_INT);
            $data = $query->fetch();
            $pokemon = new Pokemon($data);
            return $pokemon;
        }

        public function getAllByString(string $input)
        {
            $pokemons = [];
            $query = $this->db->prepare("SELECT * FROM 'pokemon' WHERE name LIKE :input ORDER BY numero");
            $query->bindValue(":input",$input,PDO::PARAM_STR);
            $datas = $query->fetchAll();
            foreach($datas as $data)
            {
                $pokemon = new Pokemon($data);
                $pokemons[]= $pokemon;
            }
            return $pokemons;
        }

        public function getAllByType(string $input)
        {

        }

        public function update($pokemon)
        {

        }

        public function delete(int $id)
        {

        }
    }