<?PHP
require_once 'routes/Routes.php';
require_once 'controller/ProjectController.php';
require_once 'repository/ProjectRepository.php';
require_once 'models/Project.php';
require_once 'DTOS/DataUpdateProject.php';
require_once 'handler/Handlers.php';


try {
    $pdo = new PDO("mysql:host=localhost;dbname=bancoteste", "root", "1a250ZZ95");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die(json_encode(["error" => "Erro ao conectar ao banco de dados: " . $e->getMessage()]));
}

$uri = rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$method = $_SERVER['REQUEST_METHOD'];


$projectRepository = new ProjectRepository($pdo);
$projectController = new ProjectController($projectRepository);

header("Content-type: application/json");


if(isset($routes[$method][$uri])) {
    if($method === 'POST') {
        $data = json_decode(file_get_contents("php://input"), true);


        if ($data === null) {
            echo json_encode(Handlers::error(null, "Dados inválidos", 400));
            exit;
        } else {

            $project = new Project(
                $data["name"] ?? '',
                $data["description"] ?? '',
                $data["team"] ?? '',
                $data["term"] ?? '');
            }
        
            echo json_encode($projectController->register($project));
            exit;
    }

    if($method === 'GET') {
        echo json_encode($projectController->filterStatusTrue());
        exit;
    }

    if($method === 'PUT') {
        $data = json_decode(file_get_contents("php://input"), true);

        if ($data === null || !isset($data["id"])) {
            echo json_encode(Handlers::error(null, "Dados inválidos. O campo 'id' é obrigatório.", 400));
            exit;
        }

        $dataUpdateProject = new DataUpdateProject(
            $data["id"], 
            $data["name"] ?? '', 
            $data["description"] ?? '', 
            $data["team"] ?? '', 
            $data["term"] ?? '',
            $data['leader'] ??'',
            $data['status'] ??''
        );

        echo json_encode($projectController->updateProject($dataUpdateProject));
        exit;
    }

} else {
    echo json_encode(Handlers::error(null, 'Rota não encontrada', 404));
}
?>