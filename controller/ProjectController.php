<?PHP
    class ProjectController{
        private ProjectRepository $projectRepository;

        public function __construct(ProjectRepository $projectRepository) {
            $this->projectRepository = $projectRepository;
        }

        public function register(Project $dataProjects){
            $project = new Project($dataProjects->getName(),
                            $dataProjects->getDescription(),
                                   $dataProjects->getTeam(),
                                   $dataProjects->getTerm());
            $this-> projectRepository->__registerProject($project);

            if (empty($dataProjects->getName())) {
                $response = Handlers::error($project, 'Erro ao cadastrar o projeto', 400);
                return $response;
            }

            return Handlers::sucess($dataProjects, 'Projeto cadatrado com sucesso', 200);
        }
    }
?>