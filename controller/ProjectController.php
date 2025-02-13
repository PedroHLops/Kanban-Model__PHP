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
                return Handlers::error($project, 'Erro ao cadastrar o projeto', 400);
            }

            return Handlers::sucess($dataProjects, 'Projeto cadatrado com sucesso', 200);
        }

        public function filterStatusTrue() {
            $this->projectRepository->__findAllByStatusTrue();
            
            return [$this->projectRepository->__findAllByStatusTrue(), Handlers::sucess($this->projectRepository, '', 200)];
        }
    }
?>