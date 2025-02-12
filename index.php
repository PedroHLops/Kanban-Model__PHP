<?PHP
require_once 'controller/ProjectController.php';
require_once 'repository/ProjectRepository.php';
require_once 'models/Project.php';
require_once 'handler/Handlers.php';


try {
    $pdo = new PDO("mysql:host=localhost;dbname=seu_banco", "usuario", "senha");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die(json_encode(["error" => "Erro ao conectar ao banco de dados: " . $e->getMessage()]));
}

$uri = parse_url($_SERVER['REQUEST_URL'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$projectRepository = new ProjectRepository($pdo);
$projectController = new ProjectController($projectRepository);

header("Content-type: application/json");

if($uri === '/project/register' && $method === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    if ($data === null) {
        return json_encode(Handlers::error(null, "Dados inválidos", 400));
    }

    $project = new Project(
        $data["name"] ?? '',
        $data["description"] ?? '',
        $data["team"] ?? '',
        $data["term"] ?? '',
    );

    return json_encode($projectController->register($project));
} else {
    return json_encode(Handlers::error(null, 'Rota não encontrada', 404));
}
?>