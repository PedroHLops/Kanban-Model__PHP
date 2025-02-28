<?PHP
    class ProjectRepository{

        private $pdo;
        public function __construct(PDO $pdo) {
            $this->pdo = $pdo;
        }

        function __findAllByStatusTrue() {
            $stmt = $this->pdo->prepare("SELECT * FROM projects WHERE status = 'true'");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        }

        function __findById($id): Project|null {
            $stmt = $this->pdo->prepare("SELECT * FROM projects WHERE id = :id");
            $stmt->execute(['id' => $id]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if(!$data) {
                return null;
            }

            return new Project(
                $data['name'],
                $data['description'],
                $data['team'],
                $data['term'],
            );

        }

        function __findByDate($dateInit, $dateEnd) {
            $sql = "SELECT * FROM projects WHERE date BETWEEN '$dateInit' AND '$$dateEnd'";

            return $sql;
        }


        function __registerProject(Project $project){
            $insert = "INSERT INTO projects (name, description, created_at, team, term, leader, status) 
                       VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->pdo->prepare($insert);
            $stmt->execute([$project->getName(),
                            $project->getDescription(),
                            $project->getCreatedAt(),
                            $project->getTeam(),
                            $project->getTerm(),
                            $project->getLeader(),
                            $project->getStatus()]);

        }
        

        function __updateProject(Project $project, $id){
            $update = "UPDATE projects SET name = ?, description = ?, created_at = ?,
                       team = ?, term = ?, leader = ?, status = ? WHERE id = ?";
            echo "Consulta SQL: " . $update . "\n";
            echo "Valor do ID: " . $id . "\n";
            $stmt = $this->pdo->prepare($update);
            $executed = $stmt->execute([
                            $project->getName(),
                            $project->getDescription(),
                            $project->getCreatedAt(), 
                            $project->getTeam(),
                            $project->getTerm(),
                            $project->getLeader(),
                            $project->getStatus(),
                            $id]);
             
            // Verificando se a execução foi bem-sucedida
            if ($executed) {
                echo "Projeto atualizado com sucesso!";
            } else {
                // Se falhar, exibir o erro
                $errorInfo = $stmt->errorInfo();
                echo "Erro na execução da consulta: " . $errorInfo[2];
            }
        }
    }
?>