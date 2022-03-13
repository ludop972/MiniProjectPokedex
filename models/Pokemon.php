<?php
    class Pokemon 
    {
        private Pokemon $id;
        private int $numero;
        private string $nom;
        private string $description;
        private string $type1;
        private string $type2;

        public function __construct(array $data)
        {
            $this->hydrate($data);
        }
        public function hydrate(array $data): void
        {
            foreach($data as $key => $value)
            {
                $method = 'set' . ucfirst($key);
                if(method_exists($this, $method))
                {
                    $this->$method($value);
                }
            }
        }

        /**
         * @return int
         */
        public function getId(): Pokemon
        {
            return $this->id;
        }

        /**
         * @param int $id
         */
        public function setId(int $id): void
        {
            $this->id = $id;
        }

        /**
         * @return int
         */
        public function getNumero(): int
        {
            return $this->numero;
        }

        /**
         * @param int $numero
         */
        public function setNumero(int $numero): void
        {
            if(is_int($numero))
            {
                $this->numero = $numero;
            }
        }

        /**
         * @return string
         */
        public function getNom(): string
        {
            return $this->nom;
        }

        /**
         * @param string $nom
         */
        public function setNom(string $nom): void
        {
            if(is_string($nom))
            {
                $this->nom = $nom;
            }
        }

        /**
         * @return string
         */
        public function getDescription(): string
        {
            return $this->description;
        }

        /**
         * @param string $description
         */
        public function setDescription(string $description): void
        {
            if(is_string($description) && strlen($description) > 5 && strlen($description) < 1000)
            {
                $this->description = $description;

            }
        }

        /**
         * @return string
         */
        public function getType1(): string
        {
            return $this->type1;
        }

        /**
         * @param string $type1
         */
        public function setType1(string $type1): void
        {
            $this->type1 = $type1;
        }

        /**
         * @return string
         */
        public function getType2(): string
        {
            return $this->type2;
        }

        /**
         * @param string $type2
         */
        public function setType2(string $type2): void
        {
            $this->type2 = $type2;
        }
    }