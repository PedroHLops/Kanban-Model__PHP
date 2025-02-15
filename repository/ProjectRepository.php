<?PHP
    class ProjectRepository{

        private $pdo;
        public function __construct(PDO $pdo) {
            $this->pdo = $pdo;
        }

        function __findAllByStatusTrue() {
            $stmt = $this->pdo->prepare("SELECT * FROM projects WHERE status = 'true'");
            $stmt->execute();
            $stmt->fetchAll(PDO::FETCH_ASSOC);

        }

        function __findById($id) {
            $stmt = $this->pdo->prepare("SELECT * FROM projects WHERE id = :id");
            $stmt->execute(['id' => $id]);
            $stmt->fetch(PDO::FETCH_ASSOC);

        }

        function __findByName($name){
            $sql = "SELECT * FROM projects WHERE name like '%$name%'";

            return $sql;
        }

        function __findByDate($dateInit, $dateEnd) {
            $sql = "SELECT * FROM projects WHERE date BETWEEN '$dateInit' AND '$$dateEnd'";

            return $sql;
        }

        function __findByLeader($leader) {
            $sql = "SELECT * FROM projects WHERE name like '%$leader%'";

            return $sql;
        }


        function __registerProject(Project $project){
            $insert = "INSERT INTO projects(name, description, created_at, team, term, leader) VALUES (?,?,?,?,?,?)";
            $stmt = $this->pdo->prepare($insert);
            $stmt->execute([$project->getName(),
                            $project->getDescription(),
                            $project->getCreatedAt(),
                            $project->getTeam(),
                            $project->getTerm(),
                            $project->getLeader(),]);

        }
        
    }
?>