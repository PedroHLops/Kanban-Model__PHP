<?PHP
    class Project{
        public function __construct($name, $description, $team, $term){
            $this->status = 'true';
            $this->name = $name;
            $this->description = $description;
            $this->created_at = date('d/m/y');
            $this->team = $team;
            $this->term = $term;
        }

        private $id;
        private $name;
        private $description;
        private $status;
        private $created_at;
        private $team;
        private $term;
        private $leader;

        public function getId(): mixed{
            return $this->id;
        }
        function setId($id): void{
            $this->id = $id;
        }

        function getName(): mixed{
            return $this->name;
        }
        function setName($name): void{
            $this->name = $name;
        }

        function getDescription(): mixed{
            return $this->description;
        }
        function setDescription($description): void{
            $this->description = $description;
        }

        function getStatus(): mixed{
            return $this->status;
        }
        function setStatus($status): void{
            $this->status = $status;
        }

        function getCreatedAt(): mixed{
            return $this->created_at;
        }
        function setCreatedAt($created_at): void{
            $this->created_at = $created_at;
        }

        function getTeam(){
            return $this->team;
        }  
        function setTeam($team){
            $this->team = $team;
        }

        function getTerm(){
            return $this->term;
        }
        function setTerm($term){
            $this->term = $term;
        }

        function getLeader(): mixed{
            return $this->leader;
        }
        function setLeader($leader): void{
            $this->leader = $leader;
        }
        

        public function update(DataUpdateProject $dataUpdateProject) {
            $this->name = $dataUpdateProject->getName();
            $this->description = $dataUpdateProject->getDescription();
            $this->team = $dataUpdateProject->getTeam();
            $this->term = $dataUpdateProject->getTerm();
        }
    }
?>