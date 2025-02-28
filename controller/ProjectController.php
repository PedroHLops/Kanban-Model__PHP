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

            return Handlers::sucess($dataProjects, 'Projeto cadatrado com sucesso', 201);
        }

        public function filterStatusTrue() {
            $this->projectRepository->__findAllByStatusTrue();
            
            return [json_encode($this->projectRepository->__findAllByStatusTrue()), Handlers::sucess($this->projectRepository, '', 200)];
        }

        public function updateProject(DataUpdateProject $dataUpdateProject){
            $update =  $this->projectRepository->__findById($dataUpdateProject->getId());
            
            if($update){
                $update->update($dataUpdateProject);
                $this->projectRepository->__updateProject($update, $dataUpdateProject->getId());

                return json_encode([Handlers::sucess($dataUpdateProject, 'Projeto atualizado com sucesso', 200)]);                
            } else{
                
                return [Handlers::error(null, 'Projeto não encontrado', 404)];
            }
        }
    }
?>  