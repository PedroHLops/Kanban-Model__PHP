<?PHP
    class DataUpdateProject{

        private $id;
        private $name;
        private $description;
        private $team;
        private $term;
        private $leader;
        private $status;

        public function __construct(int $id, string $name, string $description, string $team, string $term, string $leader, string $status) {
            $this->id = $id;
            $this->name = $name;
            $this->description = $description;
            $this->team = $team;
            $this->term = $term;
            $this->leader = $leader;
            $this->status = $status;
        }

        public function getId(): int {
            return $this->id;
        }
        public function setId(int $id): void {
            $this->id = $id;
        }

        public function getName(): string {
            return $this->name;
        } 
        public function setName(string $name): void {
            $this->name = $name;
        }

        public function getDescription(): string {
            return $this->description;
        }
        public function setDescription(string $description): void {
            $this->description = $description;
        }

        public function getTeam(): string {
            return $this->team;
        }
        public function setTeam(string $team): void {
            $this->team = $team;
        }

        public function getTerm(): string {
            return $this->term;
        }
        public function setTerm(string $term): void {
            $this->term = $term;
        }

        public function getLeader(): string {
            return $this->leader;
        }
        public function setLeader(string $leader): void {
            $this->leader = $leader;
        }

        public function getStatus(): string {
            return $this->status;
        }
        public function setStatus(string $status): void {
            $this->status = $status;
        }
    }
?>